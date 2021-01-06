<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Basic Card Example -->
    <div class="row mt-4">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="card shadow mb-4">
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
                        </div>
                        <?= session()->remove('validationguruerror'); ?>
                    <?php
                    endif;
                    ?>
                    <?php
                    if (session()->get('message')) :
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Materi Berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
                        </div>
                    <?php
                    endif;
                    ?>

                    <?php echo form_open_multipart('gurukelasonline/tambahmaterikelas') ?>
                    <div class="form-group">
                        <label>Kelas Online</label>
                        <select name="id_kelasonline" class="form-control">
                            <option value="">--Pilih Kelas Online--</option>
                            <?php foreach ($gurukelasonline as $key => $value) { ?>
                                <option value="<?= $value['id_kelasonline'] ?>">
                                    <?= $value['nama_mapel'] ?> - <?= $value['kelas'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" id="judul" value="<?= old('judul') ?>" class="form-control" placeholder="Masukan Judul">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukan Deskripsi"><?php echo old('deskripsi') ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>File Materi</label>
                        <input type="file" name="file" id="preview_gambar" value="<?= old('file') ?>" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
</div>