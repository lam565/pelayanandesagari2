<?php
require_once "../fpdf/fpdf.php";

//FUNGSI MENGISI KOTAKAN
function isiKotak($pdf, $kata, $tKotak)
{
    $len = strlen($kata);
    $ckata = str_split($kata);
    for ($k = 0; $k < $len; $k++) {
        $pdf->Cell(4, 3.4, $ckata[$k], 1, 0, 'C');
    }
    while ($k < $tKotak) {
        $pdf->Cell(4, 3.4, '', 1, 0, 'C');
        $k++;
    }
}
//FUNGSI LABEL
function labelForm($pdf, $label)
{
    $pdf->Cell(65, 3.4, $label, 'L', 0, 'L');
    $pdf->Cell(3.4, 3.4, ':', 0, 0, 'L');
}


$pdf = new FPDF('P', 'mm', 'A4'); //A4 = 210 mm x 297mm
$pdf->Open();
$pdf->SetMargins(10, 5);
$pdf->AddPage();

$t1 = 3.4;
$t2 = 4;
$tab = 65;
$fz1 = 8;
$fz2 = 9;

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(145);
$pdf->Cell(0, 5, 'F-2.01', 1, 1, 'C');

$pdf->SetFont('Times', '', $fz1);
$pdf->Cell($tab, $t1, 'Provinsi', 0, 0, 'L');
$pdf->Cell(0, $t1, ': Daerah Istimewa Yogyakarta', 0, 1, 'L');
$pdf->Cell($tab, $t1, 'Kabupaten', 0, 0, 'L');
$pdf->Cell(0, $t1, ': Gunungkidul', 0, 1, 'L');

//Get Sesuai data
$pdf->Cell($tab, $t1, 'Kecamatan', 0, 0, 'L');
$pdf->Cell(0, $t1, ': [Kec]', 0, 1, 'L');
$pdf->Cell($tab, $t1, 'Desa', 0, 0, 'L');
$pdf->Cell(0, $t1, ': [desa]', 0, 1, 'L');
$pdf->Cell($tab, $t1, 'Kode Wilayah', 0, 0, 'L');
$pdf->Cell(3, $t1, ':', 0, 0, 'L');
//contoh kode wilayah
$kdwil = '02032018';
isiKotak($pdf, $kdwil, 8);
$pdf->Ln();

//JUDUL
$pdf->SetFont('Times', 'B', $fz1);
$pdf->Cell(0, $t2, 'FORMULIR PELAPORAN PENCATATAN SIPIL DI DALAM WILAYAH NKRI', 0, 1, 'C');
$pdf->Cell(0, $t2, 'Jenis Pelaporan Pencatatan Sipil', 0, 1, 'L');

$jenis = array('Kelahiran', 'Pengakuan Anak', 'Lahir Mati', 'Pengesahan Anak', 'Perkawinan', 'Perubahan Nama', 'Pembatalan Perkawinan', 'Perubahan Status Kewarganegaraan', 'Perceraian', 'Pencatatan Peristiwa Penting Lainnya', 'Pembatalan Perceraian', 'Pembetulan Akta', 'Kematian', 'Pembatalan Akta', 'Pengankatan Anak', 'Pelaporan Pencatatan Sipil Dari Luar Wilayah NKRI');

//JENIS PELAPORAN
$pdf->SetFont('Times', '', $fz1);
$nj = 1;
foreach ($jenis as $jp) {
    if ($nj % 2 != 0) {
        //colom 1
        $pdf->Cell($t1, $t1, ' ', 1, 0, 'C');
        $pdf->Cell($tab, $t1, $jp, 0, 0, 'L');
        $pdf->Cell(30);
    } else {
        //colom 2
        $pdf->Cell($t1, $t1, ' ', 1, 0, 'C');
        $pdf->Cell($tab, $t1, $jp, 0, 1, 'L');
    }
    $nj++;
}
$pdf->Ln(2);

//DATA PELAPOR
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t2, 'DATA PELAPOR', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);
labelForm($pdf, 'Nama');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'NIK');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Nomor Dokumen Perjalanan *');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Nomor Kartu Keluarga');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Kewarganegaraan');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(1);

