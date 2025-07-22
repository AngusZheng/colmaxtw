<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?
$brand_name=$_POST["brand_name"];
$num=$_POST["num"];
?>
<table width="100%"  border="0" cellpadding="0" cellspacing="1" bgcolor="#000000"  align="center">
<form action="new_cl.php" method="post" name="form1"  enctype="multipart/form-data">
<tr>
<td   bgcolor="#ffffe0">LOGO：</td>
<td  bgcolor="#ffffe0">
<input type="file"  name="file"  required="required"/> (<?=$brand_name?>)
</td>
</tr>

<?
for($i=0;$i<$num;$i++){
	echo '<tr>';
	echo '<td bgcolor="#ffffe0">標題</td>
	<td  bgcolor="#ffffe0"><input type="text" name="name[]">&nbsp;英文標題<input type="text" name="name_eng[]">&nbsp;網址<input type="text" name="url[]" size=50></td>';
	echo '</tr>';
	}

?>

<tr align="center" bgcolor="#CCCCCC">
<td colspan="2">
<input type="hidden" name="brand_name" value="<?=$brand_name?>">
<input type="hidden" name="num" value="<?=$num?>">
<input type="submit"  value="新增">
</td>
</tr>

</table>
</form>
</body>
</html>