//Déclaration des variables
var tab_old = "tab-enseignement";

/*=====================================
    FONCTIONS DES MESSAGES D'ALERTE    
======================================*/
function alertSuccess(message) {
    Swal.fire('Félicitations...', message, 'success');
}
function alertSuccessRefresh(page, message) {
    Swal.fire({
        icon: 'success', 
        title: 'Félicitations...', 
        text: message,
        willClose: () => { 
            sessionStorage.setItem(page, "true");
            document.location.reload();
        }
    });
}
function alertSuccessRedirect(message, url) {
    Swal.fire({
        icon: 'success', title: 'Félicitations...', text: message,
        willClose: () => { window.location.href = url }
    });
}
function alertSuccessReload(message) {
    Swal.fire({
        icon: 'success', title: 'Félicitations...', text: message,
        willClose: () => { location.reload(); }
    });
}
function alertErreur(message) {
    Swal.fire({icon: 'error', title: 'Attention...', html: message});
}
function alertErreurFocus(message, index) {
    $('#'+index).focus();
    Swal.fire({icon: 'error', title: 'Attention...', html: message});
}
function alertConfirmDelete(params) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
    });
}

/*===================================
        LOADER DE CHARGEMENT
====================================*/
function showBtnLoading(id, text) {
    $('#'+id).prop('disabled', true);
    $('#'+id).html("<i class='fa fa-spinner fa-spin'></i> "+text);
}
function hideBtnLoading(id, text) {
    $('#'+id).prop('disabled', false);
    $('#'+id).html(text);
}
function hideBtnLoadingIcon(id, icon, text) {
    $('#'+id).prop('disabled', false);
    $('#'+id).html("<i class='fa "+icon+"'></i> "+text);
}

//Après chargement de la page
window.onload = function() {
    var reload_tabs_parametrage = sessionStorage.getItem("reload_tabs_parametrage");
    if (reload_tabs_parametrage) {
        sessionStorage.removeItem("reload_tabs_parametrage");
        selectParametrageTabs();
    }
}

//Activation des onglets
function selectParametrageTabs() {
    var tab_new = sessionStorage.getItem("tab_params_new");

    $("#"+tab_old).removeClass("active");
    $("#"+tab_old+"-content").removeClass("show active");

    $("#"+tab_new).addClass("active");
    $("#"+tab_new+"-content").addClass("show active");

    tab_old = tab_new;
    sessionStorage.removeItem("tab_params_new");
}

//Récupération de la valeur du Checkbox
function getCheckboxValue(id_checkbox) {
    var value = 0;
    if ($('#'+id_checkbox).is(':checked')) value = 1;
    return value;
}


/*==============================
        TYPE ENSEIGNEMENT       
================================*/
//Ajout
$('#form_add_enseignement').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    //Loader de chargement...
    showBtnLoading("btn_add_enseignement", "Sauvegarde en cours...");
    
    //Requête AJAX
    $.ajax({
        url: $(that).attr('action'),
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            libelle: $.trim($('#libelle_add_enseignement').val()),
            statut: $.trim($('#statut_add_enseignement').val()),
        },
        success: function (data, textStatus, jqXHR) {
            hideBtnLoadingIcon("btn_add_enseignement", "fa-check", "Valider");
            
            //S'il ya une erreur
            if (data.erreurs != null) {
                var msg = "";
                data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                alertErreur(msg);
            } 
            //Message de succès
            else {
                sessionStorage.setItem("tab_params_new", "tab-enseignement");
                alertSuccessRefresh("reload_tabs_parametrage", data.message);
            }
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoadingIcon("btn_add_enseignement", "fa-check", "Valider");
            alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
});

