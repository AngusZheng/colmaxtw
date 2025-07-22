<?
session_start(); //要??SESSION，看是不是管理?
if($_SESSION["admin"]!="colmax"){
echo "<script>location.href='index.php';</script>";
exit;
}
include("../config.php"); //包含文件
set_time_limit(0);

?>
<script type="text/javascript">

function selAll(id){
//變數checkItem為checkbox的集合
var checkItem = document.getElementsByName(id);
for(var i=0;i<checkItem.length;i++){
checkItem[i].checked=true; 
}}
function unselAll(id){
//變數checkItem為checkbox的集合
var checkItem = document.getElementsByName(id);
for(var i=0;i<checkItem.length;i++){
checkItem[i].checked=false;
}}

function check(){
var reply = confirm('確認資料皆填寫無誤?');
return reply;
}
</script>
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
</body>
</head>
</div>	
</div>	
<center>	
<table width="800dpi" height="50px"  border="1" cellpadding="0" cellspacing="1">
<form name="form2" method="post" action="authorization_new_cl.php" onsubmit="return check()">
<tr>
<td align="left" width="15%">
客戶代號:
</td>
<td align="right">
<input type="text" name="cust_num" value="<?=time()?>">
</td>
</tr>
<tr>
<td align="left">
客戶簡稱:
</td>
<td align="right">
<input type="text" value="<?=$row["cust_name1"]?>"  name="cust_name1">
</td>
</tr>
<tr>
<td align="left">
客戶全名：
</td>
<td align="right">
<input type="text" value="<?=$row["cust_name2"]?>"  name="cust_name2">
</td>
</tr>
<tr>
<td align="left">
負責人:
</td>
<td align="right">
<input type="text" value="<?=$row["ceo"]?>"  name="ceo">
</td>
</tr>
<tr>
<td align="left">
聯絡人:
</td>
<td align="right">
<input type="text" value="<?=$row["contact"]?>" name="contact">
</td>
</tr>
<tr>
<td align="left">
TEL_NO(1)
</td>
<td align="right">
<input type="text" value="<?=$row["tel_no1"]?>"  name="tel_no1">
</td>
</tr>
<tr>
<td align="left">
TEL_NO(2):
</td>
<td align="right">
<input type="text" value="<?=$row["tel_no2"]?>"  name="tel_no2">
</td>
</tr>
<tr>
<td align="left">
EMAIL:
</td>
<td align="right">
<input type="text" value="<?=$row["email"]?>"  size="100" name="email">
</td>
</tr>
<tr>
<td align="left">
統一編號：
</td>
<td align="right">
<input type="text" value="<?=$row["taxnum"]?>"  name="taxnum">
</td>
</tr>
<tr>
<td align="left">
送貨地址1：
</td>
<td align="right">
<input type="text" value="<?=$row["addr1"]?>"  size="100" name="addr1">
</td>
</tr>
<tr>
<td align="left">
送貨地址2
</td>
<td align="right">
<input type="text" value="<?=$row["addr2"]?>"  size="100" name="addr2">
</td>
<tr>
<td align="left">
郵遞區號：
</td>

<td align="right">
<input type="text" value="<?=$row["zip_code"]?>"  name="zip_code"></td>
</tr>
<tr>
<td align="left">
帳號：
</td>
<td align="right">
<input type="text" value="<?=$row["user_name"]?>"  name="user_name"></td>
</tr>
<tr>
<td align="left">
密碼：
</td>
<td align="right">
<input type="text" value="<?=$row["password"]?>"  name="password"></td>
</tr>
<tr>
<td align="left">
<div align="left">
可購買品牌:
<input type="button" value="全選" onClick="selAll('authorized[]');"  style="width:50px;height:20px">
<input type="button" value="全取消" onClick="unselAll('authorized[]');"  style="width:50px;height:20px">
</div>
</td>

<td align="right">
<input type="checkbox" name="authorized[]" value="1"  <?php if($row["authorized"]&$a=1){?>checked="checked" <?php }?>>Pace
<input type="checkbox" name="authorized[]" value="2"  <?php if($row["authorized"]&$b=2){?>checked="checked" <?php }?>>Continental
<input type="checkbox" name="authorized[]" value="4"  <?php if($row["authorized"]&$c=4){?>checked="checked" <?php }?>>Deda
<input type="checkbox" name="authorized[]" value="8"  <?php if($row["authorized"]&$d=8){?>checked="checked" <?php }?>>Dedaccial
<input type="checkbox" name="authorized[]" value="16"  <?php if($row["authorized"]&$e=16){?>checked="checked" <?php }?>>DMT
<input type="checkbox" name="authorized[]" value="32"  <?php if($row["authorized"]&$f=32){?>checked="checked" <?php }?>>Finish Line
<input type="checkbox" name="authorized[]" value="64"  <?php if($row["authorized"]&$g=64){?>checked="checked" <?php }?>>Kool Stop
<input type="checkbox" name="authorized[]" value="128"  <?php if($row["authorized"]&$h=128){?>checked="checked" <?php }?>>Litespeed
<input type="checkbox" name="authorized[]" value="256"  <?php if($row["authorized"]&$i=256){?>checked="checked" <?php }?>>Park
<input type="checkbox" name="authorized[]" value="512"  <?php if($row["authorized"]&$j=512){?>checked="checked" <?php }?>>Selle Italia
<input type="checkbox" name="authorized[]" value="1024"  <?php if($row["authorized"]&$k=1024){?>checked="checked" <?php }?>>Tacx
<input type="checkbox" name="authorized[]" value="2048"  <?php if($row["authorized"]&$l=2048){?>checked="checked" <?php }?>>White Lightning
<input type="checkbox" name="authorized[]" value="4096"  <?php if($row["authorized"]&$m=4096){?>checked="checked" <?php }?>>Campagnolo
<input type="checkbox" name="authorized[]" value="8192"  <?php if($row["authorized"]&$n=8192){?>checked="checked" <?php }?>>Hydrapak
<input type="checkbox" name="authorized[]" value="16384"  <?php if($row["authorized"]&$o=16384){?>checked="checked" <?php }?>>Sportourer
<input type="checkbox" name="authorized[]" value="32768"  <?php if($row["authorized"]&$p=32768){?>checked="checked" <?php }?>>Kitbrix
</td>
</tr>


<tr align="center" bgcolor="#CCCCCC">
<td colspan="2" align="center">  
<center>
<input type="submit" name="Submit" value="提交">　　
<input type="reset" name="Submit" value="重置">
</center>
</td>
</tr>
</form>
</table>
</center>
</body>
</html>
