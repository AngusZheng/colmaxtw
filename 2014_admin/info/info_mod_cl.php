<?php
ob_start();
include("../config.php");

//參數

$name = $_POST["name"];
$summary= $_POST["summary"];
$url = $_POST["url"];
$id = $_POST["id"];

if(isset( $_GET["delete"])){
    $delete = $_GET["delete"];
}else{
    $delete = 0;
}


//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

if($delete ==1)
{
$id=$_GET["id"];	
$sql = "update info set del = 1 where id ='$id'";

$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('刪除成功');</script>");
echo '<script>location.href="info_list.php"</script>'; 
}
}
else{
if(!empty($_FILES["file1"]["name"])){
$file_array = explode(".",$_FILES["file1"]["name"]);
$fileExtension = strtolower(pathinfo($_FILES['file1']['name'], PATHINFO_EXTENSION));
$file = time().".".$fileExtension;
$path=dirname(dirname(dirname(__FILE__))).'/info/'.$file;
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
$sql= "update info set name= '$name' , summary='$summary',photo = '$file',url='$url' where id = '$id'";
}
else{
    $sql= "update info set name= '$name' , summary='$summary' ,url='$url'  where id = '$id'";
}




$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('修改成功');</script>");
echo '<script>location.href="info_list.php"</script>'; 
}
}

ob_end_flush();
?>