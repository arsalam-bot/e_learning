<!-- Begin Page Content -->
<div class="container-fluid">
 
    <!-- DataTables Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Data Guru</h6>
        </div>
        <?php
        if (session()->get('message')) :
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Data Guru Berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
            </div>
        <?php
        endif;
        ?>
        <div class="card-body">
            <a href="<?= base_url('guru/tambah') ?>" class="btn btn-success mb-4">
                <i class="fa fa-plus"></i><span class="text"> Tambah Data</span>
            </a>
            <div class="table-responsive ">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <!-- <th>Kode Guru</th> -->
                            <th>NIP</th>
                            <th>Nama Lengkap Guru</th>
                            <th>Tempat Tanggal Tahun Lahir</th>
                            <th>Jabatan</th>
                            <th>Pangkat / Golongan</th>
                            <th>Foto Guru</th>
                            <th>username</th>
                            <!-- <th>Password</th> -->
                            <th>Level</th>
                            <th width="100px" class="text-center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($guru as $key => $value) { ?>
                            <tr>
                                <!-- <td><?= $value['id_guru'] ?></td> -->
                                <td><?= $value['nip'] ?></td>
                                <td><?= $value['nama_guru'] ?></td>
                                <td><?= $value['tttl'] ?></td>
                                <td><?= $value['jabatan'] ?></td>
                                <td><?= $value['pangkatgol'] ?></td>
                                <td class="text-center"><img src="<?= base_url('foto guru/' . $value['foto']) ?>" class="img-profile rounded-circle" width="70px" height="70px"></td>
                                <td><?= $value['username'] ?></td>
                                <!-- <td><?= $value['password'] ?></td> -->
                                <td><?= $value['level'] ?></td>
                                <td>

                                    <a href="<?= base_url('guru/edit/' . $value['id_guru']) ?>" class="btn btn-circle btn-sm btn-warning" type="button">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <button class="btn btn-circle btn-sm btn-danger" type="button" data-toggle="modal" data-target="#modalHapus<?= $value['id_guru'] ?>">
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
<?php foreach ($guru as $key => $value) { ?>
    <div class="modal fade " id="modalHapus<?= $value['id_guru'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hapus Data <b><?= $value['nama_guru'] ?></b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('guru/hapus/' . $value['id_guru']) ?>" class="btn btn-primary">Hapus</a>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>