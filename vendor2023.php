
<ul>
<?php
include("2014_admin/config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;
$sql = "select * from carousel where del = 0 and remarks !='hide' order by sort_num desc";
$conn=mysql_query($sql); 	
while($row=mysql_fetch_array($conn))
{
if(trim($row["remarks"])=='')	
 echo '<li><a href="'.$row["link"].'"  target="_parent" ><img title="'.$row["remarks"].'" src="images/'.$row["id"].'.png" width="195" height="60"  data-action="zoom" ></a></li>';
}

$sql = "select * from carousel where del = 0 and remarks !='hide' and remarks!='' order by sort_num desc";
$conn=mysql_query($sql); 	

while($row=mysql_fetch_array($conn))
{
if(trim($row["remarks"])!='')	
 echo '<li><a href="'.$row["link"].'"  target="_parent"><img title="'.$row["remarks"].'" src="images/'.$row["id"].'.png" width="195" height="60" data-action="zoom" ></a></li>';
}
?>
</ul>