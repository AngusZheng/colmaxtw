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
$time=$_REQUEST["time"];
?>
<input type ="button" onclick="history.back()" value="回到上一頁" ></input>
<table width="100%"   border="1" cellpadding="0" cellspacing="1" bgcolor="#000000">
<caption><?=date("Y-m-d H:i",$time)?>  </caption>
<td width="40%"  align="center">購買商品</td>
<td width="40%"  align="center">規格</td>
<td width="10%" align="center">訂購數量<br>(<font size="+2">*</font>->數量不足)</td>

<?php
$id=$_REQUEST["id"];
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);

$sql = "SELECT * FROM orderlist "; 
$sql.= " WHERE id='$id'";
$conn=mysql_query($sql); 	
?>	   

<?php
while($rs=mysql_fetch_array($conn)){	
$s=$s+1;
//分解陣列
$buy_num_array=explode(",",$rs["buy_num"]);
//$product_name_array = explode("@",$rs["product_name"]);

$product_id_array = explode(",",$rs["product_id"]);
$storage_array=explode(",",$rs["storage"]);

}
?>


<? 
$x=0;
for ($i=0;$i<count($buy_num_array);$i++) {
$sql = "SELECT * FROM product where id=".$product_id_array[$i];
$row=mysql_fetch_array(mysql_query($sql));

if(is_numeric($storage_array[$i])){
if(($storage_array[$i]-$buy_num_array[$i])>=0)
{
$mark='';
?>

<tr align="left">
<td  align="center"><?=$row["product_name"]?></td>
<td  align="center"><?=str_replace("停產","",$row["spec"]);?></td>
<td  align="center"><?=$mark.$buy_num_array[$i]?></td>
</tr>
<? 
}
else
{
$mark='<font size="+2">*</font>';
$other[$x]=array($row["product_name"],str_replace("停產","",$row["spec"]),$mark.$buy_num_array[$i]);
$x++;
}
}
else if(empty($storge_array))
{
echo '<tr align="left">
<td  align="center">'.$row["product_name"].'</td>
<td  align="center">'.str_replace("停產","",$row["spec"]).'</td>
<td  align="center">'.$mark.$buy_num_array[$i].'</td>
</tr>';	
}
}
?>
</table>
<h1>以下為預留商品</h1>
<table border="1" width="100%">
<td width= "15%" bgcolor="#EE799F" align="center">購買商品</td>
<td width="10%" bgcolor="#EE799F"  align="center">規格</td>
<td width="10%" bgcolor="#EE799F"  align="center">訂購數量<br>(<font size="+2">*</font>->數量不足)</td>
<?php 
  foreach($other as $key => $value) {  
  echo '<tr align="left">';
	  echo "<td  align='center'>".$other[$key][0]."</td>"; // 註2
	  echo "<td  align='center'>".$other[$key][1]."</td>"; // 註2
	  echo "<td  align='center'>".$other[$key][2]."</td>"; // 註2
	  echo "</tr>";
	  }
?>
</table>
<?php
mysql_close();
exit;
?>
</center>

</body>
</html>