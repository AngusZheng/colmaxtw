<?php
$kind =$_GET["kind"];
$filename=$kind.".xls";   // 建立檔名
$filename=preg_replace("/\s/","",$filename);
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
<table width="100%"  border="1" cellpadding="0" cellspacing="1" >
<td width="3%"   bgcolor="#FFFF00" align="center">品號</td>
<td width="3%"   bgcolor="#FFFF00" align="center">品名</td>
<td width="3%"   bgcolor="#FFFF00" align="center">規格</td>
<td width="3%"   bgcolor="#FFFF00" align="center">庫存</td>
<td width="3%"   bgcolor="#FFFF00" align="center">單位</td>
<td width="5%"   bgcolor="#FFFF00" align="center">品牌</td>
<td width="5%"   bgcolor="#FFFF00" align="center">料件分類1</td>
<td width="10%"   bgcolor="#FFFF00" align="center">料件分類2</td>
<td width="10%"   bgcolor="#FFFF00" align="center">產品類別</td>
<td width="10%"   bgcolor="#FFFF00" align="center">標準售價</td>
<td width="1%"   bgcolor="#FFFF00" align="center">零售價</td>
<?php
$servername="localhost";  //localhost
$sqlservername="colmaxco_member"; //user
$sqlserverpws="colmax123456"; //password
$sqlname="colmaxco_member";// database

$a=1; 
$b=2;
$c=4;
$d=8;
$e=16;
$f=32;
$g=64;
$h=128;
$i=256;
$j=512;
$k=1024;
$l=2048;
$m=4096;
$n=8192;
$o=16384;

set_time_limit(0);
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM product WHERE  kinds1 = '$kind' and del = 0 order by sortnum "; 
$tafno=mysql_query($sql);
while($row=mysql_fetch_array($tafno)){
?>
<tr>
<td><?=$row["product_num"]?></td>
<td><?=$row["product_name"]?></td>
<td><?=$row["spec"]?></td>
<td><?=$row["storage"]?></td>
<td><?=$row["unit"]?></td>
<td><?=$row["brand"]?></td>
<td><?=$row["kinds1"]?></td>
<td><?=$row["kinds2"]?></td>
<td><?=$row["class"]?></td>
<td><?=$row["price2"]?></td>
<td><?=$row["price"]?></td>
</tr>
<? }?>
</table>
</body>
</html>