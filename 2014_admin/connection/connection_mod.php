<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML connection_list 1.2//EN" "http://www.openconnection_listalliance.org/tech/DTD/xhtml-connection_list12.dtd">
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
$sql = "SELECT * FROM connection where id='$id'"; 
$conn=mysql_query($sql); 
$rs=mysql_fetch_array($conn);
?>
<br>
<form action="connection_mod_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onsubmit="return check()">
<table width="900dpi" height="200dpi" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000" class="font">
<tr align="center" bgcolor="#CCCCCC">
<td colspan="5" bgcolor="#ffbfff"></td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0" >照片：</td>
<td align="left" bgcolor="#ffffe0">
<img src="../../connection/<?=$rs["pic_name"]?>" width="205" height="40">
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0">連結：</td>
<td align="left" bgcolor="#ffffe0"> <input type="text" name="link"  size=100 value="<?=$rs["link"]?>"> 
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0">標題：</td>
<td align="left" bgcolor="#ffffe0"><textarea name="title"  cols="70" rows="5"><?=$rs["title"]?></textarea>
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0">英文標題：</td>
<td align="left" bgcolor="#ffffe0"><textarea name="title_eng"  cols="70" rows="5"><?=$rs["title_eng"]?></textarea>
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
<input type="hidden"  name="id" value="<?=$id?>">
</td>
</tr>
</table>
</form> 
<p><font size="2"><a href="connection_list.php">上一頁</a></font></p>
</center>              
</body>
</html>
