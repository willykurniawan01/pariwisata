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
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="8%">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Komentar</th>
                                    <th>Waktu</th>
                                    <th>Poling</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($komentar as $a) :
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td>
                                            <?= $a['nama'] ?>
                                        </td>
                                        <td>
                                            <?= $a['email'] ?>
                                        </td>
                                        <td>
                                            <?= $a['komentar'] ?>
                                        </td>
                                        <td>
                                            <?= $a['waktu'] ?>
                                        </td>
                                        <td>
                                            <?= $a['rating'] ?>
                                        </td>
                                        <td class="align-middle">
                                            <a href="<?= base_url('admin/deletekomentar/') . $a['id_komentar'] ?>" class="btn btn-sm btn-danger">
                                                <span class="text">Delete</span>
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