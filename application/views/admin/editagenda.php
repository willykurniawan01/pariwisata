<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>




<div class="container-fluid">
    <?php echo form_open_multipart(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="Nama Agenda">Nama Agenda</span>
                </div>
                <input type="text" class="form-control" value="<?= $agenda['nama_agenda'] ?>" name="nama_agenda">
            </div>
            <small id="error" class="form-text text-danger"><?= form_error('nama_agenda') ?></small>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="tanggal_agenda">Tanggal Agenda</span>
                </div>
                <input type="date" value="<?= $agenda['tanggal_agenda'] ?>" class="form-control" name="tanggal_agenda">
            </div>
            <small id="error" class="form-text text-danger"><?= form_error('tanggal_agenda') ?></small>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <label for="editor">Isi Agenda</label>
            <textarea name="isi_agenda" id="editor">
                <?= $agenda['isi_agenda'] ?>
                </textarea>
            <small id="error" class="form-text text-danger"><?= form_error('isi_agenda') ?></small>
        </div>
    </div>
    <div class="row mt-5 justify-content-end">
        <div class="col-md-3 text-right">
            <button class="btn btn-primary mt-3 btn-lg" type="submit">Upload Agenda</button>
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