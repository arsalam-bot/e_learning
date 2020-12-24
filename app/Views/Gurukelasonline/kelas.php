<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">
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
                <h5 class="m-0 font-weight-bold text-info">Pertemuan <?= $pertemuan++; ?></h5>
                <h6 class="mt-3"><?= $value['deskripsi']; ?></h6>
                <a onclick href="">
                    <img src="<?= base_url('materi tugas/pdf.png'); ?>" id="gambar_load" width="40px">
                    <span><embed><?= $value['file_materi']; ?></embed></span>
                </a>
                <a href="<?= base_url('gurukelasonline/edit/' . $value['id_kelasonline']) ?>" class="btn btn-circle btn-sm btn-warning" type="button">
                    <i class="fa fa-edit"></i>
                </a>
                <button class="btn btn-circle btn-sm btn-danger" type="button" data-toggle="modal" data-target="">
                    <i class="fa fa-trash-alt"></i>
                </button>
                <hr />
            <?php } ?>

            <div class="modal-footer">
                <a href="<?= base_url('gurukelasonline') ?>" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
            </div>
        </div>
    </div>
</div>
