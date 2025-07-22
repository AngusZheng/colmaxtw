<?php
include ("config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);

if($_POST['op']=="del"){
   $file=$_POST["file_root"];
   $photo =$_POST["photo"];
   $remark=$_POST["remark"];
   $path=$_POST["path"];
   
   for($i=0;$i<count($photo);$i++)
{
  $sql = "select * from product_remarks where photo='".$photo[$i]."'"; 
  $result=mysql_query($sql);  
  $row = mysql_fetch_array($result);
  
   if (!mysql_num_rows($result))  
        {  
          $sql= "insert into product_remarks (remark,path,photo) values ('".$remark[$i]."','$path','".$photo[$i]."')";
		  mysql_query($sql);
        }  
    else  
        {  
        $sql = "update product_remarks set remark ='".$remark[$i]."' where id =".$row["id"];  
		   mysql_query($sql);
        }  
}  
   for($i=0;$i<count($file);$i++)
{
  @unlink($file[$i]); 

}

echo ("<script type='text/javascript'> alert('成功');</script>");
echo '<script>window.close();</script>';
}

else{

if(!empty($_FILES["file1"]["name"])){
$file_array=explode(".",$_FILES["file1"]["name"]);
$file=$file_array[0].".".$file_array[1];
$path=dirname(dirname(__FILE__)).'/vendor1/vendor_pic/'.$_POST["path"].'/'.$file;
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
}
if(!empty($_FILES["file2"]["name"])){
$file_array=explode(".",$_FILES["file2"]["name"]);
$file=$file_array[0].".".$file_array[1];
$path=dirname(dirname(__FILE__)).'/vendor1/vendor_pic/'.$_POST["path"].'/'.$file;
move_uploaded_file($_FILES["file2"]["tmp_name"],$path);
}
if(!empty($_FILES["file3"]["name"])){
$file_array=explode(".",$_FILES["file3"]["name"]);
$file=$file_array[0].".".$file_array[1];
$path=dirname(dirname(__FILE__)).'/vendor1/vendor_pic/'.$_POST["path"].'/'.$file;
move_uploaded_file($_FILES["file3"]["tmp_name"],$path);
}
if(!empty($_FILES["file4"]["name"])){
$file_array=explode(".",$_FILES["file4"]["name"]);
$file=$file_array[0].".".$file_array[1];
$path=dirname(dirname(__FILE__)).'/vendor1/vendor_pic/'.$_POST["path"].'/'.$file;
move_uploaded_file($_FILES["file4"]["tmp_name"],$path);
}

if(!empty($_FILES["file5"]["name"])){
$file_array=explode(".",$_FILES["file5"]["name"]);
$file="ano.jpg";
$path=dirname(dirname(__FILE__)).'/vendor1/vendor_pic/'.$_POST["path"].'/'.$file;
move_uploaded_file($_FILES["file5"]["tmp_name"],$path);
}

echo ("<script type='text/javascript'> alert('上傳成功');</script>");
echo '<script>window.close();</script>'; 

}
?>