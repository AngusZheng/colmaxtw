<?php
set_time_limit(0);
$filename=date("Ymd")."客戶資訊.xls";   // 建立檔名
header("Content-type:application/vnd.ms-excel"); // 送出header
header("Content-Disposition:filename=$filename");  // 指定檔名€
date_default_timezone_set("Asia/Taipei");
$time=date("Y-m-d H:i:s");

$servername="localhost";  //localhost
$sqlservername="colmaxco_member"; //user
$sqlserverpws="colmax123456"; //password
$sqlname="colmaxco_member";// database

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>
<body>
<table width="100%"  border="1" cellpadding="0" cellspacing="1" >
<td width="3%"   bgcolor="#FFFF00" align="center">客戶代號</td>
<td width="3%"   bgcolor="#FFFF00" align="center">客戶簡稱</td>
<td width="3%"   bgcolor="#FFFF00" align="center">客戶全名</td>
<td width="3%"   bgcolor="#FFFF00" align="center">負責人</td>
<td width="3%"   bgcolor="#FFFF00" align="center">聯絡人</td>
<td width="5%"   bgcolor="#FFFF00" align="center">TEL1</td>
<td width="5%"   bgcolor="#FFFF00" align="center">TEL2</td>
<td width="10%"   bgcolor="#FFFF00" align="center">Email</td>
<td width="10%"   bgcolor="#FFFF00" align="center">負責業務</td>
<td width="10%"   bgcolor="#FFFF00" align="center">統一編號</td>
<td width="10%"   bgcolor="#FFFF00" align="center">地址1</td>
<td width="10%"   bgcolor="#FFFF00" align="center">地址2</td>
<td width="1%"   bgcolor="#FFFF00" align="center">郵遞區號</td>
<td width="8%"   bgcolor="#FFFF00" align="center">帳號</td>
<td width="8%"   bgcolor="#FFFF00" align="center">密碼</td>
<?php
$sql = "SELECT  *  FROM vendor  where del=0  order by kind asc"; 
$conn=mysql_query($sql); 	
while($row=mysql_fetch_array($conn)){	
?>
<td width="5%"   bgcolor="#FFFF00" align="center"><?=$row["kind"]?></td>
<? } ?>
<td width="5%"   bgcolor="#FFFF00" align="center">權限2</td>
<?php
$sql = "SELECT *  FROM cust  where  user_name!='' and password!='' order by cust_num asc";
$tafno=mysql_query($sql);
while($row=mysql_fetch_array($tafno)){
?>
<tr>
<td><?=$row["cust_num"]?></td>
<td><?=$row["cust_name1"]?></td>
<td><?=$row["cust_name2"]?></td>
<td><?=$row["ceo"]?></td>
<td><?=$row["contact"]?></td>
<td><?=$row["tel_no1"]?></td>
<td><?=$row["tel_no2"]?></td>
<td><?=$row["email"]?></td>
<td><?=$row["sales"]?></td>
<td><?=$row["taxnum"]?></td>
<td><?=$row["addr1"]?></td>
<td><?=$row["addr2"]?></td>
<td><?=$row["zip_code"]?></td>
<td><?=$row["user_name"]?></td>
<td><?=$row["password"]?></td>
<?php
$sql = "SELECT  *  FROM vendor  where del=0  order by kind asc"; 
$conn=mysql_query($sql);
while($row2=mysql_fetch_array($conn)){
if( (int)$row["authorized"]&(int)$row2['authorized']=(int)$row2['authorized'] )
{
echo "<td> V</td>";
}
else
echo "<td>&nbsp;</td>"; 
}
?>
<td>
<?php
if($row["if_price1"]==1){ echo "不顯示批價,";}
if($row["if_storage"]==1){ echo "顯示庫存,";}
if($row["if_info"]==1){ echo "不顯示資訊公告,";}
?>
</td>
</tr>
<? }?>
</table>
</body>
</html>