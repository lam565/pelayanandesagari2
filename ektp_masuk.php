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
							
					<form class="form-horizontal form-bordered" action="ok_ktp.php" method="POST" enctype="multipart/form-data">
					
							<?php
								$query="select *
								   from suket_ektp,biodata_wni,data_keluarga,jenis_kelamin,
								   agama,status_perkawinan,pekerjaan,pendidikan_terakhir,golongan_darah,kelainan_fisik,akte_kelahiran
								   where suket_ektp.NIK=biodata_wni.NIK
								   and data_keluarga.NO_KK=biodata_wni.NO_KK
								   and biodata_wni.JENIS_KLMIN=jenis_kelamin.JENIS_KLMIN
								   and biodata_wni.AGAMA=agama.AGAMA
								   and biodata_wni.PDDK_AKH=pendidikan_terakhir.PDDK_AKH
								   and biodata_wni.STAT_KWN=status_perkawinan.STAT_KWN
								   and biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN
								   and biodata_wni.GOL_DRH=golongan_darah.GOL_DRH
								   and biodata_wni.KLAIN_FSK=kelainan_fisik.KLAIN_FSK
								   and biodata_wni.AKTA_LHR=akte_kelahiran.AKTA_LHR
								   and suket_ektp.bc='1' and suket_ektp.id_ektp='$_GET[id]'";
								$results = mysqli_query($connect,$query) or die("Error: ".mysqli_error($connect));
                                $data = mysqli_fetch_array($results);									
                            ?>
						
						<!-- col-md-6 -->
						<div class="col-md-12">
							
								<section class="panel">
									<header class="panel-heading">
										

										<h2 class="panel-title">Layanan Permohonan KTP: <u><?php echo $data['jenis_permohonan'];?></u></h2>

										<div class="">

												
												<div class="pull-right"><div class="col-lg-12">No.Surat
													<input type="text" name="no_surat" value="<?php echo $data['id_ektp'];?>" class="form-control">
													<input type="hidden" name="nik" value="<?php echo $data['NIK'];?>" class="form-control">
												</div></div>
													<input type="hidden" name="username"  value="<?php echo $_SESSION['username'];?>">
													<input type="hidden" name="permohonan"  value="<?php echo $data['jenis_permohonan'];?>">
												
												<div class="mb-md hidden-lg hidden-xl"></div>

												
											</div><br><br>
									</header>
									<div class="panel-body">
									<?php
										if ($data['jenis_permohonan']=='Baru') {
									?>
									<div class="col-md-6">
											<div class="">
											
											<u>Sebelum Perubahan Data:</u>
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['NAMA_LGKP'];?></h5>
											<h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['NIK'];?></h5>
											<h5>NO.KK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['NO_KK'];?></h5>
											<h5>Tempat,Tanggal Lahir &nbsp;&nbsp;: <?php echo $data['TMPT_LHR'];?>,<?php echo $data['TGL_LHR'];?></h5>
											<h5>Jenis Kelamin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['jenis_kelamin'];?></h5>
											<h5>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['ALAMAT'];?> RT.<?php echo $data['NO_RT'];?>/RW.<?php echo $data['NO_RW'];?>,Gari, Wonosari, DIY</h5>
											<h5>Agama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['nama_agama'];?></h5>
											<h5>Status Perkawinan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['status_perkawinan'];?></h5>
											<h5>Pekerjaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['pekerjaan'];?></h5>
											<h5>Pendidikan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['pendidikan'];?></h5>
											<h5>Golongan Darah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['nama_golongan'];?></h5>
											<h5>Akta Kelahiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['akte_kelahiran'];?></h5>
											<h5>Kelainan Fisik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['kelainan_fisik'];?></h5>
											
											</div>
									</div>
									
									
									<?php
									$query1="select *
								   from suket_ektp,biodata_wni,data_keluarga,jenis_kelamin,
								   agama,status_perkawinan,pekerjaan,pendidikan_terakhir,golongan_darah,kelainan_fisik,akte_kelahiran
								   where suket_ektp.NIK=biodata_wni.NIK
								   and data_keluarga.NO_KK=biodata_wni.NO_KK
								   and biodata_wni.JENIS_KLMIN=jenis_kelamin.JENIS_KLMIN
								   and biodata_wni.AGAMA=agama.AGAMA
								   and biodata_wni.PDDK_AKH=pendidikan_terakhir.PDDK_AKH
								   and biodata_wni.STAT_KWN=status_perkawinan.STAT_KWN
								   and biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN
								   and biodata_wni.GOL_DRH=golongan_darah.GOL_DRH
								   and biodata_wni.KLAIN_FSK=kelainan_fisik.KLAIN_FSK
								   and biodata_wni.AKTA_LHR=akte_kelahiran.AKTA_LHR
								   and suket_ektp.bc='1' and suket_ektp.id_ektp='$_GET[id]'";
									$results1 = mysqli_query($connect,$query1) or die("Error: ".mysqli_error($connect));
									$data1 = mysqli_fetch_array($results1);	
																	
									?>
									<div class="col-md-6">
											<div class="">
											
											<u>Sesudah Perubahan Data:</u>
											<?php
											if ($data1['nama_lengkap']=='') {?>
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['NAMA_LGKP'];?></h5>
											<?php
											}else {
											?>
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['nama_lengkap'];?></h5>
											<?php
											}	
											?>
											
											<h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['NIK'];?></h5>
											<h5>NO.KK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['NO_KK'];?></h5>
											
											<?php
											if ($data1['tempat_lahir']=='' && $data1['tanggal_lahir']=='') {?>
											<h5>Tempat,Tanggal Lahir &nbsp;&nbsp;: <?php echo $data['TMPT_LHR'];?>,<?php echo $data['TGL_LHR'];?></h5>
											<?php
											}
											if ($data1['tempat_lahir']!= '' && $data1['tanggal_lahir']!='') {
											?>
											<h5>Tempat,Tanggal Lahir &nbsp;&nbsp;: <?php echo $data['tempat_lahir'];?>,<?php echo $data['tanggal_lahir'];?></h5>
											<?php
											}
											if ($data1['tempat_lahir']!= '' && $data1['tanggal_lahir']=='') {
											?>
											<h5>Tempat,Tanggal Lahir &nbsp;&nbsp;: <?php echo $data['TMPT_LHR'];?>,<?php echo $data['tanggal_lahir'];?></h5>
											<?php
											}
											if ($data1['tempat_lahir'] == '' && $data1['tanggal_lahir']!='') {
											?>
											<h5>Tempat,Tanggal Lahir &nbsp;&nbsp;: <?php echo $data['tempat_lahir'];?>,<?php echo $data['TGL_LHR'];?></h5>
											<?php
											}	
											?>
											
											
											<h5>Jenis Kelamin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['jenis_kelamin'];?></h5>
											<?php
											if ($data1['almt']=='') {?>
											<h5>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['ALAMAT'];?> RT.<?php echo $data['NO_RT'];?>/RW.<?php echo $data['NO_RW'];?>,Gari, Wonosari, DIY</h5>
											<?php
											}
											if ($data1['almt']!= '') {
											?>
											<h5>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['almt'];?> RT.<?php echo $data['NO_RT'];?>/RW.<?php echo $data['NO_RW'];?>,Gari, Wonosari, DIY</h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['agm']==0) {?>
											<h5>Agama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['nama_agama'];?></h5>
											<?php
											} else {
										
											$u="select * from agama where AGAMA='$data1[agm]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Agama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $w['nama_agama'];?></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['status_kawin']==0) {?>
											<h5>Status Perkawinan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['status_perkawinan'];?></h5>
											<?php
											} else {
										
											$u="select * from status_perkawinan where STAT_KWN='$data1[status_kawin]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Status Perkawinan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $w['status_perkawinan'];?></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['krj']==0) {?>
											<h5>Pekerjaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['pekerjaan'];?></h5>
											<?php
											} else {
										
											$u="select * from pekerjaan where JENIS_PKRJN='$data1[krj]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Pekerjaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $w['pekerjaan'];?></b></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['pddk']==0) {?>
											<h5>Pendidikan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['pendidikan'];?></h5>
											<?php
											} else {
										
											$u="select * from pendidikan_terakhir where PDDK_AKH='$data1[pddk]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Pendidikan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $w['pendidikan'];?></b></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['gol_darah']==0) {?>
											<h5>Golongan Darah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['nama_golongan'];?></h5>
											<?php
											} else {
										
											$u="select * from golongan_darah where GOL_DRH='$data1[gol_darah]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Golongan Darah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $w['nama_golongan'];?></b></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['akta_klhrn']==0) {?>
											<h5>Akta Kelahiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['akte_kelahiran'];?></h5>
											<?php
											} else {
										
											$u="select * from akte_kelahiran where AKTA_LHR='$data1[akta_klhrn]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Akta Kelahiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $w['akte_kelahiran'];?></b></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['lain_fisik']==0) {?>
											<h5>Kelainan Fisik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['kelainan_fisik'];?></h5>
											<?php
											} else {
										
											$u="select * from kelainan_fisik where KLAIN_FSK='$data1[lain_fisik]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Kelainan Fisik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $w['kelainan_fisik'];?></b></h5>
											<?php
											}	
											?>
											
											
											</div>
									</div>
									<?php
										}
									?>
									
									<?php
										if ($data['jenis_permohonan']=='Pergantian') {
									?>
									<div class="col-md-6">
											<div class="">
											
											<u>Sebelum Perubahan Data:</u>
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['NAMA_LGKP'];?></h5>
											<h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['NIK'];?></h5>
											<h5>NO.KK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['NO_KK'];?></h5>
											<h5>Tempat,Tanggal Lahir &nbsp;&nbsp;: <?php echo $data['TMPT_LHR'];?>,<?php echo $data['TGL_LHR'];?></h5>
											<h5>Jenis Kelamin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['jenis_kelamin'];?></h5>
											<h5>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['ALAMAT'];?> RT.<?php echo $data['NO_RT'];?>/RW.<?php echo $data['NO_RW'];?>,Gari, Wonosari, DIY</h5>
											<h5>Agama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['nama_agama'];?></h5>
											<h5>Status Perkawinan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['status_perkawinan'];?></h5>
											<h5>Pekerjaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['pekerjaan'];?></h5>
											<h5>Pendidikan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['pendidikan'];?></h5>
											<h5>Golongan Darah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['nama_golongan'];?></h5>
											<h5>Akta Kelahiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['akte_kelahiran'];?></h5>
											<h5>Kelainan Fisik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['kelainan_fisik'];?></h5>
											
											</div>
									</div>
									
									
									<?php
									$query1="select *
								   from suket_ektp,biodata_wni,data_keluarga,jenis_kelamin,
								   agama,status_perkawinan,pekerjaan,pendidikan_terakhir,golongan_darah,kelainan_fisik,akte_kelahiran
								   where suket_ektp.NIK=biodata_wni.NIK
								   and data_keluarga.NO_KK=biodata_wni.NO_KK
								   and biodata_wni.JENIS_KLMIN=jenis_kelamin.JENIS_KLMIN
								   and biodata_wni.AGAMA=agama.AGAMA
								   and biodata_wni.PDDK_AKH=pendidikan_terakhir.PDDK_AKH
								   and biodata_wni.STAT_KWN=status_perkawinan.STAT_KWN
								   and biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN
								   and biodata_wni.GOL_DRH=golongan_darah.GOL_DRH
								   and biodata_wni.KLAIN_FSK=kelainan_fisik.KLAIN_FSK
								   and biodata_wni.AKTA_LHR=akte_kelahiran.AKTA_LHR
								   and suket_ektp.bc='1' and suket_ektp.id_ektp='$_GET[id]'";
									$results1 = mysqli_query($connect,$query1) or die("Error: ".mysqli_error($connect));
									$data1 = mysqli_fetch_array($results1);	
																	
									?>
									<div class="col-md-6">
											<div class="">
											
											<u>Sesudah Perubahan Data:</u>
											<?php
											if ($data1['nama_lengkap']=='') {?>
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['NAMA_LGKP'];?></h5>
											<?php
											}else {
											?>
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['nama_lengkap'];?></h5>
											<?php
											}	
											?>
											
											<h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['NIK'];?></h5>
											<h5>NO.KK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['NO_KK'];?></h5>
											
											<?php
											if ($data1['tempat_lahir']=='' && $data1['tanggal_lahir']=='') {?>
											<h5>Tempat,Tanggal Lahir &nbsp;&nbsp;: <?php echo $data['TMPT_LHR'];?>,<?php echo $data['TGL_LHR'];?></h5>
											<?php
											}
											if ($data1['tempat_lahir']!= '' && $data1['tanggal_lahir']!='') {
											?>
											<h5>Tempat,Tanggal Lahir &nbsp;&nbsp;: <?php echo $data['tempat_lahir'];?>,<?php echo $data['tanggal_lahir'];?></h5>
											<?php
											}
											if ($data1['tempat_lahir']!= '' && $data1['tanggal_lahir']=='') {
											?>
											<h5>Tempat,Tanggal Lahir &nbsp;&nbsp;: <?php echo $data['TMPT_LHR'];?>,<?php echo $data['tanggal_lahir'];?></h5>
											<?php
											}
											if ($data1['tempat_lahir'] == '' && $data1['tanggal_lahir']!='') {
											?>
											<h5>Tempat,Tanggal Lahir &nbsp;&nbsp;: <?php echo $data['tempat_lahir'];?>,<?php echo $data['TGL_LHR'];?></h5>
											<?php
											}	
											?>
											
											
											<h5>Jenis Kelamin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['jenis_kelamin'];?></h5>
											<?php
											if ($data1['almt']=='') {?>
											<h5>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['ALAMAT'];?> RT.<?php echo $data['NO_RT'];?>/RW.<?php echo $data['NO_RW'];?>,Gari, Wonosari, DIY</h5>
											<?php
											}
											if ($data1['almt']!= '') {
											?>
											<h5>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['almt'];?> RT.<?php echo $data['NO_RT'];?>/RW.<?php echo $data['NO_RW'];?>,Gari, Wonosari, DIY</h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['agm']==0) {?>
											<h5>Agama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['nama_agama'];?></h5>
											<?php
											} else {
										
											$u="select * from agama where AGAMA='$data1[agm]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Agama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $w['nama_agama'];?></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['status_kawin']==0) {?>
											<h5>Status Perkawinan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['status_perkawinan'];?></h5>
											<?php
											} else {
										
											$u="select * from status_perkawinan where STAT_KWN='$data1[status_kawin]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Status Perkawinan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $w['status_perkawinan'];?></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['krj']==0) {?>
											<h5>Pekerjaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['pekerjaan'];?></h5>
											<?php
											} else {
										
											$u="select * from pekerjaan where JENIS_PKRJN='$data1[krj]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Pekerjaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $w['pekerjaan'];?></b></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['pddk']==0) {?>
											<h5>Pendidikan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['pendidikan'];?></h5>
											<?php
											} else {
										
											$u="select * from pendidikan_terakhir where PDDK_AKH='$data1[pddk]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Pendidikan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $w['pendidikan'];?></b></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['gol_darah']==0) {?>
											<h5>Golongan Darah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['nama_golongan'];?></h5>
											<?php
											} else {
										
											$u="select * from golongan_darah where GOL_DRH='$data1[gol_darah]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Golongan Darah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $w['nama_golongan'];?></b></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['akta_klhrn']==0) {?>
											<h5>Akta Kelahiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['akte_kelahiran'];?></h5>
											<?php
											} else {
										
											$u="select * from akte_kelahiran where AKTA_LHR='$data1[akta_klhrn]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Akta Kelahiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $w['akte_kelahiran'];?></b></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['lain_fisik']==0) {?>
											<h5>Kelainan Fisik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['kelainan_fisik'];?></h5>
											<?php
											} else {
										
											$u="select * from kelainan_fisik where KLAIN_FSK='$data1[lain_fisik]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Kelainan Fisik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $w['kelainan_fisik'];?></b></h5>
											<?php
											}	
											?>
											
											
											</div>
									</div>
									<?php
										}
									?>
									
									<?php
										if ($data['jenis_permohonan']=='Perubahan') {
									?>
									<div class="col-md-6">
											<div class="">
											
											<u>Sebelum Perubahan Data:</u>
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['NAMA_LGKP'];?></h5>
											<h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['NIK'];?></h5>
											<h5>NO.KK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['NO_KK'];?></h5>
											<h5>Tempat,Tanggal Lahir &nbsp;&nbsp;: <?php echo $data['TMPT_LHR'];?>,<?php echo $data['TGL_LHR'];?></h5>
											<h5>Jenis Kelamin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['jenis_kelamin'];?></h5>
											<h5>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['ALAMAT'];?> RT.<?php echo $data['NO_RT'];?>/RW.<?php echo $data['NO_RW'];?>,Gari, Wonosari, DIY</h5>
											<h5>Agama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['nama_agama'];?></h5>
											<h5>Status Perkawinan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['status_perkawinan'];?></h5>
											<h5>Pekerjaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['pekerjaan'];?></h5>
											<h5>Pendidikan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['pendidikan'];?></h5>
											<h5>Golongan Darah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['nama_golongan'];?></h5>
											<h5>Akta Kelahiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['akte_kelahiran'];?></h5>
											<h5>Kelainan Fisik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['kelainan_fisik'];?></h5>
											
											</div>
									</div>
									
									
									<?php
									$query1="select *
								   from suket_ektp,biodata_wni,data_keluarga,jenis_kelamin,
								   agama,status_perkawinan,pekerjaan,pendidikan_terakhir,golongan_darah,kelainan_fisik,akte_kelahiran
								   where suket_ektp.NIK=biodata_wni.NIK
								   and data_keluarga.NO_KK=biodata_wni.NO_KK
								   and biodata_wni.JENIS_KLMIN=jenis_kelamin.JENIS_KLMIN
								   and biodata_wni.AGAMA=agama.AGAMA
								   and biodata_wni.PDDK_AKH=pendidikan_terakhir.PDDK_AKH
								   and biodata_wni.STAT_KWN=status_perkawinan.STAT_KWN
								   and biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN
								   and biodata_wni.GOL_DRH=golongan_darah.GOL_DRH
								   and biodata_wni.KLAIN_FSK=kelainan_fisik.KLAIN_FSK
								   and biodata_wni.AKTA_LHR=akte_kelahiran.AKTA_LHR
								   and suket_ektp.bc='1' and suket_ektp.id_ektp='$_GET[id]'";
									$results1 = mysqli_query($connect,$query1) or die("Error: ".mysqli_error($connect));
									$data1 = mysqli_fetch_array($results1);	
																	
									?>
									<div class="col-md-6">
											<div class="">
											
											<u>Sesudah Perubahan Data:</u>
											<?php
											if ($data1['nama_lengkap']=='') {?>
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['NAMA_LGKP'];?></h5>
											<?php
											}else {
											?>
											<h5>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['nama_lengkap'];?></h5>
											<?php
											}	
											?>
											
											<h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['NIK'];?></h5>
											<h5>NO.KK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['NO_KK'];?></h5>
											
											<?php
											if ($data1['tempat_lahir']=='' && $data1['tanggal_lahir']=='') {?>
											<h5>Tempat,Tanggal Lahir &nbsp;&nbsp;: <?php echo $data['TMPT_LHR'];?>,<?php echo $data['TGL_LHR'];?></h5>
											<?php
											}
											if ($data1['tempat_lahir']!= '' && $data1['tanggal_lahir']!='') {
											?>
											<h5>Tempat,Tanggal Lahir &nbsp;&nbsp;: <?php echo $data['tempat_lahir'];?>,<?php echo $data['tanggal_lahir'];?></h5>
											<?php
											}
											if ($data1['tempat_lahir']!= '' && $data1['tanggal_lahir']=='') {
											?>
											<h5>Tempat,Tanggal Lahir &nbsp;&nbsp;: <?php echo $data['TMPT_LHR'];?>,<?php echo $data['tanggal_lahir'];?></h5>
											<?php
											}
											if ($data1['tempat_lahir'] == '' && $data1['tanggal_lahir']!='') {
											?>
											<h5>Tempat,Tanggal Lahir &nbsp;&nbsp;: <?php echo $data['tempat_lahir'];?>,<?php echo $data['TGL_LHR'];?></h5>
											<?php
											}	
											?>
											
											
											<h5>Jenis Kelamin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['jenis_kelamin'];?></h5>
											<?php
											if ($data1['almt']=='') {?>
											<h5>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['ALAMAT'];?> RT.<?php echo $data['NO_RT'];?>/RW.<?php echo $data['NO_RW'];?>,Gari, Wonosari, DIY</h5>
											<?php
											}
											if ($data1['almt']!= '') {
											?>
											<h5>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['almt'];?> RT.<?php echo $data['NO_RT'];?>/RW.<?php echo $data['NO_RW'];?>,Gari, Wonosari, DIY</h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['agm']==0) {?>
											<h5>Agama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['nama_agama'];?></h5>
											<?php
											} else {
										
											$u="select * from agama where AGAMA='$data1[agm]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Agama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $w['nama_agama'];?></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['status_kawin']==0) {?>
											<h5>Status Perkawinan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['status_perkawinan'];?></h5>
											<?php
											} else {
										
											$u="select * from status_perkawinan where STAT_KWN='$data1[status_kawin]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Status Perkawinan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $w['status_perkawinan'];?></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['krj']==0) {?>
											<h5>Pekerjaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['pekerjaan'];?></h5>
											<?php
											} else {
										
											$u="select * from pekerjaan where JENIS_PKRJN='$data1[krj]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Pekerjaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $w['pekerjaan'];?></b></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['pddk']==0) {?>
											<h5>Pendidikan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['pendidikan'];?></h5>
											<?php
											} else {
										
											$u="select * from pendidikan_terakhir where PDDK_AKH='$data1[pddk]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Pendidikan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $w['pendidikan'];?></b></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['gol_darah']==0) {?>
											<h5>Golongan Darah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['nama_golongan'];?></h5>
											<?php
											} else {
										
											$u="select * from golongan_darah where GOL_DRH='$data1[gol_darah]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Golongan Darah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $w['nama_golongan'];?></b></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['akta_klhrn']==0) {?>
											<h5>Akta Kelahiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['akte_kelahiran'];?></h5>
											<?php
											} else {
										
											$u="select * from akte_kelahiran where AKTA_LHR='$data1[akta_klhrn]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Akta Kelahiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $w['akte_kelahiran'];?></b></h5>
											<?php
											}	
											?>
											
											<?php
											if ($data1['lain_fisik']==0) {?>
											<h5>Kelainan Fisik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data1['kelainan_fisik'];?></h5>
											<?php
											} else {
										
											$u="select * from kelainan_fisik where KLAIN_FSK='$data1[lain_fisik]'";
											$v = mysqli_query($connect,$u) or die("Error: ".mysqli_error($connect));
											$w = mysqli_fetch_array($v);	
											?>
											<h5 style="color:red">Kelainan Fisik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $w['kelainan_fisik'];?></b></h5>
											<?php
											}	
											?>
											
											
											</div>
									</div>
									<?php
										}
									?>
											
										
											
											
											
											
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