//Modification
$('#form_update_enseignement').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    //Loader de chargement...
    showBtnLoading("btn_update_enseignement", "Sauvegarde en cours...");
    
    //Requête AJAX
    $.ajax({
        url: $(that).attr('action'),
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            id: $.trim($('#id_update_enseignement').val()),
            libelle: $.trim($('#libelle_update_enseignement').val()),
            statut: $.trim($('#statut_update_enseignement').val()),
        },
        success: function (data, textStatus, jqXHR) {
            hideBtnLoadingIcon("btn_update_enseignement", "fa-pencil", "Modifier");
            
            //S'il ya une erreur
            if (data.erreurs != null) {
                var msg = "";
                data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                alertErreur(msg);
            } 
            //Message de succès
            else {
                sessionStorage.setItem("tab_params_new", "tab-enseignement");
                alertSuccessRefresh("reload_tabs_parametrage", data.message);
            }
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoadingIcon("btn_update_enseignement", "fa-pencil", "Modifier");
            alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
});
function modalModifierEnseignement(id, libelle, statut) {
    $('#id_update_enseignement').val(id);
    $('#libelle_update_enseignement').val(libelle);
    $('#statut_update_enseignement').val(statut);
    $('#modal_update_enseignement').modal('show');
}

//Suppression
function supprimerEnseignement(id) {
    Swal.fire({
        title: 'Suppression...',
        text: "Etes-vous sûr de vouloir supprimer ce type d'enseignement ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33', confirmButtonText: 'Oui, Supprimer', cancelButtonText: 'Non'
    }).then((result) => {
        if (result.isConfirmed) {
            //Requête AJAX
            $.ajax({
                url: "/admin/admin/sup-enseignement/"+id,
                type: "GET",
                success: function(data) {
                    //Message de succès
                    if (data.res == 0) {
                        sessionStorage.setItem("tab_params_new", "tab-enseignement");
                        alertSuccessRefresh("reload_tabs_parametrage", data.message);
                        
                    } else alertErreur(data.message);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    alertErreur("Un problème est survenu lors de la suppression. Veuillez réessayer plus tard...");
                },
                dataType: 'json'
            });
        }
    });
}

//Activation/Désactivation
function activerEnseignement(id, top_actif) {
    Swal.fire({
        title: top_actif == '0' ? 'Activation...' : 'Désactivation...',
        text: "Etes-vous sûr de vouloir "+ (top_actif == '0' ? 'activer' : "désactiver") +" ce type d'enseignement ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', 
        confirmButtonText: top_actif == '0' ? 'Oui, Activer' : 'Oui, Désactiver', cancelButtonText: 'Non'
    }).then((result) => {
        if (result.isConfirmed) {
            //Requête AJAX
            $.ajax({
                url: "/admin/admin/enable-enseignement/"+id+"/"+top_actif,
                type: "GET",
                success: function(data) {
                    //Message de succès
                    sessionStorage.setItem("tab_params_new", "tab-enseignement");
                    alertSuccessRefresh("reload_tabs_parametrage", data.message);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    alertErreur("Un problème est survenu lors de l'activation. Veuillez réessayer plus tard...");
                },
                dataType: 'json'
            });
        }
    });
}


/*==============================
            NIVEAUX       
================================*/
//Ajout
$('#form_add_niveau').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    //Loader de chargement...
    showBtnLoading("btn_add_niveau", "Sauvegarde en cours...");
    
    //Requête AJAX
    $.ajax({
        url: $(that).attr('action'),
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            enseignement: $.trim($('#enseignement_add_niveau').val()),
            libelle: $.trim($('#libelle_add_niveau').val()),
            abreviation: $.trim($('#abreviation_add_niveau').val()),
        },
        success: function (data, textStatus, jqXHR) {
            hideBtnLoadingIcon("btn_add_niveau", "fa-check", "Valider");
            
            //S'il ya une erreur
            if (data.erreurs != null) {
                var msg = "";
                data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                alertErreur(msg);
            } 
            //Message de succès
            else {
                sessionStorage.setItem("tab_params_new", "tab-niveau");
                alertSuccessRefresh("reload_tabs_parametrage", data.message);
            }
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoadingIcon("btn_add_niveau", "fa-check", "Valider");
            alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
});

