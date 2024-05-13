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
						
						<section class="panel">
							<header class="panel-heading">
								
						
								<h2 class="panel-title"><center>------Permohonan Surat Kelahiran------</center></h2>
								
							</header>
									  
							<div class="panel-body">
							
						
								<div class="table-responsive">
									<table class="table table-bordered table-striped table-condensed mb-none">
										<thead>
											<tr>
												<th><center>No Surat</center></th>
												<th><center>No KK</center></th>
												<th><center>Nama Bayi</center></th>
												<th><center>Nama Ibu</center></th>
												<th><center>Nama Pelapor</center></th>
												<th><center>Tanggal Lapor</center></th>
												<th><center>Menu</center></th>
												<th><center>Selesai</center></th>
												
											</tr>
										</thead>
										<tbody id="table1">
													<?php
						$qlahir=mysqli_query($connect,"SELECT * FROM kelahiran,detail_kelahiran WHERE kelahiran.id_kelahiran=detail_kelahiran.id_kelahiran ORDER BY kelahiran.id_kelahiran DESC");
					
						while($c=mysqli_fetch_array($qlahir)){
						?>
						<tr>
						<td><center><?php echo $c['id_kelahiran'];?></center></td>
						<td><center><?php echo $c['no_kk'];?></center></td>
						<td><center><?php echo $c['nama_anak'];?></center></td>
						<?php
						$qnm=mysqli_query($connect,"SELECT NAMA_LGKP FROM biodata_wni WHERE NIK='$c[nik_ibu]'");
						$rnm=mysqli_fetch_array($qnm);
						?>
						<td><center><?php echo $rnm['NAMA_LGKP'];?></center></td>
						<?php
						$qpel=mysqli_query($connect,"SELECT NAMA_LGKP FROM biodata_wni WHERE NIK='$c[nik_pelapor]'");
						$rpel=mysqli_fetch_array($qpel);
						?>
						<td><center><?php echo $rpel['NAMA_LGKP'];?></center></td>
						<td><center><?php echo $c['tanggal_lapor'];?></center></td>
						<td><center><a href="cetak_perm_kelahiran.php?id_kelahiran=<?php echo $c['id_kelahiran']; ?>" target="_blank">CETAK</a></center></td>
						<td><center>HAPUS</center></td>
						
						</tr>
						<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</section>
						
						
					
			</div>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			</div>
			<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			</div>
		
		<script type="text/javascript">
            $(document).ready(function (){
                $(".open_modal").click(function (e){
                    var m = $(this).attr("id");
                    $.ajax({
                        url: "tm.php",
                        type: "GET",
                        data : {id_kelahiran: m,},
                        success: function (ajaxData){
                            $("#myModal").html(ajaxData);
                            $("#myModal").modal('show',{backdrop: 'true'});
                        }
                    });
                });
            });
        </script>
		<script type="text/javascript">
            $(document).ready(function (){
                $(".open_modal1").click(function (e){
                    var m = $(this).attr("id");
                    $.ajax({
                        url: "tm1.php",
                        type: "GET",
                        data : {id_kelahiran: m,},
                        success: function (ajaxData){
                            $("#myModal1").html(ajaxData);
                            $("#myModal1").modal('show',{backdrop: 'true'});
                        }
                    });
                });
            });
        </script>
								</div>
							</div>
						</section>
						
						
					
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