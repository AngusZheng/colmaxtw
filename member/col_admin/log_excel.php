<?php
$filename=date("Ymd")."登入次數.xls";   // 建立檔名
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
<table width="400dpi"  border="1" cellpadding="0" cellspacing="1" >
<td width="15%"   bgcolor="#FFFF00" align="center">序號</td>
<td width="15%"   bgcolor="#FFFF00" align="center">客戶代號</td>
<td width="15%"   bgcolor="#FFFF00" align="center">客戶簡稱</td>
<td width="25%"   bgcolor="#FFFF00" align="center">登入次數</td>
<td width="15%"   bgcolor="#FFFF00" align="center">負責業務</td>
<?php
$servername="localhost";  //localhost
$sqlservername="colmaxco_member"; //user
$sqlserverpws="colmax123456"; //password
$sqlname="colmaxco_member";// database
$i=0;
set_time_limit(0);
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT *  FROM cust  where  user_name!='' and password!='' order by cust_num asc";
$tafno=mysql_query($sql);
while($row=mysql_fetch_array($tafno)){
$sql = "SELECT count(*) FROM log_info  where cust_name = '".$row["cust_name1"]."' and DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= date(login_time) " ;
$conn=mysql_query($sql);
$rs=mysql_fetch_array($conn);
$i++;
?>
<tr>
<td><?=$i?></td>
<td><?=$row["cust_num"]?></td>
<td><?=$row["cust_name1"]?></td>
<td ><?=$rs["0"]?></td>
<td><?=$row["sales"]?></td>
</tr>
<? }?>
</table>
</body>
</html>