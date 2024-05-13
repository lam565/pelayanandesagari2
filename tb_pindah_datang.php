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
			<div class="logo-container">
				<a class="logo">
					<img src="img/g.png" height="30" />
				</a>
				<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
					<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
				</div>
			</div>
			
			<!-- start: search & user box -->
			<div class="header-right">

				<?Php	
				$sql1 ="SELECT * FROM warga where warga.nik='$_SESSION[username]'";
				$results1 = mysqli_query($connect,$sql1) or die("Error: ".mysqli_error($connect));
				$r1 = mysqli_fetch_array($results1);
				?>	
				<div id="userbox" class="userbox">
					<a href="#" data-toggle="dropdown">
						<figure class="profile-picture">
							<img src="img/lg.png" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
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
								<a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
							</li>


						</ul>
					</div>
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
					<h2>Halaman Admin</h2>
					
					<div class="right-wrapper pull-right">
						<ol class="breadcrumbs">
							<li>
								<a href="index.html">
									<i class="fa fa-home"></i>
								</a>
							</li>
							<li><span>Dashboard </span></li>
						</ol>

						<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
					</div>
				</header>

				<section class="panel">
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>
						
						<h2 class="panel-title"><center>Tabel Pindah Keluar</center></h2>

					</header>

					<div class="panel-body">

						<a href="form_perm_pindah.php"><span class="btn btn-primary">BUAT</span></a>
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-condensed mb-none">
								<thead>
									<tr>
										<th><center>No Surat</center></th>
										<th><center>NIK Pemohon</center></th>
										<th><center>Nama Pemohon</center></th>
										<th><center>Jml. Angg. ikut</center></th>
										<th><center>Alamat Pindah</center></th>
										<th><center>Aksi</center></th>



									</tr>
								</thead>
								<tbody id="table1">
									<?php
									$a="select * from pindah_datang";
									$b=mysqli_query($connect,$a) or die ("error:".mysqli_error($connect));
									while($c=mysqli_fetch_array($b)){
										?>
										<tr>
											<td><center><?php echo $c['id_datang'];?></center></td>
											<td><center><?php echo $c['nik_pemohon'];?>
										</center></td>
										<td><center><?php echo $c['nama_pemohon'];?></center></td>
										<?php 
											$angg=explode(",", $c['nik_anggota']);
											$jangg=COUNT($angg);
										?>
										<td><center><?php echo $jangg; ?></center></td>
										<td><center><?php echo $c['alamat_tujuan'];?></center></td>

										<td><center><a href="cetak_perm_datang.php?id=<?php echo $c['id_datang']; ?>" target="_blank">CETAK</a></center></td>



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