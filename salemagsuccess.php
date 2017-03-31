<?php
session_start();

if (empty($_SESSION['user_id'])) {
	echo '<script tpye="text/javascript">';
	echo 'alert("請先登入");';
	echo 'window.location.href = "index.php";';
	echo '</script>';
}
include("mysql.inc.php");
$myTable='produce';  // 設定本程式所使用的資料表
$errMsg='';            // 存放錯誤訊息的變數
$name ='';             // 存放留言者姓名的變數 
$goodname ='';          // 存放留言內容的變數
$type = '';
$school='';
$price='';
$url='';
$introduce='';


//檢查是否已輸入姓名和留言 
 if ( !empty($_SESSION['user_id']) && !empty($_POST['goodname']) && !empty($_POST['price']) && !empty($_POST['type']) && !empty($_POST['school']) && !empty($_POST['url']) && !empty($_POST['introduce'])) {
  //將姓名放入 $name 變數
  //$name=myStripslashes($_POST['name']);
  $name = $_SESSION['yourname'];
  $goodname = $_POST['goodname'];
  //將留言放入 $message 變數
  //$message=myStripslashes($_POST['message']);
  $price = $_POST['price'];
  $type = $_POST['type'];
  $school = $_POST['school'];
  $url = $_POST['url'];
  $introduce = $_POST['introduce'];
}
//若否, 則將錯誤訊息寫入 $errMsg 變數
else {
  $errMsg.='您尚未登入!<br>';
}
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

<div id="maintext">
<?php
//如果 $errMsg 是空字串, 表示沒有錯誤,
//所以我們可以放心將留言寫入資料庫
if ($errMsg ==''){
  date_default_timezone_set('Asia/Taipei');     //設定時區
  
  $name = $_SESSION['yourname'];
    
  $stmt = mysqli_prepare($conn,                 //準備查詢
               "INSERT $myTable (`姓名`,`goodname`, `price`, `type`, `school`,  `url`, `introduce`, `date`)
                VALUES (?, ?, ?, ?, ?, ?,?,?)");
  $date = date("Y-m-d H:i:s");
  // 繫結參數
  
 
  
  mysqli_stmt_bind_param($stmt, 'ssisssss', 
                         $name, $goodname, $price, $type, $school, $url, $introduce, $date);

  // 將姓名、留言、目前的日期時間寫入資料庫
  mysqli_stmt_execute($stmt);
  
  if (mysqli_affected_rows($conn) > 0){
    echo '已成功新增一筆貼文<br>';
  }
  else {
    echo '無法新增貼文<br>';
  }
}

?>
    <p><a href="salething.php" style="float:right;">回二手拍賣</a></p>
</div>
</div>
</body>
</html>