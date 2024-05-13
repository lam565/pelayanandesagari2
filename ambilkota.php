<?php
include("connect.php");
$propinsi = $_GET['propinsi'];
$kota = "SELECT id_kabkot,nama_kabkot FROM kabkot WHERE id_provinsi='$propinsi' order by nama_kabkot";
$results = mysqli_query($connect,$kota) or die("Error: ".mysqli_error($connect));
echo "<option>--Kabkot--</option>";
while($k = mysqli_fetch_array($results)){
    echo "<option value=\"".$k['id_kabkot']."\">".$k['nama_kabkot']."</option>\n";
}
?>

