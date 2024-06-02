<?php
error_reporting(1);
include "connect.php";
session_start();

//key
$nik_pemohon = $_POST['nik_pemohon'];
$no_kk = $_POST['no_kk'];
$orang = $_POST['orang'];

$q = mysqli_query($connect, "SELECT max(ID_RIWAYAT) as maxid FROM riwayat_perubahan");
$data = mysqli_fetch_array($q);
$idr = $data['maxid'];
$urt = (int) substr($idr, 3, 3);
$urt++;
$idr = "RWY" . sprintf("%04s", $urt);

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


$ada = 0;
for ($i = 0; $i < $jkel; $i++) {
    $nik = $orang['data']['nik'][$i];
    $query_upd = "";
    $query_ins = "";
    $msg = "";

    foreach ($elemen as $col => $val) {
        $awal = $orang['data'][$val]['awal'][$i];
        $ahir = strip_tags(htmlspecialchars(trim($orang['data'][$val]['ahir'][$i])));
        $dasar = $orang['data'][$val]['dasar'][$i];
        if (cekBeda($awal, $ahir)) {
            $query_upd = $query_upd . " $col = '$ahir',";
            $msg = $msg . " $col,";
        }
    }
    if ($query_upd != "") {
        $query_upd = "UPDATE biodata_wni SET " . substr($query_upd, 0, -1) . " WHERE NIK = '$nik'";
        $ada++;
        //jika update berhasil
        if (mysqli_query($connect, $query_upd)) {
            $msg = "Berhasil mengubah data" . substr($msg, 0, -1);
            $query_d = "INSERT INTO det_riwayat_perubahan ( ID_RIWAYAT, NIK, ";
            $query_b = ") VALUES ( '$idr', '$nik', ";
            foreach ($elemen as $col => $val) {
                $awal = $orang['data'][$val]['awal'][$i];
                $ahir = $orang['data'][$val]['ahir'][$i];
                $dasar = $orang['data'][$val]['dasar'][$i];

                $query_d = $query_d . " " . $col . "_awal, " . $col . "_ahir, " . $col . "_dasar,";
                $query_b = $query_b . " '$awal', '$ahir', '$dasar',";
            }
            $query_ins = substr($query_d, 0, -1) . substr($query_b, 0, -1) . ")";
            mysqli_query($connect, $query_ins) or die("error:" . mysqli_error($connect));
        } else {
            $msg = "0";
        }
    } else {
        $msg = "404";
    }
}

if ($ada > 0) {
    echo "$query insert riwayat";
} else {
    echo "Tampilkan $msg";
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
