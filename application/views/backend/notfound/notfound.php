<!DOCTYPE html>
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
	<!-- loader-->
	<link href="<?=base_url('')?>assets/css/pace.min.css" rel="stylesheet" />
	<script src="<?=base_url('')?>assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?=base_url('')?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?=base_url('')?>assets/css/app.css" rel="stylesheet">
	<link href="<?=base_url('')?>assets/css/icons.css" rel="stylesheet">
	<title>Siaga Bencana - <?=$subpage.' '.$page?></title>
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<div class="error-404 d-flex align-items-center justify-content-center">
			<div class="container">
				<div class="card py-5">
					<div class="row g-0">
						<div class="col col-xl-5">
							<div class="card-body p-4">
								<h1 class="display-1"><span class="text-primary">4</span><span class="text-danger">0</span><span class="text-success">4</span></h1>
								<h2 class="font-weight-bold display-4">Page Not Found</h2>
								<p>Anda telah mencapai tepi alam semesta.
									<br>Halaman yang Anda minta tidak dapat ditemukan.
									<br>Jangan khawatir dan kembali ke halaman sebelumnya.</p>
								<div class="mt-5"> <a href="<?=site_url()?>" class="btn btn-primary btn-lg px-md-5 radius-30">Go Home</a>
									<a href="javascript:history.back()" class="btn btn-outline-dark btn-lg ms-3 px-md-5 radius-30">Back</a>
								</div>
							</div>
						</div>
						<div class="col-xl-7">
							<img src="https://cdn.searchenginejournal.com/wp-content/uploads/2019/03/shutterstock_1338315902.png" class="img-fluid" alt="">
						</div>
					</div>
					<!--end row-->
				</div>
			</div>
		</div>
		<div class="bg-white p-3 fixed-bottom border-top shadow">
			<div class="text-center">
				<p class="mb-0">Copyright © <?=date('Y') ?>. All right reserved.</p>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
	<!-- Bootstrap JS -->
	<script src="<?=base_url('')?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
