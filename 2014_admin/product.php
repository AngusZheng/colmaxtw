<html>
<head>
<title>歌美斯(青岛)自行车商贸有限公司</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/back.css" />
</head>
<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script>
function send(){
      document.getElementById('form2').submit();
}
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (page.psd) -->

<table width="1100" height="371" border="0" align="center" cellpadding="0" cellspacing="0" id="___01">
	<tr valign="top">
	  <td height="20" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
	<tr>
		<td align="left" bgcolor="#FFFFFF" height="26"><input value="新增產品" onClick="window.location='product_new.php'" type="button" style="border:1px solid #ccc; font-size:13pt;"> 
        
        <input type="button" onClick="send();"  value="修改排序" style="border:1px solid #ccc; font-size:13pt;"></td>
	</tr>
    
    <tr align="center">
      <td height="84">
<?php
include ("config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT distinct vender FROM link "; 
$sql.= " WHERE 1 and del = 0 and vender!=''";
$conn=mysql_query($sql); 	
?>
<form name="form1" method="post">
<select name="vendor" id="myParentSelect">
<option value="">請選擇</option>
<?
while($row=mysql_fetch_array($conn)){	

if($row["vender"]==$_POST["vendor"])
$selected="selected";
else
$selected="";	
echo '<option value="'.$row["vender"].'"'.$selected.'>'.$row["vender"].'</option>';
}
?>
</select> 

<select name="kind"  id="myFirstChildSelect">
</select> 
<select name="kind2"  id="mySecondChildSelect">
</select> 
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
 </script>  
 <input name="Submit" value="搜尋" type="submit" id="but01">
</form>
</td>
    </tr>
    <tr valign="top">
           <td><p>&nbsp;</p>
             <table width="100%" border="0"  cellpadding="7" cellspacing="0"  id="ta01">
             <tr bgcolor="#f0f0f0">
               <td width="5%" align="center">排序</td>
               <td width="15%" align="center">產品中文</td>
               <td width="15%" align="center">產品英文</td>
               <td width="14%" align="center">品牌</td>
               <td width="15%" align="center">分類</td>
                <td width="15%" align="center">分類2</td>
                  <td width="15%" align="center">分類3</td>
                <td width="15%" align="center">分類4</td>
               <td width="21%" align="center">圖片資料夾</td>
               <td width="5%" align="center">修改</td>
               <td width="5%" align="center">刪除</td>
             </tr>
             <tr>
 <form action="product_cl.php" method="post" name="form2" id="form2" >         
<?php
$sql = "SELECT * FROM product "; 
$sql.= " WHERE 1 and del = 0";
if($_POST["vendor"])
$sql.=" and vendor ='".$_POST["vendor"]."'";
if($_POST["kind"])
$sql.=" and (kind ='".$_POST["kind"]."'  or kind3 ='".$_POST["kind"]."') ";
if($_POST["kind2"])
$sql.=" and (kind2 ='".$_POST["kind2"]."'  or kind4 ='".$_POST["kind2"]."')";

$sql.=" order by new_num desc";
$conn=mysql_query($sql); 	
while($rs=mysql_fetch_array($conn)){	
$s=$s+1;
?>
               <td><input type="text" name="new_num[]" value="<?=$rs["new_num"]?>"></td>
               <td><?=mb_substr($rs["ch_name"],0,30,'utf-8')?></td>
               <td><?=mb_substr($rs["eng_name"],0,30,'utf-8')?></td>
               <td><?=mb_substr($rs["vendor"],0,30,'utf-8')?></td>
               <td><?=kind($rs["kind"])?></td>
               <td><?=kind($rs["kind2"])?></td>
                <td><?=kind($rs["kind3"])?></td>
               <td><?=kind($rs["kind4"])?></td>
               <td><a href="" onClick="window.open('photo.php?path=<?=$rs["vendor"]."-".$rs["pic1"]?>', '', config='height=768,width=1024')"><?=$rs["vendor"]."-".$rs["pic1"]?></a></td>
               <td align="center"><a href="product_mod.php?id=<?=$rs["id"]?>">修改</a></td>
               <td align="center"><a href="product_mod_cl.php?id=<?=$rs["id"];?>&delete=1" onClick="return confirm('要刪除?');">刪除</a></td>
             </tr>
             	<input type="hidden" name="id[]"  value="<?=$rs["id"]?>">
             <? } ?>
           </table></td>
    </tr>
    
 </form>  
</table>
<?php
mysql_close();
exit;
?>
</center>
<? 
function kind($id)
{
$sql = "SELECT * FROM kind "; 
$sql.= " WHERE 1 and del = 0 and id =".$id;
$conn=mysql_query($sql); 	
$rs=mysql_fetch_array($conn);
return $rs["kind_name"];
}
?>
<!-- End Save for Web Slices -->
</body>
</html>