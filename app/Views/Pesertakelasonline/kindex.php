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
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pesertakelasonline as $key => $value) { ?>
                            <tr>
                                <td><?= $value['pesertakelasonline'] ?></td>
                                <td><?= $value['nama_mapel'] ?> - <?= $value['kelas'] ?> - <?= $value['nama_guru'] ?></td>
                                <td><?= $value['nama_siswa'] ?></td>
                                <td>
                                    <button class="btn btn-circle btn-sm btn-danger" type="button" data-toggle="modal" data-target="#modalHapus<?= $value['pesertakelasonline'] ?>">
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
<?php foreach ($pesertakelasonline as $key => $value) { ?>
    <div class="modal fade " id="modalHapus<?= $value['pesertakelasonline'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Kelas Online</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hapus Data <b><?= $value['pesertakelasonline'] ?></b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('pesertakelasonline/hapus/' . $value['pesertakelasonline']) ?>" class="btn btn-primary">Hapus</a>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>