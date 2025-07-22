<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML carousel_list 1.2//EN" "http://www.opencarousel_listalliance.org/tech/DTD/xhtml-carousel_list12.dtd">
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
<body>
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

<?
include("../config.php");  //包含文件
$id=$_GET["id"];
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM carousel where id='$id'"; 
$conn=mysql_query($sql); 
$rs=mysql_fetch_array($conn);
?>
<br>
<form action="carousel_mod_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onsubmit="return check()">
<table width="100%"  border="0" cellpadding="0" cellspacing="1" bgcolor="#000000" class="font">
<tr align="center" bgcolor="#CCCCCC">
<td colspan="5" bgcolor="#ffbfff"></td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0" >照片：</td>
<td align="left" bgcolor="#ffffe0">
<img src="../../carousel/<?=$rs["pic_name"]?>" width="198" height="156">
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0">連結：</td>
<td align="left" bgcolor="#ffffe0"> <input type="text" name="link"  size=100 value="<?=$rs["link"]?>"> 
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0">標題：</td>
<td align="left" bgcolor="#ffffe0"> <input type="text" name="brand_name"  size=100 value="<?=$rs["brand_name"]?>"> 
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0">分類：</td>
<td align="left" bgcolor="#ffffe0">
<?php
include "../config.php";
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT distinct kinds1  FROM product  "; 
$conn=mysql_query($sql); 	
?>
<select name="kind">
<option value="">請選擇</option>
<?


while($row=mysql_fetch_array($conn)){	
if($row["kinds1"]==$rs["kind"])
$selected="selected";
else
$selected="";

if($row["kinds1"]!='')
echo '<option value="'.$row["kinds1"].'"'.$selected.'>'.$row["kinds1"].'</option>';
}
?>
<option value="0" <? if($rs["kind"]=='0') {?>selected<? } ?>>媒體報導</option>
<option value="1"  <? if($rs["kind"]==1) {?>selected<? } ?>>活動公告</option>
<option value="2"  <? if($rs["kind"]==2) {?>selected<? } ?>>最新消息</option>
<option value="3"  <? if($rs["kind"]==3) {?>selected<? } ?>>品牌相關影片</option>
<option value="4"  <? if($rs["kind"]==4) {?>selected<? } ?>>即時優惠</option>
</select>
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0">排序：</td>
<td align="left" bgcolor="#ffffe0"> <input type="text" name="pro"  size=10 value="<?=$rs["pro"]?>"> 
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0">內容：</td>
<td align="left" bgcolor="#ffffe0"><textarea name="remarks" class="xheditor" rows="20" cols="150"><?=$rs["remarks"]?></textarea>
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0">上傳附件：</td>
<td align="left" bgcolor="#ffffe0">
<input type="file"  name="file1" /> 
</td>
</tr>

<tr align="center" bgcolor="#CCCCCC">
<td colspan="2">
<input type="submit" name="Submit" value="提交">　　
<input type="reset" name="Submit" value="重置">
<input type="hidden"  name="id" value="<?=$id?>">
</td>
</tr>
</table>
</form> 
<p><font size="2"><a href="carousel_list.php">上一頁</a></font></p>
</center>              
</body>
</html>
