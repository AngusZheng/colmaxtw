<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>
<script type="text/javascript" language="javascript">
function check(){
var reply = confirm('確認修改？');

var pas1 = document.getElementById("password").value;
var pas2 = document.getElementById("password_check").value;

if(reply==true){
if(pas1 =="" )	
{
alert("請輸入新密碼！！");
return false;
}
else if(pas2 =="")
{
alert("請輸入新密碼確認！！");
return false;
}
else if(pas1 !== pas2)
{
alert("兩次密碼不同！！");
return false;
}	
else
return true;
}

else
return reply;
}


</script>
<body>
<form action="password_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onsubmit="return check()">
<table width="300dpi" height="200dpi" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000"  align="center">

<tr align="center" bgcolor="#CCCCCC">
<td colspan="2" bgcolor="#ffbfff"><h2>更改密碼</h2></td>
</tr>
<tr bgcolor="#CCCCCC">
<td   align ="left" bgcolor="#ffffe0" width="40%">
帳號：
</td>
<td   align ="left" bgcolor="#ffffe0">
<input type="text" name="user_name" size=20 value="<?=$_SESSION["user_name"]?>"  readOnly > 
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td  align ="left" bgcolor="#ffffe0">
新密碼：
</td>
<td   align ="left" bgcolor="#ffffe0">
<input type="password" name="password"  id ="password" size=20>
</td>
</tr>

<tr bgcolor="#CCCCCC">
<td   align ="left" bgcolor="#ffffe0">
新密碼確認：
</td>
<td   align ="left" bgcolor="#ffffe0">
<input type="password" name="password_check"  id="password_check" size=20>
</td>
</tr>


<tr align="center" bgcolor="#CCCCCC">
<td colspan="2">
<input type="submit" name="Submit" value="提交">　　
<input type="reset" name="Submit" value="重置"></td>
</tr>
</table>
</form>

</body>
</html>