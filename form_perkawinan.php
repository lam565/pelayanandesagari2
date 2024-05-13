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
									<h2 class="panel-title">Form Perkawinan</h2>
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
												<h2 class="panel-title">Keterangan Suami :</h2>
											</header>
											<div class="panel-body">
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NIK AYAH (Dari Suami)</label>
													<div class="col-md-6">
														<input type="text" required="required" placeholder="NIK AYAH (Dari Suami)" class="form-control" name="nik_ayahs" id="nik_ayahs" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NAMA AYAH (Dari Suami)</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="NAMA AYAH (Dari Suami)" required="required" name="nama_ayahs" id="nama_ayahs" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NIK IBU (Dari Suami)</label>
													<div class="col-md-6">
														<input type="text" required="required" placeholder="NIK IBU (Dari Suami)" class="form-control" name="nik_ibus" id="nik_ibus" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NAMA IBU (Dari Suami)</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="NAMA IBU (Dari Suami)" required="required" name="nama_ibus" id="nama_ibus" value="">
													</div>
												</div>
											</div>
										</section>
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Keterangan Istri :</h2>
											</header>
											<div class="panel-body">
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NIK AYAH (Dari Istri)</label>
													<div class="col-md-6">
														<input type="text" required="required" placeholder=">NIK AYAH (Dari Istri)" class="form-control" name="nik_ayahi" id="nik_ayahi" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NAMA AYAH (Dari Istri)</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="NAMA AYAH (Dari Istri)" required="required" name="nama_ayahi" id="nama_ayahi" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NIK IBU (Dari Istri)</label>
													<div class="col-md-6">
														<input type="text" required="required" placeholder="NIK IBU (Dari Istri)" class="form-control" name="nik_ibui" id="nik_ibui" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NAMA IBU (Dari Istri)</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="NAMA IBU (Dari Istri)" required="required" name="nama_ayahi" id="nama_ayahi" value="">
													</div>
												</div>
											</div>
										</section>
									</div>
									<!-- col-md-6 -->
									<div class="col-md-12">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title"></h2>
											</header>
											<div class="panel-body">
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">STATUS PERKAWINAN SEBELUM KAWIN</label>
													<div class="col-md-6">
														<input type="text" required="required" placeholder="STATUS PERKAWINAN SEBELUM KAWIN" class="form-control" name="status" id="status" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">PERKAWINAN YANG KE-</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="PERKAWINAN YANG KE-" required="required" name="prke" id="prke" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">ISTRI YANG KE- (Bagi yang poligami)</label>
													<div class="col-md-6">
														<input type="text" required="required" placeholder="ISTRI YANG KE- (Bagi yang poligami)" class="form-control" name="iske" id="iske" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">TANGGAL PEMBATALAN PERKAWINAN</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="TANGGAL PEMBATALAN PERKAWINAN" required="required" name="tgl" id="tgl" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">TANGGAL MELAPOR</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="TANGGAL MELAPOR" required="required" name="tgllpr" id="tgllpr" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">JAM PELAPORAN</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="JAM PELAPORAN" required="required" name="jm" id="jm" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">AGAMA</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="AGAMA" required="required" name="ag" id="ag" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">KEPERCAYAAN</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="KEPERCAYAAN" required="required" name="kpr" id="kpr" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NAMA ORGANISASI KEPERCAYAAN</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="NAMA ORGANISASI KEPERCAYAAN" required="required" name="nmkpr" id="nmkpr" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NAMA PENGADILAN</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="NAMA PENGADILAN" required="required" name="nmp" id="nmp" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NOMOR PENETAPAN PENGADILAN</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="NOMOR PENETAPAN PENGADILAN" required="required" name="no" id="no" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">TANGGAL PENETAPAN PENGADILAN</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="TANGGAL PENETAPAN PENGADILAN" required="required" name="tgl" id="tgl" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NAMA PEMULA AGAMA/KEPERCAYAAN</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="NAMA PEMULA AGAMA/KEPERCAYAAN" required="required" name="pemula" id="pemula" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NOMOR SURAT IZIN PERWAKILAN</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="NOMOR SURAT IZIN PERWAKILAN" required="required" name="iz" id="iz" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">NOMOR PASPORT</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="NOMOR PASPORT" required="required" name="ps" id="ps" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">PERJANJIAN PERKAWINAN DIBUAT OLEH NOTARIS</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="PERJANJIAN PERKAWINAN DIBUAT OLEH NOTARIS" required="required" name="prj" id="prj" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">TANGGAL AKTA NOTARIS</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="TANGGAL AKTA NOTARIS" required="required" name="tglakt" id="tglakt" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputDefault">JUMLAH ANAK</label>
													<div class="col-md-6">
														<input type="text" class="form-control" placeholder="JUMLAH ANAK" required="required" name="jml" id="jml" value="">
													</div>
												</div>
											</div>
										</section>
									</div>
									<!-- col-md-6 -->
								
									
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
            	$( "#nik_ibu" ).val("" + suggestion.nik_istri);
            	$( "#nama_ibu" ).val("" + suggestion.nama_istri);

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

            }
        });
        $( "#nik_saksiI" ).autocomplete({
            serviceUrl: "autocomplete/data.php",   // Kode php untuk prosesing data
            dataType: "JSON",           // Tipe data JSON
            onSelect: function (suggestion) {
            	$( "#nik_saksiI" ).val("" + suggestion.nik);
            	$( "#nama_saksiI" ).val("" + suggestion.nama);

            }
        });
        $( "#nik_saksiII" ).autocomplete({
            serviceUrl: "autocomplete/data.php",   // Kode php untuk prosesing data
            dataType: "JSON",           // Tipe data JSON
            onSelect: function (suggestion) {
            	$( "#nik_saksiII" ).val("" + suggestion.nik);
            	$( "#nama_saksiII" ).val("" + suggestion.nama);

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