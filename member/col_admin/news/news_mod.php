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
<script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript"  src="../xheditor-1.2.1/xheditor-1.2.1.min.js"></script>
<script type="text/javascript"   src="../xheditor-1.2.1/xheditor_lang/zh-tw.js"></script>
<script type="text/javascript" language="javascript">
function check(){
var reply = confirm('確認資料皆填寫無誤?');
return reply;
}
</script>
<style>
.font{font-size:16px}
</style>   
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
  <style>
    article,aside,figure,figcaption,footer,header,hgroup,menu,nav,section {display:block;}
    body {font: 62.5% "Trebuchet MS", sans-serif; margin: 50px;}
  </style>
<script language="JavaScript">
    $(document).ready(function(){ 
      var opt={dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
               dayNamesMin:["日","一","二","三","四","五","六"],
               monthNames:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
               monthNamesShort:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
               prevText:"上月",
               nextText:"次月",
               weekHeader:"週",
               showMonthAfterYear:true,
               dateFormat:"yy-mm-dd"
               };
      $("#datepicker1").datepicker(opt);
      });
  </script>
<?
include("../config.php");  //包含文件
$id=$_GET["id"];
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM news where id='$id'"; 
$conn=mysql_query($sql); 
$rs=mysql_fetch_array($conn);
?>
<br>
<form action="news_mod_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onsubmit="return check()">
<table width="900dpi" height="200dpi" border="0" cellpadding="0" cellspacing="1"  class="font">
<tr align="center" >
<td colspan="5"></td>
</tr>
<tr>
<td align="right" >照片：</td>
<td align="left" >
<img src="../../news/<?=$rs["photo"]?>" width="198" height="156">
</td>
</tr>
<tr>
<td align="right" >標題：</td>
<td align="left" > <input type="text" name="title"  size=100 value="<?=$rs["title"]?>"> 
</td>
</tr>
<tr>
<td align="right" >產品關聯：</td>
<td align="left" > 
<select name="kind">
<option value="">請選擇</option>
<?php
$sql = "SELECT  *  FROM vendor order by kind asc"; 
$conn=mysql_query($sql); 	
while($row=mysql_fetch_array($conn)){	
?>
<option value="<?=$row['authorized']?>"  <?php if( (int)$rs["kind"]&(int)$row['authorized'] =(int)$row['authorized']) {?>selected="selected" <?php }?>><?=$row["kind"]?></option>
<? } ?>
</select> 
</td>
</tr>
<tr>
<td align="right" >分類：</td>
<td align="left" > 
<select name="parts">
<option value="0">媒體報導</option>
<option value="1"  <?php if($rs["parts"]==1){?>selected="selected" <?php }?>>活動公告</option>
<option value="2"  <?php if($rs["parts"]==2){?>selected="selected" <?php }?>>最新消息</option>
<option value="3"  <?php if($rs["parts"]==3){?>selected="selected" <?php }?>>影片</option>

</select>

</td>
</tr>
<tr>
<td align="right" >日期：</td>
<td align="left" > 
<input id="datepicker1" type="text" name="date"  value="<?=$rs["upload_time"]?>" size="50"/>
</td>
</tr>
<tr>
<td align="right" >內容：</td>
<td align="left" ><textarea name="content"  class="xheditor"  cols="100" rows="30"><?=$rs["content"]?></textarea>
</td>
</tr>
<tr>
<td align="right" >上傳附件：</td>
<td align="left" >
<input type="file"  name="file1" /> 
</td>
</tr>

<tr align="center">
<td colspan="2">
<center>
<input type="submit" name="Submit" value="提交">　　
<input type="reset" name="Submit" value="重置">
<input type="hidden"  name="id" value="<?=$id?>">
</center>
</td>
</tr>
</table>
</form> 
<p><font size="2"><a href="news_list.php">上一頁</a></font></p>
</center>              
</body>
</html>
