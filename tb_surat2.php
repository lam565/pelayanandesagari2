<!doctype html>
<?php 
include "connect.php"

?>
<?php
session_start();
?>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Sistem Adminitrasi Online</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
		<meta name="author" content="JSOFT.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="assets/vendor/morris/morris.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
		
		<script src="js/jquery.min.js"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a class="logo">
						<img src="img/g.png" height="30" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
				<?Php	
			$sql1 ="SELECT * FROM warga where warga.nik='$_SESSION[username]'";
			$results1 = mysqli_query($connect,$sql1) or die("Error: ".mysqli_error($connect));
			$r1 = mysqli_fetch_array($results1);
				?>	
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="img/lg.png" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name"><?php echo $r1['nama_warga'];?></span>
								<span class="role"><?php echo $_SESSION['username'];?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								
								<li>
									<a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
					
			
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
					<?Php	
					$sql1 ="SELECT nama_pegawai FROM pegawai where pegawai.username='$_SESSION[username]'";
					$results1 = mysqli_query($connect,$sql1) or die("Error: ".mysqli_error($connect));
					$r1 = mysqli_fetch_array($results1);
					?>
					<div class="sidebar-header">
						<h4 style="color:white">Sistem Kependudukan</span></h4><hr>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
					<figure class="profile-picture">
					<center><img src="img/lg.png" width="100" alt="Joseph Doe"  data-lock-picture="assets/images/!logged-user.jpg" /></center>
					</figure>
					<center><h4 style="color:white">Halaman <span class="role"><?php echo $_SESSION['username'];?></h4></center>
					
					
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
								<h5 style="color:white">------------------Pelayanan Administrasi--------------</span></h5>
									<li class="nav-active">
										<a href="desa.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
									</li>
									
									<li class="nav-parent" style="color:white">
										<a style="color:white">
											<i class="fa fa-archive" aria-hidden="true"></i>
											<span>Master Data</span>
										</a>	
										<ul class="nav nav-children">
										
										
											<li>
												<a href="tabel_warga.php" style="color:white">
													<i class="fa fa-users" aria-hidden="true"></i> Data Warga
												</a>
											</li>
											
											<li>
												<a href="tabel_pegawai.php" style="color:white">
													<i class="fa fa-users" aria-hidden="true"></i> Data Pegawai
												</a>
											</li>
											
											<li>
												<a href="tabel_kk.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Data Kartu Keluarga
												</a>
											</li>
										</ul>	
										
									</li>
									<li class="nav-parent" style="color:white">
										<a style="color:white">
											<i class="fa fa-archive" aria-hidden="true"></i>
											<span>Pelayanan</span>
										</a>	
										<ul class="nav nav-children">
											<li>
												<a href="tb_surat2.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Surat Pengantar
												</a>
											</li>
											<li>
												<a href="tb_kelahiran2.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Kelahiran
												</a>
											</li>
											<li>
												<a href="tb_kematian2.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Pelayanan Kematian
												</a>
											</li>
											
											<li>
												<a href="tb_ktp.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan KTP
												</a>
											</li>
											<li>
												<a href="tb_pmasuk.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Masuk
												</a>
											</li>
											<li>
												<a href="tb_pkeluar.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Keluar
												</a>
											</li>
										</ul>	
											
										
									</li>
									<li class="nav-parent" style="color:white">
										<a style="color:white">
											<i class="fa fa-archive" aria-hidden="true"></i>
											<span>Buku Register</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a style="color:white" href="range_waktu.php">
													 Surat Pengantar
												</a>
											</li>
											<li>
												<a style="color:white" href="range_waktu.php">
													 Pelayanan Kelahiran
												</a>
											</li>
											<li>
												<a style="color:white" href="range_waktu.php">
													 Pelayanan Kematian
												</a>
											</li>
											<li>
												<a style="color:white" href="range_waktu.php">
													 Pelayanan KTP
												</a>
											</li>
											<li>
												<a style="color:white" href="range_waktu.php">
													Pelayanan Pindah Masuk
												</a>
											</li>
											<li>
												<a style="color:white" href="laporan_nikah.php">
													Pelayanan Pindah Keluar
												</a>
											</li>
											
											
											
										</ul>
									</li>
									
				
							<hr class="separator" />
				
							
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2 class="panel-title"><span class="badge badge-pill badge-success">Alamat</span> Kalurahan Gatak Gari, Wonosari, Gunung Kidul, 55851 </h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Beranda </span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"></a>
						</div>
					</header>
						
						<div class="row">
						
						 <div class="col-12 col-lg-12">
							<div class="row">
							
								<div class="col-md-12 col-lg-3 col-xl-3">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-male"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">SKCK</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="skck.php">SKCK</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-3 col-xl-3">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-male"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Domisili</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="domisili.php">Domisili</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-3 col-xl-3">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-male"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Pengantar KIA</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="kia.php">Pengantar KIA</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-3 col-xl-3">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-male"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Izin Keramaian</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="izin_keramaian.php">Izin Keramaian</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-3 col-xl-3">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-male"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Ket Beda Nama</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="beda_nama.php">Ket Beda Nama</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-3 col-xl-3">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-male"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Ket Belum Menikah</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="belum_menikah.php">Ket Belum Menikah</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-3 col-xl-3">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-male"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Ket Domisili Usaha</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="domisili_usaha.php">Ket Domisili Usaha</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-3 col-xl-3">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-male"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Izin Keramaian</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="izin_keramaian.php">Izin Keramaian</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								
							</div>
						</div>
						
					</div>
						
						
					
			</div>
			
			
		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

	</body>
</html>