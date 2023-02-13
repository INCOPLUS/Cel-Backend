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

/*=======================================
    AFFICHAGE DE VALEURS DANS LES COMBO
========================================*/
function afficherVille() {
    $('#ville').html('<option value=""></option>');
    if ($.trim($('#pays').val()) != "") {
        $.ajax({
            url: "/villes/"+$.trim($('#pays').val()),
            type: "GET",
            success: function(data) {
                var select = '<option value=""></option>';
                if (data.length >= 1) {
                    data.forEach(info => {
                        select += "<option value='"+info['id_ville']+"'>"+info['nom_ville']+"</option>";
                    });
                }
                $('#ville').html(select);
            },
            dataType: 'json'
        });
    }
}
function afficherMatiere() {
    $('#matiere').html('<option value=""></option>');
    if ($.trim($('#enseignement').val()) != "") {
        $.ajax({
            url: "/matieres/"+$.trim($('#enseignement').val()),
            type: "GET",
            success: function(data) {
                var select = '<option value=""></option>';
                if (data.length >= 1) {
                    data.forEach(info => {
                        select += "<option value='"+info['id_matiere']+"'>"+info['libelle']+"</option>";
                    });
                }
                $('#matiere').html(select);
            },
            dataType: 'json'
        });
    }
}
function afficherChapitre() {
    $('#chapitre').html('<option value=""></option>');
    if ($.trim($('#niveau').val()) != "" && $.trim($('#matiere').val()) != "") {
        $.ajax({
            url: "/chapitres/"+$.trim($('#niveau').val())+"/"+$.trim($('#matiere').val()),
            type: "GET",
            success: function(data) {
                var select = '<option value=""></option>';
                if (data.length >= 1) {
                    data.forEach(info => {
                        select += "<option value='"+info['id_chapitre']+"'>"+info['libelle']+"</option>";
                    });
                }
                $('#chapitre').html(select);
            },
            dataType: 'json'
        });
    }
}
function afficherLecon() {
    $('#lecon').html('<option value=""></option>');
    if ($.trim($('#chapitre').val()) != "") {
        $.ajax({
            url: "/lecons/"+$.trim($('#chapitre').val()),
            type: "GET",
            success: function(data) {
                var select = '<option value=""></option>';
                if (data.length >= 1) {
                    data.forEach(info => {
                        select += "<option value='"+info['id_lecon']+"'>"+info['libelle']+"</option>";
                    });
                }
                $('#lecon').html(select);
            },
            dataType: 'json'
        });
    }
}
function afficherSerie() {
    $('#serie').html('<option value=""></option>');
    if ($.trim($('#niveau').val()) != "") {
        $.ajax({
            url: "/series/"+$.trim($('#niveau').val()),
            type: "GET",
            success: function(data) {
                var select = '<option value=""></option>';
                if (data.length >= 1) {
                    data.forEach(info => {
                        select += "<option value='"+info['id_serie']+"'>"+info['libelle']+"</option>";
                    });
                }
                $('#serie').html(select);
            },
            dataType: 'json'
        });
    }
}

