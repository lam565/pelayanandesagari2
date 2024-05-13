<?php
header("Content-Type: application/json; charset=UTF-8");
include "../connect.php";


$nik = $_GET["query"];

// Query ke database.
$query  = mysqli_query($connect,"SELECT NIK,NAMA_LGKP,NO_KK FROM biodata_wni WHERE NIK LIKE '%$nik%' OR NAMA_LGKP LIKE '$nik%' ORDER BY NIK DESC");
// Format bentuk data untuk autocomplete.
while($data=mysqli_fetch_array($query)) {
    $output['suggestions'][] = [
        'value' => $data['NIK']." - ".$data['NAMA_LGKP'],
        'nik'  => $data['NIK'],
        'nama' => $data['NAMA_LGKP'],
		'no_kk' => $data['NO_KK'],
		'kwr_pelapor' => 'WNI',
		'no_dokumen' => '-'
		
    ];
}

if (! empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}
?>