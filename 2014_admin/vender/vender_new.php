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
<?
include ("../config.php");

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM link "; 
$sql.= " WHERE 1  and del = 0 and id=".$_POST["kind"];
$conn=mysql_query($sql); 	
$rs=mysql_fetch_array($conn);
?>
<form action="vender_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onsubmit="return check()">
<table width="80%"  border="1" cellpadding="0" cellspacing="1"   align="center">

<h3 align="center">網站內容上傳-<?=$_POST["vender"]?>-<?=$rs["name"]?></h3>
<tr >
<td  colspan="4">
<textarea name="content"   class="xheditor" cols="160" rows="30"></textarea>
</td>
</tr>

<tr>
<td colspan="4">
<center>
<input type="hidden" name="vender" value="<?=$_POST["vender"]?>">
<input type="hidden" name="kind" value="<?=$_POST["kind"]?>">
<input type="submit" name="Submit" value="提交">　　
<input type="reset" name="Submit" value="重置"></center></td>
</tr>
</table>
</form>
<p align="center"><font size="2"><a href="news_list.php">上一頁</a></font></p>
</body>
</html>