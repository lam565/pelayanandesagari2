<?php
include "../connect.php";

$prop=$_POST['id_prop'];

$qprop=mysqli_query($connect,"SELECT * FROM kabupaten WHERE id_prov='$prop' ORDER BY nama");
echo "<option value=\"\">Pilih</option>";
while ($dtprop=mysqli_fetch_array($qprop)) {
	echo "<option value='$dtprop[id_kab]'>$dtprop[nama]</option>";
}
?>