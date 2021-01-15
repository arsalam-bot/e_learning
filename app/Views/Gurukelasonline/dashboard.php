<!-- Begin Page Content -->
<div class="container-fluid"> 
    <div class="row mt-4">
        <?php foreach ($gurukelasonline as $key => $value) { ?>
            <div class="col-lg-3 my-2">
                <div class="card shadow mb-2">
                    <div class="card-body">
                        <img class="card-img-center img-fluid px-3 px-sm-4 mb-2" style="width: 25rem;" src="<?= base_url('foto kelas/' . $value['fotokelasonline']) ?>" id="gambar_load">
                        <h6 class="m-0 font-weight-bold text-dark"><?= $value['nama_mapel'] ?></h6>
                        <h6 class="m-0 font-weight-bold text-gray">Kelas <?= $value['kelas'] ?></h6>
                        <h6><?= $value['nip'] ?> - <?= $value['nama_guru'] ?></h6>
                        <hr />
                        <a href="<?= base_url('gurukelasonline/kelas/' . $value['id_kelasonline']) ?>" class="btn btn-info btn-icon-split" type="button">
                            <span class="icon text-white-50">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            <span class="text">Lihat Kelas</span>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>