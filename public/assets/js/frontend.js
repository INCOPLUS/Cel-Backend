/*=====================================
    FONCTIONS DES MESSAGES D'ALERTE    
======================================*/
function alertSuccess1() {
    Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
    );
}
function alertSuccess3(params) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
      
    Toast.fire({
    icon: 'success',
    title: 'Signed in successfully'
    });
}
function alertErreur(message) {
    Swal.fire({
        icon: 'error', title: 'Attention...', html: message,
        //footer: '<a href="">Why do I have this issue?</a>'
    });
}
function alertErreurFocus(message, index) {
    $('#'+index).focus();
    Swal.fire({icon: 'error', title: 'Attention...', html: message,
        //footer: '<a href="">Why do I have this issue?</a>'
    });
}
function alertConfirm(params) {
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
function alertAutoClose(params) {
    let timerInterval
    Swal.fire({
        title: 'Auto close alert!',
        html: 'I will close in <b></b> milliseconds.',
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
        }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
        }
    })
}
function alertInfo(params) {
    Swal.fire(
        'The Internet?',
        'That thing is still around?',
        'info'
    );
}
function alertSuccessInscription(identifiant, url) {
    Swal.fire({
        icon: 'success', title: 'Félicitations...', width: '50rem', 
        // html: "Votre compte a été créé avec succès. Vous recevrez votre <strong>identifiant CEL</strong> par mail.<br>NB: Pensez à vérifier dans les spams.",
        html: "Votre compte a été créé avec succès. Votre identifiant est : <strong>"+identifiant+"</strong>.<br>Vous pouvez vous connecter.",
        willClose: () => { window.location.href = url }
    });
}
function alertSucessConnexion(url) {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Connexion réussie, Redirection en cours...',
        showConfirmButton: false,
        timer: 2000,
        willClose: () => { window.location.href = url }
    });
}
function alertSucessConnexion2(url) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
      
    Toast.fire({
    icon: 'success',
    title: 'Connexion réussie... Redirection en cours...',
    willClose: () => { window.location.href = url }
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

/*===================================
        VERIFICATION DU MAIL
====================================*/
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

/*=======================================
    AFFICHAGE DE VALEURS DANS LES COMBO
=======================================*/
function afficherNiveau() {
    $('#niveau_eleve').html('<option value="0">Choisir ...</option>');
    if ($.trim($('#enseignement_eleve').val()) != "0") {
        $.ajax({
            url: "/niveaux/"+$.trim($('#enseignement_eleve').val()),
            type: "GET",
            success: function(data) {
                var select = '<option value="0">Choisir ...</option>';
                if (data.length >= 1) {
                    data.forEach(info => {
                        select += "<option value='"+info['id_niveau']+"'>"+info['libelle']+"</option>";
                    });
                }
                $('#niveau_eleve').html(select);
            },
            dataType: 'json'
        });
    }
}

function afficherMatieres() {
    $('#discipline_enseignant').html('<option value="0">Choisir ...</option>');
    if ($.trim($('#enseignement_enseignant').val()) != "0") {
        $.ajax({
            url: "/matieres/"+$.trim($('#enseignement_enseignant').val()),
            type: "GET",
            success: function(data) {
                var select = '<option value="0">Choisir ...</option>';
                if (data.length >= 1) {
                    data.forEach(info => {
                        select += "<option value='"+info['id_matiere']+"'>"+info['libelle']+"</option>";
                    });
                }
                $('#discipline_enseignant').html(select);
            },
            dataType: 'json'
        });
    }
}


/*===================================
        CONTROL DE LA SAISIE
====================================*/
function controlInscriptionEleve() {
    if ($.trim($('#nom_eleve').val()) == "") {
        alertErreurFocus('Veuillez renseigner votre nom & prénom(s).', "nom_eleve");
        return false;
    }
    // if ($.trim($('#email_eleve').val()) == "") {
    //     alertErreurFocus('Veuillez renseigner votre adresse email.', "email_eleve");
    //     return false;
    // }
    if ($.trim($('#email_eleve').val()) != "" && !validateEmail($.trim($('#email_eleve').val()))) {
        alertErreurFocus("Adresse email incorrect.", "email_eleve");
        return false;
    }
    if ($.trim($('#contact_eleve').val()) == "") {
        alertErreurFocus('Veuillez renseigner votre contact (WhatsApp).', "contact_eleve");
        return false;
    }
    // if ($.trim($('#genre_eleve').val()) == "0") {
    //     alertErreurFocus('Veuillez sélectionner votre genre.', "genre_eleve");
    //     return false;
    // }
    // if ($.trim($('#enseignement_eleve').val()) == "0") {
    //     alertErreurFocus('Veuillez sélectionner votre enseignement.', "enseignement_eleve");
    //     return false;
    // }
    // if ($.trim($('#niveau_eleve').val()) == "0") {
    //     alertErreurFocus('Veuillez sélectionner votre niveau.', "niveau_eleve");
    //     return false;
    // }
    if ($.trim($('#mdp_eleve').val()) == "") {
        alertErreurFocus('Veuillez renseigner votre mot de passe.', "mdp_eleve");
        return false;
    }
    if ($.trim($('#mdp_eleve_confirm').val()) == "") {
        alertErreurFocus('Veuillez confirmer le mot de passe.', "mdp_eleve_confirm");
        return false;
    }
    if ($.trim($('#mdp_eleve').val()) != $.trim($('#mdp_eleve_confirm').val())) {
        alertErreurFocus('Les mots de passe ne concordent pas.', "mdp_eleve_confirm");
        return false;
    }
    return true;
}
function controlInscriptionEnseignant() {
    if ($.trim($('#nom_enseignant').val()) == "") {
        alertErreurFocus('Veuillez renseigner votre nom & prénom(s).', "nom_enseignant");
        return false;
    }
    // if ($.trim($('#email_enseignant').val()) == "") {
    //     alertErreurFocus('Veuillez renseigner votre adresse email.', "email_enseignant");
    //     return false;
    // }
    if ($.trim($('#email_enseignant').val()) != "" && !validateEmail($.trim($('#email_enseignant').val()))) {
        alertErreurFocus("Adresse email incorrect.", "email_enseignant");
        return false;
    }
    if ($.trim($('#contact_enseignant').val()) == "") {
        alertErreurFocus('Veuillez renseigner votre contact (WhatsApp).', "contact_enseignant");
        return false;
    }
    if ($.trim($('#mdp_enseignant').val()) == "") {
        alertErreurFocus('Veuillez renseigner votre mot de passe.', "mdp_enseignant");
        return false;
    }
    if ($.trim($('#mdp_enseignant_confirm').val()) == "") {
        alertErreurFocus('Veuillez confirmer le mot de passe.', "mdp_enseignant_confirm");
        return false;
    }
    if ($.trim($('#mdp_enseignant').val()) != $.trim($('#mdp_enseignant_confirm').val())) {
        alertErreurFocus('Les mots de passe ne concordent pas.', "mdp_enseignant_confirm");
        return false;
    }
    return true;
}
function controlInscriptionParent() {
    if ($.trim($('#nom_parent').val()) == "") {
        alertErreurFocus('Veuillez renseigner votre nom & prénom(s).', "nom_parent");
        return false;
    }
    // if ($.trim($('#email_parent').val()) == "") {
    //     alertErreurFocus('Veuillez renseigner votre adresse email.', "email_parent");
    //     return false;
    // }
    if ($.trim($('#email_parent').val()) != "" && !validateEmail($.trim($('#email_parent').val()))) {
        alertErreurFocus("Adresse email incorrect.", "email_parent");
        return false;
    }
    if ($.trim($('#contact_parent').val()) == "") {
        alertErreurFocus('Veuillez renseigner votre contact (WhatsApp).', "contact_parent");
        return false;
    }
    if ($.trim($('#mdp_parent').val()) == "") {
        alertErreurFocus('Veuillez renseigner votre mot de passe.', "mdp_parent");
        return false;
    }
    if ($.trim($('#mdp_parent_confirm').val()) == "") {
        alertErreurFocus('Veuillez confirmer le mot de passe.', "mdp_parent_confirm");
        return false;
    }
    if ($.trim($('#mdp_parent').val()) != $.trim($('#mdp_parent_confirm').val())) {
        alertErreurFocus('Les mots de passe ne concordent pas.', "mdp_parent_confirm");
        return false;
    }
    return true;
}
function controlConnexion() {
    if ($.trim($('#identifiant').val()) == "") {
        alertErreurFocus('Veuillez renseigner votre identifiant.', "identifiant");
        return false;
    }
    if ($.trim($('#mdp').val()) == "") {
        alertErreurFocus('Veuillez renseigner votre mot de passe.', "mdp");
        return false;
    }
    return true;
}

/*===================================
    INSCRIPTION - CONNEXION
====================================*/
$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

//Inscription Elève
$('#form_eleve').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    if (controlInscriptionEleve()) {
        //Loader de chargement...
        showBtnLoading("btn_inscription_eleve", "Sauvegarde en cours...");
        
        //Requête AJAX
        $.ajax({
            url: $(that).attr('action'),
            type: "POST",
            data: {
                // _token: $('input[name="_token"]').val(),
                nom_eleve: $.trim($('#nom_eleve').val()),
                email_eleve: $.trim($('#email_eleve').val()),
                contact_eleve: $.trim($('#contact_eleve').val()),
                genre_eleve: $.trim($('#genre_eleve').val()),
                enseignement_eleve: $.trim($('#enseignement_eleve').val()),
                niveau_eleve: $.trim($('#niveau_eleve').val()),
                mdp_eleve: $.trim($('#mdp_eleve').val())
            },
            success: function (data, textStatus, jqXHR) {
                console.log(data);
                hideBtnLoading("btn_inscription_eleve", "S'inscrire");
    
                //S'il ya une erreur
                if (data.erreurs != null) {
                    var msg = "";
                    data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                    alertErreur(msg);
                } 
                //Message de succès
                else alertSuccessInscription(data.identifiant, data.redirect_url);
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
                hideBtnLoading("btn_inscription_eleve", "S'inscrire");
                alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
            },
            dataType: 'json'
        });
    }
});

