<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul ?></h1>
    </div>

    <!-- Content Row -->
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4 border-left-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kategori Berita</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" value="<?= $id_galeri ?>" name="id_galeri">
                        <?php
                        foreach ($kategori as $k) :
                            $check = $this->db->get_where('rel_kategori_galeri', ['id_galeri' => $id_galeri, 'id_kategori' => $k['id_kategori']])->row_array();
                        ?>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="kategori[]" value="<?= $k['id_kategori'] ?>" id="<?= 'kategori' . $k['id_kategori'] ?>" <?= ($check) ? 'checked' : '' ?>>
                                <label class="custom-control-label" for="<?= 'kategori' . $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></label>
                            </div>
                        <?php endforeach; ?>

                        <input name="submit" value="Submit" type="submit" class="btn btn-primary mt-3"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->