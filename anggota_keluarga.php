<?php
header("Content-Type: application/json; charset=UTF-8");
include "connect.php";


$nokk = $_POST["no_kk"];
$nikp = $_POST["nikp"];

// Query ke database.
$query  = mysqli_query($connect,"SELECT * FROM biodata_wni,data_keluarga 
WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.NIK!='$nikp' 
AND biodata_wni.NO_KK='$nokk' ORDER BY STAT_HBKEL ASC ");
// Format bentuk data untuk autocomplete.
$output="";
while($data=mysqli_fetch_array($query)) {
	$output.="<tr><td>".$data['NIK']."</td><td>".$data['NAMA_LGKP']."</td><td><input type=\"checkbox\" name=\"anggota[]\" value=\"".$data['NIK']."\"></td></tr>"; 
}

if (! empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}
?>