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
    
    <!-- Custom styling plus plugins -->
    
<link rel="stylesheet" href="js2/jquery-ui.css" />
    <script src="js2/jquery-1.8.3.js"></script>
    <script src="js2/jquery-ui.js"></script>
  

	
	    <script>
/*autocomplete muncul setelah user mengetikan minimal2 karakter */
    $(function() { 
        $( "#nama").autocomplete({
         source: "data3.php", 
           minLength:1,
		   select:function(event,data){
			  
                    $('input[name=NIK]').val(data.item.NIK);
					$('input[name=jenis_kelamin]').val(data.item.jenis_kelamin);
					$('input[name=TGL_LHR]').val(data.item.TGL_LHR);
					 $('input[name=TMPT_LHR]').val(data.item.TMPT_LHR);
					 $('input[name=nama_agama]').val(data.item.nama_agama);
					$('input[name=pekerjaan]').val(data.item.pekerjaan);
					  $('input[name=ALAMAT]').val(data.item.ALAMAT);
					  $('input[name=NIK2]').val(data.item.NIK_AYAH);
					  $('input[name=nama2]').val(data.item.NAMA_LGKP_AYAH);
					  $('input[name=NIK3]').val(data.item.NIK_IBU);
					  $('input[name=nama3]').val(data.item.NAMA_LGKP_IBU);
					  $('input[name=TGL_LHR2]').val(data.item.TGL_LHR_AYAH);
					   $('input[name=pekerjaan2]').val(data.item.PEKERJAAN_AYAH);
					    $('input[name=ALAMAT2]').val(data.item.ALAMAT_AYAH);
						$('input[name=TGL_LHR3]').val(data.item.TGL_LHR_IBU);
					   $('input[name=pekerjaan3]').val(data.item.PEKERJAAN_IBU);
					    $('input[name=ALAMAT3]').val(data.item.ALAMAT_IBU);
                }
        });
    });
    </script>
	 <script>
/*autocomplete muncul setelah user mengetikan minimal2 karakter */
    $(function() { 
        $( "#nama1").autocomplete({
         source: "data5.php", 
           minLength:1,
		   select:function(event,data){
			  
                    $('input[name=NIK1]').val(data.item.NIK);
					$('input[name=TGL_LHR1]').val(data.item.TGL_LHR);
					$('input[name=pekerjaan1]').val(data.item.pekerjaan);
					  $('input[name=ALAMAT1]').val(data.item.ALAMAT);
                }
        });
    });
    </script>
	

	
	<script>
/*autocomplete muncul setelah user mengetikan minimal2 karakter */
    $(function() { 
        $( "#nama7").autocomplete({
         source: "data7.php", 
           minLength:1,
		   select:function(event,data){
			  
                    $('input[name=NIK7]').val(data.item.NIK);
					$('input[name=TGL_LHR7]').val(data.item.TGL_LHR);
					$('input[name=pekerjaan7]').val(data.item.pekerjaan);
					  $('input[name=ALAMAT7]').val(data.item.ALAMAT);
                }
        });
    });
    </script>
	<script>
