<?php

namespace App\Http\Controllers\Backend\Enseignant;

use App\Models\Sujet;
use App\Models\Erreur;
use App\Models\Exercice;
use App\Models\Question;
use App\Models\SousExercice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SujetController extends Controller
{
    /**
     * Ajout d'un nouveau sujet
     */
    public function add_sujet(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'type_sujet' => 'required|exists:type_sujet,id_typesujet',
            // 'titre_sujet' => 'required',
            'description_sujet' => 'nullable',
            'niveau' => 'required|exists:niveaux,id_niveau',
            'serie' => 'nullable|exists:series,id_serie',
            'matiere' => 'required|exists:matieres,id_matiere',
            'chapitre' => 'required|exists:chapitres,id_chapitre',
            'lecon' => 'nullable|exists:lecons,id_lecon',
            'duree' => 'required',
            'exercices' => 'nullable',
        ];

        //Messages d'erreurs
        $messages = [
            'type_sujet.required' => "Veuillez choisir le type de sujet.",
            'type_sujet.exists' => "Le type de sujet sélectionné est incorrect.",
            'titre_sujet.required' => "Veuillez renseigner le titre du sujet.",
            'niveau.required' => "Veuillez choisir le niveau.",
            'niveau.exists' => "Le niveau sélectionné est incorrect.",
            'serie.exists' => "La série sélectionnée est incorrecte.",
            'matiere.required' => "Veuillez choisir la matière.",
            'matiere.exists' => "La matière sélectionnée est incorrecte.",
            'chapitre.required' => "Veuillez choisir le chapitre.",
            'chapitre.exists' => "Le chapitre sélectionné est incorrect.",
            'lecon.exists' => "La leçon sélectionnée est incorrecte.",
            'duree.required' => "Veuillez renseigner la durée.",
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
         * Sauvegarde des infos du sujet
         */
        try {
            //Récupération du user
            $user = Auth::user();

            //Contrôle de régularité
            if ($request->top_actif == '1' && $user->enseignant->top_publication != '1') {
                return response()->json([
                    'message' => "Erreur de validation des données.",
                    'erreurs' => ["Vous n'êtes pas habilités à publier des sujets sur la plateforme CEL.<br/>Veuillez contacter l'administrateur."]
                ]);
            } else {
                //Insertion dans la table 'sujets'
                $id_sujet = Sujet::insertGetId([
                    'identifiant' => $user->identifiant,
                    'id_typesujet' => $request->type_sujet,
                    'texte_sujet' => $request->texte_sujet,
                    'description' => $request->description_sujet,
                    'id_niveau' => $request->niveau,
                    'id_serie' => $request->serie,
                    'id_matiere' => $request->matiere,
                    'id_chapitre' => $request->chapitre,
                    'id_lecon' => $request->lecon,
                    'duree' => $request->duree,
                    'top_actif' => $request->top_actif,
                    //'date_mel' => $request->top_actif == '1' ? DB::raw('NOW()') : null,
                ]);
    
                //Insertion dans les tables 'exercices', 'sous_exercices' et 'questions'
                if (!empty($request->exercices)) {
                    foreach ($request->exercices as $exercice) {
                        //Insertion dans la table 'exercices'
                        $id_exercice = Exercice::insertGetId([
                            'id_sujet' => $id_sujet,
                            'titre_exercice' => $exercice[0],
                        ]);
    
                        //Insertion dans la table 'sous_exercices'
                        if (!empty($exercice[1])) {
                            foreach ($exercice[1] as $sous_exercice) {
                                $id_sous_exercice = SousExercice::insertGetId([
                                    'id_exercice' => $id_exercice,
                                    'id_sujet' => $id_sujet,
                                    'titre_sous_exercice' => $sous_exercice[0],
                                    'top_question' => $sous_exercice[2]
                                ]);
    
                                //Insertion dans la table 'questions'
                                if ($sous_exercice[2] == "1") {//Question
                                    Question::create([
                                        'id_sous_exercice' => $id_sous_exercice,
                                        'id_exercice' => $id_exercice,
                                        'id_sujet' => $id_sujet,
                                        'type_question' => $sous_exercice[3],
                                        'libelle' => $sous_exercice[4],
                                        'proposition_reponse' => !empty($sous_exercice[5]) ? implode("__", $sous_exercice[5]) : null,
                                        'redaction_texte' => $sous_exercice[6],
                                        'redaction_texte_html' => $sous_exercice[7],
                                        'reponse_attendue' => $sous_exercice[8],
                                        'points' => $sous_exercice[9],
                                        'explications' => $sous_exercice[10],
                                    ]);
                                } elseif (!empty($sous_exercice[1])) {//Sous-Exercie
                                    foreach ($sous_exercice[1] as $question) {
                                        Question::create([
                                            'id_sous_exercice' => $id_sous_exercice,
                                            'id_exercice' => $id_exercice,
                                            'id_sujet' => $id_sujet,
                                            'type_question' => $question[0],
                                            'libelle' => $question[1],
                                            'proposition_reponse' => !empty($question[2]) ? implode("__", $question[2]) : null,
                                            'redaction_texte' => $question[3],
                                            'redaction_texte_html' => $question[4],
                                            'reponse_attendue' => $question[5],
                                            'points' => $question[6],
                                            'explications' => $question[7],
                                        ]);
                                    }
                                }
                                
                            }
                        }
                    }
                }
                
                //Récupération de la note totale
                $note_totale = Question::where('id_sujet', $id_sujet)->sum('points');
                Sujet::where('id_sujet', $id_sujet)->update(['point_total' => $note_totale]);
    
                //On retourne un message de succès
                return response()->json([
                    'message' => $request->top_actif == '1' ? "Le sujet a été enregistré & publié avec succès." : "Le sujet a été enregistré comme brouillon avec succès.",
                    'redirect_url' => route('enseignant-previsualiser-sujet', $id_sujet)
                ]);
            }
        } catch (\Exception $ex) {
            //Sauvegarde de l'erreur
            Erreur::create([
                'utilisateur' => $user->identifiant,
                'action' => "Création d'un sujet",
                'erreur' => $ex,
            ]);

            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu la sauvegarde des informations. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    /**
     * Modification d'un sujet
     */
    public function update_sujet(Request $request, $id_sujet)
    {
        //Règles de validation des données
        $rules = [
            'type_sujet' => 'required|exists:type_sujet,id_typesujet',
            // 'titre_sujet' => 'required',
            'description_sujet' => 'nullable',
            'niveau' => 'required|exists:niveaux,id_niveau',
            'serie' => 'nullable|exists:series,id_serie',
            'matiere' => 'required|exists:matieres,id_matiere',
            'chapitre' => 'required|exists:chapitres,id_chapitre',
            'lecon' => 'nullable|exists:lecons,id_lecon',
            'duree' => 'required',
            'exercices' => 'nullable',
        ];

        //Messages d'erreurs
        $messages = [
            'type_sujet.required' => "Veuillez choisir le type de sujet.",
            'type_sujet.exists' => "Le type de sujet sélectionné est incorrect.",
            'titre_sujet.required' => "Veuillez renseigner le titre du sujet.",
            'niveau.required' => "Veuillez choisir le niveau.",
            'niveau.exists' => "Le niveau sélectionné est incorrect.",
            'serie.exists' => "La série sélectionnée est incorrecte.",
            'matiere.required' => "Veuillez choisir la matière.",
            'matiere.exists' => "La matière sélectionnée est incorrecte.",
            'chapitre.required' => "Veuillez choisir le chapitre.",
            'chapitre.exists' => "Le chapitre sélectionné est incorrect.",
            'lecon.exists' => "La leçon sélectionnée est incorrecte.",
            'duree.required' => "Veuillez renseigner la durée.",
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
         * Sauvegarde des infos du sujet
         */
        try {
            //Récupération du user
            $user = Auth::user();

            //Contrôle de régularité
            if ($request->top_actif == '1' && $user->enseignant->top_publication != '1') {
                return response()->json([
                    'message' => "Erreur de validation des données.",
                    'erreurs' => ["Vous n'êtes pas habilités à publier des sujets sur la plateforme CEL.<br/>Veuillez contacter l'administrateur."]
                ]);
            } else {
                //MAJ de la table sujet
                Sujet::where('id_sujet', $id_sujet)->where('identifiant', $user->identifiant)->update([
                    'id_typesujet' => $request->type_sujet,
                    'texte_sujet' => $request->texte_sujet,
                    'description' => $request->description_sujet,
                    'id_niveau' => $request->niveau,
                    'id_serie' => $request->serie,
                    'id_matiere' => $request->matiere,
                    'id_chapitre' => $request->chapitre,
                    'id_lecon' => $request->lecon,
                    'duree' => $request->duree,
                    'top_actif' => $request->top_actif,
                ]);
                
                //Suppression des exercices et questions
                $sujet = Sujet::find($id_sujet);
                $sujet->questions()->delete();
                $sujet->sous_exercices()->delete();
                $sujet->exercices()->delete();
    
                //Insertion dans les tables 'exercices', 'sous_exercices' et 'questions'
                if (!empty($request->exercices)) {
                    foreach ($request->exercices as $exercice) {
                        //Insertion dans la table 'exercices'
                        $id_exercice = Exercice::insertGetId([
                            'id_sujet' => $id_sujet,
                            'titre_exercice' => $exercice[0],
                        ]);
    
                        //Insertion dans la table 'sous_exercices'
                        if (!empty($exercice[1])) {
                            foreach ($exercice[1] as $sous_exercice) {
                                $id_sous_exercice = SousExercice::insertGetId([
                                    'id_exercice' => $id_exercice,
                                    'id_sujet' => $id_sujet,
                                    'titre_sous_exercice' => $sous_exercice[0],
                                    'top_question' => $sous_exercice[2]
                                ]);
    
                                //Insertion dans la table 'questions'
                                if ($sous_exercice[2] == "1") {//Question
                                    Question::create([
                                        'id_sous_exercice' => $id_sous_exercice,
                                        'id_exercice' => $id_exercice,
                                        'id_sujet' => $id_sujet,
                                        'type_question' => $sous_exercice[3],
                                        'libelle' => $sous_exercice[4],
                                        'proposition_reponse' => !empty($sous_exercice[5]) ? implode("__", $sous_exercice[5]) : null,
                                        'redaction_texte' => $sous_exercice[6],
                                        'redaction_texte_html' => $sous_exercice[7],
                                        'reponse_attendue' => $sous_exercice[8],
                                        'points' => $sous_exercice[9],
                                        'explications' => $sous_exercice[10],
                                    ]);
                                } elseif (!empty($sous_exercice[1])) {//Sous-Exercie
                                    foreach ($sous_exercice[1] as $question) {
                                        Question::create([
                                            'id_sous_exercice' => $id_sous_exercice,
                                            'id_exercice' => $id_exercice,
                                            'id_sujet' => $id_sujet,
                                            'type_question' => $question[0],
                                            'libelle' => $question[1],
                                            'proposition_reponse' => !empty($question[2]) ? implode("__", $question[2]) : null,
                                            'redaction_texte' => $question[3],
                                            'redaction_texte_html' => $question[4],
                                            'reponse_attendue' => $question[5],
                                            'points' => $question[6],
                                            'explications' => $question[7],
                                        ]);
                                    }
                                }
                                
                            }
                        }
                    }
                }
    
                //Récupération de la note totale
                $note_totale = Question::where('id_sujet', $id_sujet)->sum('points');
                Sujet::where('id_sujet', $id_sujet)->update(['point_total' => $note_totale]);

                //On retourne un message de succès
                return response()->json([
                    'message' => $request->top_actif == '1' ? "Le sujet a été enregistré & publié avec succès." : "Le sujet a été enregistré comme brouillon avec succès.",
                    'redirect_url' => route('enseignant-previsualiser-sujet', $id_sujet)
                ]);
            }
        } catch (\Exception $ex) {
            //Sauvegarde de l'erreur
            Erreur::create([
                'utilisateur' => $user->identifiant,
                'action' => "Modification d'un sujet",
                'erreur' => $ex,
            ]);

            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu la sauvegarde des informations. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    /**
     * Publication d'un sujet
     */
    public function publish_sujet($id_sujet)
    {
        //Récupération des infos
        $user = Auth::user();
        $sujet = Sujet::find($id_sujet);

        //Contrôle de régularité
        if ($user->enseignant->top_publication != '1') {
            return response()->json([
                'res' => 1,
                'message' => "Vous n'êtes pas habilités à publier des sujets sur la plateforme CEL.<br/>Veuillez contacter l'administrateur.",
            ]);
        }
        elseif ($sujet && $sujet->identifiant == $user->identifiant) {
            if ($sujet->questions()->count() >= 1) {
                //MAJ de la table 'sujets'
                $sujet->top_actif = 1;
                $sujet->date_mel = DB::raw('NOW()');
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
}