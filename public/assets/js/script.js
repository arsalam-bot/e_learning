// Mengambil data untuk ditambilkan di form 
// saat akan mengedit data siswa
$(document).on('click', '#btn-edit', function() {
    $('.modal-body #id-siswa').val($(this).data('id'));
    $('.modal-body #nisn').val($(this).data('nisn'));
    $('.modal-body #nama').val($(this).data('nama'));
})

// Mengambil data untuk ditambilkan di form 
// saat akan mengedit data guru
$(document).on('click', '#btn-edit-guru', function() {
    $('.modal-body #id-guru').val($(this).data('id'));
    $('.modal-body #nip').val($(this).data('nip'));
    $('.modal-body #nama').val($(this).data('nama'));
})

// Mengambil data untuk ditambilkan di form 
// saat akan mengedit data mata pelajaran
$(document).on('click', '#btn-edit-pelajaran', function() {
    $('.modal-body #id-pelajaran').val($(this).data('id'));
    $('.modal-body #np').val($(this).data('np'));
    $('.modal-body #nama').val($(this).data('nama'));
})
