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
						
										<h2 class="panel-title">Form Input Pegawai</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" action="tambah_pegawai.php"  method="POST" enctype="multipart/form-data">
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">NIP</label>
												<div class="col-md-6">
													<input type="text" class="form-control" required="required" onkeyup="angka(this);" name="nik" id="nik" placeholder="Silahkan masukkan data NIP">
												</div>
											</div>
										<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Username</label>
												<div class="col-md-6">
													<select class="form-control" name="username" id="username">
													<option>--Username--</option>
													<?php
														$brg="SELECT * FROM admin ";
														$g = mysqli_query($connect,$brg) or die("Error: ".mysqli_error($connect));
														while($l=mysqli_fetch_array($g)){
															echo "<option value=\"$l[username]\">$l[username]</option>\n";
														}
													?>
												</select>
												</div>
											</div>
											
												<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Nama Pegawai</label>
												<div class="col-md-6">
													<input type="text" required="required" onkeyup="huruf(this);" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Silahkan masukkan data Nama Pegawai">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Tempat Lahir</label>
												<div class="col-md-6">
													<input type="text" required="required" onkeyup="huruf(this);" class="form-control" name="tempat" id="tempat" placeholder="Silahkan masukkan data Tempat Lahir">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir</label>
												<div class="col-md-6">
													<input type="date" required="required" class="form-control" name="tanggal" id="tanggal">
												</div>
											</div>
												<div class="form-group">
												<label class="col-md-3 control-label" for="inputSuccess">Jabatan</label>
												<div class="col-md-6">
													<select class="form-control mb-md" name="jabatan">
														<option value="kades">Kepala Kalurahan</option>
														<option value="sekda">Sekertaris Kalurahan</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputSuccess">Alamat</label>
												<div class="col-md-6">
													<textarea class="form-control" required="required" name="alamat" id="alamat" placeholder="Silahkan masukkan data Alamat"></textarea>
												
												</div>
											</div>
													
												
											<div class="">
												<label class="col-md-3 control-label" for="inputDefault">Jenis Kelamin</label>
												<div class="col-md-9">
												
												 <div class="radio">
                                                    <label>
                                                        <input type="radio" value="L" id="jenis_kelamin" name="jenis_kelamin"> Laki-Laki
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" value="P" id="jenis_kelamin" name="jenis_kelamin"> Perempuan
                                                    </label>
                                                </div>
												
												
												</div><br><br><br>
											
											
											</div>
											
													<button class="btn btn-primary">Simpan </button>
												
												</div>
											</div>
						
										</form>
										 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var nik = $("#nik").val();
                $.ajax({
                    url: 'proses-ajax.php',
                    data:"nik="+nik ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#username').val(obj.username);
                    $('#password').val(obj.password);
                });
            }
        </script>
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