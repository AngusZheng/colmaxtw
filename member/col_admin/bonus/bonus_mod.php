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
<script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript"  src="../xheditor-1.2.1/xheditor-1.2.1.min.js"></script>
<script type="text/javascript"   src="../xheditor-1.2.1/xheditor_lang/zh-tw.js"></script>
<script type="text/javascript" language="javascript">
function check(){
var reply = confirm('確認資料皆填寫無誤?');
return reply;
}
</script>
<style>
.font{font-size:16px}
</style>   
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
  <style>
    article,aside,figure,figcaption,footer,header,hgroup,menu,nav,section {display:block;}
    body {font: 62.5% "Trebuchet MS", sans-serif; margin: 50px;}
  </style>
<?
include("../config.php");  //包含文件
$id=$_GET["id"];
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM bonus where id='$id'"; 
$conn=mysql_query($sql); 
$rs=mysql_fetch_array($conn);
?>
<br>
<form action="bonus_mod_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onsubmit="return check()">
<table width="900dpi" border="0" cellpadding="0" cellspacing="1"  class="font">
<tr align="center" >
<td colspan="5"></td>
</tr>
<tr>
<td align="right" >照片：</td>
<td align="left" >
<img src="../../bonus/<?=$rs["photo"]?>" width="198" height="156">
</td>
</tr>
<tr>
<td align="right" >標題(x)：</td>
<td align="left" > <input type="text" name="titlex"  size=100 value="<?=$rs["title"]?>"> 
</td>
</tr>
<tr>
<td align="right" >原價/優惠價：</td>
<td align="left" > 
<input  type="text" name="price"  value="<?=$rs["price"]?>" size="10"/>/
<input  type="text" name="price2"  value="<?=$rs["price2"]?>" size="10"/>
</td>
</tr>
<tr>
<td align="right">品牌：</td>
<td align="left"> 
<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT distinct kinds1  FROM product where kinds1 !=''"; 
$conn=mysql_query($sql); 	
?>
<select name="kind" id="select1">
<option value="">請選擇</option>
<?
while($row=mysql_fetch_array($conn)){	
if($row["kinds1"]==$rs["kind"])
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
<td align="right" >標題：</td>
<td align="left" ><textarea name="title"  class="xheditor"  cols="100" rows="30"><?=$rs["title"]?></textarea>
</td>
</tr>
<tr>
<td align="right" >上傳附件：</td>
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
</center>
</td>
</tr>
</table>
</form> 
<p><font size="2"><a href="bonus_list.php">上一頁</a></font></p>
</center>              
</body>
</html>
