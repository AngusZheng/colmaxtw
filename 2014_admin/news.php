<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML news_list 1.2//EN" "http://www.opennews_listalliance.org/tech/DTD/xhtml-news_list12.dtd">
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
<input type="button"  value="新增"  onClick="window.location='news_new.php'">
<center>
<?php
include ("config.php");
?>
<table width="100%" border="1" cellpadding="0" cellspacing="1">
<td width="20%" bgcolor="#E0FFFF"  align="center">標題</td>
<td width="10%" bgcolor="#E0FFFF"  align="center"><center>修改</center></td>
<td width="10%" bgcolor="#E0FFFF"  align="center"><center>刪除</center></td>

<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM news "; 
$sql.= " WHERE 1 and del = 0";
$conn=mysql_query($sql); 	
?>	   

<?php
while($rs=mysql_fetch_array($conn)){	
?>
<tr align="left" >
<td align="center"><?=$rs["title"]?></td>
<td  align="center"><center><a href="news_mod.php?id=<?=$rs["id"];?>"><input type="button" value="修改"></a></center></td>
<td  align="center"><center><a href="news_mod.php?id=<?=$rs["id"];?>&delete=1" onclick="return confirm('要刪除?');"><input type="button" value="刪除"></a></center>
</td>
<? } ?>
 </table>
</center>

</body>
</html>