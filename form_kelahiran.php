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
									<h2 class="panel-title">Form Kelahiran</h2>
								</header>
								<div class="panel-body">
									<form class="form-horizontal form-bordered" action="simpan_kelahiran.php" method="POST" enctype="multipart/form-data">
										<div class="">


											<?php
										include("connect.php"); //include config file 
										
										?>
										
										<input type="hidden" name="username"  value="<?php echo $_SESSION['username'];?>">

										<div class="mb-md hidden-lg hidden-xl"></div>

									</div><br><br>
									<p>==============================================================================================================================================</p>




									<!-- col-md-6 -->
									<div class="col-md-12">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">AYAH :</h2>
											</header>
											<div class="panel-body">
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NIK AYAH</label>
													<div class="col-md-6">
														<input type="text" required="required" placeholder="NIK Ayah" class="form-control" name="nik_ayah" id="nik_ayah" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Nama AYAH</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="Nama Ayah" required="required" name="nama_ayah" id="nama_ayah" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Tempat Lahir AYAH</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="Tempat Lahir AYAH" required="required" name="tl_ayah" id="tl_ayah" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir AYAH</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="Nama Ayah" required="required" name="tg_ayah" id="tg_ayah" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Kewarganegaraan</label>
													<div class="col-md-6">
														<input type="text" required="required" placeholder="Kewarganegaraan" class="form-control" name="kwr_ayah" id="kwr_ayah" value="">
													</div>
												</div>
											</div>
										</section>
									</div>
									<!-- col-md-6 -->
									<div class="col-md-12">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">IBU :</h2>
											</header>
											<div class="panel-body">
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NIK IBU</label>
													<div class="col-md-6">
														<input type="text" required="required" placeholder="NIK Ibu" class="form-control" name="nik_ibu" id="nik_ibu" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Nama IBU</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="Nama Ibu" required="required" name="nama_ibu" id="nama_ibu" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Tempat Lahir IBU</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="Tempat Lahir Ibu" required="required" name="tl_ibu" id="tl_ibu" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir IBU</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="Nama Ibu" required="required" name="tg_ibu" id="tg_ibu" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Kewarganegaraan</label>
													<div class="col-md-6">
														<input type="text" required="required" placeholder="Kewarganegaraan" class="form-control" name="kwr_ibu" id="kwr_ibu" value="">
													</div>
												</div>
											</div>
										</section>
									</div>
									<!-- col-md-6 -->
									<div class="col-md-12">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">BAYI :</h2>
											</header>
											<div class="panel-body">
												
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Tempat Dilahirkan</label>
													<div class="col-md-3">
														<select name="tmp_dilahirkan">
															<option value="1">Rumah Sakit/Rumah Bersalin</option>
															<option value="2">Puskesmas</option>
															<option value="3">Polindes</option>
															<option value="4">Rumah</option>
															<option value="5">Lainnya</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Tempat Kelahiran</label>
													<div class="col-md-6">
														<input type="text" required="required" placeholder="Tempat Lahir" class="form-control" name="tmp_lahir" id="tmp_lahir" value="">
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir</label>
													<div class="col-md-6">
														<input type="date" required="required"  class="form-control" name="tgl_lhr" id="tgl_lhr" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Hari Lahir</label>
													<div class="col-md-2">
														<input type="text" name="hari_lahir" id="hari_lahir" value="">
													</div>
													<script>
														document.getElementById("tgl_lhr").addEventListener("change", myFunction);
														function myFunction() {
															var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
															var x = document.getElementById("tgl_lhr").value;
															var date = new Date(x);
															var thisDay = date.getDay(),
															thisDay = myDays[thisDay];
															var y = document.getElementById("hari_lahir");
															y.value = thisDay;
														}
													</script>
													
													<label class="col-md-2 control-label" for="inputDefault">Jam Lahir</label>
													<div class="col-md-2">
														<input type="time" name="jam_lahir" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Penolong Kelahiran</label>
													<div class="col-md-3">
														<select name="penolong_kelahiran">
															<option value="1">Dokter</option>
															<option value="2">Bidan/Perawat</option>
															<option value="3">Dukun</option>
															<option value="4">Lainnya</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Jenis Kelahiran</label>
													<div class="col-md-3">
														<select name="jns_kelahiran" id="jns_kelahiran">
															<option value="1">Tunggal</option>
															<option value="2">Kembar 2</option>
															<option value="3">Kembar 3</option>
															<option value="4">Kembar 4</option>
															<option value="5">Lainnya</option>
														</select>
													</div>
													<div id="lainnya" style="display: none;">
														<div class="col-md-3">
															<input type="text" placeholder="Jumlah Bayi Minimal 5" class="form-control" id="jml_bayi" value="">
														</div>
														<span class="btn btn-primary" id="tjml_bayi">+</span>
													</div>
												</div>
												<hr>
												<h3 class="panel-title">Detail Bayi</h3>
												<hr>
												<div id="detail_bayi">
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Nama Bayi</label>
														<div class="col-md-6">
															<input type="text" required="required" placeholder="Nama Bayi" class="form-control" name="nama_bayi[]" id="nama_bayi" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Jenis Kelamin</label>
														<div class="col-md-3">
															<select name="jenis_kel[]" >
																<option value="1">Laki - laki</option>
																<option value="2">Perempuan</option>
															</select>
														</div>
														<label class="col-md-3 control-label" for="inputDefault">Anak Ke</label>
														<div class="col-md-3">
															<input type="text" class="form-control" placeholder="Anak Ke-" required="required" name="anak_ke[]" id="anak_ke" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Berat Bayi (Kg)</label>
														<div class="col-md-3">
															<input type="text" required="required" placeholder="Berat Bayi" class="form-control" name="brt_bayi[]" id="brt_bayi" value="">
														</div>
														<label class="col-md-3 control-label" for="inputDefault">Panjang Bayi (Cm)</label>
														<div class="col-md-3">
															<input type="text" required="required" placeholder="Panjang Bayi" class="form-control" name="pnj_bayi[]" id="pnj_bayi" value="">
														</div>
													</div>
													
												</div>
												<hr>
												
											</div>
										</section>
									</div>
									<div class="col-md-12">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Pelapor :</h2>
											</header>
											<div class="panel-body">
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NIK Pelapor</label>
													<div class="col-md-6">
														<input type="text" required="required" placeholder="NIK Pelapor" class="form-control" name="nik_pelapor" id="nik_pelapor" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Nama Pelapor</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="Nama Pelapor" required="required" name="nama_pelapor" id="nama_pelapor" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NO KK</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="Nomor KK" required="required" name="no_kk" id="no_kk" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Kewarganegaraan</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="Kewarganegaraan" required="required" name="kwr_pelapor" id="kwr_pelapor" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NO Dokumen Perjalanan</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="NO Dokumen Perjalanan" required="required" name="no_dokumen" id="no_dokumen" value="">
													</div>
												</div>
											</div>
										</section>
									</div>
									<div class="col-md-12">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Saksi I :</h2>
											</header>
											<div class="panel-body">
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NIK Saksi I</label>
													<div class="col-md-6">
														<input type="text" required="required" placeholder="NIK Saksi I" class="form-control" name="nik_saksiI" id="nik_saksiI" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Nama Saksi I</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="Nama Saksi I" required="required" name="nama_saksiI" id="nama_saksiI" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NO KK Saksi I</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="NO KK Saksi I" required="required" name="no_kksaksiI" id="no_kksaksiI" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Kewarganegaraan Saksi I </label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="Kewarganegaraan Saksi I" required="required" name="kwr_saksiI" id="kwr_saksiI" value="">
													</div>
												</div>
											</div>
										</section>
									</div>
									<div class="col-md-12">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Saksi II :</h2>
											</header>
											<div class="panel-body">
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NIK Saksi II</label>
													<div class="col-md-6">
														<input type="text" required="required" placeholder="NIK Saksi II" class="form-control" name="nik_saksiII" id="nik_saksiII" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Nama Saksi II</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="Nama Saksi II" required="required" name="nama_saksiII" id="nama_saksiII" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NO KK Saksi II</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="NO KK Saksi II" required="required" name="no_kksaksiII" id="no_kksaksiII" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">Kewarganegaraan Saksi II</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="Kewarganegaraan Saksi II" required="required" name="kwr_saksiII" id="kwr_saksiII" value="">
													</div>
												</div>
											</div>
										</section>
									</div>
									
									
									<div class="col-md-12">
										<label class="col-md-3 control-label" for="inputDefault">Penandatangan</label>
										<div class="col-md-6">
											<select class="form-control" name="ttd" id="ttd">
												<?php
