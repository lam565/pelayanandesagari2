<?php
//koneksi ke database
$dbHost = "localhost";    
$dbUser = "root";    
$dbPass = "";    
$dbName = "kependudukan"; 
 
$connect = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$connect) die("Koneksi Gagal: " . mysqli_connect_error());
//akhir koneksi

#sertakan library FPDF dan bentuk objek
require_once ("fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
 
#tampilkan judul laporan

$pdf->SetFont('Times','B','12');
$pdf->Cell(0,3, 'SURAT PENGANTAR PINDAH', '0', 1, 'C');
$pdf->Ln(3);
$pdf->SetFont('Times','B','12');
$pdf->Cell(0,3, 'ANTAR KABUPATEN/KOTA ATAU ANTAR PROVINSI', '0', 1, 'C');
$pdf->Ln(3);
$pdf->SetFont('Times','','12');
$pdf->SetFont('Times');
$pdf->Cell(0,10, 'NOMOR : '.$_GET["id"].'', '0', 1, 'C');
$pdf->Ln(10); 
$pdf->SetFont('Times','','12');
$pdf->Cell(0,3, 'Yang bertanda tangan di bawah ini,menerangkan Permohonan Pindah Penduduk WNI dengan data sebagai berikut :', '0', 1, 'L');
$pdf->Ln(3); 
 
$query = "select * from pindah_keluar,kk,detail_kk where 
						pindah_keluar.nik=detail_kk.nik and kk.no_kk=detail_kk.no_kk
						
						and pindah_keluar.id_keluar='$_GET[id]'";
			
$results = mysqli_query($connect,$query) or die("Error: ".mysqli_error($connect));
$r = mysqli_num_rows($results);
$data = array();
while ($row = mysqli_fetch_array($results)) {
$pdf->SetFont('Times');
$pdf->Cell(50,5, 'NIK                                    : '.$row["nik"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Nama lengkap                    : '.$row["nama"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Nomor Kartu Keluarga      : '.$row["no_kk"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Nama Kepala Keluarga      : '.$row["kepala_keluarga"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Alamat Sekarang                : '.$row["detail_alamat"].','.$row["rt"].'/'.$row["rw"].','.$row["kelurahan"].','.$row["kecamatan"].','.$row["kabkot"].','.$row["provinsi"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Alamat Tujuan Pindah       : '.$row["alamat_pindah"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Keluarga Yang Pindah       : '.$r.'', '0', 1, 'L');
$pdf->SetFont('Times','','12');
$pdf->Ln(3);
$pdf->Cell(0,3, 'Adapun Permohonan Pindah Penduduk WNI yang bersangkutan sebagaimana terlampir.', '0', 1, 'L');
$pdf->Ln(3);
$pdf->Cell(0,3, 'Demikian Surat Pengantar Pindah ini dibuat agar digunakan sebagaimana mestinya.', '0', 1, 'L');


                                 $g="SELECT * from pegawai where jabatan='sekda'";
								$h = mysqli_query($connect,$g) or die("Error: ".mysqli_error($connect));
                                $i = mysqli_fetch_array($h);  
$pdf->SetFont('Times'); 
$pdf->Cell(168,10, '                                                       BATURSARI, '.$row["tanggal_lapor"].'', '0', 1, 'R');
$pdf->Cell(0,3, '                   Camat Candiroto                                                                        Sekertaris Kalurahan Batursari', '0', 1, 'L'); 
$pdf->Ln(10);
$pdf->SetFont('Times'); 
$pdf->Cell(0,3, '             (.............................)                                                                        '.$i["nama_pegawai"].'', '0', 1, 'L'); 
$pdf->Ln(1);
 
}



	
#output file PDF
$pdf->Output();
?>