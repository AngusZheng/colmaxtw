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
<form action="connection_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onsubmit="return check()">
<table width="800dpi" height="400dpi" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000"  align="center">

<tr align="center" bgcolor="#CCCCCC">
<td colspan="5" bgcolor="#ffbfff"><h2>下方連結圖片上傳</h2></td>
</tr>
<tr bgcolor="#CCCCCC">
<td  bgcolor="#ffffe0"  width="20%">1：<input type="file" name="file1"></td>
<td bgcolor="#ffffe0" width="40%">
連結：<input type="text" name="link1" size=50>
</td>
<td bgcolor="#ffffe0">
標題：<input type="text" name="title1" size=50>
</td>
<td bgcolor="#ffffe0">
英文標題：<input type="text" name="title_eng1" size=50>
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td  bgcolor="#ffffe0">2：<input type="file" name="file2"></td>
<td bgcolor="#ffffe0">
連結：<input type="text" name="link2" size=50>
</td>
<td bgcolor="#ffffe0">
標題：<input type="text" name="title2" size=50>
</td>
<td bgcolor="#ffffe0">
英文標題：<input type="text" name="title_eng2" size=50>
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td  bgcolor="#ffffe0">3：<input type="file" name="file3"></td>
<td bgcolor="#ffffe0">
連結：<input type="text" name="link3" size=50>
</td>
<td bgcolor="#ffffe0">
標題：<input type="text" name="title3" size=50>
</td>
<td bgcolor="#ffffe0">
英文標題：<input type="text" name="title_eng3" size=50>
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td  bgcolor="#ffffe0">4：<input type="file" name="file4"></td>
<td bgcolor="#ffffe0">
連結：<input type="text" name="link4" size=50>
</td>
<td bgcolor="#ffffe0">
標題：<input type="text" name="title4" size=50>
</td>
<td bgcolor="#ffffe0">
英文標題：<input type="text" name="title_eng4" size=50>
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td  bgcolor="#ffffe0">5：<input type="file" name="file5"></td>
<td bgcolor="#ffffe0">
連結：<input type="text" name="link5" size=50>
</td>
<td bgcolor="#ffffe0">
標題：<input type="text" name="title5" size=50>
</td>
<td bgcolor="#ffffe0">
英文標題：<input type="text" name="title_eng5" size=50>
</td>
</tr>

<tr align="center" bgcolor="#CCCCCC">
<td colspan="4">
<input type="submit" name="Submit" value="提交">　　
<input type="reset" name="Submit" value="重置"></td>
</tr>
</table>
</form>
<p align="center"><font size="2"><a href="connection_list.php">上一頁</a></font></p>
</body>
</html>