/*autocomplete muncul setelah user mengetikan minimal2 karakter */
    $(function() { 
        $( "#nama8").autocomplete({
         source: "data8.php", 
           minLength:1,
		   select:function(event,data){
			  
                    $('input[name=NIK8]').val(data.item.NIK);
					$('input[name=TGL_LHR8]').val(data.item.TGL_LHR);
					$('input[name=pekerjaan8]').val(data.item.pekerjaan);
					  $('input[name=ALAMAT8]').val(data.item.ALAMAT);
                }
        });
    });
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

					<!-- start: page -->
						<div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Form Kematian</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" action="simpan_kematian.php" method="POST" enctype="multipart/form-data">
						
						<div class="">
                                           
                                            
 
												<div class="mb-md hidden-lg hidden-xl"></div>

									<?php
										include("connect.php"); //include config file 
										$sql="select * from kematian order by id_kematian DESC";
										$results = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));
										$data = mysqli_fetch_array($results);
										$kodeawal=substr($data['id_kematian'],8,3)+1;
										if($kodeawal<10){
											$kd='472.12/000'.$kodeawal.'/II/2020';
										}elseif($kodeawal > 9 && $kodeawal <=99){
											$kd='472.12/00'.$kodeawal.'/II/2020';
										}else{
											$kd='472.12/0'.$kodeawal.'/II/2020';
										}
									?>
												<div class="pull-right"><div class="col-lg-12">No.Surat
													<input type="text" required="required" name="no_surat" placeholder="No Surat" class="form-control" value="<?php echo $kd;?>">
												</div></div>
												
													<input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
											

												<div class="mb-md hidden-lg hidden-xl"></div>

												
											</div><br><br>
											<p>==============================================================================================================================================</p>
											
												
											
						
						<!-- col-md-6 -->
						<div class="col-md-6">
							
								<section class="panel">
									<header class="panel-heading">
										

										<h2 class="panel-title">Jenazah :</h2>

										
									</header>
									<div class="panel-body">
									<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Nama Jenazah</label>
												<div class="col-md-9">
													<input type="text" class="form-control" required="required" name="nama" id="nama" value="">
												</div>
											</div><br><br>
											<div class="">
									
									            <label class="col-md-3 control-label" for="inputDefault">NIK</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="NIK" id="NIK" value="">
												</div>
											</div><br><br>
											<div class="">
									
									            <label class="col-md-3 control-label" for="inputDefault">Jenis Kelamin</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="">
												</div>
											</div><br><br>
											<div class="">
											<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir</label>
												<div class="col-md-9">
													<input type="text" required="required" class="form-control" name="TGL_LHR" id="TGL_LHR" >
												</div>

											

												</div><br><br>
											
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Tempat Lahir</label>
												<div class="col-md-9">
													<input type="text" required="required" class="form-control" name="TMPT_LHR" id="TMPT_LHR" value="">
												</div><br><br>
												
											
											</div>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Agama</label>
												<div class="col-md-9">
													<input type="text" required="required" class="form-control" name="nama_agama" id="nama_agama" value="">
												</div><br><br>
												
											
											</div>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Pekerjaan</label>
												<div class="col-md-9">
													<input type="text" required="required" class="form-control" name="pekerjaan" id="pekerjaan" value="">
												</div><br><br>
												
											
											</div>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Alamat</label>
												<div class="col-md-9">
													<input type="text" required="required" class="form-control" name="ALAMAT" id="ALAMAT" value="">
												</div><br><br>
												
											
											</div>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Anak Ke</label>
												<div class="col-md-9">
													<input type="text" required="required" class="form-control" name="anak" id="anak" value="">
												</div><br><br>
												
											
											</div>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Tanggal Kematian</label>
												<div class="col-md-9">
													<input type="date" required="required" class="form-control" name="tanggal_kematian" id="tanggal_kematian" value="">
												</div><br><br><br>
												
											
											</div>
											<input type="hidden" name="hari" id="hari" value="">
											<script>
														document.getElementById("tanggal_kematian").addEventListener("change", myFunction);
														function myFunction() {
															var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
															var x = document.getElementById("tanggal_kematian").value;
															var date = new Date(x);
															var thisDay = date.getDay(),
															thisDay = myDays[thisDay];
															var y = document.getElementById("hari");
															y.value = thisDay;
														}
													</script>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Pukul</label>
												<div class="col-md-9">
													<input type="text" required="required" class="form-control" name="pukul" id="pukul" value="">
												</div><br><br>
												
											
											</div>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Sebab Kematian</label>
												<div class="col-md-9">
													
											<input type="checkbox" class="flat" name="sebab" value="Sakit Biasa/Tua"> Sakit Biasa/Tua<br>
                                             <input type="checkbox" class="flat" name="sebab" value="Wabah Penyakit"> Wabah Penyakit<br>
											
                                             <input type="checkbox" class="flat" name="sebab" value="Kecelakaan"> Kecelakaan<br>
											 <input type="checkbox" class="flat" name="sebab" value="Kriminalitas"> Kriminalitas<br>
											 <input type="checkbox" class="flat" name="sebab" value="Bunuh Diri"> Bunuh Diri<br>
											 <input type="checkbox" class="flat" name="sebab" value="Lainnya"> Lainnya<br>
											 
											 
												</div><br><br><br>
												
											
											</div>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Tempat Kematian</label>
												<div class="col-md-9">
													<input type="text" required="required" class="form-control" name="tempat" id="tempat" value="">
												</div><br><br><br><br><br><br>
												
											
											</div>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Yang Menerangkan</label>
												<div class="col-md-9">
													
											<input type="checkbox" class="flat" name="menerangkan" value="Dokter"> Dokter<br>
                                             <input type="checkbox" class="flat" name="menerangkan" value="Tenaga Kesehatan"> Tenaga Kesehatan<br>
											
                                             <input type="checkbox" class="flat" name="menerangkan" value="Kepolisian"> Kepolisian<br>
											 <input type="checkbox" class="flat" name="menerangkan" value="Lainnya"> Lainnya<br>
											 
											 
												</div><br><br><br>
												
											
											</div>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Hubungan dengan yang meninggal</label>
												<div class="col-md-9">
													<input type="text" required="required" class="form-control" name="hubungan" id="hubungan" value="">
												</div><br><br><br><br><br><br>
												
											
											</div>
											
												
											
											
											
									</div>
									
								</section>
							
						</div>
						<div class="col-md-6">
							
								<section class="panel">
									<header class="panel-heading">
										

										<h2 class="panel-title">Pelapor :</h2>

										
									</header>
									<div class="panel-body">
									<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Nama Lengkap</label>
												<div class="col-md-9">
													<input type="text" class="form-control" required="required" name="nama1" id="nama1" value="">
												</div>
											</div><br><br>
											<div class="">
									
									            <label class="col-md-3 control-label" for="inputDefault">NIK</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="NIK1" id="NIK1" value="">
												</div>
											</div><br><br>
											
											<div class="">
											<label class="col-md-3 control-label" for="inputDefault">No Dokumen Perjalanan</label>
												<div class="col-md-9">
													<input type="text" required="required" class="form-control" name="ndp" id="ndp" >
												</div>
												</div><br><br>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Nomor Kartu Keluarga</label>
												<div class="col-md-9">
													<input type="text" required="required" class="form-control" name="kk" id="kk" value="">
												</div><br><br>
											</div>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Kewarganegaraan</label>
												<div class="col-md-9">
													<input type="text" required="required" class="form-control" name="kewarganegaraan" id="kewarganegaraan" value="">
												</div><br><br>
											</div>
									</div>
									
								</section>
							
						</div>
						
											<p>==============================================================================================================================================</p>
											
											<div class="col-md-6">
							
								<section class="panel">
									<header class="panel-heading">
										

										<h2 class="panel-title">Ayah :</h2>

										
									</header>
									<div class="panel-body">
									<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Nama Lengkap</label>
												<div class="col-md-9">
													<input type="text" class="form-control" required="required" name="nama2" id="nama2" value="">
												</div>
											</div><br><br>
											<div class="">
									
									            <label class="col-md-3 control-label" for="inputDefault">NIK</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="NIK2" id="NIK2" value="">
												</div>
											</div><br><br>
											<div class="">
											<label class="col-md-3 control-label" for="inputDefault">Tempat Lahir</label>
												<div class="col-md-9">
													<input type="text"  class="form-control" name="tempat_lahir" id="tempat_lahir" >
												</div>
												</div><br><br>
											<div class="">
											<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir</label>
												<div class="col-md-9">
													<input type="text"  class="form-control" name="TGL_LHR2" id="TGL_LHR2" >
												</div>
												</div><br><br>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Kewarganegaraan</label>
												<div class="col-md-9">
													<input type="text"  class="form-control" name="kwrga" id="kwrga" value="">
												</div><br><br>
											</div>
											 
									</div>
									
								</section>
							
						</div>
						<div class="col-md-6">
							
								<section class="panel">
									<header class="panel-heading">
										

										<h2 class="panel-title">Ibu :</h2>

										
									</header>
									<div class="panel-body">
									<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Nama Lengkap</label>
												<div class="col-md-9">
													<input type="text" class="form-control" required="required" name="nama3" id="nama3" value="">
												</div>
											</div><br><br>
											<div class="">
									
									            <label class="col-md-3 control-label" for="inputDefault">NIK</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="NIK3" id="NIK3" value="">
												</div>
											</div><br><br>
											<div class="">
											<label class="col-md-3 control-label" for="inputDefault">Tempat Lahir</label>
												<div class="col-md-9">
													<input type="text"  class="form-control" name="tm" id="tm" >
												</div>
												</div><br><br>
											<div class="">
											<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir</label>
												<div class="col-md-9">
													<input type="text"  class="form-control" name="TGL_LHR3" id="TGL_LHR3" >
												</div>
												</div><br><br>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Kewarganegaraan</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="kwrg" id="kwrg" value="">
												</div><br><br>
											</div>
											
									</div>
									
								</section>
							
						</div>
						<p>==============================================================================================================================================</p>
											
											<div class="col-md-6">
							
								<section class="panel">
									<header class="panel-heading">
										

										<h2 class="panel-title">Saksi 1 :</h2>

										
									</header>
									<div class="panel-body">
									<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Nama Lengkap</label>
												<div class="col-md-9">
													<input type="text" class="form-control" required="required" name="nama7" id="nama7" value="">
												</div>
											</div><br><br>
											<div class="">
									
									            <label class="col-md-3 control-label" for="inputDefault">NIK</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="NIK7" id="NIK7" value="">
												</div>
											</div><br><br>
											
											<div class="">
											<label class="col-md-3 control-label" for="inputDefault">No KK</label>
												<div class="col-md-9">
													<input type="text" required="required" class="form-control" name="no_kks" id="no_kks" >
												</div>
												</div><br><br>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Kewarganegaraan</label>
												<div class="col-md-9">
													<input type="text" required="required" class="form-control" name="kwrs" id="kwrs" value="">
												</div><br><br>
											</div>
											
									</div>
									
								</section>
							
						</div>
						<div class="col-md-6">
							
								<section class="panel">
									<header class="panel-heading">
										

										<h2 class="panel-title">Saksi 2 :</h2>

										
									</header>
									<div class="panel-body">
									<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Nama Lengkap</label>
												<div class="col-md-9">
													<input type="text" class="form-control" required="required" name="nama8" id="nama8" value="">
												</div>
											</div><br><br>
											<div class="">
									
									            <label class="col-md-3 control-label" for="inputDefault">NIK</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="NIK8" id="NIK8" value="">
												</div>
											</div><br><br>
											
											<div class="">
											<label class="col-md-3 control-label" for="inputDefault">NO KK</label>
												<div class="col-md-9">
													<input type="text" required="required" class="form-control" name="TGL_LHR8" id="TGL_LHR8" >
												</div>
												</div><br><br>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Kewarganegaraan</label>
												<div class="col-md-9">
													<input type="text" required="required" class="form-control" name="pekerjaan8" id="pekerjaan8" value="">
												</div><br><br>
											</div>
											
									</div>
									
								</section>
							
						</div>
						<p>==============================================================================================================================================</p>
					
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