//DATA SUBJECT AKTA KE SATU
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t2, 'DATA SUBJEK AKTA KESATU', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);
labelForm($pdf, 'Nama');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'NIK');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Nomor Dokumen Perjalanan *');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Nomor Kartu Keluarga');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Kewarganegaraan');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(1);

//DATA SUBJEK AKTA KEDUA (JIKA ADA)
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t2, 'DATA SUBJEK AKTA KEDUA (JIKA ADA)', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);
labelForm($pdf, 'Nama');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'NIK');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Nomor Dokumen Perjalanan *');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Nomor Kartu Keluarga');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Kewarganegaraan');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(1);

//DATA SAKSI - SAKSI
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t2, 'DATA SAKSI I', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);
labelForm($pdf, 'Nama');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'NIK');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Nomor Kartu Keluarga');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Kewarganegaraan');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t2, 'DATA SAKSI II', 'LR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);
labelForm($pdf, 'Nama');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'NIK');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Nomor Kartu Keluarga');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Kewarganegaraan');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(1);

//DATA ORANG TUA
$pdf->SetFont('Times', 'BIU', $fz2);
$pdf->Cell(0, $t2, 'DATA ORANG TUA** (Hanya diisi untuk keperluan pencatatan kelahiran, lahir mati dan kematian)', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);
labelForm($pdf, 'Nama Ayah');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'NIK Ayah');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Tempat Lahir Ayah');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Tanggal Lahir Ayah');
$pdf->Cell(4 * $t1, $t1, 'Tgl. ', 0, 0);
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln. ', 0, 0);
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn. ', 0, 0);
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Kewarganegaraan');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Nama Ibu');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'NIK Ibu');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Tempat Lahir Ibu');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Tanggal Lahir Ibu');
$pdf->Cell(4 * $t1, $t1, 'Tgl. ', 0, 0);
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln. ', 0, 0);
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn. ', 0, 0);
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, 'Kewarganegaraan');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(1);

//DATA ANAK
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t2, 'DATA ANAK', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);
labelForm($pdf, '1. Nama');
//isikan nama disini
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '2. Jenis Kelamin');
isiKotak($pdf, '', 1);
$pdf->Cell(10 * $t1, $t1, '1. Laki-laki ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(10 * $t1, $t1, '2. Perempuan ', 0, 0, 'L');
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '3. Tempat dilahirkan');
isiKotak($pdf, '', 1);
$pdf->Cell(5 * $t1, $t1, '1. RS/RB ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(7 * $t1, $t1, '2. Puskesmas ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '3. Polides ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '4. Rumah ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(7 * $t1, $t1, '5. Lainnya ', 0, 0, 'L');
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '4. Tempat Kelahiran');
//isikan tempat lahir disini
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '5. Hari dan tanggal lahir');
$pdf->Cell(5 * $t1, $t1, 'Hari: ', 0, 0);
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Tgl: ', 0, 0);
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln: ', 0, 0);
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn: ', 0, 0);
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '6. Pukul');
//isikan pukul disini
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '7. Jenis Kelahiran');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '1. Tunggal ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '2. Kembar 2 ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '3. Kembar 3 ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '4. Kembar 4 ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(7 * $t1, $t1, '5. Lainnya ', 0, 0, 'L');
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '8. Kelahiran ke');
//isikan disini
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '9. Penolong Kelahiran');
isiKotak($pdf, '', 1);
$pdf->Cell(7 * $t1, $t1, '1. Dokter ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(10 * $t1, $t1, '2. Bidan/Perawat ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(7 * $t1, $t1, '3. Dukun ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(7 * $t1, $t1, '4. Lainnya ', 0, 0, 'L');
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '10. Berat Bayi');
$pdf->Cell(4 * $t1, $t1, '', 1, 0);
$pdf->Cell(3 * $t1, $t1, ' Kg', 0, 0);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '11. Panjang Bayi');
$pdf->Cell(4 * $t1, $t1, '', 1, 0);
$pdf->Cell(3 * $t1, $t1, ' Cm', 0, 0);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(1);


//HALAMAN 2
$pdf->AddPage();

