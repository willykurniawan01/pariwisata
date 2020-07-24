<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
<style>
    .coordinates {
        background: rgba(0, 0, 0, 0.5);
        color: #fff;
        position: absolute;
        bottom: 40px;
        left: 10px;
        padding: 5px 10px;
        margin: 0;
        font-size: 11px;
        line-height: 18px;
        border-radius: 3px;
        display: none;
    }
</style>



<div class="container-fluid">
    <?php echo form_open_multipart(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="Nama Wisata">Nama Wisata</span>
                </div>
                <input type="text" class="form-control" name="nama_wisata">
            </div>
            <small id="error" class="form-text text-danger"><?= form_error('nama_wisata') ?></small>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="Alamat">Alamat</span>
                </div>
                <input type="text" class="form-control" name="alamat">
            </div>
            <small id="error" class="form-text text-danger"><?= form_error('alamat') ?></small>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <label for="editor">Deskripsi</label>
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
            <button class="btn btn-primary mt-3 btn-lg" type="submit">Upload Wisata</button>
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