<?php
session_start();
ob_start();
include("config.php"); //包含文件
$id=$_POST["id"];
$old_pws=trim($_POST["old_pws"]);
$new_pws1=trim($_POST["new_pws1"]);
$new_pws2=trim($_POST["new_pws2"]);
//抓帳號密碼
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

$sql = "select * from cust where  id = '$id' and password='$old_pws'";
$conn=mysql_query($sql);
$row=mysql_fetch_array($conn);
$user_name=trim($row["id"]);
 $user_pws=trim($row["password"]);

$date=date("Y-m-d");
if($new_pws1==null||$new_pws2==null)
{
echo ("<script type='text/javascript'> alert('新密碼不得為空');history.go(-1);</script>");
exit();
}
if(strcmp($new_pws1,$new_pws2)!=0)
{
echo ("<script type='text/javascript'> alert('兩次新密碼不一樣');history.go(-1);</script>");
exit();
}


if(strcmp($id,$user_name)==0 and strcmp($old_pws,$user_pws)==0){
$sql="update cust set password='$new_pws1'  where id='$id' and password='$old_pws'";
mysql_query($sql);
	echo ("<script type='text/javascript'> alert('修改成功,請重新登入')</script>");
	echo '<script>parent.location.href="logout.php"</script>'; 
}
else
{echo ("<script type='text/javascript'> alert('密碼錯誤');history.go(-1);</script>");
exit();
}
ob_end_flush();

?>
