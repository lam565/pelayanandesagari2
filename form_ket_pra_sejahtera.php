<?php 
include "connect.php"
?>
<?php
session_start();
?>
<!doctype html>
<html class="fixed">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
   $("#staf").change(function(){
    var staf = $("#staf").val();
    $.ajax({
        url: "ambiljabatan.php",
        data: "staf="+staf,
        cache: false,
        success: function(msg){
            $("#jb").html(msg);
        }
    });
  });
});

</script>
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

<link rel="stylesheet"
    href="js2/jquery-ui.css" />
    <script src="js2/jquery-1.8.3.js"></script>
    <script src="js2/jquery-ui.js"></script>
  
    <script>
/*autocomplete muncul setelah user mengetikan minimal2 karakter */
    $(function() { 
        $( "#nama").autocomplete({
         source: "data.php", 
           minLength:1,
		   select:function(event,data){
                    $('input[name=NIK]').val(data.item.NIK);
					 $('input[name=TMPT_LHR]').val(data.item.TMPT_LHR);
					 $('input[name=TGL_LHR]').val(data.item.TGL_LHR);
					
					  $('input[name=ALAMAT]').val(data.item.ALAMAT);
					  $('input[name=nama_agama]').val(data.item.nama_agama);
					  $('input[name=pendidikan]').val(data.item.pendidikan);
				
                }
        });
    });
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
			
				<?Php	
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
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li class="nav-active">
									<?php if ($_SESSION['username']=='gari'){?>
										<a href="gari.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
										<?php if ($_SESSION['username']=='tegalrejo'){?>
										<a href="tegalrejo.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
										<?php if ($_SESSION['username']=='jatirejo'){?>
										<a href="jatirejo.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
										<?php if ($_SESSION['username']=='ngelorejo'){?>
										<a href="ngelorejo.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
										<?php if ($_SESSION['username']=='ngijorejo'){?>
										<a href="ngijorejo.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
									</li>
									
									<li class="nav-parent" style="color:white">--------------------------Administrasi-------------------------
										
											<li>
												<a href="tb_surat.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Surat Pengantar
												</a>
											</li>
											<li>
												<a href="njop.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Surat Harga Tanah
												</a>
											</li>
											<li>
												<a href="tb_kelahiran.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Surat Kelahiran
												</a>
											</li>
											
											<li>
												<a href="tb_kematian.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Surat Kematian
												</a>
											</li>
											<li>
												<a href="tb_nikah.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Nikah
												</a>
											</li>
										
									</li>
									<li class="nav-parent" style="color:white">--------------------------Laporan-------------------------
										<a style="color:white">
											<i class="fa fa-archive" aria-hidden="true"></i>
											<span>Laporan</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a style="color:white" href="laporan_warga.php">
													 Laporan Warga
												</a>
											</li>
											<li>
												<a style="color:white" href="laporan_kelahiran.php">
													 Laporan Kelahiran
												</a>
											</li>
											<li>
												<a style="color:white" href="laporan_kematian.php">
													 Laporan Kematian
												</a>
											</li>
											<li>
												<a style="color:white" href="laporan_pindah.php">
													 Laporan Pindah Keluar
												</a>
											</li>
											
											<li>
												<a style="color:white" href="laporan_ktp.php">
													 Laporan Surat E-KTP
												</a>
											</li>
											<li>
												<a style="color:white" href="laporan_nikah.php">
													 Laporan Surat Nikah
												</a>
											</li>
										</ul>
									</li>
									
				
							<hr class="separator" />
				
							
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
						
										<h2 class="panel-title">Formulir Layanan: Surat Pengantar Jasaraharja</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" action="simpan_kps.php" method="POST" enctype="multipart/form-data">
					
						<div class="">

												<?php
										include("connect.php"); //include config file 
										$sql="select * from kps order by no_surat DESC";
										$results = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));
										$data = mysqli_fetch_array($results);
										$kodeawal=substr($data['no_surat'],5,4);
										$kodeawal=(int)$kodeawal+1;
										$kd='300/'.sprintf("%04d",$kodeawal).'/II/2020';
										
										
									?>
												<div class="pull-right"><div class="col-lg-12">No.Surat
													<input type="text" name="no_surat" value="<?php echo $kd;?>" class="form-control">
												</div></div>
													<input type="hidden" name="username"  value="<?php echo $_SESSION['username'];?>">
												
												<div class="mb-md hidden-lg hidden-xl"></div>

												
											</div><br><br>
											<p>==============================================================================================================================================</p>
											
												
											
						
						<!-- col-md-6 -->
						<div class="col-md-12">
							
								<section class="panel">
									
									<div class="panel-body">
									
											
											
												
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Nama</label>
												<div class="col-md-6">
													<input type="text" class="form-control" required="required" name="nama" id="nama" value="">
												</div>
											</div><br><br>
											<div class="">
									
									            <label class="col-md-3 control-label" for="inputDefault">NIK</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="NIK" id="NIK" value="">
												</div>
											</div><br><br>
											<div class="">
											<label class="col-md-3 control-label" for="inputDefault">Tempat & Tanggal Lahir</label>
												<div class="col-md-3">
													<input type="text" required="required" class="form-control" name="TMPT_LHR" id="TMPT_LHR" >
												</div>

												<div class="mb-md hidden-lg hidden-xl"></div>

												<div class="col-md-3">
													<input type="text" required="required" class="form-control" name="TGL_LHR" id="TGL_LHR" >
												</div>

												<div class="mb-md hidden-lg hidden-xl"></div>

												</div><br><br>
											
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Alamat</label>
												<div class="col-md-6">
													<input type="text" required="required" class="form-control" name="ALAMAT" id="ALAMAT" value="">
												</div><br><br>
												
											
											</div>
											
												
											
											
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Agama</label>
												
												 <div class="col-md-6">
													<input type="text" class="form-control" required="required" name="nama_agama" id="nama_agama" value="">
												</div><br><br>
											
											
											</div>
											<hr>
											
										
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Staf Pemerintah Kalurahan</label>
												<div class="col-md-6">
													<select class="form-control" name="staf" id="staf">
<option>--Staf Pemerintah Kalurahan--</option>
<?php
//mengambil nama-nama propinsi yang ada di database
$staf="SELECT * FROM staf,jabatan where staf.id_staf=jabatan.id_staf";
$results = mysqli_query($connect,$staf) or die("Error: ".mysqli_error($connect));
while($p=mysqli_fetch_array($results)){
echo "<option value=\"$p[id_staf]\">$p[nama_staf] ($p[nama_jabatan])</option>\n";
}
?>
</select>
												</div><br><br>
												
											
											</div>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Sebagai</label>
												<div class="col-md-6">
													<select class="form-control" name="jb" id="jb">
<option>--Pilih Jabatan--</option>
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
											
									</div>
									
								</section>
							
						</div>
						
									<center><button type="submit" name="submit" class="btn btn-primary">Eksport </button></center>		
										
											
												
										</div>
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
		
	</body>
</html>