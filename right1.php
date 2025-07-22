<?php
session_start();
include("config.php");  //包含文件
?>
<style>
body {
	background-color: #FEFEF3;

}
</style>

<?php
$kind=$_SESSION["kind"];
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$cust_name = $_SESSION["name"];
$vender=$kind;
date_default_timezone_set("Asia/Taipei");
$date=date("Y-m-d");
$sql = "insert into clicknum (name,vender,date) values ('$cust_name','$vender','$date')";
mysql_query($sql);

if(!isset($kind))
$sql = "SELECT * FROM carousel  where del = 0 and kind='' order by pro asc";
else
$sql = "SELECT * FROM carousel  where del = 0 and kind='$kind' order by pro asc";
$conn=mysql_query($sql); 
while($rs=mysql_fetch_array($conn)){
	
echo '<p>'.$rs["remarks"].'</p>';
	
}


?>
