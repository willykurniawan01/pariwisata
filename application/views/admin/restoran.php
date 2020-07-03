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
                    <a href="<?= base_url('admin/tambahrestoran') ?>" class="btn btn-primary mb-3">Tambah <?= $judul ?></a>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="8%">No</th>
                                    <th width="40%">Nama Restoran</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($restoran as $b) :
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td>
                                            <?= $b['nama_restoran'] ?>
                                        </td>
                                        <td>
                                            <img style="width: 100px; height:100px;" src="<?= base_url('assets/home/assets/img/restoran/') . $b['gambar'] ?>" alt="">
                                        </td>
                                        <td class="align-middle">
                                            <a href="<?= base_url('admin/editrestoran/') . $b['id_restoran'] ?>" class="btn btn-sm btn-warning">
                                                <span class="text">Edit</span>
                                            </a>
                                            <a href="<?= base_url('admin/deleterestoran/') . $b['id_restoran'] ?>" class="btn btn-sm btn-danger">
                                                <span class="text">Delete</span>
                                            </a>
                                            <a href="<?= base_url('admin/kategorirestoran/') . $b['id_restoran'] ?>" class="btn btn-sm btn-info">
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





    </div>

</div>