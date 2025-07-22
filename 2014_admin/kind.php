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
<input type="button"  value="新增"  onClick="window.location='kind_new.php'">
<center>
<?php
include ("config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT distinct vender FROM link "; 
$sql.= " WHERE 1 and del = 0 and vender !=''";
$conn=mysql_query($sql); 	
?>
<form name="form1" method="post">
<select name="vendor" id="select1" onchange="submit();">
<option value="">請選擇</option>
<?
while($row=mysql_fetch_array($conn)){	

if($row["vender"]==$_REQUEST["vendor"])
$selected="selected";
else
$selected="";	
echo '<option value="'.$row["vender"].'"'.$selected.'>'.$row["vender"].'</option>';
}
?>
</select> 
</form>
<table width="700dpi" border="1" cellpadding="0" cellspacing="1">
<td width="40%" bgcolor="#E0FFFF"  align="center">分類</td>
<td width="20%" bgcolor="#E0FFFF"  align="center">品牌</td>
<td width="20%" bgcolor="#E0FFFF"  align="center">排序</td>
<td width="20%" bgcolor="#E0FFFF"  align="center">上層</td>
<td width="10%" bgcolor="#E0FFFF"  align="center"><center>修改</center></td>
<td width="10%" bgcolor="#E0FFFF"  align="center"><center>刪除</center></td>
<td width="15%" bgcolor="#E0FFFF"  align="center"><center>顯示</center></td>

<?php
$sql = "SELECT * FROM kind "; 
$sql.= " WHERE 1 and del = 0";
if($_REQUEST["vendor"])
$sql.=" and vendor ='".$_REQUEST["vendor"]."'";
$conn=mysql_query($sql); 	
?>	   

<?php
while($rs=mysql_fetch_array($conn)){	
if($rs['notshow']==0)
{
$a="隱藏";
$color="#00000";
}
else
{
$a="顯示";
$color="#FF0000";
}

?>
<tr align="left" >
<td align="center"><?=$rs["kind_name"]?></td>
<td align="center"><font color="<?=$color?>"><?=$rs["vendor"]?></font></td>
<td align="center"><?=$rs["num"]?></td>
<td align="center"><?=kind($rs["top"])?></td>
<td  align="center"><center><a href="kind_mod.php?id=<?=$rs["id"];?>"><input type="button" value="修改"></a></center></td>
<td  align="center"><center><a href="kind_mod_cl.php?id=<?=$rs["id"];?>&delete=1" onclick="return confirm('要刪除?');"><input type="button" value="刪除"></a></center>
<td  align="center"><center><a href="kind_mod_cl.php?vendor=<?=$rs["vendor"];?>&notshow=<?=$rs["notshow"]?>" onclick="return confirm('要<?=$a?>');"><input type="button" value="<?=$a?>"></a></center>
</td>
<? } ?>
 </table>

<?php
function kind($id)
{
if(isset($id)){
$sql = "SELECT * FROM kind "; 
$sql.= " WHERE 1 and del = 0 and id =".$id;
$conn=mysql_query($sql); 	
$rs=mysql_fetch_array($conn);
return $rs["kind_name"];
}
}
mysql_close();
exit;
?>
</center>

</body>
</html>