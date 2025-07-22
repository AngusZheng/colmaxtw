<?
session_start(); //要??SESSION，看是不是管理?
if($_SESSION["admin"]!="colmax"){
echo "<script>location.href='index.php';</script>";
exit;
}
include("config.php"); //包含文件
set_time_limit(0);

?>
<style>
#mainBox{
height:100px;
writing-mode: tb-lr;
-webkit-column-count:10;
-moz-column-count:10;
-webkit-column-gap:10px;
-moz-column-gap:10px;
}
#mainBox a{
margin:4px;
padding:0px;
display:inline-block;
overflow:hidden;
width:100px;
height:11px;
writing-mode: lr-tb;
font-size:9px;
}
</style>
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
	
<input type="button"  value="新增"  onClick="window.location='authorization_new.php'">
<input type="button"  value="匯出execl"  onClick="window.location='cust_excel.php'">
<center>
<form name="form1" method="post" action="authorization.php" >
<select name='id' id='id'  onchange="submit();">
<option value="">請選擇</option>
<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT *  FROM cust  where  user_name!='' or password!=''";
$tafno=mysql_query($sql);
while($row=mysql_fetch_array($tafno)){
if($_POST["id"]==$row["id"])
$selected="selected";
else
$selected='';
echo '<option value="'.$row["id"].'"'.$selected.'>'.$row["cust_name1"].'</option>';
}
?>
</select>
<input name="cust_name" value="<?=$_POST["cust_name"]?>">
</form>

<?
if(!empty($_POST["cust_name"])){
echo '<div id="mainBox">';
$cust_name=$_POST["cust_name"];
$sql = "SELECT *  FROM cust where cust_name1 like '%$cust_name%' and  (user_name!='' or password!='')";
$conn=mysql_query($sql);
while ($rs=mysql_fetch_array($conn))
{

echo '<a href="authorization.php?id='.$rs["id"].'">'.$rs["cust_name1"].'</a>';
}
echo "</div><br>";
}
?>

<font size="6"><strong>會員設定</strong></font>
<table width="800dpi" height="50px"  border="1" cellpadding="0" cellspacing="1">
<?
if(!empty($_REQUEST["id"])){
$id=$_REQUEST["id"];
$sql = "SELECT *  FROM cust where id = '$id'";
$authorization=mysql_query($sql);
$row=mysql_fetch_array($authorization);
?>	
<form name="form2" method="post" action="authorization_cl.php" onsubmit="return check()">
<tr>
<td align="left" width="15%">
客戶代號:
</td>
<td align="right">
<input type="text"  name="cust_num" value="<?=stripslashes($row["cust_num"])?>">
</td>
</tr>
<tr>
<td align="left">
客戶簡稱:
</td>
<td align="right">
<input type="text" value="<?=stripslashes($row["cust_name1"])?>"  name="cust_name1">
</td>
</tr>
<tr>
<td align="left">
客戶全名：
</td>
<td align="right">
<input type="text" value="<?=stripslashes($row["cust_name2"])?>"  name="cust_name2">
</td>
</tr>
<tr>
<td align="left">
負責人:
</td>
<td align="right">
<input type="text" value="<?=stripslashes($row["ceo"])?>"  name="ceo">
</td>
</tr>
<tr>
<td align="left">
聯絡人:
</td>
<td align="right">
<input type="text" value="<?=stripslashes($row["contact"])?>" name="contact">
</td>
</tr>
<tr>
<td align="left">
TEL_NO(1)
</td>
<td align="right">
<input type="text" value="<?=stripslashes($row["tel_no1"])?>"  name="tel_no1">
</td>
</tr>
<tr>
<td align="left">
TEL_NO(2):
</td>
<td align="right">
<input type="text" value="<?=stripslashes($row["tel_no2"])?>"  name="tel_no2">
</td>
</tr>
<tr>
<td align="left">
EMAIL:
</td>
<td align="right">
<input type="text" value="<?=stripslashes($row["email"])?>"  size="100" name="email">
</td>
</tr>
<tr>
<td align="left">
負責業務:
</td>
<td align="right">
<input type="text" value="<?=stripslashes($row["sales"])?>"  size="20" name="sales">
</td>
</tr>
<tr>
<td align="left">
統一編號：
</td>
<td align="right">
<input type="text" value="<?=stripslashes($row["taxnum"])?>"  name="taxnum">
</td>
</tr>
<tr>
<td align="left">
送貨地址1：
</td>
<td align="right">
<input type="text" value="<?=stripslashes($row["addr1"])?>"  size="100" name="addr1">
</td>
</tr>
<tr>
<td align="left">
送貨地址2
</td>
<td align="right">
<input type="text" value="<?=stripslashes($row["addr2"])?>"  size="100" name="addr2">
</td>
<tr>
<td align="left">
郵遞區號：
</td>
<td align="right">
<input type="text" value="<?=stripslashes($row["zip_code"])?>"  name="zip_code"></td>
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
<?php
$sql = "SELECT  *  FROM vendor order by sortnum asc"; 
$conn=mysql_query($sql);
while($row2=mysql_fetch_array($conn)){
?>
<input type="checkbox" name="authorized[]" value="<?=(int)$row2['authorized'];?>"  <?php if( (int)$row["authorized"]&(int)$row2['authorized']=(int)$row2['authorized'] ){?>checked="checked" <?php }?>><?=$row2['kind']?>
<? 
} ?>
</td>
</tr>
<td align="left">
<div align="left">
不顯示批價:
<input type="button" value="全選" onClick="selAll('authorized2[]');"  style="width:50px;height:20px">
<input type="button" value="全取消" onClick="unselAll('authorized2[]');"  style="width:50px;height:20px">
</div>
</td>

<td align="right">
<?php
$sql = "SELECT  *  FROM vendor order by sortnum asc"; 
$conn=mysql_query($sql); 	
$i=0;
$arr=explode(",",$row["authorized2"]);
while($row2=mysql_fetch_array($conn)){	
?>
<input type="checkbox" name="authorized2[]" value="<?=$row2['kind'];?>"  <?php if(in_array($row2['kind'],$arr)){?>checked="checked" <?php }?>><?=$row2['kind']?>
<? 
$i++;
} ?>
</td>
</tr>
<tr>
<td align="left">
權限設定
</td>
<td align="right">
不顯示批價(購買紀錄即時優惠不顯示,可多人登入)<input type="checkbox" name="if_price1" value="1"  <?php if($row["if_price1"]==1){?>checked="checked" <?php }?>>
顯示庫存<input type="checkbox" name="if_storage" value="1"  <?php if($row["if_storage"]==1){?>checked="checked" <?php }?>>
不顯示資訊公告<input type="checkbox" name="if_info" value="1"  <?php if($row["if_info"]==1){?>checked="checked" <?php }?>>
</td>
</tr>
<tr align="center" bgcolor="#CCCCCC">
<td colspan="2" align="center">  
<center>
<input type="submit" name="Submit" value="提交">　　
<input type="reset" name="Submit" value="重置">
<input type="hidden"  name="id" id="id" value="<?=$row["id"]?>">
</center>
</td>
</tr>
</form>
</table>
<? }?>
</center>
</body>

