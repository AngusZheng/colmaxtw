<?php
ob_start();
include("../config.php");

//參數
$delete = $_GET["delete"];
//post1
$name = $_POST["name"];
$name_eng=$_POST["name_eng"];
$url=$_POST["url"];
$brand_name = $_POST["brand_name"];
$num=$_POST["num"];
$show=$_POST["show"];
$id=$_POST["id"];
//post2
$name2 = $_POST["name2"];
$name_eng2=$_POST["name_eng2"];
$url2=$_POST["url2"];


//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

if ($delete ==1)
{
$id=$_GET["id"];	
$sql = "update link set del = 1 where id ='$id'";

$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('刪除成功');</script>");
echo '<script>location.href="new_list.php"</script>'; 
}

}
else{
	
for($i=0;$i<$num;$i++){

$sql = "insert into link (name,name_eng,url,vender,level)
values('".$name2[$i]."','".$name_eng2[$i]."','".$url2[$i]."','$brand_name','$name_eng')";
mysql_query($sql);
}


$sql= "update link set name= '$name' , name_eng='$name_eng' ,url='$url' ,ifshow='$show' where id = '$id'";
$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('修改成功');</script>");
echo '<script>location.href="new_list.php"</script>'; 
}
}

ob_end_flush();
?>