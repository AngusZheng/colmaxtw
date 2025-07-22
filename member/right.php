<?php
session_start();
include("config1.php");  //包含文件
?>
<style>
body {
	background-color: #FEFEF3;

}
</style>
<?PHP
$kind=$_SESSION["kind"];
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);

if(!isset($kind))
$sql = "SELECT * FROM carousel  where del = 0 and kind='' order by pro asc";
else
$sql = "SELECT * FROM carousel  where del = 0 and kind='$kind' order by pro asc";
$conn=mysql_query($sql); 
while($rs=mysql_fetch_array($conn)){
if($_SESSION["if_info"]!=1)	
echo '<p>'.$rs["remarks"].'</p>';
	
}
?>