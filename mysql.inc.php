<?php
$dbSever = "localhost";
$dbUser = "patricia840205";
$dbpass = "9101179";
$dbName = "user";

$conn = @mysqli_connect($dbSever, $dbUser, $dbpass, $dbName);

if (mysqli_connect_errno($conn))
  die("無法連線資料庫伺服器");
  
mysqli_set_charset($conn, "utf8");
?>