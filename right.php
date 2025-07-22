<?php
session_start();
include("config.php");  //包含文件
?>
<style>
body {
	background-color: #FEFEF3;

}
</style>

<marquee onMouseOver="this.stop()" onMouseOut="this.start()"  style="height:700px; overflow:scroll;" direction="up" scrolldelay="1" scrollamount="2">
<?php
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
	
echo '<p>'.$rs["remarks"].'</p>';
	
}
?>
</marquee>
