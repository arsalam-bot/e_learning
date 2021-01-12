<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- DataTables Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Data Admin</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username Admin</th>
                            <th>Password Admin</th>
                            <th>Nama Lengkap Admin</th>
                            <th>Foto Admin</th>
                            <th class="text-center">Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($admin as $key => $value) { ?>
                            <tr>
                                <td><?= $value['username'] ?></td>
                                <td><?= $value['password'] ?></td>
                                <td><?= $value['nama'] ?></td>
                                <td class="text-center"><img src="<?= base_url('foto/' . $value['foto']) ?>" class="img-profile rounded-circle" width="70px" height="70px"></td>
                                <td class="text-center"><?= $value['level'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>