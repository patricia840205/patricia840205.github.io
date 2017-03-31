<?php
session_start();  // 啟用交談期
if (empty($_SESSION['user_id'])) {
	echo '<script tpye="text/javascript">';
	echo 'alert("請先登入");';
	echo 'window.location.href = "index.php";';
	echo '</script>';
}

if (!empty($_POST['myname']) && !empty($_POST['message'])){
	$sql="INSERT INTO comment (姓名, 留言內容, topic_id)
	      VALUES ('{$_POST['myname']}', '{$_POST['message']}', '{$_POST['topic_id']}')";
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
	var minChr = 0;
	//用來儲存目前已輸入多少字
	var nowChr = 0;
	//計算字數
	function count(value){
		nowChr = value.length;
		document.getElementById("info").innerHTML="目前已輸入"+nowChr+"個字。";
	}
	//檢驗字數是否<=maxChr
	$(document).ready(function() {
	$("#addmessage").on('submit', function(ev){
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

</script>
  </div>
  <div id="maintext" style="text-align: center;">
  <form id="addpost" method="post" action="msgsuccess2.php" name="addmsg">
    <p style="padding-right:180px;" name="myname"><?php echo $msg = "姓名: ".$_SESSION['yourname'].""; ?></p>
    <p style="padding-right:180px;">請輸入留言:</p>
	<h5><div id="info"></div></h5>
    <textarea cols="35" rows="7" id="myText" onkeyup="count(this.value)" name="message" required></TEXTAREA>
 
	<?php
	echo "<input type='hidden' name='topic_id' value={$_GET['detailed']} ></input>";
	?>
	
    <br><br>
    <input name="submit" type="submit" value="送出" > &nbsp;
    &nbsp; <input name="reset." type="reset" value="清除">
  </form>
  
  <p><a href="javascript:history.go(-1)" style="float:right;">回此貼文詳細內容</a></p>
  </div>
		</main>


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