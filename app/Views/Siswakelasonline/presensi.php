<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Basic Card Example -->
    <div class="row mt-4">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Presensi <?= $judul; ?></h6>
                </div>
                <div class="card-body">
                    <?php if (session()->get('message')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Presensi Berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
                        </div>
                    <?php endif; ?>

                    <?php echo form_open_multipart('siswakelasonline/tambahpresensi/') ?>
                    <div class="form-group">
                        <label>Tekan Tombol "Presensi" Untuk Presensi</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <php if ($s['status'] == 'klik') : ?>
                    <php elseif ($s['status'] != 'klik') : ?> -->
                    <button type="submit" class="btn btn-primary" id="tekan" onclick="this.disabled=true;document.getElementById('tekan').disabled=false;">Presensi</button>
                    <!-- <php endif; ?> -->
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
</div>