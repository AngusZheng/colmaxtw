<?php
ob_start();
include("../config.php");

//參數

$link =$_POST["link"];
$title = $_POST["title"];
$title_eng = $_POST["title_eng"];
$id = $_POST["id"];
$delete = $_GET["delete"];

//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

if ($delete ==1)
{
$id=$_GET["id"];	
$sql = "update connection set del = 1 where id ='$id'";

$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('刪除成功');</script>");
echo '<script>location.href="connection_list.php"</script>'; 
}
}
else{
if(!empty($_FILES["file1"]["name"])){
$file_array=explode(".",$_FILES["file1"]["name"]);
$file=time()."_1.".$file_array[1];
$path=dirname(dirname(dirname(__FILE__))).'/connection/'.$file;
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
$sql= "update connection set link= '$link' , title='$title',title_eng='$title_eng',pic_name = '$file' where id = '$id'";

}
else
$sql= "update connection set link= '$link' , title='$title' ,title_eng='$title_eng'  where id = '$id'";



$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('修改成功');</script>");
echo '<script>location.href="connection_list.php"</script>'; 
}
}

ob_end_flush();
?>