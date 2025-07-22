<?php
$filename=date("Ymd")."購買紀錄.xls";   // 建立檔名
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
<td width="10%" bgcolor="#FFFF00" align="center">客戶代號</td>
<td width="10%" bgcolor="#FFFF00" align="center">客戶簡稱</td>
<td width="10%" bgcolor="#FFFF00" align="center">負責業務</td>
<td width="40%"  bgcolor="#FFFF00" align="center">購買商品</td>
<td width="40%"  bgcolor="#FFFF00" align="center">規格</td>
<td width="40%"  bgcolor="#FFFF00" align="center">購買時間</td>
<td width="10%" bgcolor="#FFFF00" align="center">購買數量</td>
<?php
$servername="localhost";  //localhost
$sqlservername="colmaxco_member"; //user
$sqlserverpws="colmax123456"; //password
$sqlname="colmaxco_member";// database

set_time_limit(0);
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT *  FROM cust  where  user_name!='' and password!='' order by cust_num asc";
$tafno=mysql_query($sql);
while($row=mysql_fetch_array($tafno)){
$sql = "SELECT * FROM orderlist where cust_name = '".$row["cust_name1"]."' and DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= date(buy_date)" ;
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
<td  align="center"><?=$row["cust_num"];?></td>
<td  align="center"><?=$row["cust_name1"];?></td>
<td  align="center"><?=$row["sales"];?></td>
<td  align="center"><?=$product["product_name"]?></td>
<td  align="center"><?=str_replace("停產","",$product["spec"]);?></td>
<td  align="center"><?=date("Y-m-d",strtotime($rs["buy_date"]));?></td>
<td  align="center"><?=$buy_num_array[$i]?></td>
</tr>
<? 
}
 }
 }
?>
</table>

</body>
</html>