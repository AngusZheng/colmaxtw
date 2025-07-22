<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd"> 
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML product 1.2//EN" "http://www.openproductalliance.org/tech/DTD/xhtml-product12.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title></title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>購物清單</title>
</head>
<body>
</body>
</head>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" language="javascript">
var isShow = false;
function check(){
var reply = confirm('確認刪除?');
return reply;
}

function displayShow_control(num) 
{ 
var _control = document.getElementById("control"); 
if(!isShow) {
		for(i=1;i<=num;i++){
		document.getElementById("control"+i).style.display='';
		}
		isShow = true;
		document.getElementById("control").style.display='';
		document.getElementById('a1').value = "隱藏批價";
	}	
	
	else{
		for(i=1;i<=num;i++){
		document.getElementById("control"+i).style.display='none';
		}
		isShow = false;
		document.getElementById("control").style.display='none';
		document.getElementById('a1').value = "顯示批價";
	}	

} 
</script>

<center>
<?php
include ("config.php");
$time_stamp = $_SESSION["time_stamp"];
$cust_name = $_SESSION["name"];
$user_name = $_SESSION["user_name"];
$mail = $_SESSION["mail"];
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;
$sql = "select count(*) from buylist_tmp where cust_name = '$cust_name' and user_name = '$user_name' and del = 0";
$conn=mysql_query($sql); 	
$rs=mysql_fetch_array($conn);
?>
<div style="height:750px; overflow:scroll;">
<table width="100%" height=""  border="1" cellpadding="1" cellspacing="1">
<caption style="height:70px;"><div  align="center" style="width:300px; position:fixed; margin-left:400px;">購物清單,<? echo "共".$rs[0]."筆商品"; ?></div><div style="font-size:18px; color:#F00; float:left; position:fixed; margin-left:400px; width:400px;margin-top:40px; ">*=數量不足，下單後業務會盡快確認與您聯繫</div></caption>
<td width= "25%" bgcolor="#09c"  class="ti2" scope="col">名稱</td>
<td width= "25%" bgcolor="#09c"  class="ti2" scope="col">規格</td>
<td width="10%" bgcolor="#09c"   class="ti2" scope="col" >購買數量</td>
<td  width="10%" bgcolor="#09c"   class="ti2" scope="col"  style="display:none;" id="control">批價</td>
<td width="10%" bgcolor="#09c"   class="ti2" scope="col">零售價</td>
<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$s=0;
$sql = "select * from buylist_tmp where cust_name = '$cust_name' and user_name = '$user_name' and del = 0";
$conn=mysql_query($sql); 	
?>	   

<?php
while($rs=mysql_fetch_array($conn)){	
$s=$s+1;

$sql='select * from product where id = '.$rs["product_id"].'';
$con = mysql_query($sql); 	
$row = mysql_fetch_array($con);

$product_name_array[$s-1] = htmlentities($rs["product_name"],ENT_QUOTES,"utf-8");
$product_id_array[$s-1] = $rs["product_id"];
$buy_num_array [$s-1] = $rs["buy_num"];
$price_array[$s-1] = $rs["price2"];
$id_array [$s -1] =$rs["id"];
$kind_array[$s-1]=$row["kinds1"];
$product_num_array[$s-1] = $row["product_num"];
if($rs['product_id']>55555)
$storage_array[$s-1] =999;
else
$storage_array[$s-1] = $row["storage"];
$spec_array[$s-1] = htmlentities($row["spec"],ENT_QUOTES,"utf-8");


//合併陣列
$storage =  implode("@",$storage_array);
$product_num =  implode("@",$product_num_array);
$product_name =  implode("@",$product_name_array);
$product_id =  implode(",",$product_id_array);
$buy_num = implode (",",$buy_num_array);
$price = implode("@",$price_array);
$id =  implode (",",$id_array);
$spec =implode ("@",$spec_array);
$kind =implode ("@",$kind_array);

if($row["kinds1"]=="Bell")
$kind1=3;
elseif($row["kinds1"]=="Giro")
$kind1=3;
elseif($row["kinds1"]=="Continental")
$kind1=11;
else
$kind1=5;
?>
<tr align="left" >
<td><?=$rs["product_name"]?> <a href="buylist_cl.php?id=<?=$rs["id"]?>&del=1"  onClick="return check()"><img src="img/cancel.png" width="16" height="16"></a></td>
<td><?=$rs["spec"]?>
<?php
if($row["storage"]<=$kind1 or  $rs["price"]==0)
echo '<font size="+3" color="red" style="float:right">*</font>';
?>
</td>
<td   class="ti2" scope="col">
<form action="buylist_cl.php" method="post" name="form1" id="form1" class="style2" >
<input type="text" size="5" name ="buy_num"  value="<?=$rs["buy_num"]?>" onChange="submit();">
<input type="hidden" name="id"  value="<?=$rs["id"]?>">
</form>
</td>
<td  id="control<?=$s?>"  style="display:none;">$<?=$rs["price2"]?></td>
<td>$<?=$rs["price"]*$rs["buy_num"]?></td>
<?php 
$total_price+=$rs["price"]*$rs["buy_num"] ;
$total_price2+=$rs["price2"]*$rs["buy_num"] ;
?>
<? } ?>
</tr>

<? if($s !=0) {?>
<form action="order_cl.php" method="post" name="form1" id="form1" class="style2" >
<tr>
<td  colspan="3">
<font color="#000000">備註：<input type="text" name="remark" size=120></font>
</td>
<td id="control<?=$s+1?>"  style="display:none;">
<?php if($total_price2>=5000) { ?>
<font color="#000000">共：$<?=$total_price2?></font>
<? } ?>
</td>
<td >
<?php if($total_price2>=5000) { ?>
<font color="#000000">共：$<?=$total_price?></font>
<? } ?>
</td>
</tr>
<tr>
<td  colspan="5">
業務可跟您聯絡的時間:
<input type="radio" name="time" value="12">中午12點之後
<input type="radio" name="time" value="1">下午1點之後
<input type="radio" name="time" value="2">下午2點之後
其他時間<input type="time" name="time_else" size=10>
</td>
</tr>
<td  colspan="5"  style=" font-size:16px; color:#F00">
總額未滿5000，需酌收運費哦
</td>
</tr>
<tr>
<td   class="ti2" scope="col"  colspan="5">
<input type="hidden" name="storage" value="<?=$storage?>">
<input type="hidden" name="product_num" value="<?=$product_num?>">
<input type="hidden" name="product_id" value="<?=$product_id?>">
<input type="hidden" name="product_name" value="<?=addslashes($product_name)?>">
<input type="hidden" name="buy_num" value="<?=$buy_num?>">
<input type="hidden" name="cust_name" value="<?=$cust_name?>">
<input type="hidden" name="user_name" value="<?=$user_name?>">
<input type="hidden" name="mail" value="<?=$mail?>">
<input type="hidden" name="price" value="<?=$price?>">
<input type="hidden" name="kind" value="<?=$kind?>">
<input type="hidden" name="spec" value="<?=addslashes($spec)?>">
<input type="hidden" name="id" value="<?=$id?>">

<?php if($_SESSION['if_price1']==0) { ?><input type="submit" name="submit" value="送出訂單" style="font-size:20pt;"><input type="button" id="a1" value='顯示批價' onclick='displayShow_control(<?=$s+1?>)' style="font-size:20pt;"><? } ?>
</form>
<? } ?>
</tr>
</td>

 </table>
 </div>
</center>

</body>
</html>