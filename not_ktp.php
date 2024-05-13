<?php
session_start();
include "connect.php";

$no_surat=$_GET['id'];

$a="update suket_ektp set bc='3' where id_ektp='$no_surat' ";
$b=mysqli_query($connect,$a) or die ("error:".mysqli_error($connect));

if ($_SESSION['username']=='ngijorejo'){
echo "<script>window.location='ngijorejo.php';</script>";
}
if ($_SESSION['username']=='kalidadap'){
echo "<script>window.location='kalidadap.php';</script>";
}
if ($_SESSION['username']=='jatirejo'){
echo "<script>window.location='jatirejo.php';</script>";
}
if ($_SESSION['username']=='gatak'){
echo "<script>window.location='gatak.php';</script>";
}
if ($_SESSION['username']=='gari'){
echo "<script>window.location='gari.php';</script>";
}
if ($_SESSION['username']=='gelung'){
echo "<script>window.location='gelung.php';</script>";
}
if ($_SESSION['username']=='tegalrejo'){
echo "<script>window.location='tegalrejo.php';</script>";
}
if ($_SESSION['username']=='ngelorejo'){
echo "<script>window.location='ngelorejo.php';</script>";
}
if ($_SESSION['username']=='gondangrejo'){
echo "<script>window.location='gondangrejo.php';</script>";
}

?>