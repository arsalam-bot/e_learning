<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTables Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Data Siswa</h6>
        </div>
        <div class="card-body">
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