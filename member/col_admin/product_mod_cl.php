<?php
ob_start();
include("config.php");

//參數
$product_name =addslashes($_POST["product_name"]);
$spec = addslashes($_POST["spec"]);
$kind =$_POST["kind"];
$kinds1 = $_POST["kinds1"];
$kinds2_1 = $_POST["kinds2_1"];
$kinds2_2 = $_POST["kinds2_2"];
$price = $_POST["price"];
$price2 = $_POST["price2"];
$id = $_POST["id"];
$sortnum=$_POST["sortnum"];
$product_num=$_POST["product_num"];
$delete = $_POST["delete"];

//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

if ($delete ==1)
{
$id_del=$_POST["id_del"];	
  for($i=0;$i<count($id_del);$i++)
{

$sql = "update product set del = 1 where id =".$id_del[$i]."";
$result = mysql_query($sql);
}
if($result)
{
echo ("<script type='text/javascript'> alert('刪除成功');</script>");
echo '<script>location.href="kind.php"</script>'; 
}
}
else{
$kinds2=$kinds2_1."+".$kinds2_2;

if(!empty($_FILES["file1"]["name"])){
$file_array=explode(".",$_FILES["file1"]["name"]);
$file=time().".".$file_array[1];
$path=dirname(dirname(__FILE__)).'/product_photo/'.$file;
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
$sql= "update product set product_name= '$product_name' ,product_num='$product_num', spec='$spec',photo = '$file' ,kinds1='$kinds1',kinds2='$kinds2' ,price='$price' ,price2='$price2' ,sortnum='$sortnum' where id = '$id'";
}
else
$sql= "update product set product_name= '$product_name' ,product_num='$product_num', spec='$spec' ,kinds1='$kinds1',kinds2='$kinds2' ,price='$price' ,price2='$price2' ,sortnum='$sortnum' where id = '$id'";


$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('修改成功');</script>");
echo '<script>location.href="product_list.php?kind='.$kind.'"</script>'; 
}

}
ob_end_flush();
?>