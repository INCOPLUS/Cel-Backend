/*=====================================
    FONCTIONS DES MESSAGES D'ALERTE    
======================================*/
function alertSuccess(message) {
    Swal.fire('Félicitations...', message, 'success');
}
function alertSuccessReload(message) {
    Swal.fire({
        icon: 'success', title: 'Félicitations...', text: message,
        willClose: () => { location.reload(); }
    });
}
function alertSuccessRedirect(message, url) {
    Swal.fire({
        icon: 'success', title: 'Félicitations...', text: message,
        willClose: () => { window.location.href = url }
    });
}
function alertErreur(message) {
    Swal.fire({icon: 'error', title: 'Attention...', html: message});
}
function alertErreurFocus(message, index) {
    $('#'+index).focus();
    Swal.fire({icon: 'error', title: 'Attention...', html: message});
}
function alertConfirm() {
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
function alertAutoClose() {
    let timerInterval
    const swalAutoClose = Swal.fire({
        title: 'Auto close alert!',
        html: 'I will close in <b></b> milliseconds.',
        timer: 2000,
        timerProgressBar: true,
        allowOutsideClick: false,
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

function afficherAlertSuccess(note, mention, temps) {
    $('#note_success').html(note+"/20");
    $('#mention_success').html(mention);
    $('#temps_success').html(temps);
    $('#modalSuccess').toggleClass('active');
}
function afficherAlertFailed(note, mention, temps) {
    $('#note_failed').html(note+"/20");
    $('#mention_failed').html(mention);
    $('#temps_failed').html(temps);
    $('#modalFailed').toggleClass('active');
}
function afficherAlertConfirm() {
    $('#modalConfirm').toggleClass('active');
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
        COMPOSITION DU SUJET
====================================*/
var id_composition = null;

function commencerEpreuve(id_sujet_eleve) {
    //Loader de chargement...
    showBtnLoading("btn_start_sujet", "Vérification en cours...");

    //Requête AJAX
    $.ajax({
        url: "/admin/eleve/debuter-compo/"+id_sujet_eleve+"/"+getCurrentDatetime(),
        type: "GET",
        success: function(data) {
            hideBtnLoading("btn_start_sujet", "Commencer l'épreuve");
            if (data.res == 0) {
                id_composition = data.id_compo;
                lancerCronometre(data.date_fin);
                $('#modalAvertissement').toggleClass('active');
            } else {
                alertErreur(data.message);
            }
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoading("btn_start_sujet", "Commencer l'épreuve");
            alertErreur("Un problème est survenu lors de la vérification. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });
}

function lancerCronometre(date_fin) {
    //Heure de fin
    var hfin = new Date(date_fin).getTime();
    
    //MAJ du compteur chaque seconde
    var x = setInterval(function() {
    
        //Heure de début
        var hdebut = new Date().getTime();
            
        //Différence entre debut et fin
        var difference = hfin - hdebut;
            
        //Calcul des jours, heures, minutes et seconde
        //var days = Math.floor(difference / (1000 * 60 * 60 * 24));
        var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((difference % (1000 * 60)) / 1000);
        
        //Formattage du temps
        var temps = (hours > 0 ? pad(hours)+":" : "") + pad(minutes) + ":" + pad(seconds);
        $('#chrono').html(temps);
        
        //Si le délai expire
        if (difference < 0) {
            clearInterval(x);
            $('#chrono').html("00:00");
            delaiCompoExpire();
        }
    }, 1000);
}

function getCurrentDatetime() {
    return new Date().toISOString().slice(0, 19).replace("T", " ");
}

function getReponsesData() {
    var tab = [];
    var tableau = [];

    //Radio
    var radio = $('div.details-sujet').find('div.multiple-choice');
    if (radio.length >= 1) {
        for (let index = 0; index < radio.length; index++) {
            //Récupération des données
            const element = radio[index];
            var id_question = $(element).attr('id');
            var reponse_question = "";
            var radio_checked = $(element).find("input[type='radio']:checked");
            if (radio_checked.length >= 1) {
                reponse_question = radio_checked.next("p.paragraph").text();
            }

            //Affectations au tableau
            tab.push(id_question);
            tab.push(reponse_question);
            tableau.push(tab);
            tab = [];
        }
    }

    //Checkbox
    var checkbox = $('div.details-sujet').find('div.option-checkbox');
    if (checkbox.length >= 1) {
        for (let index = 0; index < checkbox.length; index++) {
            //Récupération des données
            const element = checkbox[index];
            var id_question = $(element).attr('id');
            var reponse_question = "";
            var checkbox_checked = $(element).find("input[type='checkbox']:checked");
            if (checkbox_checked.length >= 1) {
                for (let j = 0; j < checkbox_checked.length; j++) {
                    reponse_question += $(checkbox_checked[j]).next("p.paragraph").text() + (((j+1) < checkbox_checked.length) ? "\n" : "");
                }
            }

            //Affectations au tableau
            tab.push(id_question);
            tab.push(reponse_question);
            tableau.push(tab);
            tab = [];
        }
    }

    //Textarea
    var textarea = $('div.details-sujet').find('textarea.textarea-option');
    if (textarea.length >= 1) {
        for (let index = 0; index < textarea.length; index++) {
            //Récupération des données
            const element = textarea[index];
            var id_question = $(element).attr('id');
            var reponse_question = $.trim($(element).val());

            //Affectations au tableau
            tab.push(id_question);
            tab.push(reponse_question);
            tableau.push(tab);
            tab = [];
        }
    }

    //On retourne le tableau
    return tableau;
}

/*===================================
        VALIDATION DU SUJET
====================================*/
$('#form_valider_compo').submit((e) => {
    let that = e.currentTarget;
    e.preventDefault();
});

function validerSujet() {
    //Loader de chargement...
    showBtnLoading("btn_finish_compo", "Sauvegarde en cours...");
    $('#btn_retour_compo').prop('disabled', true);
        
    //Requête AJAX
    $.ajax({
        url: $('#form_valider_compo').attr('action'),
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            id_composition: id_composition,
            date_finish: getCurrentDatetime(),
            reponses: getReponsesData(),
        },
        success: function (data, textStatus, jqXHR) {
            hideBtnLoading("btn_finish_compo", "Terminer & Envoyer");
            afficherAlertConfirm();

            //S'il ya une erreur
            if (data.erreurs != null) {
                var msg = "";
                data.erreurs.forEach(erreur => { msg += erreur + "<br>"; });
                alertErreur(msg);
            } else {
                if (data.top_resultat == "Succes") {
                    afficherAlertSuccess(data.note, data.mention, data.temps_mis);
                } else {
                    afficherAlertFailed(data.note, data.mention, data.temps_mis);
                }
            }
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            hideBtnLoading("btn_finish_compo", "Terminer & Envoyer");
            alertErreur("Un problème est survenu lors de la sauvegarde. Veuillez réessayer plus tard...");
        },
        dataType: 'json'
    });

}

function delaiCompoExpire() {
    afficherAlertConfirm();
    validerSujet();
}

function pad(val) {
    var valString = val + "";
    if (valString.length < 2) {
        return "0" + valString;
    } else {
        return valString;
    }
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

function validerRechargementCelPay2() {
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
                if (data.resultat == "Succes") {
                    alertSuccessRedirect(data.message, data.payment_url);
                    redirectionAutomatique(data.payment_url);
                } else alertErreur(data.message);
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


/*===================================
        GESTION DU PANIER
====================================*/
function ajoutSujetPanier(id_sujet) {
    Swal.fire({
        title: 'Êtes-vous sûr?', text: "Voulez-vous ajouter ce sujet à votre panier ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', 
        cancelButtonColor: '#d33', confirmButtonText: 'Oui', cancelButtonText: 'Non'
      }).then((result) => {
        if (result.isConfirmed) {
            //Alert Loading....
            const swalAutoLoading = Swal.fire({
                title: 'Traitement en cours', html: 'Veuillez patienter SVP...',
                timerProgressBar: true, allowOutsideClick: false,
                didOpen: () => { Swal.showLoading() }
            });

            //Requête AJAX
            $.ajax({
                url: "/admin/eleve/ajout-panier/"+id_sujet,
                type: "GET",
                success: function(data) {
                    swalAutoLoading.close();
                    if (data.res == 0) alertSuccess(data.message);
                    else alertErreur(data.message);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    swalAutoLoading.close();
                    alertErreur("Un problème est survenu lors du traitement. Veuillez réessayer plus tard...");
                },
                dataType: 'json'
            });
        }
    });
}
function retraitSujetPanier(id_sujet) {
    Swal.fire({
        title: 'Êtes-vous sûr?', text: "Voulez-vous retirer ce sujet de votre panier ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', 
        cancelButtonColor: '#d33', confirmButtonText: 'Oui', cancelButtonText: 'Non'
      }).then((result) => {
        if (result.isConfirmed) {
            //Alert Loading....
            const swalAutoLoading = Swal.fire({
                title: 'Traitement en cours', html: 'Veuillez patienter SVP...',
                timerProgressBar: true, allowOutsideClick: false,
                didOpen: () => { Swal.showLoading() }
            });

            //Requête AJAX
            $.ajax({
                url: "/admin/eleve/retrait-panier/"+id_sujet,
                type: "GET",
                success: function(data) {
                    swalAutoLoading.close();
                    if (data.res == 0) alertSuccessReload(data.message);
                    else alertErreur(data.message);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    swalAutoLoading.close();
                    alertErreur("Un problème est survenu lors du traitement. Veuillez réessayer plus tard...");
                },
                dataType: 'json'
            });
        }
    });
}
function viderPanier() {
    Swal.fire({
        title: 'Êtes-vous sûr?', text: "Voulez-vous vider votre panier ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', 
        cancelButtonColor: '#d33', confirmButtonText: 'Oui', cancelButtonText: 'Non'
      }).then((result) => {
        if (result.isConfirmed) {
            //Alert Loading....
            const swalAutoLoading = Swal.fire({
                title: 'Traitement en cours', html: 'Veuillez patienter SVP...',
                timerProgressBar: true, allowOutsideClick: false,
                didOpen: () => { Swal.showLoading() }
            });

            //Requête AJAX
            $.ajax({
                url: "/admin/eleve/vider-panier",
                type: "GET",
                success: function(data) {
                    swalAutoLoading.close();
                    if (data.res == 0) alertSuccessReload(data.message);
                    else alertErreur(data.message);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    swalAutoLoading.close();
                    alertErreur("Un problème est survenu lors du traitement. Veuillez réessayer plus tard...");
                },
                dataType: 'json'
            });
        }
    });
}
function achatSujet(id_sujet, montant) {
    Swal.fire({
        title: 'Êtes-vous sûr?', html: "Voulez-vous acheter ce sujet (<b>"+montant+" XOF</b>) ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', 
        cancelButtonColor: '#d33', confirmButtonText: 'Oui', cancelButtonText: 'Non'
      }).then((result) => {
        if (result.isConfirmed) {
            //Alert Loading....
            const swalAutoLoading = Swal.fire({
                title: 'Traitement en cours', html: 'Veuillez patienter SVP...',
                timerProgressBar: true, allowOutsideClick: false,
                didOpen: () => { Swal.showLoading() }
            });

            //Requête AJAX
            $.ajax({
                url: "/admin/eleve/achat-sujet/"+id_sujet,
                type: "GET",
                success: function(data) {
                    swalAutoLoading.close();
                    if (data.res == 0) alertSuccessReload(data.message);
                    else alertErreur(data.message);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    swalAutoLoading.close();
                    alertErreur("Un problème est survenu lors du traitement. Veuillez réessayer plus tard...");
                },
                dataType: 'json'
            });
        }
    });
}
function achatPanier(montant) {
    Swal.fire({
        title: 'Êtes-vous sûr?', html: "Voulez-vous valider votre panier (<b>"+montant+" XOF</b>) ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', 
        cancelButtonColor: '#d33', confirmButtonText: 'Oui', cancelButtonText: 'Non'
      }).then((result) => {
        if (result.isConfirmed) {
            //Alert Loading....
            const swalAutoLoading = Swal.fire({
                title: 'Traitement en cours', html: 'Veuillez patienter SVP...',
                timerProgressBar: true, allowOutsideClick: false,
                didOpen: () => { Swal.showLoading() }
            });

            //Requête AJAX
            $.ajax({
                url: "/admin/eleve/achat-panier",
                type: "GET",
                success: function(data) {
                    swalAutoLoading.close();
                    if (data.res == 0) alertSuccessReload(data.message);
                    else alertErreur(data.message);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    swalAutoLoading.close();
                    alertErreur("Un problème est survenu lors du traitement. Veuillez réessayer plus tard...");
                },
                dataType: 'json'
            });
        }
    });
}