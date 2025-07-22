<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?
ini_set('display_errors','1');
error_reporting(E_ALL);
session_start();
ob_start();
include ("../config.php");
//post
$id = $_POST["id"];
$new_num =$_POST["new_num"];
$ids = implode(',',$id);
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;
$sql = "UPDATE map SET new_num = CASE id ";
for($i=0;$i<count($new_num);$i++){
if(isset($new_num[$i])&& isset($id[$i]))
{
//$sql = "update map set new_num =".$new_num[$i]." where id=".$id[$i];
  $sql .= " WHEN ".$id[$i]." THEN ".$new_num[$i];
}
}
$sql .=" END  WHERE id IN ($ids)";
$result=mysql_query($sql);
if($result){
    echo ("<script type='text/javascript'> alert('修改成功');</script>");
    echo '<script>location.href="index.php"</script>'; 
}
?></html>