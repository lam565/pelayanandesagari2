<?php
include "../connect.php";

$kab=$_POST['id_kab'];

$qkab=mysqli_query($connect,"SELECT * FROM kecamatan WHERE id_kab='$kab' ORDER BY nama");
echo "<option value=\"\">Pilih</option>";
while ($dtkec=mysqli_fetch_array($qkab)) {
	echo "<option value='$dtkec[id_kec]'>$dtkec[nama]</option>";
}
?>