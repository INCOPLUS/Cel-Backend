<?php

namespace App\Http\Controllers\Backend\Administrateur;

use App\Models\Enseignant;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Chapitre;
use App\Models\Diplome;
use App\Models\Eleve;
use App\Models\Enseignement;
use App\Models\Lecon;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\TypeSujet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ParametrageController extends Controller
{
    /**
     * Type Enseignement
     */
    
    //Ajout
    public function add_enseignement(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'libelle' => 'required|unique:enseignement,libelle',
            'statut' => 'required|in:Elève,Etudiant',
        ];

        //Messages d'erreurs
        $messages = [
            'libelle.required' => "Veuillez renseigner le type d'enseignement.",
            'libelle.unique' => "Ce type d'enseignement existe déjà.",
            'statut.required' => "Veuillez choisir le statut de l'apprenant.",
            'statut.in' => "Le statut de l'apprenant est incorrect.",
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
         * Insertion dans la table 'enseignement'
         */
        try {
            //Insertion dans la table 'enseignement'
            Enseignement::create([
                'libelle' => $request->libelle,
                'statut' => $request->statut,
            ]);

            //On retourne un message de succès
            return response()->json([
                'message' => "Le type d'enseignement a été ajouté avec succès.",
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitement de votre demande. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    //Modification
    public function update_enseignement(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'libelle' => 'required|unique:enseignement,libelle,'.$request->id.',id_enseignement',
            'statut' => 'required|in:Elève,Etudiant',
        ];

        //Messages d'erreurs
        $messages = [
            'libelle.required' => "Veuillez renseigner le type d'enseignement.",
            'libelle.unique' => "Ce type d'enseignement existe déjà.",
            'statut.required' => "Veuillez choisir le statut de l'apprenant.",
            'statut.in' => "Le statut de l'apprenant est incorrect.",
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
         * MAJ dans la table 'enseignement'
         */
        try {
            //MAJ de la table 'enseignement'
            Enseignement::where('id_enseignement', $request->id)->update([
                'libelle' => $request->libelle,
                'statut' => $request->statut,
            ]);

            //On retourne un message de succès
            return response()->json([
                'message' => "Le type d'enseignement a été mis à jour avec succès.",
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitement de votre demande. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    //Activation - Désactivation
    public function enable_enseignement($id, $top_actif)
    {      
        try {
            //MAJ de la table 'enseignement'
            Enseignement::where('id_enseignement', $id)->update(['top_actif' => $top_actif]);

            //On retourne un message de succès
            return response()->json([
                'message' => "Le type d'enseignement a été ".($top_actif == '0' ? 'activé' : 'désactivé'). " avec succès.",
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => "Nous corrigeons une erreur qui a interrompu la suppression. Veuillez réessayer plus tard."
            ], 400);
        }
    }
    
    //Suppression
    public function sup_enseignement($id)
    {      
        try {
            //Suppression dans la table 'enseignement'
            Enseignement::where('id_enseignement', $id)->delete();

            //On retourne un message de succès
            return response()->json([
                'res' => 0,
                'message' => "Le type d'enseignement a été supprimé avec succès.",
            ]);
            
        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'res' => 1,
                'message' => "Impossible de supprimer ce type d'enseignement."
            ]);
        }
    }


    /**
     * Niveau (Classe)
     */
    
    //Ajout
    public function add_niveau(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'enseignement' => 'required|exists:enseignement,id_enseignement',
            'libelle' => 'required|unique:niveaux,libelle',
            'abreviation' => 'required|unique:niveaux,abreviation',
        ];

        //Messages d'erreurs
        $messages = [
            'enseignement.required' => "Veuillez sélectionner le type d'enseignement.",
            'enseignement.exists' => "Le type d'enseignement choisi est incorrect.",
            'libelle.required' => "Veuillez renseigner le niveau.",
            'libelle.unique' => "Ce niveau existe déjà.",
            'abreviation.required' => "Veuillez renseigner l'abréviation.",
            'abreviation.unique' => "Cette abréviation existe déjà.",
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
         * Insertion dans la table 'niveaux'
         */
        try {
            //Insertion dans la table 'niveaux'
            Niveau::create([
                'id_enseignement' => $request->enseignement,
                'libelle' => $request->libelle,
                'abreviation' => $request->abreviation,
            ]);

            //On retourne un message de succès
            return response()->json([
                'message' => "Le niveau a été ajouté avec succès.",
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitement de votre demande. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    //Modification
    public function update_niveau(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'enseignement' => 'required|exists:enseignement,id_enseignement',
            'libelle' => 'required|unique:niveaux,libelle,'.$request->id.',id_niveau',
            'abreviation' => 'required|unique:niveaux,abreviation,'.$request->id.',id_niveau',
        ];

        //Messages d'erreurs
        $messages = [
            'enseignement.required' => "Veuillez sélectionner le type d'enseignement.",
            'enseignement.exists' => "Le type d'enseignement choisi est incorrect.",
            'libelle.required' => "Veuillez renseigner le niveau.",
            'libelle.unique' => "Ce niveau existe déjà.",
            'abreviation.required' => "Veuillez renseigner l'abréviation.",
            'abreviation.unique' => "Cette abréviation existe déjà.",
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
         * MAJ dans la table 'niveaux'
         */
        try {
            //MAJ de la table 'niveaux'
            Niveau::where('id_niveau', $request->id)->update([
                'id_enseignement' => $request->enseignement,
                'libelle' => $request->libelle,
                'abreviation' => $request->abreviation,
            ]);

            //On retourne un message de succès
            return response()->json([
                'message' => "Le niveau a été mis à jour avec succès.",
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitement de votre demande. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    //Activation - Désactivation
    public function enable_niveau($id, $top_actif)
    {      
        try {
            //MAJ de la table 'niveaux'
            Niveau::where('id_niveau', $id)->update(['top_actif' => $top_actif]);

            //On retourne un message de succès
            return response()->json([
                'message' => "Le niveau a été ".($top_actif == '0' ? 'activé' : 'désactivé'). " avec succès.",
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => "Nous corrigeons une erreur qui a interrompu votre demande. Veuillez réessayer plus tard."
            ], 400);
        }
    }
    
    //Suppression
    public function sup_niveau($id)
    {      
        try {
            //Suppression dans la table 'niveaux'
            Niveau::where('id_niveau', $id)->delete();

            //On retourne un message de succès
            return response()->json([
                'res' => 0,
                'message' => "Le niveau a été supprimé avec succès.",
            ]);
            
        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'res' => 1,
                'message' => "Impossible de supprimer ce niveau."
            ]);
        }
    }


    /**
     * Type Sujet
     */
    
    //Ajout
    public function add_typesujet(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'libelle' => 'required|unique:type_sujet,libelle',
            'montant' => 'required|numeric',
            'pourcentage' => 'required|min:0|max:100',
        ];

        //Messages d'erreurs
        $messages = [
            'libelle.required' => "Veuillez renseigner le type de sujet.",
            'libelle.unique' => "Ce type de sujet existe déjà.",
            'montant.required' => "Veuillez renseigner le montant.",
            'montant.numeric' => "Le montant saisi est incorrect.",
            'pourcentage.required' => "Veuillez renseigner le pourcentage.",
            'pourcentage.min' => "Le pourcentage doit être supérieur ou égale à 0.",
            'pourcentage.max' => "Le pourcentage doit être inférieur ou égale à 100.",
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
         * Insertion dans la table 'type_sujet'
         */
        try {
            //Insertion dans la table 'type_sujet'
            TypeSujet::create([
                'libelle' => $request->libelle,
                'montant' => $request->montant,
                'pourcentage' => $request->pourcentage,
            ]);

            //On retourne un message de succès
            return response()->json([
                'message' => "Le type de sujet a été ajouté avec succès.",
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitement de votre demande. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    //Modification
    public function update_typesujet(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'libelle' => 'required|unique:type_sujet,libelle,'.$request->id.',id_typesujet',
            'montant' => 'required|numeric',
            'pourcentage' => 'required|min:0|max:100',
        ];

        //Messages d'erreurs
        $messages = [
            'libelle.required' => "Veuillez renseigner le type de sujet.",
            'libelle.unique' => "Ce type de sujet existe déjà.",
            'montant.required' => "Veuillez renseigner le montant.",
            'montant.numeric' => "Le montant saisi est incorrect.",
            'pourcentage.required' => "Veuillez renseigner le pourcentage.",
            'pourcentage.min' => "Le pourcentage doit être supérieur ou égale à 0.",
            'pourcentage.max' => "Le pourcentage doit être inférieur ou égale à 100.",
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
         * MAJ dans la table 'type_sujet'
         */
        try {
            //MAJ de la table 'type_sujet'
            TypeSujet::where('id_typesujet', $request->id)->update([
                'libelle' => $request->libelle,
                'montant' => $request->montant,
                'pourcentage' => $request->pourcentage,
            ]);

            //On retourne un message de succès
            return response()->json([
                'message' => "Le niveau a été mis à jour avec succès.",
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitement de votre demande. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    //Activation - Désactivation
    public function enable_typesujet($id, $top_actif)
    {      
        try {
            //MAJ de la table 'type_sujet'
            TypeSujet::where('id_typesujet', $id)->update(['top_actif' => $top_actif]);

            //On retourne un message de succès
            return response()->json([
                'message' => "Le type de sujet a été ".($top_actif == '0' ? 'activé' : 'désactivé'). " avec succès.",
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => "Nous corrigeons une erreur qui a interrompu votre demande. Veuillez réessayer plus tard."
            ], 400);
        }
    }
    
    //Suppression
    public function sup_typesujet($id)
    {      
        try {
            //Suppression dans la table 'type_sujet'
            TypeSujet::where('id_typesujet', $id)->delete();

            //On retourne un message de succès
            return response()->json([
                'res' => 0,
                'message' => "Le type de sujet a été supprimé avec succès.",
            ]);
            
        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'res' => 1,
                'message' => "Impossible de supprimer ce type de sujet."
            ]);
        }
    }


    /**
     * Matière
     */
    
    //Ajout
    public function add_matiere(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'libelle' => 'required|unique:matieres,libelle',
        ];

        //Messages d'erreurs
        $messages = [
            'libelle.required' => "Veuillez renseigner la matière.",
            'libelle.unique' => "Cette matière existe déjà.",
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
         * Insertion dans la table 'matieres'
         */
        try {
            //Insertion dans la table 'matieres'
            Matiere::create([
                'libelle' => $request->libelle,
                'top_primaire' => $request->top_primaire == '1' ? '1' : null,
                'top_secondaire' => $request->top_secondaire == '1' ? '2' : null,
                'top_superieur' => $request->top_superieur == '1' ? '3' : null,
            ]);

            //On retourne un message de succès
            return response()->json(['message' => "La matière a été ajoutée avec succès.",]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitement de votre demande. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    //Modification
    public function update_matiere(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'libelle' => 'required|unique:matieres,libelle,'.$request->id.',id_matiere',
        ];

        //Messages d'erreurs
        $messages = [
            'libelle.required' => "Veuillez renseigner la matière.",
            'libelle.unique' => "Cette matière existe déjà.",
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
         * MAJ dans la table 'matieres'
         */
        try {
            //MAJ de la table 'matieres'
            Matiere::where('id_matiere', $request->id)->update([
                'libelle' => $request->libelle,
                'top_primaire' => $request->top_primaire == '1' ? '1' : null,
                'top_secondaire' => $request->top_secondaire == '1' ? '2' : null,
                'top_superieur' => $request->top_superieur == '1' ? '3' : null,
            ]);

            //On retourne un message de succès
            return response()->json([
                'message' => "La matière a été mise à jour avec succès.",
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitement de votre demande. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    //Activation - Désactivation
    public function enable_matiere($id, $top_actif)
    {      
        try {
            //MAJ de la table 'matieres'
            Matiere::where('id_matiere', $id)->update(['top_actif' => $top_actif]);

            //On retourne un message de succès
            return response()->json([
                'message' => "La matière a été ".($top_actif == '0' ? 'activée' : 'désactivée'). " avec succès.",
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => "Nous corrigeons une erreur qui a interrompu votre demande. Veuillez réessayer plus tard."
            ], 400);
        }
    }
    
    //Suppression
    public function sup_matiere($id)
    {      
        try {
            //Suppression dans la table 'matieres'
            Matiere::where('id_matiere', $id)->delete();

            //On retourne un message de succès
            return response()->json([
                'res' => 0,
                'message' => "La matière a été supprimée avec succès.",
            ]);
            
        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'res' => 1,
                'message' => "Impossible de supprimer cette matière."
            ]);
        }
    }


    /**
     * Chapitre
     */
    
    //Ajout
    public function add_chapitre(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'libelle' => 'required|unique:chapitres,libelle',
            'niveau' => 'required|exists:niveaux,id_niveau',
            'matiere' => 'required|exists:matieres,id_matiere',
        ];

        //Messages d'erreurs
        $messages = [
            'libelle.required' => "Veuillez renseigner le chapitre.",
            'libelle.unique' => "Ce chapitre existe déjà.",
            'niveau.required' => "Veuillez sélectionner le niveau.",
            'niveau.exists' => "Le niveau sélectionné est incorrect.",
            'matiere.required' => "Veuillez sélectionner la matière.",
            'matiere.exists' => "La matière sélectionnée est incorrecte.",
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
         * Insertion dans la table 'chapitres'
         */
        try {
            //Insertion dans la table 'chapitres'
            Chapitre::create([
                'libelle' => $request->libelle,
                'id_niveau' => $request->niveau,
                'id_matiere' => $request->matiere,
            ]);

            //On retourne un message de succès
            return response()->json(['message' => "Le chapitre a été ajouté avec succès.",]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitement de votre demande. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    //Modification
    public function update_chapitre(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'libelle' => 'required|unique:chapitres,libelle,'.$request->id.',id_chapitre',
            'niveau' => 'required|exists:niveaux,id_niveau',
            'matiere' => 'required|exists:matieres,id_matiere',
        ];

        //Messages d'erreurs
        $messages = [
            'libelle.required' => "Veuillez renseigner le chapitre.",
            'libelle.unique' => "Ce chapitre existe déjà.",
            'niveau.required' => "Veuillez sélectionner le niveau.",
            'niveau.exists' => "Le niveau sélectionné est incorrect.",
            'matiere.required' => "Veuillez sélectionner la matière.",
            'matiere.exists' => "La matière sélectionnée est incorrecte.",
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
         * MAJ dans la table 'chapitres'
         */
        try {
            //MAJ de la table 'chapitres'
            Chapitre::where('id_chapitre', $request->id)->update([
                'libelle' => $request->libelle,
                'id_niveau' => $request->niveau,
                'id_matiere' => $request->matiere,
            ]);

            //On retourne un message de succès
            return response()->json(['message' => "Le chapitre a été mis à jour avec succès."]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitement de votre demande. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    //Activation - Désactivation
    public function enable_chapitre($id, $top_actif)
    {   
        try {
            //MAJ de la table 'chapitres'
            Chapitre::where('id_chapitre', $id)->update(['top_actif' => $top_actif]);

            //On retourne un message de succès
            return response()->json(['message' => "Le chapitre a été ".($top_actif == '0' ? 'activé' : 'désactivé'). " avec succès."]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => "Nous corrigeons une erreur qui a interrompu votre demande. Veuillez réessayer plus tard."
            ], 400);
        }
    }
    
    //Suppression
    public function sup_chapitre($id)
    {      
        try {
            //Suppression dans la table 'matieres'
            Chapitre::where('id_chapitre', $id)->delete();

            //On retourne un message de succès
            return response()->json([
                'res' => 0,
                'message' => "Le chapitre a été supprimé avec succès.",
            ]);
            
        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'res' => 1,
                'message' => "Impossible de supprimer ce chapitre."
            ]);
        }
    }


    /**
     * Leçon
     */
    
    //Ajout
    public function add_lecon(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'libelle' => 'required|unique:lecons,libelle',
            'chapitre' => 'required|exists:chapitres,id_chapitre',
        ];

        //Messages d'erreurs
        $messages = [
            'libelle.required' => "Veuillez renseigner la leçon.",
            'libelle.unique' => "Cette leçon existe déjà.",
            'chapitre.required' => "Veuillez sélectionner le chapitre.",
            'chapitre.exists' => "Le chapitre sélectionné est incorrect.",
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
         * Insertion dans la table 'lecons'
         */
        try {
            //Insertion dans la table 'lecons'
            Lecon::create([
                'libelle' => $request->libelle,
                'id_chapitre' => $request->chapitre,
            ]);

            //On retourne un message de succès
            return response()->json(['message' => "La leçon a été ajoutée avec succès.",]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitement de votre demande. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    //Modification
    public function update_lecon(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'libelle' => 'required|unique:lecons,libelle,'.$request->id.',id_lecon',
            'chapitre' => 'required|exists:chapitres,id_chapitre',
        ];

        //Messages d'erreurs
        $messages = [
            'libelle.required' => "Veuillez renseigner la leçon.",
            'libelle.unique' => "Cette leçon existe déjà.",
            'chapitre.required' => "Veuillez sélectionner le chapitre.",
            'chapitre.exists' => "Le chapitre sélectionné est incorrect.",
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
         * MAJ dans la table 'lecons'
         */
        try {
            //MAJ de la table 'lecons'
            Lecon::where('id_lecon', $request->id)->update([
                'libelle' => $request->libelle,
                'id_chapitre' => $request->chapitre,
            ]);

            //On retourne un message de succès
            return response()->json(['message' => "La leçon a été mise à jour avec succès."]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitement de votre demande. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    //Activation - Désactivation
    public function enable_lecon($id, $top_actif)
    {   
        try {
            //MAJ de la table 'lecons'
            Lecon::where('id_lecon', $id)->update(['top_actif' => $top_actif]);

            //On retourne un message de succès
            return response()->json(['message' => "La leçon a été ".($top_actif == '0' ? 'activée' : 'désactivée'). " avec succès."]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => "Nous corrigeons une erreur qui a interrompu votre demande. Veuillez réessayer plus tard."
            ], 400);
        }
    }
    
    //Suppression
    public function sup_lecon($id)
    {      
        try {
            //Suppression dans la table 'lecons'
            Lecon::where('id_lecon', $id)->delete();

            //On retourne un message de succès
            return response()->json([
                'res' => 0,
                'message' => "La leçon a été supprimée avec succès.",
            ]);
            
        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'res' => 1,
                'message' => "Impossible de supprimer cette leçon."
            ]);
        }
    }





    //Autorisation de publication
    public function enable_publication($identifiant, $top_publication)
    {   
        try {
            //MAJ de la table 'enseignants'
            Enseignant::where('identifiant', $identifiant)->update(['top_publication' => $top_publication]);

            //On retourne un message de succès
            return response()->json(['message' => "L'autorisation de publication a été ".($top_publication == '1' ? 'activée' : 'désactivée'). " avec succès."]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => "Nous corrigeons une erreur qui a interrompu votre demande. Veuillez réessayer plus tard."
            ], 400);
        }
    }
    
}
