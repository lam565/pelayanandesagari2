<?php
include "connect.php";

include "assets/fromawi.php";

$bulan = date('n');
$romawi= getRomawi($bulan);
$tahun = date ('Y');
$nomor = "/".$romawi."/".$tahun;
$query = "SELECT max(id_kelahiran) as maxKode FROM kelahiran WHERE month(tanggal_lapor)='$bulan'";
$hasil = mysqli_query($connect,$query);
$data  = mysqli_fetch_array($hasil);
$no= substr($data['maxKode'],6,4);
$noUrut= (int)$no + 1;
$kode =  sprintf("%04s", $noUrut);
$no_surat = "474.1/".$kode.$nomor;

$no_kk=$_POST['no_kk'];
$nik_ayah=$_POST['nik_ayah'];
$nik_ibu=$_POST['nik_ibu'];
$nik_pelapor=$_POST['nik_pelapor'];
$no_hp_pel=$_POST['no_telp_pel'];
$nik_saksi1=$_POST['nik_saksiI'];
$nik_saksi2=$_POST['nik_saksiII'];
$tanggal_lapor=date('Y-m-d');
$username=$_POST['username'];

$tmp_lahir=$_POST['tmp_lahir'];
$tgl_lahir=$_POST['tgl_lhr'];
$tmp_dilahirkan=$_POST['tmp_dilahirkan'];
$jam=$_POST['jam_lahir'];
$jenis_kelahiran=$_POST['jns_kelahiran'];
$penolong=$_POST['penolong_kelahiran'];

$nama_anak=$_POST['nama_bayi'];
$jns_kel_bayi=$_POST['jenis_kel'];
$anak_ke=$_POST['anak_ke'];
$brt_bayi=$_POST['brt_bayi'];
$pnj_bayi=$_POST['pnj_bayi'];
$nama_bayi="";
$jenis_kel="";
$lahir_ke="";
$berat="";
$panjang="";
$j=count($nama_anak);
for ($key=0;$key<$j;$key++) {
	if ($key==0) {
		$nama_bayi.=$nama_anak[$key];
		$jenis_kel.=$jns_kel_bayi[$key];
		$lahir_ke.=$anak_ke[$key];
		$berat.=$brt_bayi[$key];
		$panjang.=$pnj_bayi[$key];
	} else {
		$nama_bayi.="-".$nama_anak[$key];
		$jenis_kel.="-".$jns_kel_bayi[$key];
		$lahir_ke.="-".$anak_ke[$key];
		$berat.="-".$brt_bayi[$key];
		$panjang.="-".$pnj_bayi[$key];
	}
	
}


$ttd=$_POST['ttd'];

$dtberkas=$_POST['berkas'];
$berkas="";
foreach ($dtberkas as $lamp) {
	$berkas.=",".$lamp;
}

$berkasnya=substr($berkas, 1);

$sql="insert into kelahiran values('$no_surat','$no_kk','$nik_ayah','$nik_ibu','$nik_pelapor','$no_hp_pel',
'$nik_saksi1','$nik_saksi2','','$tanggal_lapor','$ttd','$username','1')";

$results=mysqli_query($connect,$sql)or die("error:".mysqli_error($connect));

if ($results){
	$qdetail="insert into detail_kelahiran (id_kelahiran,nama_anak,jenis_kelamin,tempat_lahir,tanggal_lahir,
	tempat_dilahirkan,jam,jenis_kelahiran,lahir_ke,persalinan,berat_bayi,panjang_bayi) 
	VALUES ('$no_surat','$nama_bayi','$jenis_kel','$tmp_lahir','$tgl_lahir','$tmp_dilahirkan','$jam','$jenis_kelahiran','$lahir_ke','$penolong','$berat','$panjang')";
	$rdetail=mysqli_query($connect,$qdetail)or die("error:".mysqli_error($connect));
	if ($rdetail) {
		echo "<script>alert('Data Berhasil Disimpan'); window.location = 'form_kelahiran.php?err=0'</script>";
	} else {
		header("location:form_kelahiran.php?err=2");
	}

} else {
	header("location:form_kelahiran.php?err=1");
}

//header("location:cetak_perm_kelahiran.php?id_kelahiran=$no_surat")
//header("location:form_kelahiran.php");

?>