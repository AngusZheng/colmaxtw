<?
session_start();
$kind =$_GET["kind"];
$_SESSION["kind"]=$kind;
if($kind=="Bell")
$kind1=2;
elseif($kind=="Giro")
$kind1=2;
elseif($kind=="Continental")
$kind1=-5;
else
$kind1=0;
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
<body onload="refresh_right();">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<link rel="stylesheet" href="js/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<link rel="stylesheet" href="css/j-searcher.css" type="text/css" media="screen">
<style>
a {
	color: #69C;
	text-decoration: none;
}
a:hover {
	color: #F60;
}
h1 {
	font: 1.7em;
	line-height: 110%;
	color: #000;
}
p {
	margin: 0 0 20px;
}


input {
	outline: none;
}
input[type=search] {
	-webkit-appearance: textfield;
	-webkit-box-sizing: content-box;
	font-family: inherit;
	font-size: 100%;
}
input::-webkit-search-decoration,
input::-webkit-search-cancel-button {
	display: none; 
}


input[type=search] {
	background: #ededed url(http://static.tumblr.com/ftv85bp/MIXmud4tx/search-icon.png) no-repeat 9px center;
	border: solid 1px #ccc;
	padding: 9px 10px 9px 32px;
	width: 130px;
	
	-webkit-border-radius: 10em;
	-moz-border-radius: 10em;
	border-radius: 10em;
	
	-webkit-transition: all .5s;
	-moz-transition: all .5s;
	transition: all .5s;
}
input[type=search]:focus {
	width: 200px;
	background-color: #fff;
	border-color: #66CC75;
	
	-webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
	-moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
	box-shadow: 0 0 5px rgba(109,207,246,.5);
}


input:-moz-placeholder {
	color: #999;
}
input::-webkit-input-placeholder {
	color: #999;
}

</style>

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
var isShow = false;
var isShow2 = false;
function send(){
      document.getElementById('form1').submit();
}

function refresh_right(){
      top.right.location.reload();
}

function storage(a,kind){
	
	if(a<=5-kind) {
	var msg="此商品數量不足哦！下單後，業務會盡快與您確認";
	alert(msg);
	}
}

function displayShow_control(num,if_price1,auth2) 
{ 
var _control = document.getElementById("control"); 
if(if_price1==1)
return false;

if(auth2==1)
return false;

if(!isShow) {
		for(i=1;i<=num;i++){
		document.getElementById("control"+i).style.display='';
		}
		isShow = true;
		document.getElementById("control").style.display='';
		//document.getElementById('a1').value = "隱藏批價";
	}	
	
	else{
		for(i=1;i<=num;i++){
		document.getElementById("control"+i).style.display='none';
		}
		isShow = false;
		document.getElementById("control").style.display='none';
		//document.getElementById('a1').value = "顯示批價";
	}	

} 

