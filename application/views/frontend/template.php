<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$subpage.' - '.$page?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!--favicon-->
	<!-- <link rel="icon" href="<?=base_url('')?>assets/images/favicon-32x32.png" type="image/png" /> -->
	<link rel="apple-touch-icon" sizes="57x57" href="<?=base_url('')?>assets/images/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?=base_url('')?>assets/images/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('')?>assets/images/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('')?>assets/images/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('')?>assets/images/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?=base_url('')?>assets/images/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?=base_url('')?>assets/images/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?=base_url('')?>assets/images/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('')?>assets/images/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url('')?>assets/images/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('')?>assets/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url('')?>assets/images/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('')?>assets/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?=base_url('')?>assets/images/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?=base_url('')?>assets/images/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url('')?>assets/frontend/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?=base_url('')?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url('')?>assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url('')?>assets/frontend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=base_url('')?>assets/frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?=base_url('')?>assets/frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- select2 -->
  <link href="<?=base_url('')?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
  <link href="<?=base_url('')?>assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
  <!-- dataTables -->
  <link href="<?=base_url('')?>assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="<?=base_url('')?>assets/frontend/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Eterna - v4.9.1
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:puskesmascilincing@gmail.com">kospinjasabenhil@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>(021) 5732550-5724889</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="https://puskesmascilincing.jakarta.go.id/contact_us#" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://puskesmascilincing.jakarta.go.id/contact_us#" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://puskesmascilincing.jakarta.go.id/contact_us#" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="https://puskesmascilincing.jakarta.go.id/contact_us#" target="_blank" class="google-plus"><i class="bx bxl-youtube"></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <!-- <h1><a href="index.html">BPBD KAB. TEGAL</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="<?=site_url('home')?>"><img src="<?=base_url('')?>assets/images/favicon/Logo-Kospin.png" alt="" class="img-fluid"> <b class="text-success"></b></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="<?=activate_menufe('index')?>" href="<?=site_url('home')?>">Home</a></li>
          <li><a class="<?=activate_menufe('ajukan_kredit')?>" href="<?=site_url('ajukan_kredit')?>">Ajukan Kredit</a></li>
          <li><a class="<?=activate_menufe('alur_permohonan')?>" href="<?=site_url('alur_permohonan')?>">Alur Permohonan</a></li>
          <li><a class="<?=activate_menufe('kontak')?>" href="<?=site_url('kontak')?>">Kontak</a></li>
          <li style="padding-left:30px"><a  class="badge bg-success text-white" href="<?=site_url('auth')?>" style="padding:5px">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <?php echo $contents; ?>

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Link Bermanfaat</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="<?=site_url('home')?>">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?=site_url('ajukan_kredit')?>">Ajukan Kredit</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?=site_url('alur_permohonan')?>">Alur Permohonan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?=site_url('kontak')?>">Kontak</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Pelayanan Lain</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Simpanan Hari Raya</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Tabungan Safari</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pinjaman UMK</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Tabungan Qurban</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Layanan Mobil Kas Keliling</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pinjaman Bulanan</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Hubungi kami</h4>
            <p>
              Jl.Penjernihan II No.10B,RT.11/RW.6,Bend.Hilir,
              Kec. Tanah Abang<br>
              Kota Jakarta Pusat, Indonesia <br><br>
              <strong>No HP:</strong> 021 2148 4019<br>
              <strong>Email:</strong> puskesmascilincing@gmail.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Tentang Website Permohonan Kredit Kospin Jasa Cabang Benhil</h3>
            <p>Kospin (Koperasi Simpan Pinjam) "JASA" merupakan koperasi yang dimiliki anggota,yang mana dibentuk oleh sekelompok pengusaha kecil dan menengah pada tahun 1970an.Tujuannya adalah menyediakan solusi dalam mengatasi kesulitan penguasaha kecil dan menengah dalam mendapatkan pinjaman sebagai modal usaha.Bergabunglah bersama kami dan temukan manfaat keanggotaan di Kospin JASA !</p>
            <div class="social-links mt-3">
              <a href="https://www.instagram.com/kospinjasa.benhil/" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.instagram.com/kospinjasa.benhil/" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/kospinjasa.benhil/" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="https://www.instagram.com/kospinjasa.benhil/" target="_blank" class="google-plus"><i class="bx bxl-youtube"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        <?=$subpage?> &copy; Copyright <strong><span>Eterna</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?=base_url('')?>assets/frontend/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?=base_url('')?>assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url('')?>assets/js/jquery.min.js"></script>
  <script src="<?=base_url('')?>assets/frontend/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?=base_url('')?>assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?=base_url('')?>assets/frontend/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?=base_url('')?>assets/frontend/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?=base_url('')?>assets/frontend/vendor/php-email-form/validate.js"></script>

  <!-- select2 -->
  <script src="<?=base_url('')?>assets/plugins/select2/js/select2.min.js"></script>
	<script>
		$('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
		$('.multiple-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
	</script>

  <!-- dataTables -->
  <script src="<?=base_url('')?>assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url('')?>assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>

  <!-- Template Main JS File -->
  <script src="<?=base_url('')?>assets/frontend/js/main.js"></script>

</body>

</html>
