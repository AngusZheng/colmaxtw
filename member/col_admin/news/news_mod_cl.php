<?php
ob_start();
include("../config.php");

//參數
date_default_timezone_set("Asia/Taipei");
$time=$_POST["date"]." ".date("H:i:s");
$title =$_POST["title"];
$content = $_POST["content"];
$kind = $_POST["kind"];
$parts = $_POST["parts"];
$id = $_POST["id"];
$delete = $_GET["delete"];

//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

if ($delete ==1)
{
$id=$_GET["id"];	
$sql = "update news set del = 1 where id ='$id'";

$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('刪除成功');</script>");
echo '<script>location.href="news_list.php"</script>'; 
}
}
else{
if(!empty($_FILES["file1"]["name"])){
$file_array=explode(".",$_FILES["file1"]["name"]);
$file=time()."_1.".$file_array[1];
$path=dirname(dirname(dirname(__FILE__))).'/news/'.$file;
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
$sql= "update news set title= '$title' , content='$content',photo = '$file' ,kind='$kind' ,parts='$parts',upload_time='$time' where id = '$id'";

}
else
$sql= "update news set title= '$title' , content='$content' ,kind='$kind' ,parts='$parts',upload_time='$time'  where id = '$id'";



$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('修改成功');</script>");
echo '<script>location.href="news_list.php"</script>'; 
}
}

ob_end_flush();
?>