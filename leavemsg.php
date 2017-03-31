<?php
session_start();  // 啟用交談期
if (empty($_SESSION['user_id'])) {
	echo '<script tpye="text/javascript">';
	echo 'alert("請先登入");';
	echo 'window.location.href = "index.php";';
	echo '</script>';
}


if (!empty($_POST['myname']) && !empty($_POST['topic']) && !empty($_POST['post']) && !empty($_POST['type1']) && !empty($_POST['type2'])){
	if (isset($_POST["submit"])){
	 $s=(string) $_POST["type1"];
	 switch ($s){
		case "all": $sql = "INSERT INTO post (category)
                                VALUES ('all') ";
			break;
		case "食": $sql = "INSERT INTO post (category)
                                VALUES ('食') ";
			break;
		case "衣": $sql = "INSERT INTO post (category)
                                VALUES ('衣') ";
			break;
		case "住": $sql = "INSERT INTO post (category)
                                VALUES ('住') ";
			break;
		case "行": $sql = "INSERT INTO post (category)
                                VALUES ('行') ";
			break;
		case "娛樂": $sql = "INSERT INTO post (category)
                                VALUES ('娛樂') ";
			break;
		case "心情": $sql = "INSERT INTO post (category)
                                VALUES ('心情') ";
			break;
		case "其他": $sql = "INSERT INTO post (category)
                                VALUES ('其他') ";
			break;
	 }
	 
	$s2=(string) $_POST["type2"];
	 switch ($s2){
		case 1: $sql = "INSERT INTO post (school_name)
                                VALUES ('whole') ";
			break;
		case 2: $sql = "INSERT INTO post (school_name)
                                VALUES ('華盛頓州立大學') ";
			break;
		case 3: $sql = "INSERT INTO post (school_name)
                                VALUES ('夏威夷太平洋大學') ";
			break;
		case 4: $sql = "INSERT INTO post (school_name)
                                VALUES ('維諾納州立大學') ";
			break;
		case 5: $sql = "INSERT INTO post (school_name)
                                VALUES ('莎福克大學') ";
			break;
		case 6: $sql = "INSERT INTO post (school_name)
                                VALUES ('舊金山州立大學') ";
			break;
		case 7: $sql = "INSERT INTO post (school_name)
                                VALUES ('天普大學') ";
			break;
		case 8: $sql = "INSERT INTO post (school_name)
                                VALUES ('賓州印第安那大學') ";
			break;
		case 9: $sql = "INSERT INTO post (school_name)
                                VALUES ('紐約州立大學科特蘭分校') ";
			break;
		case 10: $sql = "INSERT INTO post (school_name)
                                VALUES ('加州州立大學_長堤分校') ";
			break;
		case 11: $sql = "INSERT INTO post (school_name)
                                VALUES ('加州州立大學_沙加緬度分校') ";
			break;
		case 12: $sql = "INSERT INTO post (school_name)
                                VALUES ('桑德蘭大學') ";
			break;
		case 13: $sql = "INSERT INTO post (school_name)
                                VALUES ('牛津布魯克大學') ";
			break;
		case 14: $sql = "INSERT INTO post (school_name)
                                VALUES ('昆士蘭大學') ";
			break;
		case 15: $sql = "INSERT INTO post (school_name)
                                VALUES ('新南威爾斯大學') ";
			break;
		case 16: $sql = "INSERT INTO post (school_name)
                                VALUES ('布蘭登大學') ";
			break;
		case 17: $sql = "INSERT INTO post (school_name)
                                VALUES ('懷卡特大學') ";
			break;
		case 18: $sql = "INSERT INTO post (school_name)
                                VALUES ('立命館太平洋大學') ";
			break;
		case 19: $sql = "INSERT INTO post (school_name)
                                VALUES ('華沙大學') ";
			break;
		case 20: $sql = "INSERT INTO post (school_name)
                                VALUES ('查爾斯大學') ";
			break;
		case 21: $sql = "INSERT INTO post (school_name)
                                VALUES ('南十字星大學') ";
			break;
		case 22: $sql = "INSERT INTO post (school_name)
                                VALUES ('國際飯店管理學院') ";
			break;
		case 23: $sql = "INSERT INTO post (school_name)
                                VALUES ('阿聯酋酒店管理學院') ";
			break;
		case 24: $sql = "INSERT INTO post (school_name)
                                VALUES ('雙威大學') ";
			break;
	 }
}
	$sql="INSERT INTO post (姓名, 標題, 貼文內容, category, school_name)
	      VALUES ('{$_POST['myname']}', '{$_POST['topic']}', '{$_POST['post']}', '{$_POST['type1']}', '{$_POST['type2']}')";
mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>生活瑣事</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="forum.css">
		<script src="jquery-3.1.1.min.js"></script>
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
				<a href="studyabroad.php">留學報告</a>    
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
	  
	 <main>
		<div id="title">
    <h1>留言板</h1>
	<script type="text/javascript">

	//設定最多可輸入多少字
	var minChr = 10;
	//用來儲存目前已輸入多少字
	var nowChr = 0;
	//計算字數
	function count(value){
		nowChr = value.length;
		document.getElementById("info").innerHTML="目前已輸入"+nowChr+"個字，至少要輸入"+minChr+"個字。";
	}
	//檢驗字數是否<=maxChr
	$(document).ready(function() {
	$("#addpost").on('submit', function(ev){
		if (nowChr < minChr) {
			alert("你至少還要輸入"+(minChr-nowChr)+"個字。");
			ev.preventDefault();
		} else {
			alert("滿10個字囉！您可以繼續填寫或發表");
			window.event.returnValue=true;
		}
	});
});
	//初始化DIV部份用
document.getElementById("info").innerHTML="目前已輸入"+nowChr+"個字，至少要輸入"+minChr+"個字。";
</script>
  </div>
  <div id="maintext" style="text-align: center;">
  <form id="addpost" method="post" action="msgsuccess.php" name="addpost">
    <p style="padding-right:180px;" name="myname"><?php echo $msg = "姓名: ".$_SESSION['yourname'].""; ?></p>
	&nbsp;&nbsp;主題: <input style="padding-right:80px;" name="topic" required>
	
	
	  <div>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
      </div>
	  
    <p style="padding-right:180px;">請輸入內容:</p>
	<h5><div id="info"></div></h5>
    <textarea cols="35" rows="7" id="myText" onkeyup="count(this.value)" name="post" required></TEXTAREA>
	
    <br><br>
    <input name="submit" type="submit" value="送出" > &nbsp;
    &nbsp; <input name="reset." type="reset" value="清除">
  </form>
  </div>
  
		</main>
<p><a href="lifething.php" style="padding-left:450px;">回系統首頁</a></p>

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