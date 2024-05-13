<?php
include "connect.php";
include "assets/fromawi.php";

$bulan = date('n');
$romawi= getRomawi($bulan);
$tahun = date ('Y');
$nomor = "/".$romawi."/".$tahun;
$query = "SELECT max(id_datang) as maxKode FROM pindah_datang WHERE month(tanggal_lapor)='$bulan'";
$hasil = mysqli_query($connect,$query);
$data  = mysqli_fetch_array($hasil);
$no= substr($data['maxKode'],6,4);
$noUrut= (int)$no + 1;
$kode =  sprintf("%04s", $noUrut);
$no_surat = "471.1/".$kode.$nomor;

$no_kk_asal=$_POST['no_kk_pendatang'];
$nik_kep_asal=$_POST['nik_kk_pendatang'];
$nama_kep_asal=$_POST['nama_kep_pendatang'];
$alamat_asal=$_POST['alamat_pendatang'];
$dusun_asal=$_POST['dusun_pendatang'];
$rw_asal=$_POST['RT_pendatang'];
$rt_asal=$_POST['RW_pendatang'];
$desa_asal=$_POST['kelurahan_pendatang'];
$kecamatan_asal=$_POST['kecamatan_pendatang'];
$kabupaten_asal=$_POST['kabupaten_pendatang'];
$propinsi_asal=$_POST['propinsi_pendatang'];
$kode_pos_asal=$_POST['kode_pos_pendatang'];

if ($propinsi_asal=='34') {
	if ($kabupaten_asal=='3403') {
		if ($kecamatan_asal=='340301') {
			if ($desa_asal=='3403012004') {
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

$nik_pemohon=$_POST['nik_pemohon'];
$nama_pemohon=$_POST['nama_pemohon'];
$tlp_pemohon=$_POST['no_telp_pemohon'];
$nik_anggota="";
if (isset($_POST['nik_anggota']) AND !empty($_POST['nik_anggota'])){
	foreach ($_POST['nik_anggota'] as $nik) {
		$nik_anggota.=",".$nik;
	}
}
$nama_anggota="";
if (isset($_POST['nama_anggota']) AND !empty($_POST['nama_anggota'])){
	foreach ($_POST['nama_anggota'] as $nama) {
		$nama_anggota.=",".$nama;
	}
}
$nik_anggota=substr($nik_anggota, 1);
$nama_anggota=substr($nama_anggota, 1);

$status_pindah=$_POST['stat_kk'];

$no_kk7=$_POST['no_kk'];
$alamat7=$_POST['alamat'];
$rt7=$_POST['RT'];
$rw7=$_POST['RW'];
$dusun7=$_POST['dusun'];
$kelurahan7=$_POST['desa'];
$kecamatan7=$_POST['kecamatan'];
$kabkot7=$_POST['kabupaten'];
$propinsi7=$_POST['propinsi'];
$kode_pos7=$_POST['kode_pos'];

$username=$_POST['username'];
$tanggal_datang=$_POST['tgl_kedatangan'];
$tanggal_lapor=date("Y-m-d");

$dtberkas=$_POST['berkas'];
$berkas="";
foreach ($dtberkas as $lamp) {
	$berkas.=",".$lamp;
}
$berkasnya=substr($berkas, 1);

$sql="insert into pindah_datang values('$no_surat','$kategori','$nik_anggota','$nama_anggota','$no_kk_asal','$nama_kep_asal','$nik_kep_asal','$alamat_asal','$dusun_asal','$rt_asal','$rw_asal','$desa_asal','$kecamatan_asal','$kabupaten_asal','$propinsi_asal','$kode_pos_asal','$tlp_pemohon','$nik_pemohon','$nama_pemohon','$status_pindah','$no_kk7','$alamat7','$dusun7','$rt7','$rw7','$kelurahan7','$kecamatan7','$kabkot7','$propinsi7','$kode_pos7','$tanggal_datang','$tanggal_lapor','$berkasnya','$username','1')";

$results=mysqli_query($connect,$sql)or die("error:".mysqli_error($connect));
$err="0";
if ($results) {
	echo "<script>alert('Data Berhasil Disimpan'); window.location = 'form_perm_datang.php?err=0'</script>";
} else {
	$err="1";
}
//header("location:cetak_perm_datang.php?id=".$no_surat);
//header("location:form_perm_datang.php");

?>