/*=======================================
        GESTION DES DIPLOMES
========================================*/
function selectDiplomeTabs() {
    $("#tabs1").removeClass("show active");
    $("#tabs1-tab").removeClass("active");
    $("#tabs4").addClass("show active");
    $("#tabs4-tab").addClass("active");
}
function modifierDiplome(params) {
    
}
function supprimerDiplome(id) {
    Swal.fire({
        title: 'Suppression...',
        text: "Etes-vous sûr de vouloir supprimer ce diplôme ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Supprimer',
        cancelButtonText: 'Non'
    }).then((result) => {
        if (result.isConfirmed) {
            //Requête AJAX
            $.ajax({
                url: "/admin/enseignant/sup-diplome/"+id,
                type: "GET",
                success: function(data) {
                    //Message de succès
                    alertSuccessRefresh("reload_diplome_tabs", data.message);
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

//MAJ des infos personnelles
$('#form_infos_perso').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    //Loader de chargement...
    showBtnLoading("btn_save_infos_perso", "Sauvegarde en cours...");
    
    //Requête AJAX
    $.ajax({
        url: $(that).attr('action'),
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            nom: $.trim($('#nom').val()),
            date_naissance: $.trim($('#date_naissance').val()),
            genre: $.trim($('#genre').val()),
            genre_eleve: $.trim($('#genre_eleve').val()),
            email: $.trim($('#email').val()),
            contact1: $.trim($('#contact1').val()),
            contact2: $.trim($('#contact2').val()),
            pays: $.trim($('#pays').val()),
            ville: $.trim($('#ville').val()),
            quartier: $.trim($('#quartier').val()),
        },
        success: function (data, textStatus, jqXHR) {
            console.log(data);
            hideBtnLoadingIcon("btn_save_infos_perso", "fa-save", "Sauvegarder");

            //S'il ya une erreur
            if (data.erreurs != null) {
                var msg = "";
                data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                alertErreur(msg);
            } 
            //Message de succès
            else alertSuccess(data.message);
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoadingIcon("btn_save_infos_perso", "fa-save", "Sauvegarder");
            alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
});

//MAJ des infos de la pièce d'identité
$('#form_piece').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    //Loader de chargement...
    showBtnLoading("btn_save_piece", "Sauvegarde en cours...");
    
    //Requête AJAX
    $.ajax({
        url: $(that).attr('action'),
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            type_piece: $.trim($('#type_piece').val()),
            numero_piece: $.trim($('#numero_piece').val()),
            date_delivrance: $.trim($('#date_delivrance').val()),
            date_expiration: $.trim($('#date_expiration').val()),
            piece_identite: $.trim($('#piece_identite').val()),
        },
        success: function (data, textStatus, jqXHR) {
            console.log(data);
            hideBtnLoadingIcon("btn_save_piece", "fa-save", "Sauvegarder");

            //S'il ya une erreur
            if (data.erreurs != null) {
                var msg = "";
                data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                alertErreur(msg);
            } 
            //Message de succès
            else alertSuccess(data.message);
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoadingIcon("btn_save_piece", "fa-save", "Sauvegarder");
            alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
});

//MAJ des infos du CV
$('#form_cv').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    //Loader de chargement...
    showBtnLoading("btn_save_cv", "Sauvegarde en cours...");
    
    //Requête AJAX
    $.ajax({
        url: $(that).attr('action'),
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            enseignement: $.trim($('#enseignement').val()),
            matiere: $.trim($('#matiere').val()),
            experience: $.trim($('#experience').val()),
            etablissement: $.trim($('#etablissement').val()),
        },
        success: function (data, textStatus, jqXHR) {
            console.log(data);
            hideBtnLoadingIcon("btn_save_cv", "fa-save", "Sauvegarder");

            //S'il ya une erreur
            if (data.erreurs != null) {
                var msg = "";
                data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                alertErreur(msg);
            } 
            //Message de succès
            else alertSuccess(data.message);
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoadingIcon("btn_save_cv", "fa-save", "Sauvegarder");
            alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
});

//MAJ des infos du diplôme
$('#form_diplome').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    //Loader de chargement...
    showBtnLoading("btn_save_diplome", "Sauvegarde en cours...");
    
    //Requête AJAX
    $.ajax({
        url: $(that).attr('action'),
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            annee_obtention: $.trim($('#annee_obtention').val()),
            intitule_diplome: $.trim($('#intitule_diplome').val()),
        },
        success: function (data, textStatus, jqXHR) {
            console.log(data);
            hideBtnLoadingIcon("btn_save_diplome", "fa-check", "Valider");

            //S'il ya une erreur
            if (data.erreurs != null) {
                var msg = "";
                data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                alertErreur(msg);
            } 
            //Message de succès
            else alertSuccessRefresh("reload_diplome_tabs", data.message);
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoadingIcon("btn_save_diplome", "fa-check", "Valider");
            alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
});

//Après chargement de la page
window.onload = function() {
    var reload_diplome_tabs = sessionStorage.getItem("reload_diplome_tabs");
    if (reload_diplome_tabs) {
        sessionStorage.removeItem("reload_diplome_tabs");
        selectDiplomeTabs();
    }
}


/*===================================
        GESTION DES SUJETS
====================================*/
function ajouterExercice() {
    if ($('#form_create_sujet')[0].checkValidity()) {
        $('.bloc-exercices').append(
            '<div class="box-section">'+
                '<legend class="label-white"><i class="fa fa-file-o"></i>&nbsp; Exercice'+
                    '<a href="#" class="text-white" onclick="blocToggle(this)"><span class="pull-right"><i class="fa fa-chevron-up"></i></span></a>'+
                '</legend>'+
                '<hr class="underline">'+
                '<div class="form-row">'+
                    '<div class="col-12">'+
                        '<div class="form-group-create">'+
                            // '<label class="form-label">Titre de l\'exercice</label>'+
                            '<input type="text" class="form-group-create__input" placeholder="Titre de l\'exercice (Ex: Exercice N°1)">'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-12 bloc-questions"></div>'+
                '</div>'+
                '<div class="box-btn-action">'+
                    '<button class="icon --green" onclick="ajouterSousExercice(this)" title="Ajouter un sous-exercice"><i class="fa fa-files-o"></i></button>'+
                    '<button class="icon --blue" onclick="ajouterQuestion(this)" title="Ajouter une question"><i class="fa fa-question"></i></button>'+
                    '<button class="icon --red" onclick="supprimerExercice(this)" title="Supprimer l\'exercice"><i class="fa fa-trash-o"></i></button>'+
                '</div>'+
            '</div>'
        );
    }
}

function supprimerExercice(element) {
    Swal.fire({
        title: 'Suppression...',
        text: "Êtes-vous sûr de vouloir supprimer cet exercice ?",
        icon: 'warning', showCancelButton: true,
        confirmButtonColor: '#3085d6', cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprimer', cancelButtonText: 'Non',
      }).then((result) => {
        if (result.isConfirmed) {
            $(element).parent().parent().remove();
            Swal.fire("Supprimé", "L'exercice a été supprimé.", "success");
        }
    });
}

function ajouterSousExercice(element) {
    $(element).parent().prev('div.form-row').children('div.bloc-questions').append(
        '<div class="box-sous-exercice">'+
            '<legend class="label-white"><i class="fa fa-files-o"></i>&nbsp; Sous-Exercice'+
                '<a href="#" class="text-white" onclick="blocToggle(this)"><span class="pull-right"><i class="fa fa-chevron-up"></i></span></a>'+
            '</legend>'+
            '<hr class="underline">'+
            '<div class="form-row">'+
                '<div class="col-12">'+
                    '<div class="form-group-create">'+
                        '<input type="text" class="form-group-create__input" placeholder="Titre du sous-exercice">'+
                    '</div>'+
                '</div>'+
                '<div class="col-12 bloc-questions"></div>'+
            '</div>'+
            '<div class="box-btn-action">'+
                '<button class="icon --blue" onclick="ajouterQuestion(this)" title="Ajouter une question"><i class="fa fa-question"></i></button>'+
                '<button class="icon --red" onclick="supprimerSousExercice(this)" title="Supprimer le sous-exercice"><i class="fa fa-trash-o"></i></button>'+
            '</div>'+
        '</div>'
    );
}

function supprimerSousExercice(element) {
    Swal.fire({
        title: 'Suppression...',
        text: "Êtes-vous sûr de vouloir supprimer ce sous-exercice ?",
        icon: 'warning', showCancelButton: true,
        confirmButtonColor: '#3085d6', cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprimer', cancelButtonText: 'Non',
      }).then((result) => {
        if (result.isConfirmed) {
            $(element).parent().parent().remove();
            Swal.fire("Supprimé", "Le sous-exercice a été supprimé.", "success");
        }
    });
}

function ajouterQuestion(element) {
    $(element).parent().prev('div.form-row').children('div.bloc-questions').append(
        '<div class="question-box">'+
            '<legend class="label-white">Question'+
                '<a href="#" class="text-white" onclick="blocToggle(this)"><span class="pull-right"><i class="fa fa-chevron-up"></i></span></a>'+
            '</legend>'+
            '<hr class="underline">'+
            '<div class="form-row">'+
                '<div class="col-12 type-question">'+
                    '<div class="box-proposal">'+
                        '<div class="response-proposal" onclick="choisirTypeQuestion(this)">'+
                            '<div class="option">'+
                                '<i class="fa fa-question" aria-hidden="true"></i>'+
                                '<span>Question Courte</span>'+
                            '</div>'+
                            '<div class="response-proposal--content">'+
                                '<div class="proposal" onclick="ajouterQuestionCourte(this)">'+
                                    '<i class="fa fa-question" aria-hidden="true"></i>'+
                                    '<span>Question Courte</span>'+
                                '</div>'+
                                '<div class="proposal" onclick="ajouterQuestionRadio(this)">'+
                                    '<i class="fa fa-check-circle" aria-hidden="true"></i>'+
                                    '<span>Choix Unique</span>'+
                                '</div>'+
                                '<div class="proposal" onclick="ajouterQuestionCheckbox(this)">'+
                                    '<i class="fa fa-check-square" aria-hidden="true"></i>'+
                                    '<span>Choix Multiples</span>'+
                                '</div>'+
                                '<div class="proposal" onclick="ajouterQuestionTexte(this)">'+
                                    '<i class="fa fa-align-left" aria-hidden="true"></i>'+
                                    '<span>Rédaction</span>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="added-option"></div>'+
                    '</div>'+
                '</div>'+

                '<div class="col-12 option-reponse">'+
                    '<div class="col-12">'+
                        '<div class="form-group-create">'+
                            '<input type="text" class="form-group-create__input" placeholder="Saisissez la question ici ...">'+
                        '</div>'+
                    '</div>'+
                '</div>'+

                '<div class="col-12 form-row fieldset-rcpe mt-5">'+
                    '<div class="col-12 mb-5">'+
                        '<h3 class="border-white">Réponse(s) - Point(s) - Explication(s)</h3>'+
                    '</div>'+
                    '<div class="col-12 col-md-5">'+
                        '<div class="form--group">'+
                            '<label>Réponse(s) attendue(s)</label>'+
                            '<textarea class="form--group__textarea" placeholder="NB: Séparez chaque réponse par un retour à la ligne."></textarea>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-12 col-md-2">'+
                        '<div class="form--group">'+
                            '<label>Point(s)</label>'+
                            '<input type="number" min="0" max="20" step=".25" class="form--group__input">'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-12 col-md-5">'+
                        '<div class="form--group">'+
                            '<label>Explication(s)</label>'+
                            '<textarea class="form--group__textarea" placeholder="Explications éventuelles..."></textarea>'+
                        '</div>'+
                    '</div>'+
                '</div>'+

                '<div class="col-12 box-btn-action-2 .--red">'+
                    '<button class="icon --red" onclick="supprimerQuestion(this)"><i class="fa fa-trash-o"></i></button>'+
                '</div>'+
            '</div>'+
        '</div>'
    );
}

function supprimerQuestion(element) {
    Swal.fire({
        title: 'Suppression...',
        text: "Êtes-vous sûr de vouloir supprimer cette question ?",
        icon: 'warning', showCancelButton: true,
        confirmButtonColor: '#3085d6', cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprimer', cancelButtonText: 'Non',
      }).then((result) => {
        if (result.isConfirmed) {
            $(element).parent().parent().parent().remove();
            Swal.fire("Supprimé", "La question a été supprimée.", "success");
        }
    });
}

function choisirTypeQuestion(element) {
    $(element).find('div.response-proposal--content').toggleClass('active');
}

function ajouterQuestionCourte(element) {
    $(element).parent().prev("div.option").html('<i class="fa fa-question" aria-hidden="true"></i><span>Question Courte</span>');

    $(element).parents("div.type-question").next("div.option-reponse").html(
        '<div class="col-12">'+
            '<div class="form-group-create">'+
                '<input type="text" class="form-group-create__input" placeholder="Saisissez la question ici ...">'+
            '</div>'+
        '</div>'
    );
    $(element).parent().parent().next("div.added-option").html("");
}

function ajouterQuestionRadio(element) {
    $(element).parent().prev("div.option").html('<i class="fa fa-check-circle" aria-hidden="true"></i><span>Choix Unique</span>');

    $(element).parents("div.type-question").next("div.option-reponse").html(
        '<div class="col-12">'+
            '<div class="form-group-create">'+
                '<input type="text" class="form-group-create__input" placeholder="Saisissez la question ici ...">'+
            '</div>'+
        '</div>'+
        '<div class="col-12 form-response">'+
            '<div class="choice">'+
                '<div class="circle"></div>'+
                '<input type="text" placeholder="Saisissez une proposition de réponse ..." class="form-group-create__input">'+
                '<div class="box-action">'+
                    '<div class="icon --red" onclick="supprimerOption(this)"><i class="fa fa-close" aria-hidden="true"></i></div>'+
                '</div>'+
            '</div>'+
        '</div>'
    );

    $(element).parent().parent().next("div.added-option").html(
        '<button class="btn-add-option" onclick="ajouterOption(this, \'circle\')"><i class="fa fa-circle-o"></i></button>'
    );
}

function ajouterQuestionCheckbox(element) {
    $(element).parent().prev("div.option").html('<i class="fa fa-check-square" aria-hidden="true"></i><span>Choix Multiples</span>');

    $(element).parents("div.type-question").next("div.option-reponse").html(
        '<div class="col-12">'+
            '<div class="form-group-create">'+
                '<input type="text" class="form-group-create__input" placeholder="Saisissez la question ici ...">'+
            '</div>'+
        '</div>'+
        '<div class="col-12 form-response">'+
            '<div class="choice">'+
                '<div class="square"></div>'+
                '<input type="text" placeholder="Saisissez une proposition de réponse ..." class="form-group-create__input">'+
                '<div class="box-action">'+
                    '<div class="icon --red" onclick="supprimerOption(this)"><i class="fa fa-close" aria-hidden="true"></i></div>'+
                '</div>'+
            '</div>'+
        '</div>'
    );

    $(element).parent().parent().next("div.added-option").html(
        '<button class="btn-add-option" onclick="ajouterOption(this, \'square\')"><i class="fa fa-square-o"></i></button>'
    );
}

function ajouterQuestionTexte(element) {
    $(element).parent().prev("div.option").html('<i class="fa fa-align-left" aria-hidden="true"></i><span>Rédaction</span>');
    $(element).parents("div.type-question").next("div.option-reponse").html("");
    $("#bloc_text_editor_"+editor_num).appendTo($(element).parents("div.type-question").next("div.option-reponse"));
    $(element).parent().parent().next("div.added-option").html("");
    editor_num++;
}

function ajouterOption(element, type) {
    $(element).parents("div.type-question").next("div.option-reponse").children("div.form-response").append(
        '<div class="choice">'+
            '<div class="'+type+'"></div>' +
            '<input type="text" placeholder="Saisissez une proposition de réponse ..." class="form-group-create__input">' +
            '<div class="box-action">' +
                '<div class="icon --red" onclick="supprimerOption(this)"><i class="fa fa-close" aria-hidden="true"></i></div>' +
            '</div>' +
        '</div>'
    );
}

function supprimerOption(element) {
    $(element).parent().parent().remove();
}

function blocToggle(element) {
    // e.preventDefault();
    var $div = $(element).closest('div');
    var $icon = $div.find('span > i');
    var $iconClass = $icon.attr('class');

    if ($iconClass === 'fa fa-chevron-up') {
        $icon.removeClass('fa fa-chevron-up');
        $icon.addClass('fa fa-chevron-down');
    } else {
        $icon.removeClass('fa fa-chevron-down');
        $icon.addClass('fa fa-chevron-up');
    }

    $div.children('div').slideToggle();
}

function getExercicesData() {
    var exercices = $('div.bloc-exercices').children();
    var tab = [];
    var tableau = [];

    if (exercices.length >= 1) {
        for (let index = 0; index < exercices.length; index++) {
            //Récupération des données
            const element = exercices[index];
            var titre = $(element).find('input.form-group-create__input').val();
            var sousexercices = getSousExercicesData(element);

            //Affectations au tableau
            tab.push(titre);
            tab.push(sousexercices);
            tableau.push(tab);
            tab = [];
        } 
    }

    return tableau;
}

function getSousExercicesData(exercice) {
    var sousexercice = $(exercice).find('div.bloc-questions:first').children();
    var tab = [];
    var tableau = [];

    if (sousexercice.length >= 1) {
        for (let index = 0; index < sousexercice.length; index++) {
            //Récupération des données
            const element = sousexercice[index];
            var titre = "";
            var questions = "";
            var top = "1";
            var type_question = "";
            var libelle_question = "";
            var proposition_response = "";
            var string_text = "";
            var html_text = "";
            var reponse_attendue = "";
            var points = "";
            var explications = "";

            //Sous-Exercice
            if ($(element).hasClass("box-sous-exercice")) {
                titre = $(element).find('input.form-group-create__input').val();
                questions = getQuestionsData(element);
                top = "0";
            //Question
            } else {
                type_question = $(element).find('div.option span').text();
                libelle_question = $(element).find('div.option-reponse input').val();
                proposition_response = getPropositionReponse(element);
                if (type_question == "Rédaction") {
                    var editor_id = $(element).find('div.option-reponse').children().attr('id');
                    string_text = edittexts[editor_id.slice(-1)].getText();
                    html_text = edittexts[editor_id.slice(-1)].root.innerHTML;
                }
                reponse_attendue = $(element).find('div.fieldset-rcpe textarea').first().val();
                points = $(element).find('div.fieldset-rcpe input').val();
                explications = $(element).find('div.fieldset-rcpe textarea').last().val();
            }

            //Affectations au tableau
            tab.push(titre);
            tab.push(questions);
            tab.push(top);
            tab.push(type_question);
            tab.push(libelle_question);
            tab.push(proposition_response.length > 0 ? proposition_response : "");
            tab.push(string_text);
            tab.push(html_text);
            tab.push(reponse_attendue);
            tab.push(points);
            tab.push(explications);
            tableau.push(tab);
            tab = [];
        } 
    }

    return tableau;

    console.log("Nbre Sous-Exercice: "+sousexercice.length);
    
}

function getQuestionsData(sousexercice) {
    var questions = $(sousexercice).find('div.bloc-questions').children();
    var tab = [];
    var tableau = [];

    if (questions.length >= 1) {
        for (let index = 0; index < questions.length; index++) {
            const element = questions[index];
            var string_text = "";
            var html_text = "";
    
            //récupération des données
            var type_question = $(element).find('div.option span').text();
            var libelle_question = $(element).find('div.option-reponse input').val();
            var proposition_response = getPropositionReponse(element);
            if (type_question == "Rédaction") {
                var editor_id = $(element).find('div.option-reponse').children().attr('id');
                string_text = edittexts[editor_id.slice(-1)].getText();
                html_text = edittexts[editor_id.slice(-1)].root.innerHTML;
            }
            var reponse_attendue = $(element).find('div.fieldset-rcpe textarea').first().val();
            var points = $(element).find('div.fieldset-rcpe input').val();
            var explications = $(element).find('div.fieldset-rcpe textarea').last().val();

            //Affectations au tableau
            tab.push(type_question);
            tab.push(libelle_question);
            tab.push(proposition_response.length > 0 ? proposition_response : "");
            tab.push(string_text);
            tab.push(html_text);
            tab.push(reponse_attendue);
            tab.push(points);
            tab.push(explications);
            tableau.push(tab);
            tab = [];
        }
    }
    //On retourne le tableau
    return tableau;
}

function getPropositionReponse(element) {
    var propositions = $(element).find('div.form-response').children();
    var tableau = [];
    if (propositions.length > 0) {
        for (let index = 0; index < propositions.length; index++) {
            tableau.push($(propositions[index]).children('input.form-group-create__input').val());
        }
    }
    return tableau;
}

function controlSujet() {
    if (!$('#form_create_sujet')[0].checkValidity()) {
        return false;
    }
    if ($.trim($('#type_sujet').val()) == "") {
        alertErreurFocus("Veuillez SVP sélectionner le type de sujet.", "type_sujet");
        return false;
    }
    // if ($.trim($('#titre_sujet').val()) == "") {
    //     alertErreurFocus("Veuillez SVP renseigner le titre du sujet.", "titre_sujet");
    //     return false;
    // }
    if ($.trim($('#niveau').val()) == "") {
        alertErreurFocus("Veuillez SVP sélectionner le niveau.", "niveau");
        return false;
    }
    if ($.trim($('#matiere').val()) == "") {
        alertErreurFocus("Veuillez SVP sélectionner la matière.", "matiere");
        return false;
    }
    if ($.trim($('#chapitre').val()) == "") {
        alertErreurFocus("Veuillez SVP sélectionner le chapitre.", "chapitre");
        return false;
    }
    if ($.trim($('#duree').val()) == "") {
        alertErreurFocus("Veuillez SVP renseigner la durée.", "duree");
        return false;
    }
    return true;
}

function controlExercice() {
    var listeTitreNS = [];
    var listeQuestionNS = [];
    if (getExercicesData().length < 1) {
        alertErreur("Veuillez ajouter au moins un exercice.");
        return false;
    }

    for (var i = 0; i < getExercicesData().length; i++) {
        if (getExercicesData()[i][0] == "") listeTitreNS.push("Titre non saisi");
        if (getExercicesData()[i][1].length < 1) listeQuestionNS.push("Question non saisie");
    }
    if (listeTitreNS.length > 0) {
        alertErreur("Veuillez renseigner le titre de chaque exercice.");
        return false;
    }
    if (listeQuestionNS.length > 0) {
        alertErreur("Veuillez ajouter au moins une question à chaque exercice.");
        return false;
    }

    for (var j = 0; j < getExercicesData().length; j++) {
        // if (!controlQuestion(getExercicesData()[j][1])) return false;
        if (!controlSousExercice(getExercicesData()[j][1])) return false;
    }
    return true;
}

function controlSousExercice(sousexercices) {
    var listeTitreNS = [];
    var listeQuestionNA = [];

    if (sousexercices.length < 1) {
        alertErreur("Veuillez ajouter au moins une question ou un sous-exercice.");
        return false;
    }

    for (var i = 0; i < sousexercices.length; i++) {
        if (sousexercices[i][2] == "0") {
            if (sousexercices[i][0] == "") listeTitreNS.push("Titre non saisi");
            if (sousexercices[i][1].length < 1) listeQuestionNA.push("Question non ajoutée");
        } else {
            if (!controlQuestion2(sousexercices[i])) return false;
        }
    }

    if (listeTitreNS.length > 0) {
        alertErreur("Veuillez renseigner le titre de chaque sous-exercice.");
        return false;
    }
    if (listeQuestionNA.length > 0) {
        alertErreur("Veuillez ajouter au moins une question à chaque sous-exercice.");
        return false;
    }

    for (var j = 0; j < sousexercices.length; j++) {
        if (sousexercices[j][2] == "0" && !controlQuestion(sousexercices[j][1])) return false;
    }
    return true;
}

function controlQuestion(questions) {
    var listeQuestionNS = [];
    var listeTexteNS = [];
    var listePropositionNS = [];
    for (var i = 0; i < questions.length; i++) {
        if (questions[i][0] == "Question Courte" && questions[i][1] == "") listeQuestionNS.push("Question non saisie");
        if (questions[i][0] == "Rédaction" && questions[i][3] == "\n") listeTexteNS.push("Texte non saisi");
        if (questions[i][0] == "Choix Unique" || questions[i][0] == "Choix Multiples") {
            if (questions[i][1] == "") listeQuestionNS.push("Question non saisie");
            if (questions[i][2].length < 1) listePropositionNS.push("Proposition non saisie");
        }
    }
    if (listeQuestionNS.length > 0) {
        alertErreur("Veuillez renseigner le libellé de chaque question.");
        return false;
    }
    if (listeTexteNS.length > 0) {
        alertErreur("Veuillez ajouter du contenu pour chaque rédaction.");
        return false;
    }
    if (listePropositionNS.length > 0) {
        alertErreur("Veuillez ajouter au moins une proposition de réponse pour chaque question à choix.");
        return false;
    }

    for (var j = 0; j < questions.length; j++) {
        if (questions[j][0] == "Choix Unique" || questions[j][0] == "Choix Multiples") {
            if (!controlProposition(questions[j][2])) return false;
        }
    }
    return true;
}

function controlQuestion2(question) {
    var listeQuestionNS = [];
    var listeTexteNS = [];
    var listePropositionNS = [];
    
    if (question[3] == "Question Courte" && question[4] == "") listeQuestionNS.push("Question non saisie");
    if (question[3] == "Rédaction" && question[6] == "\n") listeTexteNS.push("Texte non saisi");
    if (question[3] == "Choix Unique" || question[3] == "Choix Multiples") {
        if (question[4] == "") listeQuestionNS.push("Question non saisie");
        if (question[5].length < 1) listePropositionNS.push("Proposition non saisie");
    }

    if (listeQuestionNS.length > 0) {
        alertErreur("Veuillez renseigner le libellé de chaque question.");
        return false;
    }
    if (listeTexteNS.length > 0) {
        alertErreur("Veuillez ajouter du contenu pour chaque rédaction.");
        return false;
    }
    if (listePropositionNS.length > 0) {
        alertErreur("Veuillez ajouter au moins une proposition de réponse pour chaque question à choix.");
        return false;
    }

    if (question[3] == "Choix Unique" || question[3] == "Choix Multiples") {
        if (!controlProposition(question[5])) return false;
    }
    return true;
}

function controlProposition(propositions) {
    var listePropositionNS = [];
    for (let i = 0; i < propositions.length; i++) {
        if (propositions[i] == "") listePropositionNS.push("Proposition non saisie");
    }

    if (listePropositionNS.length > 0) {
        alertErreur("Veuillez renseigner toutes les propositions de réponse pour chaque question à choix.");
        return false;
    }
    return true;
}


//Sauvegarde du brouillon
function saveBrouillon() {
    if (controlSujet()) {
        //Loader de chargement...
        showBtnLoading("btn_save_brouillon", "Sauvegarde en cours...");
        
        //Requête AJAX
        $.ajax({
            url: $('#form_create_sujet').attr('action'),
            type: "POST",
            data: {
                _token: $('input[name="_token"]').val(),
                type_sujet: $.trim($('#type_sujet').val()),
                texte_sujet: text_intro.root.innerHTML,
                description_sujet: $.trim($('#description_sujet').val()),
                niveau: $.trim($('#niveau').val()),
                serie: $.trim($('#serie').val()),
                matiere: $.trim($('#matiere').val()),
                chapitre: $.trim($('#chapitre').val()),
                lecon: $.trim($('#lecon').val()),
                duree: $.trim($('#duree').val()),
                exercices: getExercicesData(),
                top_actif: 0,
            },
            success: function (data, textStatus, jqXHR) {
                hideBtnLoading("btn_save_brouillon", "Enregistrer Brouillon");
    
                //S'il ya une erreur
                if (data.erreurs != null) {
                    var msg = "";
                    data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                    alertErreur(msg);
                } 
                //Message de succès
                else alertSuccessRedirect(data.message, data.redirect_url);
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
                hideBtnLoading("btn_save_brouillon", "Enregistrer Brouillon");
                alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
            },
            dataType: 'json'
        });
    }
}
function updateBrouillon() {
    if (controlSujet()) {
        //Loader de chargement...
        showBtnLoading("btn_save_brouillon", "Sauvegarde en cours...");
        
        //Requête AJAX
        $.ajax({
            url: $('#form_create_sujet').attr('action'),
            type: "POST",
            data: {
                _token: $('input[name="_token"]').val(),
                type_sujet: $.trim($('#type_sujet').val()),
                texte_sujet: text_intro.root.innerHTML,
                description_sujet: $.trim($('#description_sujet').val()),
                niveau: $.trim($('#niveau').val()),
                serie: $.trim($('#serie').val()),
                matiere: $.trim($('#matiere').val()),
                chapitre: $.trim($('#chapitre').val()),
                lecon: $.trim($('#lecon').val()),
                duree: $.trim($('#duree').val()),
                exercices: getExercicesData(),
                top_actif: 0,
            },
            success: function (data, textStatus, jqXHR) {
                hideBtnLoading("btn_save_brouillon", "Enregistrer Brouillon");
    
                //S'il ya une erreur
                if (data.erreurs != null) {
                    var msg = "";
                    data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                    alertErreur(msg);
                } 
                //Message de succès
                else alertSuccessRedirect(data.message, data.redirect_url);
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
                hideBtnLoading("btn_save_brouillon", "Enregistrer Brouillon");
                alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
            },
            dataType: 'json'
        });
    }
}

//Sauvegarde & Publication
function savePublish() {
    if (controlSujet() && controlExercice()) {
        //Loader de chargement...
        showBtnLoading("btn_save_publish", "Sauvegarde en cours...");
        
        //Requête AJAX
        $.ajax({
            url: $('#form_create_sujet').attr('action'),
            type: "POST",
            data: {
                _token: $('input[name="_token"]').val(),
                type_sujet: $.trim($('#type_sujet').val()),
                texte_sujet: text_intro.root.innerHTML,
                description_sujet: $.trim($('#description_sujet').val()),
                niveau: $.trim($('#niveau').val()),
                serie: $.trim($('#serie').val()),
                matiere: $.trim($('#matiere').val()),
                chapitre: $.trim($('#chapitre').val()),
                lecon: $.trim($('#lecon').val()),
                duree: $.trim($('#duree').val()),
                exercices: getExercicesData(),
                top_actif: 1,
            },
            success: function (data, textStatus, jqXHR) {
                hideBtnLoading("btn_save_publish", "Enregister & Publier");
    
                //S'il ya une erreur
                if (data.erreurs != null) {
                    var msg = "";
                    data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                    alertErreur(msg);
                } 
                //Message de succès
                else alertSuccessRedirect(data.message, data.redirect_url);
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
                hideBtnLoading("btn_save_publish", "Enregister & Publier");
                alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
            },
            dataType: 'json'
        });
    }
}
function updatePublish() {
    if (controlSujet() && controlExercice()) {
        //Loader de chargement...
        showBtnLoading("btn_save_publish", "Sauvegarde en cours...");
        
        //Requête AJAX
        $.ajax({
            url: $('#form_create_sujet').attr('action'),
            type: "POST",
            data: {
                _token: $('input[name="_token"]').val(),
                type_sujet: $.trim($('#type_sujet').val()),
                texte_sujet: text_intro.root.innerHTML,
                description_sujet: $.trim($('#description_sujet').val()),
                niveau: $.trim($('#niveau').val()),
                serie: $.trim($('#serie').val()),
                matiere: $.trim($('#matiere').val()),
                chapitre: $.trim($('#chapitre').val()),
                lecon: $.trim($('#lecon').val()),
                duree: $.trim($('#duree').val()),
                exercices: getExercicesData(),
                top_actif: 1,
            },
            success: function (data, textStatus, jqXHR) {
                hideBtnLoading("btn_save_publish", "Enregister & Publier");
    
                //S'il ya une erreur
                if (data.erreurs != null) {
                    var msg = "";
                    data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                    alertErreur(msg);
                } 
                //Message de succès
                else alertSuccessRedirect(data.message, data.redirect_url);
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
                hideBtnLoading("btn_save_publish", "Enregister & Publier");
                alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
            },
            dataType: 'json'
        });
    }
}

//Publication d'un sujet
function publishSujet(id_sujet) {
    //Loader de chargement...
    showBtnLoading("btn_publish_sujet", "Publication en cours...");

    //Requête AJAX
    $.ajax({
        url: "/admin/enseignant/publish-sujet/"+id_sujet,
        type: "GET",
        success: function(data) {
            hideBtnLoadingIcon("btn_publish_sujet", "fa-check", "Valider & Publier");
            
            if (data.res == 0) {
                alertSuccessRedirect(data.message, data.redirect_url);
            } else {
                alertErreur(data.message);
            }
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoadingIcon("btn_publish_sujet", "fa-check", "Valider & Publier");
            alertErreur("Un problème est survenu lors de la publication. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
}

//Création de sujet
$('#form_create_sujet').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();
});

function setTextIntoEditor(index, html_text) {
    //const value = html_text;
    const delta = edittexts[index].clipboard.convert(html_text);
    edittexts[index].setContents(delta, 'silent');
}


/*===================================
        GESTION COMPTE CELPAY
====================================*/
$('#form_rechargement_celpay').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();
});
$('#form_transfert_celpay').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();
});

function controlRechargementCelPay() {
    if ($.trim($('#montant_rechargement').val()) == "") {
        alertErreurFocus("Veuillez SVP sélectionner le montant du rechargement.", "montant_rechargement");
        return false;
    }
    return true;
}

function validerRechargementCelPay() {
    if (controlRechargementCelPay()) {
        //Loader de chargement...
        showBtnLoading("btn_rechargement_celpay", "Traitement en cours...");
            
        //Requête AJAX
        $.ajax({
            url: $('#form_rechargement_celpay').attr('action'),
            type: "POST",
            data: {
                _token: $('input[name="_token"]').val(),
                montant: $('#montant_rechargement').val(),
            },
            success: function (data, textStatus, jqXHR) {
                hideBtnLoadingIcon("btn_rechargement_celpay", "fa-check", "Valider");
    
                //S'il ya une erreur
                if (data.erreurs != null) {
                    var msg = "";
                    data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                    alertErreur(msg);
                } else {
                    checkout(data);
                    $('#modalRecharge').modal('hide');
                    $('#montant_rechargement').val("");
                }
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
                hideBtnLoadingIcon("btn_rechargement_celpay", "fa-check", "Valider");
                alertErreur("Un problème est survenu lors du traitement. Veuillez réessayer plus tard...");
            },
            dataType: 'json'
        });
    }
}

function checkout(infos) {
    CinetPay.setConfig({
        apikey: infos.apikey,
        site_id: infos.site_id,
        notify_url: infos.notify_url,
        mode: 'PRODUCTION'
    });
    CinetPay.getCheckout({
        transaction_id: infos.transaction_id,
        amount: infos.amount,
        currency: infos.currency,
        channels: 'ALL',
        description: 'Rechargement de compte CELPAY',
        customer_name: infos.customer_name,
        customer_surname: infos.customer_surname,
        customer_email: infos.customer_email,
        customer_phone_number: infos.customer_phone_number,
        customer_address : infos.customer_address,
        customer_city: infos.customer_city,
        customer_country : infos.customer_country,
        customer_state : infos.customer_state,
        customer_zip_code : infos.customer_zip_code,

    });
    CinetPay.waitResponse(function(data) {
        if (data.status == "REFUSED") {
            if (alert("Votre paiement a échoué")) {
                window.location.reload();
            }
        } else if (data.status == "ACCEPTED") {
            if (alert("Votre paiement a été effectué avec succès")) {
                window.location.reload();
            }
        }
    });
    CinetPay.onError(function(data) {
        console.log(data);
    });
    CinetPay.onClose(function(data) {
        //Notification manuelle
        notificationManuelle(infos.transaction_id, infos.notify_url);
    });
}

function notificationManuelle(transaction_id, notify_url) {
    $.ajax({
        url: notify_url,
        type: "POST",
        data: {
            cpm_trans_id: transaction_id,
            cel_phone_num: "",
        },
        success: function (data, textStatus, jqXHR) {
            if (data.code == "00") actualiserPage();
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
        },
        dataType: 'json'
    });
}

function redirectionAutomatique(payment_url) {
    window.setTimeout(function(){
        window.location.href = payment_url;
    }, 5000);
}

function actualiserPage() {
    location.reload();
}

function afficherNomBeneficiaire() {
    $('#nom_beneficiaire').html('<option value=""></option>');
    $('#identifiant_beneficiaire').val("");
    if ($.trim($('#statut_beneficiaire').val()) != "") {
        $.ajax({
            url: "/beneficiaires/"+$.trim($('#statut_beneficiaire').val()),
            type: "GET",
            success: function(data) {
                var select = '<option value=""></option>';
                if (data.length >= 1) {
                    data.forEach(info => {
                        select += "<option value='"+info['identifiant']+"'>"+info['nom_prenom']+"</option>";
                    });
                }
                $('#nom_beneficiaire').html(select);
            },
            dataType: 'json'
        });
    }
}

function afficherIdBeneficiaire() {
    $('#identifiant_beneficiaire').val($('#nom_beneficiaire').val());
}

function controlTransfertCelPay() {
    if (!$('#form_transfert_celpay')[0].checkValidity()) {
        return false;
    }
    if ($.trim($('#montant_transfert').val()) == "") {
        alertErreurFocus("Veuillez SVP sélectionner le montant du transfert.", "montant_transfert");
        return false;
    }
    if ($.trim($('#statut_beneficiaire').val()) == "") {
        alertErreurFocus("Veuillez SVP sélectionner le statut du bénéficiaire.", "statut_beneficiaire");
        return false;
    }
    if ($.trim($('#nom_beneficiaire').val()) == "") {
        alertErreurFocus("Veuillez SVP sélectionner le nom du bénéficiaire.", "nom_beneficiaire");
        return false;
    }
    return true;
}

function validerTransfertCelPay() {
    if (controlTransfertCelPay()) {
        //Loader de chargement...
        showBtnLoading("btn_transfert_celpay", "Traitement en cours...");
            
        //Requête AJAX
        $.ajax({
            url: $('#form_transfert_celpay').attr('action'),
            type: "POST",
            data: {
                _token: $('input[name="_token"]').val(),
                montant: $('#montant_transfert').val(),
                beneficiaire: $('#nom_beneficiaire').val(),
            },
            success: function (data, textStatus, jqXHR) {
                hideBtnLoadingIcon("btn_transfert_celpay", "fa-check", "Valider");
                console.log(data);
    
                //S'il ya une erreur
                if (data.erreurs != null) {
                    var msg = "";
                    data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                    alertErreur(msg);
                } else {
                    if (data.res == 0) {
                        $('#modalTransfert').modal('hide');
                        alertSuccessReload(data.message);
                    }
                    else alertErreur(data.message);
                }
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
                hideBtnLoadingIcon("btn_transfert_celpay", "fa-check", "Valider");
                alertErreur("Un problème est survenu lors du traitement. Veuillez réessayer plus tard...");
            },
            dataType: 'json'
        });
    }
}

function fermerModalTransfert() {
    $('#modalTransfert').modal('hide');
    $('#montant_transfert').val("");
    $('#statut_beneficiaire').val("");
    $('#nom_beneficiaire').val("");
    $('#identifiant_beneficiaire').val("");
}