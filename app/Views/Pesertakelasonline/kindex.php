<!-- Begin Page Content -->
<div class="container-fluid">
 
    <!-- DataTables Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Data Peserta Kelas Online</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Kelas Online</th>
                            <th>Nama Siswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pesertakelasonline as $key => $value) { ?>
                            <tr>
                                <td><?= $value['pesertakelasonline'] ?></td>
                                <td><?= $value['nama_mapel'] ?> - <?= $value['kelas'] ?> - <?= $value['nama_guru'] ?></td>
                                <td><?= $value['nama_siswa'] ?></td>
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