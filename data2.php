<?php
//connect ke database
    include "connect.php";
//harus selalu gunakan variabel term saat memakai autocomplete,
//jika variable term tidak bisa, gunakan variabel q
$term = trim(strip_tags($_GET['term']));
  
$qstring = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan,agama,jenis_kelamin,golongan_darah,status_perkawinan,pendidikan_terakhir,kelainan_fisik,akte_kelahiran 
WHERE biodata_wni.NO_KK=data_keluarga.NO_KK 
and biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
and golongan_darah.GOL_DRH=biodata_wni.GOL_DRH 
and biodata_wni.AGAMA=agama.AGAMA 
and status_perkawinan.STAT_KWN=biodata_wni.STAT_KWN 
and biodata_wni.JENIS_KLMIN=jenis_kelamin.JENIS_KLMIN
and biodata_wni.PDDK_AKH=pendidikan_terakhir.PDDK_AKH 
and biodata_wni.AKTA_LHR=akte_kelahiran.AKTA_LHR
and biodata_wni.KLAIN_FSK=kelainan_fisik.KLAIN_FSK 
and biodata_wni.NAMA_LGKP  LIKE '".$term."%'";
//query database untuk mengecek tabel anime
$result = mysqli_query($connect,$qstring);
  
while ($row = mysqli_fetch_array($result))
{
	$tampil=$row['NAMA_LGKP'].'-'.$row['NIK'];
    $row['value']=htmlentities(stripslashes($tampil));
    $row['NIK']=$row['NIK'];
//buat array yang nantinya akan di konversi ke json
    $row_set[] = $row;
}
//data hasil query yang dikirim kembali dalam format json
echo json_encode($row_set);
?>
