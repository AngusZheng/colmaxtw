<?php
$filename=date("Ymd")."店家.xls";   // 建立檔名
header("Content-type:application/vnd.ms-excel"); // 送出header
header("Content-Disposition:filename=$filename");  // 指定檔名€
	
date_default_timezone_set("Asia/Taipei");
$time=date("Y-m-d H:i:s");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>

<body>
<table width="100%"   border="1" cellpadding="0" cellspacing="1">
<td width="10%" bgcolor="#FFFF00" align="center">名稱</td>
<td width="10%" bgcolor="#FFFF00" align="center">電話</td>
<td width="40%" bgcolor="#FFFF00" align="center">地址</td>
<td width="10%" bgcolor="#FFFF00" align="center">品牌</td>
<?php
include("config.php"); //包含文件
set_time_limit(0);
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT *  FROM map";
$conn=mysql_query($sql);
while($row=mysql_fetch_array($conn))
{
?>
<tr align="left">
<td  align="center"><?=$row["custname"];?></td>
<td  align="center"><?=$row["tel"]?></td>
<td  align="center"><?=$row["address"]?></td>
<td  align="center"></td>
</tr>
<? 
}
?>
</table>


</body>
</html>