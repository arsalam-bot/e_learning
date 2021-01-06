<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">
                <?= $kelas['nama_mapel']; ?> <?= $kelas['kelas']; ?>
            </h6>
        </div>
        <div class="card-body">
            <?php if (session()->get('message')) :  ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Tugas Berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
                </div>
            <?php endif; ?>
            <?php if (session()->get('message1')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Berhasil <strong><?= session()->getFlashdata('message1'); ?></strong>
                </div>
            <?php endif; ?>
            <?php
            foreach ($materi as $key => $value) { ?>
                <h5 class="m-0 font-weight-bold text-info"><?= $value['judul']; ?></h5>
                <h6 class="mt-3"><?= $value['deskripsi']; ?></h6>

                <?php if ($value['file_materi'] != "") { ?>
                    <a href="<?= base_url('siswakelasonline/viewpdf/' . $value['id_materi']); ?>">
                        <img src="<?= base_url('materi tugas/pdf.png'); ?>" id="gambar_load" width="40px">
                        <?= $value['file_materi']; ?>
                    </a>
                <?php } ?>
                <div class="mt-2">
                    <a href="<?= base_url('siswakelasonline/jtugas/' . $value['id_materi']); ?>">Pengumpulan Tugas</a>
                </div>
                <div class="mt-2">
                    <a href="<?= base_url('siswakelasonline/presensi/' . $value['id_materi']); ?>">Presensi</a>
                </div>
                <hr />
            <?php } ?>
            <div class="modal-footer">
                <a href="<?= base_url('siswakelasonline') ?>" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
            </div>
        </div>
    </div>
</div>