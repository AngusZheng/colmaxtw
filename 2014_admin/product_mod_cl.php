<?php
ob_start();
include("config.php");

//參數
$ch_name=$_POST["ch_name"];
$eng_name=$_POST["eng_name"];
$vendor=$_POST["vendor"];
$kind=$_POST["kind"];
$kind2=$_POST["kind2"];
$kind3=$_POST["kind3"];
$kind4=$_POST["kind4"];
$content = $_POST["content"];
$content2 = $_POST["content2"];
$id = $_POST["id"];
$pic2=$_POST["pic2_name"];
$pic1=$_POST["pic1"];
$new_num=$_POST["new_num"];
$delete = $_GET["delete"];
$notlink=0;
if(isset($_POST["notlink"]))
$notlink=$_POST["notlink"];

//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

if ($delete ==1)
{
$id=$_GET["id"];	
$sql = "update product set del = 1 where id ='$id'";
$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('刪除成功');</script>");
echo '<script>location.href="product.php"</script>'; 
}
}

else{
	
//1
if(!empty($_FILES["pic2"]["name"])){
$file_array=explode(".",$_FILES["pic2"]["name"]);
$file=$pic2;
$path=dirname(dirname(__FILE__)).'/vendor1/vendor_pic/'.$vendor."-".$pic1."/".$file;
move_uploaded_file($_FILES["pic2"]["tmp_name"],$path);
}
	
$sql= "update product set ch_name='$ch_name',eng_name='$eng_name',vendor='$vendor',kind='$kind',kind2='$kind2',kind3='$kind3',kind4='$kind4',content='$content',content2='$content2',new_num='$new_num' ,notlink='$notlink' where id = '$id'";
$result = mysql_query($sql);
}
if($result)
{
echo ("<script type='text/javascript'> alert('修改成功');</script>");
echo '<script>location.href="product.php"</script>'; 
}


ob_end_flush();
?>