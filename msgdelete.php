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
<div id="title">
    <h2>留言板</h2>
	</div>
<div id="maintext" style="text-align: left; padding-left:100px;"> 
<?php
header('Content-Type: text/html; charset=utf-8');
include("mysql.inc.php");

//如果以 GET 方式傳遞過來的 del 參數不是空字串
if (!empty($_GET['msgdelete'])){
  //將 del 參數所指定的編號的記錄刪除
  $sql="DELETE FROM message WHERE 留言編號 = '{$_GET['msgdelete']}' ";
  mysqli_query($conn, $sql);

  //取得被刪除的記錄筆數
  $rowDeleted = mysqli_affected_rows($conn);

  //如果刪除的筆數大於 0, 則顯示成功, 若否, 便顯示失敗
  if ($rowDeleted >0){
    echo "刪除成功";
  }
  else {
    echo "刪除失敗";
  }
}
echo "<br>";
echo "<a href=\"javascript:history.go(-1)\"  style='float:right;'>返回</a>";

?>
</div>
</div>
</body>
</html>