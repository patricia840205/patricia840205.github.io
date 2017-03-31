<?php
session_start();  // 啟用交談期
?>
<?php
include("mysql.inc.php");

//如果以 GET 方式傳遞過來的 edit 參數不是空字串
if (!empty($_GET['saleedit'])){
  //查詢 edit 參數所指定編號的記錄, 從資料庫將原有的資料取出
  $sql="SELECT * FROM produce WHERE 貼文編號 = '{$_GET['saleedit']}' ";
  $result=mysqli_query($conn, $sql);
  //將查詢到的資料放在 $row 陣列
  $row=mysqli_fetch_array($result);
}
else {
  //如果沒有 edit 參數, 表示此為錯誤執行, 所以轉向回主頁面
  header("Location: salething.php");
}

if (!empty($_POST['myname']) && !empty($_POST['goodname']) && !empty($_POST['type']) && !empty($_POST['school']) && !empty($_POST['price']) && !empty($_POST['url']) && !empty($_POST['introduce'])){
	$sql="INSERT produce (姓名, goodname, type, school, price, url, introduce)
	      VALUES ('{$_POST['myname']}', '{$_POST['goodname']}', '{$_POST['type']}', '{$_POST['school']}', '{$_POST['price']}', '{$_POST['url']}', '{$_POST['introduce']}')";
mysqli_query($conn, $sql);
}
?>
<!DOCTYPE HTML>  
<html>
<head>

		<title>Uploading Your goods!</title>
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
<h2>商品資訊</h2>
  
  <div id="information">
  <form method="post" action="saleeditsuccess.php">
  <p style="padding-right:180px;" name="myname"><?php echo $msg = "姓名: ".$_SESSION['yourname'].""; ?></p>
  <p>拍賣物品:&nbsp; <?php echo '<input type="text" name="goodname" required value="'.$row['goodname'].'"size=10 maxlength=15>'?></p>

	<p>學校:&nbsp;
	
	  <select name="school" id="school">
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
	  
	  種類:&nbsp;
	  
	  <select name="type"id="type">
　	  <option value="all">全部</option>
　	  <option value="食">食</option>
　	  <option value="衣">衣</option>
　	  <option value="住">住</option>
　	  <option value="行">行</option>
	  <option value="育樂">育樂</option>
　	  <option value="其他">其他</option>
	  </select></p>
  
  <p>價錢:&nbsp;<?php echo '<input type="text" name="price" required value="'.$row['price'].'" size=10 maxlength=15>'?></p>
  
  <p>網址:&nbsp;<?php echo '<input type="text" name="url" required value="'.$row['url'].'" size=15 maxlength=50>'?>&nbsp;<input type="button" value="SortUrl" onclick="window.open('https://goo.gl/')"><span style="color:red; font-size:0.5em;">*圖庫網址*</span></p>
  
  <p>介紹:&nbsp;<br><textarea name="introduce" rows=4 cols=50 required><?php echo $row['introduce'];?></textarea></p>

  <input name="produce_id" type="hidden" value="<?php echo $row['貼文編號'];?>">
  <input name="submit" type="submit" value="送出" >
  <input name="reset." type="reset" value="清除">
  <a href="salething.php" style="padding-left:50px;">回二手拍賣</a>
  </form>
	</div>
  </div>  
</body>
</html>