<!-- Begin Page Content -->
<div class="container-fluid">
 
    <!-- DataTables Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Data Kelas Online</h6>
        </div>
        <div class="card-body">
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

                                    <a href="<?= base_url('gurukelasonline/akelas/' . $value['id_kelasonline']) ?>" class="btn btn-info btn-icon-split" type="button">
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