<!doctype html>
<?php 
include "connect.php"

?>
<?php
session_start();
?>
<html class="fixed">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<!-- Basic -->
		

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
				
					<?php include "notif.php"?>
			
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
					<center><h4 style="color:white">Halaman <span class="role"><?php echo $_SESSION['username'];?></h4></center>
					<br>
					
					<div class="nano">
						<div class="nano-content">
							<?php include 'navigasi.php'?>
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2 class="panel-title"><span class="badge badge-pill badge-success">Alamat</span> Kalurahan Gari, Wonosari, Gunung Kidul, 55851 </h2>
					
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
													<div>
														<img src="img/surat.png" width="80" alt="Joseph Doe"  data-lock-picture="assets/images/!logged-user.jpg" />
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">SKCK</h4>
														<p>Kalurahan Gari </p>
													</div>
													
													<div class="summary-footer">
														<a  href="skck.php"> Buat</a><?php if ($_SESSION['username']=='sekda') { ?>  |  <a href="daftar_surat.php?view=skck&fp=skck">Lihat</a> <?php } else { } ?> 
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
													<div>
														<img src="img/surat.png" width="80" alt="Joseph Doe"  data-lock-picture="assets/images/!logged-user.jpg" />
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Domisili</h4>
														<p>Kalurahan Gari </p>
													</div>
													<div class="summary-footer">
														<a  href="domisili.php">Buat</a><?php if ($_SESSION['username']=='sekda') { ?>  |  <a href="daftar_surat.php?view=domisili&fp=domisili">Lihat</a><?php } else { } ?>
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
													<div>
														<img src="img/surat.png" width="80" alt="Joseph Doe"  data-lock-picture="assets/images/!logged-user.jpg" />
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">KIA</h4>
														<p>Kalurahan Gari </p>
													</div>
													<div class="summary-footer">
														<a  href="kia.php">Buat</a><?php if ($_SESSION['username']=='sekda') { ?>  |  <a href="daftar_surat.php?view=kia&fp=kia">Lihat</a><?php } else { } ?>
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
													<div>
														<img src="img/surat.png" width="80" alt="Joseph Doe"  data-lock-picture="assets/images/!logged-user.jpg" />
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Izin Keramaian</h4>
														<p>Kalurahan Gari </p>
													</div>
													<div class="summary-footer">
														<a  href="izin_keramaian.php">Buat</a><?php if ($_SESSION['username']=='sekda') { ?>  |  <a href="daftar_surat.php?view=keramaian&fp=surat_izin_keramaian">Lihat</a><?php } else { } ?>
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
													<div>
														<img src="img/surat.png" width="80" alt="Joseph Doe"  data-lock-picture="assets/images/!logged-user.jpg" />
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Ket Beda Nama</h4>
														<p>Kalurahan Gari </p>
													</div>
													<div class="summary-footer">
														<a  href="beda_nama.php">Buat</a><?php if ($_SESSION['username']=='sekda') { ?>  |  <a href="daftar_surat.php?view=beda_nama&fp=surat_ket_beda_nama">Lihat</a><?php } else { } ?>
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
													<div>
														<img src="img/surat.png" width="80" alt="Joseph Doe"  data-lock-picture="assets/images/!logged-user.jpg" />
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Surat Belum Menikah</h4>
														<p>Kalurahan Gari </p>
													</div>
													<div class="summary-footer">
														<a  href="belum_menikah.php">Buat</a><?php if ($_SESSION['username']=='sekda') { ?>  |  <a href="daftar_surat.php?view=belum_menikah&fp=surat_ket_belum_nikah">Lihat</a><?php } else { } ?>
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
													<div>
														<img src="img/surat.png" width="80" alt="Joseph Doe"  data-lock-picture="assets/images/!logged-user.jpg" />
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Ket Domisili Usaha</h4>
														<p>Kalurahan Gari </p>
													</div>
													<div class="summary-footer">
														<a  href="form_ket_domisili_usaha.php">Buat</a><?php if ($_SESSION['username']=='sekda') { ?>  |  <a href="daftar_surat.php?view=domisili_usaha&fp=surat_ket_domisili_usaha">Lihat</a><?php } else { } ?>
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
													<div>
														<img src="img/surat.png" width="80" alt="Joseph Doe"  data-lock-picture="assets/images/!logged-user.jpg" />
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Surat Kehilangan</h4>
														<p>Kalurahan Gari </p>
													</div>
													<div class="summary-footer">
														<a  href="form_ket_kehilangan.php"> Buat</a><?php if ($_SESSION['username']=='sekda') { ?>  |  <a href="daftar_surat.php?view=kehilangan&fp=surat_ket_kehilangan">Lihat</a><?php } else { } ?>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<!-- <div class="col-md-12 col-lg-3 col-xl-3">
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
														<p>Kalurahan Gari </p>
													</div>
													<div class="summary-footer">
														<a  href="#"> Kurang Mampu</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div> -->
								<div class="col-md-12 col-lg-3 col-xl-3">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div>
														<img src="img/surat.png" width="80" alt="Joseph Doe"  data-lock-picture="assets/images/!logged-user.jpg" />
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Surat Pengantar</h4>
														<p>Kalurahan Gari </p>
													</div>
													<div class="summary-footer">
														<a  href="form_ket_pengantar.php">Buat</a><?php if ($_SESSION['username']=='sekda') { ?>  |  <a href="daftar_surat.php?view=pengantar&fp=surat_ket_pengantar">Lihat</a><?php } else { } ?>
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
													<div>
														<img src="img/surat.png" width="80" alt="Joseph Doe"  data-lock-picture="assets/images/!logged-user.jpg" />
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Surat Miskin</h4>
														<p>Kalurahan Gari </p>
													</div>
													<div class="summary-footer">
														<a  href="form_s_miskin.php"> Buat</a><?php if ($_SESSION['username']=='sekda') { ?>  |  <a href="daftar_surat.php?view=sktm&fp=surat_keterangan_miskin">Lihat</a><?php } else { } ?>
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
													<div>
														<img src="img/surat.png" width="80" alt="Joseph Doe"  data-lock-picture="assets/images/!logged-user.jpg" />
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Surat Ket Penghasilan</h4>
														<p>Kalurahan Gari </p>
													</div>
													<div class="summary-footer">
														<a  href="form_surat_ket_penghasilan.php"> Buat</a><?php if ($_SESSION['username']=='sekda') { ?>  |  <a href="daftar_surat.php?view=penghasilan&fp=surat_keterangan_penghasilan">Lihat</a><?php } else { } ?>
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
													<div>
														<img src="img/surat.png" width="80" alt="Joseph Doe"  data-lock-picture="assets/images/!logged-user.jpg" />
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Surat Pengantar Jasaraharja</h4>
														<p>Kalurahan Gari </p>
													</div>
													<div class="summary-footer">
														<a  href="form_jasa_raharja.php"> Buat</a><?php if ($_SESSION['username']=='sekda') { ?>  |  <a href="daftar_surat.php?view=jasaraharja&fp=surat_pengantar_jasaraharja">Lihat</a><?php } else { } ?>
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
													<div>
														<img src="img/surat.png" width="80" alt="Joseph Doe"  data-lock-picture="assets/images/!logged-user.jpg" />
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Surat Keterangan Jejaka</h4>
														<p>Kalurahan Gari </p>
													</div>
													<div class="summary-footer">
														<a  href="form_jejaka.php"> Buat</a><?php if ($_SESSION['username']=='sekda') { ?>  |  <a href="daftar_surat.php?view=jejaka&fp=surat_pernyataan_jejaka">Lihat</a><?php } else { } ?>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<!-- <div class="col-md-12 col-lg-3 col-xl-3">
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
														<p>Kalurahan Gari </p>
													</div>
													<div class="summary-footer">
														<a  href="form_ket_pra_sejahtera.php"> Buat</a><?php if ($_SESSION['username']=='sekda') { ?>  |  <a href="daftar_surat.php?view=kps&fp=surat_pernyataan_jejaka">Lihat</a><?php } else { } ?>
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
														<p>Kalurahan Gari </p>
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
														<p>Kalurahan Gari </p>
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
														<p>Kalurahan Gari </p>
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
														<p>Kalurahan Gari </p>
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
														<p>Kalurahan Gari </p>
													</div>
													<div class="summary-footer">
														<a  href="izin_keramaian.php"> Surat Kehilangan</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div> -->
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