<?php
session_start();  // 啟用交談期
if (empty($_SESSION['user_id'])) {
	echo '<script tpye="text/javascript">';
	echo 'alert("請先登入");';
	echo 'window.location.href = "index.php";';
	echo '</script>';
}

if (!empty($_POST['myname']) && !empty($_POST['message'])){
	$sql="INSERT INTO housemsg (姓名, 留言, topicid)
	      VALUES ('{$_POST['myname']}', '{$_POST['message']}', '{$_POST['topicid']}')";
mysqli_query($conn, $sql);
}
?>
<!DOCTYPE HTML>  
<html>
<head>

		<title>Renthouse!</title>
		<meta charset="utf-8">
		<LINK REL="SHORTCUT ICON" HREF="saleicon.jpg">
		<link rel="stylesheet" href="renthouse.css">

</head>

<header>
<div id="log"><?php
          if(isset($_SESSION['user_id'])) { echo $msg = "歡迎".$_SESSION['yourname']."登入!";//登入成功 ?>
              <!--<div class="success"><p style="float:right;">歡迎使用者登入</p></div>-->
			  <form action="logout.php">
			  <br><br><br>
			  <p><input type="submit" value="登出" style="float:right;"></p></form>
  <?php  } else { $msg = "未登入或帳號密碼有錯誤!";//未登入 ?>
        
	  <form style="padding: 0px 20px 0px 0px; float:right;" action="login.php" method="post">
 
  <table style="color:white; float:right;" name="login">
 <tr>
   <td style="color:white;background-color:#7676a3">帳號 : </td>
   <td><input type="text" name="User_id" 
             size="10" maxlength="10" required></td>
 </tr>
 <tr>
   <td style="background-color:#7676a3">密碼 : </td>
   <td><input type="password" name="password"
              size="10" maxlength="10" required></td>
	<td><input type="submit" value="登入"></td>
 </tr>  

</table>
</form>
<br>
 <p type="hidden"><?php echo $msg; ?></p> 

<?php } ?>
</div>

<h1 style="text-indent:200px;">~~*~租屋~*~~</h1>

  
    <ul>
      
      <li id="li1"><a target="_self" href="index.php">Home</a></li>
      <li id="li2"><a Target="_new" href="salething.php">二手拍賣</a></li>
    
    </ul>
  
</header> 

<body>
<div id="wrapper">

<h2>留言:</h2>
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
	<div id="maintext" style="text-align: center;">
  <form id="addpost" method="post" action="housemsgsuccess.php" name="addmsg">
    <p style="padding-right:180px;" name="myname"><?php echo $msg = "姓名: ".$_SESSION['yourname'].""; ?></p>
    <p style="padding-right:180px;">請輸入留言:</p>
	<h5><div id="info"></div></h5>
    <textarea cols="35" rows="7" id="myText" onkeyup="count(this.value)" name="message" required></TEXTAREA>
 
	<?php
	echo "<input type='hidden' name='topicid' value={$_GET['housedetail']} ></input>";
	?>
	
    <br><br>
    <input name="submit" type="submit" value="送出" > &nbsp;
    &nbsp; <input name="reset." type="reset" value="清除">
  </form>
  <a href="javascript:history.go(-2)"  style="float:right;">返回</a>
  </div>

</div>
</body>
</html>