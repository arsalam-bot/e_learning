<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <a href="<?= base_url('kelasonline/tambah') ?>" class="btn btn-success mb-4 mt-4">
        <i class="fa fa-plus"></i><span class="text"> Tambah Data Kelas Online</span>
    </a>
    <?php
    if (session()->get('message')) :
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data Kelas Online Berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
        </div>
    <?php
    endif;
    ?>
    <div class="row">
        <?php foreach ($kelasonline as $key => $value) { ?>
            <div class="col-lg-3 my-2">
                <div class="card shadow mb-2">
                    <div class="card-body">
                        <img class="card-img-center img-fluid px-3 px-sm-4 mb-2" style="width: 25rem;" src="<?= base_url('foto kelas/' . $value['fotokelasonline']) ?>" id="gambar_load">
                        <h6 class="m-0 font-weight-bold text-dark"><?= $value['nama_mapel'] ?></h6>
                        <h6 class="m-0 font-weight-bold text-gray">Kelas <?= $value['kelas'] ?></h6>
                        <h6><?= $value['nip'] ?> - <?= $value['nama_guru'] ?></h6>
                        <hr />
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="" class="btn btn-info btn-icon-split" type="button">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-info-circle"></i>
                                    </span>
                                    <span class="text">Lihat Kelas</span>
                                </a>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-circle btn-sm btn-danger" type="button" data-toggle="modal" data-target="#modalHapus<?= $value['id_kelasonline'] ?>">
                                    <i class="fa fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Function to Hapus Data -->
<?php foreach ($kelasonline as $key => $value) { ?>
    <div class="modal fade " id="modalHapus<?= $value['id_kelasonline'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Kelas Online</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hapus Data <b><?= $value['id_kelasonline'] ?></b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('kelasonline/hapus/' . $value['id_kelasonline']) ?>" class="btn btn-primary">Hapus</a>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="e_learning/public/foto kelas/kelas 7 B.png" alt=""> -->