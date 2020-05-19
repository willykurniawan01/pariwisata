<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul ?></h1>
    </div>

    <!-- Content Row -->
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-md-10">
            <div class="card shadow mb-4 border-left-primary">
                <!-- <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
                </div> -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <?php echo form_open_multipart(); ?>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id_slider" value="<?= $slider['id_slider'] ?>">
                                <label for="judul">judul</label>
                                <input type="text" class="form-control" name="judul" value="<?= $slider['judul'] ?>">
                                <small class="form-text text-danger"><?= form_error('judul') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="subjudul">Subjudul</label>
                                <input type="text" class="form-control" name="subjudul" value="<?= $slider['subjudul'] ?>">
                                <small class=" form-text text-danger"><?= form_error('subjudul') ?></small>
                            </div>

                        </div>
                        <div class="col-md-4 px-5">
                            <div class="row justify-content-center">
                                <?php
                                if ($foto == 'gantigambar') :
                                ?>
                                    <div class="form-group">
                                        <label>Upload gambar</label>
                                        <input type="file" class="form-control-file" name="gambar">
                                        <input type="hidden" name="cek" value="1">
                                    </div>

                                <?php else : ?>
                                    <img class="img-fluid rounded" src="<?= base_url('assets/admin/img/sliders/') . $slider['gambar'] ?>">
                                    <a href="<?= base_url('admin/editslider/') . $slider['id_slider'] . '/gantigambar' ?>" class="btn btn-danger mt-3">Ubah Foto</a>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->