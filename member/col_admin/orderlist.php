<? session_start();?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML orderlist 1.2//EN" "http://www.openorderlistalliance.org/tech/DTD/xhtml-orderlist12.dtd">
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
<center>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<?php
include ("config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$user=trim($_GET["user"]);
$time=$_GET["time"];
$sql = "select * from cust where  user_name = '$user' ";
$conn1=mysql_query($sql); 
$rs1=mysql_fetch_array($conn1);
?>
<input type ="button" onclick="history.back()" value="回到上一頁" ></input>
<table width="100%"   border="1" cellpadding="0" cellspacing="1" bgcolor="#000000">
<td width="10%" bgcolor="#09c" class="ti2" scope="col" style="font-size:24px;">購買時間 (<?=$rs1["cust_name1"]?>)</td>

<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM orderlist  "; 
$sql.= " WHERE 1 and user_name = ".$rs1["id"]." and LEFT(buy_date,10)='$time' order by buy_date desc ";
$conn=mysql_query($sql); 	
?>	   

<?php
while($rs=mysql_fetch_array($conn)){	
$s=$s+1;
?>
<tr align="left">
<td><a href="orderview.php?id=<?=$rs["id"]?>&time=<?=strtotime($rs["buy_date"])?>"><?=date("Y-m-d H:i",strtotime($rs["buy_date"]))?></a></td>
<? } ?>
 </table>

<?php
mysql_close();
exit;
?>
</center>

</body>
</html>