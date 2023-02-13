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