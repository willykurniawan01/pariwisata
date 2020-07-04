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

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                Silahkan Geser Mark Pada Map Untuk Mendapatkan Koordinat!
            </div>
            <label for="garis_bujur">Garis Bujur</label>
            <input type="text" id="garis_bujur" class="form-control" name="garis_bujur">
            <small id="error" class="form-text text-danger"><?= form_error('garis_bujur') ?></small>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <label for="garis_lintang">Garis Lintang</label>
            <input type="text" id="garis_lintang" class="form-control" name="garis_lintang">
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

<script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoid2lsbHlrdXJuaWF3YW4iLCJhIjoiY2tjODBqZ2d6MTZ1ZTJxbzYxZHFrbHE3ciJ9.-5zLbrYVwJTovz6MA7Pd7Q';
    var coordinates = document.getElementById('coordinates');
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [101.01556741507335, 0.3395797198906365],
        zoom: 11
    });

    var marker = new mapboxgl.Marker({
            draggable: true
        })
        .setLngLat([101.01556741507335, 0.3395797198906365])
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