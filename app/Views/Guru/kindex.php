<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTables Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Data Guru</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Guru</th>
                            <th>NIP</th>
                            <th>Nama Lengkap Guru</th>
                            <th>Tempat Tanggal Tahun Lahir</th>
                            <th>Jabatan</th>
                            <th>Pangkat / Golongan</th>
                            <th>Foto Guru</th>
                            <th>username</th>
                            <th>Password</th>
                            <th>Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($guru as $key => $value) { ?>
                            <tr>
                                <td><?= $value['id_guru'] ?></td>
                                <td><?= $value['nip'] ?></td>
                                <td><?= $value['nama_guru'] ?></td>
                                <td><?= $value['tttl'] ?></td>
                                <td><?= $value['jabatan'] ?></td>
                                <td><?= $value['pangkatgol'] ?></td>
                                <td class="text-center"><img src="<?= base_url('foto guru/' . $value['foto']) ?>" class="img-profile rounded-circle" width="70px" height="70px"></td>
                                <td><?= $value['username'] ?></td>
                                <td><?= $value['password'] ?></td>
                                <td><?= $value['level'] ?></td>
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