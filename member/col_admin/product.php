<?
session_start();
$kind =$_GET["kind"];
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
<script>
function send(){
      document.getElementById('form1').submit();
}
</script>
</body>
<center>
<?php
include ("config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_select_db($sqlname,$db);

$sql = "SELECT * FROM product  "; 
$sql.= " WHERE kinds1 = '$kind'  and del = 0 ";
$conn1=mysql_query($sql); 	
while($rs1=mysql_fetch_array($conn1)){	
$i=$i+1;
}
?>

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

<table width="100%"   border="1" cellpadding="0" cellspacing="1" >
<caption><? echo $kind; ?> <input type="button" onclick="send();"  value="修改庫存"></caption>
<td width= "25%" bgcolor="#E0FFFF" align="center">品號</td>
<td width= "25%" bgcolor="#E0FFFF" align="center">名稱</td>
<td width="30%" bgcolor="#E0FFFF"  align="center">規格</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">零售價</td>
<td width="5%" bgcolor="#E0FFFF"  align="center">庫存</td>


<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM product "; 
$sql.= " WHERE  kinds1 = '$kind' and del = 0 order by sortnum";

$conn=mysql_query($sql); 	
?>	   
<form action="product_cl.php" method="post" name="form1" id="form1" >
<?php
while($rs=mysql_fetch_array($conn)){	
$s=$s+1;
if($rs["storage"] ==0)
$color = "#EEAEEE";
else
$color="";
?>
<tr  bgcolor="<?=$color?>">
<td><?=$rs["product_num"]?></td>
<td><?=$rs["product_name"]?></td>
<td><?=$rs["spec"]?></td>
<td>$<?=$rs["price"]?></td>
<td>
<input type="text" size="5" name ="storage[]"  value="<?=$rs["storage"]?>">
<input type="hidden" name="id[]"  value="<?=$rs["id"]?>">
<input type="hidden" name="page" value="<?=$page?>">
<input type="hidden" name="kind" value="<?=$kind?>">

</td>
</tr>
<? } ?>
</form>
 </table>

<?php
/*for($i=1;$i<=$pages;$i++) {
$range=5;
if($i == $page) {
if($i-1!=0){
$y=$i-1;
echo '<a  class="linkcss" href="product.php?page='.$y.'&kind='.$kind.'">上一頁_</a>';    //顯示其他的分頁數字會以" , "作區隔  

}
echo '<a class="linkcss" href="product.php?page='.$i.'&kind='.$kind.'" >[' . $i . '] </a>';    //顯示本頁的分頁數字會以[ ]包起來

if($pages<=5 and $i != $pages)
{
for($a=1;$a<$pages;$a++){
$f=$a+1;
if($f>$i)
echo '<a  class="linkcss" href="product.php?page='.$f.'&kind='.$kind.'">'.$f.',</a>';    //顯示其他的分頁數字會以" , "作區隔 
}
}
if($i+5>$pages and $pages >5)
{
for($a=1;$a<=$pages-$i;$a++){
$x=$a+$i;
echo '<a  class="linkcss" href="product.php?page='.$x.'&kind='.$kind.'">' . $x . ',</a>';    //顯示其他的分頁數字會以" , "作區隔 
}
}
if($i+5<=$pages and $pages>=5){
for($a=1;$a<=5;$a++){
$x=$a+$i;
echo '<a  class="linkcss" href="product.php?page='.$x.'&kind='.$kind.'">' . $x . ',</a>';    //顯示其他的分頁數字會以" , "作區隔 
}

}

}                                                                                                                                                
}
echo '</br>';
echo '<a  class="linkcss" href="product.php?page=1&kind='.$kind.'">第一頁_</a>';    
echo '<a  class="linkcss" href="product.php?page='.$pages.'&kind='.$kind.'">_最後一頁</a>';    
mysql_close();*/
exit;
?>
</center>

</body>
</html>