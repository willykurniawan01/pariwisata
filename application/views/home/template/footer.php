<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4 ">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="img/footer_logo.png" alt="">
                            </a>
                        </div>
                        <p>5th flora, 700/D kings road, green <br> lane New York-1782 <br>
                            <a href="#">+10 367 826 2567</a> <br>
                            <a href="#">contact@carpenter.com</a>
                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-youtube-play"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Menu
                        </h3>
                        <ul class="links">
                            <li><a href="<?= base_url('wisata') ?>">Wisata</a></li>
                            <li><a href="<?= base_url('akomodasi') ?>">Akomodasi</a></li>
                            <li><a href="<?= base_url('restoran') ?>"> Restoran</a></li>
                            <li><a href="<?= base_url('galeri') ?>"> Galeri</a></li>
                            <li><a href="<?= base_url('kontak') ?>"> Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Wisata Unggulan
                        </h3>
                        <ul class="links double_links">
                            <?php
                            $this->db->where('unggulan', '1');
                            $unggulan = $this->db->get('wisata')->result_array();
                            foreach ($unggulan as $p) :
                            ?>
                                <li><a href="<?= base_url('wisata/detail/') . $p['id_wisata'] ?>"><?= $p['nama_wisata'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved </a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Modal -->
<div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="serch_form">
                <input type="text" placeholder="Search">
                <button type="submit">search</button>
            </div>
        </div>
    </div>
</div>
<!-- link that opens popup -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>

<script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
<!-- JS here -->
<script src="<?= base_url('assets/home/assets/') ?>js/vendor/modernizr-3.5.0.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/popper.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/isotope.pkgd.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/ajax-form.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/waypoints.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/jquery.counterup.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/imagesloaded.pkgd.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/scrollIt.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/jquery.scrollUp.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/wow.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/nice-select.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/jquery.slicknav.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/plugins.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/gijgo.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/slick.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>vendor/venobox/venobox.min.js"></script>



<!--contact js-->
<script src="<?= base_url('assets/home/assets/') ?>js/contact.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/jquery.ajaxchimp.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/jquery.form.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/home/assets/') ?>js/mail-script.js"></script>


<script src="<?= base_url('assets/home/assets/') ?>js/main.js"></script>
<script>
    $('#datepicker').datepicker({
        iconsLibrary: 'fontawesome',
        icons: {
            rightIcon: '<span class="fa fa-caret-down"></span>'
        }
    });
</script>
</body>

</html>