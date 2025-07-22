<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%"   border="1" cellpadding="0" cellspacing="1" bgcolor="#000000">
<td width="10%" align="center">購買人</td>
<td width="40%"  align="center">購買商品</td>
<td width="40%"  align="center">規格</td>
<td width="40%"  align="center">購買時間</td>
<td width="10%" align="center">購買數量</td>
<?php
include("config.php"); //包含文件
set_time_limit(0);
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT *  FROM cust  where  user_name!='' and password!=''";
$tafno=mysql_query($sql);
while($row=mysql_fetch_array($tafno)){
$sql = "SELECT * FROM orderlist where cust_name = '".$row["cust_name2"]."' and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(buy_date) " ;
$conn=mysql_query($sql);
while($rs=mysql_fetch_array($conn))
{
$rs["cust_name"];	
$s=$s+1;
//分解陣列
$buy_num_array=explode(",",$rs["buy_num"]);
$product_id_array = explode(",",$rs["product_id"]);

 for ($i=0;$i<count($buy_num_array);$i++) {
	 
$sql = "SELECT * FROM product where id=".$product_id_array[$i];
$product=mysql_fetch_array(mysql_query($sql));
?>
<tr align="left">
<td  align="center"><?=$row["cust_name1"];?></td>
<td  align="center"><?=$product["product_name"]?></td>
<td  align="center"><?=str_replace("停產","",$product["spec"]);?></td>
<td  align="center"><?=$rs["buy_date"];?></td>
<td  align="center"><?=$buy_num_array[$i]?></td>
</tr>
<? 
}
 }
 }
?>


</body>
</html>