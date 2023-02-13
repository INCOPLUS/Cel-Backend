<?php

namespace App\Http\Controllers\Backend\Enseignant;

use App\Models\Enseignant;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Diplome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{

    /**
     * MAJ des infos personnelles
     */
    public function maj_infos_perso(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'nom' => 'required',
            'date_naissance' => 'required|date',
            'genre' => 'required|in:1,2',
            'email' => 'required|email|unique:utilisateurs,email,'.Auth::user()->identifiant.',identifiant',
            'contact1' => 'required',
            'pays' => 'required|exists:pays,id_pays',
            'ville' => 'required|exists:villes,id_ville',
            'quartier' => 'required'
        ];

        //Messages d'erreurs
        $messages = [
            'nom.required' => 'Veuillez renseigner votre nom & prénom.',
            'date_naissance.required' => 'Veuillez renseigner votre date de naissance.',
            'date_naissance.date' => 'La date de naissance est incorrect.',
            'genre.required' => 'Veuillez choisir votre genre (M ou F).',
            'genre.in' => "Le genre choisi est incorrect.",
            'email.required' => "Veuillez renseigner votre adresse email.",
            'email.email' => "L'adresse email est incorrecte.",
            'email.unique' => "Ce mail appartient déjà à un utilisateur.",
            'contact1.required' => "Veuillez renseigner votre contact (WhatsApp).",
            'pays.required' => "Veuillez choisir votre pays de résidence.",
            'pays.exists' => "Le pays sélectionné est incorrect.",
            'ville.required' => "Veuillez choisir votre ville de résidence.",
            'ville.exists' => "La ville sélectionnée est incorrecte.",
            'quartier.required' => "Veuillez renseigner votre lieu de résidence.",
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
         * Mise à jour des infos personnelles
         */
        try {
            //Récupération de l'ID de l'utisateur
            $identifiant = Auth::user()->identifiant;

            //MAJ de la table 'utilisateurs'
            Utilisateur::where('identifiant', $identifiant)->update([
                'nom_prenom' => $request->nom,
                'date_naissance' => $request->date_naissance,
                'genre' => $request->genre,
                'email' => $request->email,
                'telephone' => $request->contact1,
                'telephone2' => $request->contact2 ?? null,
                'id_pays' => $request->pays,
                'id_ville' => $request->ville,
                'quartier' => $request->quartier,
            ]);
            
            //MAJ de la table 'enseignants'
            Enseignant::where('identifiant', $identifiant)->update(['top_infos_perso' => 1]);
            Enseignant::where('identifiant', $identifiant)->where('top_piece', 1)->where('top_cv', 1)->where('top_diplome', 1)->update(['top_profil' => 1]);

            //On retourne un message de succès
            return response()->json([
                'message' => "Vos informations personnelles ont été mise à jour.",
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu la mise à jour de vos informations. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    /**
     * MAJ de la pièce d'identité
     */
    public function maj_piece(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'type_piece' => 'required|exists:type_piece,id_typepiece',
            'numero_piece' => 'required',
            'date_delivrance' => 'required|date',
            'date_expiration' => 'nullable|date',
        ];

        //Messages d'erreurs
        $messages = [
            'type_piece.required' => "Veuillez choisir votre type de pièce.",
            'type_piece.exists' => "Le type de pièce sélectionné est incorrect.",
            'numero_piece.required' => "Veuillez renseigner le N° de votre pièce d'identité.",
            'date_delivrance.required' => "Veuillez renseigner la date de déivrance de la pièce.",
            'date_delivrance.date' => "La date de délivrance est incorrecte.",
            'date_expiration.date' => "La date d'expiration est incorrecte.",
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
         * Mise à jour des infos de la pièce d'identité
         */
        try {
            //dd($request->piece_identite);

            //Récupération de l'ID de l'utisateur
            $identifiant = Auth::user()->identifiant;
            
            //MAJ de la table 'enseignants'
            Enseignant::where('identifiant', $identifiant)->update([
                'id_typepiece' => $request->type_piece,
                'num_piece' => $request->numero_piece,
                'date_delivrance_piece' => $request->date_delivrance,
                'date_expiration_piece' => $request->date_expiration ?? null,
                // 'fichier_piece' => null,
                'top_piece' => 1,
            ]);
            Enseignant::where('identifiant', $identifiant)->where('top_infos_perso', 1)->where('top_cv', 1)->where('top_diplome', 1)->update(['top_profil' => 1]);

            //Transfert du fichier joint sur le serveur


            //On retourne un message de succès
            return response()->json([
                'message' => "Les informations de la pièce ont été mise à jour.",
                'piece' => $request->piece_identite,
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu la mise à jour de vos informations. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    /**
     * MAJ du CV
     */
    public function maj_cv(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'enseignement' => 'required|exists:enseignement,id_enseignement',
            'matiere' => 'required|exists:matieres,id_matiere',
            'experience' => 'required|exists:experiences,id_experience',
            'etablissement' => 'nullable',
        ];

        //Messages d'erreurs
        $messages = [
            'enseignement.required' => "Veuillez choisir votre type d'enseignement.",
            'enseignement.exists' => "Le type d'enseignement sélectionné est incorrect.",
            'matiere.required' => "Veuillez choisir la discipline enseignée.",
            'matiere.exists' => "La discipline sélectionnée est incorrecte.",
            'experience.required' => "Veuillez choisir votre expérience professionnelle.",
            'experience.exists' => "L'expérience professionnelle sélectionnée est incorrecte.",
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
         * Mise à jour des infos du CV
         */
        try {
            //Récupération de l'ID de l'utisateur
            $identifiant = Auth::user()->identifiant;
            
            //MAJ de la table 'enseignants'
            Enseignant::where('identifiant', $identifiant)->update([
                'id_enseignement' => $request->enseignement,
                'id_matiere' => $request->matiere,
                'id_experience' => $request->experience,
                'etablissement' => $request->etablissement,
                // 'fichier_cv' => null,
                'top_cv' => 1,
            ]);
            Enseignant::where('identifiant', $identifiant)->where('top_infos_perso', 1)->where('top_piece', 1)->where('top_diplome', 1)->update(['top_profil' => 1]);

            //Transfert du fichier joint sur le serveur


            //On retourne un message de succès
            return response()->json([
                'message' => "Les informations du CV ont été mise à jour.",
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu la mise à jour de vos informations. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    /**
     * MAJ du diplôme
     */
    public function maj_diplome(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'annee_obtention' => 'required',
            'intitule_diplome' => 'required',
        ];

        //Messages d'erreurs
        $messages = [
            'annee_obtention.required' => "Veuillez choisir l'année d'obtention du diplôme.",
            'intitule_diplome.required' => "Veuillez renseigner l'intitulé du diplôme.",
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
         * Mise à jour des infos du diplôme
         */
        try {
            //Récupération de l'ID de l'utisateur
            $identifiant = Auth::user()->identifiant;

            //Insertion dans la table 'diplomes'
            Diplome::firstOrCreate([
                'identifiant' => $identifiant,
                'annee_obtention' => $request->annee_obtention,
                'intitule_diplome' => $request->intitule_diplome,
                // 'fichier_diplome' => $request->fichier_diplome,
            ]);
            
            //MAJ de la table 'enseignants'
            Enseignant::where('identifiant', $identifiant)->update(['top_diplome' => 1]);
            Enseignant::where('identifiant', $identifiant)->where('top_infos_perso', 1)->where('top_piece', 1)->where('top_cv', 1)->update(['top_profil' => 1]);


            //Transfert du fichier joint sur le serveur


            //On retourne un message de succès
            return response()->json([
                'message' => "Le diplôme a été ajouté avec succès.",
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => "Nous corrigeons une erreur qui a interrompu l'ajout du diplôme. Veuillez réessayer plus tard."
            ], 400);
        }
    }

    /**
     * Suppression du diplôme
     */
    public function sup_diplome($id)
    {      
        try {
            //Récupération de l'ID de l'utisateur
            $identifiant = Auth::user()->identifiant;

            //Suppression du diplôme
            Diplome::where('id_diplome', $id)->delete();
            
            //MAJ éventuelle de la table 'enseignants'
            if (count(Diplome::where('identifiant', $identifiant)->get()) < 1) {
                Enseignant::where('identifiant', $identifiant)->update(['top_diplome' => 0, 'top_profil' => 0]);
            }

            //On retourne un message de succès
            return response()->json([
                'message' => "Le diplôme a été retiré avec succès.",
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => "Nous corrigeons une erreur qui a interrompu la suppression du diplôme. Veuillez réessayer plus tard."
            ], 400);
        }
    }
    
}
