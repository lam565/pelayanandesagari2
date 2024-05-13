<?php
session_start();
session_destroy();
unset($_SESSION['username']);
echo"<meta http-equiv='refresh'content='0; url=index.php'>";
?>
