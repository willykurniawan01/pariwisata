<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>




<div class="container-fluid">
    <?php echo form_open_multipart(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="Nama akomodasi">Nama Akomodasi</span>
                </div>
                <input type="text" class="form-control" name="nama_akomodasi" value="<?= $akomodasi['nama_akomodasi'] ?>">
            </div>
            <small id="error" class="form-text text-danger"><?= form_error('nama_akomodasi') ?></small>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="alamat">Alamat</span>
                </div>
                <input type="text" class="form-control" name="alamat" value="<?= $akomodasi['alamat'] ?>">
            </div>
            <small id="error" class="form-text text-danger"><?= form_error('alamat') ?></small>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <label for="editor">Deskripsi</label>
            <textarea name="deskripsi" id="editor">
                <?= $akomodasi['deskripsi'] ?>
                </textarea>
            <small id="error" class="form-text text-danger"><?= form_error('deskripsi') ?></small>
        </div>
    </div>
    <div class="row mt-5 justify-content-between">
        <div class="col-md-5 border">
            <?php
            if (!$ubahgambar) :
            ?>
                <div class="row justify-content-center">
                    <img class="img-fluid rounded" src="<?= base_url('assets/home/assets/img/akomodasi/') . $akomodasi['gambar'] ?>">
                    <a href="<?= base_url('admin/editakomodasi/') . $akomodasi['id_akomodasi'] . "/1" ?>" class="btn btn-danger mt-3">Ubah Gambar</a>
                </div>
            <?php else : ?>
                <div class="form-group">
                    <label for="gambar akomodasi">Upload gambar</label>
                    <input type="file" class="form-control-file" name="gambar">
                    <small id="error" class="form-text text-danger"><?= $error ?></small>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-3 text-right">
            <button class="btn btn-primary mt-3 btn-lg" type="submit">Upload Akomodasi</button>
        </div>
    </div>
    </form>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>