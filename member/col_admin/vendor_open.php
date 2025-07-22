<?php 
session_start();
$servername="localhost";  //localhost
$sqlservername="colmaxco_member"; //user
$sqlserverpws="colmax123456"; //password
$sqlname="colmaxco_member";// database

$authorized=$_REQUEST["authorized"];
$open=$_REQUEST["open"];

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;


$sql = "select * from cust";
$result=mysql_query($sql);

if($open==1){
while($row=mysql_fetch_array($result))
{
if(((int)$row["authorized"]&(int)$authorized)!=(int)$authorized){	
$sql="update cust set authorized=authorized+$authorized where id=".$row["id"];
$result2=mysql_query($sql);
}
}	
}



else{
while($row=mysql_fetch_array($result))
{
if((int)$row["authorized"]&(int)$authorized=(int)$authorized){	
$sql="update cust set authorized=authorized-$authorized where id=".$row["id"];
$result2=mysql_query($sql);
}
}	
}

if($result2)
{
echo ("<script type='text/javascript'> alert('成功');</script>");
echo '<script>location.href="vendor.php"</script>'; 
}


?>