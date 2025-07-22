<?php
ob_start();
include("config.php");

//參數
$ch_name = $_POST["ch_name"];
$eng_name =$_POST["eng_name"];
$vendor = $_POST["vendor"];
$kind = $_POST["kind"];
$kind2 = $_POST["kind2"];
$kind3 = $_POST["kind3"];
$kind4 = $_POST["kind4"];
$content=$_POST["content"];
$content2=$_POST["content2"];
$pic2=$_POST["pic2"];
$notlink=0;
if(isset($_POST["notlink"]))
$notlink=$_POST["notlink"];

//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;



$Upload_folder="../vendor1/vendor_pic/".$vendor."-".time();
 if (!is_dir($Upload_folder)) {      //檢察資料夾是否存在
  if (!mkdir($Upload_folder))  //不存在的話就創建upload資料夾
    die ("上傳目錄不存在，並且創建失敗");
	
}

//1
if(!empty($_FILES["pic2"]["name"])){
$file_array=explode(".",$_FILES["pic2"]["name"]);
$file=time().".".$file_array[1];
$path=dirname(dirname(__FILE__)).'/vendor1/vendor_pic/'.$vendor."-".time()."/".$file;
move_uploaded_file($_FILES["pic2"]["tmp_name"],$path);
$sql= "insert into product (ch_name,eng_name,vendor,kind,kind2,kind3,kind4,content,content2,pic1,pic2,notlink)  values('$ch_name','$eng_name','$vendor','$kind','$kind2','$kind3','$kind4','$content','$content2','".time()."','$file','$notlink')";
$result = mysql_query($sql);
}



if($result)
{
echo ("<script type='text/javascript'> alert('新增成功');</script>");
echo '<script>location.href="product.php"</script>'; 
}


ob_end_flush();
?>