<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<?php
include("config.php"); //包含文件
$user = $_POST["username"];
$password = $_POST["password"];
date_default_timezone_set("Asia/Taipei");
$time=date("Y-m-d H:i:s");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

$sql = "select * from user where user_name = '$user' and password = '$password'";
$result=mysql_query($sql);


if($row=mysql_fetch_array($result))
{
$sql  = "update user set login_time = '$time' where  user_name = '$user' and password = '$password'";
$result_time=mysql_query($sql);
if($result_time){
$name = "歡迎你".$row["name"];
$_SESSION["admin"] = "colmax";
$_SESSION["name"] = $row["name"];
$_SESSION["user_name"] = $row["user_name"];
echo ("<script type='text/javascript'> alert('$name');</script>");
echo '<script>location.href="colmax.php"</script>'; 
}
}
else

echo ("<script type='text/javascript'> alert('帳號或密碼錯誤');</script>");
echo '<script>location.href="index.php"</script>'; 

?>
</body>
</html>