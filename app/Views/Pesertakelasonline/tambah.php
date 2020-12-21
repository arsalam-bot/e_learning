<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah <?= $judul; ?></h1>

    <!-- Basic Card Example -->
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah <?= $judul; ?></h6>
                </div>
                <div class="card-body">

                    <?php
                    if (session()->get('validationguruerror')) :
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show p-0 pt-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong><?= session()->get('validationguruerror'); ?></strong>
                        </div>
                        <?= session()->remove('validationguruerror'); ?>

                    <?php
                    endif;
                    ?>


                    <?php
                    echo form_open_multipart('pesertakelasonline/tambahpesertakelasonline') ?>
                    <div class="form-group">
                        <label>Kelas Online</label>
                        <select name="id_kelasonline" class="form-control">
                            <option value="">--Tambah Kelas Online--</option>
                            <?php foreach ($kelasonline as $key => $value) { ?>
                                <option value="<?= $value['id_kelasonline'] ?>">Kelas Online - <?= $value['nama_mapel'] ?> - <?= $value['kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <select name="id_siswa" class="form-control">
                            <option value="">--Tambah Siswa--</option>
                            <?php foreach ($siswa as $key => $value) { ?>
                                <option value="<?= $value['id_siswa'] ?>"><?= $value['id_siswa'] ?> - <?= $value['nama_siswa'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('pesertakelasonline') ?>" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>