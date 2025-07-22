<?
session_start();
ob_start();
include ("../config.php");

//post
$name = $_POST["name"];
$name_eng=$_POST["name_eng"];
$brand_name = $_POST["brand_name"];
$num=$_POST["num"];
$url=$_POST["url"];



$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;


//1
if(!empty($_FILES["file"]["name"])){
$file_array=explode(".",$_FILES["file"]["name"]);
$file=$brand_name.".".$file_array[1];
$path=dirname(dirname(dirname(__FILE__))).'/vender/vender_logo/'.$file;
move_uploaded_file($_FILES["file"]["tmp_name"],$path);
$sql= "insert into vender_logo (url,brand_name) values ('$file','$brand_name')";
mysql_query($sql);
}


for($i=0;$i<$num;$i++){

$sql = "insert into link (name,name_eng,url,vender,level)
values('".$name[$i]."','".$name_eng[$i]."','".$url[$i]."','$brand_name','')";

$result=mysql_query($sql);
}



echo ("<script type='text/javascript'> alert(新增成功');</script>");
echo '<script>location.href="new_list.php</script>'; 



?>