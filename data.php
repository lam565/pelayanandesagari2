<?php
//connect ke database
  include "connect.php";
//harus selalu gunakan variabel term saat memakai autocomplete,
//jika variable term tidak bisa, gunakan variabel q
$term = trim(strip_tags($_GET['term']));
  
$qstring = "SELECT * FROM biodata_wni,data_keluarga,agama,pendidikan_terakhir
 WHERE biodata_wni.NO_KK=data_keluarga.NO_KK and biodata_wni.AGAMA=agama.AGAMA and pendidikan_terakhir.PDDK_AKH=biodata_wni.PDDK_AKH and biodata_wni.NAMA_LGKP  LIKE '$term%' ORDER BY biodata_wni.NAMA_LGKP";
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
