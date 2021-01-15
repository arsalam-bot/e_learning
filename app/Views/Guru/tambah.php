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

                    <?php
                    if (session()->get('validationguruerror')) :
                    ?>


                        <div class="alert alert-danger alert-dismissible fade show p-0 pt-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong><?= session()->get('validationguruerror'); ?></strong>
                            Silahkan kembali halaman sebelumnya untuk input data lagi.
                        </div>
                        <?= session()->remove('validationguruerror'); ?>

                    <?php
                    endif;
                    ?>


                    <?php
                    echo form_open_multipart('guru/tambahguru') ?>


                    <div class="form-group mb-8">
                        <label>NIP</label>
                        <input type="text" name="nip" id="nip" value="<?= old('nip') ?>" class="form-control" placeholder="Masukan NIP">

                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap dan Gelar Guru</label>
                        <input type="text" name="nama_guru" id="nama_guru" value="<?= old('nama_guru') ?>" class="form-control" placeholder="Contoh : Drs. Ismail Alex, MM">
                    </div>
                    <div class="form-group">
                        <label>Tempat Tanggal Tahun Lahir</label>
                        <input type="text" name="tttl" id="tttl" value="<?= old('tttl') ?>" class="form-control" placeholder="Contoh : Kirigakure, 21 Januari 2077">
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" value="<?= old('jabatan') ?>" class="form-control" placeholder="Masukan Jabatan">
                    </div>
                    <div class="form-group">
                        <label>Pangkat / Golongan</label>
                        <input type="text" name="pangkatgol" id="pangkatgol" value="<?= old('pangkatgol') ?>" class="form-control" placeholder="Contoh : Pembina Tkt. I, IV/b">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" id="username" value="<?= old('username') ?>" class="form-control" placeholder="Contoh : Pembina Tkt. I, IV/b">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" id="password" value="<?= old('password') ?>" class="form-control" placeholder="Contoh : Pembina Tkt. I, IV/b">
                    </div>
                    <div class="form-group">
                        <label>Foto Dosen</label>
                        <input type="file" name="foto" id="preview_gambar" value="<?= old('foto') ?>" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <img src="<?= base_url('foto guru/default.png'); ?>" id="gambar_load" value="<?= old('foto') ?>" width="200px">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('guru') ?>" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>