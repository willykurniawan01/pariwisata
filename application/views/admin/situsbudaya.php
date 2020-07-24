<div class="container-fluid">

    <!-- Page Heading -->


    <?= $this->session->flashdata('message'); ?>

    <!-- DataTales Example -->
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow mb-4 mt-3">
                <div class="card-header bg-primary">
                    <h1 class="h3 text-light"><?= $judul ?></h1>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('admin/tambahsitusbudaya') ?>" class="btn btn-primary mb-3">Tambah <?= $judul ?></a>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="30%">Nama Situs</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($situsbudaya as $b) :
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td>
                                            <?= $b['nama_situs'] ?>
                                        </td>
                                        <td>
                                            <img style="width: 100px; height:100px;" src="<?= base_url('assets/home/assets/img/situsbudaya/') . $b['gambar'] ?>" alt="">
                                        </td>
                                        <td class="align-middle">
                                            <ul>
                                                <li class="nav-link"> <a href="<?= base_url('admin/editsitusbudaya/') . $b['id_situs'] ?>" class="btn btn-sm btn-warning">
                                                        <span class="text">Edit</span>
                                                    </a>
                                                    <a href="<?= base_url('admin/deletesitusbudaya/') . $b['id_situs'] ?>" class="btn btn-sm btn-danger">
                                                        <span class="text">Delete</span>
                                                    </a>
                                                </li>
                                            </ul>

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
                <?php echo form_open_multipart('admin/inputkategoriwisata'); ?>
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