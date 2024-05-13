<?php 
include "connect.php";
include "assets/fromawi.php";

?>
<?php
session_start();
?>
<!doctype html>
<html class="fixed">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<!-- Basic -->
	
	<title>Sistem adminitrasi online</title>
	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
	<meta name="author" content="JSOFT.net">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<style type="text/css">
		.autocomplete-suggestions {
			border: 1px solid #999;
			background: #FFF;
			overflow: auto;
		}
		.autocomplete-suggestion {
			padding: 2px 5px;
			white-space: nowrap;
			overflow: hidden;
		}
		.autocomplete-selected {
			background: #F0F0F0;
		}
		.autocomplete-suggestions strong {
			font-weight: normal;
			color: #3399FF;
		}
		.autocomplete-group {
			padding: 2px 5px;
		}
		.autocomplete-group strong {
			display: block;
			border-bottom: 1px solid #000;
		}
	</style>

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
	<script type="text/javascript" src="jquery.js"></script>
	<!-- Bootstrap core CSS -->

	<!-- Custom styling plus plugins -->

	<script src="js/jquery.min.js"></script>
	<script>
		
		function angka(e) {
			if (!/^[1-9]+(([\'\,\.\- ][0-9])?[0-9]*)*$/.test(e.value)) {
				e.value = e.value.substring(0,e.value.length-1);
				alert("harus angka");
			}
		}
		function huruf(f) {
			if (!/^[a-zA-Z ]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/.test(f.value)) {
				f.value = f.value.substring(0,f.value.length-1);
				alert("hanya boleh diisi huruf");
				return (false);
			}
		}



	</script>

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
								<li><span>Beranda </span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-lg-12">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>
									<h2 class="panel-title">Form Biodata Keluarga</h2>
								</header>
								<div class="panel-body">
									<form class="form-horizontal form-bordered" action="simpan_wni.php" method="POST" enctype="multipart/form-data">
										<div class="">
											<div class="pull-right">
												
											</div>
											<input type="hidden" name="username"  value="<?php echo $_SESSION['username'];?>">

											<div class="mb-md hidden-lg hidden-xl"></div>

										</div>




										<!-- col-md-6 -->
										<div class="col-md-12">
											<section class="panel">
												<header class="panel-heading">
													<h2 class="panel-title">DATA KEPALA KELUARGA :</h2>
												</header>
												<div class="panel-body">
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Nama Kepala Keluarga/<i>Name of Head Ofthe Family</i></label>
														<div class="col-md-6">
															<input type="text" required="required" placeholder="Nama Kepala Keluarga" class="form-control" name="nama_kepala" id="nama_kepala" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Alamat/<i>Address</i></label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Alamat" required="required" name="alamat" id="alamat" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Kode Pos/ <i>Post Code</i></label>
														<div class="col-md-6">
															<input type="text" required="required" placeholder="Kode Pos" class="form-control" name="kode_pos" id="kode_pos" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Telepon/ <i>Telephone Number</i>/<i>Handphone</i></label>
														<div class="col-md-6">
															<input type="text" required="required" placeholder="Telepon" class="form-control" name="tlp" id="tlp" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault"><i>Email</i></label>
														<div class="col-md-6">
															<input type="text" required="required" placeholder="Email" class="form-control" name="email" id="email" value="">
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-md-5 control-label" for="inputDefault">Kode Wilayah Diisi Oleh Petugas Kependudukan dan Pencatatan Sipil</label>
													</div>
													<header class="panel-heading">
													<h2 class="panel-title">DATA WILAYAH :</h2>
												</header>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Kode-Nama Provinsi/<i>Code Province</i></label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Kode-Nama Provinsi" required="required" name="prov" id="prov" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Kode-Nama Kabupaten/Kota/<i>Code-Regency-Municipality</i></label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Kode-Nama Kabupaten/Kota" required="required" name="kab" id="kab" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Kode-Nama Kecamatan/<i>Code-Sub District</i></label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Kode-Nama Kecamatan" required="required" name="kec" id="kec" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Kode-Nama Desa/<i>Code-Village</i></label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Kode-Nama Desa" required="required" name="desa" id="desa" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Nama Dusun/<i>Sub-Village</i></label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Nama Dusun" required="required" name="dsn" id="dsn" value="">
														</div>
													</div>
													
													<header class="panel-heading">
													<h2 class="panel-title">DATA ANGGOTA KELUARGA :</h2>
												</header>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Nama Lengkap</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Nama Lengkap" required="required" name="nm_lkp" id="nm_lkp" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Gelar</label>
														<div class="col-md-3">
															<input type="text" class="form-control" placeholder="Depan" required="required" name="glr_dpn" id="glr_dpn" value="">
														</div>
														<div class="col-md-3">
															<input type="text" class="form-control" placeholder="Belakang" required="required" name="glr_blkg" id="glr_blkg" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Nomor Paspor</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Nomor Paspor" required="required" name="paspor" id="paspor" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Tanggal Berakhir Paspor</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Tanggal Berakhir Paspor" required="required" name="tgl_paspor" id="tgl_paspor" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Jenis Kelamin</label>
														<div class="col-md-6">
														<p style="padding: 5px;" class="col-md-3">
															<input type="checkbox" name="jk[]" id="jk" value="L" data-parsley-mincheck="2" class="flat" /> Laki-laki
														</p>
														<p style="padding: 5px;" class="col-md-3">
															<input type="checkbox" name="jk[]" id="jk" value="P" class="flat" /> Perempuan
														</p>
															</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Tempat Tanggal Lahir</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Tempat Lahir" required="required" name="tm_lhr" id="tm_lhr" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault"></label>
														
														<div class="col-md-2">
															<input type="text" class="form-control" placeholder="Tgl" required="required" name="tgl" id="tgl" value="">
														</div>
														<div class="col-md-2">
															<input type="text" class="form-control" placeholder="Bln" required="required" name="bln" id="bln" value="">
														</div>
														<div class="col-md-2">
															<input type="text" class="form-control" placeholder="Thn" required="required" name="thn" id="thn" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Kewarganegaraan</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Kewarganegaraan" required="required" name="kwr" id="kwr" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">No SK Penetapan WNI</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="No SK Penetapan WNI" required="required" name="nosk" id="nosk" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Akta Lahir</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Akta Lahir" required="required" name="akta" id="akta" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Nomor Akta Kelahiran</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Nomor Akta Kelahiran" required="required" name="no_akta" id="no_akta" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Golongan Darah</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Golongan Darah" required="required" name="gld" id="gld" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Agama</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Agama" required="required" name="agama" id="agama" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Nama Organisasi Kepercayaan Terhadap Tuhan YME</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Nama Organisasi Kepercayaan Terhadap Tuhan YME" required="required" name="kp" id="kp" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Status Perkawinan</label>
														<div class="col-md-6">
														<p style="padding: 5px;" class="col-md-3">
															<input type="checkbox" name="status[]" id="status" value="Kawin" data-parsley-mincheck="2" class="flat" /> Kawin
														</p>
														<p style="padding: 5px;" class="col-md-3">
															<input type="checkbox" name="status[]" id="status" value="Belum Kawin" class="flat" /> Belum Kawin
														</p>
															</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Akta Perkawinan</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Akta Perkawinan" required="required" name="aktakwn" id="aktakwn" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Nomor Akta Perkawinan</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Nomor Akta Perkawinan" required="required" name="noaktakwn" id="noaktakwn" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Tanggal Perkawinan</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Tanggal Perkawinan" required="required" name="tglkwn" id="tglkwn" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Akta Cerai</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Akta Cerai" required="required" name="aktacerai" id="aktacerai" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Nomor Akta Cerai</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Nomor Akta Cerai" required="required" name="noaktacerai" id="noaktacerai" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Tanggal Perceraian</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Tanggal Perceraian" required="required" name="tglcerai" id="tglcerai" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Status Hubungan Dalam Keluarga</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Status Hubungan Dalam Keluarga" required="required" name="shdk" id="shdk" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Kelainan Fisik & Mental</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Kelainan Fisik & Mental" required="required" name="klfisik" id="klfisik" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Penyandang Cacat</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Penyandang Cacat" required="required" name="cct" id="cct" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Pendidikan Terakhir</label>
														<div class="col-md-6">
														<p style="padding: 5px;" class="col-md-3">
															<input type="radio" name="pddk[]" id="pddk" value="SD" data-parsley-mincheck="2" class="flat" /> SD
														</p>
														<p style="padding: 5px;" class="col-md-3">
															<input type="radio" name="pddk[]" id="pddk" value="SMP" class="flat" /> SMP
														</p>
														<p style="padding: 5px;" class="col-md-3">
															<input type="radio" name="pddk[]" id="pddk" value="SMA/SMK" class="flat" /> SMA/SMK
														</p>
														<p style="padding: 5px;" class="col-md-3">
															<input type="radio" name="pddk[]" id="pddk" value="S1" class="flat" /> S1
														</p>
														<p style="padding: 5px;" class="col-md-3">
															<input type="radio" name="pddk[]" id="pddk" value="S2" class="flat" /> S2
														</p>
														<p style="padding: 5px;" class="col-md-3">
															<input type="radio" name="pddk[]" id="pddk" value="S2" class="flat" /> S2
														</p>
														
															</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Jenis Pekerjaan</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Jenis Pekerjaan" required="required" name="jp" id="jp" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">NIK Ibu</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="NIK Ibu" required="required" name="nikibu" id="nikibu" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Nama Ibu</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Nama Ibu" required="required" name="nmibu" id="nmibu" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">NIK Ayah</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="NIK Ayah" required="required" name="nikayah" id="nikayah" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Nama Ayah</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Nama Ayah" required="required" name="nmayah" id="nmayah" value="">
														</div>
													</div>
													<br><hr>
										<center><button class="btn btn-primary">Simpan </button></center>

									</div>


								</form>

							</div>


						</div>
					</section>

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
<script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>
<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="assets/javascripts/theme.init.js"></script>
<script src="autocomplete/jquery.js"></script>
<script src="autocomplete/autocomplete.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
        // Selector input yang akan menampilkan autocomplete.
        $( "#nik_pemohon" ).autocomplete({
            serviceUrl: "autocomplete/data_keluarga.php",   // Kode php untuk prosesing data
            dataType: "JSON",           // Tipe data JSON
            onSelect: function (suggestion) {
            	$( "#nik_pemohon" ).val("" + suggestion.nik);
            	$( "#nama_pemohon" ).val("" + suggestion.nama);
            	$( "#no_kk" ).val("" + suggestion.no_kk);
            	$( "#nama_kep" ).val("" + suggestion.nama_kep);
            	$( "#nik_kk" ).val("" + suggestion.nik_kk);

            	var row="<tr><td>"+suggestion.nik+"</td><td>"+suggestion.nama+"</td><td><input type=\"checkbox\" name=\"anggota[]\" value=\""+suggestion.nik+"\" checked disabled></td></tr>";

            	$("#tb_anggota tbody").html(row);
            	$("#tanggkk").attr("disabled",false);

            }
        });
        
    })
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#tanggkk").click(function(){
			var no_kk = $('#no_kk').val();
			var nikp = $('#nik_pemohon').val();
			$.ajax({
				type: 'POST',
				url: "anggota_keluarga.php",
				data: {"no_kk" : no_kk,"nikp" : nikp},
				success: function(msg) {
					$('#tb_anggota').append(msg);
					$("#tanggkk").attr("disabled",true);
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#propinsi").change(function() {
			var idprop = $(this).val();
			if (idprop != ""){
				$.ajax({
					type:"post",
					url:"dcb/getkab.php",
					data: {"id_prop" : idprop},
					success: function(data){
						$("#kabupaten").html(data);
					}
				});
			}
		});
		$("#kabupaten").change(function() {
			var idkab = $(this).val();
			if (idkab != ""){
				$.ajax({
					type:"post",
					url:"dcb/getkec.php",
					data: {"id_kab" : idkab},
					success: function(data){
						$("#kecamatan").html(data);
					}
				});
			}
		});
		$("#kecamatan").change(function() {
			var idkec = $(this).val();
			if (idkec != ""){
				$.ajax({
					type:"post",
					url:"dcb/getkel.php",
					data: {"id_kec" : idkec},
					success: function(data){
						$("#kelurahan").html(data);
					}
				});
			}
		});

	});
</script>
</body>
</html>