//Inscription Enseignant
$('#form_enseignant').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    if (controlInscriptionEnseignant()) {
        //Loader de chargement...
        showBtnLoading("btn_inscription_enseignant", "Sauvegarde en cours...");
        
        //Requête AJAX
        $.ajax({
            url: $(that).attr('action'),
            type: "POST",
            data: {
                nom_enseignant: $.trim($('#nom_enseignant').val()),
                email_enseignant: $.trim($('#email_enseignant').val()),
                contact_enseignant: $.trim($('#contact_enseignant').val()),
                genre_enseignant: $.trim($('#genre_enseignant').val()),
                enseignement_enseignant: $.trim($('#enseignement_enseignant').val()),
                discipline_enseignant: $.trim($('#discipline_enseignant').val()),
                mdp_enseignant: $.trim($('#mdp_enseignant').val())
            },
            success: function (data, textStatus, jqXHR) {
                console.log(data);
                hideBtnLoading("btn_inscription_enseignant", "S'inscrire");
    
                //S'il ya une erreur
                if (data.erreurs != null) {
                    var msg = "";
                    data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                    alertErreur(msg);
                } 
                //Message de succès
                else alertSuccessInscription(data.identifiant, data.redirect_url);
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
                hideBtnLoading("btn_inscription_enseignant", "S'inscrire");
                alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
            },
            dataType: 'json'
        });
    }
});

