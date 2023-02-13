<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\UploadController;
use App\Http\Controllers\Frontend\AccueilController;
use App\Http\Controllers\Frontend\CinetPayController;
use App\Http\Controllers\Frontend\ParametreController;
use App\Http\Controllers\Backend\Eleve\CelPayController;
use App\Http\Controllers\Frontend\InscriptionController;
use App\Http\Controllers\Backend\Eleve\ViewEleveController;
use App\Http\Controllers\Backend\Enseignant\SujetController;
use App\Http\Controllers\Backend\Eleve\CompositionController;
use App\Http\Controllers\Backend\Enseignant\ProfilController;
use App\Http\Controllers\Backend\Parent\ViewParentController;
use App\Http\Controllers\Backend\Administrateur\ViewAdminController;
use App\Http\Controllers\Backend\Enseignant\ViewEnseignantController;
use App\Http\Controllers\Backend\Administrateur\ParametrageController;
use App\Http\Controllers\Backend\Eleve\SujetController as EleveSujetController;

/*
|--------------------------------------------------------------------------
| FRONT-END
|--------------------------------------------------------------------------
|
*/

Route::get('/', [AccueilController::class, 'index'])->name('accueil');
Route::get('/a-propos', [AccueilController::class, 'about'])->name('about');
Route::get('/blogs', [AccueilController::class, 'blogs'])->name('blogs');
Route::get('/contact', [AccueilController::class, 'contact'])->name('contact');
Route::get('/inscription', [AccueilController::class, 'inscription'])->name('inscription');
Route::get('/connexion', [AccueilController::class, 'connexion'])->name('connexion');
Route::get('/connexion/admin', [AccueilController::class, 'connexion_admin'])->name('connexionadmin');
Route::get('/mdp-oublie', [AccueilController::class, 'mdp_oublie'])->name('mdp-oublie');
Route::get('/enseignement', [AccueilController::class, 'enseignement'])->name('enseignement');
Route::get('/composition', [AccueilController::class, 'composition'])->name('composition');
Route::get('/annonces-publicitaires', [AccueilController::class, 'annonce_pub'])->name('annonce-pub');
Route::get('/detail-blog', [AccueilController::class, 'detail_blog'])->name('detail-blog');

//Inscription
Route::post('/inscription-eleve', [InscriptionController::class, 'inscription_eleve'])->name('inscription-eleve');
Route::post('/inscription-enseignant', [InscriptionController::class, 'inscription_enseignant'])->name('inscription-enseignant');
Route::post('/inscription-parent', [InscriptionController::class, 'inscription_parent'])->name('inscription-parent');
//Connexion
Route::post('/connexion-utilisateur', [InscriptionController::class, 'connexion_utilisateur'])->name('connexion-utilisateur');
Route::post('/connexion-admin', [InscriptionController::class, 'connexion_admin'])->name('connexion-admin');
//Déconnexion
Route::get('/deconnexion', [InscriptionController::class, 'deconnexion'])->name('deconnexion');
Route::get('/deconnexion-admin', [InscriptionController::class, 'deconnexion_admin'])->name('deconnexion-admin');

//Upload de fichiers
Route::post('/upload', [UploadController::class, 'store'])->name('upload-files');


/*
|--------------------------------------------------------------------------
| TABLES PARAMETRES
|--------------------------------------------------------------------------
|
*/
Route::get('/niveaux/{id_enseignement}', [ParametreController::class, 'niveaux'])->name('niveaux-enseignement');
Route::get('/matieres/{id_enseignement}', [ParametreController::class, 'matieres'])->name('matieres-enseignement');
Route::get('/villes/{id_pays}', [ParametreController::class, 'villes'])->name('villes-pays');
Route::get('/chapitres/{id_niveau}/{id_matiere}', [ParametreController::class, 'chapitres'])->name('chapitres');
Route::get('/lecons/{id_chapitre}', [ParametreController::class, 'lecons'])->name('lecons');
Route::get('/series/{id_chapitre}', [ParametreController::class, 'series'])->name('series');
Route::get('/beneficiaires/{statut}', [ParametreController::class, 'beneficiaires'])->name('beneficiaires-transfert');



//Test Envoi Mail
//Route::get('/sendmail-test', [InscriptionController::class, 'sendmail_test'])->name('sendmail-test');


