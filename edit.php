<?php
session_start();  // 啟用交談期
?>
<?php
include("mysql.inc.php");

//如果以 GET 方式傳遞過來的 edit 參數不是空字串
if (!empty($_GET['edit'])){
  //查詢 edit 參數所指定編號的記錄, 從資料庫將原有的資料取出
  $sql="SELECT * FROM post WHERE 貼文編號 = '{$_GET['edit']}' ";
  $result=mysqli_query($conn, $sql);
  //將查詢到的資料放在 $row 陣列
  $row=mysqli_fetch_array($result);
}
else {
  //如果沒有 edit 參數, 表示此為錯誤執行, 所以轉向回主頁面
  header("Location: lifething.php");
}

if (!empty($_POST['myname']) && !empty($_POST['topic']) && !empty($_POST['post']) && !empty($_POST['type1']) && !empty($_POST['type2'])){
	$sql="INSERT post (姓名, 標題, 貼文內容, category, school_name)
	      VALUES ('{$_POST['myname']}', '{$_POST['topic']}', '{$_POST['post']}', '{$_POST['type1']}', '{$_POST['type2']}')";
mysqli_query($conn, $sql);
}
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
  <title>編輯貼文</title>
</head>
<body>
  <!--定義一個編輯資料的表單, 並且將編輯好的資料
      傳遞給 Ch10-08-02.php 進行處理 -->
  <form method="post" action="editsuccess.php" style="padding-left:250px;">
    姓名: <?php echo $row['姓名'];?>
	<br>
    主題: <?php echo '<input style="padding-right:80px;" name="topic" required value="'.$row['標題'].'">'; ?>
    <!--將原本的資料設定於 <input> 標籤的 value 參數, 如此
       【數量】欄位內就會自動填上原本的資料 -->
	<br>
	<div>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <select name="type1">
	  <option value="all">全部</option>
　	  <option value="食">食</option>
　	  <option value="衣">衣</option>
　	  <option value="住">住</option>
　	  <option value="行">行</option>
	  <option value="娛樂">娛樂</option>
　	  <option value="心情">心情</option>
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
      </div>
    貼文: <br><textarea cols="35" rows="7" id="myText" onkeyup="count(this.value)" name="post" required><?php echo $row['貼文內容'];?></TEXTAREA>

    <!--將編號設定於隱藏的 <input> 標籤,
        以便將編號數字傳遞給 Ch09-08-02.php -->
    <input name="post_id" type="hidden" value="<?php echo $row['貼文編號'];?>">
    <input name="submit" type="submit" value="送出">
  </form>
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