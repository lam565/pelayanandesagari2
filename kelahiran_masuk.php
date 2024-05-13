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
						<h2 class="panel-title"><span class="badge badge-pill badge-success">Alamat</span> Kalurahan Gatak Gari, Wonosari, Gunung Kidul, 55851 </h2>
					
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
							
					<form class="form-horizontal form-bordered" action="ok_kelahiran.php" method="POST" enctype="multipart/form-data">
					
							
						
						<!-- col-md-6 -->
						<div class="col-md-12">
							
								<section class="panel">
									<header class="panel-heading">
										

										<h2 class="panel-title">Layanan Permohonan Surat Kelahiran</h2>

										<div class="">
								<?php
									$q="select *
								   from detail_kelahiran,kelahiran where kelahiran.id_kelahiran=detail_kelahiran.id_kelahiran 
								   and kelahiran.id_kelahiran='$_GET[id]'";
									$r = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$da = mysqli_fetch_array($r);	
								?>
								<?php
									$query="select *
								   from detail_kelahiran where id_kelahiran='$_GET[id]'";
									$results = mysqli_query($connect,$query) or die("Error: ".mysqli_error($connect));
									$data = mysqli_fetch_array($results);	
								?>
									
												<div class="pull-right"><div class="col-lg-12">No.Surat
													<input type="text" name="no_surat" value="<?php echo $data['id_kelahiran'];?>" class="form-control">
										
												</div></div>
													<input type="hidden" name="username"  value="<?php echo $_SESSION['username'];?>">
												
												
												<div class="mb-md hidden-lg hidden-xl"></div>

												
											</div><br><br>
									</header>
									<div class="panel-body">
									
									<div class="col-md-12">
									<?php if ($da['jenis_kelahiran']=='1') { ?>
									<u><h3><b>Bayi: (Jenis Kelahiran : Tunggal)</b></h3></u>
									<?php } ?>
									<?php if ($da['jenis_kelahiran']=='2') { ?>
									<u><h3><b>Bayi: (Jenis Kelahiran : Kembar 2)</b></h3></u>
									<?php } ?>
									<?php if ($da['jenis_kelahiran']=='3') { ?>
									<u><h3><b>Bayi: (Jenis Kelahiran : Kembar 3)</b></h3></u>
									<?php } ?>
									<?php if ($da['jenis_kelahiran']=='4') { ?>
									<u><h3><b>Bayi: (Jenis Kelahiran : Kembar 4)</b></h3></u>
									<?php } ?>
									<?php if ($da['jenis_kelahiran']=='5') { ?>
									<u><h3><b>Bayi: (Jenis Kelahiran : Kembar 5)</b></h3></u>
									<?php } ?>
									
											<div class="">
											<table class="table table-bordered table-striped table-condensed mb-none">
										<thead>
											<tr>
												<th><center>No</center></th>
												<th><center>Nama Bayi</center></th>
												<th><center>Tempat,Tanggal Lahir</center></th>
												<th><center>Tempat Dilahirkan</center></th>
												<th><center>Jam</center></th>
											
												<th><center>Lahir Ke</center></th>
												<th><center>Persalinan</center></th>
												<th><center>Berat Bayi</center></th>
												<th><center>Panjang Bayi</center></th>		
											</tr>
										</thead>
										<tbody id="table1">
													<?php
						$no=1;							
						$qlahir=mysqli_query($connect,"SELECT * FROM kelahiran,detail_kelahiran 
						WHERE kelahiran.id_kelahiran=detail_kelahiran.id_kelahiran
						and kelahiran.id_kelahiran='$_GET[id]'");
					
						while($c=mysqli_fetch_array($qlahir)){
						?>
						<tr>
						<td><center><?php echo $no++;?></center></td>
						<td><center><?php echo $c['nama_anak'];?></center></td>
						<td><center><?php echo $c['tempat_lahir'];?>,<?php echo $c['tanggal_lahir'];?></center></td>
						<?php if ($c['tempat_dilahirkan']=='1') { ?>
						<td><center>RS/RB</center></td>
						<?php } ?>
						<?php if ($c['tempat_dilahirkan']=='2') { ?>
						<td><center>Pukesmas</center></td>
						<?php } ?>
						<?php if ($c['tempat_dilahirkan']=='3') { ?>
						<td><center>Polindes</center></td>
						<?php } ?>
						<?php if ($c['tempat_dilahirkan']=='4') { ?>
						<td><center>Rumah</center></td>
						<?php } ?>
						<?php if ($c['tempat_dilahirkan']=='5') { ?>
						<td><center>Lainnya</center></td>
						<?php } ?>
						
						<td><center><?php echo $c['jam'];?></center></td>
						
						
						<td><center><?php echo $c['lahir_ke'];?></center></td>
						
						<?php if ($c['persalinan']=='1') { ?>
						<td><center>Dokter</center></td>
						<?php } ?>
						<?php if ($c['persalinan']=='2') { ?>
						<td><center>Bidan/Perawat</center></td>
						<?php } ?>
						<?php if ($c['persalinan']=='3') { ?>
						<td><center>Dukun</center></td>
						<?php } ?>
						<?php if ($c['persalinan']=='4') { ?>
						<td><center>Lainnya</center></td>
						<?php } ?>
						
						
						<td><center><?php echo $c['berat_bayi'];?></center></td>
						<td><center><?php echo $c['panjang_bayi'];?></center></td>
						
						</tr>
						<?php } ?>
										</tbody>
									</table>
											</div>
									</div>
									<div class="col-md-6">
									<?php
									$query1="select * from biodata_wni,pekerjaan,data_keluarga 
									where biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
									and biodata_wni.NO_KK=data_keluarga.NO_KK 
									and biodata_wni.NIK='$da[nik_pelapor]'";
									$results1 = mysqli_query($connect,$query1) or die("Error: ".mysqli_error($connect));
									$data1 = mysqli_fetch_array($results1);	
								?>
											<div class="">
											<u><h3><b>Pelapor:</b></h3></u>
											
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['NAMA_LGKP'];?></h5>
											<h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['NIK'];?></h5>
											<h5>Tanggal Lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['TGL_LHR'];?></h5>
											<h5>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['ALAMAT'];?> RT.<?php echo $data1['NO_RT'];?> RW.<?php echo $data1['NO_RW'];?>,Gari, Wonosari, DIY</h5>
											<h5>Pekerjaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data1['pekerjaan'];?></h5>
											
											</div>
									</div>
									<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
									<?php
									$query2="select * from biodata_wni,pekerjaan,data_keluarga 
									where biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
									and biodata_wni.NO_KK=data_keluarga.NO_KK 
									and biodata_wni.NIK='$da[nik_ayah]'";
									$results2 = mysqli_query($connect,$query2) or die("Error: ".mysqli_error($connect));
									$data2 = mysqli_fetch_array($results2);	
								?>
									<div class="col-md-6">
											<div class="">
											<u><h3><b>Ayah:</b></h3></u>
											
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data2['NAMA_LGKP'];?></h5>
											<h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data2['NIK'];?></h5>
											<h5>Tanggal Lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data2['TGL_LHR'];?></h5>
											<h5>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data2['ALAMAT'];?> RT.<?php echo $data2['NO_RT'];?> RW.<?php echo $data2['NO_RW'];?>,Gari, Wonosari, DIY</h5>
											<h5>Pekerjaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data2['pekerjaan'];?></h5>
											
											</div>
									</div>
									<div class="col-md-6">
									<?php
									$query3="select * from biodata_wni,pekerjaan,data_keluarga 
									where biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
									and biodata_wni.NO_KK=data_keluarga.NO_KK 
									and biodata_wni.NIK='$da[nik_ibu]'";
									$results3 = mysqli_query($connect,$query3) or die("Error: ".mysqli_error($connect));
									$data3 = mysqli_fetch_array($results3);	
								?>
											<div class="">
											<u><h3><b>Ibu:</b></h3></u>
											
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data3['NAMA_LGKP'];?></h5>
											<h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data3['NIK'];?></h5>
											<h5>Tanggal Lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data3['TGL_LHR'];?></h5>
											<h5>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data3['ALAMAT'];?> RT.<?php echo $data3['NO_RT'];?> RW.<?php echo $data3['NO_RW'];?>,Gari, Wonosari, DIY</h5>
											<h5>Pekerjaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data3['pekerjaan'];?></h5>
											
											</div>
									</div>
									<br><br><br><br><br><br><br>
									<div class="col-md-6">
									<?php
									$query5="select * from biodata_wni,pekerjaan,data_keluarga 
									where biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
									and biodata_wni.NO_KK=data_keluarga.NO_KK 
									and biodata_wni.NIK='$da[nik_saksi1]'";
									$results5 = mysqli_query($connect,$query5) or die("Error: ".mysqli_error($connect));
									$data5 = mysqli_fetch_array($results5);	
								?>
											<div class="">
											<u><h3><b>Saksi I:</b></h3></u>
											
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data5['NAMA_LGKP'];?></h5>
											<h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data5['NIK'];?></h5>
											<h5>Tanggal Lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data5['TGL_LHR'];?></h5>
											<h5>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data5['ALAMAT'];?> RT.<?php echo $data5['NO_RT'];?> RW.<?php echo $data5['NO_RW'];?>,Gari, Wonosari, DIY</h5>
											<h5>Pekerjaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data5['pekerjaan'];?></h5>
											
											</div>
									</div>
									<div class="col-md-6">
									<?php
									$query7="select * from biodata_wni,pekerjaan,data_keluarga 
									where biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
									and biodata_wni.NO_KK=data_keluarga.NO_KK 
									and biodata_wni.NIK='$da[nik_saksi2]'";
									$results7 = mysqli_query($connect,$query7) or die("Error: ".mysqli_error($connect));
									$data7 = mysqli_fetch_array($results7);	
								?>
											<div class="">
											<u><h3><b>Saksi II:</b></h3></u>
											
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data7['NAMA_LGKP'];?></h5>
											<h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data7['NIK'];?></h5>
											<h5>Tanggal Lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data7['TGL_LHR'];?></h5>
											<h5>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data7['ALAMAT'];?> RT.<?php echo $data7['NO_RT'];?> RW.<?php echo $data7['NO_RW'];?>,Gari, Wonosari, DIY</h5>
											<h5>Pekerjaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data7['pekerjaan'];?></h5>
											
											</div>
									</div><br>
									
											
											
										
											
											
											
											
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