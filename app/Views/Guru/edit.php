<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit <?= $judul; ?></h1>

    <!-- Basic Card Example -->
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-b$guru text-primary">Edit <?= $judul; ?></h6>
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
                    echo form_open_multipart('guru/editguru/' . $guru['id_guru']) ?>


                    <div class="form-group mb-8">
                        <label>NIP</label>
                        <input type="text" name="nip" id="nip" value="<?= (old('nip')) ? old('nip') : $guru['nip'] ?>" class="form-control" placeh$guruer="Masukan NIP">

                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap dan Gelar</label>
                        <input type="text" name="nama_guru" id="nama_guru" value="<?= (old('nama_guru')) ? old('nama_guru') : $guru['nama_guru'] ?>" class="form-control" placeh$guruer="Masukan Nama Guru dan Gelar">
                    </div>
                    <div class="form-group">
                        <label>Tempat Tanggal Tahun Lahir</label>
                        <input type="text" name="tttl" id="tttl" value="<?= (old('tttl')) ? old('tttl') : $guru['tttl'] ?>" class="form-control" placeholder="Contoh : Kirigakure, 21 Januari 2077">
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" value="<?= (old('jabatan')) ? old('jabatan') : $guru['jabatan'] ?>" class="form-control" placeholder="Masukan Jabatan">
                    </div>
                    <div class="form-group">
                        <label>Pangkat / Golongan</label>
                        <input type="text" name="pangkatgol" id="pangkatgol" value="<?= (old('pangkatgol')) ? old('pangkatgol') : $guru['pangkatgol'] ?>" class="form-control" placeholder="Contoh : Pembina Tkt. I, IV/b">
                    </div>
                    <div class="form-group">
                        <label>Username</label><br>
                        <output><b><?= $guru['username'] ?></b></output>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" id="password" value="<?= (old('password')) ? old('password') : $guru['password'] ?>" class="form-control" placeholder="Masukan Password">
                    </div>
                    <div class="form-group">
                        <label>Foto Guru</label>
                        <input type="file" name="foto" id="preview_gambar" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <img src="<?= base_url('foto guru/' . $guru['foto']); ?>" id="gambar_load" width="200px">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('guru') ?>" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>