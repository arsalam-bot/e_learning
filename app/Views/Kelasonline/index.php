<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTables Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Data Kelas Online</h6>
        </div>
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
        <div class="card-body">
            <a href="<?= base_url('kelasonline/tambah') ?>" class="btn btn-success mb-4">
                <i class="fa fa-plus"></i><span class="text"> Tambah Data Kelas Online</span>
            </a>
            <div class="table-responsive ">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Guru</th>
                            <th>Mata Pelajaran</th>
                            <th>Foto Kelas</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kelasonline as $key => $value) { ?>
                            <tr>
                                <td><?= $value['id_kelasonline'] ?></td>
                                <td><?= $value['nip'] ?> - <?= $value['nama_guru'] ?></td>
                                <td><?= $value['nama_mapel'] ?> - <?= $value['kelas'] ?></td>
                                <td class="text-center"><img src="<?= base_url('foto kelas/' . $value['fotokelasonline']) ?>" class="img-profile rounded-circle" width="70px" height="70px"></td>
                                <td>
                                    <button class="btn btn-circle btn-sm btn-danger" type="button" data-toggle="modal" data-target="#modalHapus<?= $value['id_kelasonline'] ?>">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>

                                    <a href="" class="btn btn-info btn-icon-split" type="button">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Lihat Kelas</span>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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