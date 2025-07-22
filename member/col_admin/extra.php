<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>

<body>
<script type="text/javascript" language="javascript">
function check(){
var reply = confirm('確認上傳？');
return reply;
}
function del(){
var reply = confirm('確認刪除？');
return reply;
}
</script>

<body>
<form action="extra_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onsubmit="return check()">
<input type="file" i name="file1" /> 
<input type="submit" name="Submit" value="提交">
</form> 
<hr>
<form action="extra_cl.php" method="post" name="form2" id="form2" class="style2" enctype="multipart/form-data" onsubmit="return del()">
<?php
$message = glob("../extra/{*.gif,*.jpg,*.png}", GLOB_BRACE);
for($i=0;$i<count($message);$i++)
{
echo '<input type="checkbox" name="file_root[]" value="'.$message[$i].'">' .str_replace('../extra/','',$message[$i]).'<img src="'.$message[$i].'"  width="100" height="100" alt=""/>'.'<br>';

}

?>
<input type="hidden" name="op" value="del">
<input type="submit" value="刪除">
 </form> 
</body>
</html>