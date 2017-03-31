<?php
session_start();  // 啟用交談期
?>
 <!DOCTYPE html>
<html>
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
    <h1>留言板</h1>
	</div>
<div id="maintext" style="text-align: left; padding-left:100px;"> 
<?php
header('Content-Type: text/html; charset=utf-8');
include("mysql.inc.php");

if (isset($_POST["post_id"]))
	$post_id = mysqli_real_escape_string($conn,$_POST['post_id']);
if (isset($_POST["topic"]))
	$topic = mysqli_real_escape_string($conn,$_POST['topic']);
if (isset($_POST["post"]))
	$post = mysqli_real_escape_string($conn,$_POST['post']);
if (isset($_POST["type1"]))
	$type1 = mysqli_real_escape_string($conn,$_POST['type1']);
if (isset($_POST["type2"]))
	$type2 = mysqli_real_escape_string($conn,$_POST['type2']);
/* See what's inside $_POST[]
echo "<table>";
	foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }
echo "</table>";
*/

//echo "myname: {$myname}";
//echo "message: {$message}<br />";
//如果以 POST 方式傳遞過來的 id, qty 參數都不是空字串
if ( !empty($post_id) && !empty($topic) && !empty($post) && !empty($type1) && !empty($type2)){
  //更新 id 參數所指定編號的記錄
  mysqli_set_charset($conn, "utf8");
  $sql="UPDATE post SET 貼文內容 = '{$post}', 標題 = '{$topic}', category = '{$type1}', school_name = '{$type2}' WHERE 貼文編號 = '{$post_id}' ";
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
<p><a href="lifething.php" style="float:right;">回系統首頁</a></p>

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
<!--
Problems:
1. UPDATE: SET 留言 = '{$_POST['myname']}' WHERE 留言編號 = '{$_POST['message']}' "; " <- this is used to put the $message inside 留言編號 and put $myname inside 留言.
	Look at your table 
2. you didn't use mysqli_real_escape_string. this is dangerous. you'll get less score
3. $_POST['myname'] <- POST doesn't provide myname. it provide the ID. so
完  !? 我一定要PUT STRING 是這個意思嗎 put what string? 要送到mysql當然要

上面都看得懂? 2.公式? 差不多?
如果 上一頁有form,然後要把form的內容送到SQL,你一定要寫 mysqli_real_escape_string($sql, $_POST['var']) 不然會危險 要看?
sure
好我不太記得怎麼打 反正就是符號會出問題?
喔 PHP 有更新這個
還是寫一夏比較安全  更新哪個 我剛剛講的安全問題  跟更新有關? 當然有 有更寫要寫沒更新也要寫啊 恩  好 謝謝 ˊˋ
-->