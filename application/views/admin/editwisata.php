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
                <input type="text" class="form-control" name="nama_wisata" value="<?= $wisata['nama_wisata'] ?>">
            </div>
            <small id="error" class="form-text text-danger"><?= form_error('nama_wisata') ?></small>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="alamat">Alamat</span>
                </div>
                <input type="text" class="form-control" name="alamat" value="<?= $wisata['alamat'] ?>">
            </div>
            <small id="error" class="form-text text-danger"><?= form_error('alamat') ?></small>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <label for="editor">Deskripsi</label>
            <textarea name="deskripsi" id="editor">
                <?= $wisata['deskripsi'] ?>
                </textarea>
            <small id="error" class="form-text text-danger"><?= form_error('deskripsi') ?></small>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                Silahkan Geser Mark Pada Map Untuk Mendapatkan Koordinat!
            </div>
            <label for="garis_bujur">Garis Bujur</label>
            <input type="text" id="garis_bujur" value=" <?= $wisata['garis_bujur'] ?>" class="form-control" name="garis_bujur">
            <small id="error" class="form-text text-danger"><?= form_error('garis_bujur') ?></small>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <label for="garis_lintang">Garis Lintang</label>
            <input type="text" id="garis_lintang" value=" <?= $wisata['garis_lintang'] ?>" class="form-control" name="garis_lintang">
            <small id="error" class="form-text text-danger"><?= form_error('garis_lintang') ?></small>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div id='map' style='width: 100%; height: 300px;'></div>
            <pre id="coordinates" class="coordinates"></pre>
        </div>
    </div>

    <div class="row mt-5 justify-content-between">
        <div class="col-md-5 border">
            <?php
            if (!$ubahgambar) :
            ?>
                <div class="row justify-content-center">
                    <img class="img-fluid rounded" src="<?= base_url('assets/home/assets/img/wisata/') . $wisata['gambar'] ?>">
                    <a href="<?= base_url('admin/editwisata/') . $wisata['id_wisata'] . "/1" ?>" class="btn btn-danger mt-3">Ubah Gambar</a>
                </div>
            <?php else : ?>
                <div class="form-group">
                    <label for="gambar wisata">Upload gambar</label>
                    <input type="file" class="form-control-file" name="gambar">
                    <small id="error" class="form-text text-danger"><?= $error ?></small>
                </div>
            <?php endif; ?>


        </div>
        <div class="col-md-3 text-right">
            <button class="btn btn-primary mt-3 btn-lg" type="submit">Update wisata</button>
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


<script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoid2lsbHlrdXJuaWF3YW4iLCJhIjoiY2tjODBqZ2d6MTZ1ZTJxbzYxZHFrbHE3ciJ9.-5zLbrYVwJTovz6MA7Pd7Q';
    var coordinates = document.getElementById('coordinates');
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [<?= $wisata['garis_bujur'] ?>, <?= $wisata['garis_lintang'] ?>],
        zoom: 11
    });

    var marker = new mapboxgl.Marker({
            draggable: true
        })
        .setLngLat([<?= $wisata['garis_bujur'] ?>, <?= $wisata['garis_lintang'] ?>])
        .addTo(map);


    function onDragEnd() {
        var lngLat = marker.getLngLat();
        coordinates.style.display = 'block';
        coordinates.innerHTML =
            'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
        $("#garis_bujur").val(lngLat.lng);
        $("#garis_lintang").val(lngLat.lat);
    }
    // Add zoom and rotation controls to the map.
    map.addControl(new mapboxgl.NavigationControl());
    marker.on('dragend', onDragEnd);
</script>