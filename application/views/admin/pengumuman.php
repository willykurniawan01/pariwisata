<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>

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
                    <button type="button" data-toggle="modal" data-target="#pengumuman" class="btn btn-primary mb-3">Tambah <?= $judul ?></button>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="8%">No</th>
                                    <th width="40%">Judul</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($pengumuman as $a) :
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td>
                                            <?= $a['judul'] ?>
                                        </td>
                                        <td class="align-middle">
                                            <a href="<?= base_url('admin/deletepengumuman/') . $a['id_pengumuman'] ?>" class="btn btn-sm btn-danger">
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

<!-- MODAL PENGUMUMAN -->
<div class="modal fade" id="pengumuman" tabindex="-1" role="dialog" aria-labelledby="pengumumanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('admin/pengumuman') ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pengumumanLabel">Tambah pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                        <small id="error" class="form-text text-danger"><?= form_error('judul') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="pengumuman">Pengumuman</label>
                        <textarea name="isi" id="editor">
                </textarea>
                        <small id="error" class="form-text text-danger"><?= form_error('isi') ?></small>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>

                </div>
        </form>
    </div>
</div>
</div>


<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>