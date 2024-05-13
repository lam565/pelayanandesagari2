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
$pdf->Cell(0,3, 'NOMOR : '.$_GET["id"].'', '0', 1, 'R');
$pdf->Ln(3);
$pdf->SetFont('Times','B','12');
$pdf->Cell(0,3, 'PERMOHONAN KARTU TANDA PENDUDUK (KTP)', '0', 1, 'C');
$pdf->Ln(7);
$pdf->SetFont('Times','','12');
$pdf->Cell(0,3, 'PEMERINTAH PROPINSI : DIY', '0', 1, 'L');
$pdf->Ln(3); 
$pdf->SetFont('Times','','12');
$pdf->Cell(0,3, 'PEMERINTAH KABUPATEN/KOTA : GUNUNGKIDUL', '0', 1, 'L');
$pdf->Ln(3); 
$pdf->SetFont('Times','','12');
$pdf->Cell(0,3, 'KECAMATAN : WONOSARI', '0', 1, 'L');
$pdf->Ln(3); 
$pdf->SetFont('Times','','12');
$pdf->Cell(0,3, 'KELURAHAN  : GARI', '0', 1, 'L');
$pdf->Ln(10);  

 
$query = "select * from suket_ektp,kk,detail_kk where 
						suket_ektp.nik=detail_kk.nik and kk.no_kk=detail_kk.no_kk
						
						and suket_ektp.id_ektp='$_GET[id]'";
			
$results = mysqli_query($connect,$query) or die("Error: ".mysqli_error($connect));
$r = mysqli_num_rows($results);
$data = array();
while ($row = mysqli_fetch_array($results)) {
$pdf->SetFont('Times');
$pdf->Cell(50,5, 'PERMOHONAN KTP      : '.$row["jenis_permohonan"].'', '0', 1, 'L'); 
  
$pdf->Cell(50,5, 'Nama lengkap                    : '.$row["nama"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Nomor Kartu Keluarga      : '.$row["no_kk"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'NIK Pemohon                    : '.$row["nik"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Alamat                               : '.$row["detail_alamat"].','.$row["rt"].'/'.$row["rw"].','.$row["kelurahan"].','.$row["kecamatan"].','.$row["kabkot"].','.$row["provinsi"].'', '0', 1, 'L'); 

                                
$pdf->SetFont('Times'); 
$pdf->Cell(168,10, '                                                       Yogyakarta, '.$row["tanggal_pembuatan"].'', '0', 1, 'R');
$pdf->Cell(0,3, '                   Pas Photo   Cap Jempol    Specimen Tanda Tangan                                           Pemohon', '0', 1, 'L'); 
$pdf->Ln(10);
$pdf->SetFont('Times'); 
$pdf->Cell(0,3, '                  (.............)      (.............)      (...........................)                                      '.$row["nama"].'', '0', 1, 'L'); 
$pdf->Ln(1);
                                 $g="SELECT * from pegawai where jabatan='sekda'";
								$h = mysqli_query($connect,$g) or die("Error: ".mysqli_error($connect));
                                $i = mysqli_fetch_array($h);  
$pdf->SetFont('Times'); 
$pdf->Cell(168,10, '                     Mengetahui', '0', 1, 'C');
$pdf->Cell(0,3, '                   Camat Wonosari                                                                        Sekertaris Kalurahan Gari', '0', 1, 'L'); 
$pdf->Ln(10);
$pdf->SetFont('Times'); 
$pdf->Cell(0,3, '             (.............................)                                                                            '.$i["nama_pegawai"].'', '0', 1, 'L'); 
$pdf->Ln(7);
 
}


#tampilkan judul laporan
$pdf->SetFont('Times','B','12');
$pdf->Cell(0,3, 'NOMOR : '.$_GET["id"].'', '0', 1, 'R');
$pdf->Ln(3);
$pdf->SetFont('Times','B','12');
$pdf->Cell(0,3, 'PERMOHONAN KARTU TANDA PENDUDUK (KTP)', '0', 1, 'C');
$pdf->Ln(7);
$pdf->SetFont('Times','','12');
$pdf->Cell(0,3, 'PEMERINTAH PROPINSI : DIY', '0', 1, 'L');
$pdf->Ln(3); 
$pdf->SetFont('Times','','12');
$pdf->Cell(0,3, 'PEMERINTAH KABUPATEN/KOTA : GUNUNGKIDUL', '0', 1, 'L');
$pdf->Ln(3); 
$pdf->SetFont('Times','','12');
$pdf->Cell(0,3, 'KECAMATAN : WONOSARI', '0', 1, 'L');
$pdf->Ln(3); 
$pdf->SetFont('Times','','12');
$pdf->Cell(0,3, 'KELURAHAN  : GARI', '0', 1, 'L');
$pdf->Ln(10);  

 
$query = "select * from suket_ektp,kk,detail_kk where 
						suket_ektp.nik=detail_kk.nik and kk.no_kk=detail_kk.no_kk
						
						and suket_ektp.id_ektp='$_GET[id]'";
			
$results = mysqli_query($connect,$query) or die("Error: ".mysqli_error($connect));
$r = mysqli_num_rows($results);
$data = array();
while ($row = mysqli_fetch_array($results)) {
$pdf->SetFont('Times');
$pdf->Cell(50,5, 'PERMOHONAN KTP      : '.$row["jenis_permohonan"].'', '0', 1, 'L'); 
 
$pdf->Cell(50,5, 'Nama lengkap                    : '.$row["nama"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Nomor Kartu Keluarga      : '.$row["no_kk"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'NIK Pemohon                    : '.$row["nik"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Alamat                               : '.$row["detail_alamat"].','.$row["rt"].'/'.$row["rw"].','.$row["kelurahan"].','.$row["kecamatan"].','.$row["kabkot"].','.$row["provinsi"].'', '0', 1, 'L'); 

                                
$pdf->SetFont('Times'); 
$pdf->Cell(168,10, '                                                       Yogyakarta, '.$row["tanggal_pembuatan"].'', '0', 1, 'R');
$pdf->Cell(0,3, '                   Pas Photo   Cap Jempol    Specimen Tanda Tangan                                           Pemohon', '0', 1, 'L'); 
$pdf->Ln(10);
$pdf->SetFont('Times'); 
$pdf->Cell(0,3, '                  (.............)      (.............)      (...........................)                                      '.$row["nama"].'', '0', 1, 'L'); 
$pdf->Ln(1);
                                 $g="SELECT * from pegawai where jabatan='sekda'";
								$h = mysqli_query($connect,$g) or die("Error: ".mysqli_error($connect));
                                $i = mysqli_fetch_array($h);  
$pdf->SetFont('Times'); 
$pdf->Cell(168,10, '                     Mengetahui', '0', 1, 'C');
$pdf->Cell(0,3, '                   Camat Wonosari                                                                        Sekertaris Kalurahan Gari', '0', 1, 'L'); 
$pdf->Ln(10);
$pdf->SetFont('Times'); 
$pdf->Cell(0,3, '             (.............................)                                                                            '.$i["nama_pegawai"].'', '0', 1, 'L'); 
$pdf->Ln(1);
 
}



	
#output file PDF
$pdf->Output();
?>


