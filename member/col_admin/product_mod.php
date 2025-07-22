<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML news_list 1.2//EN" "http://www.opennews_listalliance.org/tech/DTD/xhtml-news_list12.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>歌美斯後台管理系統</title>
<head>
</head>
<body>
<title></title>
<center>
<script type="text/javascript" language="javascript">
function check(){
var reply = confirm('確認資料皆填寫無誤?');
return reply;
}
</script>
<style>
.font{font-size:16px}
</style>   

<?
include("config.php");  //包含文件
ob_start();
$id=$_REQUEST["id"];
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM product where id='$id'"; 
$conn=mysql_query($sql); 
$rs=mysql_fetch_array($conn);
$spec=str_replace("'","",$rs["spec"]);
$spec=str_replace('"',"",$spec);
?>
<br>
<form action="product_mod_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onsubmit="return check()">
<table width="900dpi" height="200dpi" border="0" cellpadding="0" cellspacing="1">
<caption>修改產品資訊</caption>
<tr>
<td align="right" >排序：</td>
<td align="left" >
 <input type="text" name="sortnum"  size=100 value="<?=$rs["sortnum"]?>"> 
</td>
</tr>
<tr>
<td align="right" >品號：</td>
<td align="left" >
 <input type="text" name="product_num"  size=100 value="<?=$rs["product_num"]?>"> 
</td>
</tr>
<tr>
<td align="right" >品名：</td>
<td align="left" > <input type="text" name="product_name"  size=100 value="<?=$rs["product_name"]?>"> 
</td>
</tr>
<tr>
<td align="right" >規格：</td>
<td align="left" > <input type="text" name="spec"  size=100 value="<?=$spec?>"> 
</td>
</tr>
<tr>
<td align="right" >品牌：</td>
<td align="left" > 
<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT distinct kinds1  FROM product  "; 
$conn=mysql_query($sql); 	
?>
<select name="kinds1" id="select1">
<?
while($row=mysql_fetch_array($conn)){	
if($row["kinds1"]==$rs["kinds1"])
$selected="selected";
else
$selected="";

echo '<option value="'.$row["kinds1"].'"'.$selected.'>'.$row["kinds1"].'</option>';
}
?>
</select> 
</td>
</tr>
<tr>
<td align="right" >分類：</td>
<td align="left" > 
<select name="kinds2_1">
<option value="">請選擇</option>
<?
$kind=$_REQUEST["kind"];	
$sql = "SELECT  *  FROM kind_name where del = 0 and kinds1 = '".$kind."'"; 

$conn=mysql_query($sql); 	
$k=explode('+',$rs["kinds2"]);
while($row2=mysql_fetch_array($conn)){	

if($row2["kind_name"]==$k[0])
$selected="selected";
else
$selected="";
echo '<option value="'.$row2["kind_name"].'"'.$selected.'>'.$row2["kind_name"].'</option>';
}

?>
</select> 
<select name="kinds2_2">
<option value="">請選擇</option>
<?
$kind=$_REQUEST["kind"];	
$sql = "SELECT  *  FROM kind_name where del = 0 and kinds1 = '".$kind."'"; 
$k=explode('+',$rs["kinds2"]);
$conn=mysql_query($sql); 	
while($row2=mysql_fetch_array($conn)){	
if($row2["kind_name"]==$k[1])
$selected="selected";
else
$selected="";
echo '<option value="'.$row2["kind_name"].'"'.$selected.'>'.$row2["kind_name"].'</option>';
}

?>
</select> 

</td>
</tr>
<tr>
<td align="right" >批發價：</td>
<td align="left" >$<input type="text" name="price2"  size=10 value="<?=$rs["price2"]?>"> 
/零售價：
$<input type="text" name="price"  size=10 value="<?=$rs["price"]?>"> 
</td>
</tr>
<tr>
<td align="right" >上傳圖片：</td>
<td align="left" >
<input type="file"  name="file1" /> 
</td>
</tr>

<tr align="center">
<td colspan="2">
<center>
<input type="submit" name="Submit" value="提交">　　
<input type="reset" name="Submit" value="重置">
<input type="hidden"  name="id" value="<?=$id?>">
<input type="hidden"  name="kind" value="<?=$_REQUEST["kind"]?>">
</center>
</td>
</tr>
</table>
</form> 
<p><font size="2"><a href="product_list.php?kind=<?=$_REQUEST["kind"]?>">上一頁</a></font></p>
</center>              
</body>
</html>
