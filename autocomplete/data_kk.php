<?php
header("Content-Type: application/json; charset=UTF-8");
include "../connect.php";


$nokk = $_GET["query"];

// Query ke database.
$query  = mysqli_query($connect, "SELECT * FROM biodata_wni,data_keluarga WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.NO_KK LIKE '%$nokk%' GROUP BY data_keluarga.NO_KK ORDER BY data_keluarga.NAMA_KEP DESC ");


// Format bentuk data untuk autocomplete.
while ($data = mysqli_fetch_array($query)) {
    $output['suggestions'][] = [
        'value' => $data['NO_KK'] . " - " . $data['NAMA_KEP'],
        'no_kk'  => $data['NO_KK'],
        'nik_kk'  => $data['NIK_KK'],
        'nama_kep' => $data['NAMA_KEP'],
        'alamat' => $data['ALAMAT'],
        'dusun' => $data['DUSUN'],
        'rt' => $data['NO_RT'],
        'rw' => $data['NO_RW'],
        'kd_pos' => $data['KODE_POS']
    ];
}

if (!empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}
