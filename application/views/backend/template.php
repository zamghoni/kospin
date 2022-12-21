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
  <!-- Sweet Alert -->
	<link href="<?=base_url('')?>assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
	<!--plugins-->
  <link rel="stylesheet" href="<?=base_url('')?>assets/plugins/notifications/css/lobibox.min.css" />
	<link href="<?=base_url('')?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="<?=base_url('')?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
  <link href="<?=base_url('')?>assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
	<link href="<?=base_url('')?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?=base_url('')?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="<?=base_url('')?>assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?=base_url('')?>assets/css/pace.min.css" rel="stylesheet" />
	<script src="<?=base_url('')?>assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?=base_url('')?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?=base_url('')?>assets/css/app.css" rel="stylesheet">
	<link href="<?=base_url('')?>assets/css/icons.css" rel="stylesheet">
  <!-- lightbox -->
	<link rel="stylesheet" href="<?=base_url('')?>assets/css/lightbox.css">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="<?=base_url('')?>assets/css/dark-theme.css" />
	<link rel="stylesheet" href="<?=base_url('')?>assets/css/semi-dark.css" />
	<link rel="stylesheet" href="<?=base_url('')?>assets/css/header-colors.css" />
	<title>Kospin Jasa - <?=$subpage.' '.$page?></title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="<?=base_url('')?>assets/images/favicon/apple-icon-60x60.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text" style="color:#09a18c"><b>Kospin Jasa</b></h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
        <li class="<?=activate_menu('dashboard')?>">
					<a href="<?=site_url('dashboard')?>">
						<div class="parent-icon"><i class="bx bx-home-circle"></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<?php if ($this->fungsi->user_login()->role != 1){ ?>
				<li class="dropdown-divider mb-0 mt-2"></li>
				<li class="<?=activate_menu('nasabah')?>">
					<a href="<?=site_url('nasabah')?>">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">Nasabah</div>
					</a>
				</li>
				<li class="<?=activate_menu('pekerjaan')?>">
					<a href="<?=site_url('pekerjaan')?>">
						<div class="parent-icon"><i class="bx bx-building-house"></i>
						</div>
						<div class="menu-title">Pekerjaan</div>
					</a>
				</li>
				<li class="<?=activate_menu('pinjaman')?>">
					<a href="<?=site_url('pinjaman')?>">
						<div class="parent-icon"><i class="bx bx-credit-card"></i>
						</div>
						<div class="menu-title">Pinjaman</div>
					</a>
				</li>
				<li class="<?=activate_menu('jaminan')?>">
					<a href="<?=site_url('jaminan')?>">
						<div class="parent-icon"><i class="bx bx-lock"></i>
						</div>
						<div class="menu-title">Jaminan</div>
					</a>
				</li>
			<?php } ?>
			<li class="dropdown-divider mb-0 mt-2"></li>
			<li class="<?=activate_menu('permohonan')?>">
				<a href="<?=site_url('permohonan')?>">
					<div class="parent-icon"><i class="bx bx-check-circle"></i>
					</div>
					<?php if ($this->fungsi->user_login()->role != 1){ ?>
						<div class="menu-title">Permohonan</div>
					<?php } else { ?>
					<div class="menu-title">Approval</div>
				<?php } ?>
				</a>
			</li>
				<!-- <li class="dropdown-divider mb-0 mt-2"></li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-folder'></i>
						</div>
						<div class="menu-title">Kredit</div>
					</a>
					<ul>
						<li> <a href="<?=site_url('nasabah/form')?>"><i class="bx bx-right-arrow-alt"></i>Permohonan</a>
						</li>
						<li> <a href="<?=site_url('nasabah')?>"><i class="bx bx-right-arrow-alt"></i>Daftar Pemohon</a>
						</li>
					</ul>
				</li>
				<li class="<?=activate_menu('')?>">
					<a href="<?=site_url('')?>">
						<div class="parent-icon"><i class="bx bx-check-circle"></i>
						</div>
						<div class="menu-title">Approval</div>
					</a>
				</li> -->
				<li class="dropdown-divider mb-0 mt-2"></li>
				<?php if ($this->fungsi->user_login()->role == 0){ ?>
        <li class="<?=activate_menu('user')?>">
					<a href="<?=site_url('user')?>">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">User</div>
					</a>
				</li>
				<?php } ?>
				<li class="<?=activate_menu('auth')?>">
					<a href="<?=site_url('auth/logout')?>">
						<div class="parent-icon"><i class="bx bx-log-out-circle"></i>
						</div>
						<div class="menu-title">Logout</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="<?=site_url('')?>" role="button" aria-expanded="false" title="Back to home"> <i class='bx bx-home'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="row row-cols-3 g-3 p-3">
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
											</div>
											<div class="app-title">Teams</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i>
											</div>
											<div class="app-title">Projects</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
											</div>
											<div class="app-title">Tasks</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i>
											</div>
											<div class="app-title">Feeds</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i>
											</div>
											<div class="app-title">Files</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-filter-alt'></i>
											</div>
											<div class="app-title">Alerts</div>
										</div>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
												ago</span></h6>
													<p class="msg-info">5 new user registered</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
												ago</span></h6>
													<p class="msg-info">You have recived new orders</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
												ago</span></h6>
													<p class="msg-info">The pdf files generated</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
												ago</span></h6>
													<p class="msg-info">5.1 min avarage time response</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info"><i class="bx bx-home-circle"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Product Approved <span
												class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Your new product has approved</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-message-detail"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
												ago</span></h6>
													<p class="msg-info">New customer comments recived</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
												ago</span></h6>
													<p class="msg-info">Successfully shipped your item</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class='bx bx-user-pin'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
												ago</span></h6>
													<p class="msg-info">24 new authors joined last week</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class='bx bx-door-open'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
												ago</span></h6>
													<p class="msg-info">45% less alerts last 4 weeks</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?=base_url('')?>assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?=base_url('')?>assets/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
												sec ago</span></h6>
													<p class="msg-info">Many desktop publishing packages</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?=base_url('')?>assets/images/avatars/avatar-3.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
												ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?=base_url('')?>assets/images/avatars/avatar-4.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
												min ago</span></h6>
													<p class="msg-info">Making this the first true generator</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?=base_url('')?>assets/images/avatars/avatar-5.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
												ago</span></h6>
													<p class="msg-info">Duis aute irure dolor in reprehenderit</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?=base_url('')?>assets/images/avatars/avatar-6.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
												ago</span></h6>
													<p class="msg-info">The passage is attributed to an unknown</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?=base_url('')?>assets/images/avatars/avatar-7.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
												ago</span></h6>
													<p class="msg-info">The point of using Lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?=base_url('')?>assets/images/avatars/avatar-8.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
												ago</span></h6>
													<p class="msg-info">It was popularised in the 1960s</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?=base_url('')?>assets/images/avatars/avatar-9.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
												ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?=base_url('')?>assets/images/avatars/avatar-10.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
												ago</span></h6>
													<p class="msg-info">If you are going to use a passage</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?=base_url('')?>assets/images/avatars/avatar-11.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
												ago</span></h6>
													<p class="msg-info">All the Lorem Ipsum generators</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<?php if ($this->fungsi->user_login()->foto != null){ ?>
								<img src="<?=base_url('upload/foto/'.$this->fungsi->user_login()->foto)?>" class="user-img" alt="user avatar">
							<?php } else { ?>
								<img src="<?=base_url('')?>assets/images/favicon/apple-icon-60x60.png" class="user-img" alt="user avatar">
							<?php } ?>
							<div class="user-info ps-3">
								<?php if ($this->fungsi->user_login()->role != 1){ ?>
									<p class="user-name mb-0"><?=$this->fungsi->user_login()->nama_lengkap;?></p>
								<?php } else { ?>
									<p class="user-name mb-0"><?=$this->fungsi->user_login()->nama_lengkap;?></p>
								<?php } ?>
								<p class="designattion mb-0">
									<?php if ($this->fungsi->user_login()->role == 0){
									echo "Admin";
								}else if ($this->fungsi->user_login()->role == 1) {
									echo "Pimpinan";
								}else{
									echo "Nasabah";
								} ?></p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="<?=site_url('profile')?>"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item" href="<?=site_url('profile/change_password')?>"><i class="bx bx-lock-open"></i><span>Ubah Password</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="<?=site_url('auth/logout') ?>"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->

    <?php echo $contents; ?>

		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © <?=date('Y') ?>. All right reserved.</p>
		</footer>
	</div>
	<script src="<?=base_url('')?>assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?=base_url('')?>assets/js/jquery.min.js"></script>
	<script src="<?=base_url('')?>assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?=base_url('')?>assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?=base_url('')?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

	<script src="<?=base_url('')?>assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
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
	<script src="<?=base_url('')?>assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url('')?>assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );

			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
  <!--notification js -->
	<script src="<?=base_url('')?>assets/plugins/notifications/js/lobibox.min.js"></script>
	<script src="<?=base_url('')?>assets/plugins/notifications/js/notifications.min.js"></script>
	<script src="<?=base_url('')?>assets/plugins/notifications/js/notification-custom-script.js"></script>
  <!-- lightbox -->
  <script type="text/javascript" src="<?=base_url('')?>assets/js/lightbox.js"></script>
  <!-- Sweet-Alert  -->
  <script src="<?=base_url('')?>assets/custom/custom.js"></script>
  <script src="<?=base_url('')?>assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
  <script src="<?=base_url('')?>assets/plugins/sweet-alert2/sweet-alert.init.js"></script>
	<!--app JS-->
	<!-- <script src="<?=base_url('')?>assets/js/index.js"></script> -->
	<script src="<?=base_url('')?>assets/js/app.js"></script>
</body>

</html>
