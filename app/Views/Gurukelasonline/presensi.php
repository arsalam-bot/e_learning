<!-- Begin Page Content -->
<div class="container-fluid">
 
    <!-- Basic Card Example -->
    <div class="row mt-4">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Daftar <?= $judul; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nisn</th>
                                    <th>Siswa</th>
                                    <th>Jam Presensi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($presensi as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value['nisn'] ?></td>
                                        <td><?= $value['nama_siswa'] ?></td>
                                        <td><?= $value['jam_absen'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>