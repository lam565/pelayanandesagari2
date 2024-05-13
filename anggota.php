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
				<div>
			
					
			
					
			
					<ul class="notifications">
					
					
			
					<span class="separator"></span>
			
					<?Php	
			$sql1 ="SELECT * FROM pegawai where pegawai.nip='$_SESSION[username]'";
			$results1 = mysqli_query($connect,$sql1) or die("Error: ".mysqli_error($connect));
			$r1 = mysqli_fetch_array($results1);
				?>
					<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="img/ngijorejo.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Ngijorejo
								<?php
								   $q3="select *
								   from suket_ektp,warga
								   where suket_ektp.nik=warga.nik
								   
								   and suket_ektp.username='ngijorejo'
								   and suket_ektp.bc='1'
								   ";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select *
								   from kematian,warga
								   where kematian.nik=warga.nik
								   
								   and kematian.username='ngijorejo'
								   and kematian.bc='1'
								   ";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select *
								   from kelahiran,kk
								   where kelahiran.no_kk=kk.no_kk
								   
								   and kelahiran.username='ngijorejo'
								   and kelahiran.bc='1'
								   ";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select *
								   from nikah,warga
								   where nikah.nik=warga.nik
								   
								   and nikah.username='ngijorejo'
								   and nikah.bc='1'
								   ";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$r=$row4+$row+$z1+$k1;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan E-KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="ektp_masuk.php?id=<?php echo $r['id_ektp']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_pembuatan"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="tb_kematian2.php?id=<?php echo $rr['id_kematian']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="tb_kelahiran2.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Nikah</a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="tb_nikah2.php?id=<?php echo $xx['id_nikah']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tanggal"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx['id_nikah']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="img/ngelorejo.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Ngelorejo
								<?php
								   $q3="select *
								   from suket_ektp,warga
								   where suket_ektp.nik=warga.nik
								   
								   and suket_ektp.username='ngelorejo'
								   and suket_ektp.bc='1'
								   ";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select *
								   from kematian,warga
								   where kematian.nik=warga.nik
								   
								   and kematian.username='ngelorejo'
								   and kematian.bc='1'
								   ";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select *
								   from kelahiran,kk
								   where kelahiran.no_kk=kk.no_kk
								   
								   and kelahiran.username='ngelorejo'
								   and kelahiran.bc='1'
								   ";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select *
								   from nikah,warga
								   where nikah.nik=warga.nik
								   
								   and nikah.username='ngelorejo'
								   and nikah.bc='1'
								   ";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$r=$row4+$row+$z1+$k1;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan E-KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="ektp_masuk.php?id=<?php echo $r['id_ektp']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_pembuatan"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="tb_kematian2.php?id=<?php echo $rr['id_kematian']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="tb_kelahiran2.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Nikah</a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="tb_nikah2.php?id=<?php echo $xx['id_nikah']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tanggal"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx['id_nikah']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="img/jatirejo.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Jatirejo
								<?php
								   $q3="select *
								   from suket_ektp,warga
								   where suket_ektp.nik=warga.nik
								   
								   and suket_ektp.username='jatirejo'
								   and suket_ektp.bc='1'
								   ";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select *
								   from kematian,warga
								   where kematian.nik=warga.nik
								   
								   and kematian.username='jatirejo'
								   and kematian.bc='1'
								   ";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select *
								   from kelahiran,kk
								   where kelahiran.no_kk=kk.no_kk
								   
								   and kelahiran.username='jatirejo'
								   and kelahiran.bc='1'
								   ";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select *
								   from nikah,warga
								   where nikah.nik=warga.nik
								   
								   and nikah.username='jatirejo'
								   and nikah.bc='1'
								   ";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$r=$row4+$row+$z1+$k1;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan E-KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="ektp_masuk.php?id=<?php echo $r['id_ektp']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_pembuatan"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="tb_kematian2.php?id=<?php echo $rr['id_kematian']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="tb_kelahiran2.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Nikah</a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="tb_nikah2.php?id=<?php echo $xx['id_nikah']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tanggal"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx['id_nikah']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="img/gari.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Gari
								<?php
								   $q3="select *
								   from suket_ektp,warga
								   where suket_ektp.nik=warga.nik
								   
								   and suket_ektp.username='gari'
								   and suket_ektp.bc='1'
								   ";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select *
								   from kematian,warga
								   where kematian.nik=warga.nik
								   
								   and kematian.username='gari'
								   and kematian.bc='1'
								   ";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select *
								   from kelahiran,kk
								   where kelahiran.no_kk=kk.no_kk
								   
								   and kelahiran.username='gari'
								   and kelahiran.bc='1'
								   ";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select *
								   from nikah,warga
								   where nikah.nik=warga.nik
								   
								   and nikah.username='gari'
								   and nikah.bc='1'
								   ";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$r=$row4+$row+$z1+$k1;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan E-KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="ektp_masuk.php?id=<?php echo $r['id_ektp']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_pembuatan"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="tb_kematian2.php?id=<?php echo $rr['id_kematian']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="tb_kelahiran2.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Nikah</a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="tb_nikah2.php?id=<?php echo $xx['id_nikah']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tanggal"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx['id_nikah']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="img/tegalrejo.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Tegalrejo
								<?php
								   $q3="select *
								   from suket_ektp,warga
								   where suket_ektp.nik=warga.nik
								   
								   and suket_ektp.username='tegalrejo'
								   and suket_ektp.bc='1'
								   ";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select *
								   from kematian,warga
								   where kematian.nik=warga.nik
								   
								   and kematian.username='tegalrejo'
								   and kematian.bc='1'
								   ";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select *
								   from kelahiran,kk
								   where kelahiran.no_kk=kk.no_kk
								   
								   and kelahiran.username='tegalrejo'
								   and kelahiran.bc='1'
								   ";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select *
								   from nikah,warga
								   where nikah.nik=warga.nik
								   
								   and nikah.username='tegalrejo'
								   and nikah.bc='1'
								   ";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$r=$row4+$row+$z1+$k1;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan E-KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="ektp_masuk.php?id=<?php echo $r['id_ektp']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_pembuatan"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="tb_kematian2.php?id=<?php echo $rr['id_kematian']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="tb_kelahiran2.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Nikah</a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="tb_nikah2.php?id=<?php echo $xx['id_nikah']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tanggal"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx['id_nikah']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="assets/images/f.png" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							
							</figure>
							
							<a href="logout.php" >
								&nbsp;Logout
								
								
							</a>
			
							
						</a>
			
						
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
						<h4 style="color:white">Selamat Datang SekDa</h4>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
					
					
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
								<li><span>Dashboard </span></li>
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
						
										<h2 class="panel-title">Anggota Keluarga</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" action="simpan_anggota.php" method="POST" enctype="multipart/form-data">
											<div class="">
												<div class="mb-md hidden-lg hidden-xl"></div>
												<div class="col-lg-4">
													<input type="text" name="no_kk"  class="form-control" value="<?php echo $_GET['kk'];?>">
												</div>
												<div class="col-lg-4">
													<input type="text" name="kepala_keluarga" id="kepala_keluarga" class="form-control" value="<?php echo $_GET['kepala'];?>">
												</div>
											
												
												
													

												<div class="mb-md hidden-lg hidden-xl"></div>

												
											</div><br><br>
											<p>==============================================================================================================================================</p>
											
												
											
						
						<!-- col-md-6 -->
						<div class="col-md-12">
							
								<section class="panel">
									
									<div class="panel-body">
									<div class="">
									                                           <label class="col-md-3 control-label" for="inputDefault">NIK Warga</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="nik" id="nik" placeholder="NIK Warga">
												</div>
 <div class="col-lg-2">
                                                      		
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1"><b>Cari</b> 
<span class="glyphicon glyphicon-search"></span></button>
                                            
                        					
											    </div>												
                                            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog" style="width:1200px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel1">Data Warga</h4>
                    </div>
                    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama Warga</th>
									<th>TTL</th>
                                    <th>Jenis Kelamin</th>
									
                                    <th>Pendidikan</th>
									<th>Agama</th>
                                    <th>Status Perkawinan</th>
									<th>Pekerjaan</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
							
                                <?php
								$query="SELECT * from warga";
								$results = mysqli_query($connect,$query) or die("Error: ".mysqli_error($connect));
                                while ($data = mysqli_fetch_array($results)) {										
                                ?>
								
                                    <tr class="pilih1" 
									data-nim13="<?php echo $data['ket']; ?>"
									data-nim12="<?php echo $data['id']; ?>"
									data-nim1="<?php echo $data['nik']; ?>"
									data-nim2="<?php echo $data['nama_warga']; ?>"
									data-nim3="<?php echo $data['tempat_lahir']; ?>"
									data-nim5="<?php echo $data['tanggal_lahir']; ?>"
									data-nim7="<?php echo $data['jenis_kelamin']; ?>"
									data-nim8="<?php echo $data['pendidikan']; ?>"
									data-nim9="<?php echo $data['agama']; ?>"
									data-nim10="<?php echo $data['status_perkawinan']; ?>"
									data-nim11="<?php echo $data['pekerjaan']; ?>">
                                        <td><?php echo $data['nik']; ?></td>
                                        <td><?php echo $data['nama_warga']; ?></td>
										<td><?php echo $data['tempat_lahir']; ?>,<?php echo $data['tanggal_lahir']; ?></td>
                                        <td><?php echo $data['jenis_kelamin']; ?></td>
										
										<td><?php echo $data['pendidikan']; ?></td>
										<td><?php echo $data['agama']; ?></td>
										<td><?php echo $data['status_perkawinan']; ?></td>
										<td><?php echo $data['pekerjaan']; ?></td>
										
										
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
     
          
        
        
        <script type="text/javascript">

//            jika dipilih, nim akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih1', function (f) {
				document.getElementById("ket").value = $(this).attr('data-nim13');
				document.getElementById("id").value = $(this).attr('data-nim12');
                document.getElementById("nik").value = $(this).attr('data-nim1');
				document.getElementById("nama").value = $(this).attr('data-nim2');
				document.getElementById("tempat").value = $(this).attr('data-nim3');
				document.getElementById("tanggal").value = $(this).attr('data-nim5');
				document.getElementById("jk").value = $(this).attr('data-nim7');
				document.getElementById("pendidikan").value = $(this).attr('data-nim8');
				document.getElementById("agama").value = $(this).attr('data-nim9');
				document.getElementById("status_perkawinan").value = $(this).attr('data-nim10');
				document.getElementById("pekerjaan").value = $(this).attr('data-nim11');
			
				

				
                $('#myModal1').modal('hide');
            });
			

