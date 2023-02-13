<?php

namespace App\Http\Controllers\Backend\Eleve;

use App\Models\Sujet;
use App\Models\Erreur;
use App\Models\Question;
use App\Models\SujetEleve;
use App\Models\Composition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Mention;
use App\Models\QuestionReponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompositionController extends Controller
{
    /**
     * Debuter une compo
     */
    public function debuter_compo($id_sujet_eleve, $current_datetime)
    {
        //Récuprération du sujet
        $sujet_eleve = SujetEleve::find($id_sujet_eleve);
        if ($sujet_eleve && $sujet_eleve->identifiant == Auth::user()->identifiant) {
            //Récupération de la durée du sujet
            $duree = $sujet_eleve->sujet->duree.":00";
            $date_fin = DB::select('SELECT ADDTIME("'.$current_datetime.'", "'.$duree.'") AS date_fin')[0]->date_fin;

            //Pas encore composé
            if ($sujet_eleve->top_compo == '0') {
                //Insertion dans la table 'composition'
                $id_compo = Composition::insertGetId([
                    'id_sujet_eleve' => $id_sujet_eleve,
                    'date_debut' => $current_datetime,
                    'date_fin' => $date_fin,
                ]);

                //MAJ de la table 'sujets_eleves'
                $sujet_eleve->top_compo = '1';
                $sujet_eleve->save();

                //On retourne les infos de compo
                return response()->json([
                    'res' => 0,
                    'id_compo' => $id_compo,
                    'date_debut' => $current_datetime,
                    'date_fin' => $date_fin,
                ]);
            }
            //Compo en cours
            elseif ($sujet_eleve->top_compo == '1') {
                //On récupère les infos de la compo
                $compo = Composition::where('id_sujet_eleve', $id_sujet_eleve)->first();

                //On retourne les infos de compo
                return response()->json([
                    'res' => 0,
                    'id_compo' => $compo->id_composition,
                    'date_debut' => $current_datetime,
                    'date_fin' => $compo->date_fin,
                ]);
            }

            //On retourne un message d'erreur
            return response()->json([
                'res' => 1,
                'message' => "Vous avez déjà composé dans ce sujet.",
            ]);
        }

        //On retourne un message d'erreur
        return response()->json([
            'res' => 1,
            'message' => "Vous n'êtes pas habilités à composer ce sujet.",
        ]);
    }


    /**
     * Valider la compo d'un sujet
     */
    public function valider_compo(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'id_composition' => 'required',
            'date_finish' => 'required',
            'reponses' => 'required',
        ];

        //Messages d'erreurs
        $messages = [
            'id_composition.required' => "Impossible de récupérer l'ID de la composition.",
            'date_finish.required' => "Impossible de récupérer l'heure de fin de la composition..",
            'reponses.required' => "Impossible de récupérer vos réponses.",
        ];

        //Validation des données
        $validator = Validator::make($request->all(), $rules, $messages);

        //Si la validation echoue, on affiche les erreurs
        if ($validator->fails()) {
            return response()->json([
                'message' => "Erreur de validation des données.",
                'erreurs' => $validator->errors()->all()
            ]);
        }
        
        /**
         * Sauvegarde des réponses de la compo
         */
        try {

            //Récupération de la composition
            $composition = Composition::find($request->id_composition);

            //MAJ de la table 'sujets_eleves' => top_compo=2
            SujetEleve::where('id_sujet_eleve', $composition->id_sujet_eleve)->update(['top_compo' => 2]);

            //Insertion des réponses dans la table 'questions_reponses'
            if (!empty($request->reponses)) {
                foreach ($request->reponses as $reponse) {
                    //Récupération de la question
                    $question = Question::find($reponse[0]);

                    //Insertion dans la table 'questions_reponses'
                    QuestionReponse::create([
                        'id_composition' => $request->id_composition,
                        'id_question' => $reponse[0],
                        'libelle_reponse' => $reponse[1],
                        'points_obtenus' => $question->reponse_attendue == $reponse[1] ? $question->points : 0,
                    ]);
                }
            }

            //Note obtenue + Mention
            $points_obtenus = QuestionReponse::where('id_composition', $request->id_composition)->sum('points_obtenus');
            $note_sur_20 = intval(round(($points_obtenus * 20) / $composition->sujet_eleve->sujet->point_total));
            $mention = Mention::where('note', $note_sur_20)->first()->libelle;

            //MAJ de la table 'composition'
            $composition->date_fin_compo = $request->date_finish;
            $composition->note_obtenue = $points_obtenus;
            $composition->note_sur_20 = $note_sur_20;
            $composition->mention = $mention;
            $composition->temps_mis = DB::select('SELECT SUBSTRING(TIMEDIFF("'.$request->date_finish.'", "'.$composition->date_debut.'"), 1, 5) AS temps_mis')[0]->temps_mis;
            $composition->top_compo = 1;
            $composition->top_resultat = $note_sur_20 >= 10 ? "1" : "0";
            $composition->save();

            //On retourne un message de succès
            return response()->json([
                'top_resultat' => $note_sur_20 >= 10 ? "Succes" : "Echec",
                'message' => $note_sur_20 >= 10 ? "Félicitations, vous avez réussi la composition avec succès." : "Désolé, vous avez échoué.",
                'note' => $note_sur_20,
                'mention' => $mention,
                'temps_mis' => get_duree_string(DB::select('SELECT SUBSTRING(TIMEDIFF("'.$request->date_finish.'", "'.$composition->date_debut.'"), 1, 5) AS temps_mis')[0]->temps_mis),
            ]);

        } catch (\Exception $ex) {
            //Sauvegarde de l'erreur
            Erreur::create([
                'utilisateur' => Auth::user()->identifiant, 'action' => "Validation Compo N° ".$request->id_composition, 'erreur' => $ex,
            ]);

            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu la sauvegarde des informations. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    /**
     * Abandonner une compo
     */
    public function abandonner_compo($id_sujet)
    {
        //Récupération du sujet
        $sujet = Sujet::find($id_sujet);
        if ($sujet && $sujet->identifiant == Auth::user()->identifiant) {

            if ($sujet->questions()->count() >= 1) {
                //MAJ de la table 'sujets'
                $sujet->top_actif = 1;
                $sujet->save();
                
                //On retourne un message de succès
                return response()->json([
                    'res' => 0,
                    'message' => "Le sujet a été publié avec succès.",
                    'redirect_url' => route('enseignant-gestion-sujet')
                ]);
            } else {
                //On retourne un message d'erreur
                return response()->json([
                    'res' => 1,
                    'message' => "Impossible de publier ce sujet car il est incomplet.",
                ]);
            }
            

        }

        //On retourne un message d'erreur
        return response()->json([
            'res' => 1,
            'message' => "Vous n'êtes pas habilités à publier ce sujet.",
        ]);
    }

    /**
     * Correction d'un sujet
     */
    public function correction_sujet($id)
    {
        //Récupération des données
        $user = Auth::user();
        $sujet_eleve = SujetEleve::where('id_sujet_eleve', $id)->where('top_compo', 2)->first();
        $sujet = $sujet_eleve->sujet ?? "";
        $composition = Composition::where('id_sujet_eleve', $id)->first();

        //On retourne la vue avec les données
        if ($sujet_eleve && $sujet_eleve->identifiant == $user->identifiant) {
            return view('backend/eleve/correction_sujet', compact('user', 'sujet', 'sujet_eleve', 'composition'));
        }
    }
}
