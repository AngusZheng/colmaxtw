<?php
ob_start();
include("../config.php");

//參數
$title = $_POST["title"];
$price = $_POST["price"];
$price2 = $_POST["price2"];
$kind=$_POST["kind"];

//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;


if(!empty($_FILES["file1"]["name"])){
$file_array=explode(".",$_FILES["file1"]["name"]);
$file=time().".".$file_array[1];
$path=dirname(dirname(dirname(__FILE__))).'/bonus/'.$file;
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
$sql= "insert into bonus (title,price,price2,photo,kind)  values('$title','$price','$price2','$file','$kind') ";
}
else
$sql= "insert into bonus (title,price,price2,kind)  values('$title','$price','$price2','$kind') ";


$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('新增成功');</script>");
echo '<script>location.href="bonus_list.php"</script>'; 
}


ob_end_flush();
?>