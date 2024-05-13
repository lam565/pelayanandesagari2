<?php
include "connect.php";
session_start();
$username = mysqli_real_escape_string($connect,stripslashes(strip_tags(htmlspecialchars($_POST['username'],ENT_QUOTES))));
$password = mysqli_real_escape_string($connect,stripslashes(strip_tags(htmlspecialchars(md5($_POST['password']),ENT_QUOTES))));

$sql="select username,password,level from admin where username='$username' and password='$password'";
$results = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));
$tot= mysqli_num_rows($results);
while($r = mysqli_fetch_array($results)){
if ($tot > 0) {
 $_SESSION['username'] = $username;
 $_SESSION['password'] = $password;
  $_SESSION['level'] = $r['level'];
 if($r['level']=='padukuhan1'){
 echo("<script>location.href ='tegalrejo.php'</script>");
 }
 else if($r['level']=='padukuhan2'){	 
 echo("<script>location.href ='gari.php'</script>");
 }
  else if($r['level']=='padukuhan3'){	 
 echo("<script>location.href ='jatirejo.php'</script>");
 }
  else if($r['level']=='padukuhan4'){	 
 echo("<script>location.href ='ngelorejo.php'</script>");
 }
  else if($r['level']=='padukuhan5'){	 
 echo("<script>location.href ='ngijorejo.php'</script>");
 }
 else if($r['level']=='padukuhan6'){	 
 echo("<script>location.href ='kalidadap.php'</script>");
 }
 else if($r['level']=='padukuhan7'){	 
 echo("<script>location.href ='gatak.php'</script>");
 }
 else if($r['level']=='padukuhan8'){	 
 echo("<script>location.href ='gondangrejo.php'</script>");
 }
 else if($r['level']=='padukuhan9'){	 
 echo("<script>location.href ='gelung.php'</script>");
 }
 else if($r['level']=='sekda'){	 
 echo("<script>location.href ='desa.php'</script>");
 }
}
}
?>