//Modification
$('#form_update_niveau').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    //Loader de chargement...
    showBtnLoading("btn_update_niveau", "Sauvegarde en cours...");
    
    //Requête AJAX
    $.ajax({
        url: $(that).attr('action'),
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            id: $.trim($('#id_update_niveau').val()),
            enseignement: $.trim($('#enseignement_update_niveau').val()),
            libelle: $.trim($('#libelle_update_niveau').val()),
            abreviation: $.trim($('#abreviation_update_niveau').val()),
        },
        success: function (data, textStatus, jqXHR) {
            hideBtnLoadingIcon("btn_update_niveau", "fa-pencil", "Modifier");
            
            //S'il ya une erreur
            if (data.erreurs != null) {
                var msg = "";
                data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                alertErreur(msg);
            } 
            //Message de succès
            else {
                sessionStorage.setItem("tab_params_new", "tab-niveau");
                alertSuccessRefresh("reload_tabs_parametrage", data.message);
            }
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoadingIcon("btn_update_niveau", "fa-pencil", "Modifier");
            alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
});
function modalModifierNiveau(id, enseignement, libelle, abreviation) {
    $('#id_update_niveau').val(id);
    $('#enseignement_update_niveau').val(enseignement);
    $('#libelle_update_niveau').val(libelle);
    $('#abreviation_update_niveau').val(abreviation);
    $('#modal_update_niveau').modal('show');
}

//Suppression
function supprimerNiveau(id) {
    Swal.fire({
        title: 'Suppression...',
        text: "Etes-vous sûr de vouloir supprimer ce niveau ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33', confirmButtonText: 'Oui, Supprimer', cancelButtonText: 'Non'
    }).then((result) => {
        if (result.isConfirmed) {
            //Requête AJAX
            $.ajax({
                url: "/admin/admin/sup-niveau/"+id,
                type: "GET",
                success: function(data) {
                    //Message de succès
                    if (data.res == 0) {
                        sessionStorage.setItem("tab_params_new", "tab-niveau");
                        alertSuccessRefresh("reload_tabs_parametrage", data.message);
                        
                    } else alertErreur(data.message);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    alertErreur("Un problème est survenu lors de la suppression. Veuillez réessayer plus tard...");
                },
                dataType: 'json'
            });
        }
    });
}

//Activation/Désactivation
function activerNiveau(id, top_actif) {
    Swal.fire({
        title: top_actif == '0' ? 'Activation...' : 'Désactivation...',
        text: "Etes-vous sûr de vouloir "+ (top_actif == '0' ? 'activer' : "désactiver") +" ce niveau ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', 
        confirmButtonText: top_actif == '0' ? 'Oui, Activer' : 'Oui, Désactiver', cancelButtonText: 'Non'
    }).then((result) => {
        if (result.isConfirmed) {
            //Requête AJAX
            $.ajax({
                url: "/admin/admin/enable-niveau/"+id+"/"+top_actif,
                type: "GET",
                success: function(data) {
                    //Message de succès
                    sessionStorage.setItem("tab_params_new", "tab-niveau");
                    alertSuccessRefresh("reload_tabs_parametrage", data.message);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    alertErreur("Un problème est survenu lors de l'activation. Veuillez réessayer plus tard...");
                },
                dataType: 'json'
            });
        }
    });
}


/*==============================
            TYPE SUJET       
================================*/
//Ajout
$('#form_add_typesujet').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    //Loader de chargement...
    showBtnLoading("btn_add_typesujet", "Sauvegarde en cours...");
    
    //Requête AJAX
    $.ajax({
        url: $(that).attr('action'),
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            libelle: $.trim($('#libelle_add_typesujet').val()),
            montant: $.trim($('#montant_add_typesujet').val()),
            pourcentage: $.trim($('#pourcentage_add_typesujet').val()),
        },
        success: function (data, textStatus, jqXHR) {
            hideBtnLoadingIcon("btn_add_typesujet", "fa-check", "Valider");
            
            //S'il ya une erreur
            if (data.erreurs != null) {
                var msg = "";
                data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                alertErreur(msg);
            } 
            //Message de succès
            else {
                sessionStorage.setItem("tab_params_new", "tab-sujet");
                alertSuccessRefresh("reload_tabs_parametrage", data.message);
            }
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoadingIcon("btn_add_typesujet", "fa-check", "Valider");
            alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
});

