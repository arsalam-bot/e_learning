<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Data Siswa</h6>
        </div>
        <?php
        if (session()->get('message')) :
        ?>


            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Data Siswa Berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
            </div>

        <?php
        endif;
        ?>
        <div class="card-body">
            <a href="<?= base_url('siswa/tambah') ?>" class="btn btn-success mb-4">
                <i class="fa fa-plus"></i><span class="text"> Tambah Data</span>
            </a>
            <div class="table-responsive ">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Siswa</th>
                            <th>NISN</th>
                            <th>Nama Lengkap Siswa</th>
                            <th>Tempat Tanggal Tahun Lahir Siswa</th>
                            <th>Username Siswa</th>
                            <th>Password Siswa</th>
                            <th>Foto Siswa</th>
                            <th class="text-center">Level</th>
                            <th width="200px" class="text-center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($siswa as $key => $value) { ?>
                            <tr>
                                <td><?= $value['id_siswa'] ?></td>
                                <td><?= $value['nisn'] ?></td>
                                <td><?= $value['nama_siswa'] ?></td>
                                <td><?= $value['tttl'] ?></td>
                                <td><?= $value['username'] ?></td>
                                <td><?= $value['password'] ?></td>
                                <td class="text-center"><img src="<?= base_url('foto siswa/' . $value['foto']) ?>" class="img-profile rounded-circle" width="70px" height="70px"></td>
                                <td class="text-center"><?= $value['level'] ?></td>
                                <td>

                                    <a href="<?= base_url('siswa/edit/' . $value['id_siswa']) ?>" class="btn btn-circle btn-sm btn-warning" type="button">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <button class="btn btn-circle btn-sm btn-danger" type="button" data-toggle="modal" data-target="#modalHapus<?= $value['id_siswa'] ?>">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>

                                    <button class="btn btn-info btn-icon-split" type="button">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Lihat Detail</span>
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
<?php foreach ($siswa as $key => $value) { ?>
    <div class="modal fade " id="modalHapus<?= $value['id_siswa'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hapus Data <b><?= $value['nama_siswa'] ?></b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('siswa/hapus/' . $value['id_siswa']) ?>" class="btn btn-primary">Hapus</a>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>