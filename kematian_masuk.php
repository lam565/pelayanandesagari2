<?php 
include "connect.php"

?>
<?php
session_start();
?>
<!doctype html>
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

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
				<header class="header">
				
					<?php include "notif.php"?>
					
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
						<h2 class="panel-title"><span class="badge badge-pill badge-success">Alamat</span> Desa Gatak Gari, Wonosari, Gunung Kidul, 55851 </h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard </span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"></a>
						</div>
						
					</header>

						

					<!-- start: page -->
					<div class="row">
						
						 <div class="col-12 col-lg-12">
							
					<form class="form-horizontal form-bordered" action="ok_kematian.php" method="POST" enctype="multipart/form-data">
					
							
						
						<!-- col-md-6 -->
						<div class="col-md-12">
							
								<section class="panel">
									<header class="panel-heading">
										

										<h2 class="panel-title">Layanan Permohonan Surat Kematian</h2>

										<div class="">

								<?php
									$query="select *
								   from kematian,biodata_wni,data_keluarga,jenis_kelamin,agama,pekerjaan
								   where kematian.NIK=biodata_wni.NIK
								   and data_keluarga.NO_KK=biodata_wni.NO_KK
								   and biodata_wni.JENIS_KLMIN=jenis_kelamin.JENIS_KLMIN
								   and biodata_wni.AGAMA=agama.AGAMA
								   and biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
								   
								   and kematian.bc='1' and kematian.id_kematian='$_GET[id]'";
									$results = mysqli_query($connect,$query) or die("Error: ".mysqli_error($connect));
									$data = mysqli_fetch_array($results);	
								?>
									
												<div class="pull-right"><div class="col-lg-12">No.Surat
													<input type="text" name="no_surat" value="<?php echo $data['id_kematian'];?>" class="form-control">
													<input type="hidden" name="nik" value="<?php echo $data['NIK'];?>" class="form-control">
												</div></div>
													<input type="hidden" name="username"  value="<?php echo $_SESSION['username'];?>">
													<input type="hidden" name="permohonan"  value="<?php echo $data['jenis_permohonan'];?>">
												
												<div class="mb-md hidden-lg hidden-xl"></div>

												
											</div><br><br>
									</header>
									<div class="panel-body">
									
									<div class="col-md-6">
											<div class="">
											<u><h3><b>Jenazah:</b></h3></u>
											
											<h5>Nama Jenazah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['NAMA_LGKP'];?></h5>
											<h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['NIK'];?></h5>
											<h5>Tempat,Tanggal Lahir&nbsp;&nbsp;: <?php echo $data['TMPT_LHR'];?>,<?php echo $data['TGL_LHR'];?></h5>
											<h5>Jenis Kelamin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['jenis_kelamin'];?></h5>
											<h5>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['ALAMAT'];?> RT.<?php echo $data['NO_RT'];?>/RW.<?php echo $data['NO_RW'];?>,Gari, Wonosari, DIY</h5>
											<h5>Agama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['nama_agama'];?></h5>
											<h5>Pekerjaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data['pekerjaan'];?></h5>
											<h5>Anak Ke&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data['anak_ke'];?></h5>
											<h5>Tanggal Kematian&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data['tanggal_kematian'];?></h5>
											<h5>Pukul&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   : <?php echo $data['jam'];?></h5>
											<h5>Sebab Kematian&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data['sebab'];?></h5>
											<h5>Tempat Kematian&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data['tempat_kematian'];?></h5>
											<h5>Yang Menerangkan&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['yang_menerangkan'];?></h5>
											
											</div>
									</div>
									<div class="col-md-6">
											<div class="">
											<u><h3><b>Pelapor:</b></h3></u>
											
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['nama_pelapor'];?></h5>
											<h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['nik_pelapor'];?></h5>
											<h5>Tanggal Lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['tangal_lahir_pelapor'];?></h5>
											<h5>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['alamat_pelapor'];?>,Gari, Wonosari, DIY</h5>
											<h5>Pekerjaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data['pekerjaan_pelapor'];?></h5>
											
											</div>
									</div>
									<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
									<?php
									$qs = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$data[NIK_AYAH]'";
	$re = mysqli_query($connect,$qs);
	$r = mysqli_fetch_array($re);
	?>
									<div class="col-md-6">
											<div class="">
											<u><h3><b>Ayah:</b></h3></u>
											
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $r['NAMA_LGKP'];?></h5>
											<h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $r['NIK'];?></h5>
											<h5>Tanggal Lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $r['TGL_LHR'];?></h5>
											<h5>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['ALAMAT'];?> RT.<?php echo $data['NO_RT'];?>/RW.<?php echo $data['NO_RW'];?>,Gari, Wonosari, DIY</h5>
											<h5>Pekerjaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $r['pekerjaan'];?></h5>
											
											</div>
									</div>
									<div class="col-md-6">
									<?php
									$qs1 = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$data[NIK_IBU]'";
	$re1 = mysqli_query($connect,$qs1);
	$r1 = mysqli_fetch_array($re1);
	?>
											<div class="">
											<u><h3><b>Ibu:</b></h3></u>
											
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $r1['NAMA_LGKP'];?></h5>
											<h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $r1['NIK'];?></h5>
											<h5>Tanggal Lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $r1['TGL_LHR'];?></h5>
											<h5>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['ALAMAT'];?> RT.<?php echo $data['NO_RT'];?>/RW.<?php echo $data['NO_RW'];?>,Gari, Wonosari, DIY</h5>
											<h5>Pekerjaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $r1['pekerjaan'];?></h5>
											
											</div>
									</div>
									<br><br><br><br><br><br><br>
									<div class="col-md-6">
											<div class="">
											<u><h3><b>Saksi I:</b></h3></u>
											
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['nama_saksi1'];?></h5>
											<h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['nik_saksi1'];?></h5>
											<h5>Tanggal Lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['TMPT_LHR'];?>,<?php echo $data['tanggal_lahir_saksi1'];?></h5>
											<h5>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['alamat_saksi1'];?>,Gari, Wonosari, DIY</h5>
											<h5>Pekerjaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data['pekerjaan_saksi1'];?></h5>
											
											</div>
									</div>
									<div class="col-md-6">
											<div class="">
											<u><h3><b>Saksi II:</b></h3></u>
											
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['nama_saksi2'];?></h5>
											<h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['nik_saksi2'];?></h5>
											<h5>Tanggal Lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['TMPT_LHR'];?>,<?php echo $data['tanggal_lahir_saksi2'];?></h5>
											<h5>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['alamat_saksi2'];?>,Gari, Wonosari, DIY</h5>
											<h5>Pekerjaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data['pekerjaan_saksi2'];?></h5>
											
											</div>
									</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
									
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Berkas Persyaratan</label>
												<div class="col-md-6">
												
                                             <input type="checkbox" checked="checked" class="flat" name="ktp1" value="KTP1"> KTP Pelapor<br>
                                             <input type="checkbox" checked="checked" class="flat" name="ktp1" value="KTP1"> KTP Saksi 1<br>
											
                                             <input type="checkbox" checked="checked" class="flat" name="ktp2" value="KTP2"> KTP Saksi 2<br>
											 <input type="checkbox" checked="checked" class="flat" name="ktp1" value="KTP1"> Surat Keterangan Kematian Desa/RS/Polisi<br>
											 <input type="checkbox" checked="checked" class="flat" name="ktp1" value="KTP1"> Buku Nikah/Keterangan Desa<br>
											 <input type="checkbox" checked="checked" class="flat" name="ktp1" value="KTP1"> Kuasa<br>
											 
											 <input type="checkbox" checked="checked" class="flat" name="kk" value="KTP2"> Kartu Keluarga<br>
											
												</div><br><br>
												
											
											</div>
											
										
											
											
											
											
											<center><button type="submit" name="submit" class="btn btn-primary">Cetak </button></center>
											</div>
									</div>
									
								</section>
							
						</div>
						
											
										
											
												
										
										</form>
					
					<!-- end: page -->
				</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark" ></div>
			
								<ul>
									<li>
										<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
			
							<div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside>
		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="assets/vendor/flot/jquery.flot.js"></script>
		<script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
		<script src="assets/vendor/flot/jquery.flot.pie.js"></script>
		<script src="assets/vendor/flot/jquery.flot.categories.js"></script>
		<script src="assets/vendor/flot/jquery.flot.resize.js"></script>
		<script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="assets/vendor/raphael/raphael.js"></script>
		<script src="assets/vendor/morris/morris.js"></script>
		<script src="assets/vendor/gauge/gauge.js"></script>
		<script src="assets/vendor/snap-svg/snap.svg.js"></script>
		<script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="assets/vendor/jqvmap/jquery.vmap.js"></script>
		<script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
		<script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/dashboard/examples.dashboard.js"></script>
	</body>
</html>