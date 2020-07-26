<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>




<div class="container-fluid">
    <?php echo form_open_multipart(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="nama_seni">Nama Seni Budaya</span>
                </div>
                <input type="text" class="form-control" name="nama_seni">
            </div>
            <small id="error" class="form-text text-danger"><?= form_error('nama_seni') ?></small>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <textarea name="deskripsi" id="editor">
                </textarea>
            <small id="error" class="form-text text-danger"><?= form_error('deskripsi') ?></small>
        </div>
    </div>
    <div class="row mt-5 justify-content-between">
        <div class="col-md-5 border">
            <div class="form-group">
                <label for="gambar berita">Upload gambar</label>
                <input type="file" class="form-control-file" name="gambar">
                <small id="error" class="form-text text-danger"><?= $error ?></small>
            </div>
        </div>
        <div class="col-md-3 text-right">
            <button class="btn btn-primary mt-3 btn-lg" type="submit">Upload Berita</button>
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