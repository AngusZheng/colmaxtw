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
$sql = "SELECT * FROM vender_content where id='$id'"; 
$conn=mysql_query($sql); 
$rs=mysql_fetch_array($conn);

$sql = "SELECT * FROM link "; 
$sql.= " WHERE 1  and del = 0 and id=".$rs["kind"];
$conn1=mysql_query($sql); 	
$row=mysql_fetch_array($conn1);
?>
<br>
<form action="vender_mod_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onsubmit="return check()">
<h1><?=$rs["vender"]."-".$row["name"]?></h1>
<table width="900dpi" height="200dpi" border="0" cellpadding="0" cellspacing="1"  class="font">
<tr>
<td><textarea name="content"  class="xheditor"  cols="160" rows="30"><?=$rs["content"]?></textarea>
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
<p><font size="2"><a href="vender_list.php">上一頁</a></font></p>
</center>              
</body>
</html>
