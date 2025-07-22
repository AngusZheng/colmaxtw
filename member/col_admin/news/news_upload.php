<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>
<script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript"  src="../xheditor-1.2.1/xheditor-1.2.1.min.js"></script>
<script type="text/javascript"   src="../xheditor-1.2.1/xheditor_lang/zh-tw.js"></script>

<script type="text/javascript" language="javascript">
function check(){
var reply = confirm('確認上傳？');
return reply;
}
</script>
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
<body>
<? include ("../config.php");?>
<form action="news_cl.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data" onsubmit="return check()">
<table width="100%"  border="1" cellpadding="0" cellspacing="1"   align="center">

<caption>最新消息上傳</caption>
<tr >
<td  width="10%"><input type="file" name="file1"></td>
<td width="90%">
標題：<input type="text" name="title_1" size=50>
產品關聯：
<select name="kind1">
<option value="">請選擇</option>
<?php
include ("../config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT  *  FROM vendor order by kind asc"; 
$conn=mysql_query($sql); 	
while($row=mysql_fetch_array($conn)){	
?>
<option value="<?=$row['authorized']?>"  <?php if( (int)$_POST["kind"]&(int)$row['authorized'] =(int)$row['authorized']) {?>selected="selected" <?php }?>><?=$row["kind"]?></option>
<? } ?>
</select>
分類：
<select name="parts1">
<option value="0">媒體報導</option>
<option value="1"  <?php if($row["parts"]==1){?>selected="selected" <?php }?>>活動公告</option>
<option value="2"  <?php if($row["parts"]==2){?>selected="selected" <?php }?>>最新消息</option>
<option value="3"  <?php if($row["parts"]==3){?>selected="selected" <?php }?>>影片</option>

</select>
日期：  <input id="datepicker1" type="text" name="date" />
</td>

<tr >
<td  colspan="2">
內容：<textarea name="content1"   class="xheditor" cols="100" rows="30"></textarea>
</td>
</tr>

<tr>
<td colspan="2">
<center>
<input type="submit" name="Submit" value="提交">　　
<input type="reset" name="Submit" value="重置"></center></td>
</tr>
</table>
</form>
<p align="center"><font size="2"><a href="news_list.php">上一頁</a></font></p>
</body>
</html>