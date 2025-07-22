<?php
if(empty($_FILES["file1"]["name"])){
echo ("<script type='text/javascript'> alert('請上傳文件');</script>");
echo '<script>location.href="upload.php"</script>'; 
exit;
}
if(!empty($_FILES["file1"]["name"])){
$file_array=explode(".",$_FILES["file1"]["name"]);
$file="price.".$file_array[1];
$path=$file;
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
}

require_once 'phpExcelReader/Excel/reader.php';  
include ("../config.php");
//open database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

//建立excel檔的物件

$data = new Spreadsheet_Excel_Reader();  

//設定輸出編碼，指的是從excel讀取後再進行編碼

$data->setOutputEncoding('UTF-8');  

//載入要讀取的檔案

$data->read('price.xls');  

//這行可加可不加，因為有時候會出現錯誤，錯誤的原因是因為可能在excel的表格內含有空白

error_reporting(E_ALL ^ E_NOTICE);  

//以下則是以迴圈的方式讀取資料

//下面範例則是先讀取欄位再讀取列，因此i代表列的數目，j則代表欄位的數目

      for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {

              for ($j = 1; $j < $data->sheets[0]['numCols']; $j++) { 


                $value[0] = $data->sheets[0]['cells'][$i][1];

            	 $value[1] = $data->sheets[0]['cells'][$i][2];
				 
				  $value[2] = $data->sheets[0]['cells'][$i][3];
				 
				echo	$value[0]."<br>";
		    if($value[0]!=''){		
			$sql= "update product set price =".$value[2]." ,price2=".$value[1]." where product_num ='".$value[0]."'";

				mysql_query($sql);

          }
	}
     }  
	 

echo ("<script type='text/javascript'> alert('更新成功');</script>");


?>