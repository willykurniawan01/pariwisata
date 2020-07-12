<div class="container-fluid">

    <!-- Page Heading -->


    <?= $this->session->flashdata('message'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3 bg-primary">
            <h1 class="h3 text-light"><?= $judul ?></h1>
        </div>
        <div class="card-body">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#menu">Tambah Slider</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Gambar Slider</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Gambar Slider</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        foreach ($slider as $s) :
                        ?>
                            <tr>
                                <td>
                                    <img style="width: 400px; height:300px;" class="img-fluid img-thumbnail" src="<?= base_url('assets/admin/img/sliders/') . $s['gambar'] ?>" alt="<?= $s['judul'] ?>" style="overflow: hidden; height: 240px;">
                                </td>
                                <td class="align-middle">
                                    <a href="<?= base_url('admin/editslider/') . $s['id_slider'] ?>" class="btn ml-2 btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Edit Slider</span>
                                    </a>
                                    <a href="<?= base_url('admin/deleteslider/') . $s['id_slider'] ?>" class="btn ml-2 btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Delete Slider</span>
                                    </a>
                                </td>

                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- MODAL -->

<div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="menuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="menuLabel">Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart(); ?>
                <div class="form-group">
                    <label>Upload Gambar</label>
                    <input type="file" class="form-control-file" name="gambar">
                    <small id="error" class="form-text text-danger"><?= $error ?></small>
                </div>
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul">
                    <small id="error" class="form-text text-danger"><?= form_error('judul') ?></small>
                </div>
                <div class="form-group">
                    <label for="subjudul">Subjudul</label>
                    <input type="text" class="form-control" id="subjudul" name="subjudul">
                    <small id="error" class="form-text text-danger"><?= form_error('subjudul') ?></small>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>