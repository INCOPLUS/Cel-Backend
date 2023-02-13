<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Eleve;
use App\Mail\TestMail;
use App\Models\CelPay;
use App\Models\Niveau;
use App\Models\Matiere;
use App\Models\Parents;
use App\Models\Enseignant;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class InscriptionController extends Controller
{

    /**
     * Inscription d'un élève
     */
    public function inscription_eleve(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'nom_eleve' => 'required',
            'email_eleve' => 'nullable|email|unique:utilisateurs,email',
            'contact_eleve' => 'required',
            'genre_eleve' => 'nullable|in:1,2',
            'enseignement_eleve' => 'nullable|exists:enseignement,id_enseignement',
            'niveau_eleve' => 'nullable|exists:niveaux,id_niveau',
            'mdp_eleve' => 'required'
        ];

        //Messages d'erreurs
        $messages = [
            'nom_eleve.required' => 'Veuillez renseigner votre nom & prénom.',
            // 'email_eleve.required' => "Veuillez renseigner votre adresse email.",
            'email_eleve.email' => "L'adresse email est incorrecte.",
            'email_eleve.unique' => "Ce mail appartient déjà à un utilisateur.",
            'contact_eleve.required' => "Veuillez renseigner votre contact (WhatsApp).",
            'enseignement_eleve.exists' => "L'enseignement sélectionné est incorrect.",
            'niveau_eleve.exists' => "Le niveau sélectionné est incorrect.",
            'genre_eleve.in' => "Le genre choisi est incorrect.",
            // 'enseignement_eleve.required' => "Veuillez sélectionner votre enseignement.",
            // 'niveau_eleve.required' => "Veuillez sélectionner votre viveau.",
            // 'genre_eleve.required' => "Veuillez sélectionner votre genre (M ou F).",
            'mdp_eleve.required' => "Veuillez renseigner votre mot de passe.",
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
         * Début de la transaction
         */
        DB::beginTransaction();

        try {
            //Génération de l'identifiant CEL (CELA0001) de l'élève
            $identifiant = DB::select("SELECT IF(COUNT(id_eleve)=0, 'CELA0001', IF(LENGTH(MAX(id_eleve))<=4, CONCAT('CELA', LPAD(MAX(id_eleve)+1,4,'0')), CONCAT('CELA', MAX(id_eleve)+1))) AS identifiant FROM eleves")[0]->identifiant;
            
            //Insertion dans la table 'utilisateurs'
            Utilisateur::create([
                'identifiant' => $identifiant,
                'nom_prenom' => $request->nom_eleve,
                'email' => $request->email_eleve ?? null,
                'telephone' => $request->contact_eleve,
                'genre' => $request->genre_eleve ?? null,
                // 'mdp' => Hash::make($request->mdp_eleve),
                'mdp' => bcrypt($request->mdp_eleve),
                'top_user' => 2,
            ]);

            //Insertion dans la table 'eleves'
            Eleve::create([
                'identifiant' => $identifiant,
                'id_enseignement' => $request->enseignement_eleve ?? null,
                'id_niveau' => $request->niveau_eleve ?? null,
            ]);

            //Création du compte CELPAY de l'élève (avec 0 Frs comme solde)
            CelPay::create(['identifiant' => $identifiant]);

            //Envoi d'un mail à l'élève (identifiant, mot de passe)
            if (!empty($request->email_eleve)) {
                $details = ['identifiant' => $identifiant, 'mdp' => $request->mdp_eleve];
                Mail::to($request->email_eleve)->send(new TestMail($details));
            }
            
            //Si tout est bon, on fait un commit
            DB::commit();

            //On retourne un message de succès
            return response()->json([
                'message' => 'Le compte a été créé avec succès.',
                'identifiant' => $identifiant,
                'redirect_url' => route('connexion')
            ]);

        } catch (\Exception $ex) {
            //S'il y a une erreur, on fait un rollback
            DB::rollBack();

            //throw $ex;

            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitrement de votre inscription. Veuillez réessayer plus tard.'
            ], 400);
        }
    }


    /**
     * Inscription d'un enseignant
     */
    public function inscription_enseignant(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'nom_enseignant' => 'required',
            'email_enseignant' => 'nullable|email|unique:utilisateurs,email',
            'contact_enseignant' => 'required',
            'genre_enseignant' => 'nullable|in:1,2',
            'enseignement_enseignant' => 'nullable|exists:enseignement,id_enseignement',
            'discipline_enseignant' => 'nullable|exists:niveaux,id_niveau',
            'mdp_enseignant' => 'required'
        ];

        //Messages d'erreurs
        $messages = [
            'nom_enseignant.required' => 'Veuillez renseigner votre nom & prénom.',
            // 'email_enseignant.required' => "Veuillez renseigner votre adresse email.",
            'email_enseignant.email' => "L'adresse email est incorrecte.",
            'email_enseignant.unique' => "Ce mail appartient déjà à un utilisateur.",
            'contact_enseignant.required' => "Veuillez renseigner votre contact (WhatsApp).",
            'enseignement_enseignant.exists' => "L'enseignement sélectionné est incorrect.",
            'discipline_enseignant.exists' => "La discipline sélectionnée est incorrecte.",
            'genre_enseignant.in' => "Le genre choisi est incorrect.",
            // 'enseignement_enseignant.required' => "Veuillez sélectionner votre enseignement.",
            // 'discipline_enseignant.required' => "Veuillez sélectionner votre discipline.",
            // 'genre_enseignant.required' => "Veuillez sélectionner votre genre (M ou F).",
            'mdp_enseignant.required' => "Veuillez renseigner votre mot de passe.",
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
         * Début de la transaction
         */
        DB::beginTransaction();

        try {
            //Génération de l'identifiant CEL (CELE0001) de l'enseignant
            $identifiant = DB::select("SELECT IF(COUNT(id_enseignant)=0, 'CELE0001', IF(LENGTH(MAX(id_enseignant))<=4, CONCAT('CELE', LPAD(MAX(id_enseignant)+1,4,'0')), CONCAT('CELE', MAX(id_enseignant)+1))) AS identifiant FROM enseignants")[0]->identifiant;
            
            //Insertion dans la table 'utilisateurs'
            Utilisateur::create([
                'identifiant' => $identifiant,
                'nom_prenom' => $request->nom_enseignant,
                'email' => $request->email_enseignant ?? null,
                'telephone' => $request->contact_enseignant,
                'genre' => $request->genre_enseignant ?? null,
                'mdp' => bcrypt($request->mdp_enseignant),
                'top_user' => 3,
            ]);

            //Insertion dans la table 'enseignants'
            Enseignant::create([
                'identifiant' => $identifiant,
                'id_enseignement' => $request->enseignement_enseignant ?? null,
                'id_matiere' => $request->discipline_enseignant ?? null,
            ]);

            //Création du compte CELPAY de l'enseignant (avec 0 Frs comme solde)
            CelPay::create(['identifiant' => $identifiant]);

            //Envoi d'un mail à l'enseignant (identifiant, mot de passe)
            if (!empty($request->email_enseignant)) {
                $details = ['identifiant' => $identifiant, 'mdp' => $request->mdp_enseignant];
                Mail::to($request->email_enseignant)->send(new TestMail($details));
            }
            
            //Si tout est bon, on fait un commit
            DB::commit();

            //On retourne un message de succès
            return response()->json([
                'message' => 'Le compte a été créé avec succès.',
                'identifiant' => $identifiant,
                'redirect_url' => route('connexion')
            ]);

        } catch (\Exception $ex) {
            //S'il y a une erreur, on fait un rollback
            DB::rollBack();

            //throw $ex;

            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitrement de votre inscription. Veuillez réessayer plus tard.'
            ], 400);
        }
    }


    /**
     * Inscription d'un parent
     */
    public function inscription_parent(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'nom_parent' => 'required',
            'email_parent' => 'nullable|email|unique:utilisateurs,email',
            'contact_parent' => 'required',
            'genre_parent' => 'nullable|in:1,2',
            'profession_parent' => 'nullable',
            'nbre_enfant_parent' => 'nullable',
            'mdp_parent' => 'required'
        ];

        //Messages d'erreurs
        $messages = [
            'nom_parent.required' => 'Veuillez renseigner votre nom & prénom.',
            // 'email_parent.required' => "Veuillez renseigner votre adresse email.",
            'email_parent.email' => "L'adresse email est incorrecte.",
            'email_parent.unique' => "Ce mail appartient déjà à un utilisateur.",
            'contact_parent.required' => "Veuillez renseigner votre contact (WhatsApp).",
            'genre_parent.in' => "Le genre choisi est incorrect.",
            'mdp_parent.required' => "Veuillez renseigner votre mot de passe.",
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
         * Début de la transaction
         */
        DB::beginTransaction();

        try {
            //Génération de l'identifiant CEL (CELE0001) du parent
            $identifiant = DB::select("SELECT IF(COUNT(id_parent)=0, 'CELP0001', IF(LENGTH(MAX(id_parent))<=4, CONCAT('CELP', LPAD(MAX(id_parent)+1,4,'0')), CONCAT('CELP', MAX(id_parent)+1))) AS identifiant FROM parents")[0]->identifiant;
            
            //Insertion dans la table 'utilisateurs'
            Utilisateur::create([
                'identifiant' => $identifiant,
                'nom_prenom' => $request->nom_parent,
                'email' => $request->email_parent ?? null,
                'telephone' => $request->contact_parent,
                'genre' => $request->genre_parent ?? null,
                'mdp' => bcrypt($request->mdp_parent),
                'top_user' => 4,
            ]);

            //Insertion dans la table 'parents'
            Parents::create([
                'identifiant' => $identifiant,
                'profession' => $request->profession_parent ?? null,
                'nbre_enfants' => $request->nbre_enfant_parent ?? null,
            ]);

            //Création du compte CELPAY du parent (avec 0 Frs comme solde)
            CelPay::create(['identifiant' => $identifiant]);

            //Envoi d'un mail au parent (identifiant, mot de passe)
            if (!empty($request->email_parent)) {
                $details = ['identifiant' => $identifiant, 'mdp' => $request->mdp_parent];
                Mail::to($request->email_parent)->send(new TestMail($details));
            }
            
            //Si tout est bon, on fait un commit
            DB::commit();

            //On retourne un message de succès
            return response()->json([
                'message' => 'Le compte a été créé avec succès.',
                'identifiant' => $identifiant,
                'redirect_url' => route('connexion')
            ]);

        } catch (\Exception $ex) {
            //S'il y a une erreur, on fait un rollback
            DB::rollBack();

            //throw $ex;

            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitrement de votre inscription. Veuillez réessayer plus tard.'
            ], 400);
        }
    }


    /**
     * Connexion d'un utilisateur
     */
    public function connexion_utilisateur(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'identifiant' => 'required|exists:utilisateurs,identifiant',
            'mdp' => 'required'
        ];

        //Messages d'erreurs
        $messages = [
            'identifiant.required' => 'Veuillez renseigner votre identifiant.',
            'identifiant.exists' => "Votre identifiant est incorrect.",
            'mdp.required' => "Veuillez renseigner votre mot de passe.",
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


        //On récupére l'utilisateur
        $user = Utilisateur::where('identifiant', $request->identifiant)->where('top_user', '!=', 1)->where('top_actif', 0)->first();

        //Vérification du mot de passe
        if ($user && password_verify($request->mdp, $user->mdp)) {
            //Génération de la session
            $request->session()->regenerate();
            Auth::login($user);
            
            //Récupération de l'url adéquat
            if ($user->top_user == '2') $redirect_url = route('eleve-accueil');
            elseif ($user->top_user == '3') $redirect_url = route('enseignant-accueil');
            elseif ($user->top_user == '4') $redirect_url = route('parent-accueil');
            else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                $redirect_url = route('connexion');
            }

            //On retourne un message de succès
            return response()->json([
                'message' => 'Connexion réussie...',
                'redirect_url' => $redirect_url
            ]);
        }
        else {
            return response()->json([
                'message' => "Erreur de validation des données.",
                'erreurs' =>["Identifiant ou Mot de passe incorrect."]
            ]);
        }



        // $credentials = $request->validate([
        //     'identifiant' => ['required'/*, 'exists:utilisateurs,identifiant'*/],
        //     'mdp' => ['required'],
        // ]);
 
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
 
        //     return redirect()->intended('admin-accueil');
        // }

        // return response()->json([
        //     'message' => "Erreur de validation des données.",
        //     'erreurs' =>["Identifiant ou Mot de passe incorrect."]
        // ]);
        
    }


    /**
     * Déconnexion d'un utilisateur
     */
    public function deconnexion(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/connexion');
    }


    /**
     * Connexion d'un administrateur
     */
    public function connexion_admin(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'identifiant' => 'required|exists:utilisateurs,identifiant',
            'mdp' => 'required'
        ];

        //Messages d'erreurs
        $messages = [
            'identifiant.required' => 'Veuillez renseigner votre identifiant.',
            'identifiant.exists' => "Votre identifiant est incorrect.",
            'mdp.required' => "Veuillez renseigner votre mot de passe.",
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


        //On récupére l'utilisateur
        $user = Utilisateur::where('identifiant', $request->identifiant)->where('top_user', 1)->where('top_actif', 0)->first();

        //Vérification du mot de passe
        if ($user && password_verify($request->mdp, $user->mdp)) {
            //Génération de la session
            $request->session()->regenerate();
            Auth::login($user);
            
            //Récupération de l'url adéquat
            if ($user->top_user == '1') $redirect_url = route('admin-accueil');
            else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                $redirect_url = route('connexion');
            }

            //On retourne un message de succès
            return response()->json([
                'message' => 'Connexion réussie...',
                'redirect_url' => $redirect_url
            ]);
        }
        else {
            return response()->json([
                'message' => "Erreur de validation des données.",
                'erreurs' =>["Identifiant ou Mot de passe incorrect."]
            ]);
        }
    }


    /**
     * Déconnexion d'un administrateur
     */
    public function deconnexion_admin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/connexion/admin');
    }



    /**
     * Test d'envoi d'un mail
     */
    public function sendmail_test()
    {
        $details = [
            'identifiant' => 'CELP0005',
            'mdp' => '@Lumiere001$'
        ];
        Mail::to('akafawase@gmail.com')->send(new TestMail($details));

        dd("Mail envoyé avec succès");

        //$result = DB::select("SELECT IF(COUNT(id_eleve)=0, 'CELA0001', IF(LENGTH(MAX(id_eleve))<=4, CONCAT('CELA', LPAD(MAX(id_eleve)+1,4,'0')), CONCAT('CELA', MAX(id_eleve)+1))) AS identifiant FROM eleves")[0]->identifiant;

        //$result = DB::select("SELECT IF(COUNT(id_enseignant)=0, 'CELE0001', IF(LENGTH(MAX(id_enseignant))<=4, CONCAT('CELE', LPAD(MAX(id_enseignant)+1,4,'0')), CONCAT('CELE', MAX(id_enseignant)+1))) AS identifiant FROM enseignants")[0]->identifiant;

        //$result = DB::select("SELECT IF(COUNT(id_parent)=0, 'CELP0001', IF(LENGTH(MAX(id_parent))<=4, CONCAT('CELP', LPAD(MAX(id_parent)+1,4,'0')), CONCAT('CELP', MAX(id_parent)+1))) AS identifiant FROM parents")[0]->identifiant;

        //dd($result);
    }

}
