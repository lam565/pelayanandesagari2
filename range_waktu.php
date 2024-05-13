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
		<script type="text/javascript" src="jquery.js"></script>
<!-- Bootstrap core CSS -->
    
    <!-- Custom styling plus plugins -->
    
    <script src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="js2/jquery-ui.css" />
    <script src="js2/jquery-1.8.3.js"></script>
    <script src="js2/jquery-ui.js"></script>
  
    <script>
/*autocomplete muncul setelah user mengetikan minimal2 karakter */
    $(function() { 
        $( "#nama").autocomplete({
         source: "data2.php", 
           minLength:1,
		   select:function(event,data){
					 $('input[name=nama]').val(data.item.NAMA_LGKP);
                    $('input[name=NIK]').val(data.item.NIK);
					$('input[name=NO_KK]').val(data.item.NO_KK);
					  $('input[name=ALAMAT]').val(data.item.ALAMAT);
                }
        });
    });
	
	
    </script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				
					<?php include "notif.php";?>
					
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
						<h2 class="panel-title"><span class="badge badge-pill badge-success">Alamat</span> Desa Gari, Wonosari, Gunung Kidul, 55851 </h2>
					
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
						
										<h2 class="panel-title">Rentang Waktu Permohonan</h2>
									</header>
									<div class="panel-body">
										 <div class="x_title">
                                    <h2 style="font-family:Georgia, 'Times New Roman', Times, serif; color:#FFFFFF"></h2>
									<div class="clearfix"></div>
									</div>
                                <div class="x_content">
					<form class="form-horizontal form-label-left"method="POST"  action="laporan.php">
            
   
<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Bulan
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
											<?php
											$sekarang=getdate();
											
											?>
<select class="form-control" name="bln" id="bln">
<?php
if ($sekarang["month"]=="January")
{
echo '<option value="1" selected>Januari</option>';
}else
{
echo '<option value="1">Januari</option>';
}

if ($sekarang["month"]=="February")
{
echo '<option value="2" selected>Februari</option>';
}else
{
echo '<option value="2">Februari</option>';
}

if ($sekarang["month"]=="March")
{
echo '<option value="3" selected>Maret</option>';
}else
{
echo '<option value="3">Maret</option>';
}

if ($sekarang["month"]=="April")
{
echo '<option value="4" selected>April</option>';
}else
{
echo '<option value="4">April</option>';
}

if ($sekarang["month"]=="May")
{
echo '<option value="5" selected>Mei</option>';
}else
{
echo '<option value="5">Mei</option>';
}

if ($sekarang["month"]=="June")
{
echo '<option value="6" selected>Juni</option>';
}else
{
echo '<option value="6">Juni</option>';
}

if ($sekarang["month"]=="July")
{
echo '<option value="7" selected>Juli</option>';
}else
{
echo '<option value="7">Juli</option>';
}

if ($sekarang["month"]=="August")
{
echo '<option value="8" selected>Agustus</option>';
}else
{
echo '<option value="8">Agustus</option>';
}

if ($sekarang["month"]=="September")
{
echo '<option value="9" selected>September</option>';
}else
{
echo '<option value="9">September</option>';
}

if ($sekarang["month"]=="Oktober")
{
echo '<option value="10" selected>Oktober</option>';
}else
{
echo '<option value="10">Oktober</option>';
}

if ($sekarang["month"]=="November")
{
echo '<option value="11" selected>November</option>';
}else
{
echo '<option value="11">November</option>';
}

if ($sekarang["month"]=="Desember")
{
echo '<option value="12" selected>Desember</option>';
}else
{
echo '<option value="12">Desember</option>';
}
?>

</select>
</div>
</div>
								
 <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Inputkan Tahun
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="thn" class="form-control col-md-7 col-xs-12" name="thn" placeholder="Inputkan Tahun" value="<?php echo $sekarang['year']?>" required="required">
                                          
											</div>
                                        </div>
										
									
									<div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                
                                                <button id="send" type="submit" class="btn btn-success">Proses</button>
												<button type="button"  class="btn btn-success" onclick="self.history.back()">Batal</button></p>
                                            </div>
                    </div>
					
									 </form>
									 <div class="x_title">
                                    <h2 style="font-family:Georgia, 'Times New Roman', Times, serif; color:#FFFFFF"></h2>
                                   
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                       <form class="form-horizontal form-label-left"method="POST"  action="lap_tahunan.php">
              

								
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Inputkan Tahun
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="thn" class="form-control col-md-7 col-xs-12" name="thn" placeholder="Inputkan Tahun" value="<?php echo $sekarang['year']?>" required="required">
                                            
											</div>
                                        </div>
										
											             
      <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                
                                                <button id="send" type="submit" class="btn btn-success">Proses</button>
												<button type="button"  class="btn btn-success" onclick="self.history.back()">Batal</button></p>
                                            </div>
                    </div>
					
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
													
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

		
	</body>
</html>