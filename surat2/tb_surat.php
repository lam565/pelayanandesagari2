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
					<a href="../" class="logo">
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
						<div class="sidebar-title">
						<h4 style="color:white">Sistem Kependudukan</span></h4><hr>
						</div>
						
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div><br>
					<figure class="profile-picture">
					<center><img src="img/lg.png" width="100" alt="Joseph Doe"  data-lock-picture="assets/images/!logged-user.jpg" /></center>
					</figure>
					<center><h4 style="color:white">Padukuhan <span class="role"><?php echo $_SESSION['username'];?></h4></center>
					<br>
					
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
								<h5 style="color:white">------------------Pelayanan Administrasi--------------</span></h5>
									<li class="nav-active">
									<?php if ($_SESSION['username']=='gari'){?>
										<a href="gari.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
										<?php if ($_SESSION['username']=='tegalrejo'){?>
										<a href="tegalrejo.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
										<?php if ($_SESSION['username']=='jatirejo'){?>
										<a href="jatirejo.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
										<?php if ($_SESSION['username']=='ngelorejo'){?>
										<a href="ngelorejo.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
										<?php if ($_SESSION['username']=='ngijorejo'){?>
										<a href="ngijorejo.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
									</li>
									
									<li class="nav-parent" style="color:white">
										<a style="color:white">
											<i class="fa fa-archive" aria-hidden="true"></i>
											<span>Pelayanan</span>
										</a>	
										<ul class="nav nav-children">
											<li>
												<a href="tb_surat.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Surat Pengantar
												</a>
											</li>
											<li>
												<a href="form_kelahiran.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Kelahiran
												</a>
											</li>
											<li>
												<a href="form_kematian.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Pelayanan Kematian
												</a>
											</li>
											
											<li>
												<a href="form_ktp.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan KTP
												</a>
											</li>
											<li>
												<a href="form_pmasuk.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Masuk
												</a>
											</li>
											<li>
												<a href="form_pkeluar.php" style="color:white">
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
														<h4 class="title">Surat Belum Menikah</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="belum_menikah.php"> Belum Menikah</a>
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
														<a  href="form_ket_domisili_usaha.php">Ket Domisili Usaha</a>
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
														<h4 class="title">Surat Kehilangan</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="form_ket_kehilangan.php"> Surat Kehilangan</a>
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
														<h4 class="title">Surat Kurang Mampu</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="#"> Kurang Mampu</a>
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
														<h4 class="title">Surat Pengantar</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="form_ket_pengantar.php"> Surat Pengantar</a>
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
														<h4 class="title">Surat Miskin</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="form_surat_ket_miskin.php"> Surat Miskin</a>
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
														<h4 class="title">Surat Ket Penghasilan</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="form_surat_ket_penghasilan.php"> Surat Penghasilan</a>
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
														<h4 class="title">Surat Pengantar Jasaraharja</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="form_jasa_raharja.php"> Surat Jasaraharja</a>
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
														<h4 class="title">Surat Keterangan Jejaka</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="form_jejaka.php"> Surat Jejaka</a>
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
														<h4 class="title">Surat KPS</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="form_ket_pra_sejahtera.php"> Surat KPS</a>
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
														<h4 class="title">Surat Kehilangan</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="izin_keramaian.php"> Surat Kehilangan</a>
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
														<h4 class="title">Surat Kehilangan</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="izin_keramaian.php"> Surat Kehilangan</a>
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
														<h4 class="title">Surat Kehilangan</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="izin_keramaian.php"> Surat Kehilangan</a>
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
														<h4 class="title">Surat Kehilangan</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="izin_keramaian.php"> Surat Kehilangan</a>
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
														<h4 class="title">Surat Kehilangan</h4>
														<p>Kalurahan Gatak Sari </p>
													</div>
													<div class="summary-footer">
														<a  href="izin_keramaian.php"> Surat Kehilangan</a>
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