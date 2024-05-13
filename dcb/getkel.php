<?php
include "../connect.php";

$kec=$_POST['id_kec'];

$qkec=mysqli_query($connect,"SELECT * FROM kelurahan WHERE id_kec='$kec' ORDER BY nama");
echo "<option value=\"\">Pilih</option>";
while ($dtkel=mysqli_fetch_array($qkec)) {
	echo "<option value='$dtkel[id_kel]'>$dtkel[nama]</option>";
}
?>