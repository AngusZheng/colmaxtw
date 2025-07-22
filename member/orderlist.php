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
mysql_select_db($sqlname,$db);

$sql = "SELECT * FROM orderlist"; 
$sql.= " WHERE 1  and user_name =".$_SESSION["user_name"];
$conn1=mysql_query($sql); 	
while($rs1=mysql_fetch_array($conn1)){	
$i=$i+1;
}
echo "<font size =3>共".$i."筆</font><br>";
?>

<?php 

if(!isset($_GET["page"])){
$page=1; //設定起始頁
//isset 在此是判斷後方參數是否存在            
} else {
$page = intval($_GET["page"]); //確認頁數只能夠是數值資料                 

}
$items=$i; //取得總項數,以便算出分頁須幾頁    
$per = 10; //設定每頁顯示項目數量
$pages = ceil($items/$per); //計算總頁數
$start = ($page-1)*$per; //每頁起始資料序號,以便分次藉由sql語法去取得資料      
?>
<table width="100%"   border="1" cellpadding="0" cellspacing="1" bgcolor="#000000">
<td width="10%" bgcolor="#09c" class="ti2" scope="col">購買時間</td>

<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM orderlist  "; 
$sql.= " WHERE 1 and user_name = ".$_SESSION["user_name"]." order by buy_date desc limit $start,$per ";

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
for($i=1;$i<=$pages;$i++) {
$range=5;
if($i == $page) {
if($i-1!=0){
$y=$i-1;
echo '<a  class="linkcss" href="orderlist.php?page='.$y.'">上一頁_</a>';    //顯示其他的分頁數字會以" , "作區隔  

}
echo '<a class="linkcss" href="orderlist.php?page='.$i.'" >[' . $i . '] </a>';    //顯示本頁的分頁數字會以[ ]包起來

if($pages<=5 and $i != $pages)
{
for($a=1;$a<$pages;$a++){
$f=$a+1;
if($f>$i)
echo '<a  class="linkcss" href="orderlist.php?page='.$f.'">'.$f.',</a>';    //顯示其他的分頁數字會以" , "作區隔 
}
}
if($i+5>$pages and $pages >5)
{
for($a=1;$a<=$pages-$i;$a++){
$x=$a+$i;
echo '<a  class="linkcss" href="orderlist.php?page='.$x.'">' . $x . ',</a>';    //顯示其他的分頁數字會以" , "作區隔 
}
}
if($i+5<=$pages and $pages>=5){
for($a=1;$a<=5;$a++){
$x=$a+$i;
echo '<a  class="linkcss" href="orderlist.php?page='.$x.'">' . $x . ',</a>';    //顯示其他的分頁數字會以" , "作區隔 
}

}

}                                                                                                                                                
}
echo '</br>';
echo '<a  class="linkcss" href="orderlist.php?page=1">第一頁_</a>';    
echo '<a  class="linkcss" href="orderlist.php?page='.$pages.'">_最後一頁</a>';    
mysql_close();
exit;
?>
</center>

</body>
</html>