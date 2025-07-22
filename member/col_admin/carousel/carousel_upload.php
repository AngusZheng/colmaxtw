<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>
<script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript"  src="../xheditor-1.2.1/xheditor-1.2.1.min.js"></script>
<script type="text/javascript"   src="../xheditor-1.2.1/xheditor_lang/zh-tw.js"></script>
<script type="text/javascript" language="javascript">
function check(){
var reply = confirm('確認上傳？');
return reply;
}
</script>
<body>
<form action="carousel_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onsubmit="return check()">
<table width="100%"  border="0" cellpadding="0" cellspacing="1" bgcolor="#000000" class="font">
<tr align="center" bgcolor="#CCCCCC">
<td colspan="5" bgcolor="#ffbfff"></td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0">連結：</td>
<td align="left" bgcolor="#ffffe0"> <input type="text" name="link1"  size=100 value="<?=$rs["link"]?>"> 
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0">標題：</td>
<td align="left" bgcolor="#ffffe0"> <input type="text" name="brand_name1"  size=100 value="<?=$rs["brand_name"]?>"> 
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
while($rs=mysql_fetch_array($conn)){	
if($rs["kinds1"]!='')
echo '<option value="'.$rs["kinds1"].'">'.$rs["kinds1"].'</option>';
}
?>
<option value="0">媒體報導</option>
<option value="1">活動公告</option>
<option value="2">最新消息</option>
<option value="3">品牌相關影片</option>
<option value="4">即時優惠</option>
</select>
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0">內容：</td>
<td align="left" bgcolor="#ffffe0"><textarea name="remarks1" class="xheditor" rows="20" cols="150"><?=$rs["remarks"]?></textarea>
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0">上傳附件：</td>
<td align="left" bgcolor="#ffffe0">
<input type="file" i name="file1" /> 
</td>
</tr>

<tr align="center" bgcolor="#CCCCCC">
<td colspan="2">
<input type="submit" name="Submit" value="提交">　　
<input type="reset" name="Submit" value="重置">
</form> 
</td>
</tr>
</table>

</form>
<p align="center"><font size="2"><a href="carousel_list.php">上一頁</a></font></p>
</body>
</html>