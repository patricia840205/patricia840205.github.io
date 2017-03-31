<?php
session_start();  // 啟用交談期

include("mysql.inc.php");

$myTable='report';		//設定本程式所使用的資料表

if (isset($_POST['department'])) {
	$department = $_POST['department'];
} else {
	$department = 'all';
}

if ($department=='all') {
	$sql = "select user.user_name as name, report.`心得報告1` as rpt1, report.`linkk1` as l1, report.`linkk2` as l2, report.`心得報告2` as rpt2, report.`心得報告3` as rpt3, report.`心得報告4` as rpt4, report.`心得報告5` as rpt5, report.`報告編號` as rpt_num, report.`日期時間` as rpt_date, user_dep as dept from user JOIN report on user.user_name = report.`姓名` order by `報告編號` DESC;";
} else {
	$sql = "SELECT user.user_name as name, report.`心得報告1` as rpt1, report.`linkk1` as l1, report.`linkk2` as l2, report.`心得報告2` as rpt2, report.`心得報告3` as rpt3, report.`心得報告4` as rpt4, report.`心得報告5` as rpt5, report.報告編號 as rpt_num, report.日期時間 as rpt_date, user_dep as dept from user JOIN report on user.user_name = report.姓名 WHERE user.user_dep = '$department' order by 報告編號 DESC;";
}



//查詢所有欄位, 並且依照編號遞減排序, 讓最新留言顯示在最前面
//$result=mysqli_query($conn, 
//        "SELECT * FROM $myTable ORDER BY 報告編號");
$result = mysqli_query($conn, $sql);
if ($result==false) {
	die(mysqli_error($conn));
}
$numRows = mysqli_num_rows($result);  //取得留言的總筆數  


//$dep="SELECT * FROM user WHERE user_dep=$row";
//$reportmsg="SELECT user.user_name, report.心得報告, user_dep from FROM user JOIN report INNER JOIN report on user.user_name = report.姓名 WHERE user.user_dep = ?";

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
 
  <table style="color:white" name="login">
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
 <p style="float:right;" type="hidden"><?php echo $msg; ?></p> 

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

 <h1>留學報告</h1>	  
	 
	  <h3>系級:</h3>
	  <form action="abroadreport.php" method = "post">
	  <select name="department">
	  <option value="all">全部</option>
　	  <option value="GPE">政經</option>
　	  <option value="ELC">語言</option>
　	  <option value="ITM">觀光</option>
　	  <option value="IIT_SE">資軟</option>
	  <option value="IIT_AI">應資</option>
	  </select>
	  <input type="submit">
	  </form>

<div id="title"></div>
  <div id="maintext" style="text-align: left; padding-left:100px;">  
<?php echo "共有 $numRows 筆心得報告書 "; ?>
<br><br>
 	<div id="navigation"><a href="writereport.php">撰寫</a></div>
<?php
//如果留言筆數大於 0, 便顯示留言的內容
if ($numRows>0) {
  echo '<ul>';
  $i=1;
  while ($row = mysqli_fetch_array($result)) {
    //將姓名中的特殊字元轉成 HTML 碼
    $name=htmlspecialchars($row['name'], ENT_QUOTES);
    //將留言中的特殊字元、換行字元、與空白轉成 HTML 碼
    $report1=htmlspecialchars($row['rpt1'], ENT_QUOTES);
    $report1=str_replace('  ', '&nbsp;&nbsp;', nl2br($report1));
	$pic1=htmlspecialchars($row['l1'], ENT_QUOTES);
	$report2=htmlspecialchars($row['rpt2'], ENT_QUOTES);
    $report2=str_replace('  ', '&nbsp;&nbsp;', nl2br($report2));
	$pic2=htmlspecialchars($row['l2'], ENT_QUOTES);
	$report3=htmlspecialchars($row['rpt3'], ENT_QUOTES);
    $report3=str_replace('  ', '&nbsp;&nbsp;', nl2br($report3));
	$report4=htmlspecialchars($row['rpt4'], ENT_QUOTES);
    $report4=str_replace('  ', '&nbsp;&nbsp;', nl2br($report4));
	$report5=htmlspecialchars($row['rpt5'], ENT_QUOTES);
    $report5=str_replace('  ', '&nbsp;&nbsp;', nl2br($report5));
	//$dep="SELECT user_dep FROM user JOIN report WHERE user.user_name = report.姓名";
	if (isset ($_SESSION['user_id']) && ($_SESSION['yourname'])==$name){
	echo "<a href=\"reportdelete.php?report_del={$row['rpt_num']}\" style=\"right:0px; float:right;\">刪除</a>";
	echo " ";
	echo "<a href=\"reportedit.php?reportedit={$row['rpt_num']}\" style=\"right:0px; float:right;\">編輯</a>";
}


    //顯示不同的背景顏色, 方便閱讀
    if ($i%2==0) {$liclass='even';}
    else         {$liclass='odd';}

    //顯示留言者姓名、留言日期時間、與留言內容
    echo "<li class=\"$liclass\"><p><strong>$name</strong>
	      <em>於 {$row['rpt_date']}報告</em> &nbsp;&nbsp;&nbsp;{$row['dept']}</p>
		  
		  <p>$report1 <a href=\"$pic1\" style=\"padding-left:730px;/n\">【照片1】</a></p>
		  <p>$report2 <a href=\"$pic2\" style=\"padding-left:730px;/n\">【照片2】</a></p>
		  <p>$report3</p>
		  <p>$report4</p>
		  <p>$report5</p>
		  </li>";
    $i++;
  }
  echo '</ul>';
}
?>
  </div>
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