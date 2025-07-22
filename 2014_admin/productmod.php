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
                 <td width="49%"><input name="ch_name" size="35" value="<?=$rs["ch_name"]?>" type="text" style="font-size:14px;"></td>
                 <td width="5%" >顯示主要圖片：</td>
                 
               </tr>
               <tr>
                 <td align="right">英文名：</td>
                 <td><input name="eng_name" size="35" value="<?=$rs["eng_name"]?>" type="text" style="font-size:14px;"></td>
                 <td colspan="1" rowspan="4" align="center"> <div id="add01">
                        <div id="addpic"><img src="<?=$rs["pic2"]?>" width="153" height="140"></div></div>
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
$sql.= " WHERE 1 and del = 0";
$conn=mysql_query($sql); 	
?>
<select name="vendor" id="select1">
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

<?php
$sql = "SELECT distinct vender FROM link where 1 and del=0"; 
$conn=mysql_query($sql); 	
?>
<select name="kind">
<option value="">請選擇</option>
<?
while($row=mysql_fetch_array($conn)){	

echo '<option value="'.$row["vender"].'" disabled>'.$row["vender"].'</option>';

$sql = "SELECT  *  FROM kind where del = 0 and vendor = '".$row["vender"]."'"; 
$con=mysql_query($sql); 

while($row=mysql_fetch_array($con)){
if($row["id"]==$rs["kind"])
$selected="selected";
else
$selected="";		
echo '<option value="'.$row["id"].'"'.$selected.'>'.$row["kind_name"].'</option>';
}
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
                   <textarea name="content"   class="xheditor" cols="130" rows="30"><?=$rs["content"]?></textarea></td>
               </tr>
               <tr>
                 <td height="39" colspan="3"><center><input name="Submit" value="提交" type="submit" id="but01">&nbsp;&nbsp;&nbsp;&nbsp;
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