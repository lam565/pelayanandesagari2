<?php 
include "connect.php"

?>
<?php
session_start();
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
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
					  $('input[name=NIK_AYAH]').val(data.item.NIK_AYAH);
					  $('input[name=NAMA_LGKP_AYAH]').val(data.item.NAMA_LGKP_AYAH);
					    $('input[name=NIK_IBU]').val(data.item.NIK_IBU);
					  $('input[name=NAMA_LGKP_IBU]').val(data.item.NAMA_LGKP_IBU);
					  
					  $('input[name=ALAMAT]').val(data.item.ALAMAT);
					  $('input[name=TMPT_LHR]').val(data.item.TMPT_LHR);
					  $('input[name=TGL_LHR]').val(data.item.TGL_LHR);
					 
					 $("#golongan_darahh option[value="+data.item.GOL_DRH+"]").prop('selected',true);
						$("#agamaaa option[value="+data.item.AGAMA+"]").prop('selected',true);
						$("#status_perkawinann option[value="+data.item.STAT_KWN+"]").prop('selected',true);
						$("#pekerjaann option[value="+data.item.JENIS_PKRJN+"]").prop('selected',true);
						$("#pendidikann option[value="+data.item.PDDK_AKH+"]").prop('selected',true);
						$("#kelainan_fisikk option[value="+data.item.KLAIN_FSK+"]").prop('selected',true);
						$("#kelahirann option[value="+data.item.AKTA_LHR+"]").prop('selected',true);
						  $('input[name=nama]').val(data.item.NAMA_LGKP);
						  $('input[name=akta_kelahiran]').val(data.item.AKTA_LHR);
						  $('input[name=kelainan_fisik]').val(data.item.KLAIN_FSK);
                }
        });
    });
	
	
    </script>
	 <script>
/*autocomplete muncul setelah user mengetikan minimal2 karakter */
    $(function() { 
        $( "#nama1").autocomplete({
         source: "data2.php", 
           minLength:1,
		   select:function(event,data){
					 $('input[name=nama1]').val(data.item.NAMA_LGKP);
                    $('input[name=NIK1]').val(data.item.NIK);
					$('input[name=NO_KK1]').val(data.item.NO_KK);
					  $('input[name=ALAMAT1]').val(data.item.ALAMAT);
					  $('input[name=tempat_lahir]').val(data.item.TMPT_LHR);
					  $('input[name=tgl_lahir]').val(data.item.TGL_LHR);
					  $('input[name=jenis_kelamin]').val(data.item.jenis_kelamin);
					  $('input[name=gol_darah]').val(data.item.nama_golongan);
					   $('input[name=agama]').val(data.item.nama_agama);
					    $('input[name=status_kwn]').val(data.item.status_perkawinan);
						 $('input[name=pekerjaan]').val(data.item.pekerjaan);
						  $('input[name=pendidikan]').val(data.item.pendidikan);
						$("#jenis_kelaminn option[value="+data.item.JENIS_KLMIN+"]").prop('selected',true);
						$("#golongan_darahh option[value="+data.item.GOL_DRH+"]").prop('selected',true);
						$("#agamaaa option[value="+data.item.AGAMA+"]").prop('selected',true);
						$("#status_perkawinann option[value="+data.item.STAT_KWN+"]").prop('selected',true);
						$("#pekerjaann option[value="+data.item.JENIS_PKRJN+"]").prop('selected',true);
						$("#pendidikann option[value="+data.item.PDDK_AKH+"]").prop('selected',true);
                }
        });
    });
	
	
    </script>
	 <script>
/*autocomplete muncul setelah user mengetikan minimal2 karakter */
    $(function() { 
        $( "#nama2").autocomplete({
         source: "data2.php", 
           minLength:1,
		   select:function(event,data){
					 $('input[name=nama2]').val(data.item.NAMA_LGKP);
                    $('input[name=NIK2]').val(data.item.NIK);
					$('input[name=NO_KK2]').val(data.item.NO_KK);
					  $('input[name=ALAMAT2]').val(data.item.ALAMAT);
                }
        });
    });
	
	
    </script>

