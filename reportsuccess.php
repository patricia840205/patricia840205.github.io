<?php
session_start();
include("mysql.inc.php");
$myTable='report';  // 設定本程式所使用的資料表
$errMsg='';            // 存放錯誤訊息的變數
$name ='';             // 存放留言者姓名的變數 
$report1 =''; 
$pic1=''; 
$report2 ='';   
$pic2='';
$report3 ='';   
$report4 ='';   
$report5 ='';           // 存放留言內容的變數

//檢查是否已輸入姓名和留言 
if ( !empty($_SESSION['user_id']) && !empty($_POST['report1']) && !empty($_POST['pic1']) && !empty($_POST['report2']) && !empty($_POST['pic2']) && !empty($_POST['report3']) && !empty($_POST['report4']) && !empty($_POST['report5'])) {
  //將姓名放入 $name 變數
  //$name=myStripslashes($_POST['name']);
$name = $_SESSION['yourname'];
  //將留言放入 $message 變數
  //$message=myStripslashes($_POST['message']);
 $report1 = $_POST['report1'];
 $pic1 = $_POST['pic1'];
 $report2 = $_POST['report2'];
 $pic2 = $_POST['pic2'];
 $report3 = $_POST['report3'];
 $report4 = $_POST['report4'];
 $report5 = $_POST['report5'];
}
//若否, 則將錯誤訊息寫入 $errMsg 變數
else {
  $errMsg.='您輸入的訊息不完整!<br>';
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>大三出國論壇</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="forum.css">
	</head>
	
	<body>
	  <div><h1>大三出國論壇</h1></div>
	  <P align=right><?php
          if(isset($_SESSION['user_id'])) { echo $msg = "歡迎".$_SESSION['yourname']."登入!";//登入成功 ?></p>
              <!--<div class="success"><p style="padding: 0px 50px 0px 0px; float:right;">歡迎使用者登入</p></div>-->
			  <form action="logout.php">
			  <br><br><br>
			  <p><input type="submit" value="登出" style="float:right;"></p>
  <?php  } else { $msg = "未登入或帳號密碼有錯誤!";//未登入 ?>
        
	  <form style="padding: 0px 20px 0px 0px; float:right;" action="login.php" method="post">
 
  <table style="color:white">
 <tr>
   <td style="color:white;background-color:#7676a3">帳號 : </td>
   <td><input type="text" name="User_id" 
             size="20" maxlength="10" required></td>
 </tr>
 <tr>
   <td style="background-color:#7676a3">密碼 : </td>
   <td><input type="password" name="User_password"
              size="20" maxlength="10" required></td>
 </tr>  

</table>

<br>
 <p style="float:right;"><?php echo $msg; ?></p> 

<input type="submit" value="登入"><br/><br/>
<?php } ?>
</form>


	  
	  <div id="wrapper">  
	  <nav>
      <ul class="drop-down-menu">
	    <li><a href="index.php">首頁</a>
        <li><a href="studyabroad.php">出國留學</a>
            <ul>
                <li><a href="#">申請流程表</a>
                </li>
                <li><a href="#">各學校門檻</a>
                </li>
            </ul>
        </li>
        <li><a href="school.php">學校</a>
        </li>
        <li><a href="#">通報系統</a>
            <ul>
                <li>
				<a href="#">基本資料</a>    
                </li>
				<li>
				<a href="students.php">學分抵免</a>    
                </li>
                <li>
				<a href="abroadreport.php">留學報告</a>    
                </li>
                
            </ul>
        </li>
        <li><a href="lifething.php">生活瑣事</a>
        </li>
        <li><a href="#">Selling</a>
		<ul>
                <li>
				<a href="renthouse.php">租屋</a>    
                </li>
				<li>
				<a href="salething.php">二手買賣</a>    
                </li>
                
            </ul>
        
    </ul>
	   </li>   
       
      </nav>
	  
  <div id="title">
    <h1>留學報告</h1>
  </div>
  <div id="maintext">
<?php
//如果 $errMsg 是空字串, 表示沒有錯誤,
//所以我們可以放心將留言寫入資料庫
if ($errMsg ==''){
  date_default_timezone_set('Asia/Taipei');     //設定時區
  $stmt = mysqli_prepare($conn,                 //準備查詢
               "INSERT $myTable (`姓名`, `心得報告1`, `linkk1`, `心得報告2`, `linkk2`, `心得報告3`, `心得報告4`, `心得報告5`, `日期時間`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $now = date("Y-m-d H:i:s");
  // 繫結參數
  mysqli_stmt_bind_param($stmt, 'sssssssss', 
                         $name, $report1, $pic1, $report2, $pic2, $report3, $report4, $report5, $now);

  // 將姓名、留言、目前的日期時間寫入資料庫
  mysqli_stmt_execute($stmt);
  
  if (mysqli_affected_rows($conn) > 0){
    echo '新增一篇留學心得報告<br>';
  }
  else {
    echo '無法新增留言<br>';
  }
}
//如果 $errMsg 不是空字串, 便顯示錯誤訊息
else {
  echo $errMsg . '請按瀏覽器的上一頁鈕重新輸入<br>';
}
?>
    <p><a href="abroadreport.php" style="float:right;">回留學心得報告</a></p>


</div>
</body>
<footer>
<div id="footer">
淡江大學 蘭陽校園<br>
地址：26247 宜蘭縣礁溪鄉林美村林尾路180號
電話：03-9873088 (行動節費0978-190-979) 傳真：03-9873066
</div>
</footer> 
</html>