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
                                    <th>Nama Tamu</th>
                                    <th>Email</th>
                                    <th>Pesan</th>
                                    <th>Waktu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($buku_tamu as $a) :
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
                                            <?= $a['pesan'] ?>
                                        </td>
                                        <td>
                                            <?= $a['date'] ?>
                                        </td>
                                        <td class="align-middle">
                                            <a href="<?= base_url('admin/deletebukutamu/') . $a['id_bukutamu'] ?>" class="btn btn-sm btn-danger">
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