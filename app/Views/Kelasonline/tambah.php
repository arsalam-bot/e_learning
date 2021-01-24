<!-- Begin Page Content -->
<div class="container-fluid"> 
    <!-- Basic Card Example -->
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="card shadow mb-4 mt-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Tambah <?= $judul; ?></h6>
                </div>
                <div class="card-body">
                    <?php if (session()->get('validationguruerror')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show p-0 pt-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong><?= session()->get('validationguruerror'); ?></strong>
                        </div>
                        <?= session()->remove('validationguruerror'); ?>
                    <?php endif; ?>

                    <?php
                    echo form_open_multipart('kelasonline/tambahkelasonline') ?>
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <select name="id_guru" class="form-control">
                            <option value="">--Tambah Guru--</option>
                            <?php foreach ($guru as $key => $value) { ?>
                                <!-- <option value="<?= $value['id_guru'] ?>"><?= $value['id_guru'] ?> - <?= $value['nip'] ?> - <?= $value['nama_guru'] ?></option> -->
                                <option value="<?= $value['id_guru'] ?>"><?= $value['nip'] ?> - <?= $value['nama_guru'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Mata Pelajaran</label>
                        <select name="id_mapel" class="form-control">
                            <option value="">--Tambah Mata Pelajaran--</option>
                            <?php foreach ($mapel as $key => $value) { ?>
                                <option value="<?= $value['id_mapel'] ?>"><?= $value['id_mapel'] ?> - <?= $value['nama_mapel'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_kelas" class="form-control">
                            <option value="">--Tambah Kelas--</option>
                            <?php foreach ($kelas as $key => $value) { ?>
                                <option value="<?= $value['id_kelas'] ?>"><?= $value['id_kelas'] ?> - <?= $value['kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto Kelas Online</label>
                        <input type="file" name="fotokelasonline" id="preview_gambar" value="<?= old('fotokelasonline') ?>" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <a href="<?= base_url('kelasonline') ?>" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>