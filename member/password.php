<? session_start();
include("config.php"); //包含文件
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>修改密碼</title>
</head>

<body>

<center>

<form name="form1" method="post" action="password_cl.php">
<table width="500" height="241" border="0" cellpadding="0" cellspacing="0">
<tr >
<td width="175" align="center">原密碼:</td>
<td width="363"><input name="old_pws" type="password" id="old_pws"></td>
</tr>
<tr >
<td width="175" align="center">新密碼:</td>
<td><input name="new_pws1" type="password" id="new_pws1"></td>
</tr>
</tr>
<tr >
<td width="175" align="center">新密碼確認:</td>
<td><input name="new_pws2" type="password" id="new_pws2"></td>
</tr>

<tr align="center" >
<td colspan="3">
<input type="hidden"  name="id" value="<?=$_SESSION["user_name"]?>">
<input type="submit" name="Submit" value="送出">
<input type="reset" name="submit" value="重置"> 

</td>
</tr>
</table>
</form>

</center>

</body>
</html>
