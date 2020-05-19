<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul ?></h1>
    </div> -->

    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-md-9">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#foto">Tambah foto</a>
            <div class="row">
                <?php foreach ($galeri as $g) : ?>
                    <div class="col-md-4 mt-3">
                        <div class="card">
                            <img src="<?= base_url('assets/home/assets/img/galeri/') . $g['gambar'] ?>" class="card-img-top" alt="<?= $g['judul'] ?>" style="overflow: hidden; height: 240px;">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= $g['judul'] ?></h5>
                                <p class="card-text mb-0"><?= $g['subjudul'] ?></p>
                                <a href="<?= base_url('admin/tambahkategorigambar/').$g['id_galeri'] ?>" class="btn btn-sm btn-info mt-2">Tambah Kategori</a>
                                <a href="" class="btn btn-sm btn-warning mt-2">Edit Gambar</a>
                                <a href="" class="btn btn-sm btn-danger mt-2">Delete Gambar</a>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow mb-4 mt-3">
                <!-- <div class="card-header bg-primary">
                    <h1 class="h3 text-light"><?= $judul ?></h1>
                </div> -->
                <div class="card-body">
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#kategori">Tambah Kategori</a>
                    <div class="table-responsive">
                        <h6 class="h5">List Kategori</h6>
                        <table class="table table-bordered table-sm" id="dataTables">
                            <thead>
                                <tr>
                                    <th width="80%">Nama Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($kategori as $k) :
                                ?>
                                    <tr>
                                        <td>
                                            <?= $k['nama_kategori'] ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/deletekategorigaleri/') . $k['id_kategori'] ?>" class="badge badge-danger">
                                                <span class="text">Delete</span>
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
    </div>

</div>

<!-- MODAL KATEGORI-->
<div class="modal fade" id="kategori" tabindex="-1" role="dialog" aria-labelledby="kategori" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategori">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin/tambahkategorigaleri'); ?>
                <div class="form-group">
                    <label for="nama kategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
                    <small id="error" class="form-text text-danger"><?= form_error('nama_kategori') ?></small>
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

<!-- MODAL GALERI -->
<div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-labelledby="fotoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fotoLabel">Tambah Foto</h5>
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