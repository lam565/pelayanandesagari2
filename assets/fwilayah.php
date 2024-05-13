<?php
function getDesa($con,$id){
   $qwil=mysqli_query($con,"SELECT nama FROM kelurahan WHERE id_kel='$id'");
   $dt=mysqli_fetch_array($qwil);
   return $dt['nama'];
}
function getKec($con,$id){
   $qwil=mysqli_query($con,"SELECT nama FROM kecamatan WHERE id_kec='$id'");
   $dt=mysqli_fetch_array($qwil);
   return $dt['nama'];
}
function getKab($con,$id){
   $qwil=mysqli_query($con,"SELECT nama FROM kabupaten WHERE id_kab='$id'");
   $dt=mysqli_fetch_array($qwil);
   return $dt['nama'];
}
function getProv($con,$id){
   $qwil=mysqli_query($con,"SELECT nama FROM provinsi WHERE id_prov='$id'");
   $dt=mysqli_fetch_array($qwil);
   return $dt['nama'];
}
?>