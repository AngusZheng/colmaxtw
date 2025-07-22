<?php

include("config.php");  //包含文件
?>
<style>
body {
	background-color: #FEFEF3;

}
</style>
<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM carousel  where del = 0 order by pro asc"; 
$conn=mysql_query($sql); 
while($rs=mysql_fetch_array($conn)){
	
echo '<p>'.$rs["remarks"].'</p>';
	
}



?>