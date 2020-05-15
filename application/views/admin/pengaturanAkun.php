<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul ?></h1>
    </div>

    <!-- Content Row -->

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4 border-left-primary">
                <!-- <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
                </div> -->
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="hidden" class="form-control" name="id" value="<?= $admin['id'] ?>">
                                    <input type="text" class="form-control" name="username" value="<?= $admin['username'] ?>">
                                    <small class="form-text text-danger">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ubah Password</label>
                                    <input type="password" class="form-control" name="password1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="password2">
                                </div>
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <div class="row justify-content-center">
                                <img class="img-fluid rounded-circle" src="<?= base_url('assets/admin/img/profil/') . $admin['foto'] ?>">
                                <a href="<?= base_url('admin/hapusfoto') ?>" class="btn btn-danger mt-3">Ubah Foto</a>
                                <!-- <form method="POST" action="<?= base_url('admin/uploadfoto') ?>">
                                    <div class="form-group">
                                        <label>Upload foto</label>
                                        <input type="file" class="form-control-file" name="foto">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Upload</button>
                                </form> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->