//YANG LAHIR MATI
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t1, 'YANG LAHIR MATI', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);
labelForm($pdf, '1. Lamanya dalam kandungan');
isiKotak($pdf, '', 2);
$pdf->Cell(3 * $t1, $t1, ' Bulan', 0, 0);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '2. Jenis Kelamin');
isiKotak($pdf, '', 1);
$pdf->Cell(10 * $t1, $t1, '1. Laki-laki ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(10 * $t1, $t1, '2. Perempuan ', 0, 0, 'L');
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '3. Tanggal lahir mati');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '4. Jenis Kelahiran');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '1. Tunggal ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '2. Kembar 2 ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '3. Kembar 3 ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '4. Kembar 4 ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(7 * $t1, $t1, '5. Lainnya ', 0, 0, 'L');
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '5. Anak ke');
//isikan disini
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '6. Tempat dilahirkan');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '1. RS/RB ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '2. Puskesmas ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '3. Polides ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '4. Rumah ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '5. Lainnya ', 0, 0, 'L');
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '7. Penolong Kelahiran');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '1. Dokter ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '2. Bidan/Perawat ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '3. Dukun ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '4. Lainnya ', 0, 0, 'L');
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '8. Sebab lahir mati');
//isikan disini
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '9. Yang menentukan');
isiKotak($pdf, '', 1);
$pdf->Cell(5 * $t1, $t1, '1. Dokter ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(8 * $t1, $t1, '2. Bidan/Perawat ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '3. Tenaga Kes ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '4. Kepolisian ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '5. Lainnya ', 0, 0, 'L');
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '10. Tempat Kelahiran');
//isikan disini
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(1);

//PERKAWINAN ATAU PEMBATALAN PERKAWINAN
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t1, 'PERKAWINAN ATAU PEMBATALAN PERKAWINAN', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);

labelForm($pdf, '1. NIK Ayah dari Suami');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '2. Nama Ayah dari Suami');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '3. NIK Ibu dari Suami');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '4. Nama Ibu dari Suami');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '5. NIK Ayah dari Istri');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '6. Nama Ayah dari Istri');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '7. NIK Ibu dari Istri');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '8. Nama Ibu dari Istri');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '9. Status Perkawinan Sebelum Kawin');
isiKotak($pdf, '', 1);
$pdf->Cell(4 * $t1, $t1, 'Kawin ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(8 * $t1, $t1, 'Belum Kawin ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(8 * $t1, $t1, 'Cerai Hidup ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(8 * $t1, $t1, 'Cerai Mati', 0, 0, 'L');
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '10. Perkawinan yang Ke');
isiKotak($pdf, '', 1);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '11. Istri yang Ke (bagi yang poligami)');
isiKotak($pdf, '', 1);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '12. Tanggal Pembatalan Perkawinan');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '13. Tanggal Melapor');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '14. Jam Melapor');
isiKotak($pdf, '', 2);
$pdf->Cell(1 * $t1, $t1, ':', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '15. Agama');
isiKotak($pdf, '', 1);
$pdf->Cell(4 * $t1, $t1, '1. Islam ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(4 * $t1, $t1, '2. Kristen ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(4 * $t1, $t1, '3. Katolik ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(4 * $t1, $t1, '4. Hindu', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(4 * $t1, $t1, '5. Budha', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '6. Konghuchu', 0, 0, 'L');
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '16. Kepercayaan');
isiKotak($pdf, '', 1);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '17. Nama Organisasi Kepercayaan');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '18. Nama Pengadilan');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '19. Nomor Penetapan Pengadilan');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '20. Tanggal Penetapan Pengadilan');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '21. Nama Pemuka Agama/Kepercayaan');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '22. Nomor Surat Izin dari Perwakilan');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '23. Nomor Passport');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '24. Perjanjian Perkawinan dibuat oleh Notaris');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '25. Nomor Akta Notaris');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '26. Tanggal Akta Notaris');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '27. Jumlah Anak (Jika ada agar mengisi formulir');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, ' tambahan nama anak dan akta kelahiran anak ', 'LR', 1);

$pdf->Cell(0, 1, '', 'LR', 1);

$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t2, 'Bagi Pemohon Pembatalan Perkawinan Harap Mengisi Data di Bawah ini:', 'LR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);

labelForm($pdf, '1. Tanggal Perkawinan');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '2. Nomor Akta Perkawinan');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '3. Tanggal Akta Perkawinan');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '4. Nama Pengadilan');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '5. Nomor Putusan Pengadilan');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '6. Tanggal Putusan Pengadilan');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '7. Tanggal Pelaporan Perkawinan di Luar Negeri');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);


