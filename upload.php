<?php
    header("Content-type: image/jpeg"); 
	$_FILES['image']['type'];
    //取得上傳檔案資訊
    $filename=$_FILES['image']['name'];
    $tmpname=$_FILES['image']['tmp_name'];
    $filetype=$_FILES['image']['type'];
    $filesize=$_FILES['image']['size'];    
    $file=NULL;
    
    if(isset($_FILES['image']['error'])){    
        if($_FILES['image']['error']==0){                                    
            $instr = fopen($tmpname,"rb" );
            $file = addslashes(fread($instr,filesize($tmpname)));        
        }
    }
    
    //新增圖片到資料庫
    $conn=mysql_pconnect("localhost","patricia840205","9101179");        
    mysql_select_db("user");
    mysql_query("SET NAMES'utf8'");
                    
    $sql=sprintf("insert into imageDB(image)values(%s)","'".$file."'");
            
    mysql_query($sql);    
    mysql_close($conn);
    
?>
<?php
    
    //從資料庫取得圖片
    $conn=mysql_pconnect("localhost","patricia840205","9101179");        
    mysql_select_db("user");
    mysql_query("SET NAMES'utf8'");
                    
    $sql=sprintf("select * from imageDB where id=1");
            
    $result=mysql_query($sql);        
    
    //顯示圖片
    if($row=mysql_fetch_assoc($result)){    
        header("Content-type: image/jpeg");     
        print $row['image'];
    }
    
    mysql_close($conn);
?>