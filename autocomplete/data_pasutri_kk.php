<?php
header("Content-Type: application/json; charset=UTF-8");
include "../connect.php";


$nokk = $_GET["query"];

// Query ke database.
$query  = $connect->query("SELECT * FROM biodata_wni,data_keluarga WHERE biodata_wni.NO_KK LIKE '%$nokk%' AND data_keluarga.NO_KK=biodata_wni.NO_KK ORDER BY biodata_wni.NAMA_KEP");
$result = $query->fetch_all(MYSQLI_ASSOC);

// Format bentuk data untuk autocomplete.
foreach($result as $data) {
    switch ($data['STAT_HBKEL']) {
        case '1':
        $nik_ayah=$data['NIK'];
        $nama_ayah=$data['NAMA_LGKP'];
        break;
        case '3':
        $nik_ibu=$data['NIK'];
        $nama_ibu=$data['NAMA_LGKP'];
        break;
        
        default:
            # code...
        break;
    }
    $qa=mysqli_query($connect,"SELECT COUNT(STAT_HBKEL) AS JML FROM biodata_wni WHERE NO_KK='$data[NO_KK]' AND STAT_HBKEL='4' ");
    $anak=mysqli_fetch_array($qa);

    $output['suggestions'][] = [
        'value' => $data['NO_KK']." - ".$data['NAMA_KEP'],
        'nik_ayah'  => $data['NO_KK'],
        'nik_ayah'  => $nik_ayah,
        'nama_ayah' => $nama_ayah,
        'nik_istri' => $nik_ibu,
        'nama_istri' => $nik_ibu,
        'anak_ke' => $anak['JML']+1
    ];
}

if (! empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}
?>