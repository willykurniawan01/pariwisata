<div class="container-fluid">

    <!-- Page Heading -->


    <?= $this->session->flashdata('message'); ?>

    <!-- DataTales Example -->
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card shadow mb-4 mt-3">
                <div class="card-header bg-primary">
                    <h1 class="h3 text-light"><?= $judul ?></h1>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('admin/tambahwisata') ?>" class="btn btn-primary mb-3">Tambah <?= $judul ?></a>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="30%">Nama Wisata</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($wisata as $b) :
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td>
                                            <?= $b['nama_wisata'] ?>
                                        </td>
                                        <td>
                                            <img style="width: 100px; height:100px;" src="<?= base_url('assets/home/assets/img/wisata/') . $b['gambar'] ?>" alt="">
                                        </td>
                                        <td class="align-middle">

                                            <ul>
                                                <li class="nav-link"> <a href="<?= base_url('admin/editwisata/') . $b['id_wisata'] ?>" class="btn btn-sm btn-warning">
                                                        <span class="text">Edit</span>
                                                    </a>
                                                    <a href="<?= base_url('admin/deletewisata/') . $b['id_wisata'] ?>" class="btn btn-sm btn-danger">
                                                        <span class="text">Delete</span>
                                                    </a></li>

                                                <li class="nav-link"> <a href="<?= base_url('admin/tambahwisataunggulan/') . $b['id_wisata'] ?>" class="btn btn-sm btn-success">
                                                        <span class="text">Tambah ke Unggulan</span>
                                                    </a>
                                                    <a href="<?= base_url('admin/kategoriwisata/') . $b['id_wisata'] ?>" class="btn btn-sm btn-info">
                                                        <span class="text">Tambah Kategori</span>
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
                                            <a href="<?= base_url('admin/deletekategoriwisata/') . $k['id_kategori'] ?>" class="badge badge-danger">
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


            <div class="card shadow mb-4 mt-3">
                <!-- <div class="card-header bg-primary">
                    <h1 class="h3 text-light"><?= $judul ?></h1>
                </div> -->
                <div class="card-body">
                    <div class="table-responsive">
                        <h6 class="h5">List Wisata Unggulan</h6>
                        <table class="table table-bordered table-sm" id="dataTables">
                            <thead>
                                <tr>
                                    <th width="80%">Nama Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($unggulan as $k) :
                                ?>
                                    <tr>
                                        <td>
                                            <?= $k['nama_wisata'] ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/deletewisataunggulan/') . $k['id_wisata'] ?>" class="badge badge-danger">
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
                <?php echo form_open_multipart('admin/tambahkategori'); ?>
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