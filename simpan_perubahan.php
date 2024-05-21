<?php
error_reporting(1);
include "connect.php";
session_start();

//key
$nik_pemohon = $_POST['nik_pemohon'];
$no_kk = $_POST['no_kk'];
$orang = $_POST['orang'];

$elemen = array("pdd_ahr", "jns_pkrjn", "agama", "goldar", "status", "shbk", "nama_lgkp", "jklmin", "tmptlhr", "tgl_lhr");
$jkel = count($orang['data']['nik']);

function cekBeda($awal, $ahir)
{
    if ($awal == $ahir || $ahir == "") {
        return "sama";
    } else {
        return "beda";
    }
}

$squery = "";

for ($i = 0; $i < $jkel; $i++) {
    foreach ($elemen as $val) {
        echo $val . " adalah : ";
        $awal = $orang['data'][$val]['awal'][$i];
        $ahir = $orang['data'][$val]['ahir'][$i];
        echo cekBeda($awal, $ahir) . "<br>";
        echo $val . " dasar : " . $orang['data'][$val]['dasar'][$i] . "<br><br>";
    }
    echo $orang['data']['tgl_lhr']['awal'][$i] . "<br>";
    echo $orang['data']['tgl_lhr']['ahir'][$i] . "<br><br>";
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