//Modification
$('#form_update_typesujet').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    //Loader de chargement...
    showBtnLoading("btn_update_typesujet", "Sauvegarde en cours...");
    
    //Requête AJAX
    $.ajax({
        url: $(that).attr('action'),
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            id: $.trim($('#id_update_typesujet').val()),
            libelle: $.trim($('#libelle_update_typesujet').val()),
            montant: $.trim($('#montant_update_typesujet').val()),
            pourcentage: $.trim($('#pourcentage_update_typesujet').val()),
        },
        success: function (data, textStatus, jqXHR) {
            hideBtnLoadingIcon("btn_update_typesujet", "fa-pencil", "Modifier");
            
            //S'il ya une erreur
            if (data.erreurs != null) {
                var msg = "";
                data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                alertErreur(msg);
            } 
            //Message de succès
            else {
                sessionStorage.setItem("tab_params_new", "tab-sujet");
                alertSuccessRefresh("reload_tabs_parametrage", data.message);
            }
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoadingIcon("btn_update_typesujet", "fa-pencil", "Modifier");
            alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
});
function modalModifierTypeSujet(id, libelle, montant, pourcentage) {
    $('#id_update_typesujet').val(id);
    $('#libelle_update_typesujet').val(libelle);
    $('#montant_update_typesujet').val(montant);
    $('#pourcentage_update_typesujet').val(pourcentage);
    $('#modal_update_typesujet').modal('show');
}

//Suppression
function supprimerTypeSujet(id) {
    Swal.fire({
        title: 'Suppression...',
        text: "Etes-vous sûr de vouloir supprimer ce type de sujet ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33', confirmButtonText: 'Oui, Supprimer', cancelButtonText: 'Non'
    }).then((result) => {
        if (result.isConfirmed) {
            //Requête AJAX
            $.ajax({
                url: "/admin/admin/sup-typesujet/"+id,
                type: "GET",
                success: function(data) {
                    //Message de succès
                    if (data.res == 0) {
                        sessionStorage.setItem("tab_params_new", "tab-sujet");
                        alertSuccessRefresh("reload_tabs_parametrage", data.message);
                        
                    } else alertErreur(data.message);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    alertErreur("Un problème est survenu lors de la suppression. Veuillez réessayer plus tard...");
                },
                dataType: 'json'
            });
        }
    });
}

//Activation/Désactivation
function activerTypeSujet(id, top_actif) {
    Swal.fire({
        title: top_actif == '0' ? 'Activation...' : 'Désactivation...',
        text: "Etes-vous sûr de vouloir "+ (top_actif == '0' ? 'activer' : "désactiver") +" ce type de sujet ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', 
        confirmButtonText: top_actif == '0' ? 'Oui, Activer' : 'Oui, Désactiver', cancelButtonText: 'Non'
    }).then((result) => {
        if (result.isConfirmed) {
            //Requête AJAX
            $.ajax({
                url: "/admin/admin/enable-typesujet/"+id+"/"+top_actif,
                type: "GET",
                success: function(data) {
                    //Message de succès
                    sessionStorage.setItem("tab_params_new", "tab-sujet");
                    alertSuccessRefresh("reload_tabs_parametrage", data.message);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    alertErreur("Un problème est survenu lors de l'activation. Veuillez réessayer plus tard...");
                },
                dataType: 'json'
            });
        }
    });
}


/*==============================
            MATIERE       
================================*/
//Ajout
$('#form_add_matiere').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    //Loader de chargement...
    showBtnLoading("btn_add_matiere", "Sauvegarde en cours...");
    
    //Requête AJAX
    $.ajax({
        url: $(that).attr('action'),
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            libelle: $.trim($('#libelle_add_matiere').val()),
            top_primaire: getCheckboxValue('primaire_add_matiere'),
            top_secondaire: getCheckboxValue('secondaire_add_matiere'),
            top_superieur: getCheckboxValue('superieur_add_matiere'),
        },
        success: function (data, textStatus, jqXHR) {
            hideBtnLoadingIcon("btn_add_matiere", "fa-check", "Valider");
            
            //S'il ya une erreur
            if (data.erreurs != null) {
                var msg = "";
                data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                alertErreur(msg);
            } 
            //Message de succès
            else {
                sessionStorage.setItem("tab_params_new", "tab-matiere");
                alertSuccessRefresh("reload_tabs_parametrage", data.message);
            }
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoadingIcon("btn_add_matiere", "fa-check", "Valider");
            alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
});

