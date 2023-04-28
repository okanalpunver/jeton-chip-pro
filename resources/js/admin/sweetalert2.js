window.swalBs = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-primary',
      cancelButton: 'btn btn-default'
    },
    buttonsStyling: false,
    confirmButtonText: 'Kapat',
});

window.swalDeleteConfirm = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-danger',
      cancelButton: 'btn btn-default'
    },
    buttonsStyling: false,
});

window.swalErrors = function(e) {
    var errors = e.responseJSON.errors;
    if (typeof errors != typeof undefined) {
        for (var prop in errors) {
            swalBs.fire({
                title: 'Hata!',
                text: errors[prop][0],
                type: 'error',
                showConfirmButton: false,
                timer: 3000,
            });
            break;
        }
    } else {
        swalBs.fire({
            title: 'Hata!',
            text: e.responseJSON.message,
            type: 'error',
            showConfirmButton: false,
            timer: 3000,
        });
    }
}

$(function () {
    $(document).on("click",".delete-confirm",function() {
        var url = $(this).data('url');

        swalDeleteConfirm.fire({
            title: 'Emin misiniz?',
            text: "Bu işlem geri alınamayacaktır!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Evet, kaydı sil!',
            cancelButtonText: 'İptal',
        }).then(function(result) {
            if (result.value) {
                axios.delete(url).then(response => {

                    swalBs.fire({
                        title: 'Silindi!',
                        text: 'Kayıt başarıyla silindi.',
                        type: 'success',
                        showConfirmButton: false,
                        timer: 1500,
                    })

                    $('#table').DataTable().ajax.reload();
                });

            }
        });
    });
});
