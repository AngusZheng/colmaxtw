<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<?php 
include("config1.php");

$user = $_POST["username"];
$password = $_POST["password"];
date_default_timezone_set("Asia/Taipei");
$time=date("Y-m-d H:i:s");
$ip=getIP();

if(empty($user) or empty($password))
{
echo ("<script type='text/javascript'> alert('帳號或密碼不得為空');</script>");
echo '<script>location.href="index.php"</script>'; 
exit;
}

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

$sql = "select * from cust where  user_name = '$user' and password!=''";

$result=mysql_query($sql);

if($row=mysql_fetch_array($result))
{
$ad= $row["password"];
if ($row["session_id"]!=NULL and strcasecmp(session_id(),$row["session_id"])!=0)
{
echo ("<script type='text/javascript'> alert('帳號已登入或是您上次未登出 請重新登入');</script>");
echo '<script>location.href="index.php"</script>';
$sql_s ="update cust set session_id=NULL where id =".$row["id"];
$result_s=mysql_query($sql_s);
exit;
}


if(strcasecmp($ad,$password)==0)
{
$cust_name = $row["cust_name1"];
$sql  = "insert  into log_info (ip,login_time,cust_name,user) value ('$ip','$time','$cust_name','$user') ";
$sql_s ="update cust set session_id='".session_id()."' where id =".$row["id"];
$result_time=mysql_query($sql);
$result_s=mysql_query($sql_s);
if($result_time){
$name = "歡迎你".$row["cust_name2"];
$_SESSION["admin"] = "colmax";
$_SESSION["name"] = $row["cust_name1"];
$_SESSION["name2"] = $row["cust_name2"];
$_SESSION["cust_num"] = $row["cust_num"];
$_SESSION["mail"] = $row["email"];
$_SESSION["authorized"] = $row["authorized"];
$_SESSION["authorized2"] = $row["authorized2"];
$_SESSION["time_stamp"] =time();
$_SESSION["user"]=$user;
$_SESSION["num"]=0;
$_SESSION["user_name"] = $row["id"];
$_SESSION["if_price1"] = $row["if_price1"];
$_SESSION["if_storage"] = $row["if_storage"];
$_SESSION["if_info"] = $row["if_info"];
$_SESSION["user_sessionid"]=session_id();


echo '<script>location.href="colmax.php"</script>'; 
}
}
else
{
echo ("<script type='text/javascript'> alert('帳號或密碼錯誤');</script>");
echo '<script>location.href="index.php"</script>'; 
exit;
}


}
else
{
echo ("<script type='text/javascript'> alert('帳號或密碼錯誤');</script>");
echo '<script>location.href="index.php"</script>'; 
exit;
}
?>
</body>
</html>


<?

function getIP() { 
if (getenv('HTTP_CLIENT_IP')) { 
$ip = getenv('HTTP_CLIENT_IP'); 
} 
elseif (getenv('HTTP_X_FORWARDED_FOR')) { 
$ip = getenv('HTTP_X_FORWARDED_FOR'); 
} 
elseif (getenv('HTTP_X_FORWARDED')) { 
$ip = getenv('HTTP_X_FORWARDED'); 
} 
elseif (getenv('HTTP_FORWARDED_FOR')) { 
$ip = getenv('HTTP_FORWARDED_FOR'); 

} 
elseif (getenv('HTTP_FORWARDED')) { 
$ip = getenv('HTTP_FORWARDED'); 
} 
else { 
$ip = $_SERVER['REMOTE_ADDR']; 
} 
return $ip; 
} 
?>