$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(1);
//END OF PERKAWINAN

//PERCERAIAN ATAU PEMBATALAN PERCERAIAN
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t1, 'PERCERAIAN ATAU PEMBATALAN PERCERAIAN', 'LTR', 1, 'L');
$pdf->Cell(0, 1, '', 'LR', 1);
$pdf->Cell(0, $t2, 'Yang mengajukan perceraian / pembatalan perceraian', 'LR', 1, 'L');


$pdf->SetFont('Times', '', $fz1);

labelForm($pdf, '1. Nomor Akta Perkawinan');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '2. Tanggal Akta Perkawinan');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '3. Tempat Pencatatan Perkawinan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '4. Nama Pengadilan');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '5. Tanggal Putusan Pengadilan');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '6. Nomor Putusan Pengadilan');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '7. Nomor Surat Keterangan Panitera Pengadilan');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '8. Tanggal Surat Keterangan Panitera Pengadilan');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '9. Tanggal Melapor');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, 1, '', 'LR', 1);

$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t2, 'Bagi Pemohon Pembatalan Perceraian Harap Mengisi Data di Bawah ini:', 'LR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);

labelForm($pdf, '1. Nomor Akta Perceraian');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '2. Tanggal Akta Perceraian');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '3. Tanggal Pelaporan Perceraian dari Luar Negeri');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(1);
//END OF PERCERAIAN

//KEMATIAN
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t1, 'KEMATIAN', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);

labelForm($pdf, '1. NIK');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '2. Nama Lengkap');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '3. Tanggal Kematian');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '4. Pukul');
isiKotak($pdf, '', 2);
$pdf->Cell(1 * $t1, $t1, ':', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '5. Sebab Kematian');
isiKotak($pdf, '', 1);
$pdf->Cell(8 * $t1, $t1, '1. Sakit Biasa / Tua ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(8 * $t1, $t1, '2. Wabah Penyakit ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(8 * $t1, $t1, '3. Kecelakaan ', 0, 0, 'L');
$pdf->Cell(0, $t1, '', 'R', 1);
$pdf->Cell(68.4, $t1, '', 'L', 0);
isiKotak($pdf, '', 1);
$pdf->Cell(8 * $t1, $t1, '4. Kriminalitas ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(8 * $t1, $t1, '5. Bunuh Diri ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(8 * $t1, $t1, '6. Lainnya ', 0, 0, 'L');
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '6. Tempat Kematian');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '7. Yang menerangkan');
isiKotak($pdf, '', 1);
$pdf->Cell(5 * $t1, $t1, '1. Dokter ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(8 * $t1, $t1, '2. Tenaga Kesehatan ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '3. Kepolisian ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '4. Lainnya ', 0, 0, 'L');
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(1);
//END OF KEMATIAN

//HALAMAN 3
$pdf->AddPage();

//PENGANGKATAN ANAK
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t1, 'PENGANGKATAN ANAK', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);

labelForm($pdf, '1. Nama anak angkat');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '2. Nomor Akta Kelahiran');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '3. Tanggal/Bulan/Tahun Penerbitan Akta Kelahiran');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '4. Dinas Kab/Kota yang Menerbitkan Akta Kelahiran');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '5. Nama Ibu Kandung');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '6. NIK Ibu Kandung');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '7. Kewarganegaraan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '8. Nama Ayah Kandung');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '9. NIK Ayah Kandung');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '10. Kewarganegaraan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '11. Nama Ibu Angkat');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '12. NIK Ibu Angkat');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '13. Nomor Passport');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '14. Nama Ayah Angkat');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '15. NIK Ayah Angkat');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '16. Nomor Passport');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '17. Nama Pengadilan');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '18. Tanggal Penetapan Pengadilan');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '19. Nomor Penetapan Pengadilan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '20. Nama Lembaga Penetapan Pengadilan');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '21. Tempat Lembaga Penetapan Pengadilan');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(2);
//END OF PENGANGKATAN ANAK

//PENGAKUAN ANAK
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t1, 'PENGAKUAN ANAK', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);

