<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Basic Card Example -->
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
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
                    <?php endif; ?> <?php
                    echo form_open_multipart('admin/tambahadmin') ?>
                    <div class="form-group mb-8">
                        <label>Username</label>
                        <input type="text" name="username" id="username" value="<?= old('username') ?>" class="form-control" placeholder="Masukan Username">

                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" id="password" value="<?= old('password') ?>" class="form-control" placeholder="Masukan Password">
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" value="<?= old('nama') ?>" class="form-control" placeholder="Masukan Nama Lengkap">
                    </div>
                    <div class="form-group col-sm-2 mt-4">
                            <label>Level</label>
                            <select name="level" class="form-control">
                                <option value="">--pilih--</option>
                                <option id="level">Admin</option>
                                <option id="level">Kepsek</option>
                            </select>
                        </div>
                    <div class="form-group">
                        <label>Foto Admin</label>
                        <input type="file" name="foto" id="preview_gambar" value="<?= old('foto') ?>" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <img src="<?= base_url('foto/default.png'); ?>" id="gambar_load" value="<?= old('foto') ?>" width="200px">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('admin') ?>" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>