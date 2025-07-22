<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>
<script type="text/javascript" language="javascript">
function check(){
var reply = confirm('確認上傳？');
return reply;
}
</script>
<body>
<form action="news_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onsubmit="return check()">
<table width="500px" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000"  align="center">
<tr align="center" bgcolor="#CCCCCC">
<td colspan="5" bgcolor="#ffbfff"><h2>最新消息</h2></td>
</tr>
<tr bgcolor="#CCCCCC">
<td bgcolor="#ffffe0" width="40%">
標題：<input type="text" name="title" size=50><br>
連結：<input type="text" name="link" size=50>
</td>
</tr>
<tr align="center" bgcolor="#CCCCCC">
<td colspan="2">
<input type="submit" name="Submit" value="提交">　　
<input type="reset" name="Submit" value="重置"></td>
</tr>
</table>
</form>
<p align="center"><font size="2"><a href="news.php">上一頁</a></font></p>
</body>
</html>