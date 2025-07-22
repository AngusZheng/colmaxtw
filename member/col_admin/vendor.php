<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML kind 1.2//EN" "http://www.openkindalliance.org/tech/DTD/xhtml-kind12.dtd">
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
<input type="button"  value="新增"  onClick="window.location='vendor_new.php'">
<center>
<?php
include ("config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT *  FROM vendor order by kind asc"; 
$conn=mysql_query($sql); 	
?>
<table width="700dpi"   border="1" cellpadding="0" cellspacing="1">
<td width="40%" bgcolor="#E0FFFF"  align="center">品牌名稱</td>
<td width="10%" bgcolor="#E0FFFF"  align="center"><center>修改</center></td>
<td width="10%" bgcolor="#E0FFFF"  align="center"><center>停用</center></td>
<td width="10%" bgcolor="#E0FFFF"  align="center"><center>權限</center></td>
<td width="10%" bgcolor="#E0FFFF"  align="center"><center>權限</center></td>
<?php
while($rs=mysql_fetch_array($conn)){	
$s=$s+1;

if($rs["del"]==1){
$hide='<font color="red">啓用</font>';
$hide1="啓用";
$del=0;
}
else{
$hide="停用";
$hide1="停用";
$del=1;
}
?>
<tr align="left" >
<td><?=$rs["kind"]?></td>
<td  align="center"><center><a href="vendor_mod.php?id=<?=$rs["id"];?>"><input type="button" value="修改"></a></center></td>
<td  align="center"><center><a href="vendor_del.php?id=<?=$rs["id"];?>&delete=<?=$del?>" onclick="return confirm('要<?=$hide1?>');"><?=$hide?></a></center></td>
<td  align="center"><center><a href="vendor_open.php?authorized=<?=$rs["authorized"];?>&open=1" onclick="return confirm('要全開?');">全開</a></center></td>
<td  align="center"><center><a href="vendor_open.php?authorized=<?=$rs["authorized"];?>&open=0" onclick="return confirm('要全關?');">全關</a></center></td>
<? } ?>
 </table>

<?php
mysql_close();
exit;
?>
</center>

</body>
</html>