/*
|--------------------------------------------------------------------------
| BACK-END (ADMINISTRATEUR)
|--------------------------------------------------------------------------
|
*/
Route::middleware('auth.admin')->prefix('admin/admin')->group(function () {
    Route::get('/', [ViewAdminController::class, 'index'])->name('admin-accueil');
    Route::get('/gestion-site', [ViewAdminController::class, 'gestion_site'])->name('admin-gestion-site');
    Route::get('/gestion-sujets', [ViewAdminController::class, 'gestion_sujet'])->name('admin-gestion-sujet');
    // Route::get('/parametres-sujets', [ViewAdminController::class, 'parametre_sujet'])->name('admin-parametre-sujet');
    Route::get('/parametrages', [ViewAdminController::class, 'parametrage'])->name('admin-parametrage');
    Route::get('/gestion-examens', [ViewAdminController::class, 'gestion_examen'])->name('admin-gestion-examen');
    Route::get('/gestion-oral', [ViewAdminController::class, 'gestion_oral'])->name('admin-gestion-oral');
    Route::get('/gestion-cours', [ViewAdminController::class, 'gestion_cours'])->name('admin-gestion-cours');
    Route::get('/liste-enseignants', [ViewAdminController::class, 'liste_enseignants'])->name('admin-liste-enseignants');
    Route::get('/liste-eleves', [ViewAdminController::class, 'liste_eleves'])->name('admin-liste-eleves');
    Route::get('/liste-parents', [ViewAdminController::class, 'liste_parents'])->name('admin-liste-parents');
    Route::get('/emploi-du-temps', [ViewAdminController::class, 'emploi_temps'])->name('admin-emploi-temps');
    Route::get('/compte-celpay', [ViewAdminController::class, 'compte_celpay'])->name('admin-compte-celpay');
    Route::get('/tutoriel', [ViewAdminController::class, 'tutoriel'])->name('admin-tutoriel');
    Route::get('/celchat', [ViewAdminController::class, 'celchat'])->name('admin-celchat');
    Route::get('/banquet-sujet', [ViewAdminController::class, 'banquet_sujet'])->name('admin-banquet-sujet');
    Route::get('/detail-candidat-examen', [ViewAdminController::class, 'detail_candidat_examen'])->name('admin-detail-candidat-examen');

    /**
     * Parametrages
     */

    //Enseignement
    Route::post('/add-enseignement', [ParametrageController::class, 'add_enseignement'])->name('admin-add-enseignement');
    Route::post('/update-enseignement', [ParametrageController::class, 'update_enseignement'])->name('admin-update-enseignement');
    Route::get('/sup-enseignement/{id}', [ParametrageController::class, 'sup_enseignement'])->name('enseignant-sup-enseignement');
    Route::get('/enable-enseignement/{id}/{top_actif}', [ParametrageController::class, 'enable_enseignement'])->name('enseignant-enable-enseignement');
    
    //Niveau
    Route::post('/add-niveau', [ParametrageController::class, 'add_niveau'])->name('admin-add-niveau');
    Route::post('/update-niveau', [ParametrageController::class, 'update_niveau'])->name('admin-update-niveau');
    Route::get('/sup-niveau/{id}', [ParametrageController::class, 'sup_niveau'])->name('enseignant-sup-niveau');
    Route::get('/enable-niveau/{id}/{top_actif}', [ParametrageController::class, 'enable_niveau'])->name('enseignant-enable-niveau');

    //Type Sujet
    Route::post('/add-typesujet', [ParametrageController::class, 'add_typesujet'])->name('admin-add-typesujet');
    Route::post('/update-typesujet', [ParametrageController::class, 'update_typesujet'])->name('admin-update-typesujet');
    Route::get('/sup-typesujet/{id}', [ParametrageController::class, 'sup_typesujet'])->name('enseignant-sup-typesujet');
    Route::get('/enable-typesujet/{id}/{top_actif}', [ParametrageController::class, 'enable_typesujet'])->name('enseignant-enable-typesujet');
    
    //Matière
    Route::post('/add-matiere', [ParametrageController::class, 'add_matiere'])->name('admin-add-matiere');
    Route::post('/update-matiere', [ParametrageController::class, 'update_matiere'])->name('admin-update-matiere');
    Route::get('/sup-matiere/{id}', [ParametrageController::class, 'sup_matiere'])->name('enseignant-sup-matiere');
    Route::get('/enable-matiere/{id}/{top_actif}', [ParametrageController::class, 'enable_matiere'])->name('enseignant-enable-matiere');
    
    //Chapitre
    Route::post('/add-chapitre', [ParametrageController::class, 'add_chapitre'])->name('admin-add-chapitre');
    Route::post('/update-chapitre', [ParametrageController::class, 'update_chapitre'])->name('admin-update-chapitre');
    Route::get('/sup-chapitre/{id}', [ParametrageController::class, 'sup_chapitre'])->name('enseignant-sup-chapitre');
    Route::get('/enable-chapitre/{id}/{top_actif}', [ParametrageController::class, 'enable_chapitre'])->name('enseignant-enable-chapitre');
    
    //Leçon
    Route::post('/add-lecon', [ParametrageController::class, 'add_lecon'])->name('admin-add-lecon');
    Route::post('/update-lecon', [ParametrageController::class, 'update_lecon'])->name('admin-update-lecon');
    Route::get('/sup-lecon/{id}', [ParametrageController::class, 'sup_lecon'])->name('enseignant-sup-lecon');
    Route::get('/enable-lecon/{id}/{top_actif}', [ParametrageController::class, 'enable_lecon'])->name('enseignant-enable-lecon');

    //Autorisation de publication
    Route::get('/enable-publication/{identifiant}/{top_publication}', [ParametrageController::class, 'enable_publication'])->name('enseignant-enable-publication');

});


