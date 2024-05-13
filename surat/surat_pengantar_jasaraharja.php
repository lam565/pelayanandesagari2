<?php
session_start();
//koneksi ke database
include "../connect.php";


#ambil data di tabel dan masukkan ke array

$judul = "PEMERINTAH KABUPATEN GUNUNGKIDUL";
$judul1 = "KECAMATAN WONOSARI";
$judul7 = "Kalurahan GARI";
$judul8 = "Jl.Alternatif Karangmojo Gatak Gari Wonosari Pos : 55851";

#sertakan library FPDF dan bentuk objek
require_once ("../fpdf/fpdf.php");
$pdf = new FPDF('P','cm','A4');
$pdf->Open();
$pdf->AddPage();
 
#tampilkan judul laporan
$pdf -> Image('../logo.jpg',3,1,2,2.5);
$pdf->SetFont('Arial','','11');
$pdf->Cell(19,0.6,$judul,0,1,'C');
$pdf->Cell(19,0.6,$judul1,0, 1,'C');
$pdf->SetFont('Arial','B','18');
$pdf->Cell(19,0.6,$judul7,0, 1, 'C');
$pdf->SetFont('Arial','','10');
$pdf->Cell(19,0.8,$judul8,0,1, 'C');
$pdf->Cell(19,0.1,"",'B',1,'C',1);
$pdf->SetFont('Arial','B','14');
$t=0.5;
$pdf->SetFont('Arial','BU','12');
$pdf->Ln(0.5);
$pdf->Cell(19,$t,'SURAT KETERANGAN', 0, 1, 'C');
$pdf->SetFont('Arial','','11');

$query = "SELECT *FROM biodata_wni,data_keluarga,jasaraharja,staf,jabatan,jenis_kelamin,status_perkawinan,pekerjaan ,pendidikan_terakhir,agama
where biodata_wni.NIK=jasaraharja.NIK and biodata_wni.NO_KK=data_keluarga.NO_KK 
and biodata_wni.JENIS_KLMIN=jenis_kelamin.JENIS_KLMIN
and biodata_wni.STAT_KWN=status_perkawinan.STAT_KWN
and biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN
and biodata_wni.PDDK_AKH=pendidikan_terakhir.PDDK_AKH
and biodata_wni.AGAMA=agama.AGAMA
and staf.id_staf=jabatan.id_staf and jasaraharja.id_staf=staf.id_staf and jasaraharja.NIK='$_GET[nik]' and jasaraharja.tanggal_permohonan='$_GET[tgl]'";
$results = mysqli_query($connect,$query) or die("Error: ".mysqli_error($connect));
$row = mysqli_fetch_array($results);

$pdf->Cell(19,$t,'Nomor : '.$row['no_surat']. ' ', '0', 1, 'C'); 
$pdf->Ln(0.5);
$text="     Yang bertanda tangan di bawah ini, Kepala Kalurahan Gari, Kecamatan Wonosari, Kabupaten Gunungkidul, menerangkan dengan sebenarnya bahwa: ";
$pdf->Cell(1,$t,"",0,0,"C");
$pdf->Multicell(17,$t,$text);
$pdf->Cell(1,$t,"",0,1,"C");
$pdf->Ln(0.1);
$pdf->Cell(2,$t,"",0,0,"C");
$pdf->Cell(5,$t,'1. Nama', '0', 0, 'L');
$pdf->Cell(0.5,$t," : ",0,0,"C");
$pdf->Cell(11.5,$t,$row['NAMA_LGKP'],0,1,"L");

$pdf->Cell(2,$t,"",0,0,"C");
$pdf->Cell(5,$t,'2. KTP', '0', 0, 'L');
$pdf->Cell(0.5,$t," : ",0,0,"C");
$pdf->Cell(11.5,$t,$row['NIK'],0,1,"L");

$pdf->Cell(2,$t,"",0,0,"C");
$pdf->Cell(5,$t,'3. KK', '0', 0, 'L');
$pdf->Cell(0.5,$t," : ",0,0,"C");
$pdf->Cell(11.5,$t,$row['NO_KK'],0,1,"L");

