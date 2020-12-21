<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <?= $judul; ?>
            </h6>
        </div>
        <div class="card-body">

            <a href="/gurukelasonline/tambahmateri/<?php echo $id_kelasonline ?>" class="btn btn-success">
                <i class="fa fa-plus"></i><span class="text"> Tambah Materi</span>
            </a>
            <hr />

            <?php $pertemuan = 1;
            foreach ($materi as $key => $value) { ?>
                <h5>Pertemuan <?= $pertemuan++; ?></h5>
                <h6 class="mt-3"><b><?= $value['deskripsi']; ?></b></h6>
                <p><?= $value['file_materi']; ?></p>
                <hr />
            <?php } ?>

            <div class="modal-footer">
                <a href="<?= base_url('gurukelasonline') ?>" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
            </div>
        </div>
    </div>