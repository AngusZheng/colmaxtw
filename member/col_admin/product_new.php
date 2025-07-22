<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML news_list 1.2//EN" "http://www.opennews_listalliance.org/tech/DTD/xhtml-news_list12.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>歌美斯後台管理系統</title>
<head>
</head>
<body>
<title></title>
<center>
<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript">
function check(){
var reply = confirm('確認資料皆填寫無誤?');
return reply;
}
</script>
<style>
.font{font-size:16px}
</style>   

<?
include("config.php");  //包含文件
?>
<br>
<form action="product_new_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onsubmit="return check()">
<table width="900dpi" height="200dpi" border="0" cellpadding="0" cellspacing="1">
<caption>新增產品</caption>
<tr>
<td align="right" >品號：</td>
<td align="left">
 <input type="text" name="product_num"  size=100 value=""> 
</td>
</tr>
<tr>
<td align="right">品名：</td>
<td align="left"> <input type="text" name="product_name"  size=100 value=""> 
</td>
</tr>
<tr>
<td align="right">規格：</td>
<td align="left"> <input type="text" name="spec"  size=100 value=""> 
</td>
</tr>
<tr>
<td align="right">品牌：</td>
<td align="left"> 
<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT  *  FROM vendor order by kind asc"; 
$conn=mysql_query($sql); 	
?>
<select name="kinds1" id="select">
<option value="">請選擇</option>
<?
while($row=mysql_fetch_array($conn)){	
echo '<option value="'.$row["kind"].'"'.$selected.'>'.$row["kind"].'</option>';
}
?>
</select> 
</td>
</tr>
<tr>
<td align="right" >分類：</td>
<td align="left" > 
<select name="kinds2"  id="select2">
</select> 
<script>  
 $(document).ready(function(){  
   $('#select').change(function(){  
      //更動第一層時第二層清空
     $('#select2').empty().append("<option value=''>請選擇</option>");  
     var i=0;  
     $.ajax({  
     type:    "GET",  
     url:     "action2.php",  
     data:    {lv:$('#select option:selected').val()},  
     datatype:  "json",  
     success: function(result){  
     //當第一層回到預設值時，第二層回到預設位置
     if(result == ""){  
       $('#select2').val($('option:first').val());//pseudo selector   
      }
      //依據第一層回傳的值去改變第二層的內容
      while(i<result.length){  
      $("#select2").append("<option value='"+result[i]['kind_name']+"'>"+result[i]['kind_name']+"</option>");  
      i++;  
     }  
     },  
     error:  function(error){  
       alert("error");  
     }  
   });   
   });  
 }); 
 </script>  
</td>
</tr>
<tr>
<td align="right" >批發價：</td>
<td align="left" >$<input type="text" name="price2"  size=10 value=""> 
/零售價：
$<input type="text" name="price"  size=10 value=""> 
</td>
</tr>
<tr>
<td align="right" >上傳圖片：</td>
<td align="left" >
<input type="file"  name="file1" /> 
</td>
</tr>

<tr align="center">
<td colspan="2">
<center>
<input type="submit" name="Submit" value="提交">　　
<input type="reset" name="Submit" value="重置">
</center>
</td>
</tr>
</table>
</form> 
</center>              
</body>
</html>
