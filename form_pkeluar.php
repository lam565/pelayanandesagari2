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

				<?php	
				$sql1 ="SELECT * FROM warga where warga.nik='$_SESSION[username]'";
				$results1 = mysqli_query($connect,$sql1) or die("Error: ".mysqli_error($connect));
				$r1 = mysqli_fetch_array($results1);
				?>	
				<div id="userbox" class="userbox">
					<a href="#" data-toggle="dropdown">
						<figure class="profile-picture">
							<img src="assets/images/f.png" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
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

								<a role="menuitem" tabindex="-1" href="profil2.php"><i class="fa fa-child"></i> Profil</a>
							</li>
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
						<center><h4 style="color:white">Padukuhan <?php echo $_SESSION['username'];?></h4><center><hr>
						</div>
						
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div><br>
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
									<h2 class="panel-title">Form Pindah Keluar</h2>
								</header>
								<div class="panel-body">
									<form class="form-horizontal form-bordered" action="simpan_pindah.php" method="POST" enctype="multipart/form-data">
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
													<h2 class="panel-title">Pemohon :</h2>
												</header>
												<div class="panel-body">
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">NIK Pemohon</label>
														<div class="col-md-6">
															<input type="text" required="required" placeholder="NIK Pemohon" class="form-control" name="nik_pemohon" id="nik_pemohon" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Nama Pemohon</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Nama Pemohon" required="required" name="nama_pemohon" id="nama_pemohon" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">NO Telp</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Nomor Telpon" required="required" name="no_telp_pemohon" id="no_telp_pemohon" value="">
														</div>
													</div>
												</div>
											</section>
										</div>

										<div class="col-md-12">
											<section class="panel">
												<header class="panel-heading">
													<h2 class="panel-title">Informasi KK :</h2>
												</header>
												<div class="panel-body">
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">NO KK</label>
														<div class="col-md-6">
															<input type="text" required="required" placeholder="NO KK" class="form-control" name="no_kk" id="no_kk" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">NIK Kepala Keluarga</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="NIK Kepala Keluarga" required="required" name="nik_kk" id="nik_kk" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Nama Kepala Keluarga</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Nama Kepala Keluarga" required="required" name="nama_kep" id="nama_kep" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-6 control-label" for="inputDefault">Anggota Keluarga yang Ikut Pindah</label>
														<div class="col-md-3">
															<span id="tanggkk" class="btn btn-primary">   TAMPILKAN   </span>
														</div>
													</div>

													<div id="data_anggota">
														<table id="tb_anggota" class="table">
															<thead>
																<tr>
																	<th>NIK</th>
																	<th>NAMA</th>
																	<th>CHEK</th>
																</tr>
															</thead>
															<tbody>

															</tbody>

														</table>													
													</div>

												</div>
											</section>
										</div>

										<div class="col-md-12">
											<section class="panel">
												<header class="panel-heading">
													<h2 class="panel-title">PERPINDAHAN :</h2>
												</header>
												<div class="panel-body">
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Alasan Pindah</label>
														<div class="col-md-6">
															<select name="alasan" id="alasan" class="form-control">
																<option value="1">Pekerjaan</option>
																<option value="2">Pendidikan</option>
																<option value="3">Keamanan</option>
																<option value="4">Kesehatan</option>
																<option value="5">Keluarga</option>
																<option value="6">Lainnya</option>
															</select>
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Status KK Bagi yg Pindah</label>
														<div class="col-md-3">
															<select name="stat_pindah" class="form-control">
																<option value="1">Numpang KK</option>
																<option value="2">Membuat KK Baru</option>
																<option value="3">NO. KK Tetap</option>
															</select>
														</div>
														<label class="col-md-3 control-label" for="inputDefault">Status KK Bagi yg Tidak Pindah</label>
														<div class="col-md-3">
															<select name="tdk_pindah" class="form-control">
																<option value="1">Numpang KK</option>
																<option value="2">Membuat KK Baru</option>
																<option value="3">NO. KK Tetap</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">ALAMAT TUJUAN:</label>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Alamat</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Nama Jalan" required="required" name="alamat" id="alamat" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Dusun</label>
														<div class="col-md-3">
															<input type="text" class="form-control" placeholder="Dusun" required="required" name="dusun" id="dusun" value="">
														</div>
														<label class="col-md-2 control-label" for="inputDefault">RT/RW</label>
														<div class="col-md-2">
															<input type="text" class="form-control" placeholder="RT" required="required" name="RT" id="RT" value="">
														</div>
														<div class="col-md-2">
															<input type="text" class="form-control" placeholder="RW" required="required" name="RW" id="RW" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Propinsi</label>
														<div class="col-md-3">
															<select name="propinsi" id="propinsi" class="form-control">
																<option value="">Pilih</option>
																<?php
																$qprop=mysqli_query($connect,"SELECT * FROM provinsi ORDER BY nama");
																while ($dtprop=mysqli_fetch_array($qprop)){
																	echo "<option value=\"$dtprop[id_prov]\">$dtprop[nama]</option>";
																}
																?>
															</select>
														</div>
														<label class="col-md-3 control-label" for="inputDefault">Kabupaten</label>
														<div class="col-md-3">
															<select name="kabupaten" id="kabupaten" class="form-control">
																<option value="">Pilih</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Kecamatan</label>
														<div class="col-md-3">
															<select name="kecamatan" id="kecamatan" class="form-control">
																<option value="">Pilih</option>
															</select>
														</div>
														<label class="col-md-3 control-label" for="inputDefault">Kalurahan/Kelurahan</label>
														<div class="col-md-3">
															<select name="kelurahan" id="kelurahan" class="form-control">
																<option value="">Pilih</option>
															</select>
														</div>
													</div>												

													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Kode Pos</label>
														<div class="col-md-6">
															<input type="text" class="form-control" placeholder="Kode Pos" required="required" name="kode_pos" id="kode_pos" value="">
														</div>
													</div>

												</div>
											</section>
										</div>
										<div class="col-md-12">
											<section class="panel">
												<header class="panel-heading">
													<h2 class="panel-title">Kelengkapan Berkas :</h2>
												</header>
												<div class="panel-body">
													<div class="form-group">
														<label class="col-md-3 control-label" for="inputDefault">Berkas Terlampir: </label> 
														<p style="padding: 5px;" class="col-md-3">
															<input type="checkbox" name="berkas[]" id="ktp" value="ktp" data-parsley-mincheck="2" class="flat" /> KTP PEMOHON
														</p>
														<p style="padding: 5px;" class="col-md-3">
															<input type="checkbox" name="berkas[]" id="kk" value="kk" class="flat" /> KARTU KELUARGA
														</p>
													</div>

												</div>
											</section>
										</div>



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