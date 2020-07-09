<div class="container-fluid">

    <!-- Page Heading -->


    <?= $this->session->flashdata('message'); ?>

    <!-- DataTales Example -->
    <div class="row justify-content-between">
        <div class="col-md-9">
            <div class="card shadow mb-4 mt-3">
                <div class="card-header bg-primary">
                    <h1 class="h3 text-light"><?= $judul ?></h1>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('admin/tambahberita') ?>" class="btn btn-primary mb-3">Tambah Berita</a>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="8%">No</th>
                                    <th width="59%">Judul Berita</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($berita as $b) :
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td>
                                            <?= $b['judul'] ?>
                                        </td>
                                        <td class="align-middle">
                                            <a href="<?= base_url('admin/editberita/') . $b['id_berita'] ?>" class="btn btn-sm btn-warning">
                                                <span class="text">Edit</span>
                                            </a>
                                            <a href="<?= base_url('admin/deleteberita/') . $b['id_berita'] ?>" class="btn btn-sm btn-danger">
                                                <span class="text">Delete</span>
                                            </a>
                                            <a href="<?= base_url('admin/kategoriberita/') . $b['id_berita'] ?>" class="btn btn-sm btn-info">
                                                <span class="text">Tambah Kategori</span>
                                            </a>

                                        </td>

                                    </tr>
                                <?php $i++;
                                endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
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
                                            <a href="<?= base_url('admin/deletekategoriberita/') . $k['id_kategori'] ?>" class="badge badge-danger">
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

<!-- MODAL -->

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
                <?php echo form_open_multipart('admin/inputkategoriberita'); ?>
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