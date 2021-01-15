<!-- Begin Page Content -->
<div class="container-fluid"> 
    <!-- Basic Card Example -->
    <div class="row mt-4">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Kumpul <?= $judul; ?></h6>
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
                            Jawaban Tugas Berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
                        </div>
                    <?php
                    endif;
                    ?>

                    <?php echo form_open_multipart('siswakelasonline/tambahjawabantugas/') ?>
                    <div class="form-group">
                        <label>File Jawaban</label>
                        <input type="file" name="file" id="preview_gambar" value="<?= old('file') ?>" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kumpul</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
</div>