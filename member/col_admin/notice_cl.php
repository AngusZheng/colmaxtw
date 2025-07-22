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

else{

if(!empty($_FILES["file1"]["name"])){
$file_array=explode(".",$_FILES["file1"]["name"]);
$file=$file_array[0].".".$file_array[1];
$path=dirname(dirname(__FILE__)).'/notice/'.$file;
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
}

//匯入pclzip
include('pclzip.lib.php');
 
// 檔案完整路徑
$full_target_path = dirname(dirname(__FILE__)).'/notice/'.$file_array[0].'.zip';
 
// PclZip
$archive = new PclZip($full_target_path);
 
// 資料不存在則產生暫存資料夾(Public all)
$destination_path_zip = dirname(dirname(__FILE__)).'/notice';

if (!file_exists($destination_path_zip)) {
	mkdir($destination_path_zip, 0777);
}
 
// 解壓縮檔案並取得內容列表
$file_list = $archive->extract(PCLZIP_OPT_PATH, $destination_path_zip, PCLZIP_OPT_REMOVE_ALL_PATH);

echo ("<script type='text/javascript'> alert('上傳成功');</script>");
echo '<script>location.href="notice.php"</script>'; 

}
?>