<?php
session_start(); 
include("mysql.inc.php");

//如果以 GET 方式傳遞過來的 edit 參數不是空字串
if (!empty($_GET['detailed'])){
  //查詢 edit 參數所指定編號的記錄, 從資料庫將原有的資料取出
  //$sql="SELECT * FROM comment WHERE 留言編號 = '{$_GET['detailed']}' ";
  
  //$sql="SELECT * FROM post WHERE 貼文編號 = '{$_GET['detailed']}' ";  
  //echo $sql;
  
  //$sql = "SELECT * FROM comment WHERE topic_id = '{$_GET['detailed']}' ";
  
  //$result=mysqli_query($conn, $sql);
  //將查詢到的資料放在 $row 陣列
  //$row=mysqli_fetch_array($result);
  
  //$post="SELECT * FROM post WHERE 貼文編號 = ' {$row['留言編號'] }'";
  //$result=mysqli_query($conn, $post);
  //$thing=mysqli_fetch_array($result);
  
  //$num = mysqli_real_escape_string($conn, $_GET['detailed']);
  //$that="select * from comment where topic_id = '$num'";
  //echo "that: " . $that . " <br> ";
  //$res=mysqli_query($conn, $that);
  //$resultmsg=mysqli_query($conn, "SELECT * FROM comment WHERE $num = comment.topic_id ORDER BY 留言編號");
  //$numRows = mysqli_num_rows($resultmsg); 
  //$thisr=mysqli_fetch_array($res);
  //var_dump($thisr);
  //while($thisr = $res -> fetch_assoc()) {
//	echo "留言編號: " . $row["留言編號"] . " - 姓名: " . $row["姓名"] . " - 留言: " . $row["留言"]. " - 日期時間: " . $row["日期時間"] . " - 貼文編號: " . $row["貼文編號"] . " - topic_id: " . $row["topic_id"] . "<br>";
 // }
  $sql = "SELECT * FROM post WHERE 貼文編號 = '{$_GET['detailed']}'";
  $result=mysqli_query($conn, $sql);
  $thing=mysqli_fetch_array($result);
  $sql = "SELECT * FROM comment WHERE topic_id = '{$_GET['detailed']}'";
  $res=mysqli_query($conn, $sql);
  $numRows = mysqli_num_rows($res);
}

else {
  //如果沒有 edit 參數, 表示此為錯誤執行, 所以轉向回主頁面
  header("Location: lifething.php");
}

if (!empty($_POST['myname']) && !empty($_POST['message']) ){
	$sql="INSERT comment (姓名, 留言)
	      VALUES ('{$_POST['myname']}', '{$_POST['message']}')";   
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
	  
	  
	  <div id="maintext" style="border-bottom: 1px solid #000; ">
      <?php 
	        echo "
			<div style='background-color:lightGrey;'>
	   <h3 style='background-color:#8585ad; text-align:center;'><strong>&nbsp;※".$thing['標題']."</h2></strong>
       <p style='background-color:lightGrey; text-align:left;'>&nbsp;&nbsp;".$thing['貼文內容']."</p>
	   <p style='background-color:lightGrey; padding-left:570px;'><strong>".$thing['姓名']."</strong>&nbsp;&nbsp;<em>於 {$thing['日期時間']}貼文</em></p></div>";  
	  
	  ?>


  </div>
  <div id="maintext" style="text-align: left; padding-left:100px;">  
  <?php echo "共有 $numRows 筆留言 "; ?>
  <div id="navigation"><a href="leavemsg2.php?detailed=<?php echo $_GET['detailed']; ?>">我要留言</a></div>

	<?php
//如果留言筆數大於 0, 便顯示留言的內容
if ($numRows>0) {
  echo '<ul>';
  $i=1;
  while ($thisr = mysqli_fetch_array($res)) {
  //var_dump($thisr);
	//echo "<a href='detailed.php?detailed={$row['留言編號']}' style='right:340px; position : absolute;'>詳細內容</a>";
	

    //顯示不同的背景顏色, 方便閱讀
    
	//$topic_bk='topic_BK';
    //顯示留言者姓名、留言日期時間、與留言內容
	
	
	//while($thisr = $res -> fetch_assoc()) {
        //echo "留言編號: " . $row["留言編號"] . " - 姓名: " . $row["姓名"] . " - 留言: " . $row["留言"]. " - 日期時間: " . $row["日期時間"] . " - 貼文編號: " . $row["貼文編號"] . " - topic_id: " . $row["topic_id"] . "<br>";
	//將姓名中的特殊字元轉成 HTML 碼
    $name=htmlspecialchars($thisr['姓名'], ENT_QUOTES);
    
	//將留言中的特殊字元、換行字元、與空白轉成 HTML 碼
    $message=htmlspecialchars($thisr['留言'], ENT_QUOTES);
	$message=str_replace('  ', '&nbsp;&nbsp;', nl2br($message));
	
	if ($i%2==0) {$liclass='even';}
    else         {$liclass='odd';}
	
	echo "<li class=\"$liclass\">";
	if (isset ($_SESSION['user_id']) && @($_SESSION['yourname'])==$name) {
		 echo "<a href='edit2.php?edit2={$thisr['留言編號']}' style='right:0px; float:right;'>編輯&nbsp;</a>";
	}
	//echo "<a href='delete.php?del={$thisr['留言編號']}' style='right:0px; float:right;' type='hidden;'>刪除</a>";   then
	if (isset($_SESSION['user_id']) && @($_SESSION['yourname']==$name) || @($thing['姓名'] == $_SESSION['yourname'])) {  
		echo "<a href='delete2.php?del2={$thisr['留言編號']}' style='right:0px; float:right;' type='hidden;'>刪除</a>";
	}
 
	echo " <p>&nbsp;{$message}</p>
		  <p style='padding-left:570px;'><strong>$name</strong><em>於 {$thisr['日期時間']}貼文</em></p>";
		  
	echo "</li>";
	
	
    $i++;
	
	//}
  }
  echo '</ul>';
}
  mysqli_free_result($res);
?>	
		
		

  <p><a href="lifething.php" style="float:right;">回系統首頁</a></p>
</body>
</html>