$pdf->Cell(2,$t,"",0,0,"C");
$pdf->Cell(5,$t,'4. Tempat, Tanggal Lahir', '0', 0, 'L');
$pdf->Cell(0.5,$t," : ",0,0,"C");
$pdf->Cell(11.5,$t,$row['TMPT_LHR']. ', '.date_format(date_create($row['TGL_LHR']),"d/m/Y"),0,1,"L");

$pdf->Cell(2,$t,"",0,0,"C");
$pdf->Cell(5,$t,'5. Jenis Kelamin', '0', 0, 'L');
$pdf->Cell(0.5,$t," : ",0,0,"C");
$pdf->Cell(11.5,$t,$row['jenis_kelamin'],0,1,"L");

$pdf->Cell(2,$t,"",0,0,"C");
$pdf->Cell(5,$t,'6. Alamat', '0', 0, 'L');
$pdf->Cell(0.5,$t," : ",0,0,"C");
$pdf->Cell(11.5,$t,$row['ALAMAT'].', Kec. Wonosari, Kab. Gunungkidul',0,1,"L");

$pdf->Cell(2,$t,"",0,0,"C");
$pdf->Cell(5,$t,'7. Pekerjaan', '0', 0, 'L');
$pdf->Cell(0.5,$t," : ",0,0,"C");
$pdf->Cell(11.5,$t,$row['pekerjaan'],0,1,"L");
$pdf->Cell(2,$t,"",0,0,"C");

$pdf->Cell(5,$t,'8. Status Perkawinan', '0', 0, 'L');
$pdf->Cell(0.5,$t," : ",0,0,"C");
$pdf->Cell(11.5,$t,$row['status_perkawinan'],0,1,"L");

$pdf->Cell(2,$t,"",0,0,"C");
$pdf->Cell(5,$t,'9. Pendidikan terahir', '0', 0, 'L');
$pdf->Cell(0.5,$t," : ",0,0,"C");
$pdf->Cell(11.5,$t,$row['pendidikan'],0,1,"L");

$pdf->Cell(2,$t,"",0,0,"C");
$pdf->Cell(5,$t,'10. Agama', '0', 0, 'L');
$pdf->Cell(0.5,$t," : ",0,0,"C");
$pdf->Cell(11.5,$t,$row['nama_agama'],0,1,"L");

$text2="     Orang tersebut diatas adalah benar-benar warga Dusun ".$row['ALAMAT'].", Kalurahan Gari, Kecamatan Wonosari, Kabupaten Gunungkidul. Orang tersebut diatas pada ".$row['tanggal_kejadian']. ",  mengalami Kecelakaan di kota  ".$row['tempat_kejadian']. " , dan harus dibawa ke Rumah Sakit";
$text3="     Surat keterangan ini diberikan untuk mencari: Rekomendasi Jaminan Jasa.";
$text4="     Demikian Surat Keterangan ini kami buat dengan keadaan yang sebenarnya agar dapat dipergunakan  dengan  sebagaimana  mestinya.";

$pdf->ln(0.3);
$pdf->Cell(1,$t,'',0,0,"C");
$pdf->Multicell(17,$t,$text2);
$pdf->Cell(1,$t,'',0,1,"C");

$pdf->ln(0.1);
$pdf->Cell(1,$t,'',0,0,"C");
$pdf->Multicell(17,$t,$text3);
$pdf->Cell(1,$t,'',0,1,"C");

$pdf->Cell(12,$t,'',0,0,"C");
$pdf->Cell(7,$t, 'Gari, '.date('d-M-Y',strtotime($row["tanggal_permohonan"])).'', '0', 1, 'C');
$pdf->Cell(12,$t,'',0,0,"C"); 
$pdf->Cell(7,$t,$row['nama_jabatan'], '0', 1, 'C'); 
$pdf->Ln(2);

$pdf->Cell(12,$t,'',0,0,"C"); 
$pdf->Cell(7,$t,$row['nama_staf'], '0', 1, 'C');

#output file PDF
$pdf->Output("Pengantar_Jasaraharja_".$_GET['nik'].".pdf","D");

?>