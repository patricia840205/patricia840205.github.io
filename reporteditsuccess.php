<?php
session_start();  // 啟用交談期
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
<div id="maintext" style="text-align: left; padding-left:100px;"> 
<?php
header('Content-Type: text/html; charset=utf-8');
include("mysql.inc.php");

if (isset($_POST["report_id"]))
	$report_id = mysqli_real_escape_string($conn,$_POST['report_id']);
if (isset($_POST["report1"]))
	$report1 = mysqli_real_escape_string($conn,$_POST['report1']);
if (isset($_POST["pic1"]))
	$pic1 = mysqli_real_escape_string($conn,$_POST['pic1']);
if (isset($_POST["report2"]))
	$report2 = mysqli_real_escape_string($conn,$_POST['report2']);
if (isset($_POST["pic2"]))
	$pic2 = mysqli_real_escape_string($conn,$_POST['pic2']);
if (isset($_POST["report3"]))
	$report3 = mysqli_real_escape_string($conn,$_POST['report3']);
if (isset($_POST["report4"]))
	$report4 = mysqli_real_escape_string($conn,$_POST['report4']);
if (isset($_POST["report5"]))
	$report5 = mysqli_real_escape_string($conn,$_POST['report5']);

//echo "myname: {$myname}";
//echo "message: {$message}<br />";
//如果以 POST 方式傳遞過來的 id, qty 參數都不是空字串
if ( !empty($report_id) && !empty($report1) && !empty($pic1) && !empty($report2) && !empty($pic2) && !empty($report3) && !empty($report4) && !empty($report5)){
  //更新 id 參數所指定編號的記錄
  mysqli_set_charset($conn, "utf8");
  $sql="UPDATE report SET 心得報告1 = '{$report1}', linkk1 = '{$pic1}', 心得報告2 = '{$report2}', linkk2 = '{$pic2}', 心得報告3 = '{$report3}', 心得報告4 = '{$report4}', 心得報告5 = '{$report5}' WHERE 報告編號 = '{$report_id}' ";
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
<p><a href="abroadreport.php" style="float:right;">回留學報告</a></p>

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