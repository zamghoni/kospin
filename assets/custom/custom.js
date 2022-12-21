// delete
$(document).on("click",".hapus",function(e){
    e.preventDefault();
    const href = $(this).attr('href');
    swal({
        title: 'Apakah Anda yakin?',
        text: "<b> Data tersebut akan dihapus </b>",
        type: 'warning',
        width : '25rem',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-sm btn-primary m-2',
        confirmButtonText: 'Ya, hapus data!',
        cancelButtonClass: 'btn btn-sm btn-danger m-2',
        cancelButtonText: 'Tidak, batalkan!',
        buttonsStyling: false,
        referseButtons: true,
    }).then((result) => {
      document.location.href = href;
    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
        if (dismiss === 'cancel') {
          Lobibox.notify('warning', {
            pauseDelayOnHover: true,
            size: 'mini',
            rounded: true,
            delayIndicator: true,
            icon: 'bx bx-error',
            continueDelayOnInactiveTab: false,
            position: 'top right',
            msg: 'File yang anda pilih tidak dihapus'
          });
        }
    })
  });
