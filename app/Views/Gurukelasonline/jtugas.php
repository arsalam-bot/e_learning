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
                    <a href="<?= base_url('gurukelasonline') ?>" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                    <hr />
                    <div class="table-responsive ">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>File Jawaban</th>
                                    <th>Jam Kirim Tugas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jawabantugas as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value['nisn'] ?> <?= $value['nama_siswa'] ?></td>
                                        <td><a href="<?= base_url('gurukelasonline/viewjpdf/' . $value['id_jtugas']); ?>">
                                                <span><embed><?= $value['nama_file'] ?></embed></span>
                                        </td>
                                        <td><?= $value['jam_tugas'] ?></td>
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