/*
|--------------------------------------------------------------------------
| BACK-END (ENSEIGNANT)
|--------------------------------------------------------------------------
|
*/
Route::middleware('auth.enseignant')->prefix('admin/enseignant')->group(function () {
    Route::get('/', [ViewEnseignantController::class, 'index'])->name('enseignant-accueil');
    Route::get('/gestion-sujets', [ViewEnseignantController::class, 'gestion_sujet'])->name('enseignant-gestion-sujet');
    Route::get('/gestion-oral', [ViewEnseignantController::class, 'gestion_oral'])->name('enseignant-gestion-oral');
    Route::get('/gestion-cours', [ViewEnseignantController::class, 'gestion_cours'])->name('enseignant-gestion-cours');
    Route::get('/emploi-du-temps', [ViewEnseignantController::class, 'emploi_temps'])->name('enseignant-emploi-temps');
    Route::get('/compte-celpay', [ViewEnseignantController::class, 'compte_celpay'])->name('enseignant-compte-celpay');
    Route::get('/tutoriel', [ViewEnseignantController::class, 'tutoriel'])->name('enseignant-tutoriel');
    Route::get('/celchat', [ViewEnseignantController::class, 'celchat'])->name('enseignant-celchat');
    Route::get('/faire-demande', [ViewEnseignantController::class, 'faire_demande'])->name('enseignant-faire-demande');
    Route::get('/notifications', [ViewEnseignantController::class, 'notifications'])->name('enseignant-notifications');
    Route::get('/profil', [ViewEnseignantController::class, 'profil'])->name('enseignant-profil');
    Route::get('/mis-a-jour-profil', [ViewEnseignantController::class, 'update_profil'])->name('enseignant-maj-profil');
    Route::get('/mis-a-jour-mdp', [ViewEnseignantController::class, 'update_mdp'])->name('enseignant-maj-mdp');
    Route::get('/ajout-sujet', [ViewEnseignantController::class, 'ajout_sujet'])->name('enseignant-ajout-sujet');
    Route::get('/previsualiser-sujet/{id_sujet}', [ViewEnseignantController::class, 'previsualiser_sujet'])->name('enseignant-previsualiser-sujet');
    Route::get('/modifier-sujet/{id_sujet}', [ViewEnseignantController::class, 'modifier_sujet'])->name('enseignant-modifier-sujet');
    Route::get('/ajout-sujet-2', [ViewEnseignantController::class, 'ajout_sujet_2'])->name('enseignant-ajout-sujet-2');

    //Mise à jour du Profil
    Route::post('/maj-infos-perso', [ProfilController::class, 'maj_infos_perso'])->name('enseignant-maj-infos-perso');
    Route::post('/maj-piece', [ProfilController::class, 'maj_piece'])->name('enseignant-maj-piece');
    Route::post('/maj-cv', [ProfilController::class, 'maj_cv'])->name('enseignant-maj-cv');
    Route::post('/maj-diplome', [ProfilController::class, 'maj_diplome'])->name('enseignant-maj-diplome');
    Route::get('/sup-diplome/{id}', [ProfilController::class, 'sup_diplome'])->name('enseignant-sup-diplome');
    
    //Gestion des sujets
    Route::post('/add-sujet', [SujetController::class, 'add_sujet'])->name('enseignant-add-sujet');
    Route::post('/update-sujet/{id_sujet}', [SujetController::class, 'update_sujet'])->name('enseignant-update-sujet');
    Route::get('/publish-sujet/{id_sujet}', [SujetController::class, 'publish_sujet'])->name('enseignant-publish-sujet');

    //Transaction CELPAY
    Route::post('/rechargement-celpay', [CelPayController::class, 'rechargement'])->name('enseignant-rechargement-celpay');
    Route::post('/transfert-celpay', [CelPayController::class, 'transfert'])->name('enseignant-transfert-celpay');
});


