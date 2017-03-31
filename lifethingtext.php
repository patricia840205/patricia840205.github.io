<?php
session_start();  // 啟用交談期
$db = mysqli_connect("localhost","patricia840205","9101179", "ch09");

include("mysql2.inc.php");

$myTable='guestbook';		//設定本程式所使用的資料表

//查詢所有欄位, 並且依照編號遞減排序, 讓最新留言顯示在最前面
$result=mysqli_query($conn, 
        "SELECT * FROM $myTable ORDER BY 留言編號 DESC");
$numRows = mysqli_num_rows($result);  //取得留言的總筆數  
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>生活瑣事</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="forum.css">
	</head>
	
	<body>
	  <div><h1>生活瑣事</h1></div>
	  <?php
          if(isset($_SESSION['username'])) { //登入成功 ?>
              <div class="success"><p style="padding: 0px 50px 0px 0px; float:right;">歡迎使用者登入</p></div>
			  <form action="logout.php">
			  <br><br><br>
			  <p><input type="submit" value="登出" style="float:right;"></p>
  <?php  } else { $msg = "未登入或帳號密碼有錯誤!";//未登入 ?>
        
	  <form style="padding: 0px 20px 0px 0px; float:right;" action="login.php" method="post">
 
  <table style="color:white" name="login">
 <tr>
   <td style="color:white;background-color:#7676a3">帳號 : </td>
   <td><input type="text" name="Username" 
             size="20" maxlength="10" required></td>
 </tr>
 <tr>
   <td style="background-color:#7676a3">密碼 : </td>
   <td><input type="password" name="Password"
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
				<a href="#">學分抵免</a>    
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
				<a href="secondhand.php">二手買賣</a>    
                </li>
                
            </ul>
        
    </ul>
	   </li>
	       
      </nav>
	  
	  
	   <h1>留言板</h1>  
	  <h3>分類:</h3>
	  <form>
	  <select name="type">
	  <option value="all">全部</option>
　	  <option value="food">食</option>
　	  <option value="cloth">衣</option>
　	  <option value="life">住</option>
　	  <option value="transfer">行</option>
	  <option value="play">娛樂</option>
　	  <option value="feeling">心情</option>
　	  <option value="other">其他</option>
	  </select>
	  </form>
	  
	  <form>
	  <select name="school">
　	  <option value="#1">全部</option>
　	  <option value="#2">華盛頓州立大學</option>
　	  <option value="#3">夏威夷太平洋大學</option>
　	  <option value="#4">維諾納州立大學</option>
　	  <option value="#5">莎福克大學</option>
	  <option value="#6">舊金山州立大學</option>
　	  <option value="#7">天普大學</option>
　	  <option value="#8">賓州印第安那大學</option>
	  <option value="#9">紐約州立大學科特蘭分校</option>
　	  <option value="#10">加州州立大學_長堤分校</option>
　	  <option value="#11">加州州立大學_沙加緬度分校</option>
　	  <option value="#12">桑德蘭大學</option>
	  <option value="#13">牛津布魯克大學</option>
　	  <option value="#14">昆士蘭大學</option>
　	  <option value="#15">新南威爾斯大學</option>
	  <option value="#16">布蘭登大學</option>
　	  <option value="#17">懷卡特大學</option>
　	  <option value="#18">立命館太平洋大學</option>
　	  <option value="#19">華沙大學</option>
	  <option value="#20">查爾斯大學</option>
　	  <option value="#21">南十字星大學</option>
　	  <option value="#22">國際飯店管理學院</option>
	  <option value="#23">阿聯酋酒店管理學院</option>
　	  <option value="#24">雙威大學</option>
	  </select>
	  </form>
	  
      


<h3>發表文章:</h3>
<div id="title">
	
  
  </div>
  <div id="maintext" style="text-align: left; padding-left:100px;">  
<?php echo "共有 $numRows 筆留言 "; ?>
<br><br>
 	<div id="navigation"><a href="leavemsg.php">我要留言</a></div>
<?php
//如果留言筆數大於 0, 便顯示留言的內容
if ($numRows>0) {
  echo '<ul>';
  $i=1;
  while ($row = mysqli_fetch_array($result)) {
    //將姓名中的特殊字元轉成 HTML 碼
    $name=htmlspecialchars($row['姓名'], ENT_QUOTES);
    //將留言中的特殊字元、換行字元、與空白轉成 HTML 碼
    $message=htmlspecialchars($row['留言'], ENT_QUOTES);
    $message=str_replace('  ', '&nbsp;&nbsp;', nl2br($message));

    //顯示不同的背景顏色, 方便閱讀
    if ($i%2==0) {$liclass='even';}
    else         {$liclass='odd';}

    //顯示留言者姓名、留言日期時間、與留言內容
    echo "<li class=\"$liclass\"><p><strong>$name</strong>
	      <em>於 {$row['日期時間']}留言</em></p>
		  <p>$message</p></li>";
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