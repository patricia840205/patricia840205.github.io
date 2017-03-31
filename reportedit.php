<?php
session_start();
include("mysql.inc.php");

//如果以 GET 方式傳遞過來的 edit 參數不是空字串
if (!empty($_GET['reportedit'])){
  //查詢 edit 參數所指定編號的記錄, 從資料庫將原有的資料取出
  $sql="SELECT * FROM report WHERE 報告編號 = '{$_GET['reportedit']}' ";
  $result=mysqli_query($conn, $sql);
  //將查詢到的資料放在 $row 陣列
  $row=mysqli_fetch_array($result);
}
else {
  //如果沒有 edit 參數, 表示此為錯誤執行, 所以轉向回主頁面
  header("Location: abroadreport.php");
}

if (!empty($_POST['name']) && !empty($_POST['report1']) && !empty($_POST['pic1']) && !empty($_POST['report2']) && !empty($_POST['pic2']) && !empty($_POST['report3']) && !empty($_POST['report4']) && !empty($_POST['report5']) ){
	$sql="INSERT report (姓名, 心得報告1, 心得報告2, 心得報告3, 心得報告4, 心得報告5)
	      VALUES ('{$_POST['name']}', '{$_POST['report1']}', '{$_POST['pic1']}', '{$_POST['report2']}', '{$_POST['pic2']}', '{$_POST['report3']}', '{$_POST['report4']}', '{$_POST['report5']}')";
mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
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
   <td><input type="password" name="password"
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
    <div id="title">
	<h3>編輯出國心得報告</h3>
	<script type="text/javascript">
	//設定最多可輸入多少字
	var minChr1 = 300, minChr2 = 250, minChr3 = 250, minChr4 = 200;
	//用來儲存目前已輸入多少字
	var nowChr1 = 0, nowChr2 = 0, nowChr3 = 0, nowChr4 = 0, nowChr5 = 0;
	//計算字數
	function count1(value){
		nowChr1 = value.length;
		document.getElementById("info1").innerHTML="目前已輸入"+nowChr1+"個字，至少要輸入"+minChr1+"個字。";
	}
	function count2(value){
		nowChr2 = value.length;
		document.getElementById("info2").innerHTML="目前已輸入"+nowChr2+"個字，至少要輸入"+minChr2+"個字。";
	}
	function count3(value){
		nowChr3 = value.length;
		document.getElementById("info3").innerHTML="目前已輸入"+nowChr3+"個字，至少要輸入"+minChr3+"個字。";
	}
	function count4(value){
		nowChr4 = value.length;
		document.getElementById("info4").innerHTML="目前已輸入"+nowChr4+"個字，至少要輸入"+minChr4+"個字。";
	}
	function count5(value){
		nowChr5 = value.length;
		document.getElementById("info5").innerHTML="目前已輸入"+nowChr5+"個字。";
	}
	//檢驗字數是否<=maxChr	
    $(document).ready(function() {
	$("#editreport").on('submit', function(ev){
		if ((nowChr1+nowChr2+nowChr3+nowChr4) < 1000) {
			alert("你至少還要輸入"+(1000-(nowChr1+nowChr2+nowChr3+nowChr4))+"個字。");
			ev.preventDefault();
		} else {
			alert("滿1000個字囉！您可以繼續填寫或發表");
			window.event.returnValue=true;
		}
	});
});
	//初始化DIV部份用
	
</script>
</div>
 
	  <div id="maintext" style="text-align: center;">
  <form method="post" id="editreport" name="editreport" action="reporteditsuccess.php">
    <p style="padding-right:650px;" name="name"><?php echo $msg = "姓名: ".$_SESSION['yourname'].""; ?></p>

    <p style="padding-right:600px;">出國留學心得報告書:</p>
	
	<p style="padding-right:600px;">&lt;一&gt; 課程學習:</p>
	<h4><p style="float:left; padding-left:100px;">*最喜歡的一堂課、授課老師簡介或課程推薦篇等&#40;至少300字&#41;</p></h4>
	<br><br>
	<h5 style="color: #b30000;"><div id="info1"></div></h5>
    <textarea cols="100" rows="8" id="report1" name="report1" onkeyup="count1(this.value)" required><?php echo $row['心得報告1'];?></TEXTAREA>
	<br>
	<p style="padding-right:150px;" required>照片網址1: <input size="75" name="pic1" value= <?php echo $row['linkk1'];?>></p>
	
	<p style="padding-right:600px;">&lt;二&gt; 生活環境:</p>
	<h4><p style="float:left; padding-left:100px;">*學校校園、住宿、周邊環境簡介、當地氣候或食衣住行方面等相關訊息&#40;至少250字&#41;</p></h4>
	<br><br>
	<h5 style="color: #b30000;"><div id="info2"></div></h5>
	<textarea cols="100" rows="7" id="report2" name="report2" onkeyup="count2(this.value)" required><?php echo $row['心得報告2'];?></TEXTAREA>
	<br>
	<p style="padding-right:150px;" required>照片網址2: <input size="75" name="pic2" value= <?php echo $row['linkk2'];?>></p>
	
	<p style="padding-right:600px;">&lt;三&gt; 自我成長:</p>
	<h4><p style="float:left; padding-left:100px;">*如何克服生活或課程上所碰到的困難;文化衝擊的體驗等&#40;至少250字&#41;</p></h4>
	<br><br>
	<h5 style="color: #b30000;"><div id="info3"></div></h5>
	<textarea cols="100" rows="7" id="report3" name="report3" onkeyup="count3(this.value)" required><?php echo $row['心得報告3'];?></TEXTAREA>
	
	<p style="padding-right:565px;">&lt;四&gt; 大三出國建議:</p>
	<h4><p style="float:left; padding-left:100px;">*給學弟妹大三出國的相關建議&#40;至少200字&#41;</p></h4>
	<br><br>
	<h5 style="color: #b30000;"><div id="info4"></div></h5>
	<textarea cols="100" rows="6" id="report4" name="report4" onkeyup="count4(this.value)" required><?php echo $row['心得報告4'];?></TEXTAREA>
	
	<p style="padding-right:625px;">&lt;五&gt; 其他:</p>
	<h4><p style="float:left; padding-left:100px;">*大三出國其他相關值得紀錄的經驗&#40;加分項目，不限字數&#41;</p></h4>
	<br><br>
	<h5 style="color: #b30000;"><div id="info5"></div></h5>
	<textarea cols="100" rows="9" id="report5" name="report5" onkeyup="count5(this.value)" required><?php echo $row['心得報告5'];?></TEXTAREA>
	

    <input name="report_id" type="hidden" value="<?php echo $row['報告編號'];?>">
    <p style="padding-right:65px;"><input name="submit" type="submit" style="float:right;" value="送出"></p>
	<br>
	<p><a href="abroadreport.php">回系統首頁</a></p>
  </form>
  </div>
  <br>
  
 
 
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