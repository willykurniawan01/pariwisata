<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>




<div class="container-fluid">
    <?php echo form_open_multipart(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="nama_Seni">Nama Seni Budaya</span>
                </div>
                <input type="text" class="form-control" name="nama_seni" value="<?= $senibudaya['nama_seni'] ?>">
            </div>
            <small id="error" class="form-text text-danger"><?= form_error('nama_seni') ?></small>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <textarea name="deskripsi" id="editor">
                <?= $senibudaya['deskripsi'] ?>
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
                    <img class="img-fluid rounded" src="<?= base_url('assets/home/assets/img/senibudaya/') . $senibudaya['gambar'] ?>">
                    <a href="<?= base_url('admin/editsenibudaya/') . $senibudaya['id'] . "/1" ?>" class="btn btn-danger mt-3">Ubah Gambar</a>
                </div>
            <?php else : ?>
                <div class="form-group">
                    <label for="gambar senibudaya">Upload gambar</label>
                    <input type="file" class="form-control-file" name="gambar">
                    <small id="error" class="form-text text-danger"><?= $error ?></small>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-3 text-right">
            <button class="btn btn-primary mt-3 btn-lg" type="submit">Update Seni Budaya</button>
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