//Modification
$('#form_update_matiere').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    //Loader de chargement...
    showBtnLoading("btn_update_matiere", "Sauvegarde en cours...");
    
    //Requête AJAX
    $.ajax({
        url: $(that).attr('action'),
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            id: $.trim($('#id_update_matiere').val()),
            libelle: $.trim($('#libelle_update_matiere').val()),
            top_primaire: getCheckboxValue('primaire_update_matiere'),
            top_secondaire: getCheckboxValue('secondaire_update_matiere'),
            top_superieur: getCheckboxValue('superieur_update_matiere'),
        },
        success: function (data, textStatus, jqXHR) {
            hideBtnLoadingIcon("btn_update_matiere", "fa-pencil", "Modifier");
            
            //S'il ya une erreur
            if (data.erreurs != null) {
                var msg = "";
                data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                alertErreur(msg);
            } 
            //Message de succès
            else {
                sessionStorage.setItem("tab_params_new", "tab-matiere");
                alertSuccessRefresh("reload_tabs_parametrage", data.message);
            }
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoadingIcon("btn_update_matiere", "fa-pencil", "Modifier");
            alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
});
function modalModifierMatiere(id, libelle, top_primaire, top_secondaire, top_superieur) {
    $('#id_update_matiere').val(id);
    $('#libelle_update_matiere').val(libelle);
    $('#primaire_update_matiere').prop('checked', false);
    $('#secondaire_update_matiere').prop('checked', false);
    $('#superieur_update_matiere').prop('checked', false);
    if (top_primaire == 1) $('#primaire_update_matiere').prop('checked', true);
    if (top_secondaire == 2) $('#secondaire_update_matiere').prop('checked', true);
    if (top_superieur == 3) $('#superieur_update_matiere').prop('checked', true);
    $('#modal_update_matiere').modal('show');
}

//Suppression
function supprimerMatiere(id) {
    Swal.fire({
        title: 'Suppression...',
        text: "Etes-vous sûr de vouloir supprimer cette matière ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33', confirmButtonText: 'Oui, Supprimer', cancelButtonText: 'Non'
    }).then((result) => {
        if (result.isConfirmed) {
            //Requête AJAX
            $.ajax({
                url: "/admin/admin/sup-matiere/"+id,
                type: "GET",
                success: function(data) {
                    //Message de succès
                    if (data.res == 0) {
                        sessionStorage.setItem("tab_params_new", "tab-matiere");
                        alertSuccessRefresh("reload_tabs_parametrage", data.message);
                        
                    } else alertErreur(data.message);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    alertErreur("Un problème est survenu lors de la suppression. Veuillez réessayer plus tard...");
                },
                dataType: 'json'
            });
        }
    });
}

//Activation/Désactivation
function activerMatiere(id, top_actif) {
    Swal.fire({
        title: top_actif == '0' ? 'Activation...' : 'Désactivation...',
        text: "Etes-vous sûr de vouloir "+ (top_actif == '0' ? 'activer' : "désactiver") +" cette matière ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', 
        confirmButtonText: top_actif == '0' ? 'Oui, Activer' : 'Oui, Désactiver', cancelButtonText: 'Non'
    }).then((result) => {
        if (result.isConfirmed) {
            //Requête AJAX
            $.ajax({
                url: "/admin/admin/enable-matiere/"+id+"/"+top_actif,
                type: "GET",
                success: function(data) {
                    //Message de succès
                    sessionStorage.setItem("tab_params_new", "tab-matiere");
                    alertSuccessRefresh("reload_tabs_parametrage", data.message);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    alertErreur("Un problème est survenu lors de l'activation. Veuillez réessayer plus tard...");
                },
                dataType: 'json'
            });
        }
    });
}