labelForm($pdf, '1. Nomor Akta Kelahiran');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '2. Tanggal/Bulan/Tahun Penerbitan Akta Kelahiran');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '3. Dinas Kab/Kota yang Menerbitkan Akta Kelahiran');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '4. Tanggal/Bulan/Tahun Kelahiran Anak');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '5. Tanggal/Bulan/Tahun Perkawinan Agama');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '6. Nama Ibu Kandung');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '7. NIK Ibu Kandung');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '8. Kewarganegaraan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '9. Nama Ayah Kandung');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '10. NIK Ayah Kandung');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '11. Kewarganegaraan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '12. Tanggal Penetapan Pengadilan');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '13. Nomor Penetapan Pengadilan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '14. Nama Lembaga Pengadilan');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(2);
//END OF PENGAKUAN ANAK

//PENGESAHAN ANAK
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t1, 'PENGAKUAN ANAK', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);

labelForm($pdf, '1. Nomor Akta Kelahiran');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '2. Tanggal/Bulan/Tahun Penerbitan Akta Kelahiran');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '3. Dinas Kab/Kota yang Menerbitkan Akta Kelahiran');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '4. Tanggal/Bulan/Tahun Kelahiran Anak');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '5. Tanggal/Bulan/Tahun Perkawinan Agama');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '6. Nomor Tanggal/Bulan/Tahun');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);
labelForm($pdf, '   Akta Perkawinan/Buku Nikah');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '7. Nama Ibu Kandung');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '8. NIK Ibu Kandung');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '9. Kewarganegaraan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '10. Nama Ayah Kandung');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '11. NIK Ayah Kandung');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '12. Kewarganegaraan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '13. Nomor Penetapan Pengadilan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '14. Tanggal Penetapan Pengadilan');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '15. Nama Lembaga Pengadilan');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(2);
//END OF PENGESAHAN ANAK

//PERUBAHAN NAMA
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t1, 'PERUBAHAN NAMA', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);

labelForm($pdf, '1. Nama Lama');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '2. Nama Baru');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '3. Nomor Akta Kelahiran');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '4. Nama Ayah/Ibu/Wali');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);
$pdf->Cell(0, $t1, '  (bagi yang di bawah umur)', 'LR', 1);

labelForm($pdf, '5. NIK Ayah/Ibu/Wali');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '6. Kewarganegaraan');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '7. Nomor Penetapan Pengadilan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '8. Tanggal Penetapan Pengadilan');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '9. Nama Lembaga Pengadilan');
isiKotak($pdf, '', 20);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(2);
//END OF PERUBAHAN NAMA

//HALAMAN 4
$pdf->AddPage();

//PERUBAHAN STATUS KEWARGANEGARAAN
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t1, 'PERUBAHAN STATUS KEWARGANEGARAAN', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);

labelForm($pdf, '1. Kewarganegaraan Baru');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '2. No Akta Kelahiran');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '3. No Akta Perkawinan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '4. Nama Suami atau Istri');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '5. NIK Suami atau Istri');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '6. Nomor Paspor');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '7. Nomor Afidavit');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '8. Nomor Keputusan Presiden');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '9. Tanggal/Bulan/Tahun');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '10. Nomor Berita Acara Sumpah/Janji Setia');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '11. Nama Jabatan yang menerbitkan BAS/Janji Setia');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '12. Tanggal/Bulan/Tahun');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '13. No. Keputusan Menteri (Bidang Kewarganegaraan)');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '12. Tanggal/Bulan/Tahun');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(2);
//END OF PERUBAHAN STATUS

//PERUBAHAN PERISTIWA PENTING LAINNYA
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t1, 'PERUBAHAN PERISTIWA PENTING LAINNYA', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);

labelForm($pdf, '1. No Akta Kelahiran');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '2. Jenis Kelamin Lama');
isiKotak($pdf, '', 1);
$pdf->Cell(8 * $t1, $t1, '1. Laki - Laki ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(8 * $t1, $t1, '2. Perempuan ', 0, 0, 'L');
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '3. Jenis Kelamin Baru');
isiKotak($pdf, '', 1);
$pdf->Cell(8 * $t1, $t1, '1. Laki - Laki ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(8 * $t1, $t1, '2. Perempuan ', 0, 0, 'L');
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '4. Nomor Penetapan Pengadilan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '5. Tanggal Penetapan Pengadilan');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '6. Nama Lembaga Pengadilan');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(2);
//END OF PERUBAHAN LAINNYA

//PEMBETULAN AKTA
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t1, 'PEMBETULAN AKTA', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);

