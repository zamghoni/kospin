<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <!--plugins-->
  <link rel="stylesheet" href="<?=base_url('')?>/assets/plugins/notifications/css/lobibox.min.css" />
  <link href="<?=base_url('')?>/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="<?=base_url('')?>/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="<?=base_url('')?>/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- loader-->
  <link href="<?=base_url('')?>/assets/css/pace.min.css" rel="stylesheet" />
  <script src="<?=base_url('')?>/assets/js/pace.min.js"></script>
  <!-- Bootstrap CSS -->
  <link href="<?=base_url('')?>/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link href="<?=base_url('')?>/assets/css/app.css" rel="stylesheet">
  <link href="<?=base_url('')?>/assets/css/icons.css" rel="stylesheet">
  <title><?=$page.' '.$subpage?></title>
</head>
<body class="bg-login">
  <!--wrapper-->
  <div class="wrapper">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
      <div class="container-fluid">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
          <div class="col mx-auto">
            <div class="mb-4 text-center">
              <img src="<?=base_url('')?>assets/images/favicon/apple-icon-120x120.png" width="120" alt="" />
            </div>
            <div class="card">
              <div class="card-body">
                <div class="border p-4 rounded">
                  <div class="text-center">
                    <h3 class="">Login</h3>
                    <!-- <p>Belum memiliki akun? <a href="<?=site_url('auth/register')?>">Registrasi disini</a> -->
                  </p>
                </div>
                <div class="form-body">
                  <?php $this->load->view('backend/message');
                  $attributes = array('onsubmit' => 'return tambah(this)');
                  echo form_open_multipart('auth/process',$attributes); ?>
                  <div class="row g-3">
                    <div class="col-12">
                      <label for="email" class="form-label">Email / No HP *</label>
                      <input type="text" name="email" class="form-control" id="email" placeholder="Email / No HP" autofocus required oninvalid="this.setCustomValidity('Masukkan Email disini')" oninput="setCustomValidity('')">
                    </div>
                    <div class="col-12">
                      <label for="password" class="form-label">Password *</label>
                      <div class="input-group" id="show_hide_password">
                        <input type="password" name="password" class="form-control border-end-0" id="password" placeholder="********" required oninvalid="this.setCustomValidity('Masukkan Password disini')" oninput="setCustomValidity('')">
                        <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-check form-switch">
                        <input class="form-check-input" name="remember" type="checkbox" id="flexSwitchCheckChecked" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                      </div>
                    </div>
                    <div class="col-md-6 text-end">	<a href="authentication-forgot-password.html">Lupa Password ?</a>
                    </div>
                    <div class="col-12">
                      <div class="d-grid">
                        <button type="submit" name="login" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Login</button>
                      </div>
                    </div>
                    <a class="text-center" href="<?=site_url('home')?>"><i class="bx bx-arrow-back"></i> Back to home</a>
                    <?php echo form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--end row-->
    </div>
  </div>
</div>
<!--end wrapper-->
<!-- Bootstrap JS -->
<script src="<?=base_url('')?>/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?=base_url('')?>/assets/js/jquery.min.js"></script>
<script src="<?=base_url('')?>/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?=base_url('')?>/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?=base_url('')?>/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--Password show & hide js -->
<script>
  $(document).ready(function () {
    $("#show_hide_password a").on('click', function (event) {
      event.preventDefault();
      if ($('#show_hide_password input').attr("type") == "text") {
        $('#show_hide_password input').attr('type', 'password');
        $('#show_hide_password i').addClass("bx-hide");
        $('#show_hide_password i').removeClass("bx-show");
      } else if ($('#show_hide_password input').attr("type") == "password") {
        $('#show_hide_password input').attr('type', 'text');
        $('#show_hide_password i').removeClass("bx-hide");
        $('#show_hide_password i').addClass("bx-show");
      }
    });
  });
</script>
<!--notification js -->
<script src="<?=base_url('')?>/assets/plugins/notifications/js/lobibox.min.js"></script>
<script src="<?=base_url('')?>/assets/plugins/notifications/js/notifications.min.js"></script>
<script src="<?=base_url('')?>/assets/plugins/notifications/js/notification-custom-script.js"></script>
<!--app JS-->
<script src="<?=base_url('')?>/assets/js/app.js"></script>
</body>
</html>