/*==============================
            CHAPITRE       
================================*/
//Ajout
$('#form_add_chapitre').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    //Loader de chargement...
    showBtnLoading("btn_add_chapitre", "Sauvegarde en cours...");
    
    //Requête AJAX
    $.ajax({
        url: $(that).attr('action'),
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            niveau: $.trim($('#niveau_add_chapitre').val()),
            matiere: $.trim($('#matiere_add_chapitre').val()),
            libelle: $.trim($('#libelle_add_chapitre').val()),
        },
        success: function (data, textStatus, jqXHR) {
            hideBtnLoadingIcon("btn_add_chapitre", "fa-check", "Valider");
            
            //S'il ya une erreur
            if (data.erreurs != null) {
                var msg = "";
                data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                alertErreur(msg);
            } 
            //Message de succès
            else {
                sessionStorage.setItem("tab_params_new", "tab-chapitre");
                alertSuccessRefresh("reload_tabs_parametrage", data.message);
            }
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoadingIcon("btn_add_chapitre", "fa-check", "Valider");
            alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
});

//Modification
$('#form_update_chapitre').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    //Loader de chargement...
    showBtnLoading("btn_update_chapitre", "Sauvegarde en cours...");
    
    //Requête AJAX
    $.ajax({
        url: $(that).attr('action'),
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            id: $.trim($('#id_update_chapitre').val()),
            niveau: $.trim($('#niveau_update_chapitre').val()),
            matiere: $.trim($('#matiere_update_chapitre').val()),
            libelle: $.trim($('#libelle_update_chapitre').val()),
        },
        success: function (data, textStatus, jqXHR) {
            hideBtnLoadingIcon("btn_update_chapitre", "fa-pencil", "Modifier");
            
            //S'il ya une erreur
            if (data.erreurs != null) {
                var msg = "";
                data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                alertErreur(msg);
            } 
            //Message de succès
            else {
                sessionStorage.setItem("tab_params_new", "tab-chapitre");
                alertSuccessRefresh("reload_tabs_parametrage", data.message);
            }
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoadingIcon("btn_update_chapitre", "fa-pencil", "Modifier");
            alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
});
function modalModifierChapitre(id, libelle, niveau, matiere) {
    $('#id_update_chapitre').val(id);
    $('#libelle_update_chapitre').val(libelle);
    $('#niveau_update_chapitre').val(niveau);
    $('#matiere_update_chapitre').val(matiere);
    $('#modal_update_chapitre').modal('show');
}

//Suppression
function supprimerChapitre(id) {
    Swal.fire({
        title: 'Suppression...',
        text: "Etes-vous sûr de vouloir supprimer ce chapitre ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33', confirmButtonText: 'Oui, Supprimer', cancelButtonText: 'Non'
    }).then((result) => {
        if (result.isConfirmed) {
            //Requête AJAX
            $.ajax({
                url: "/admin/admin/sup-chapitre/"+id,
                type: "GET",
                success: function(data) {
                    //Message de succès
                    if (data.res == 0) {
                        sessionStorage.setItem("tab_params_new", "tab-chapitre");
                        alertSuccessRefresh("reload_tabs_parametrage", data.message);
                        
                    } else alertErreur(data.message);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    alertErreur("Un problème est survenu lors de la suppression. Veuillez réessayer plus tard...");
                },
                dataType: 'json'
            });
        }
    });
}

//Activation/Désactivation
function activerChapitre(id, top_actif) {
    Swal.fire({
        title: top_actif == '0' ? 'Activation...' : 'Désactivation...',
        text: "Etes-vous sûr de vouloir "+ (top_actif == '0' ? 'activer' : "désactiver") +" ce chapitre ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', 
        confirmButtonText: top_actif == '0' ? 'Oui, Activer' : 'Oui, Désactiver', cancelButtonText: 'Non'
    }).then((result) => {
        if (result.isConfirmed) {
            //Requête AJAX
            $.ajax({
                url: "/admin/admin/enable-chapitre/"+id+"/"+top_actif,
                type: "GET",
                success: function(data) {
                    //Message de succès
                    sessionStorage.setItem("tab_params_new", "tab-chapitre");
                    alertSuccessRefresh("reload_tabs_parametrage", data.message);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    alertErreur("Un problème est survenu lors de l'activation. Veuillez réessayer plus tard...");
                },
                dataType: 'json'
            });
        }
    });
}