<SCRIPT LANGUAGE="JavaScript"><!--
function codename() {

if(document.f1.pb1.value != 'PEMBARUAN1')
document.f1.menjadi1.disabled=1;
else 
document.f1.menjadi1.disabled=0;

if(document.f1.pb1.value != 'PEMBARUAN1')
document.f1.dokumen1.disabled=1;
else 
document.f1.dokumen1.disabled=0;

if(document.f1.pb1.value != 'PEMBARUAN1')
document.f1.no1.disabled=1;
else 
document.f1.no1.disabled=0;

if(document.f1.pb1.value != 'PEMBARUAN1')
document.f1.tgl1.disabled=1;
else 
document.f1.tgl1.disabled=0;

//batas
if(document.f1.pb2.value != 'PEMBARUAN2')
document.f1.menjadi2.disabled=1;
else 
document.f1.menjadi2.disabled=0;

if(document.f1.pb2.value != 'PEMBARUAN2')
document.f1.dokumen2.disabled=1;
else 
document.f1.dokumen2.disabled=0;

if(document.f1.pb2.value != 'PEMBARUAN2')
document.f1.no2.disabled=1;
else 
document.f1.no2.disabled=0;

if(document.f1.pb2.value != 'PEMBARUAN2')
document.f1.tgl2.disabled=1;
else 
document.f1.tgl2.disabled=0;

//batas
if(document.f1.pb3.value != 'PEMBARUAN3')
document.f1.menjadi3.disabled=1;
else 
document.f1.menjadi3.disabled=0;

if(document.f1.pb3.value != 'PEMBARUAN3')
document.f1.dokumen3.disabled=1;
else 
document.f1.dokumen3.disabled=0;

if(document.f1.pb3.value != 'PEMBARUAN3')
document.f1.no3.disabled=1;
else 
document.f1.no3.disabled=0;

if(document.f1.pb3.value != 'PEMBARUAN3')
document.f1.tgl3.disabled=1;
else 
document.f1.tgl3.disabled=0;

//batas
if(document.f1.pb4.value != 'PEMBARUAN4')
document.f1.menjadi4.disabled=1;
else 
document.f1.menjadi4.disabled=0;

if(document.f1.pb4.value != 'PEMBARUAN4')
document.f1.dokumen4.disabled=1;
else 
document.f1.dokumen4.disabled=0;

if(document.f1.pb4.value != 'PEMBARUAN4')
document.f1.no4.disabled=1;
else 
document.f1.no4.disabled=0;

if(document.f1.pb4.value != 'PEMBARUAN4')
document.f1.tgl4.disabled=1;
else 
document.f1.tgl4.disabled=0;

//batas
if(document.f1.pb5.value != 'PEMBARUAN5')
document.f1.menjadi5.disabled=1;
else 
document.f1.menjadi5.disabled=0;

if(document.f1.pb5.value != 'PEMBARUAN5')
document.f1.dokumen5.disabled=1;
else 
document.f1.dokumen5.disabled=0;

if(document.f1.pb5.value != 'PEMBARUAN5')
document.f1.no5.disabled=1;
else 
document.f1.no5.disabled=0;

if(document.f1.pb5.value != 'PEMBARUAN5')
document.f1.tgl5.disabled=1;
else 
document.f1.tgl5.disabled=0;

//batas
if(document.f1.pb6.value != 'PEMBARUAN6')
document.f1.menjadi6.disabled=1;
else 
document.f1.menjadi6.disabled=0;

if(document.f1.pb6.value != 'PEMBARUAN6')
document.f1.dokumen6.disabled=1;
else 
document.f1.dokumen6.disabled=0;

if(document.f1.pb6.value != 'PEMBARUAN6')
document.f1.no6.disabled=1;
else 
document.f1.no6.disabled=0;

if(document.f1.pb6.value != 'PEMBARUAN6')
document.f1.tgl6.disabled=1;
else 
document.f1.tgl6.disabled=0;

//batas
if(document.f1.pb7.value != 'PEMBARUAN7')
document.f1.menjadi7.disabled=1;
else 
document.f1.menjadi7.disabled=0;

if(document.f1.pb7.value != 'PEMBARUAN7')
document.f1.dokumen7.disabled=1;
else 
document.f1.dokumen7.disabled=0;

if(document.f1.pb7.value != 'PEMBARUAN7')
document.f1.no7.disabled=1;
else 
document.f1.no7.disabled=0;

if(document.f1.pb7.value != 'PEMBARUAN7')
document.f1.tgl7.disabled=1;
else 
document.f1.tgl7.disabled=0;

//batas
if(document.f1.pb8.value != 'PEMBARUAN8')
document.f1.menjadi8.disabled=1;
else 
document.f1.menjadi8.disabled=0;

if(document.f1.pb8.value != 'PEMBARUAN8')
document.f1.dokumen8.disabled=1;
else 
document.f1.dokumen8.disabled=0;

if(document.f1.pb8.value != 'PEMBARUAN8')
document.f1.no8.disabled=1;
else 
document.f1.no8.disabled=0;

if(document.f1.pb8.value != 'PEMBARUAN8')
document.f1.tgl8.disabled=1;
else 
document.f1.tgl8.disabled=0;

//batas
if(document.f1.pb9.value != 'PEMBARUAN9')
document.f1.menjadi9.disabled=1;
else 
document.f1.menjadi9.disabled=0;

if(document.f1.pb9.value != 'PEMBARUAN9')
document.f1.dokumen9.disabled=1;
else 
document.f1.dokumen9.disabled=0;

if(document.f1.pb9.value != 'PEMBARUAN9')
document.f1.no9.disabled=1;
else 
document.f1.no9.disabled=0;

if(document.f1.pb9.value != 'PEMBARUAN9')
document.f1.tgl9.disabled=1;
else 
document.f1.tgl9.disabled=0;

//batas
if(document.f1.pb10.value != 'PEMBARUAN10')
document.f1.menjadi10.disabled=1;
else 
document.f1.menjadi10.disabled=0;

if(document.f1.pb10.value != 'PEMBARUAN10')
document.f1.dokumen10.disabled=1;
else 
document.f1.dokumen10.disabled=0;

if(document.f1.pb10.value != 'PEMBARUAN10')
document.f1.no10.disabled=1;
else 
document.f1.no10.disabled=0;

if(document.f1.pb10.value != 'PEMBARUAN10')
document.f1.tgl10.disabled=1;
else 
document.f1.tgl10.disabled=0;

//batas
if(document.f1.pb11.value != 'PEMBARUAN11')
document.f1.menjadi11.disabled=1;
else 
document.f1.menjadi11.disabled=0;

if(document.f1.pb11.value != 'PEMBARUAN11')
document.f1.dokumen11.disabled=1;
else 
document.f1.dokumen11.disabled=0;

if(document.f1.pb11.value != 'PEMBARUAN11')
document.f1.no11.disabled=1;
else 
document.f1.no11.disabled=0;

if(document.f1.pb11.value != 'PEMBARUAN11')
document.f1.tgl11.disabled=1;
else 
document.f1.tgl11.disabled=0;

}
</SCRIPT>
	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				
				<?php include "notif.php"?>
			
				
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			
					
					<br><br><br>
					<!-- start: page -->
						<div class="row">
							<div class="col-lg-19">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Form Permohonan KTP</h2>
									</header>
									<div class="panel-body">
										
					
						
						<!-- col-md-6 -->
						<div class="col-md-12">
							
								<section class="">
									<form enctype="multipart/form-data" name="f1" onClick="return codename()" method="POST" novalidate class="form-horizontal form-label-left" action="simpan_ktp.php">
										 <div class="">

												<?php
										include("connect.php"); //include config file 
										$sql="select * from suket_ektp order by id_ektp DESC";
										$results = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));
										$data = mysqli_fetch_array($results);
										$kodeawal=substr($data['id_ektp'],7,3)+1;
										if($kodeawal<10){
											$kd='460.1/000'.$kodeawal.'/III/2020';
										}elseif($kodeawal > 9 && $kodeawal <=99){
											$kd='460.1/00'.$kodeawal.'/III/2020';
										}else{
											$kd='460.1/0'.$kodeawal.'/III/2020';
										}
									?>
												<label class="col-md-3 control-label" for="inputDefault">No.Surat</label>
													<div class="col-md-6">
													<input type="text" name="no_surat1" value="<?php echo $kd;?>" class="form-control">
													
												</div>
												</div><br><br>
													<input type="hidden" name="username"  value="<?php echo $_SESSION['username'];?>">
												
											 <div class="">
												<label class="col-md-3 control-label" for="inputDefault">Nama Lengkap</label>
												<div class="col-md-6">
													<input type="text" class="form-control" required="required" name="nama" id="nama" value="">
												</div>
											</div><br><br>
											
											<div class="">
									
									            <label class="col-md-3 control-label" for="inputDefault">NIK</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="NIK" id="NIK" value="">
												</div>
											</div><br><br><hr>
											<div class="">
									
									            <label class="col-md-3 control-label" for="inputDefault">NAMA AYAH</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="NAMA_LGKP_AYAH" id="NAMA_LGKP_AYAH" value="">
												</div>
											</div><br><br>
											<div class="">
									
									            <label class="col-md-3 control-label" for="inputDefault">NIK AYAH</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="NIK_AYAH" id="NIK_AYAH" value="">
												</div>
											</div><br><br>
											<div class="">
									
									            <label class="col-md-3 control-label" for="inputDefault">NAMA IBU</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="NAMA_LGKP_IBU" id="NAMA_LGKP_IBU" value="">
												</div>
											</div><br><br>
											<div class="">
									
									            <label class="col-md-3 control-label" for="inputDefault">NIK IBU</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="NIK_IBU" id="NIK_IBU" value="">
												</div>
											</div><br><br>
									
									<div class="panel-body">
									
											<div class="">
											<label class="col-md-3 control-label" for="inputDefault">Permohonan KTP</label>
											<div class="col-md-6">
											<select name="permohonan" id="permohonan" class="form-control">
											<option value="Baru">Baru</option>
											<option value="Perubahan">Perubahan Status</option>
											<option value="Penggantian">Pergatian KTP (Rusak/Hilang)</option>
											</select>
											</div><br><hr>
											</div>
											<table ><br>
										
											<thead>
                                            <tr>
										<th><center></center></th>
                                        <th><center>Jenis Data</center></th>
                                        <th><center></center></th>
										
										<th><center>Kondisi Data</center></th>
										<th><center>Dokumen</center></th>
										<th><center>No Dokumen</center></th>
										<th><center>Tgl Dokumen</center></th>
										<th><center>Berkas Persyaratan</center></th>
										
                                    </tr>
                                        </thead>
                                        <tbody>
										
                                            <tr>
                                        <td>
										<div>
											 
											
												
												<div class="">
												<div class="col-md-9">
													Pendidikan
												</div><br><br>
												
											
											</div>
											 <div class="">
												<div class="col-md-9">
													Pekerjaan
												</div><br><br>
												
											
											</div>
											
											
											
											<div class="">
												<div class="col-md-9">
													Agama
												</div><br><br>
												
											
											</div>
											  <div class="">
												<div class="col-md-9">
												Status Perkawinan
												</div><br><br>
												
											
											</div>
											<div class="">
												<div class="col-md-9">
													Golongan Darah
												</div><br><br>
												
											
											</div>
											<div class="">
												<div class="col-md-9">
													Kelaianan Fisik
												</div><br><br>
												
											
											</div>
											<div class="">
												<div class="col-md-9">
													Akta Kelahiran
												</div><br><br>
												
											
											</div>
											 <div class="">
												<div class="col-md-9">
												Nama Lengkap
													</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-9">
												Tanggal Lahir
													</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-9">
												Tempat Lahir
													</div>
											</div><br><br><br>
											 <div class="">
												<div class="col-md-9">
													Alamat
												</div>
											</div><br><br>
											
												</div>
												
											
											</div>
											
										</td>
										<td>
										<div>
											 
											
												<?php
										include("connect.php"); //include config file 
										$sql="select * from suket_ektp order by id_ektp DESC";
										$results = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));
										$data = mysqli_fetch_array($results);
										$kodeawal=substr($data['id_ektp'],7,3)+1;
										if($kodeawal<10){
											$kd='460.1/000'.$kodeawal.'/II/2020';
										}elseif($kodeawal > 9 && $kodeawal <=99){
											$kd='460.1/00'.$kodeawal.'/II/2020';
										}else{
											$kd='460.1/0'.$kodeawal.'/II/2020';
										}
											?>
											
													<input type="hidden" name="no_surat" value="<?php echo $kd;?>" class="form-control">
													
												
													<input type="hidden" name="username"  value="<?php echo $_SESSION['username'];?>">
												<div class="">
												<div class="col-md-9">
													<select class="form-control" name="pendidikann" id="pendidikann">
													<option>--Pilih Pendidikan--</option>
													<?php
													include("connect.php"); 
													$pn="SELECT * FROM pendidikan_terakhir";
													$tr = mysqli_query($connect,$pn) or die("Error: ".mysqli_error($connect));
													while($pn=mysqli_fetch_array($tr)){
													echo "<option value=\"$pn[PDDK_AKH]\" id='$pn[PDDK_AKH]'>$pn[pendidikan]</option>\n";
													}
													?>
													</select>
												</div><br><br>
												
											
											</div>
											 <div class="">
												<div class="col-md-9">
													<select class="form-control" name="pekerjaann" id="pekerjaann">
													<option>--Pilih Pekerjaan--</option>
													<?php
													include("connect.php"); 
													$j="SELECT * FROM pekerjaan";
													$pk = mysqli_query($connect,$j) or die("Error: ".mysqli_error($connect));
													while($pn=mysqli_fetch_array($pk)){
													echo "<option value=\"$pn[JENIS_PKRJN]\" id='$pn[JENIS_PKRJN]'>$pn[pekerjaan]</option>\n";
													}
													?>
													</select>
												</div><br><br>
												
											
											</div>
											
											
											
											<div class="">
												<div class="col-md-9">
													<select class="form-control" name="agamaaa" id="agamaaa">
													<option>--Pilih Agama--</option>
													<?php
													include("connect.php"); 
													$g="SELECT * FROM agama";
													$ag = mysqli_query($connect,$g) or die("Error: ".mysqli_error($connect));
													while($m=mysqli_fetch_array($ag)){
													echo "<option value=\"$m[AGAMA]\" id='$m[AGAMA]'>$m[nama_agama]</option>\n";
													}
													?>
													</select>
												</div><br><br>
												
											
											</div>
											  <div class="">
												<div class="col-md-9">
												<select class="form-control" name="status_perkawinann" id="status_perkawinann">
													<option>--Pilih Status Perkawinan--</option>
													<?php
													include("connect.php"); 
													$s="SELECT * FROM status_perkawinan";
													$st = mysqli_query($connect,$s) or die("Error: ".mysqli_error($connect));
													while($kn=mysqli_fetch_array($st)){
													echo "<option value=\"$kn[STAT_KWN]\" id='$kn[STAT_KWN]'>$kn[status_perkawinan]</option>\n";
													}
													?>
													</select>
												</div><br><br>
												
											
											</div>
											<div class="">
												<div class="col-md-9">
													<select class="form-control" name="golongan_darahh" id="golongan_darahh">
													<option>--Pilih Golongan Darah--</option>
													<?php
													include("connect.php"); 
													$gol="SELECT * FROM golongan_darah";
													$gl = mysqli_query($connect,$gol) or die("Error: ".mysqli_error($connect));
													while($l=mysqli_fetch_array($gl)){
													echo "<option value=\"$l[GOL_DRH]\" id='$l[GOL_DRH]'>$l[nama_golongan]</option>\n";
													}
													?>
													</select>
												</div><br><br>
												
											
											</div>
											<div class="">
												<div class="col-md-9">
													<select class="form-control" name="kelainan_fisikk" id="kelainan_fisikk">
													<option>--Pilih Kelaianan Fisik--</option>
													<?php
													include("connect.php"); 
													$fsk="SELECT * FROM kelainan_fisik";
													$ln = mysqli_query($connect,$fsk) or die("Error: ".mysqli_error($connect));
													while($kl=mysqli_fetch_array($ln)){
													echo "<option value=\"$kl[KLAIN_FSK]\" id='$kl[KLAIN_FSK]'>$kl[kelainan_fisik]</option>\n";
													}
													?>
													</select>
												</div><br><br>
												
											
											</div>
											<div class="">
												<div class="col-md-9">
													<select class="form-control" name="kelahirann" id="kelahirann">
													<option>--Pilih Akta Kelahiran--</option>
													<?php
													include("connect.php"); 
													$ak="SELECT * FROM akte_kelahiran";
													$te = mysqli_query($connect,$ak) or die("Error: ".mysqli_error($connect));
													while($lh=mysqli_fetch_array($te)){
													echo "<option value=\"$lh[AKTA_LHR]\" id='$lh[AKTA_LHR]'>$lh[akte_kelahiran]</option>\n";
													}
													?>
													</select>
												</div><br><br>
												
											
											</div>
											 <div class="">
												<div class="col-md-9">
													<input type="text" class="form-control"  name="nama" id="nama" value="">
												</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-9">
													<input type="text" class="form-control"  name="TGL_LHR" id="TGL_LHR" value="">
												</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-9">
													<input type="text" class="form-control"  name="TMPT_LHR" id="TMPT_LHR" value="">
												</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-9">
													<input type="text" class="form-control"  name="ALAMAT" id="ALAMAT" value="">
												</div>
											</div><br><br>
											
												</div>
												
											
											</div>
											
										</td>
									 <td>
										<div>
											 
											
												
												<div class="">
												<div class="col-md-12">
													<select name="pb1" id="pb1" class="form-control" >
													<option value="TETAP1">TETAP</option>
													<option value="PEMBARUAN1">PEMBARUAN</option>
													
													
													
												</select>
												</div><br><br>
												
											
											</div>
											 <div class="">
												<div class="col-md-12">
													<select name="pb2" id="pb2" class="form-control" >
													<option value="TETAP2">TETAP</option>
													<option value="PEMBARUAN2">PEMBARUAN</option>
													
													
													
												</select>
												</div><br><br>
												
											
											</div>
											
											
											
											<div class="">
												<div class="col-md-12">
													<select name="pb3" id="pb3" class="form-control" >
													<option value="TETAP3">TETAP</option>
													<option value="PEMBARUAN3">PEMBARUAN</option>
													
													
													
												</select>
												</div><br><br>
												
											
											</div>
											  <div class="">
												<div class="col-md-12">
													<select name="pb4" id="pb4" class="form-control" >
													<option value="TETAP4">TETAP</option>
													<option value="PEMBARUAN4">PEMBARUAN</option>
													
													
													
												</select>
												</div><br><br>
												
											
											</div>
											 <div class="">
												<div class="col-md-12">
													<select name="pb5" id="pb5" class="form-control" >
													<option value="TETAP5">TETAP</option>
													<option value="PEMBARUAN5">PEMBARUAN</option>
													
													
													
												</select>
												</div><br><br>
												
											
											</div>
											 <div class="">
												<div class="col-md-12">
													<select name="pb6" id="pb6" class="form-control" >
													<option value="TETAP6">TETAP</option>
													<option value="PEMBARUAN6">PEMBARUAN</option>
													
													
													
												</select>
												</div><br><br>
												
											
											</div>
											 <div class="">
												<div class="col-md-12">
													<select name="pb7" id="pb7" class="form-control" >
													<option value="TETAP7">TETAP</option>
													<option value="PEMBARUAN7">PEMBARUAN</option>
													
													
													
												</select>
												</div><br><br>
												
											
											</div>
											  <div class="">
												<div class="col-md-12">
													<select name="pb8" id="pb8" class="form-control" >
													<option value="TETAP8">TETAP</option>
													<option value="PEMBARUAN8">PEMBARUAN</option>
													
													
													
												</select>
												</div><br><br>
												
											
											</div>
											  <div class="">
												<div class="col-md-12">
													<select name="pb9" id="pb9" class="form-control" >
													<option value="TETAP9">TETAP</option>
													<option value="PEMBARUAN9">PEMBARUAN</option>
													
													
													
												</select>
												</div><br><br>
												
											
											</div>
											  <div class="">
												<div class="col-md-12">
													<select name="pb10" id="pb10" class="form-control" >
													<option value="TETAP10">TETAP</option>
													<option value="PEMBARUAN10">PEMBARUAN</option>
													
													
													
												</select>
												</div><br><br>
												
											
											</div>
											  <div class="">
												<div class="col-md-12">
													<select name="pb11" id="pb11" class="form-control" >
													<option value="TETAP11">TETAP</option>
													<option value="PEMBARUAN11">PEMBARUAN</option>
													
													
													
												</select>
												</div><br><br>
												
											
											</div>
											
												</div>
												
											
											</div>
											
										</td>
										<td>
										<div>
											 
											
												
												<div class="">
												<div class="col-md-11">
													<select class="form-control" disabled="disabled" name="menjadi1" id="menjadi1">
													<option>--Pilih Pendidikan--</option>
													<?php
													include("connect.php"); 
													$pn="SELECT * FROM pendidikan_terakhir";
													$tr = mysqli_query($connect,$pn) or die("Error: ".mysqli_error($connect));
													while($pn=mysqli_fetch_array($tr)){
													echo "<option value=\"$pn[PDDK_AKH]\" id='$pn[PDDK_AKH]'>$pn[pendidikan]</option>\n";
													}
													?>
													</select>
												</div><br><br>
												
											
											</div>
											 <div class="">
												<div class="col-md-11">
													<select class="form-control" disabled="disabled" name="menjadi2" id="menjadi2">
													<option>--Pilih Pekerjaan--</option>
													<?php
													include("connect.php"); 
													$j="SELECT * FROM pekerjaan";
													$pk = mysqli_query($connect,$j) or die("Error: ".mysqli_error($connect));
													while($pn=mysqli_fetch_array($pk)){
													echo "<option value=\"$pn[JENIS_PKRJN]\" id='$pn[JENIS_PKRJN]'>$pn[pekerjaan]</option>\n";
													}
													?>
													</select>
												</div><br><br>
												
											
											</div>
											
											
											
											<div class="">
												<div class="col-md-11">
													<select class="form-control" disabled="disabled" name="menjadi3" id="menjadi3">
													<option>--Pilih Agama--</option>
													<?php
													include("connect.php"); 
													$g="SELECT * FROM agama";
													$ag = mysqli_query($connect,$g) or die("Error: ".mysqli_error($connect));
													while($m=mysqli_fetch_array($ag)){
													echo "<option value=\"$m[AGAMA]\" id='$m[AGAMA]'>$m[nama_agama]</option>\n";
													}
													?>
													</select>
												</div><br><br>
												
											
											</div>
											  <div class="">
												<div class="col-md-11">
													<select class="form-control" disabled="disabled" name="menjadi4" id="menjadi4">
													<option>--Pilih Status Perkawinan--</option>
													<?php
													include("connect.php"); 
													$s="SELECT * FROM status_perkawinan";
													$st = mysqli_query($connect,$s) or die("Error: ".mysqli_error($connect));
													while($kn=mysqli_fetch_array($st)){
													echo "<option value=\"$kn[STAT_KWN]\" id='$kn[STAT_KWN]'>$kn[status_perkawinan]</option>\n";
													}
													?>
													</select>
												</div><br><br>
												
											
											</div>
											 <div class="">
												<div class="col-md-11">
													<select class="form-control" disabled="disabled" name="menjadi5" id="menjadi5">
													<option>--Pilih Golongan Darah--</option>
													<?php
													include("connect.php"); 
													$gol="SELECT * FROM golongan_darah";
													$gl = mysqli_query($connect,$gol) or die("Error: ".mysqli_error($connect));
													while($l=mysqli_fetch_array($gl)){
													echo "<option value=\"$l[GOL_DRH]\" id='$l[GOL_DRH]'>$l[nama_golongan]</option>\n";
													}
													?>
													</select>
												</div><br><br>
												
											
											</div>
											 <div class="">
												<div class="col-md-11">
													<select class="form-control" disabled="disabled" name="menjadi6" id="menjadi6">
													<option>--Pilih Kelaianan Fisik--</option>
													<?php
													include("connect.php"); 
													$fsk="SELECT * FROM kelainan_fisik";
													$ln = mysqli_query($connect,$fsk) or die("Error: ".mysqli_error($connect));
													while($kl=mysqli_fetch_array($ln)){
													echo "<option value=\"$kl[KLAIN_FSK]\" id='$kl[KLAIN_FSK]'>$kl[kelainan_fisik]</option>\n";
													}
													?>
													</select>
												</div><br><br>
												
											
											</div>
											 <div class="">
												<div class="col-md-11">
													<select class="form-control" disabled="disabled" name="menjadi7" id="menjadi7">
													<option>--Pilih Akta Kelahiran--</option>
													<?php
													include("connect.php"); 
													$ak="SELECT * FROM akte_kelahiran";
													$te = mysqli_query($connect,$ak) or die("Error: ".mysqli_error($connect));
													while($lh=mysqli_fetch_array($te)){
													echo "<option value=\"$lh[AKTA_LHR]\" id='$lh[AKTA_LHR]'>$lh[akte_kelahiran]</option>\n";
													}
													?>
													</select>
												</div><br><br>
												
											
											</div>
											  <div class="">
												<div class="col-md-11">
													<input type="text" class="form-control" disabled="disabled" name="menjadi8" id="menjadi8" value="">
												</div>
											</div><br><br>
											  <div class="">
												<div class="col-md-11">
													<input type="text" class="form-control" disabled="disabled" name="menjadi9" id="menjadi9" value="">
												</div>
											</div><br><br>
											  <div class="">
												<div class="col-md-11">
													<input type="text" class="form-control" disabled="disabled" name="menjadi10" id="menjadi10" value="">
												</div>
											</div><br><br>
												
											
										<div class="">
												<div class="col-md-11">
													<input type="text" class="form-control" disabled="disabled" name="menjadi11" id="menjadi11" value="">
												</div>
											</div><br><br>
											
											
												</div>
												
											
											</div>
											
										</td>
										<td>
										<div>
											 
											
												
												<div class="">
												<div class="col-md-12">
													<select name="dokumen1" disabled="disabled" id="dokumen1" class="form-control" >
													<option>Dasar Penggantian</option>
													<option value="Akta">Akta</option>
													<option value="Surat">Surat</option>
													<option value="Sertifikat">Sertifikat</option>
													<option value="Ijazah">Ijazah</option>
													
												</select>
												</div><br><br>
												
											
											</div>
											 <div class="">
												<div class="col-md-12">
													<select name="dokumen2" id="dokumen2" disabled="disabled" class="form-control" >
													<option>Dasar Penggantian</option>
													<option value="Akta">Akta</option>
													<option value="Surat">Surat</option>
													<option value="Sertifikat">Sertifikat</option>
													<option value="Ijazah">Ijazah</option>
													
												</select>
												</div><br><br>
												
											
											</div>
											
											
											
											<div class="">
												<div class="col-md-12">
													<select name="dokumen3" id="dokumen3" disabled="disabled" class="form-control" >
													<option>Dasar Penggantian</option>
													<option value="Akta">Akta</option>
													<option value="Surat">Surat</option>
													<option value="Sertifikat">Sertifikat</option>
													<option value="Ijazah">Ijazah</option>
													
												</select>
												</div><br><br>
												
											
											</div>
											  <div class="">
												<div class="col-md-12">
													<select name="dokumen4" id="dokumen4" disabled="disabled" class="form-control" >
													<option>Dasar Penggantian</option>
													<option value="Akta">Akta</option>
													<option value="Surat">Surat</option>
													<option value="Sertifikat">Sertifikat</option>
													<option value="Ijazah">Ijazah</option>
													
												</select>
												</div><br><br>
												
											
											</div>
											 <div class="">
												<div class="col-md-12">
													<select name="dokumen5" id="dokumen5" disabled="disabled" class="form-control" >
													<option>Dasar Penggantian</option>
													<option value="Akta">Akta</option>
													<option value="Surat">Surat</option>
													<option value="Sertifikat">Sertifikat</option>
													<option value="Ijazah">Ijazah</option>
													
												</select>
												</div><br><br>
												
											
											</div>
											 <div class="">
												<div class="col-md-12">
													<select name="dokumen6" id="dokumen6" disabled="disabled" class="form-control" >
													<option>Dasar Penggantian</option>
													<option value="Akta">Akta</option>
													<option value="Surat">Surat</option>
													<option value="Sertifikat">Sertifikat</option>
													<option value="Ijazah">Ijazah</option>
													
												</select>
												</div><br><br>
												
											
											</div>
											 <div class="">
												<div class="col-md-12">
													<select name="dokumen7" id="dokumen7" disabled="disabled" class="form-control" >
													<option>Dasar Penggantian</option>
													<option value="Akta">Akta</option>
													<option value="Surat">Surat</option>
													<option value="Sertifikat">Sertifikat</option>
													<option value="Ijazah">Ijazah</option>
													
												</select>
												</div><br><br>
												
											
											</div>
											  <div class="">
												<div class="col-md-12">
													<select name="dokumen8" id="dokumen8" disabled="disabled" class="form-control" >
													<option>Dasar Penggantian</option>
													<option value="Akta">Akta</option>
													<option value="Surat">Surat</option>
													<option value="Sertifikat">Sertifikat</option>
													<option value="Ijazah">Ijazah</option>
													
												</select>
												</div><br><br>
												
											
											</div>
											  <div class="">
												<div class="col-md-12">
													<select name="dokumen9" id="dokumen9" disabled="disabled" class="form-control" >
													<option>Dasar Penggantian</option>
													<option value="Akta">Akta</option>
													<option value="Surat">Surat</option>
													<option value="Sertifikat">Sertifikat</option>
													<option value="Ijazah">Ijazah</option>
													
												</select>
												</div><br><br>
												
											
											</div>
											  <div class="">
												<div class="col-md-12">
													<select name="dokumen10" id="dokumen10" disabled="disabled" class="form-control" >
													<option>Dasar Penggantian</option>
													<option value="Akta">Akta</option>
													<option value="Surat">Surat</option>
													<option value="Sertifikat">Sertifikat</option>
													<option value="Ijazah">Ijazah</option>
													
												</select>
												</div><br><br>
												
											
											</div>
											  <div class="">
												<div class="col-md-12">
													<select name="dokumen11" id="dokumen11" disabled="disabled" class="form-control" >
													<option>Dasar Penggantian</option>
													<option value="Akta">Akta</option>
													<option value="Surat">Surat</option>
													<option value="Sertifikat">Sertifikat</option>
													<option value="Ijazah">Ijazah</option>
													
												</select>
												</div><br><br>
												
											
											</div>
											
												</div>
												
											
											</div>
											
										</td>
										<td>
										<div>
											 
											
												
												<div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="no1" id="no1" value="">
												</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="no2" id="no2" value="">
												</div>
											</div><br><br>
											
											
											
											<div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="no3" id="no3" value="">
												</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="no4" id="no4" value="">
												</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="no5" id="no5" value="">
												</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="no6" id="no6" value="">
												</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="no7" id="no7" value="">
												</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="no8" id="no8" value="">
												</div>
											</div><br><br>
											  <div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="no9" id="no9" value="">
												</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="no10" id="no10" value="">
												</div>
											</div><br><br>
											  <div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="no11" id="no11" value="">
												</div>
											</div><br><br>
											
												</div>
												
											
											</div>
											
										</td>
										<td>
										<div>
											 
											
												
												<div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="tgl1" id="tgl1" value="">
												</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="tgl2" id="tgl2" value="">
												</div>
											</div><br><br>
											
											
											
											<div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="tgl3" id="tgl3" value="">
												</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="tgl4" id="tgl4" value="">
												</div>
											</div><br><br>
											<div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="tgl5" id="tgl5" value="">
												</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="tgl6" id="tgl6" value="">
												</div>
											</div><br><br>
											<div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="tgl7" id="tgl7" value="">
												</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="tgl8" id="tgl8" value="">
												</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="tgl9" id="tgl9" value="">
												</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="tgl10" id="tgl10" value="">
												</div>
											</div><br><br>
											 <div class="">
												<div class="col-md-12">
													<input type="text" class="form-control" disabled="disabled" name="tgl11" id="tgl11" value="">
												</div>
											</div><br><br>
											
												</div>
												
											
											</div>
											
											
										</td>
										<td>
										<div class="">
												<div class="col-md-9">
												
                                             <input type="checkbox" class="flat" name="berkas[]" value="Ijazah"> Ijazah<br>
											
                                             <input type="checkbox" class="flat" name="berkas[]" value="Kartu Keluarga"> Kartu Keluarga<br>
											 <input type="checkbox" class="flat" name="berkas[]" value="Surat Kerja"> Surat Kerja<br>
											 <input type="checkbox" class="flat" name="berkas[]" value="Akta Nikah"> Akta Nikah<br>
											 <input type="checkbox" class="flat" name="berkas[]" value="Akta Cerai Mati"> Akta Cerai Mati<br>
											 <input type="checkbox" class="flat" name="berkas[]" value="Akta Cerai Hidup"> Akta Cerai Hidup<br>
											
												</div><br><br>
												
											
											</div>
										</td>
									 
									
                                     
                                    </tr>
                                          
                                        </tbody>
                                    </table>
											 
									<center><button class="btn btn-primary">Proses Permohonan</button></center>		 
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