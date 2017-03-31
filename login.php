<?php
session_start();
$_SESSION['yourname']="nope";
$yourname;
//$_SESSION['dep']="nope";
//$dep;
$db = mysqli_connect("localhost","patricia840205","9101179", "user");
mysql_query("SET NAMES 'utf8'");

if (isset($_POST["User_id"]))
	$user_id = mysqli_real_escape_string($db,$_POST['User_id']);
if (isset($_POST["User_password"]))
$user_password = mysqli_real_escape_string($db,$_POST['User_password']);
$msg = "";
// 取得表單欄位

if(isset($_POST["User_id"]) && isset($_POST["User_password"])) {
	if ($user_id != "" && $user_password != "") {
		// 建立MySQL伺服器連接
		
		//mysqli_select_db($db, "login"); // 選擇資料庫
		// 建立SQL指令字串
		mysqli_set_charset($db, "utf8");
		$sql = "SELECT user_name FROM user WHERE user_password='";
		$sql.= $user_password."' AND user_id='".$user_id."'";
	//	$rows = mysqli_query($db, $sql); 
		// 是否查詢到記錄
		
		$result = mysqli_query($db,$sql); // 執行SQL指令字串

		$count = mysqli_num_rows($result);
		if($count == 1) {
			//session_register("username");
			$_SESSION['user_id'] = $user_id;
			mysqli_set_charset($db, "utf8");
			$sql = "SELECT user_name FROM user WHERE user_id = '".$user_id."' LIMIT 1";  
			$result = mysqli_query($db, $sql);
			$row = $result->fetch_assoc();
			if(!$result){
			    echo "Database Error";
			}else{
			      $yourname = $row["user_name"];
				  //$dep = $row["user_dep"];
			}

			$msg = "歡迎".$row["user_dep"]." ". $_SESSION["yourname"] ."進入網站!<br/>";
		} else {
			$msg = "使用者名稱或密碼錯誤!";
		}
	}
}

/*
at the SQL, we select only 1 item: the "id" or "student_id"
with the given username and password
$count = mysqli_num_rows($result);   is used to count how many id with matching username and password taken from the sql
if($count == 1) {     if there's only 1 id with matching username and password, then it's correct: it's him
but if there's less than 1 or more than 1, then there's a problem
*/


if(!empty($_SESSION['user_id'])) { //登入成功
		$_SESSION['yourname'] = $yourname;
		$_SESSION['dep'] = $dep;
		header("location: index.php");
} else { //未登入
		
         header("location: index.php");
		 //$msg = "使用者名稱或密碼錯誤!";
}
?>