function displayShow_storage(num,if_storage,kind) 
{ 
var _control = document.getElementById("storage"); 
if(if_storage==0 || kind==0)
return false;


if(!isShow2) {
		for(i=1;i<=num;i++){
		document.getElementById("storage"+i).style.display='';
		document.getElementById("storage_"+i).style.display='none';
		}
		isShow2 = true;
		//document.getElementById('a1').value = "隱藏批價";
	}	
	
	else{
		for(i=1;i<=num;i++){
		document.getElementById("storage"+i).style.display='none';
		document.getElementById("storage_"+i).style.display='';
		}
		isShow2 = false;
		//document.getElementById('a1').value = "顯示批價";
	}	

} 
</script>
</body>
</head>
<center>
<?php
include("config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);

$arr=explode(",",$_SESSION["authorized2"]);

if($kind=="Campagnolo"){
$n="<font color='red'>(實際庫存/進價請洽業務)</font>";
$auth2=1;
}
else{
$n="";
$auth2=in_array($kind,$arr);
}
?>

<table width="100%" border="1" align="center" cellpadding="3" cellspacing="3">
  <tr>
<th height="21" bgcolor="#AEEEEE" scope="col">
<span style="font-size:20pt; color:#000; float:left;" ><?=$kind.$n?></span>
<form name="kind2_select" method="get" action="product.php"  style="display:inline; margin:0;">
<select name="kind2" onchange="submit();" style="font-size:20pt;">
<option value="">不分類</option>
<?
$sql = "SELECT  *  FROM kind_name where del = 0 and kinds1 = '".$kind."'"; 
$conn=mysql_query($sql); 	
while($row2=mysql_fetch_array($conn)){	
if($row2["kind_name"]==$_GET["kind2"])
$selected="selected";
else
$selected="";
echo '<option value="'.$row2["kind_name"].'"'.$selected.'>'.$row2["kind_name"].'</option>';
}

$sql = "SELECT  count(*) FROM product  "; 
$sql.= " WHERE  kinds1 = '$kind' and del = 0 and price !=0";
if($_GET["kind2"]!="")
$sql.=" and kinds2 like '%".$_GET["kind2"]."%'"	;

$con=mysql_query($sql); 
?>
</select>
<input type="hidden" name="kind" value="<?=$kind?>">
<input type="button" onclick="send();"  value="放入購物車" style="font-size:20pt; ">
</form>

<form name="product_name" method="get" action="product.php"  style="display:inline; margin:0; float:right;">
	<input type="search"  name="product_name" placeholder="搜尋"  value="<?=$_REQUEST["product_name"]?>">
    <input type="hidden" name="kind" value="<?=$kind?>">
</form>
</th>
  </tr>
</table>
<? if($row=mysql_fetch_array($con)) { ?>

<div style="height:650px; overflow:scroll;">
<table width="100%"  border="1" cellpadding="0" cellspacing="1" >
<td width= "3%" bgcolor="#09c" class="ti2" scope="col">序號</td>
<td width= "7%" bgcolor="#09c" class="ti2" scope="col">縮圖</td>
<td width= "35%" bgcolor="#09c" class="ti2" scope="col">名稱</td>
<td width="20%" bgcolor="#09c"  class="ti2" scope="col">規格</td>
<td  width="10%" bgcolor="#09c"   class="ti2" scope="col"   id="control"  style="display:none;">批價</td>
<td width="8%" bgcolor="#09c"  class="ti2" scope="col"><a href="#" onclick='displayShow_control(<?=$row[0]?>,<?=$_SESSION['if_price1']?>,"<?=$auth2?>")'>零售價</a></td>
<td width="5%" bgcolor="#09c"  class="ti2" scope="col"><a href="#" onclick='displayShow_storage(<?=$row[0]?>,<?=$_SESSION['if_storage']?>,"<?=$kind1?>")'>庫存</a></td>
<td width="10%" bgcolor="#09c"  class="ti2" scope="col">購買數量</td>
<?php
$sql = "SELECT  * FROM product  "; 
$sql.= " WHERE  kinds1 = '$kind' and del = 0 and price !=0";
if($_GET["kind2"]!="")
$sql.=" and kinds2 like '%".$_GET["kind2"]."%'"	;	 

if($_GET["product_name"]!="")
$sql.=" and (product_name like '%".$_GET["product_name"]."%' or spec like '%".$_GET["product_name"]."%' )";	 

$sql.=" order by sortnum ";
$conn=mysql_query($sql); 
?>	   
<form name="form1" id="form1" method="post" action="product_cl.php">
<input type="hidden" name="kind" value="<?=$kind?>">
<?php
while($rs=mysql_fetch_array($conn)){	
$s=$s+1;
if($rs["storage"] ==0)
$color = "#EEAEEE";
else
$color="#FFFFFF";
$spec=str_replace("停產","",$rs["spec"]);
$spec=str_replace("舊款","",$spec);
$spec=str_replace("'","",$spec);
$spec=str_replace('"',"",$spec);

$product_name=str_replace("'","",$rs["product_name"]);
$product_name=str_replace('"',"",$product_name);

if($kind=="Campagnolo")
{
$price=0;
$price2=0;
}
else{
$price=$rs["price"];
$price2=$rs["price2"];
}
?>
<tr  bgcolor="<?=$color?>">
<td ><?=$s?></td>
<td>
<? if($rs["photo"] !="") { ?>
<a class="fancybox-button" rel="fancybox-button" href="product_photo/<?=$rs["photo"]?>"  title="<?=$spec?>"><img src="product_photo/<?=$rs["photo"]?>" width="42" height="50" alt="<?=$rs["product_name"]?>"></a></td>
<? } ?>
<td><?=$rs["product_name"]?></td>
<td><?=$spec?></td>
<td  id="control<?=$s?>"  style="display:none;">$<?=$rs["price2"]?></td>
<td>$<?=$rs["price"]?></td>
<td  align="center" ><center>
<? if($rs["storage"]!=0) 
echo "<span id=storage_".$s.">v</span>" ;  
else echo "<span id=storage_".$s.">x</span>";
?>
<span id="storage<?=$s?>"   style="display:none;"><?=$rs["storage"]?></span>
</center>
</td>
<td>
<?php if($_SESSION['if_price1']==0) {?><input type="text" size="5" name ="num[]"  value=""  onClick="storage(<?=$rs["storage"]?>,<?=$kind1?>);"><? } ?>
<input type="hidden" name="product_name[]" value="<?=addslashes($product_name);?>">
<input type="hidden" name="price[]" value="<?=$price?>">
<input type="hidden" name="price2[]" value="<?=$price2?>">
<input type="hidden" name="spec[]" value="<?=addslashes($spec)?>">
<input type="hidden" name="id[]" value="<?=$rs["id"]?>">
</td></tr>
<? } ?>
 </form>
 </table>
</div>
 <input type="button" onclick="send();"  value="放入購物車"  style="font-size:30pt;">
<? 
} 
else 
{
echo ' <font color="#FF0000" size="5">商品更新中 詳情請洽業務</font>';
}
?>


<?php
mysql_close();
exit;
?>
</center>

</body>
</html>