//            tabel lookup mahasiswa
            $(function () {
                $("#lookup").dataTable();
            });
			
			</script>
										
												
											</div><br><br>
											<input type="hidden" class="form-control" name="id" id="id">
											<input type="hidden" class="form-control" name="ket" id="ket">
										
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Nama Warga</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Warga">
												</div>
											</div><br><br>
											
											<div class="">
											<label class="col-md-3 control-label" for="inputDefault">Tempat & Tanggal Lahir</label>
												<div class="col-md-3">
													<input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat Lahir">
												</div>

												<div class="mb-md hidden-lg hidden-xl"></div>

												<div class="col-md-3">
													<input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal Lahir">
												</div>

												<div class="mb-md hidden-lg hidden-xl"></div>

												</div><br><br>
												<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Jenis Kelamin</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="jk" id="jk" placeholder="Jenis Kelamin">
												</div>
											</div><br><br>
											
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Pendidikan</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Pendidikan">
												</div>
											</div><br><br>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Agama</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="agama" id="agama" placeholder="Agama">
												</div>
											</div><br><br>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Status Perkawinan</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="status_perkawinan" id="status_perkawinan" placeholder="Status Perkawinan">
												</div>
											</div><br><br>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Pekerjaan</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan">
												</div>
											</div><br><br>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Status Hubungan Keluarga</label>
												<div class="col-md-6">
													<input type="text" class="form-control" required="required" onkeyup="huruf(this);" name="shk" id="shk" placeholder="Status Hubungan Keluarga">
												</div>
											</div><br><br>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Kewarganegaraan</label>
												<div class="col-md-6">
													<input type="text" class="form-control" required="required" onkeyup="huruf(this);" name="wni" id="wni" placeholder="Kewarganegaraan">
												</div>
											</div><br><br>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">No Kitas</label>
												<div class="col-md-6">
													<input type="text" class="form-control" required="required"  name="kitas" id="kitas" placeholder="No Kitas">
												</div>
											</div><br><br>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">No Paspor</label>
												<div class="col-md-6">
													<input type="text" class="form-control" required="required"  name="paspor" id="paspor" placeholder="No Paspor">
												</div>
											</div><br><br>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Nama Ayah</label>
												<div class="col-md-6">
													<input type="text" class="form-control" required="required" onkeyup="huruf(this);" name="nm_ayah" id="nm_ayah" placeholder="Nama Ayah">
												</div>
											</div><br><br>
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Nama Ibu</label>
												<div class="col-md-6">
													<input type="text" class="form-control" required="required" onkeyup="huruf(this);" name="nm_ibu" id="nm_ibu" placeholder="Nama Ibu">
												</div>
											</div><br><br>
											
											
											
									</div>
									
								</section>
							
						</div>
						
											
										<div class="">
												<div class="col-md-9">
													<input type="hidden" class="form-control" name="nik_ibu" id="nik_ibu" placeholder="NIK Ibu" >
												</div>
											</div>
											<div class="">
												<div class="col-md-9">
													<input type="hidden" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu">
												</div>
											</div>
											
											<div class="">
												<div class="col-md-9">
													<input type="hidden" class="form-control" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" placeholder="Tanggal Lahir">
												</div>
											</div>
											<div class="">
												<div class="col-md-9">
													<input type="hidden" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Pekerjaan">
												</div>
											</div>
											
											<div class="">
												<div class="col-md-9">
													<input type="hidden" class="form-control" name="jl_ibu" id="jl_ibu" placeholder="Jalan/Gang/Dusun">
												</div>
												
											
											</div>
											<div class="">
											<label class="col-md-3 control-label" for="inputDefault"></label>
												<div class="col-md-3">
													<input type="hidden" class="form-control" name="rt_ibu" id="rt_ibu" placeholder="RT">
												</div>

												<div class="mb-md hidden-lg hidden-xl"></div>

												<div class="col-md-3">
													<input type="hidden" class="form-control" name="rw_ibu" id="rw_ibu" placeholder="RW">
												</div>

												<div class="mb-md hidden-lg hidden-xl"></div>

												</div>
												<div class="">
												<label class="col-md-3 control-label" for="inputDefault"></label>
												<div class="col-md-9">
													<input type="hidden" class="form-control" name="provinsi_ibu" id="provinsi_ibu" placeholder="Provinsi">
												</div>
												
											
											</div>
											
											<div class="">
												<div class="col-md-9">
													<input type="hidden" class="form-control" name="wn_ibu" id="wn_ibu" placeholder="Warga Negara">
												</div>
												
											
											</div>
											
												
										
					
											<p>==============================================================================================================================================</p>
											
											
											<center><button class="btn btn-primary">Simpan </button></center>
													
												</div>
											
						
										</form>
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
		<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="assets/vendor/flot/jquery.flot.js"></script>
		<script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
		<script src="assets/vendor/flot/jquery.flot.pie.js"></script>
		<script src="assets/vendor/flot/jquery.flot.categories.js"></script>
		<script src="assets/vendor/flot/jquery.flot.resize.js"></script>
		<script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="assets/vendor/raphael/raphael.js"></script>
		<script src="assets/vendor/morris/morris.js"></script>
		<script src="assets/vendor/gauge/gauge.js"></script>
		<script src="assets/vendor/snap-svg/snap.svg.js"></script>
		<script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="assets/vendor/jqvmap/jquery.vmap.js"></script>
		<script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
		<script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
		
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