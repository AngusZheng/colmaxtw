<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?
include ("../config.php");
?>
<form action="new.php" method="post" name="form1" id="form1" class="style2">
第一層數量<input type="number" name="num" value="" required="required">

<input type="submit"  value="新增">
<input type="hidden"  name="brand_name" value="<?=$_POST["brand_name"]?>" required="required">
</form>

<form action="new_list.php" method="post" name="form2" id="form2" class="style2">
分類
<select name="brand_name" required="required"  onchange="submit();">
<option value="">請選擇</option>
<?
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
<br>
<table width="100%"   border="1" cellpadding="0" cellspacing="1" align="center">
<td width= "25%" bgcolor="#E0FFFF" align="center">標題</td>
<td width="25%" bgcolor="#E0FFFF"  align="center">英文標題</td>
<td width="20%" bgcolor="#E0FFFF"  align="center">所屬品牌</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">上級</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">修改</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">刪除</td>

<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM link "; 
$sql.= " WHERE 1 and del = 0 and vender = '".$_POST["brand_name"]."'";

$conn=mysql_query($sql); 	

while($rs=mysql_fetch_array($conn)){	

?>
<tr align="left" bgcolor="#FFFFCC">
<td><?=$rs["name"]?></td>
<td><?=$rs["name_eng"]?></td>
<td><?=$rs["vender"]?></td>
<td><?=$rs["level"]?></td>
<td  align="center"><a href="mod.php?id=<?=$rs["id"];?>">修改</a></td>
<td  align="center"><a href="mod_cl.php?id=<?=$rs["id"];?>&delete=1" onclick="return confirm('要刪除?');">刪除</a></td>
<? } ?>
 </table>
</body>
</html>