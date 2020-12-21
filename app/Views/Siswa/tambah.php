<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah <?= $judul; ?></h1>

    <!-- Basic Card Example -->
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
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
                    echo form_open_multipart('siswa/tambahsiswa') ?>

                    <div class="form-group mb-8">
                        <label>NISN</label>
                        <input type="text" name="nisn" id="nisn" value="<?= old('nisn') ?>" class="form-control" placeholder="Masukan NISN">

                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap Siswa</label>
                        <input type="text" name="nama_siswa" id="nama_siswa" value="<?= old('nama_siswa') ?>" class="form-control" placeholder="Masukan Nama Lengkap Siswa">
                    </div>
                    <div class="form-group">
                        <label>Tempat Tanggal Tahun Lahir</label>
                        <input type="text" name="tttl" id="tttl" value="<?= old('tttl') ?>" class="form-control" placeholder="Contoh : Kirigakure, 21 Januari 2077">
                    </div>
                    <div class="form-group mb-8">
                        <label>Username</label>
                        <input type="text" name="username" id="username" value="<?= old('username') ?>" class="form-control" placeholder="Masukan Username">

                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" id="password" value="<?= old('password') ?>" class="form-control" placeholder="Masukan Password">
                    </div>
                    <div class="form-group">
                        <label>Foto Siswa</label>
                        <input type="file" name="foto" id="preview_gambar" value="<?= old('foto') ?>" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <img src="<?= base_url('foto/default.png'); ?>" id="gambar_load" value="<?= old('foto') ?>" width="200px">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('siswa') ?>" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>