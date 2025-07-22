<?php
session_start(); //要??SESSION，看是不是管理?
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML news 1.2//EN" "http://www.opennewsalliance.org/tech/DTD/xhtml-news12.dtd">
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
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript">  
function start(id,parts){
var rightDiv = window.parent.frames[ "main" ].document.getElementById( "comment" );
$.ajax({
    url: "news_frame.php?target="+id+"&parts="+parts, 
    type: "GET", 
    success: function(response) {
      $(rightDiv).html(response); 
    }, 
    error: function() {
      console.log("ajax error!"); 
    }
 });

}

</script> 


<center>
<?php
include ("config.php");
$parts = $_GET["parts"];
$_SESSION["kind"]=$parts;



if($parts==0)
$title="媒體報導";
if($parts==1)
$title="活動公告";
if($parts==2)
$title="最新消息";

$i=0;
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_select_db($sqlname,$db);

$sql = "SELECT * FROM news"; 
$sql.= " WHERE parts = '$parts'  and  del = 0 ";
$conn1=mysql_query($sql); 	
while($rs1=mysql_fetch_array($conn1)){	
$c=(intval($_SESSION["authorized"]) & intval($rs1["kind"]) );
if( $c == $rs1["kind"] or $rs1["kind"]==0)
$i=$i+1;
}
if($i!=0) echo "";
else echo "目前尚無資料";
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
<? if($i!=0) {?>
<table width="100%" border="1" cellpadding="0" cellspacing="1">
<caption>
<?=$title?>
</caption>
<td width="40%" bgcolor="#09c" class="ti2" scope="col">標題</td>

<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM news "; 
$sql.= " WHERE parts = '$parts'  and del = 0  order by id desc";
$conn=mysql_query($sql); 	
?>	   

<?php
while($rs=mysql_fetch_array($conn)){	
$s=$s+1;
$c=(intval($_SESSION["authorized"]) & intval($rs["kind"])  );

?>

<tr align="left" bgcolor="#FFFFFF" >
<?php
if( $c == $rs["kind"] or $rs["kind"]==0)
{
?>
<td  onmousemove="start(<?=$rs["id"]?>,<?=$parts?>)"><a href="news_show.php?id=<?=$rs["id"]?>" target="main"><?=$rs["title"]?></a></td>
<? } }?>
 </table>
 <br>
<?php
/*
for($i=1;$i<=$pages;$i++) {
$range=5;
if($i == $page) {
if($i-1!=0){
$y=$i-1;
echo '<a  class="linkcss" href="news.php?page='.$y.'">上一頁_</a>';    //顯示其他的分頁數字會以" , "作區隔  

}
echo '<a class="linkcss" href="news.php?page='.$i.'" >[' . $i . '] </a>';    //顯示本頁的分頁數字會以[ ]包起來

if($pages<5 and $i != $pages)
{
for($a=1;$a<$pages;$a++){
$f=$a+1;
if($f>$i)
echo '<a  class="linkcss" href="news.php?page='.$f.'">'.$f.',</a>';    //顯示其他的分頁數字會以" , "作區隔 
}
}
if($i+5>$pages and $pages >5)
{
for($a=1;$a<=$pages-$i;$a++){
$x=$a+$i;
echo '<a  class="linkcss" href="news.php?page='.$x.'">' . $x . ',</a>';    //顯示其他的分頁數字會以" , "作區隔 
}
}
if($i+5<=$pages and $pages>=5){
for($a=1;$a<=5;$a++){
$x=$a+$i;
echo '<a  class="linkcss" href="news.php?page='.$x.'">' . $x . ',</a>';    //顯示其他的分頁數字會以" , "作區隔 
}

}

}                                                                                                                                                
}
echo '</br>';
echo '<a  class="linkcss" href="news.php?page=1">第一頁_</a>';    
echo '<a  class="linkcss" href="news.php?page='.$pages.'">_最後一頁</a>';*/
mysql_close();
exit;
}
?>
</center>

</body>
</html>