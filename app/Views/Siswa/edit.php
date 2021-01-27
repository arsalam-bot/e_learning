<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Basic Card Example -->
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card shadow mb-4 mt-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Edit <?= $judul; ?></h6>
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

                    <?php echo form_open_multipart('siswa/editsiswa/' . $siswa['id_siswa']) ?>
                    <div class="form-group mb-8">
                        <label>NISN</label>
                        <input type="text" name="nisn" id="nisn" value="<?= (old('nisn')) ? old('nisn') : $siswa['nisn'] ?>" class="form-control" placeh$guruer="Masukan NISN">
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_siswa" id="nama_siswa" value="<?= (old('nama_siswa')) ? old('nama_siswa') : $siswa['nama_siswa'] ?>" class="form-control" placeh$guruer="Masukan Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label>Tempat Tanggal Tahun Lahir</label>
                        <input type="text" name="tttl" id="tttl" value="<?= (old('tttl')) ? old('tttl') : $siswa['tttl'] ?>" class="form-control" placeholder="Contoh : Kirigakure, 21 Januari 2077">
                    </div>
                    <div class="form-group">
                        <label>Username</label><br>
                        <output><b><?= $siswa['username'] ?></b></output>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" id="password" value="<?= (old('password')) ? old('password') : $siswa['password'] ?>" class="form-control" placeholder="Masukan Password">
                    </div>
                    <div class="form-group">
                        <label>Foto Siswa</label>
                        <input type="file" name="foto" id="preview_gambar" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <img src="<?= base_url('foto siswa/' . $siswa['foto']); ?>" id="gambar_load" width="200px">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('siswa') ?>" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>