/*
|--------------------------------------------------------------------------
| BACK-END (ELEVE)
|--------------------------------------------------------------------------
|
*/
Route::middleware('auth.eleve')->prefix('admin/eleve')->group(function () {
    Route::get('/', [ViewEleveController::class, 'index'])->name('eleve-accueil');
    Route::get('/sujets', [ViewEleveController::class, 'sujets'])->name('eleve-sujets');
    Route::get('/panier', [ViewEleveController::class, 'panier'])->name('eleve-panier');
    Route::get('/composition', [ViewEleveController::class, 'compo'])->name('eleve-compo');
    Route::get('/composition/{id}', [ViewEleveController::class, 'composition'])->name('eleve-composition');
    Route::get('/examen', [ViewEleveController::class, 'examen'])->name('eleve-examen');
    Route::get('/distinction', [ViewEleveController::class, 'distinction'])->name('eleve-distinction');
    Route::get('/documents', [ViewEleveController::class, 'document'])->name('eleve-document');
    Route::get('/compte-celpay', [ViewEleveController::class, 'compte_celpay'])->name('eleve-compte-celpay');
    Route::get('/celchat', [ViewEleveController::class, 'celchat'])->name('eleve-celchat');
    Route::get('/faire-demande', [ViewEleveController::class, 'faire_demande'])->name('eleve-faire-demande');

    //Gestion des sujets
    Route::get('/ajout-panier/{id}', [EleveSujetController::class, 'ajout_panier'])->name('eleve-ajout-panier');
    Route::get('/retrait-panier/{id}', [EleveSujetController::class, 'retrait_panier'])->name('eleve-retrait-panier');
    Route::get('/vider-panier', [EleveSujetController::class, 'vider_panier'])->name('eleve-vider-panier');
    Route::get('/achat-sujet/{id}', [EleveSujetController::class, 'achat_sujet'])->name('eleve-achat-sujet');
    Route::get('/achat-panier', [EleveSujetController::class, 'achat_panier'])->name('eleve-achat-panier');

    //Gestion des compositions
    Route::get('/debuter-compo/{id}/{date}', [CompositionController::class, 'debuter_compo'])->name('eleve-debuter-compo');
    Route::post('/valider-compo', [CompositionController::class, 'valider_compo'])->name('eleve-valider-compo');
    Route::post('/abandonner-compo', [CompositionController::class, 'abandonner_compo'])->name('eleve-abandonner-compo');
    Route::get('/correction-sujet/{id}', [CompositionController::class, 'correction_sujet'])->name('eleve-correction-sujet');
    
    //Transaction CELPAY
    Route::post('/rechargement-celpay', [CelPayController::class, 'rechargement'])->name('eleve-rechargement-celpay');
    Route::post('/rechargement2-celpay', [CelPayController::class, 'rechargement2'])->name('eleve-rechargement2-celpay');
    Route::post('/transfert-celpay', [CelPayController::class, 'transfert'])->name('eleve-transfert-celpay');
});


/*
|--------------------------------------------------------------------------
| BACK-END (PARENT)
|--------------------------------------------------------------------------
|
*/
Route::middleware('auth.parent')->prefix('admin/parent')->group(function () {
    Route::get('/', [ViewParentController::class, 'index'])->name('parent-accueil');
    Route::get('/liste-enfants', [ViewParentController::class, 'liste_enfant'])->name('parent-liste-enfant');
    Route::get('/composition', [ViewParentController::class, 'composition'])->name('parent-composition');
    Route::get('/gestion-compte', [ViewParentController::class, 'gestion_compte'])->name('parent-gestion-compte');
    Route::get('/documents', [ViewParentController::class, 'document'])->name('parent-document');
    Route::get('/compte-celpay', [ViewParentController::class, 'compte_celpay'])->name('parent-compte-celpay');
    Route::get('/celchat', [ViewParentController::class, 'celchat'])->name('parent-celchat');
    Route::get('/faire-demande', [ViewParentController::class, 'faire_demande'])->name('parent-faire-demande');

    //Transaction CELPAY
    Route::post('/rechargement-celpay', [CelPayController::class, 'rechargement'])->name('parent-rechargement-celpay');
    Route::post('/transfert-celpay', [CelPayController::class, 'transfert'])->name('parent-transfert-celpay');
});



/*
|--------------------------------------------------------------------------
| CINETPAY
|--------------------------------------------------------------------------
|
*/
Route::post('/cinetpay/notification', [CinetPayController::class, 'notification'])->name('cinetpay-notification');
Route::post('/cinetpay/retour', [CinetPayController::class, 'retour'])->name('cinetpay-retour');
