<?
session_start();
$kind =$_GET["kind"];
include "config.php";
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML product 1.2//EN" "http://www.openproductalliance.org/tech/DTD/xhtml-product12.dtd">
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
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<link href=http://www.we-shop.net/video/shadowbox/shadowbox.css rel=stylesheet type=text/css /> 
<script type=text/javascript src="http://www.we-shop.net/video/shadowbox/shadowbox.js"></script>  
<script type=text/javascript>  
Shadowbox.init({}); 
</script>
<script type="text/javascript" language="javascript">
function check(){
var reply = confirm('確認上傳？');
return reply;
}
function del(){
var reply = confirm('確認刪除？');
return reply;
}
function submitSend() {
     document.getElementById('form2').submit();
}
</script>
</body>
</head>
<center>
<table width="100%"   border="1" cellpadding="0" cellspacing="1" >
<caption><? echo $kind; ?> 
<a href="product_excel.php?kind=<?=$kind?>"><input type="button" value="匯出資料"></a> <a href="#" onclick="submitSend()"><input type="button" value="刪除"></a></caption>
<td width= "5%" bgcolor="#E0FFFF" align="center">排序</td>
<td width= "5%" bgcolor="#E0FFFF" align="center">排序</td>
<td width= "15%" bgcolor="#E0FFFF" align="center">品號</td>
<td width= "15%" bgcolor="#E0FFFF" align="center">名稱</td>
<td width= "5%" bgcolor="#E0FFFF" align="center">照片</td>
<td width="15%" bgcolor="#E0FFFF"  align="center">規格</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">批發價</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">零售價</td>
<td width="15%" bgcolor="#E0FFFF"  align="center">分類</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">修改</td>
<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM product "; 
$sql.= " WHERE  kinds1 = '$kind' and del = 0 order by sortnum";

$conn=mysql_query($sql); 	
?>	   
<form action="product_mod_cl.php" method="post" name="form2" id="form2" class="style2" onsubmit="return del()">
<?php
while($rs=mysql_fetch_array($conn)){	
$s=$s+1;
if($rs["storage"] ==0)
$color = "#EEAEEE";
else
$color="";

$sqlsort="update product set sortnum=".$rs["id"]." where id=".$rs["id"]." and sortnum=0";
mysql_query($sqlsort);
?>
<tr  bgcolor="<?=$color?>">
<td><?=$s?></td>
<td><?=$rs["sortnum"]?></td>
<td><?=$rs["product_num"]?></td>
<td><?=$rs["product_name"]?></td>
<td><a rel="shadowbox; width=250;height=250" href="../photo/photo_big.php?photo=<?=$rs["photo"]?>&spec=<?=urlencode($rs["spec"])?>" target="_blank"  style="text-decoration:none; "><img src="../product_photo/<?=$rs["photo"]?>" width="32" height="40" alt="<?=$rs["product_name"]?>"></a></td>
<td><?=$rs["spec"]?></td>
<td>$<?=$rs["price2"]?></td>
<td>$<?=$rs["price"]?></td>
<td><?=$rs["kinds2"]?> </td>
<td  align="center">
<a href="product_mod.php?id=<?=$rs["id"]?>&kind=<?=$kind?>"><input type="button"  value="修改"></a>

<input type="checkbox" name="id_del[]" value="<?=$rs["id"]?>">
</td>
</tr>
<? } ?>
<input type="hidden" name="delete" value="1">
 </form> 
 </table>
</center>

</body>
</html>