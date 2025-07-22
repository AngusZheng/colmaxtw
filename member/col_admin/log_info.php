<?
session_start();
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML log_info 1.2//EN" "http://www.openlog_infoalliance.org/tech/DTD/xhtml-log_info12.dtd">
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
<?php
include ("config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);

$sql = "SELECT * FROM log_info  where 1"; 
if($_GET["name"])
$sql.=" and cust_name like '%".$_GET["name"]."%'";

$conn1=mysql_query($sql); 	
while($rs1=mysql_fetch_array($conn1)){	
if($rs1["logout_time"]==NULL)
{
$id=$rs1["id"];
$d = $rs1["login_time"];
$time  = date("Y-m-d H:i:s",strtotime("{$d} +30 min"));
$sql = "update log_info set  logout_time = '$time' where id = '$id'";
mysql_query($sql);
}
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

<table width="100%"  border="1" cellpadding="0" cellspacing="1" >
<caption><? echo "登入資訊"; ?></caption>
<tr  >
   <td colspan="7"  bgcolor="#999999"> 
   <center><a href="log_excel.php"><input type="button" value="匯出登入次數excel"></a>
   <a href="order_excel.php"><input type="button" value="匯出購買紀錄excel"></a>
    <a href="order_num_excel.php"><input type="button" value="匯出下單次數excel"></a>
      <form name="name" method="get" action="log_info.php"  style="display:inline; margin:0; float:right;">
	<input type="search"  name="name" placeholder="搜尋"  value="<?=$_REQUEST["name"]?>">
    </form>
   </center>
   </td>
    </tr>
<td width= "5%"   bgcolor="#FFFF00" align="center">序號</td>
<td width="10%"   bgcolor="#FFFF00" align="center">登入ip</td>
<td width="15%"   bgcolor="#FFFF00" align="center">登入名稱</td>
<td width="15%"   bgcolor="#FFFF00" align="center">登入帳號</td>
<td width="25%"   bgcolor="#FFFF00" align="center">登入時間</td>
<td width="25%"  bgcolor="#FFFF00"  align="center">登出時間</td>
<td width="10%"  bgcolor="#FFFF00"  align="center">總上線時間（分）</td>

<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM log_info where 1 "; 
if($_GET["name"])
$sql.=" and cust_name like '%".$_GET["name"]."%'";

$sql.= "  order by id desc limit $start,$per ";
$conn=mysql_query($sql); 	
?>	   

<?php
while($rs=mysql_fetch_array($conn)){	
$s=$s+1;
$time1=strtotime($rs["login_time"]);
$time2 = strtotime($rs["logout_time"]);
$total_time = ($time2 - $time1)/60;

$date_time = explode(' ', $rs["login_time"]);
?>
<tr>
<td><?=$s?></td>
<td><?=$rs["ip"]?></td>
<td><a href="orderlist.php?user=<?=$rs["user"]?>&time=<?=$date_time[0]?>"><?=$rs["cust_name"]?></a></td>
<td><?=$rs["user"]?></td>
<td  ><?=$rs["login_time"]?></td>
<td><?=$rs["logout_time"] ?></td>
<td ><?=round($total_time,2)?></td>
</tr>
<? } ?>

 </table>

<?php
for($i=1;$i<=$pages;$i++) {
$range=5;
if($i == $page) {
if($i-1!=0){
$y=$i-1;
echo '<a  class="linkcss" href="log_info.php?page='.$y.'&name='.$_GET["name"].'">上一頁_</a>';    //顯示其他的分頁數字會以" , "作區隔  

}
echo '<a class="linkcss" href="log_info.php?page='.$i.'&name='.$_GET["name"].'" >[' . $i . '] </a>';    //顯示本頁的分頁數字會以[ ]包起來

if($pages<=5 and $i != $pages)
{
for($a=1;$a<$pages;$a++){
$f=$a+1;
if($f>$i)
echo '<a  class="linkcss" href="log_info.php?page='.$f.'&name='.$_GET["name"].'">'.$f.',</a>';    //顯示其他的分頁數字會以" , "作區隔 
}
}
if($i+5>$pages and $pages >5)
{
for($a=1;$a<=$pages-$i;$a++){
$x=$a+$i;
echo '<a  class="linkcss" href="log_info.php?page='.$x.'&name='.$_GET["name"].'">' . $x . ',</a>';    //顯示其他的分頁數字會以" , "作區隔 
}
}
if($i+5<=$pages and $pages>=5){
for($a=1;$a<=5;$a++){
$x=$a+$i;
echo '<a  class="linkcss" href="log_info.php?page='.$x.'&name='.$_GET["name"].'">' . $x . ',</a>';    //顯示其他的分頁數字會以" , "作區隔 
}

}

}                                                                                                                                                
}
echo '</br>';
echo '<a  class="linkcss" href="log_info.php?page=1">第一頁_</a>';    
echo '<a  class="linkcss" href="log_info.php?page='.$pages.'&name='.$_GET["name"].'">_最後一頁</a>';    
mysql_close();
exit;
?>
</center>

</body>
</html>