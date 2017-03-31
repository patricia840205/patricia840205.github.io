<?php
session_start();  // 啟用交談期
$db = mysqli_connect("localhost","patricia840205","9101179", "user");

include("mysql.inc.php");

$myTable='produce';		//設定本程式所使用的資料表


if (isset($_POST['type1']) ) {
	$type1 = $_POST['type1'];
} else {
	$type1 = 'all';
}

if (isset($_POST['type2']) ) {
	$type2 = $_POST['type2'];
} else {
	$type2 = 'whole';
}

if ($type1=='all' && $type2=='whole') {
	//$sql = "SELECT * FROM produce;"
	$sql = "SELECT produce.姓名 as name, produce.goodname as goodname, produce.price as price, produce.貼文編號 as produce_num, produce.type as type, produce.school as school ,produce.url as url ,produce.introduce as introduce ,produce.date as date FROM produce order by 貼文編號;";
} else if ($type1=='all') {
	$sql = "SELECT produce.姓名 as name, produce.goodname as goodname, produce.price as price, produce.貼文編號 as produce_num, produce.type as type, produce.school as school ,produce.url as url ,produce.introduce as introduce ,produce.date as date FROM produce where '$type2' = produce.school order by 貼文編號;";
} else if ($type2=='whole') {
	$sql = "SELECT produce.姓名 as name, produce.goodname as goodname, produce.price as price, produce.貼文編號 as produce_num, produce.type as type, produce.school as school ,produce.url as url ,produce.introduce as introduce ,produce.date as date FROM produce where '$type1' = produce.type order by 貼文編號;";
} else {
	$sql = "SELECT produce.姓名 as name, produce.goodname as goodname, produce.price as price, produce.貼文編號 as produce_num, produce.type as type, produce.school as school ,produce.url as url ,produce.introduce as introduce ,produce.date as date FROM produce where '$type1' = produce.type AND '$type2' = produce.school order by 貼文編號;";
}

//查詢所有欄位, 並且依照編號遞減排序, 讓最新留言顯示在最前面
mysqli_set_charset($db, "utf8");
//$result=mysqli_query($conn, "SELECT * FROM $myTable ORDER BY 貼文編號");
$result = mysqli_query($conn, $sql);
if ($result==false) {
	die(mysqli_error($conn));
}
$numRows = mysqli_num_rows($result);  //取得留言的總筆數  
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

<h1>Welcome come to 二手拍賣~!</h1>

  
    <ul>
      
      <li id="li1"><a target="_self" href="index.php">Home</a></li>
      <li id="li2"><a Target="_new" href="renthouse.php">租屋</a></li>
    
    </ul>
  
</header> 

<body>
<div id="wrapper">
<h3>分類:</h3>
	  <form action="salething.php" method = "post">
	  <select name="type1">
	  <option value="all">全部</option>
　	  <option value="食">食</option>
　	  <option value="衣">衣</option>
　	  <option value="住">住</option>
　	  <option value="行">行</option>
	  <option value="育樂">育樂</option>
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
	  
	  <input type="submit">
	  </form>
	  
	  <h3>二手商品:</h3>
 <div id="maintext" style="text-align: left; padding-left:100px;">  
<?php echo "共有 $numRows 則貼文 "; ?>


 	<div id="navigation"><a href="uploadpag.php">Sale thing!</a></div>
<!-- -->
	
<hr>
	
<?php
//如果留言筆數大於 0, 便顯示留言的內容
if ($numRows>0) {
  echo '<ul>';
  $i=1;
  while ($row = mysqli_fetch_array($result)) {
    //將姓名中的特殊字元轉成 HTML 碼
    $name=htmlspecialchars($row['name'], ENT_QUOTES);
	$goodname=htmlspecialchars($row['goodname'], ENT_QUOTES);
	$school=htmlspecialchars($row['school'], ENT_QUOTES);
	$type=htmlspecialchars($row['type'], ENT_QUOTES);
	$price=htmlspecialchars($row['price'], ENT_QUOTES);
	$url=htmlspecialchars($row['url'], ENT_QUOTES);
    //將留言中的特殊字元、換行字元、與空白轉成 HTML 碼
    $message=htmlspecialchars($row['introduce'], ENT_QUOTES);
    $message=str_replace('  ', '&nbsp;&nbsp;', nl2br($message));
	echo "<a href='saledetailed.php?saledetailed={$row['produce_num']}' style='right:355px; padding-top:10px; position: absolute; '>More</a>";
	
	if (isset ($_SESSION['user_id']) && ($_SESSION['yourname'])==$name){
	echo "<a href='saledelete.php?saledelete={$row['produce_num']}' style='right:405px; padding-top:10px; position: absolute;'>刪除</a>";
	echo "<a href='saleedit.php?saleedit={$row['produce_num']}' style='right:455px; padding-top:10px; position: absolute;'>編輯</a>";
	
}


    //顯示不同的背景顏色, 方便閱讀
    if ($i%2==0) {$liclass='even';}
    else         {$liclass='odd';}

	//$topic_bk='topic_BK';
    //顯示留言者姓名、留言日期時間、與留言內容

	echo " 
	     
          <li class=\"$liclass\"> 
		  <h3 style='background-color:#8585ad;'><strong>&nbsp;※$goodname</strong></h3>
		  <p>&nbsp;價錢:&nbsp;$ $price
		  <br>&nbsp;分類:&nbsp; $type
		  <br>&nbsp;學校:&nbsp; $school
		  <br>&nbsp;圖片網址:&nbsp;<a href=\"$url\"> $url</a>
		  <br>&nbsp;介紹:&nbsp; $message</p>
		  <p style='padding-left:500px;'><strong>$name</strong><em>於 {$row['date']}貼文</em></p></li>";
    $i++;
  }
  echo '</ul>';
}

?>
  </div>
	
</div>
</body>
</html>