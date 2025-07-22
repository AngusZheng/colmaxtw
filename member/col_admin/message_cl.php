<?php


if($_POST['op']=="del"){
   $file=$_POST["file_root"];

   for($i=0;$i<count($file);$i++)
{
  @unlink($file[$i]);
}
echo ("<script type='text/javascript'> alert('刪除成功');</script>");
echo '<script>location.href="notice.php"</script>'; 
}
else
{
if(!empty($_FILES["file1"]["name"])){
$file_array=explode(".",$_FILES["file1"]["name"]);
$file=$file_array[0].".".$file_array[1];
$path=dirname(dirname(__FILE__)).'/message/'.$file;
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
}

echo ("<script type='text/javascript'> alert('上傳成功');</script>");
echo '<script>location.href="message.php"</script>'; 
}
?>