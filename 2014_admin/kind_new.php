<?
include("config.php"); //包含文件
set_time_limit(0);

?>
<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
function selAll(id){
//變數checkItem為checkbox的集合
var checkItem = document.getElementsByName(id);
for(var i=0;i<checkItem.length;i++){
checkItem[i].checked=true; 
}}
function unselAll(id){
//變數checkItem為checkbox的集合
var checkItem = document.getElementsByName(id);
for(var i=0;i<checkItem.length;i++){
checkItem[i].checked=false;
}}

function check(){
var reply = confirm('確認資料皆填寫無誤?');
return reply;
}
</script>
<script>  
 $(document).ready(function(){  
   $('#myParentSelect').change(function(){  
      //更動第一層時第二層清空
     $('#myFirstChildSelect').empty().append("<option value=''>請選擇</option>");  
     var i=0;  
     $.ajax({  
     type:    "GET",  
     url:     "action.php",  
     data:    {lv:$('#myParentSelect option:selected').val()},  
     datatype:  "json",  
     success: function(result){  
     //當第一層回到預設值時，第二層回到預設位置
     if(result == ""){  
       $('#myFirstChildSelect').val($('option:first').val());//pseudo selector   
      }
      //依據第一層回傳的值去改變第二層的內容
      while(i<result.length){  
      $("#myFirstChildSelect").append("<option value='"+result[i]['id']+"'>"+result[i]['kind_name']+"</option>");  
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
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML product 1.2//EN" "http://www.openproductalliance.org/tech/DTD/xhtml-product12.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title></title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<title></title>
</head>
<body>
</body>
</head>
</div>	
</div>	
<center>
<h1>新增商品分類</h1>	
<table width="500px" height="50px"  border="1" cellpadding="0" cellspacing="1">
<form name="form2" method="post" action="kind_new_cl.php" onsubmit="return check()">
<tr>
<td align="left" width="15%">
分類名稱:
</td>
<td align="left">
<input type="text" name="kind_name" value="">
</td>
</tr>
<tr>
<td align="left">
所屬品牌:
</td>
<td align="left">
<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT distinct vender FROM link "; 
$sql.= " WHERE 1 and del = 0";
$conn=mysql_query($sql); 	
?>
<select name="vendor" id="myParentSelect">
<option value="">請選擇</option>
<?
while($row=mysql_fetch_array($conn)){	
echo '<option value="'.$row["vender"].'"'.$selected.'>'.$row["vender"].'</option>';
}
?>
</select> 
</td>
</tr>
<tr>
<td align="left">
上層:
</td>
<td align="left">
<select name="top"  id="myFirstChildSelect">
</select> 
</td>
</tr>
<tr align="center" bgcolor="#CCCCCC">
<td colspan="2" align="center">  
<center>
<input type="submit" name="Submit" value="提交">　　
<input type="reset" name="Submit" value="重置">
</center>
</td>
</tr>
</form>
</table>
</center>
</body>
</html>
