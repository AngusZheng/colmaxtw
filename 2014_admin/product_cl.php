<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?
session_start();
ob_start();
include ("config.php");
//post
$id = $_POST["id"];
$new_num =$_POST["new_num"];
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

for($i=0;$i<count($new_num);$i++){
if($new_num[$i]>=0)
{
$sql = "update product set new_num =".$new_num[$i]." where id=".$id[$i];
}
$result=mysql_query($sql);
if($result){
echo ("<script type='text/javascript'> alert('修改成功');</script>");
echo '<script>location.href="product.php"</script>'; 
}
}
?></html>