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
<body onload="refresh_right();">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<link rel="stylesheet" href="js/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="js/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script>
$(document).ready(function() {
	$(".fancybox-button").fancybox({
		prevEffect		: 'none',
		nextEffect		: 'none',
		closeBtn		: true,
		arrows    : false,
        nextClick : false,
     
		helpers		: {
			title	: { type : 'inside' },
			buttons	: {}
		}
	});
});
</script>
<script>
function send(){
      document.getElementById('form1').submit();
}

function refresh_right(if_price1){
	  top.right.location.reload();
	  
}
</script>

</head>

<center>
<style type="text/css">
* {
    margin:0;
    padding:0;
    font-size:14px;
    text-decoration:none;
}
#products {
    width:800px;
    margin:30px auto;
}
#products li {
    width:200px;
    height:260px;
    float:left;
    margin-left:30px;
    display:inline;
}
#products li a {
    display:block;
}
#products li a img {
    border:1px solid #666;
    padding:1px;
}
#products li span a {
    width:200px;
    height:45px;
    line-height:30px;
    text-align:left;
 white-space:nowrap;
    text-overflow:ellipsis;
    overflow: hidden;
}
</style>
<?php
include ("config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$_SESSION["kind"]=$_GET["kind"];
?>
<div style="width:800px; height:40px; border:1px solid #666; background-color:#AEEEEE;">
<div style="padding-top:5px;">
<font style="float:left; font-size:18px; vertical-align:middle;" >即時優惠商品---(((請點縮圖見組合商品)))</font>
<form name="form" id="form" method="post" action="bonus_new.php">
<select name="kind" id="select1" onchange="form.submit()" style="font-size:15pt; ">
<option value="">請選擇</option>
<?
$sql = "SELECT distinct kind  FROM bonus where kind!='' "; 
$conn1=mysql_query($sql); 	
while($row=mysql_fetch_array($conn1)){	
if($row["kind"]==$_POST["kind"])
$selected="selected";
else
$selected="";
echo '<option value="'.$row["kind"].'"'.$selected.'>'.$row["kind"].'</option>';
}
?>
</select>
<input type="button" onclick="send();"  value="放入購物車" style="font-size:15pt; position:relative;"> 
 </form>
 </div>
</div>
<?php
$sql = "SELECT  * FROM bonus  "; 
$sql.= " WHERE del = 0  and  kind !='' and kind is not NULL";
for($i=0;$i<count($arr);$i++)
{
$sql.= " and kind !='".$arr[$i]."'";	
}
if($_POST["kind"]<>"")
$sql.=" and kind='".$_POST["kind"]."'";
$sql.=" order by id desc";
$conn=mysql_query($sql); 
?>	  
<div style="height:750px; overflow:scroll;"> 
<ul id="products" >
<form name="form1" id="form1" method="post" action="bonus_cl.php">
<?php
while($rs=mysql_fetch_array($conn)){	
$s=$s+1;
?>
<li>
<? if($rs["photo"] !="") { ?>
<a class="fancybox-button" rel="fancybox-button" href="bonus/<?=$rs["photo"]?>"  title="<?=$title?>"><img src="bonus/<?=$rs["photo"]?>" width="80%" height="80%" alt="<?=$rs["title"]?>"></a>
<? } ?>
<span><?=$rs["title"]?></span><br>
<span>原價:<span style="text-decoration:line-through">$<?=$rs["price"]?></span>/
<font color="red">優惠價$<?=$rs["price2"]?></font></span></br>
訂購數量:<input type="text" size="5" name ="num[]"  value="">組
<input type="hidden" name="product_name[]" value="<?=addslashes($rs["title"]);?>">
<input type="hidden" name="price[]" value="<?=$rs["price"]?>">
<input type="hidden" name="price2[]" value="<?=$rs["price2"]?>">
<input type="hidden" name="id[]" value="<?=$rs["id"]?>">
</li>
<? } ?>
 </form>
 </ul>
 </div>
<?php
mysql_close();
exit;
?>
</center>

</body>
</html>