<?php
include "connect.php";
include "assets/fromawi.php";
?>
<?php
session_start();
?>
<!doctype html>
<html class="fixed">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
				e.value = e.value.substring(0, e.value.length - 1);
				alert("harus angka");
			}
		}

		function huruf(f) {
			if (!/^[a-zA-Z ]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/.test(f.value)) {
				f.value = f.value.substring(0, f.value.length - 1);
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

			<?php include "notif.php" ?>

		</header>
		<!-- end: header -->

		<div class="inner-wrapper">
			<!-- start: sidebar -->
			<aside id="sidebar-left" class="sidebar-left">
				<?Php
				$sql1 = "SELECT nama_pegawai FROM pegawai where pegawai.username='$_SESSION[username]'";
				$results1 = mysqli_query($connect, $sql1) or die("Error: " . mysqli_error($connect));
				$r1 = mysqli_fetch_array($results1);
				?>
				<div class="sidebar-header">
					<div class="sidebar-title">
						<h4 style="color:white">Sistem Kependudukan</span></h4>
						<hr>
					</div>

					<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div><br>
				<figure class="profile-picture">
					<center><img src="img/lg.png" width="100" alt="Joseph Doe" data-lock-picture="assets/images/!logged-user.jpg" /></center>
				</figure>
				<center>
					<h4 style="color:white">Halaman <span class="role"><?php echo $_SESSION['username']; ?></h4>
				</center>
				<br>

				<div class="nano">
					<div class="nano-content">
						<?php include 'navigasi.php' ?>
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
								<h2 class="panel-title">Form Perubahan Element Data Kependudukan</h2>
							</header>
							<div class="panel-body">
								<form class="form-horizontal form-bordered" action="simpan_perubahan.php" method="POST" enctype="multipart/form-data">
									<div class="">
										<div class="pull-right">

										</div>
										<input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">

										<div class="mb-md hidden-lg hidden-xl"></div>

									</div>




									<!-- col-md-6 -->
									<div class="panel-body">
										<?php
										$qq = mysqli_query($connect, "SELECT * FROM biodata_wni,data_keluarga,status_hubungan 
						WHERE biodata_wni.NO_KK=data_keluarga.NO_KK and status_hubungan.STAT_HBKEL=biodata_wni.STAT_HBKEL 
						and data_keluarga.NO_KK='$_GET[no_kk]' and biodata_wni.NIK='$_GET[nik_pemohon]'");

										$cc = mysqli_fetch_array($qq);
										?>
										<div class="form-group">
											<label class="col-md-3 control-label" for="inputDefault">NIK Pemohon</label>
											<div class="col-md-6">
												<input type="text" required="required" placeholder="NIK Pemohon" class="form-control" name="nik_pemohon" id="nik_pemohon" value="<?php echo $cc['NIK']; ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="inputDefault">NO KK</label>
											<div class="col-md-6">
												<input type="text" required="required" placeholder="NO KK" class="form-control" name="no_kk" id="no_kk" value="<?php echo $cc['NO_KK']; ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="inputDefault">Nama Pemohon</label>
											<div class="col-md-6">
												<input type="text" class="form-control" placeholder="Nama Pemohon" required="required" name="nama_pemohon" id="nama_pemohon" value="<?php echo $cc['NAMA_LGKP']; ?>">
											</div>
										</div>

									</div>

									<div class="col-md-12">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Informasi KK :</h2>
											</header>
											<div class="panel-body">


												<div id="data_anggota">
													<table id="tb_anggota" class="table">
														<thead>
															<tr>

																<th>
																	<center>NIK</center>
																</th>
																<th>
																	<center>NAMA</center>
																</th>
																<th>
																	<center>SHDK</center>
																</th>

															</tr>
														</thead>
														<tbody>
															<?php
															$q = mysqli_query($connect, "SELECT * FROM biodata_wni,data_keluarga,status_hubungan 
						WHERE biodata_wni.NO_KK=data_keluarga.NO_KK and status_hubungan.STAT_HBKEL=biodata_wni.STAT_HBKEL 
						and data_keluarga.NO_KK='$_GET[no_kk]' ORDER BY biodata_wni.STAT_HBKEL ASC");

															while ($c = mysqli_fetch_array($q)) {
															?>
																<tr>
																	<td>
																		<center><?php echo $c['NIK']; ?></center>
																	</td>
																	<td>
																		<center><?php echo $c['NAMA_LGKP']; ?></center>
																	</td>
																	<td>
																		<center><?php echo $c['status_hubungan']; ?></center>
																	</td>
																</tr>
															<?php } ?>

														</tbody>

													</table>
												</div>

											</div>
										</section>
									</div>

									<div class="col-md-12">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Perubahan Element Data Kependudukan :</h2>
											</header>
											<div class="col-md-12">

												<div class="panel-body">
													<div class="form-group">
														<h4 class="panel-title">A. Pendidikan Terakhir & Pekerjaan</h4>
														<hr>
														<table id="tb_anggota" class="table">
															<thead>
																<tr>
																	<th>NIK</th>
																	<th>Nama</th>
																	<th>Pendidikan Terakhir (Semula)</th>
																	<th>Pendidikan Terakhir (Menjadi)</th>
																	<th>Dasar Perubahan</th>
																	<th>Pekerjaan (Semula)</th>
																	<th>Pekerjaan (Menjadi)</th>
																	<th>Dasar Perubahan</th>
																</tr>
															</thead>
															<tbody>
																<?php
																$qw = mysqli_query($connect, "SELECT * FROM biodata_wni,data_keluarga,pendidikan_terakhir,pekerjaan 
						WHERE biodata_wni.NO_KK=data_keluarga.NO_KK and biodata_wni.PDDK_AKH=pendidikan_terakhir.PDDK_AKH 
						and biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
						and data_keluarga.NO_KK='$_GET[no_kk]' ORDER BY biodata_wni.STAT_HBKEL ASC");

																while ($cw = mysqli_fetch_array($qw)) {
																?>
																	<tr>
																		<td>
																			<center><?php echo $cw['NIK']; ?></center>
																		</td>
																		<input type="hidden" name="orang[data][nik][]" value="<?php echo $cw['NIK']; ?>">
																		<td>
																			<center><?php echo $cw['NAMA_LGKP']; ?></center>
																		</td>
																		<td>
																			<center><?php echo $cw['pendidikan']; ?></center>
																		</td>
																		<input type="hidden" name="orang[data][pdd_akh][awal][]" value="<?php echo $cw['PDDK_AKH']; ?>">
																		<td>
																			<center><select name="orang[data][pdd_akh][ahir][]" class="form-control">
																					<option value="-">Pilih</option>
																					<?php
																					$pdd = mysqli_query($connect, "SELECT * FROM pendidikan_terakhir ORDER BY pendidikan");
																					while ($pddk = mysqli_fetch_array($pdd)) {
																						if ($cw['PDDK_AKH'] == $pddk['PDDK_AKH']) {
																							echo "<option value=\"$pddk[PDDK_AKH]\" selected>$pddk[pendidikan]</option>";
																						} else {
																							echo "<option value=\"$pddk[PDDK_AKH]\">$pddk[pendidikan]</option>";
																						}
																					}
																					?>
																				</select></center>
																		</td>
																		<td>
																			<center><select name="orang[data][pdd_akh][dasar][]" id="" class="form-control">
																					<option value="-">Pilih</option>
																					<option value="Surat Keterangan">Surat Keterangan</option>
																					<option value="Akta Kelahiran">Akta Kelahiran</option>
																					<option value="Akta Perkawinan">Akta Perkawinan</option>
																					<option value="Akta Perceraian">Akta Perceraian</option>
																					<option value="Akta Kematian">Akta Kematian</option>
																					<option value="Ijazah">Ijazah</option>

																				</select></center>
																		</td>
																		<td>
																			<center><?php echo $cw['pekerjaan']; ?></center>
																		</td>
																		<input type="hidden" name="orang[data][jns_pkrjn][awal][]" value="<?php echo $cw['JENIS_PKRJN']; ?>">
																		<td>
																			<center><select name="orang[data][jns_pkrjn][ahir][]" id="" class="form-control">
																					<option value="-">Pilih</option>
																					<?php
																					$pk = mysqli_query($connect, "SELECT * FROM pekerjaan ORDER BY pekerjaan");
																					while ($pkr = mysqli_fetch_array($pk)) {
																						if ($cw['JENIS_PKRJN'] == $pkr['JENIS_PKRJN']) {
																							echo "<option value=\"$pkr[JENIS_PKRJN]\" selected>$pkr[pekerjaan]</option>";
																						} else {
																							echo "<option value=\"$pkr[JENIS_PKRJN]\">$pkr[pekerjaan]</option>";
																						}
																					}
																					?>
																				</select></center>
																		</td>
																		<td>
																			<center><select name="orang[data][jns_pkrjn][dasar][]" id="" class="form-control">
																					<option value="-">Pilih</option>
																					<option value="Surat Keterangan">Surat Keterangan</option>
																					<option value="Akta Kelahiran">Akta Kelahiran</option>
																					<option value="Akta Perkawinan">Akta Perkawinan</option>
																					<option value="Akta Perceraian">Akta Perceraian</option>
																					<option value="Akta Kematian">Akta Kematian</option>
																					<option value="Ijazah">Ijazah</option>

																				</select></center>
																		</td>
																	</tr>
																<?php } ?>
															</tbody>

														</table> <br><br>

														<h4 class="panel-title">B. Agama & Golongan Darah</h4>
														<hr>
														<table id="tb_anggota" class="table">
															<thead>
																<tr>
																	<th>NIK</th>
																	<th>Nama</th>
																	<th>Agama (Semula)</th>
																	<th>Agama (Menjadi)</th>
																	<th>Dasar Perubahan</th>
																	<th>Golongan Darah (Semula)</th>
																	<th>Golongan Darah (Menjadi)</th>
																	<th>Dasar Perubahan</th>
																</tr>
															</thead>
															<tbody>
																<?php
																$qw = mysqli_query($connect, "SELECT * FROM biodata_wni,data_keluarga,agama, golongan_darah 
						WHERE biodata_wni.NO_KK=data_keluarga.NO_KK and biodata_wni.AGAMA=agama.AGAMA
						and	biodata_wni.GOL_DRH=golongan_darah.GOL_DRH					
						and data_keluarga.NO_KK='$_GET[no_kk]' ORDER BY biodata_wni.STAT_HBKEL ASC");

																while ($cw = mysqli_fetch_array($qw)) {
																?>
																	<tr>
																		<td>
																			<center><?php echo $cw['NIK']; ?></center>
																		</td>
																		<td>
																			<center><?php echo $cw['NAMA_LGKP']; ?></center>
																		</td>
																		<td>
																			<center><?php echo $cw['nama_agama']; ?></center>
																			<input type="hidden" name="orang[data][agama][awal][]" value="<?php echo $cw['AGAMA']; ?>">
																		</td>
																		<td>
																			<center><select name="orang[data][agama][ahir][]" id="" class="form-control">
																					<option value="-">Pilih</option>
																					<?php
																					$ag = mysqli_query($connect, "SELECT * FROM agama ORDER BY nama_agama");
																					while ($agm = mysqli_fetch_array($ag)) {
																						if ($cw['AGAMA'] == $agm['AGAMA']) {
																							echo "<option value=\"$agm[AGAMA]\" selected>$agm[nama_agama]</option>";
																						} else {
																							echo "<option value=\"$agm[AGAMA]\">$agm[nama_agama]</option>";
																						}
																					}
																					?>
																				</select></center>
																		</td>
																		<td>
																			<center><select name="orang[data][agama][dasar][]" id="" class="form-control">
																					<option value="-">Pilih</option>
																					<option value="Surat Keterangan">Surat Keterangan</option>
																					<option value="Akta Kelahiran">Akta Kelahiran</option>
																					<option value="Akta Perkawinan">Akta Perkawinan</option>
																					<option value="Akta Perceraian">Akta Perceraian</option>
																					<option value="Akta Kematian">Akta Kematian</option>
																					<option value="Ijazah">Ijazah</option>

																				</select></center>
																		</td>
																		<td>
																			<center><?php echo $cw['nama_golongan']; ?></center>
																			<input type="hiden" name="orang[data][goldar][awal][]" value="<?php echo $cw['GOL_DRH']; ?>">
																		</td>
																		<td>
																			<center><select name="orang[data][goldar][ahir][]" id="" class="form-control">
																					<option value="">Pilih</option>
																					<?php
																					$gl = mysqli_query($connect, "SELECT * FROM golongan_darah ORDER BY nama_golongan");
																					while ($drh = mysqli_fetch_array($gl)) {
																						if ($cw['GOL_DRH'] == $drh['GOL_DRH']) {
																							echo "<option value=\"$drh[GOL_DRH]\" selected>$drh[nama_golongan]</option>";
																						} else {
																							echo "<option value=\"$drh[GOL_DRH]\">$drh[nama_golongan]</option>";
																						}
																					}
																					?>
																				</select></center>
																		</td>
																		<td>
																			<center><select name="orang[data][goldar][dasar][]" id="" class="form-control">
																					<option value="-">Pilih</option>
																					<option value="Surat Keterangan">Surat Keterangan</option>
																					<option value="Akta Kelahiran">Akta Kelahiran</option>
																					<option value="Akta Perkawinan">Akta Perkawinan</option>
																					<option value="Akta Perceraian">Akta Perceraian</option>
																					<option value="Akta Kematian">Akta Kematian</option>
																					<option value="Ijazah">Ijazah</option>

																				</select></center>
																		</td>
																	</tr>
																<?php } ?>
															</tbody>

														</table>

														<h4 class="panel-title">C. Status Perkawinan & Status Hubungan</h4>
														<hr>
														<table id="tb_anggota" class="table">
															<thead>
																<tr>
																	<th>NIK</th>
																	<th>Nama</th>
																	<th>Status Perkawinan (Semula)</th>
																	<th>Status Perkawinan (Menjadi)</th>
																	<th>Dasar Perubahan</th>
																	<th>Status Hubungan (Semula)</th>
																	<th>Status Hubungan (Menjadi)</th>
																	<th>Dasar Perubahan</th>
																</tr>
															</thead>
															<tbody>
																<?php
																$qw = mysqli_query($connect, "SELECT * FROM biodata_wni,data_keluarga,status_hubungan, status_perkawinan 
						WHERE biodata_wni.NO_KK=data_keluarga.NO_KK and biodata_wni.STAT_HBKEL=status_hubungan.STAT_HBKEL
						and	biodata_wni.STAT_KWN=status_perkawinan.STAT_KWN					
						and data_keluarga.NO_KK='$_GET[no_kk]' ORDER BY biodata_wni.STAT_HBKEL ASC");

																while ($cw = mysqli_fetch_array($qw)) {
																?>
																	<tr>
																		<td>
																			<center><?php echo $cw['NIK']; ?></center>
																		</td>
																		<td>
																			<center><?php echo $cw['NAMA_LGKP']; ?></center>
																		</td>
																		<td>
																			<center><?php echo $cw['status_perkawinan']; ?></center>
																			<input type="hidden" name="orang[data][status][awal][]" value="<?php echo $cw['STAT_KWN']; ?>">
																		</td>
																		<td>

																			<center><select name="orang[data][status][ahir][]" id="" class="form-control">
																					<option value="">Pilih</option>
																					<?php
																					$kwn = mysqli_query($connect, "SELECT * FROM status_perkawinan ORDER BY status_perkawinan");
																					while ($skwn = mysqli_fetch_array($kwn)) {
																						if ($cw['STAT_KWN'] == $skwn['STAT_KWN']) {
																							echo "<option value=\"$skwn[STAT_KWN]\" selected>$skwn[status_perkawinan]</option>";
																						} else {
																							echo "<option value=\"$skwn[STAT_KWN]\">$skwn[status_perkawinan]</option>";
																						}
																					}
																					?>
																				</select></center>
																		</td>
																		<td>
																			<center><select name="orang[data][status][dasar][]" id="" class="form-control">
																					<option value="-">Pilih</option>
																					<option value="Surat Keterangan">Surat Keterangan</option>
																					<option value="Akta Kelahiran">Akta Kelahiran</option>
																					<option value="Akta Perkawinan">Akta Perkawinan</option>
																					<option value="Akta Perceraian">Akta Perceraian</option>
																					<option value="Akta Kematian">Akta Kematian</option>
																					<option value="Ijazah">Ijazah</option>

																				</select></center>
																		</td>
																		<td>
																			<center><?php echo $cw['status_hubungan']; ?></center>
																			<input type="hidden" name="orang[data][shbk][awal][]" value="<?php echo $cw['STAT_HBKEL']; ?>">
																		</td>
																		<td>
																			<center><select name="orang[data][shbk][ahir][]" id="" class="form-control">
																					<option value="">Pilih</option>
																					<?php
																					$hb = mysqli_query($connect, "SELECT * FROM status_hubungan ORDER BY status_hubungan");
																					while ($hbn = mysqli_fetch_array($hb)) {
																						if ($cw['STAT_HBKEL'] == $hbn['STAT_HBKEL']) {
																							echo "<option value=\"$hbn[STAT_HBKEL]\" selected>$hbn[status_hubungan]</option>";
																						} else {
																							echo "<option value=\"$hbn[STAT_HBKEL]\">$hbn[status_hubungan]</option>";
																						}
																					}
																					?>
																				</select></center>
																		</td>
																		<td>
																			<center><select name="orang[data][shbk][dasar][]" id="" class="form-control">
																					<option value="-">Pilih</option>
																					<option value="Surat Keterangan">Surat Keterangan</option>
																					<option value="Akta Kelahiran">Akta Kelahiran</option>
																					<option value="Akta Perkawinan">Akta Perkawinan</option>
																					<option value="Akta Perceraian">Akta Perceraian</option>
																					<option value="Akta Kematian">Akta Kematian</option>
																					<option value="Ijazah">Ijazah</option>

																				</select></center>
																		</td>
																	</tr>
																<?php } ?>
															</tbody>

														</table>

														<h4 class="panel-title">D. Nama & Jenis Kelamin</h4>
														<hr>
														<table id="tb_anggota" class="table">
															<thead>
																<tr>
																	<th>Nama (Semula)</th>
																	<th>Nama (Menjadi)</th>
																	<th>Dasar Perubahan</th>
																	<th>Jenis Kelamin (Semula)</th>
																	<th>Jenis Kelamin (Menjadi)</th>
																	<th>Dasar Perubahan</th>
																</tr>
															</thead>
															<tbody>
																<?php
																$qw = mysqli_query($connect, "SELECT * FROM biodata_wni,data_keluarga,status_hubungan, status_perkawinan, jenis_kelamin
						WHERE biodata_wni.NO_KK=data_keluarga.NO_KK and biodata_wni.STAT_HBKEL=status_hubungan.STAT_HBKEL
						and	biodata_wni.STAT_KWN=status_perkawinan.STAT_KWN	
						and	biodata_wni.JENIS_KLMIN=jenis_kelamin.JENIS_KLMIN							
						and data_keluarga.NO_KK='$_GET[no_kk]' ORDER BY biodata_wni.STAT_HBKEL ASC");

																while ($cw = mysqli_fetch_array($qw)) {
																?>
																	<tr>
																		<td>
																			<center><?php echo $cw['NAMA_LGKP']; ?></center>
																			<input type="hidden" name="orang[data][nama_lgkp][awal][]" value="<?php echo $cw['NAMA_LGKP']; ?>">
																		</td>
																		<td>
																			<center><input type="text" placeholder="Nama Baru" class="form-control" name="orang[data][nama_lgkp][ahir][]" id="nama" value=""></center>
																		</td>
																		<td>
																			<center><select name="orang[data][nama_lgkp][dasar][]" id="" class="form-control">
																					<option value="-">Pilih</option>
																					<option value="Surat Keterangan">Surat Keterangan</option>
																					<option value="Akta Kelahiran">Akta Kelahiran</option>
																					<option value="Akta Perkawinan">Akta Perkawinan</option>
																					<option value="Akta Perceraian">Akta Perceraian</option>
																					<option value="Akta Kematian">Akta Kematian</option>
																					<option value="Ijazah">Ijazah</option>

																				</select></center>
																		</td>
																		<td>
																			<center><?php echo $cw['jenis_kelamin']; ?></center>
																			<input type="hidden" name="orang[data][jklmin][awal][]" value="<?php echo $cw['JENIS_KLMIN']; ?>">
																		</td>
																		<td>
																			<center><select name="orang[data][jklmin][ahir][]" id="" class="form-control">
																					<option value="-">Pilih</option>
																					<?php
																					$kl = mysqli_query($connect, "SELECT * FROM jenis_kelamin ORDER BY jenis_kelamin");
																					while ($klm = mysqli_fetch_array($kl)) {
																						if ($cw['JENIS_KLMIN'] == $klm['JENIS_KLMIN']) {
																							echo "<option value=\"$klm[JENIS_KLMIN]\" selected>$klm[jenis_kelamin]</option>";
																						} else {
																							echo "<option value=\"$klm[JENIS_KLMIN]\">$klm[jenis_kelamin]</option>";
																						}
																					}
																					?>
																				</select></center>
																		</td>
																		<td>
																			<center><select name="orang[data][jklmin][dasar][]" id="" class="form-control">
																					<option value="">Pilih</option>
																					<option value="Surat Keterangan">Surat Keterangan</option>
																					<option value="Akta Kelahiran">Akta Kelahiran</option>
																					<option value="Akta Perkawinan">Akta Perkawinan</option>
																					<option value="Akta Perceraian">Akta Perceraian</option>
																					<option value="Akta Kematian">Akta Kematian</option>
																					<option value="Ijazah">Ijazah</option>

																				</select></center>
																		</td>
																	</tr>
																<?php } ?>
															</tbody>

														</table>

														<h4 class="panel-title">E. Tempat Lahir & Tanggal Lahir</h4>
														<hr>
														<table id="tb_anggota" class="table">
															<thead>
																<tr>
																	<th>NIK</th>
																	<th>Nama</th>
																	<th>Tempat Lahir (Semula)</th>
																	<th>Tempat Lahir (Menjadi)</th>
																	<th>Dasar Perubahan</th>
																	<th>Tanggal Lahir (Semula)</th>
																	<th>Tanggal Lahir (Menjadi)</th>
																	<th>Dasar Perubahan</th>
																</tr>
															</thead>
															<tbody>
																<?php
																$qw = mysqli_query($connect, "SELECT * FROM biodata_wni,data_keluarga
						WHERE biodata_wni.NO_KK=data_keluarga.NO_KK 					
						and data_keluarga.NO_KK='$_GET[no_kk]' ORDER BY biodata_wni.STAT_HBKEL ASC");

																while ($cw = mysqli_fetch_array($qw)) {
																?>
																	<tr>
																		<td>
																			<center><?php echo $cw['NIK']; ?></center>
																		</td>
																		<td>
																			<center><?php echo $cw['NAMA_LGKP']; ?></center>
																		</td>
																		<td>
																			<center><?php echo $cw['TMPT_LHR']; ?></center>
																			<input type="hidden" name="orang[data][tmptlhr][awal][]" value="<?php echo $cw['TMPT_LHR']; ?>">
																		</td>
																		<td>
																			<center><input type="text" placeholder="Tempat Lahir Baru" class="form-control" name="orang[data][tmptlhr][ahir][]" id="tempat_lhr" value=""></center>
																		</td>
																		<td>
																			<center><select name="orang[data][tmptlhr][dasar][]" id="" class="form-control">
																					<option value="-">Pilih</option>
																					<option value="Surat Keterangan">Surat Keterangan</option>
																					<option value="Akta Kelahiran">Akta Kelahiran</option>
																					<option value="Akta Perkawinan">Akta Perkawinan</option>
																					<option value="Akta Perceraian">Akta Perceraian</option>
																					<option value="Akta Kematian">Akta Kematian</option>
																					<option value="Ijazah">Ijazah</option>

																				</select></center>
																		</td>
																		<td>
																			<center><?php echo substr($cw['TGL_LHR'], 0, 10); ?></center>
																			<input type="hidden" name="orang[data][tgl_lhr][awal][]" value="<?php echo substr($cw['TGL_LHR'], 0, 10); ?>">
																		</td>
																		<td>
																			<center><input type="date" class="form-control" name="orang[data][tgl_lhr][ahir][]" value="<?php echo substr($cw['TGL_LHR'], 0, 10); ?>"></center>
																		</td>
																		<td>
																			<center><select name="orang[data][tgl_lhr][dasar][]" id="" class="form-control">
																					<option value="-">Pilih</option>
																					<option value="Surat Keterangan">Surat Keterangan</option>
																					<option value="Akta Kelahiran">Akta Kelahiran</option>
																					<option value="Akta Perkawinan">Akta Perkawinan</option>
																					<option value="Akta Perceraian">Akta Perceraian</option>
																					<option value="Akta Kematian">Akta Kematian</option>
																					<option value="Ijazah">Ijazah</option>

																				</select></center>
																		</td>

																	</tr>
																<?php } ?>
															</tbody>

														</table>
													</div>

												</div>
										</section>
									</div>
						</section>
					</div>




					<center><button class="btn btn-primary">Proses </button></center>

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
						<div data-plugin-datepicker data-plugin-skin="dark"></div>

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
			$("#nik_pemohon").autocomplete({
				serviceUrl: "autocomplete/data_keluarga.php", // Kode php untuk prosesing data
				dataType: "JSON", // Tipe data JSON
				onSelect: function(suggestion) {
					$("#nik_pemohon").val("" + suggestion.nik);
					$("#nama_pemohon").val("" + suggestion.nama);
					$("#no_kk").val("" + suggestion.no_kk);
					$("#nama_kep").val("" + suggestion.nama_kep);
					$("#nik_kk").val("" + suggestion.nik_kk);

					var row = "<tr><td>" + suggestion.nik + "</td><td>" + suggestion.nama + "</td><td><input type=\"checkbox\" name=\"anggota[]\" value=\"" + suggestion.nik + "\" checked disabled></td></tr>";

					$("#tb_anggota tbody").html(row);
					$("#tanggkk").attr("disabled", false);

				}
			});

		})
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#tanggkk").click(function() {
				var no_kk = $('#no_kk').val();
				var nikp = $('#nik_pemohon').val();
				$.ajax({
					type: 'POST',
					url: "anggota_keluarga.php",
					data: {
						"no_kk": no_kk,
						"nikp": nikp
					},
					success: function(msg) {
						$('#tb_anggota').append(msg);
						$("#tanggkk").attr("disabled", true);
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#propinsi").change(function() {
				var idprop = $(this).val();
				if (idprop != "") {
					$.ajax({
						type: "post",
						url: "dcb/getkab.php",
						data: {
							"id_prop": idprop
						},
						success: function(data) {
							$("#kabupaten").html(data);
						}
					});
				}
			});
			$("#kabupaten").change(function() {
				var idkab = $(this).val();
				if (idkab != "") {
					$.ajax({
						type: "post",
						url: "dcb/getkec.php",
						data: {
							"id_kab": idkab
						},
						success: function(data) {
							$("#kecamatan").html(data);
						}
					});
				}
			});
			$("#kecamatan").change(function() {
				var idkec = $(this).val();
				if (idkec != "") {
					$.ajax({
						type: "post",
						url: "dcb/getkel.php",
						data: {
							"id_kec": idkec
						},
						success: function(data) {
							$("#kelurahan").html(data);
						}
					});
				}
			});

		});
	</script>
</body>

</html>