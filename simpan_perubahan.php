<?php
error_reporting(1);
include "connect.php";
session_start();

//key
$nik_pemohon = $_POST['nik_pemohon'];
$no_kk = $_POST['no_kk'];
$orang = $_POST['orang'];

$elemen = array(
    "PDDK_AKH" => "pdd_akh",
    "JENIS_PKRJN" => "jns_pkrjn",
    "AGAMA" => "agama",
    "GOL_DRH" => "goldar",
    "STAT_KWN" => "status",
    "STAT_HBKEL" => "shbk",
    "NAMA_LGKP" => "nama_lgkp",
    "JENIS_KLMIN" => "jklmin",
    "TMPT_LHR" => "tmptlhr",
    "TGL_LHR" => "tgl_lhr"
);

$jkel = count($orang['data']['nik']);

function cekBeda($awal, $ahir)
{
    if ($awal == $ahir || $ahir == "") {
        return 0;
    } else {
        return 1;
    }
}

$squery = "";

for ($i = 0; $i < $jkel; $i++) {

    $query_upd = "UPDATE biodata_wni SET ";
    $query_ins = "";

    foreach ($elemen as $col => $val) {
        $awal = $orang['data'][$val]['awal'][$i];
        $ahir = $orang['data'][$val]['ahir'][$i];
        $dasar = $orang['data'][$val]['dasar'][$i];
        if (cekBeda($awal, $ahir)) {
            $query_upd = $query_upd . " $col = '$ahir',";
        }
    }
    $query_upd = substr($query_upd, 0, -1) . " WHERE NIK = " . $orang['data']['nik'][$i];

    //jika update berhasil
    if (1) {
        $query_d = "INSERT INTO riwayat_perubahan ( ";
        $query_b = ") VALUES (";
        foreach ($elemen as $col => $val) {
            $awal = $orang['data'][$val]['awal'][$i];
            $ahir = $orang['data'][$val]['ahir'][$i];
            $dasar = $orang['data'][$val]['dasar'][$i];

            $query_d = $query_d . " " . $col . "_awal, " . $col . "_ahir, " . $col . "_dasar,";
            $query_b = $query_b . " '$awal', '$ahir', '$dasar',";
        }
        $query_ins = substr($query_d, 0, -1) . substr($query_b, 0, -1) . ")";
    }

    echo $query_upd . "<br/>";
    echo $query_ins  . "<br/><br/>";
}

// echo $jkel;

// foreach ($pddk_akh as $state) {
//     foreach ($state as $key => $value){
//         echo $key .":". $value . "<br>";
//     } 
// }


// $nik=$_POST['nik_pemohon'];
// $no_kk=$_POST['no_kk'];

// $pendidikan=$_POST['pendidikan'];
// $dasar=$_POST['dasar'];
// $nikk=$_POST['nik'];

// $sql2="update biodata_wni set PDDK_AKH='$pendidikan' where NIK='$nikk'";
// $results2=mysqli_query($connect,$sql2)or die("error:".mysqli_error($connect));

//echo "<script>window.location='pdf_perubahan.php?nik=$nik_pemohon&no_kk=$no_kk';</script>";
