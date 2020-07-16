<!-- Begin Page Content -->
<div class="container-fluid">



    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-md-9">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#foto">Tambah View</a>
            <div class="row">
                <?php foreach ($view as $g) : ?>
                    <div class="col-md-4 mt-3">
                        <div class="card">
                            <img src="<?= base_url('assets/home/assets/img/view/') . $g['gambar'] ?>" class="card-img-top" alt="<?= $g['caption'] ?>" style="overflow: hidden; height: 240px;">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= $g['caption'] ?></h5>
                                <a href="<?= base_url('admin/deleteview/') . $g['id_view'] ?>" class="btn btn-sm btn-danger mt-2">Delete View</a>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>



<!-- MODAL view -->
<div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-labelledby="fotoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fotoLabel">Tambah View</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?= base_url('admin/view/') . $id_wisata ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Upload Gambar</label>
                        <input type="file" class="form-control-file" name="gambar">
                        <small id="error" class="form-text text-danger"><?= $error ?></small>
                    </div>
                    <div class="form-group">
                        <label for="caption">Caption</label>
                        <input type="text" class="form-control" id="caption" name="caption">
                        <small id="error" class="form-text text-danger"><?= form_error('caption') ?></small>
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