/*==============================
            LEçON       
================================*/
//Ajout
$('#form_add_lecon').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    //Loader de chargement...
    showBtnLoading("btn_add_lecon", "Sauvegarde en cours...");
    
    //Requête AJAX
    $.ajax({
        url: $(that).attr('action'),
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            libelle: $.trim($('#libelle_add_lecon').val()),
            chapitre: $.trim($('#chapitre_add_lecon').val()),
        },
        success: function (data, textStatus, jqXHR) {
            hideBtnLoadingIcon("btn_add_lecon", "fa-check", "Valider");
            
            //S'il ya une erreur
            if (data.erreurs != null) {
                var msg = "";
                data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                alertErreur(msg);
            } 
            //Message de succès
            else {
                sessionStorage.setItem("tab_params_new", "tab-lecon");
                alertSuccessRefresh("reload_tabs_parametrage", data.message);
            }
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoadingIcon("btn_add_lecon", "fa-check", "Valider");
            alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
});

//Modification
$('#form_update_lecon').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    //Loader de chargement...
    showBtnLoading("btn_update_lecon", "Sauvegarde en cours...");
    
    //Requête AJAX
    $.ajax({
        url: $(that).attr('action'),
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            id: $.trim($('#id_update_lecon').val()),
            libelle: $.trim($('#libelle_update_lecon').val()),
            chapitre: $.trim($('#chapitre_update_lecon').val()),
        },
        success: function (data, textStatus, jqXHR) {
            hideBtnLoadingIcon("btn_update_lecon", "fa-pencil", "Modifier");
            
            //S'il ya une erreur
            if (data.erreurs != null) {
                var msg = "";
                data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                alertErreur(msg);
            } 
            //Message de succès
            else {
                sessionStorage.setItem("tab_params_new", "tab-lecon");
                alertSuccessRefresh("reload_tabs_parametrage", data.message);
            }
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoadingIcon("btn_update_lecon", "fa-pencil", "Modifier");
            alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
});
function modalModifierLecon(id, libelle, chapitre) {
    $('#id_update_lecon').val(id);
    $('#libelle_update_lecon').val(libelle);
    $('#chapitre_update_lecon').val(chapitre);
    $('#modal_update_lecon').modal('show');
}

//Suppression
function supprimerLecon(id) {
    Swal.fire({
        title: 'Suppression...',
        text: "Etes-vous sûr de vouloir supprimer cette leçon ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33', confirmButtonText: 'Oui, Supprimer', cancelButtonText: 'Non'
    }).then((result) => {
        if (result.isConfirmed) {
            //Requête AJAX
            $.ajax({
                url: "/admin/admin/sup-lecon/"+id,
                type: "GET",
                success: function(data) {
                    //Message de succès
                    if (data.res == 0) {
                        sessionStorage.setItem("tab_params_new", "tab-lecon");
                        alertSuccessRefresh("reload_tabs_parametrage", data.message);
                        
                    } else alertErreur(data.message);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    alertErreur("Un problème est survenu lors de la suppression. Veuillez réessayer plus tard...");
                },
                dataType: 'json'
            });
        }
    });
}

//Activation/Désactivation
function activerLecon(id, top_actif) {
    Swal.fire({
        title: top_actif == '0' ? 'Activation...' : 'Désactivation...',
        text: "Etes-vous sûr de vouloir "+ (top_actif == '0' ? 'activer' : "désactiver") +" cette leçon ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', 
        confirmButtonText: top_actif == '0' ? 'Oui, Activer' : 'Oui, Désactiver', cancelButtonText: 'Non'
    }).then((result) => {
        if (result.isConfirmed) {
            //Requête AJAX
            $.ajax({
                url: "/admin/admin/enable-lecon/"+id+"/"+top_actif,
                type: "GET",
                success: function(data) {
                    //Message de succès
                    sessionStorage.setItem("tab_params_new", "tab-lecon");
                    alertSuccessRefresh("reload_tabs_parametrage", data.message);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    alertErreur("Un problème est survenu lors de l'activation. Veuillez réessayer plus tard...");
                },
                dataType: 'json'
            });
        }
    });
}