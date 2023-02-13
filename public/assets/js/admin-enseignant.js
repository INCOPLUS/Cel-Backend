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

//Activation/Désactivation
function activerPublication(id, top_publication) {
    Swal.fire({
        title: top_publication == '1' ? 'Activation...' : 'Désactivation...',
        text: "Etes-vous sûr de vouloir "+ (top_publication == '1' ? 'activer' : "désactiver") +" l'autorisation de publication pour cet enseignant ?",
        icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', 
        confirmButtonText: top_publication == '1' ? 'Oui, Activer' : 'Oui, Désactiver', cancelButtonText: 'Non'
    }).then((result) => {
        if (result.isConfirmed) {
            //Requête AJAX
            $.ajax({
                url: "/admin/admin/enable-publication/"+id+"/"+top_publication,
                type: "GET",
                success: function(data) {
                    //Message de succès
                    alertSuccessReload(data.message);
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