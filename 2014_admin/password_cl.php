<?
ob_start();
include("config.php");


$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

$user_name = $_POST["user_name"];
$password = $_POST["password"];

$sql = "update user set password = '$password' where user_name = '$user_name'";

$result=mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('修改成功');</script>");
echo '<script>parent.location.href="logout.php"</script>'; 
ob_end_flush();
}




?>