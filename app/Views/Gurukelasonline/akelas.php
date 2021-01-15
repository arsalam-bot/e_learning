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
            <?php
            foreach ($materi as $key => $value) { ?>
                <h5 class="m-0 font-weight-bold text-info"><?= $value['judul']; ?></h5>
                <h6 class="mt-3"><?= $value['deskripsi']; ?></h6>
                <?php if ($value['file_materi'] == "") { ?>
                
                <?php } else { ?>
                    <a href="<?= base_url('gurukelasonline/viewpdf/' . $value['id_materi']); ?>">
                        <img src="<?= base_url('materi tugas/pdf.png'); ?>" id="gambar_load" width="40px">
                        <span><embed><?= $value['file_materi']; ?></embed></span>
                    </a><br />
                <?php } ?>
                <hr />
            <?php } ?>
            <div class="modal-footer">
                <a href="<?= base_url('kelasonline') ?>" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
            </div>
        </div>
    </div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>