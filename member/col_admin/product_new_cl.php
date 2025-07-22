<?php
ob_start();
include("config.php");

//參數
$product_num = $_POST["product_num"];
$product_name =$_POST["product_name"];
$spec = $_POST["spec"];
$kinds1 = $_POST["kinds1"];
$kinds2 = $_POST["kinds2"];
$price = $_POST["price"];
$price2 = $_POST["price2"];


//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;


if(!empty($_FILES["file1"]["name"])){
$file_array=explode(".",$_FILES["file1"]["name"]);
$file=time().".".$file_array[1];
$path=dirname(dirname(__FILE__)).'/product_photo/'.$file;
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
$sql= "insert into product (product_num,product_name,spec,kinds1,kinds2,price,price2,photo)  values('$product_num','$product_name','$spec','$kinds1','$kinds2','$price','$price2','$file') ";
}
else
$sql= "insert into product (product_num,product_name,spec,kinds1,kinds2,price,price2)  values('$product_num','$product_name','$spec','$kinds1','$kinds2','$price','$price2') ";


$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('新增成功,請前往修改庫存');</script>");
echo '<script>location.href="product.php?kind='.$kinds1.'"</script>'; 
}


ob_end_flush();
?>