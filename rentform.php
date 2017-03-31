<?php
session_start();  // 啟用交談期
if (empty($_SESSION['user_id'])) {
	echo '<script tpye="text/javascript">';
	echo 'alert("請先登入");';
	echo 'window.location.href = "index.php";';
	echo '</script>';
}


if (!empty($_POST['myname']) && !empty($_POST['goodname']) && !empty($_POST['price']) && !empty($_POST['introduce'])&& !empty($_POST['school']) && !empty($_POST['type'])&& !empty($_POST['url'])){
	if (isset($_POST["submit"])){
	 $s=(string) $_POST["school"];
	 switch ($s){
		case 1: $sql = "INSERT INTO house (school)
                                VALUES ('whole') ";
			break;
		case 2: $sql = "INSERT INTO house (school)
                                VALUES ('華盛頓州立大學') ";
			break;
		case 3: $sql = "INSERT INTO house (school)
                                VALUES ('夏威夷太平洋大學') ";
			break;
		case 4: $sql = "INSERT INTO house (school)
                                VALUES ('維諾納州立大學') ";
			break;
		case 5: $sql = "INSERT INTO house (school)
                                VALUES ('莎福克大學') ";
			break;
		case 6: $sql = "INSERT INTO house (school)
                                VALUES ('舊金山州立大學') ";
			break;
		case 7: $sql = "INSERT INTO house (school)
                                VALUES ('天普大學') ";
			break;
		case 8: $sql = "INSERT INTO house (school)
                                VALUES ('賓州印第安那大學') ";
			break;
		case 9: $sql = "INSERT INTO house (school)
                                VALUES ('紐約州立大學科特蘭分校') ";
			break;
		case 10: $sql = "INSERT INTO house (school)
                                VALUES ('加州州立大學_長堤分校') ";
			break;
		case 11: $sql = "INSERT INTO house (school)
                                VALUES ('加州州立大學_沙加緬度分校') ";
			break;
		case 12: $sql = "INSERT INTO house (school)
                                VALUES ('桑德蘭大學') ";
			break;
		case 13: $sql = "INSERT INTO house (school)
                                VALUES ('牛津布魯克大學') ";
			break;
		case 14: $sql = "INSERT INTO house (school)
                                VALUES ('昆士蘭大學') ";
			break;
		case 15: $sql = "INSERT INTO house (school)
                                VALUES ('新南威爾斯大學') ";
			break;
		case 16: $sql = "INSERT INTO house (school)
                                VALUES ('布蘭登大學') ";
			break;
		case 17: $sql = "INSERT INTO house (school)
                                VALUES ('懷卡特大學') ";
			break;
		case 18: $sql = "INSERT INTO house (school)
                                VALUES ('立命館太平洋大學') ";
			break;
		case 19: $sql = "INSERT INTO house (school)
                                VALUES ('華沙大學') ";
			break;
		case 20: $sql = "INSERT INTO house (school)
                                VALUES ('查爾斯大學') ";
			break;
		case 21: $sql = "INSERT INTO house (school)
                                VALUES ('南十字星大學') ";
			break;
		case 22: $sql = "INSERT INTO house (school)
                                VALUES ('國際飯店管理學院') ";
			break;
		case 23: $sql = "INSERT INTO house (school)
                                VALUES ('阿聯酋酒店管理學院') ";
			break;
		case 24: $sql = "INSERT INTO house (school)
                                VALUES ('雙威大學') ";
			break;
	 }
	 
	$s2=(string) $_POST["type"];
	 switch ($s2){
		case "all": $sql = "INSERT INTO house (type)
                                VALUES ('all') ";
			break;
		case "獨棟": $sql = "INSERT INTO house (type)
                                VALUES ('獨棟') ";
			break;
		case "單人房": $sql = "INSERT INTO house (type)
                                VALUES ('單人房') ";
			break;
		case "多人套房": $sql = "INSERT INTO house (type)
                                VALUES ('多人套房') ";
			break;
	 }
}
	$sql="INSERT INTO house (姓名, housename, type, price, introduce, school, address)
	      VALUES ('{$_POST['myname']}', '{$_POST['housename']}', '{$_POST['type']}', '{$_POST['price']}', '{$_POST['introduce']}', '{$_POST['school']}', '{$_POST['address']}')";
mysqli_query($conn, $sql);
}
?>
<!DOCTYPE HTML>  
<html>
<head>

		<title>Renthouse</title>
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

<h1 style="text-indent:150px;">~~*~租屋~*~~</h1>

  
    <ul>
      
      <li id="li1"><a target="_self" href="index.php">Home</a></li>
      <li id="li2"><a Target="_new" href="salething.php">二手拍賣</a></li>
    
    </ul>
  
</header> 

<body>
<div id="wrapper">

<h2>房屋資訊</h2>
  
  <div id="information">
  <form method="post" action="housemagsuccess.php">
  <p style="padding-right:180px;" name="myname"><?php echo $msg = "姓名: ".$_SESSION['yourname'].""; ?></p>
  <p>房屋名稱:&nbsp; <input type="text" name="housename" size=10 maxlength=15></p>

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
　    <option value="獨棟">獨棟</option>
　	  <option value="單人房">單人房</option>
　	  <option value="多人套房">多人套房</option>
	  </select></p>
  
  <p>租金:&nbsp;<input type="text" name="price" size=10 maxlength=15><span style="color:red; font-size:0.5em;">*當時*</span></p>
  
  <p>地址:&nbsp;<input type="text" name="address" size=15 maxlength=50>&nbsp;<input type="button" value="GoogleMap" onclick="window.open('https://maps.google.com.tw/')"><span style="color:red; font-size:0.5em;">*查看位置*</span></p>
  
  <p>房屋介紹:&nbsp;<br><textarea name="introduce" rows=6 cols=60></textarea></p>
  
  <input name="submit" type="submit" value="送出" >
  <input name="reset." type="reset" value="清除">
  <a href="renthouse.php" style="padding-left:50px;">回租屋</a>
  </form>
	</div>

</div>
</body>
</html>