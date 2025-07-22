<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML news_list 1.2//EN" "http://www.opennews_listalliance.org/tech/DTD/xhtml-news_list12.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<title></title>
</head>
<body>
</body>
</head>
<form action="vender_list.php" method="post" name="form1" id="form1" class="style2">
<select name="brand_name" required="required" onblur="submit();">
<option value="">請選擇</option>
<?
include ("../config.php");
if($_POST["brand_name"]!="")
$brand_name=$_POST["brand_name"];

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM carousel "; 
$sql.= " WHERE 1  and del = 0 ";
$conn=mysql_query($sql); 	
while($rs=mysql_fetch_array($conn)){	
if($rs["brand_name"]==$brand_name)
$select="selected";
else
$select="";

echo "<option value=".$rs["brand_name"]." ".$select.">".$rs["brand_name"]."</option>";
}

?>
</select>
</form>
<form action="vender_new.php" method="post" name="form2" id="form2" class="style2">
 分類
<select name="kind">
<?
$sql = "SELECT * FROM link "; 
$sql.= " WHERE 1  and del = 0 and vender = '".$brand_name."'";
$conn2=mysql_query($sql); 	
while($rs2=mysql_fetch_array($conn2)){	
echo "<option value=".$rs2["id"].">".$rs2["name"]."</option>";
}

?>
</select>
<input type="hidden" name="vender" value="<?=$brand_name?>">
<input type="submit"  value="新增">
</form>
<center>
<?php
$i=0;
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_select_db($sqlname,$db);

$sql = "SELECT * FROM vender_content"; 
$sql.= " WHERE 1  and del = 0 and vender='".$_POST["brand_name"]."'";
$conn1=mysql_query($sql); 	
while($rs1=mysql_fetch_array($conn1)){	
$i=$i+1;
}
echo "<font size =3>共".$i."筆</font><br>";
?>

<table width="100%" border="1" cellpadding="0" cellspacing="1">
<td width="40%" bgcolor="#E0FFFF"  align="center">品牌</td>
<td width="40%" bgcolor="#E0FFFF"  align="center">分類</td>
<td width="10%" bgcolor="#E0FFFF"  align="center"><center>修改</center></td>
<td width="10%" bgcolor="#E0FFFF"  align="center"><center>刪除</center></td>

<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM vender_content "; 
$sql.= " WHERE 1 and del = 0 and vender='".$_POST["brand_name"]."'";
$conn=mysql_query($sql); 	
?>	   

<?php
while($rs=mysql_fetch_array($conn)){	
$sql = "SELECT * FROM link "; 
$sql.= " WHERE 1  and del = 0 and id=".$rs["kind"];
$conn1=mysql_query($sql); 	
$row=mysql_fetch_array($conn1);
?>
<tr align="left" >
<td align="center"><?=$rs["vender"]?></td>
<td align="center"><?=$row["name"]?></td>
<td  align="center"><center><a href="vender_mod.php?id=<?=$rs["id"];?>"><input type="button" value="修改"></a></center></td>
<td  align="center"><center><a href="vender_mod_cl.php?id=<?=$rs["id"];?>&delete=1" onclick="return confirm('要刪除?');"><input type="button" value="刪除"></a></center></td>
<? } ?>
 </table>

<?php
mysql_close();
exit;
?>
</center>

</body>
</html>