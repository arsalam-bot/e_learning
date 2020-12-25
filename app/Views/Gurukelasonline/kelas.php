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
                <?php if ($value['file_materi'] == "") { ?>
                    <a href="<?= base_url('gurukelasonline/edit/' . $value['id_kelasonline']) ?>" class="btn btn-circle btn-sm btn-warning mt-3" type="button">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button class="btn btn-circle btn-sm btn-danger mt-3" type="button" data-toggle="modal" data-target="">
                        <i class="fa fa-trash-alt"></i>
                    </button>
                <?php } else { ?>
                    <a onclick href="">
                        <img src="<?= base_url('materi tugas/pdf.png'); ?>" id="gambar_load" width="40px">
                        <span><embed><?= $value['file_materi']; ?></embed></span>
                    </a><br/>
                    <a href="<?= base_url('gurukelasonline/edit/' . $value['id_kelasonline']) ?>" class="btn btn-circle btn-sm btn-warning mt-3" type="button">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button class="btn btn-circle btn-sm btn-danger mt-3" type="button" data-toggle="modal" data-target="">
                        <i class="fa fa-trash-alt"></i>
                    </button>
                <?php } ?>
                <hr />
            <?php } ?>

            <div class="modal-footer">
                <a href="<?= base_url('gurukelasonline') ?>" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
            </div>
        </div>
    </div>
</div>

<!-- Function to Hapus Data -->
<?php foreach ($materi as $key => $value) { ?>
    <div class="modal fade " id="modalHapus<?= $value['id_kelasonline'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Materi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin Hapus Data Materi?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<? base_url('gurukelasonline/hapus/' . $materi['id_kelasonline']) ?>" class="btn btn-primary">Hapus</a>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>