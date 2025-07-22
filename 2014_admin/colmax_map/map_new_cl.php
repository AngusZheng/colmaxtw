<?php
ob_start();
include("../config.php");

//參數
$custname = $_POST["custname"];
$address =$_POST["address"];
$tel = $_POST["tel"];


//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;


$sql= "insert into map (custname,address,tel)  values('$custname','$address','$tel')";
$result = mysql_query($sql);



if($result)
{
echo ("<script type='text/javascript'> alert('新增成功');</script>");
echo '<script>location.href="index.php"</script>'; 
}


ob_end_flush();
?>