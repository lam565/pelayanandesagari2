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


	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				
					<?php include "notif.php"?>
					
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
						
										<h2 class="panel-title">Formulir Layanan: Surat Pengantar KIA</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" action="simpan_kia.php" method="POST" enctype="multipart/form-data">
					
						<div class="">

												<?php
										include("connect.php"); //include config file 
										$sql="select * from kia order by no_surat DESC";
										$results = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));
										$data = mysqli_fetch_array($results);
										$kodeawal=substr($data['no_surat'],5,4);
										$kodeawal=(int)$kodeawal+1;
										$kd='460/'.sprintf("%04d",$kodeawal).'/II/2020';
										
										
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
												<label class="col-md-3 control-label" for="inputDefault">Nama Ayah</label>
												<div class="col-md-6">
													<input type="text" required="required" class="form-control" name="nama_ayah" id="nama_ayah" value="">
												</div><br><br>
												
											
											</div>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Nama ibu</label>
												<div class="col-md-6">
													<input type="text" required="required" class="form-control" name="nama_ibu" id="nama_ibu" value="">
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
		<script src="assets/vendor/jquery/jquery.js"></script>
	
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<link rel="stylesheet" href="js2/jquery-ui.css" />
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
					   $('input[name=nama_ayah]').val(data.item.NAMA_LGKP_AYAH);
					    $('input[name=nama_ibu]').val(data.item.NAMA_LGKP_IBU);
				
                }
        });
    });
    </script>
	</body>
</html>