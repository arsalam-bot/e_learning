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
                            Presensi Berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
                        </div>
                    <?php
                    endif;
                    ?>

                    <?php echo form_open_multipart('siswakelasonline/tambahpresensi/') ?>
                    <!-- <div class="form-group">
                        <input type="checkbox" name="keterangan" alt="Checkbox" value="Hadir"> Hadir
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" value="?=  old('keterangan')  ?>" class="form-control">
                    </div> -->
                    <!-- <div class="form-group">
                        <label>Presensi</label>
                        <select name="keterangan" class="form-control">
                            <option value="">--Pilih--</option>
                            <option id="keterangan" class="text-dark">Hadir</option>
                        </select>
                    </div> -->
                    <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d H:i:s"); ?>">
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