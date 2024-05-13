<?php
header("Content-Type: application/json; charset=UTF-8");
include "../connect.php";


$nik = $_GET["query"];

// Query ke database.
$query  = mysqli_query($connect,"SELECT NIK,NAMA_LGKP,biodata_wni.NO_KK,NAMA_KEP,NIK_KK,status_hubungan.status_hubungan 
FROM biodata_wni,data_keluarga,status_hubungan 
WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND status_hubungan.STAT_HBKEL=biodata_wni.STAT_HBKEL 
AND NIK LIKE '%$nik%' ORDER BY NIK DESC ");
// Format bentuk data untuk autocomplete.
while($data=mysqli_fetch_array($query)) {
	
    $output['suggestions'][] = [
        'value' => $data['NIK']." - ".$data['NAMA_LGKP'],
        'nik'  => $data['NIK'],
        'nama' => $data['NAMA_LGKP'],
        'nik_kk'  => $data['NIK_KK'],
        'no_kk'  => $data['NO_KK'],
        'nama_kep' => $data['NAMA_KEP'],
		'status' => $data['status_hubungan']
    ];
}

if (! empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}
?>