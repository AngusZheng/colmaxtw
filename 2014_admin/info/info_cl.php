<?php
ob_start();
include("../config.php");

date_default_timezone_set("Asia/Taipei");
$time=date("Y-m-d H:i:s");

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);

//1
if(!empty($_FILES["file1"]["name"])){ 
$file_array = explode(".",$_FILES["file1"]["name"]);
$fileExtension = strtolower(pathinfo($_FILES['file1']['name'], PATHINFO_EXTENSION));
$file = time().".".$fileExtension;
$path= dirname(dirname(dirname(__FILE__))).'/info/'.$file;
$name = $_POST["name"];
$summary= $_POST["summary"];
$url = $_POST["url"];
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
$sql= "insert into info (name,summary,url,photo) values ('$name','$summary','$url','$file')";
mysql_query($sql);
}
echo ("<script type='text/javascript'> alert('新增成功');</script>");
echo '<script>location.href="info_upload.php"</script>'; 

ob_end_flush();
?>