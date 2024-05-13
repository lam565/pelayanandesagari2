<?php
include "connect.php";
include "assets/fromawi.php";

$bulan = date('n');
$romawi= getRomawi($bulan);
$tahun = date ('Y');
$nomor = "/".$romawi."/".$tahun;
$query = "SELECT max(id_keluar) as maxKode FROM pindah_keluar WHERE month(tanggal_lapor)='$bulan'";
$hasil = mysqli_query($connect,$query);
$data  = mysqli_fetch_array($hasil);
$no= substr($data['maxKode'],6,4);
$noUrut= (int)$no + 1;
$kode =  sprintf("%04s", $noUrut);
$no_surat = "471.1/".$kode.$nomor;

$no_kk=$_POST['no_kk'];
$nik_pemohon=$_POST['nik_pemohon'];
$anggota="";
if (isset($_POST['anggota']) AND !empty($_POST['anggota'])){
	$anggota=implode(",", $_POST['anggota']);
} else {
	
}
$no_telp_pemohon=$_POST['no_telp_pemohon'];
$alasan_pindah=$_POST['alasan'];
$alamat=$_POST['alamat'];
$rt=$_POST['RT'];
$rw=$_POST['RW'];
$dusun=$_POST['dusun'];
$kelurahan=$_POST['kelurahan'];
$kecamatan=$_POST['kecamatan'];
$kabkot=$_POST['kabupaten'];
$propinsi=$_POST['propinsi'];
$kode_pos=$_POST['kode_pos'];

if ($propinsi=='34') {
	if ($kabkot=='3403') {
		if ($kecamatan=='340301') {
			if ($kelurahan=='3403012004') {
				$kategori="Antar Dusun Dalam Satu Kelurahan/Desa";
			} else {
				$kategori="Antar Kelurahan/Desa Dalam Satu Kecamatan";
			}
		} else {
			$kategori="Antar Kecamatan Dalam Satu Kabupaten";
		}
	} else {
		$kategori="Antar Kabupaten/Kota Dalam Satu Provinsi";
	}
} else {
	$kategori="Antar Kabupaten/Kota Atau Antar Provinsi";
}

$username=$_POST['username'];
$tanggal_permohonan=date("Y-m-d");

$getkep=mysqli_query($connect,"SELECT NIK_KK FROM biodata_wni,data_keluarga WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND data_keluarga.NIK_KK='$nik_pemohon'");
if (mysqli_num_rows($getkep)>0) {
	if (!empty($anggota)) {
		$qjkel=mysqli_query($connect,"SELECT COUNT(NIK) AS JKEL FROM biodata_wni WHERE NO_KK='$no_kk'");
		$j=mysqli_fetch_array($qjkel);
		$janggpindah=count($_POST['anggota'])+1;
		if ($j['JKEL']==$janggpindah) {
			$jenis_kepindahan="2";
		} else {
			$jenis_kepindahan="3";
		}
	} else {
		$jenis_kepindahan="1";
	}
} else {
	if(preg_match("/".$_POST['nik_kk']."/i", $anggota)) {
		$qjkel=mysqli_query($connect,"SELECT COUNT(NIK) AS JKEL FROM biodata_wni WHERE NO_KK='$no_kk'");
		$j=mysqli_fetch_array($qjkel);
		$janggpindah=count($_POST['anggota'])+1;
		if ($j['JKEL']==$janggpindah) {
			$jenis_kepindahan="2";
		} else {
			$jenis_kepindahan="3";
		}
	} else {
		$jenis_kepindahan="4";
	}
	
}
$kk_tdk_pindah=$_POST['tdk_pindah'];
$kk_pindah=$_POST['stat_pindah'];

$dtberkas=$_POST['berkas'];
$berkas="";
foreach ($dtberkas as $lamp) {
	$berkas.=",".$lamp;
}
$berkasnya=substr($berkas, 1);

$sql="insert into pindah_keluar values('$no_surat','$kategori','$no_kk','$nik_pemohon','$anggota','$no_telp_pemohon','$alasan_pindah','$alamat','$rt','$rw','$dusun','$kelurahan','$kecamatan','$kabkot','$propinsi','$kode_pos','$jenis_kepindahan','$kk_tdk_pindah','$kk_pindah','$berkasnya','$tanggal_permohonan','$username','1')";
$results=mysqli_query($connect,$sql)or die("error:".mysqli_error($connect));
$err="0";
if ($results) {
	echo "<script>alert('Data Berhasil Disimpan'); window.location = 'form_perm_pindah.php?err=0'</script>";
} else {
	echo "<script>alert('Terjadi Kesalahan dalam menyimpan data,\n Silahkan Ulangi!'); window.location = 'form_perm_pindah.php?err=1'</script>";
}


?>