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
                    echo form_open_multipart('mapel/editmapel/' . $mapel['id_mapel']) ?>

                    <div class="form-group">
                        <label>Nama Mata Pelajaran</label>
                        <input type="text" name="nama_mapel" id="nama_mapel" value="<?= (old('nama_mapel')) ? old('nama_mapel') : $mapel['nama_mapel'] ?>" class="form-control" placeh$guruer="Masukan Mata Pelajaran">
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('mapel') ?>" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>