<?php
session_start();  // 啟用交談期

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
				<a href="secondhand.php">二手買賣</a>    
                </li>
                
            </ul>
        
    </ul>
	   </li>
	   
	   
	   
       
      </nav>
<div align="center">二手拍賣</div>
<form style="float:right; padding-right:30px;">
     <select name="type">
	  <option value="all">全部</option>
　	  <option value="food">食</option>
　	  <option value="cloth">衣</option>
　	  <option value="life">住</option>
　	  <option value="transfer">行</option>
　	  <option value="education">教育</option>
	  <option value="play">娛樂</option>
　	  <option value="other">其他</option>
	  </select>
    <input type="text" name="" value="">
	<input type="submit" name="" value="搜尋">
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
<div align="center">
  <table width="800" height="305" border="1">
    <tr>
      <th scope="col"><p>使用規則</p>
      <p>公告</p>
      <p>&nbsp;</p></th>
    </tr>
  </table>
</div>
<p>&nbsp;</p>
<nav style="padding-left:20px; float:left;">
<table width="200" border="2">
  <tr>
    <th scope="col">生活用品</th>
  </tr>
  <tr>
    <td><div align="center">交通工具</div></td>
  </tr>
  <tr>
    <td><div align="center">家具</div></td>
  </tr>
</table>  
</nav>    
<script type="text/javascript">

	//設定最多可輸入多少字
	var minChr = 40;
	//用來儲存目前已輸入多少字
	var nowChr = 0;
	//計算字數
	function count(value){
		nowChr = value.length;
		document.getElementById("info").innerHTML="目前已輸入"+nowChr+"個字，至少還要輸入"+minChr+"個字。";
	}
	//檢驗字數是否<=maxChr
	function check(){
		if(nowChr<minChr) alert("你至少還要輸入"+(minChr-nowChr)+"個字。");
		else alert("滿40個字囉！您可以繼續填寫或發表");
	}
	//初始化DIV部份用
	document.getElementById("info").innerHTML="目前已輸入"+nowChr+"個字，至少要輸入"+minChr+"個字。";

</script>


	<div id="info"></div>
	<form action="post.php" method="post">
	<textarea id="myText" rows="8" cols="75" onkeyup="count(this.value)" name="MyName"></TEXTAREA>
	<!--<textarea id="myText" rows="8" cols="75" onkeydown="count(this.value)"></textarea>-->
	<!--<textarea id="myText" rows="8" cols="75" onkeypress="count(this.value)"></textarea>-->
	<!--<textarea id="myText" rows="8" cols="75" onpropertychange="count(this.value)"></textarea>-->
	<br>

<!--<p style="padding-right:250px;"><button type="button" style="width:80px;height:30px;font-size:5px;">上傳圖片</button></p>-->
<form action="upload_file.php" method="post" enctype="multipart/form-data">
	<label for="file">文件名：</label>
	<input type="file" name="file" id="file"><br>

<p  style="padding-left:580px;">
<input type="button" value="儲存" style="width:100px;height:30px;font-size:12px;">
<input type="submit" value="送出" onclick="check();" style="width:100px;height:30px;font-size:12px;">
</p>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
<p>&nbsp;</p>
<div>
</body>
</html>