//Inscription Parent
$('#form_parent').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    if (controlInscriptionParent()) {
        //Loader de chargement...
        showBtnLoading("btn_inscription_parent", "Sauvegarde en cours...");
        
        //Requête AJAX
        $.ajax({
            url: $(that).attr('action'),
            type: "POST",
            data: {
                nom_parent: $.trim($('#nom_parent').val()),
                email_parent: $.trim($('#email_parent').val()),
                contact_parent: $.trim($('#contact_parent').val()),
                genre_parent: $.trim($('#genre_parent').val()),
                profession_parent: $.trim($('#profession_parent').val()),
                nbre_enfant_parent: $.trim($('#nbre_enfant_parent').val()),
                mdp_parent: $.trim($('#mdp_parent').val())
            },
            success: function (data, textStatus, jqXHR) {
                console.log(data);
                hideBtnLoading("btn_inscription_parent", "S'inscrire");
    
                //S'il ya une erreur
                if (data.erreurs != null) {
                    var msg = "";
                    data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                    alertErreur(msg);
                } 
                //Message de succès
                else alertSuccessInscription(data.identifiant, data.redirect_url);
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
                hideBtnLoading("btn_inscription_parent", "S'inscrire");
                alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
            },
            dataType: 'json'
        });
    }
});

//Connexion d'un utilisateur
$('#form_connexion').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();

    if (controlConnexion()) {
        //Loader de chargement...
        showBtnLoading("btn_connexion", "Vérification en cours...");
        
        //Requête AJAX
        $.ajax({
            url: $(that).attr('action'),
            type: "POST",
            data: {
                identifiant: $.trim($('#identifiant').val()),
                mdp: $.trim($('#mdp').val())
            },
            success: function (data, textStatus, jqXHR) {
                console.log(data);
                hideBtnLoading("btn_connexion", "Se connecter");
    
                //S'il ya une erreur
                if (data.erreurs != null) {
                    var msg = "";
                    data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                    alertErreur(msg);
                } 
                //Message de succès
                else alertSucessConnexion2(data.redirect_url);
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
                /*console.log(data.responseJSON.message);
                console.log(textStatus);
                console.log(errorThrown);
                alertErreur(errorThrown);
                alertErreur(data.responseJSON.message);*/
                hideBtnLoading("btn_connexion", "Se connecter");
                alertErreur("Un problème est survenu lors de la connexion. Veuillez réessayer plus tard...");
            },
            dataType: 'json'
        });
    }
});