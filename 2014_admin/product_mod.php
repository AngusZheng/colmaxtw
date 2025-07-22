<html>
<head>
<title>歌美斯(青岛)自行车商贸有限公司</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/back.css" />
</head>
<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript"  src="xheditor-1.2.1/xheditor-1.2.1.min.js"></script>
<script type="text/javascript"   src="xheditor-1.2.1/xheditor_lang/zh-tw.js"></script>
<script type="text/javascript" language="javascript">
function check(){
var reply = confirm('確認資料皆填寫無誤?');
return reply;
}
</script>
<script type="text/javascript">
function changeSrc(filePicker)
{
var tempObj=document.createElement("img");
tempObj.style.border=0;
tempObj.style.displaly="none";
tempObj.src = filePicker.value;
filePicker.parentNode.appendChild(tempObj);
        var limit  =100;//圖片限制大小
        if (tempObj.fileSize > limit*1024)
           {    
            filePicker.parentNode.removeChild(tempObj);
            alert("抱歉，您選定的檔案太大,請壓縮後上傳");
            }
        else
        {
        tempObj.style.display="block";
        }

}
    
</script>
<script>  
 $(document).ready(function(){  
   $('#myParentSelect').change(function(){  
      //更動第一層時第二層清空
     $('#myFirstChildSelect').empty().append("<option value=''>請選擇</option>"); 
	 $('#myFirstChildSelect2').empty().append("<option value=''>請選擇</option>"); 
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
	   $('#myFirstChildSelect2').val($('option:first').val());//pseudo selector 
      }
      //依據第一層回傳的值去改變第二層的內容
      while(i<result.length){  
      $("#myFirstChildSelect").append("<option value='"+result[i]['id']+"'>"+result[i]['kind_name']+"</option>");  
	  $("#myFirstChildSelect2").append("<option value='"+result[i]['id']+"'>"+result[i]['kind_name']+"</option>");  
      i++;  
     }  
     },  
     error:  function(error){  
       alert("error");  
     }  
   });   
   });  
 }); 
 
  $(document).ready(function(){  
   $('#myFirstChildSelect').change(function(){  
      //更動第一層時第二層清空
     $('#mySecondChildSelect').empty().append("<option value=''>請選擇</option>");  
     var i=0;  
     $.ajax({  
     type:    "GET",  
     url:     "action2.php",  
     data:    {lv:$('#myFirstChildSelect option:selected').val()},  
     datatype:  "json",  
     success: function(result){  
     //當第一層回到預設值時，第二層回到預設位置
     if(result == ""){  
       $('#mySecondChildSelect').val($('option:first').val());//pseudo selector   
      }
      //依據第一層回傳的值去改變第二層的內容
      while(i<result.length){  
      $("#mySecondChildSelect").append("<option value='"+result[i]['id']+"'>"+result[i]['kind_name']+"</option>");  
      i++;  
     }  
     },  
     error:  function(error){  
       alert("error");  
     }  
   });   
   });  
 }); 
  
   $(document).ready(function(){  
   $('#myFirstChildSelect2').change(function(){  
      //更動第一層時第二層清空
     $('#mySecondChildSelect2').empty().append("<option value=''>請選擇</option>");  
     var i=0;  
     $.ajax({  
     type:    "GET",  
     url:     "action2.php",  
     data:    {lv:$('#myFirstChildSelect2 option:selected').val()},  
     datatype:  "json",  
     success: function(result){  
     //當第一層回到預設值時，第二層回到預設位置
     if(result == ""){  
       $('#mySecondChildSelect2').val($('option:first').val());//pseudo selector   
      }
      //依據第一層回傳的值去改變第二層的內容
      while(i<result.length){  
      $("#mySecondChildSelect2").append("<option value='"+result[i]['id']+"'>"+result[i]['kind_name']+"</option>");  
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
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (page.psd) -->
<?
include("config.php");  //包含文件
$id=$_GET["id"];
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM product where id='$id'"; 
$conn=mysql_query($sql); 
$rs=mysql_fetch_array($conn);
?>
<form action="product_mod_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onSubmit="return check()">
<table width="1100" height="479" border="0" align="center" cellpadding="0" cellspacing="0" id="___01">
	<tr>
		<td colspan="2" align="center" bgcolor="#FFFFFF" height="42">&nbsp;</td>
	</tr>
    
    <tr>
           <td align="center">
           <table width="71%" border="0" cellpadding="5" cellspacing="0" id="ta01">
           <tr>
                 <td colspan="3" align="center" valign="middle" style="font-size:14pt; ">修改產品<br>
                 </p></td>
         </tr>
               <tr>
                 <td width="21%" align="right">中文名：</td>
                 <td width="49%"><input name="ch_name" size="35" value="<?=$rs["ch_name"]?>" type="text" style="font-size:14px;">/<input name="new_num" size="5" value="<?=$rs["new_num"]?>" type="text" style="font-size:14px;"></td>
                 <td width="5%" >顯示主要圖片：</td>
                 
               </tr>
               <tr>
                 <td align="right">英文名：</td>
                 <td><input name="eng_name" size="35" value="<?=$rs["eng_name"]?>" type="text" style="font-size:14px;"></td>
                 <td colspan="1" rowspan="4" align="center"> <div id="add01">
                        <div id="addpic"><img src="http://www.colmax.com.tw/vendor1/vendor_pic/<?=$rs["vendor"]."-".$rs["pic1"]?>/<?=$rs["pic2"]?>" width="153" height="140"></div></div>
                   </div></td>
               </tr>
               <tr>
                 <td align="right">品牌：</td>
                 <td>
 
<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT distinct vender FROM link "; 
$sql.= " WHERE vender!='' and del = 0";
$conn=mysql_query($sql); 	
?>
<select name="vendor" id="myParentSelect">
<option value="">請選擇</option>
<?
while($row=mysql_fetch_array($conn)){
if($row["vender"]==$rs["vendor"])
$selected="selected";
else
$selected="";	
echo '<option value="'.$row["vender"].'"'.$selected.'>'.$row["vender"].'</option>';
}
?>
</select> 
                 </td>
               </tr>
               <tr>
                 <td align="right">分類：</td>
                 <td>

<select name="kind" id="myFirstChildSelect">
<option value="">請選擇</option>
<?
$sql = "SELECT  *  FROM kind where del = 0 and vendor = '".$rs["vendor"]."' and (top is null or top='')"; 
$con=mysql_query($sql); 

while($row=mysql_fetch_array($con)){
if($row["id"]==$rs["kind"])
$selected="selected";
else
$selected="";		
echo '<option value="'.$row["id"].'"'.$selected.'>'.$row["kind_name"].'</option>';
}
?>
</select>

<select name="kind2" id="mySecondChildSelect">
<option value="">請選擇</option>
<?
$sql = "SELECT  *  FROM kind where del = 0 and vendor = '".$rs["vendor"]."' and (top is not null or top!='')"; 
$con=mysql_query($sql); 

while($row=mysql_fetch_array($con)){
if($row["id"]==$rs["kind2"])
$selected="selected";
else
$selected="";		
echo '<option value="'.$row["id"].'"'.$selected.'>'.$row["kind_name"].'</option>';
}
?>
</select>不連結:<input type="checkbox" name="notlink" value=1 <?php if($rs["notlink"]==1){ ?>checked<? } ?>>
                
                 </td>
               </tr>
               
               <tr>
                 <td align="right">分類2：</td>
                 <td>

<select name="kind3" id="myFirstChildSelect2">
<option value="">請選擇</option>
<?
$sql = "SELECT  *  FROM kind where del = 0 and vendor = '".$rs["vendor"]."' and (top is null or top='')"; 
$con=mysql_query($sql); 

while($row=mysql_fetch_array($con)){
if($row["id"]==$rs["kind3"])
$selected="selected";
else
$selected="";		
echo '<option value="'.$row["id"].'"'.$selected.'>'.$row["kind_name"].'</option>';
}
?>
</select>

<select name="kind4" id="mySecondChildSelect2">
<option value="">請選擇</option>
<?
$sql = "SELECT  *  FROM kind where del = 0 and vendor = '".$rs["vendor"]."' and (top is not null or top!='')"; 
$con=mysql_query($sql); 

while($row=mysql_fetch_array($con)){
if($row["id"]==$rs["kind4"])
$selected="selected";
else
$selected="";		
echo '<option value="'.$row["id"].'"'.$selected.'>'.$row["kind_name"].'</option>';
}
?>
</select>
                 </td>
               </tr>
               <tr>
                 <td height="33" align="right">上傳主要圖片：<BR><font size="-1">(以W400＊H295比例為佳)</font></td>
                 <td >
       <input type="file" name="pic2" size="20" style="height:20xp;">
    </td>
               </tr>
               <tr>
                 <td colspan="3">文字編輯列<br>
                 1.
                   <textarea name="content"   class="xheditor" cols="130" rows="10"><?=$rs["content"]?></textarea><br><br><br>
                   2.
                    <textarea name="content2"   class="xheditor" cols="130" rows="10"><?=$rs["content2"]?></textarea>
                   </td>
               </tr>
               <tr>
                 <td height="39" colspan="3"><center>
                  <input name="id" type="hidden" value="<?=$rs["id"]?>">
                 <input name="pic2_name" type="hidden" value="<?=$rs["pic2"]?>">
                 <input name="pic1" type="hidden" value="<?=$rs["pic1"]?>">
                 <input name="Submit" value="提交" type="submit" id="but01">&nbsp;&nbsp;&nbsp;&nbsp;
                 <input name="Submit" value="重置" type="reset" id="but01">
                 
                 </center></td>
               </tr>

           </table></td>
    </tr>
    
    
</table>
</form>
<!-- End Save for Web Slices -->
</body>
</html>