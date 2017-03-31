<?php
session_start();  // 啟用交談期
?>
<!DOCTYPE HTML>  
<html>
<head>

		<title>二手拍賣</title>
		<meta charset="utf-8">
		<LINK REL="SHORTCUT ICON" HREF="saleicon.jpg">
		<link rel="stylesheet" href="salething.css">

</head>
<header>
<div id="log"><?php
          if(isset($_SESSION['user_id'])) { echo $msg = "歡迎".$_SESSION['yourname']."登入!";//登入成功 ?>
              <!--<div class="success"><p style="float:right;">歡迎使用者登入</p></div>-->
			  <form action="logout.php">
			  <br><br><br>
			  <p><input type="submit" value="登出" style="float:right;"></p></form>
  <?php  } else { $msg = "未登入或帳號密碼有錯誤!";//未登入 ?>
        
	  <form style="padding: 0px 20px 0px 0px; float:right;" action="login.php" method="post">
 
  <table style="color:white; float:right;" name="login">
 <tr>
   <td style="color:white;background-color:#7676a3">帳號 : </td>
   <td><input type="text" name="User_id" 
             size="10" maxlength="10" required></td>
 </tr>
 <tr>
   <td style="background-color:#7676a3">密碼 : </td>
   <td><input type="password" name="password"
              size="10" maxlength="10" required></td>
	<td><input type="submit" value="登入"></td>
 </tr>  

</table>
</form>
<br>
 <p type="hidden"><?php echo $msg; ?></p> 

<?php } ?>
</div>
<h1 style="text-indent:100px;">~~*~二手拍賣~*~~</h1>

  
    <ul>
      
      <li id="li1"><a target="_self" href="index.php">Home</a></li>
      <li id="li2"><a Target="_new" href="renthouse.php">租屋</a></li>
    
    </ul>
  
</header> 

<body>
<div id="wrapper">
<div id="maintext" style="text-align: left; padding-left:100px;"> 
<?php
header('Content-Type: text/html; charset=utf-8');
include("mysql.inc.php");

if (isset($_POST["produce_id"]))
	$produce_id = mysqli_real_escape_string($conn,$_POST['produce_id']);
if (isset($_POST["goodname"]))
	$goodname = mysqli_real_escape_string($conn,$_POST['goodname']);
if (isset($_POST["price"]))
	$price = mysqli_real_escape_string($conn,$_POST['price']);
if (isset($_POST["url"]))
	$url = mysqli_real_escape_string($conn,$_POST['url']);
if (isset($_POST["introduce"]))
	$introduce = mysqli_real_escape_string($conn,$_POST['introduce']);
if (isset($_POST["type"]))
	$type = mysqli_real_escape_string($conn,$_POST['type']);
if (isset($_POST["school"]))
	$school = mysqli_real_escape_string($conn,$_POST['school']);
/* See what's inside $_POST[]
echo "<table>";
	foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }
echo "</table>";
*/

//echo "myname: {$myname}";
//echo "message: {$message}<br />";
//如果以 POST 方式傳遞過來的 id, qty 參數都不是空字串
if ( !empty($produce_id) || !empty($goodname) || !empty($price) || !empty($type) || !empty($school)|| !empty($url) || !empty($introduce)){
  //更新 id 參數所指定編號的記錄
  mysqli_set_charset($conn, "utf8");
  $sql="UPDATE produce SET goodname='{$goodname}', price = '{$price}', type = '{$type}', school = '{$school}', url = '{$url}', introduce = '{$introduce}' WHERE 貼文編號 = '{$produce_id}' ";
  mysqli_query($conn, $sql);
}

//取得被更新的記錄筆數
$rowUpdated=mysqli_affected_rows($conn);

//如果更新的筆數大於 0, 則顯示成功, 若否, 便顯示失敗
if ($rowUpdated >0){
  echo "資料更新成功";
}
else {
  echo "更新失敗, 或者您輸入的資料與原本相同";
}
?>
<p><a href="salething.php" style="float:right;">回二手拍賣!</a></p>

</div>
	
</div>
</body>
</html>