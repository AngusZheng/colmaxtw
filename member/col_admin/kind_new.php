<?
session_start(); //要??SESSION，看是不是管理?
if($_SESSION["admin"]!="colmax"){
echo "<script>location.href='index.php';</script>";
exit;
}
include("config.php"); //包含文件
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
<h1>新增商品分類</h1>	
<table width="500px" height="50px"  border="1" cellpadding="0" cellspacing="1">
<form name="form2" method="post" action="kind_new_cl.php" onsubmit="return check()">
<tr>
<td align="left" width="15%">
分類名稱:
</td>
<td align="right">
<input type="text" name="kind_name" value="">
</td>
</tr>
<tr>
<td align="left">
所屬品牌:
</td>
<td align="right">
<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT  *  FROM vendor order by kind asc"; 
$conn=mysql_query($sql); 	
?>
<select name="kinds1">
<option value="">請選擇</option>
<?
while($rs=mysql_fetch_array($conn)){	
if($rs["kind"]!='')
echo '<option value="'.$rs["kind"].'">'.$rs["kind"].'</option>';
}
?>
</select>


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
