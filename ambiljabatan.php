<?php
include("connect.php");
$staf = $_GET['staf'];
$kmp = "SELECT id_jabatan,nama_jabatan FROM jabatan WHERE id_staf='$staf' order by nama_jabatan";
$results = mysqli_query($connect,$kmp) or die("Error: ".mysqli_error($connect));
while($k = mysqli_fetch_array($results)){
    echo "<option value=\"".$k['id_jabatan']."\">".$k['nama_jabatan']."</option>\n";
}
?>