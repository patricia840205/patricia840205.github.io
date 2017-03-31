<?php
session_start();  // 啟用交談期
$db = mysqli_connect("localhost","patricia840205","9101179", "user");

include("mysql.inc.php");

$myTable='post';		//設定本程式所使用的資料表


if (isset($_POST['type1']) ) {
	$type1 = $_POST['type1'];
} else {
	$type1 = 'all';
}

if (isset($_POST['type2']) ) {
	$type2 = $_POST['type2'];
} else {
	$type2 = 'whole';
}

if ($type1=='all' && $type2=='whole') {
	//$sql = "SELECT * FROM post;"
	$sql = "SELECT post.姓名 as name, post.標題 as topic, post.貼文內容 as post_content, post.貼文編號 as post_num, post.日期時間 as post_date, post.category as cat, post.school_name as school FROM post order by 貼文編號 DESC;";
} else if ($type1=='all') {
	$sql = "SELECT post.姓名 as name, post.標題 as topic, post.貼文內容 as post_content, post.貼文編號 as post_num, post.日期時間 as post_date, post.category as cat, post.school_name as school FROM post where '$type2' = post.school_name order by 貼文編號 DESC;";
} else if ($type2=='whole') {
	$sql = "SELECT post.姓名 as name, post.標題 as topic, post.貼文內容 as post_content, post.貼文編號 as post_num, post.日期時間 as post_date, post.category as cat, post.school_name as school FROM post where '$type1' = post.category order by 貼文編號 DESC;";
} else {
	$sql = "SELECT post.姓名 as name, post.標題 as topic, post.貼文內容 as post_content, post.貼文編號 as post_num, post.日期時間 as post_date, post.category as cat, post.school_name as school FROM post where '$type1' = post.category AND '$type2' = post.school_name order by 貼文編號 DESC;";
}

//查詢所有欄位, 並且依照編號遞減排序, 讓最新留言顯示在最前面
mysqli_set_charset($db, "utf8");
//$result=mysqli_query($conn, "SELECT * FROM $myTable ORDER BY 貼文編號");
$result = mysqli_query($conn, $sql);
if ($result==false) {
	die(mysqli_error($conn));
}
$numRows = mysqli_num_rows($result);  //取得留言的總筆數  
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>大三出國論壇</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="forum.css">
	</head>
	
	<body>
	  <div><h1>生活瑣事</h1></div>
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
	  
	  
	   <h1>留言板</h1>  
	  <h3>分類:</h3>
	  <form action="lifething.php" method = "post">
	  <select name="type1">
	  <option value="all">全部</option>
　	  <option value="食">食</option>
　	  <option value="衣">衣</option>
　	  <option value="住">住</option>
　	  <option value="行">行</option>
	  <option value="娛樂">娛樂</option>
　	  <option value="心情">心情</option>
　	  <option value="其他">其他</option>
	  </select>
	  
	  <select name="type2">
　	  <option value="whole">全部</option>
　	  <option value="華盛頓州立大學">華盛頓州立大學</option>
　	  <option value="夏威夷太平洋大學">夏威夷太平洋大學</option>
　	  <option value="維諾納州立大學">維諾納州立大學</option>
　	  <option value="莎福克大學">莎福克大學</option>
	  <option value="舊金山州立大學">舊金山州立大學</option>
　	  <option value="天普大學">天普大學</option>
　	  <option value="賓州印第安那大學">賓州印第安那大學</option>
	  <option value="紐約州立大學科特蘭分校">紐約州立大學科特蘭分校</option>
　	  <option value="加州州立大學_長堤分校">加州州立大學_長堤分校</option>
　	  <option value="加州州立大學_沙加緬度分校">加州州立大學_沙加緬度分校</option>
　	  <option value="桑德蘭大學">桑德蘭大學</option>
	  <option value="牛津布魯克大學">牛津布魯克大學</option>
　	  <option value="昆士蘭大學">昆士蘭大學</option>
　	  <option value="新南威爾斯大學">新南威爾斯大學</option>
	  <option value="布蘭登大學">布蘭登大學</option>
　	  <option value="懷卡特大學">懷卡特大學</option>
　	  <option value="立命館太平洋大學">立命館太平洋大學</option>
　	  <option value="華沙大學">華沙大學</option>
	  <option value="查爾斯大學">查爾斯大學</option>
　	  <option value="南十字星大學">南十字星大學</option>
　	  <option value="國際飯店管理學院">國際飯店管理學院</option>
	  <option value="阿聯酋酒店管理學院">阿聯酋酒店管理學院</option>
　	  <option value="雙威大學">雙威大學</option>
	  </select>
	  
	  <input type="submit">
	  </form>
	  
      


<h3>發表文章:</h3>
<div id="title">
	
  
  </div>
  <div id="maintext" style="text-align: left; padding-left:100px;">  
<?php echo "共有 $numRows 則貼文 "; ?>

<br><br>
 	<div id="navigation"><a href="leavemsg.php">撰寫貼文</a></div>
<!-- -->
	
	
	
<?php
//如果留言筆數大於 0, 便顯示留言的內容
if ($numRows>0) {
  echo '<ul>';
  $i=1;
  while ($row = mysqli_fetch_array($result)) {
    //將姓名中的特殊字元轉成 HTML 碼
    $name=htmlspecialchars($row['name'], ENT_QUOTES);
	$topic=htmlspecialchars($row['topic'], ENT_QUOTES);
    //將留言中的特殊字元、換行字元、與空白轉成 HTML 碼
    $message=htmlspecialchars($row['post_content'], ENT_QUOTES);
    $message=str_replace('  ', '&nbsp;&nbsp;', nl2br($message));
	echo "<a href='detailed.php?detailed={$row['post_num']}' style='right:340px; position : absolute;'>詳細內容</a>";
	
	if (isset ($_SESSION['user_id']) && ($_SESSION['yourname'])==$name){
	echo "<a href='delete.php?del={$row['post_num']}' style='right:450px; position : absolute;'>刪除</a>";
	echo "<a href='edit.php?edit={$row['post_num']}' style='right:410px; position : absolute;'>編輯</a>";
	
}


    //顯示不同的背景顏色, 方便閱讀
    if ($i%2==0) {$liclass='even';}
    else         {$liclass='odd';}

	//$topic_bk='topic_BK';
    //顯示留言者姓名、留言日期時間、與留言內容

	echo " 
	     
          <li class=\"$liclass\"> 
		  <h3 style='background-color:#8585ad;'><strong>&nbsp;※$topic</strong><em style='color:#663300;'>&nbsp;&nbsp;&nbsp;&#40;{$row['cat']}&nbsp;;{$row['school']}&nbsp;&#41;</em></h3>
		  <p>&nbsp;$message</p>
		  <p style='padding-left:570px;'><strong>$name</strong><em>於 {$row['post_date']}貼文</em></p></li>";
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