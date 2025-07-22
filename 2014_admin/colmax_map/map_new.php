<html>
<head>
<title>歌美斯(青岛)自行车商贸有限公司</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/back.css" />
</head>
<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript">
function check(){
var reply = confirm('確認資料皆填寫無誤?');
return reply;
}
</script>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (page.psd) -->
<?
include("../config.php");  //包含文件
?>
<form action="map_new_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onSubmit="return check()">
<table width="1100" height="479" border="0" align="center" cellpadding="0" cellspacing="0" id="___01">
	<tr>
		<td colspan="2" align="center" bgcolor="#FFFFFF" height="42">&nbsp;</td>
	</tr>
    
    <tr>
           <td align="center">
           <table width="71%" border="0" cellpadding="5" cellspacing="0" id="ta01">
           <tr>
                 <td colspan="3" align="center" valign="middle" style="font-size:14pt; ">新增經銷據點<br>
                 </p></td>
         </tr>
               <tr>
                 <td width="21%" align="right">客戶：</td>
                 <td width="49%"><input name="custname" size="35" value="" type="text" style="font-size:14px;"></td>
               </tr>
               <tr>
                 <td align="right">地址：</td>
                 <td><input name="address" size="35" value="" type="text" style="font-size:14px;"></td>    
               </tr>
               <tr>
                 <td height="33" align="right">電話</td>
                 <td >
                  <input name="tel" size="35" value="" type="text" style="font-size:14px;">
              </td>
                  <tr>
                 <td height="39" colspan="3"><center><input name="Submit" value="提交" type="submit" id="but01">&nbsp;&nbsp;&nbsp;&nbsp;
                 <input name="Submit" value="重置" type="reset" id="but01">
                 </center></td>
               </tr>
           </table></td>
    </tr>
</table>
</form>
</body>
</html>