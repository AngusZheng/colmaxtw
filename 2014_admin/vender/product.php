<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML connection_list 1.2//EN" "http://www.openconnection_listalliance.org/tech/DTD/xhtml-connection_list12.dtd">
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
<input type="button"  value="新增"  onClick="window.location='product_new.php'" >
<center>
<?php
include ("config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT distinct vender FROM link "; 
$sql.= " WHERE 1 and del = 0";
$conn=mysql_query($sql); 	
?>
<form name="form1" method="post">
<select name="vendor" id="select1" onchange="submit();">
<option value="">請選擇</option>
<?
while($row=mysql_fetch_array($conn)){	
echo '<option value="'.$row["vender"].'"'.$selected.'>'.$row["vender"].'</option>';
}
?>
</select> 
</form>
<?php 

if(!isset($_GET["page"])){
$page=1; //設定起始頁
//isset 在此是判斷後方參數是否存在            
} else {
$page = intval($_GET["page"]); //確認頁數只能夠是數值資料                 

}
$items=$i; //取得總項數,以便算出分頁須幾頁    
$per = 20; //設定每頁顯示項目數量
$pages = ceil($items/$per); //計算總頁數
$start = ($page-1)*$per; //每頁起始資料序號,以便分次藉由sql語法去取得資料      
?>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000">
<td width="20%" bgcolor="#E0FFFF"  align="center">中文名稱</td>
<td width="20%" bgcolor="#E0FFFF"  align="center">英文名稱</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">品牌</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">分類</td>
<td width="20%" bgcolor="#E0FFFF"  align="center">照片資料夾</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">修改</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">刪除</td>

<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM product "; 
$sql.= " WHERE 1 and del = 0";
if($_POST["vendor"])
$sql.=" and vendor ='".$_POST["vendor"]."'";
$conn=mysql_query($sql); 	
while($rs=mysql_fetch_array($conn)){	
$s=$s+1;
?>
<?php	
if ($s%2==1)
$color="#FFF0F5";
if($s%2==0)
$color="#D4F8F8";
?>
<tr align="left" bgcolor="<?=$color;?>">
<td><?=mb_substr($rs["ch_name"],0,30,'utf-8')?></td>
<td><?=mb_substr($rs["eng_name"],0,30,'utf-8')?></td>
<td><?=mb_substr($rs["vendor"],0,30,'utf-8')?></td>
<td><?=kind($rs["kind"])?></td>
<td><?=$rs["vendor"]."-".$rs["pic1"]?></td>
<td  align="center"><a href="product_mod.php?id=<?=$rs["id"];?>">修改</a></td>
<td  align="center"><a href="product_mod.php_cl?id=<?=$rs["id"];?>&delete=1" onclick="return confirm('要刪除?');">刪除</a></td>
<? } ?>
 </table>

<?php
mysql_close();
exit;
?>
</center>
<? 
function kind($id)
{
$sql = "SELECT * FROM kind "; 
$sql.= " WHERE 1 and del = 0 and id =".$id;
$conn=mysql_query($sql); 	
$rs=mysql_fetch_array($conn);
return $rs["kind_name"];
}
?>
</body>
</html>