<?php
$host = 'localhost';
$user = 'patricia840205';
$pass = '9101179';

mysql_connect($host, $user, $pass);

mysql_select_db('user');
?>


<html>
<body>
		
<form enctype="multipart/form-data" method="post" action="upload.php">
  <input type="file" name="image" />
  <input type="submit" value="確定上傳"/>
</form>



</body>
</html>