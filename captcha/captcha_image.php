<?php
session_start();

header("Content-type: image/png");

//mengosongkan session captcha
$_SESSION["captcha"]="";

//ukuran captcha
$image = imagecreate(148, 40);
//jenis font yang ingin anda gunakan
$font = 'arial.ttf';
//ukuran font
$size = 20;
//warna background
imagecolorallocate($image, 167, 167, 167);
//warna text 1
$color1 = imagecolorallocate($image, 0, 0, 0);
//warna text 2
$color2 = imagecolorallocate($image, 128, 128, 128);

for($i=0; $i<=4; $i++){
//    membuat angka random
    $text = rand(0,9);
    $_SESSION["captcha"] .=$text;
    
//    sudut text
    $angle = rand(-30, 30);
//    posisi text1 pada sumbu x
    $x1 = 22+20*$i;
//    posisi text1 pada sumbu y
    $y1 = 30;
//    posisi text2 pada sumbu x
    $x2 = 23+20*$i;
//    posisi text2 pada sumbu y
    $y2 = 31;
    
//    menulis text
    imagettftext($image, $size, $angle, $x1, $y1, $color1, $font, $text);
    imagettftext($image, $size, $angle, $x2, $y2, $color2, $font, $text);
}

//membuat gambar
imagepng($image);
imagedestroy($image);
?>