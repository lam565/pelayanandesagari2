<?php

$fdetail_bayi="<hr><div class=\"form-group\">
	<label class=\"col-md-3 control-label\" for=\"inputDefault\">Nama Bayi</label>
	<div class=\"col-md-6\">
		<input type=\"text\" required=\"required\" placeholder=\"Nama Bayi\" class=\"form-control\" name=\"nama_bayi[]\" id=\"nama_bayi\" value=\"\">
	</div>
</div>
<div class=\"form-group\">
	<label class=\"col-md-3 control-label\" for=\"inputDefault\">Jenis Kelamin</label>
	<div class=\"col-md-3\">
		<select name=\"jenis_kel[]\" >
			<option value=\"1\">Laki - laki</option>
			<option value=\"2\">Perempuan</option>
		</select>
	</div>
	<label class=\"col-md-3 control-label\" for=\"inputDefault\">Anak Ke</label>
	<div class=\"col-md-3\">
		<input type=\"text\" class=\"form-control\" placeholder=\"Anak Ke-\" required=\"required\" name=\"anak_ke[]\" id=\"anak_ke\" value=\"\">
	</div>
</div>
<div class=\"form-group\">
	<label class=\"col-md-3 control-label\" for=\"inputDefault\">Berat Bayi (Kg)</label>
	<div class=\"col-md-3\">
		<input type=\"text\" required=\"required\" placeholder=\"Berat Bayi\" class=\"form-control\" name=\"brt_bayi[]\" id=\"brt_bayi\" value=\"\">
	</div>
	<label class=\"col-md-3 control-label\" for=\"inputDefault\">Panjang Bayi (Cm)</label>
	<div class=\"col-md-3\">
		<input type=\"text\" required=\"required\" placeholder=\"Panjang Bayi\" class=\"form-control\" name=\"pnj_bayi[]\" id=\"pnj_bayi\" value=\"\">
	</div>
</div>";

echo $fdetail_bayi;

?>