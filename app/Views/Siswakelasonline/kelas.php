<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">
                <?= $judul; ?>
            </h6>
        </div>
        <div class="card-body">
            <a href="/gurukelasonline/tambahmateri/<?php echo $id_kelasonline ?>" class="m-0 font-weight-bold text-info">
                <h5>Presensi</h5>
            </a>
            <hr />
            <?php
            foreach ($materi as $key => $value) { ?>
                <h5 class="m-0 font-weight-bold text-info"><?= $value['judul']; ?></h5>
                <h6 class="mt-3"><?= $value['deskripsi']; ?></h6>

                <?php if ($value['file_materi'] != "") { ?>
                    <a href="<?= base_url('siswakelasonline/viewpdf/' . $value['id_kelasonline']); ?>">
                        <img src="<?= base_url('materi tugas/pdf.png'); ?>" id="gambar_load" width="40px">
                        <?= $value['file_materi']; ?>
                    </a>
                <?php } ?>
                <hr />
            <?php } ?>
            <div class="modal-footer">
                <a href="<?= base_url('siswakelasonline') ?>" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
            </div>
        </div>
    </div>
</div>