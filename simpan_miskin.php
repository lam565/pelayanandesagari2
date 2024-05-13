<?php
include "connect.php";
session_start();
$no_surat=$_POST['no_surat'];
$nik=$_POST['NIK'];
$tanggal=date('Y-m-d');
$nama_1=$_POST['nama_1'];
$NIK_1=$_POST['NIK_1'];
$TMPT_LHR_1=$_POST['TMPT_LHR_1'];
$TGL_LHR_1=$_POST['TGL_LHR_1'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$sekolah=$_POST['sekolah'];
$fak_jurusan_prodi=$_POST['fak_jurusan_prodi'];
$kelas_semester=$_POST['kelas_semester'];
$username=$_POST['username'];
$staf=$_POST['staf'];


$sql="insert into s_miskin values('$no_surat','$nik','$tanggal','$nama_1','$NIK_1
','$TMPT_LHR_1','$TGL_LHR_1','$jenis_kelamin','$sekolah','$fak_jurusan_prodi','$kelas_semester','$staf','$username','1')";
$results=mysqli_query($connect,$sql)or die("error:".mysqli_error($connect));
if ($results) {
    echo "<script>alert('Data Berhasil Disimpan'); window.location = 'tb_surat.php?err=0'</script>";
} else {
    echo "Terjadi Kesalahan Silahkan tekan Kembali";
}
?>