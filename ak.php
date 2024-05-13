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
<link href="a/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
				<header class="header">
				<div class="logo-container">
					<a class="logo">
						
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<div>
					
				<span class="separator"></span>
					<?php include "notif.php"?>
					</div>
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
							
								
							
									  
							<div class="panel-body">
							<center><h2 class="panel-title">Tabel Anggota Keluarga</h2></center>
							<br>
							
								<div class="table-responsive">
									<table class="table table-striped table-bordered data">
										<thead>
											<tr>
											<th><center>NIK</center></th>
												<th><center>Nama</center></th>
												<th><center>Tempat,Tanggal Lahir</center></th>
												<th><center>Jenis Kelamin</center></th>
												<th><center>Alamat</center></th>
												<th><center>Pendidikan</center></th>
												<th><center>Agama</center></th>
												<th><center>Status Perkawinan</center></th>
												<th><center>Status Hubungan Keluarga</center></th>
												<th><center>Pekerjaan</center></th>
												
												
											</tr>
										</thead>
										<tbody>
								
													<?php
													
						$a="select biodata_wni.NIK,biodata_wni.NAMA_LGKP,biodata_wni.TMPT_LHR,
						biodata_wni.TGL_LHR,jenis_kelamin.jenis_kelamin,data_keluarga.ALAMAT,
						data_keluarga.NO_RT,data_keluarga.NO_RW,
						pendidikan_terakhir.pendidikan,agama.nama_agama,status_perkawinan.status_perkawinan,pekerjaan.pekerjaan,status_hubungan.status_hubungan
						from biodata_wni,data_keluarga,agama,pendidikan_terakhir,status_perkawinan,pekerjaan,jenis_kelamin,status_hubungan
						where biodata_wni.NO_KK=data_keluarga.NO_KK 
						and biodata_wni.AGAMA=agama.AGAMA
						and biodata_wni.PDDK_AKH=pendidikan_terakhir.PDDK_AKH
						and biodata_wni.STAT_KWN=status_perkawinan.STAT_KWN
						and biodata_wni.JENIS_KLMIN=jenis_kelamin.JENIS_KLMIN
						and biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN
						and biodata_wni.STAT_HBKEL=status_hubungan.STAT_HBKEL
						and data_keluarga.NO_KK='$_GET[kk]'
						";
						$b=mysqli_query($connect,$a) or die ("error:".mysqli_error($connect));
						$d=mysqli_num_rows($b);
						while($c=mysqli_fetch_array($b)){
						?>
						<tr>
						<td><center><?php echo $c['NIK'];?></center></td>
						<td><center><?php echo $c['NAMA_LGKP'];?></center></td>
						<td><center><?php echo $c['TMPT_LHR'];?>,<?php echo $c['TGL_LHR'];?></center></td>
						<td><center><?php echo $c['jenis_kelamin'];?></center></td>
						<td><center><?php echo $c['ALAMAT'];?> RT <?php echo $c['NO_RT'];?>/ RW <?php echo $c['NO_RW'];?></center></td>
						<td><center><?php echo $c['pendidikan'];?></center></td>
						<td><center><?php echo $c['nama_agama'];?></center></td>
						<td><center><?php echo $c['status_perkawinan'];?></center></td>
						<td><center><?php echo $c['status_hubungan'];?></center></td>
						<td><center><?php echo $c['pekerjaan'];?></center></td>
						</tr>
						
						<?php } ?>
										</tbody>
										
									</table>
									
						</div>
						
					</div>
					

					

					
					
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
	<script src="a/js/jquery-1.10.2.js"></script>
    <script src="a/js/bootstrap.min.js"></script>
    <script src="a/js/plugins/metisMenu/jquery.metisMenu.js"></script>

   <script src="a/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="a/js/plugins/dataTables/dataTables.bootstrap.js"></script>
	
	<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});
</script>
	</body>
</html>