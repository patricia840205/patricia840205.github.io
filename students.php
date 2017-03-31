<?php
session_start();  // 啟用交談期
if (empty($_SESSION['user_id'])) {
	echo '<script tpye="text/javascript">';
	echo 'alert("請先登入");';
	echo 'window.location.href = "index.php";';
	echo '</script>';
}

include("mysql.inc.php");


if (!empty($_POST['a']) && !empty($_POST['b']) && !empty($_POST['c']) && !empty($_POST['d']) && !empty($_POST['type']) && !empty($_POST['e']) && !empty($_POST['f']) && !empty($_POST['g'])){
  //將 name 與 qty 欄位值新增至 【inventory】 資料表
  if (isset($_POST["submit"])){
	 $s=(string) $_POST["type"];
	 switch ($s){
		case "all": $sql = "INSERT INTO transfer_record (tku_coursename_ch)
                                VALUES ('') ";
			break;
		case 1: $sql = "INSERT INTO transfer_record (tku_coursename_ch)
                                VALUES ('國際觀光行銷') ";
			break;
		case 2: $sql = "INSERT INTO transfer_record (tku_coursename_ch)
                                VALUES ('觀光旅遊管理') ";
			break;
	 }
  }
  $sql="INSERT transfer_record (for_course_name, hours, for_credits, for_score, tku_coursename_ch, transfer_credits, syllabus, 	transcript) WHERE for_course_name like'Marketing%'
        VALUES ('{$_POST['a']}','{$_POST['b']}', '{$_POST['c']}', '{$_POST['d']}', '{$_POST['type']}', '{$_POST['e']}','{$_POST['f']}','{$_POST['g']}')";
  mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>大三出國論壇</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="forum.css">
		<script src="jquery-3.1.1.min.js"></script>
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
				<a href="#">學分抵免</a>    
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
				<a href="secondhand.php">二手買賣</a>    
                </li>
                
            </ul>
        
    </ul>
	   </li>
	   
	   
	   
       
      </nav>
	  
	 <main>
<body>

<div id="image">

     <h2><p align ="center"><span style="font-weight:bolder;">大三出國輔導通報系統 - 學分抵免</h2></p></span>
   

     <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
     <table style = "border.5px;height:150px;width:800px;background-color:#C2C2FF; "align= "center" cellpadding ="5" frame = "void" rules= "none" >
	 <tr>	 
	 <td style="color:white;">正式課程名稱</td>
	 <td style="color:white;">時數</td>
	 <td style="color:white;">學分</td>
	 <td style="color:white;">成績</td>
	 <td style="color:white;">抵免課程名稱</td>
	 <td style="color:white;">淡江學分</td>
	 <td style="color:white;">課程大綱</td>
	 <td style="color:white;">成績證明</td>
	 </tr>
	  
	 <tr>
	 <td><input name="a" required></td>
	 <td><input size="5" name="b" required></td>
	 <td><input size="5" name="c" required></td>
	 <td><input size="5" name="d" required></td>
	 <td>
	 <select name="type">
	  <option value="all"></option>
　	  <option value="1">國際觀光行銷</option>
　	  <option value="2">觀光旅遊管理</option>
	  </select></td>
	 <td><input size="5"name="e" required></td>
	 <td><input size="5" name="f" required></td>
	 <td><input size="5" name="g" required></td>
	 </tr>
	 </table> 
	 <input type="submit" value="submit" style="float:right;">
	 </form>
	 <br>
	 
	 <?php

//使用【書籍名稱】排序, 查詢 【inventory】 資料表的所有資料
$sql="SELECT * FROM transfer_record WHERE for_course_name like'Marketing%' ORDER BY for_course_name ";
$result=mysqli_query($conn, $sql);

//如果查到的記錄筆數大於 0, 便使用迴圈顯示所有資料
if (mysqli_num_rows($result) >0){
  echo "<hr><table border='1' align='center';>
        <tr><th>正式課程名稱</th><th>時數</th><th>學分</th><th>成績</th><th>抵免課程名稱</th><th>淡江學分</th><th>課程大綱</th><th>成績證明</th></tr>";

  while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td>{$row['for_course_name']}</td>
              <td>{$row['hours']}</td>
			  <td>{$row['for_credits']}</td>
			  <td>{$row['for_score']}</td>
			  <td>{$row['tku_coursename_ch']}</td>
			  <td>{$row['transfer_credits']}</td>
			  <td>{$row['syllabus']}</td>
			  <td>{$row['transcript']}</td></tr>";
  }
  echo '</table>';
}
?>
	 
</div>
</div>
<footer>
<div id="footer">
淡江大學 蘭陽校園<br>
地址：26247 宜蘭縣礁溪鄉林美村林尾路180號
電話：03-9873088 (行動節費0978-190-979) 傳真：03-9873066
</div>
</footer> 
</html>