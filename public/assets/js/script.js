// Mengambil data untuk ditambilkan di form 
// saat akan mengedit data siswa
// $(document).on('click', '#btn-edit', function() {
//     $('.modal-body #id-siswa').val($(this).data('id'));
//     $('.modal-body #nisn').val($(this).data('nisn'));
//     $('.modal-body #nama').val($(this).data('nama'));
// })


//mencoba script agar button setelah di klik dan refresh tidak muncul lagi

// $(document).on('click', '#tekan', function() {
//     e.preventDefault(); 
//     $("#tekan").attr("hide", true);

//     return true;
// })

$(document).ready(function(){
    $("#presensi").click(function(){
        $("#presensi").hide();
        //$("#presensi").prop('hidden',true);
        // $("#presensi").prop('disabled',true);
    });
});

// $(document).ready(function () {
//     $("#tekan").submit(function (e) {
//         $("#tekan").attr("disabled", true);
//         return true;
//     });

// });
