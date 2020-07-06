  <!-- bradcam_area  -->
  <div class="bradcam_area" style="background-image: url('');">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="bradcam_text text-center">
                      <h3>Single blog</h3>
                      <p>Pixel perfect design with awesome contents</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--/ bradcam_area  -->

  <!--================Blog Area =================-->
  <section class="blog_area single-post-area section-padding">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 posts-list">
                  <div class="single-post">
                      <div class="feature-img">
                          <img style="width: 700px; height:500px;" src="<?= base_url('assets/home/assets/img/wisata/') . $wisata['gambar'] ?>" alt="">
                      </div>
                      <div class="blog_details">
                          <h2><?= $wisata['nama_wisata'] ?>
                          </h2>
                          <ul class="blog-info-link mt-3 mb-4">
                              <li><a href="#"><i class="fa fa-user"></i><?php $this->db->where('id_kategori') ?></a></li>
                              <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                          </ul>
                          <p class="excert">
                              <?= $wisata['deskripsi'] ?>
                          </p>

                      </div>
                  </div>


                  <div class="comments-area">
                      <h4>05 Comments</h4>

                      <div id="result" class="comment-list">

                      </div>
                  </div>
                  <div class="comment-form">
                      <h4>Tinggalkan Komentar</h4>
                      <form class="form-contact comment_form" method="POST" id="commentForm">
                          <div class="row">
                              <div class="col-12">
                                  <div class="form-group">
                                      <textarea class="form-control w-100" name="komentar" id="komentar" cols="30" rows="9" placeholder="Silahkan Isi Komentar"></textarea>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <input class="form-control" name="nama" id="nama" type="text" placeholder="Nama">
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                  </div>
                              </div>

                          </div>
                          <div class="form-group">
                              <button id="tambahkomentar" type="button" class="button button-contactForm btn_1 boxed-btn">Kirim</button>
                          </div>
                      </form>
                  </div>
              </div>
              <div class="col-lg-4">
                  <div class="blog_right_sidebar">
                      <aside class="single_sidebar_widget search_widget">
                          <form action="#">
                              <div class="form-group">
                                  <div class="input-group mb-3">
                                      <input type="text" class="form-control" placeholder='Search Keyword' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                      <div class="input-group-append">
                                          <button class="btn" type="button"><i class="ti-search"></i></button>
                                      </div>
                                  </div>
                              </div>
                              <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
                          </form>
                      </aside>
                      <aside class="single_sidebar_widget post_category_widget">
                          <h4 class="widget_title">Category</h4>
                          <ul class="list cat-list">
                              <?php foreach ($kategori as $k) : ?>
                                  <li>
                                      <a href="#" class="d-flex">
                                          <p><?= $k['nama_kategori'] ?></p>
                                          <p>
                                              (<?php $this->db->where('id_kategori', $k['id_kategori']);
                                                $jumlah = $this->db->get('rel_kategori_wisata')->num_rows();
                                                echo $jumlah;
                                                ?>)
                                          </p>
                                      </a>
                                  </li>
                              <?php endforeach; ?>
                          </ul>
                      </aside>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--================ Blog Area end =================-->


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
      $(function() {
          tampilkomentar()
          //function
          function tampilkomentar() {
              $.ajax({
                  type: 'ajax',
                  url: '<?= base_url('wisata/tampilkomentar/') . $wisata['id_wisata'] ?>',
                  async: false,
                  dataType: 'json',
                  success: function(data) {
                      var html = '';
                      var i;
                      for (i = 0; i < data.length; i++) {
                          html += '<tr>' +
                              '<td>' + data[i].komentar + '</td>' +
                              '<td>' + data[i].waktu + '</td>' +
                              '<td>' + data[i].email + '</td>' +
                              '<td>' + data[i].nama + '</td>' +
                              '<td>' +
                              '</td>' +
                              '</tr>';
                      }
                      $('#result').html(html);
                  },
                  error: function() {
                      alert('Could not get Data from Database');
                  }
              });
          }

          $('#tambahkomentar').click(function() {
              var data = $('#commentForm').serialize();
              $.ajax({
                  type: 'ajax',
                  method: 'post',
                  url: '<?= base_url('wisata/tambahkomentar/') . $wisata['id_wisata'] ?>',
                  dataType: 'json',
                  async: 'false',
                  data: data,
                  success: function(response) {
                      if (response.success) {
                          $('#commentForm')[0].reset();
                          tampilkomentar();
                      }
                  }
              });
          });

      });
  </script>