labelForm($pdf, '1. No Akta yang Akan dibetulkan/ditarik');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '2. Nama Ayah/Ibu/Wali (yang di bawah umur)');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '3. NIK Ayah/Ibu/Wali (yang di bawah umur)');
isiKotak($pdf, '', 16);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LR', 1);

$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t1, 'PEMBATALAN AKTA', 'LR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);

labelForm($pdf, '1. Akta yang dibatalkan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '2. No Akta yang dibatalkan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '3. Nomor Putusan Pengadilan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '4. Tanggal Putusan Pengadilan');
$pdf->Cell(4 * $t1, $t1, 'Tgl : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Bln : ', 0, 0, 'C');
isiKotak($pdf, '', 2);
$pdf->Cell(4 * $t1, $t1, 'Thn : ', 0, 0, 'C');
isiKotak($pdf, '', 4);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '5. Nama Lembaga Pengadilan');
isiKotak($pdf, '', 30);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(2);
//END OF PEMBETULAN AKTA

//PELAPORAN PENCATATAN SIPIL DARI LUAR NEGERI

$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t1, 'PEMBETULAN AKTA', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);

labelForm($pdf, '1. Jenis Peristiwa Penting');
isiKotak($pdf, '', 1);
$pdf->Cell(5 * $t1, $t1, '1. Kelahiran ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(6 * $t1, $t1, '2. Perkawinan ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(5 * $t1, $t1, '3. Perceraian ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(5 * $t1, $t1, '4. Kematian ', 0, 0, 'L');
isiKotak($pdf, '', 1);
$pdf->Cell(7 * $t1, $t1, '5. Pengangkatan Anak ', 0, 0, 'L');
$pdf->Cell(0, $t1, '', 'R', 1);
$pdf->Cell(68.4, $t1, '', 'L', 0);
isiKotak($pdf, '', 1);
$pdf->Cell(0, $t1, '6. Pelepasan Kewarganegaraan RI ', 'R', 1, 'L');

labelForm($pdf, '2. Nomor Surat Keterangan Pelaporan Pencatatan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);
$pdf->Cell(0, $t1, 'Sipil dari Perwakilan RI', 'LR', 1, 'L');

labelForm($pdf, '3. Tanggal Surat Keterangan Pelaporan Pencatatan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);
$pdf->Cell(0, $t1, 'Sipil dari Perwakilan RI', 'LR', 1, 'L');

labelForm($pdf, '4. Kantor Perwakilan yang melakukan Pencatatan');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '5. Nomor Bukti Pencatatan Sipil dari Negara Setempat');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

labelForm($pdf, '6. Tanggal Penerbitan dari Negara Setempat');
isiKotak($pdf, '', 25);
$pdf->Cell(0, $t1, '', 'R', 1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(2);
//END OF PELAPORAN LN

//TANDA TANGAN
$pdf->Ln(5);
$pdf->SetFont('Times', '', $fz2);

$pdf->Cell(60, $t2, '', 0, 0, 'C');
$pdf->Cell(70, $t2, '', 0, 0);
$pdf->Cell(60, $t2, '........., ...................20....', 0, 1, 'C');

$pdf->Cell(0, $t2, '', 0, 1, 'C');

$pdf->Cell(60, $t2, 'Mengetahui:', 0, 0, 'C');
$pdf->Cell(70, $t2, '', 0, 0);
$pdf->Cell(60, $t2, '', 0, 1, 'C');

$pdf->Cell(60, $t2, 'Kepala Desa/Lurah', 0, 0, 'C');
$pdf->Cell(70, $t2, '', 0, 0);
$pdf->Cell(60, $t2, 'Pelapor', 0, 1, 'C');

$pdf->Cell(60, $t2, 'Pejabat Dukcapil yang Membidangi', 0, 0, 'C');
$pdf->Cell(70, $t2, '', 0, 0);
$pdf->Cell(60, $t2, '', 0, 1, 'C');

$pdf->Ln(10);

$pdf->Cell(60, $t2, '(....................)', 0, 0, 'C');
$pdf->Cell(70, $t2, '', 0, 0);
$pdf->Cell(60, $t2, '(....................)', 0, 1, 'C');

//END OF TANDA TANGAN


$pdf->Output();
