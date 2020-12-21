<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Data Mata Pelajaran</h6>
        </div>
        <?php
        if (session()->get('message')) :
        ?>


            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Data Mata Pelajaran Berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
            </div>

        <?php
        endif;
        ?>
        <div class="card-body">
            <a href="<?= base_url('mapel/tambah') ?>" class="btn btn-success mb-4">
                <i class="fa fa-plus"></i><span class="text"> Tambah Data</span>
            </a>

            <!-- <button class="btn btn-success mb-4" data-toggle="modal" data-target="#modalTambah">
                <i class="fa fa-plus"></i><span class="text"> Tambah Data</span>
            </button> -->
            <div class="table-responsive ">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Mata Pelajaran</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mapel as $key => $value) { ?>
                            <tr>
                                <td><?= $value['id_mapel'] ?></td>
                                <td><?= $value['nama_mapel'] ?></td>
                                <td>

                                    <a href="<?= base_url('mapel/edit/' . $value['id_mapel']) ?>" class="btn btn-circle btn-sm btn-warning" type="button">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <button class="btn btn-circle btn-sm btn-danger" type="button" data-toggle="modal" data-target="#modalHapus<?= $value['id_mapel'] ?>">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
<?php foreach ($mapel as $key => $value) { ?>
    <div class="modal fade " id="modalHapus<?= $value['id_mapel'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hapus Data <b><?= $value['nama_mapel'] ?></b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('mapel/hapus/' . $value['id_mapel']) ?>" class="btn btn-primary">Hapus</a>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>