//mengambil nama-nama propinsi yang ada di database
												$jb="SELECT * FROM jabatan ORDER BY nama_jabatan";
												$results1 = mysqli_query($connect,$jb) or die("Error: ".mysqli_error($connect));
												while($p1=mysqli_fetch_array($results1)){
													echo "<option value=\"$p1[id_jabatan]\">$p1[nama_jabatan]</option>\n";
												}
												?>
											</select>
										</div><br><br>


									</div>
									




									<p>==============================================================================================================================================</p>


									<center><input type="submit" class="btn btn-primary" value="Simpan"></center>

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
        $( "#nik_ayah" ).autocomplete({
            serviceUrl: "autocomplete/data_pasutri.php",   // Kode php untuk prosesing data
            dataType: "JSON",           // Tipe data JSON
            onSelect: function (suggestion) {
            	$( "#no_kk" ).val("" + suggestion.no_kk);
            	$( "#nik_ayah" ).val("" + suggestion.nik);
            	$( "#nama_ayah" ).val("" + suggestion.nama);
				$( "#tl_ayah" ).val("" + suggestion.tl_ayah);
				$( "#tg_ayah" ).val("" + suggestion.tg_ayah);
				$( "#kwr_ayah" ).val("" + suggestion.kwr_ayah);
            	$( "#nik_ibu" ).val("" + suggestion.nik_istri);
            	$( "#nama_ibu" ).val("" + suggestion.nama_istri);
				$( "#tl_ibu" ).val("" + suggestion.tl_ibu);
				$( "#tg_ibu" ).val("" + suggestion.tg_ibu);
				$( "#kwr_ibu" ).val("" + suggestion.kwr_ibu);

            }
        });
        $( "#nama_ayah" ).autocomplete({
            serviceUrl: "autocomplete/data_pasutri2.php",   // Kode php untuk prosesing data
            dataType: "JSON",           // Tipe data JSON
            onSelect: function (suggestion) {
            	$( "#no_kk" ).val("" + suggestion.no_kk);
            	$( "#nik_ayah" ).val("" + suggestion.nik);
            	$( "#nama_ayah" ).val("" + suggestion.nama);
            	$( "#nik_ibu" ).val("" + suggestion.nik_istri);
            	$( "#nama_ibu" ).val("" + suggestion.nama_istri);

            }
        });
        $( "#nik_pelapor" ).autocomplete({
            serviceUrl: "autocomplete/data.php",   // Kode php untuk prosesing data
            dataType: "JSON",           // Tipe data JSON
            onSelect: function (suggestion) {
            	$( "#nik_pelapor" ).val("" + suggestion.nik);
            	$( "#nama_pelapor" ).val("" + suggestion.nama);
				$( "#no_kk" ).val("" + suggestion.no_kk);
				$( "#kwr_pelapor" ).val("" + suggestion.kwr_pelapor);
				$( "#no_dokumen" ).val("" + suggestion.no_dokumen);

            }
        });
        $( "#nik_saksiI" ).autocomplete({
            serviceUrl: "autocomplete/data_skp.php",   // Kode php untuk prosesing data
            dataType: "JSON",           // Tipe data JSON
            onSelect: function (suggestion) {
            	$( "#nik_saksiI" ).val("" + suggestion.nik);
            	$( "#nama_saksiI" ).val("" + suggestion.nama);
				$( "#no_kksaksiI" ).val("" + suggestion.no_kksaksiI);
				$( "#kwr_saksiI" ).val("" + suggestion.kwr_saksiI);

            }
        });
        $( "#nik_saksiII" ).autocomplete({
            serviceUrl: "autocomplete/data_skk.php",   // Kode php untuk prosesing data
            dataType: "JSON",           // Tipe data JSON
            onSelect: function (suggestion) {
            	$( "#nik_saksiII" ).val("" + suggestion.nik);
            	$( "#nama_saksiII" ).val("" + suggestion.nama);
				$( "#no_kksaksiII" ).val("" + suggestion.no_kksaksiII);
				$( "#kwr_saksiII" ).val("" + suggestion.kwr_saksiII);

            }
        });
    })
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#jns_kelahiran").change(function(){
			var jns = $("#jns_kelahiran").val();
			$("#detail_bayi").html("");
			$("#lainnya").hide();
			if (jns==5){
				var lainnya = "";
				$("#lainnya").show();
			} else {
				$.ajax({
					type:"post",
					url:"fdetbayi.php",
					success: function(data){
						for (var i=1;i<=jns;i++){
							$("#detail_bayi").append("<h4> Bayi ke "+i+"</h4>"+data);
						}
					}
				});
			}
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#tjml_bayi").click(function(){
			var jns = $("#jml_bayi").val();
			$("#detail_bayi").html("");
			if (jns<5){
				$("#jml_bayi").val("5");
			} else {
				$.ajax({
					type:"post",
					url:"fdetbayi.php",
					success: function(data){
						for (var i=1;i<=jns;i++){
							$("#detail_bayi").append("<h4> Bayi ke "+i+"</h4>"+data);
						}
					}
				});
			}
		});
	});
</script>
</body>
</html>