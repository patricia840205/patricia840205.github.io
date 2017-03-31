<?php
session_start();  // 啟用交談期
?>
<?php
include("mysql.inc.php");

//如果以 GET 方式傳遞過來的 edit 參數不是空字串
if (!empty($_GET['messageedit'])){
  //查詢 edit 參數所指定編號的記錄, 從資料庫將原有的資料取出
  $sql="SELECT * FROM message WHERE 留言編號 = '{$_GET['messageedit']}' ";
  $result=mysqli_query($conn, $sql);
  //將查詢到的資料放在 $row 陣列
  $row=mysqli_fetch_array($result);
}
else {
  //如果沒有 edit 參數, 表示此為錯誤執行, 所以轉向回主頁面
  header("Location: salething.php");
}

if (!empty($_POST['myname']) && !empty($_POST['message']) ){
	$sql="INSERT produce (姓名, 留言)
	      VALUES ('{$_POST['myname']}', '{$_POST['message']}')";
mysqli_query($conn, $sql);
}
?>
<!DOCTYPE HTML>  
<html>
<head>

		<title>二手拍賣</title>
		<meta charset="utf-8">
		<LINK REL="SHORTCUT ICON" HREF="saleicon.jpg">
		<link rel="stylesheet" href="salething.css">

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
<h1 style="text-indent:100px;">~~*~二手拍賣~*~~</h1>

  
    <ul>
      
      <li id="li1"><a target="_self" href="index.php">Home</a></li>
      <li id="li2"><a Target="_new" href="renthouse.php">租屋</a></li>
    
    </ul>
  
</header> 

<body>
<div id="wrapper">

<div id="title">
    <h2>留言板</h2>
	</div>
<div id="maintext" style="text-align: left; padding-left:100px;"> 
  <!--定義一個編輯資料的表單, 並且將編輯好的資料
      傳遞給 Ch10-08-02.php 進行處理 -->
  <form method="post" action="msgeditsuccess.php" style="padding-left:250px;">
    姓名: <?php echo $row['姓名'];?>
    <!--將原本的資料設定於 <input> 標籤的 value 參數, 如此
       【數量】欄位內就會自動填上原本的資料 -->
	<br>
    留言: <br><textarea cols="35" rows="7" id="myText" onkeyup="count(this.value)" name="message" required><?php echo $row['留言'];?></TEXTAREA>

    <!--將編號設定於隱藏的 <input> 標籤,
        以便將編號數字傳遞給 Ch09-08-02.php -->
    <input name="msg_id" type="hidden" value="<?php echo $row['留言編號'];?>">
    <input name="submit" type="submit" value="送出">
  </form>
  <p><a href="saledetailed.php?saledetailed=<?php echo $_GET['messageedit']; ?>" style="float:right;">返回</a></p>
</div>

</div>
</body>
</html>