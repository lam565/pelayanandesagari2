<?php
header("Content-Type: application/json; charset=UTF-8");
include "../connect.php";


$nama = $_GET["query"];

// Query ke database.
$query  =mysqli_query($connect,"SELECT biodata_wni.NIK,biodata_wni.NAMA_LGKP,biodata_wni.NO_KK, biodata_wni.TMPT_LHR, biodata_wni.TGL_LHR FROM biodata_wni,data_keluarga WHERE biodata_wni.NAMA_LGKP LIKE '%$nama%' AND data_keluarga.NO_KK=biodata_wni.NO_KK AND JENIS_KLMIN='1' AND STAT_KWN='2' ORDER BY biodata_wni.NAMA_LGKP");

// Format bentuk data untuk autocomplete.
while($data=mysqli_fetch_array($query)) {
	$qi=mysqli_query($connect,"SELECT * FROM data_keluarga,biodata_wni WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.NO_KK='$data[NO_KK]' AND biodata_wni.STAT_HBKEL='3'");
	$istri=mysqli_fetch_array($qi);
    $output['suggestions'][] = [
        'value' => $data['NIK']." - ".$data['NAMA_LGKP'],
        'nik'  => $data['NIK'],
        'no_kk' => $data['NO_KK'],
        'nama' => $data['NAMA_LGKP'],
        'tmpt_lahir_s' => $data['TMPT_LHR'],
        'tgl_lahir_s' => $data['TGL_LHR'],
        'wargan_s' => 'WNI',
        'nik_istri' => $istri['NIK'],
        'nama_istri' => $istri['NAMA_LGKP'],
        'tmpt_lahir_i' => $istri['TMPT_LHR'],
        'tgl_lahir_i' => $istri['TGL_LHR'],
        'wargan_i' => 'WNI'
    ];
}

if (! empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}
?>