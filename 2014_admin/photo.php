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
function del(){
var reply = confirm('打勾會刪除 確認送出？');
return reply;
}
</script>

<body>
<form action="photo_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onsubmit="return check()">
<input type="file"  name="file1" /> 
<input type="file"  name="file2" /> 
<input type="file"  name="file3" /> 
<input type="file"  name="file4" /> 
<hr>
<input type="file"  name="file5" />
</hr>
<input type="hidden" name="path" value="<?=$_GET["path"]?>">
<input type="submit" name="Submit" value="上傳">
</form> 
<hr>
<form action="photo_cl.php" method="post" name="form2" id="form2" class="style2" enctype="multipart/form-data" onsubmit="return del()">
<?php
include ("config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);

$message = glob("../vendor1/vendor_pic/".$_GET["path"]."/{*.gif,*.jpg,*.png}", GLOB_BRACE);
for($i=0;$i<count($message);$i++)
{
$photo=str_replace("../vendor1/vendor_pic/".$_GET["path"]."/",'',$message[$i]);	
$sql="select  * from product_remarks where path='".$_GET["path"]."' and photo ='".$photo."'";	
$conn=mysql_query($sql); 	
$rs=mysql_fetch_array($conn);
echo '<input type="checkbox" name="file_root[]" value="'.$message[$i].'"><input type="text" name="remark[]" value="'.$rs["remark"].'">' .$photo.'<img src="'.$message[$i].'"  width="100" height="100" alt=""/>'.'<br>';
echo '<input type="hidden" name="photo[]" value="'.$photo.'">';
}
?>
<input type="hidden" name="path" value="<?=$_GET["path"]?>">
<input type="hidden" name="op" value="del">
<input type="submit" value="送出">
 </form> 
</body>
</html>