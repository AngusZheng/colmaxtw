<?php
session_start();
?>


<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML product 1.2//EN" "http://www.openproductalliance.org/tech/DTD/xhtml-product12.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title></title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<title></title>
</head>
<body>
</body>
</head>


<?php
include ("config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

//DEL
if($_GET["del"]==1)
{
$id = $_GET["id"];
$sql = "update buylist_tmp  set del = 1 where id='$id'";		
$result = mysql_query($sql); 	
}

//modify
if(isset($_POST["id"]) and is_int ($_POST["buy_num"]+1) )
{
$id = $_POST["id"];
$buy_num = $_POST["buy_num"];
if($buy_num > 0 and $buy_num<=999 )
$sql = "update buylist_tmp set buy_num = '$buy_num' where id = '$id'";

else if($buy_num  == 0)
$sql = "update buylist_tmp  set del = 1 where id='$id'";	

else if ($buy_num < 0 or $buy_num>999)
{
echo ("<script type='text/javascript'>alert('商品數量錯誤 不得超過999個或負數')</script>");
echo ("<script type='text/javascript'> top.a.location.reload();</script>");
echo '<script>location.href="buylist.php"</script>'; 
}

$result = mysql_query($sql); 	
}


if($result)
{
echo ("<script type='text/javascript'> top.a.location.reload();</script>");
echo '<script>location.href="buylist.php"</script>'; 
	
}

?>