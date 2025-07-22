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

<script type="text/javascript" language="javascript">
function check(){
var reply = confirm('確認資料皆填寫無誤?');
return reply;
}
</script>
<style>
.font{font-size:16px}
</style>
<form action="mod.php" method="post" name="form">   
子連結數量<input type="number" name="num" value="" required="required">
<input type="hidden" name="id" value="<?=$_REQUEST["id"]?>">
</form>
<?
include("../config.php");  //包含文件
$num=$_POST["num"];
$id=$_REQUEST["id"];
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM link where id='$id'"; 
$conn=mysql_query($sql); 
$rs=mysql_fetch_array($conn);
?>
<br>
<form action="mod_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onsubmit="return check()">
<table width="100%"  border="0" cellpadding="0" cellspacing="1" bgcolor="#000000" class="font">
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0" >標題：</td>
<td align="left" bgcolor="#ffffe0"> <input type="text" name="name"  size=15 value="<?=$rs["name"]?>"> 
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0">英文標題：</td>
<td align="left" bgcolor="#ffffe0"> <input type="text" name="name_eng"  size=20 value="<?=$rs["name_eng"]?>"> 
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0">連結：</td>
<td align="left" bgcolor="#ffffe0"> <input type="text" name="url"  size=100 value="<?=$rs["url"]?>"> 
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0">顯示(0顯示 1不顯示)：</td>
<td align="left" bgcolor="#ffffe0"> <input type="text" name="show"  size=5 value="<?=$rs["ifshow"]?>"> 
</td>
</tr>

<tr bgcolor="#CCCCCC">
<td align="right" bgcolor="#ffffe0">子連結：</td>
<td align="left" bgcolor="#ffffe0">
<?
for($i=0;$i<$num;$i++){
	echo '標題<input type="text" name="name2[]">&nbsp;英文標題<input type="text" name="name_eng2[]">&nbsp;網址<input type="text" name="url2[]" size=50><br>';
	}

?>
</td>
</tr>
<tr align="center" bgcolor="#CCCCCC">
<td colspan="2">
<input type="submit" name="Submit" value="提交">　　
<input type="reset" name="Submit" value="重置">
<input type="hidden"  name="id" value="<?=$id?>">
<input type="hidden"  name="num" value="<?=$num?>">
<input type="hidden"  name="brand_name" value="<?=$rs["vender"]?>">
</td>
</tr>
</table>
</form> 
<p><font size="2"><a href="new_list.php">上一頁</a></font></p>
</center>              
</body>
</html>
