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
                                <input type="hidden" class="form-control" name="id_galeri" value="<?= $galeri['id_galeri'] ?>">
                                <label for="judul">judul</label>
                                <input type="text" class="form-control" name="judul" value="<?= $galeri['judul'] ?>">
                                <small class="form-text text-danger"><?= form_error('judul') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="subjudul">Subjudul</label>
                                <input type="text" class="form-control" name="subjudul" value="<?= $galeri['subjudul'] ?>">
                                <small class=" form-text text-danger"><?= form_error('subjudul') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control" name="kategori">
                                    <option>Pilih Kategori</option>
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k['id_kategori'] ?>" <?= ($galeri['kategori'] == $k['id_kategori']) ? 'selected' : '' ?>><?= $k['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small id="error" class="form-text text-danger"><?= form_error('kategori') ?></small>
                            </div>

                        </div>
                        <div class="col-md-4 px-5">
                            <div class="row justify-content-center">
                                <?php
                                if (!$foto) :
                                ?>
                                    <img class="img-fluid rounded" src="<?= base_url('/assets/home/assets/img/galeri/') . $galeri['gambar'] ?>" style="height: 240px;">
                                    <a href="<?= base_url('admin/editgaleri/') . $galeri['id_galeri'] . '/1' ?>" class="btn btn-danger mt-3">Ubah Gambar</a>
                                <?php else : ?>
                                    <div class="form-group">
                                        <label>Upload gambar</label>
                                        <input type="file" class="form-control-file" name="gambar">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary float-left">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->