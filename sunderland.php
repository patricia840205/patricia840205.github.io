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
  <p style="float:right"><?php echo $msg; ?></p>

<input type="submit" value="登入"><br/><br/>
<?php } ?>
</form>
	  <div id="wrapper">
	  <nav>
      <ul class="drop-down-menu">
	    <li><a href="index.php">首頁</a>
        <li><a href="studyabord.php">出國留學</a>
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
		<main>
		<img id="Taiwan" src="SchoolImages/桑德蘭.jpg" alt="Taiwan" height="300" width="740"><br>
			
			
		
		</main>


  <nav>
        <h2>錄取標準: 雅思6 </h2><br>
		
		     <h2>學校介紹: 英國桑德蘭市位於英格蘭東北部,毗鄰北海,是英國為數不多的海濱城市,人口約30萬.附近風景名勝密佈,交通便捷.英國桑德蘭大學就座落在這個美麗的海濱城市.

英國桑德蘭大學是一所朝氣蓬勃、學科全面的國立綜合性大學,並以其高質量的教學而著名.曾被英國權威媒體《衛報》評為“英格蘭最佳現代新型大學”,而且在最新的英國大學科研評估(Research Assessment Exercise)和英國政府教學評鑑(QAA)中桑德蘭大學在新大學中也位居榜首.

英國桑德蘭大學由五大學院組成: 藝術、設計和傳媒學院,商學院,計算機、工程和技術學院,教育與繼續教育學院,健康、自然科學和社會科學學院。</h2><br>

</nav>

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
