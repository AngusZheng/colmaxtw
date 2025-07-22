<?
session_start();
ob_start();
include ("config.php");
//post
$product_id = $_POST["id"];
$page=$_POST["page"];
$kind = $_POST["kind"];
$storage =$_POST["storage"];
//session
$time_stamp =$_SESSION["time_stamp"];
$cust_name = $_SESSION["name"];
$user_name = $_SESSION["user_name"];

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

for($i=0;$i<=count($storage);$i++){
if($storage[$i]>=0)
{
$sql = "update product set storage =".$storage[$i]." where id=".$product_id[$i];
}
$result=mysql_query($sql);
if($result){
echo ("<script type='text/javascript'> alert('修改成功');</script>");
echo '<script>location.href="product.php?page='.$page.'&kind='.$kind.'"</script>'; 
}
}



?>