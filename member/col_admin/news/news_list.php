<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML news_list 1.2//EN" "http://www.opennews_listalliance.org/tech/DTD/xhtml-news_list12.dtd">
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
<link rel="stylesheet" href="css/table.css" type="text/css" media="screen" />
<input type="button"  value="新增"  onClick="window.location='news_upload.php'">
<form action="news_list.php" method="post" name="form1" id="form1" >
<select name="kind" onchange="submit();">
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
<select name="parts" onchange="submit();">
<option value="">請選擇</option>
<option value="0" <?php if((int)$_POST["parts"]==0 and $_POST["parts"]!="" ){?>selected="selected" <?php }?>>媒體報導</option>
<option value="1"  <?php if((int)$_POST["parts"]==1){?>selected="selected" <?php }?>>活動公告</option>
<option value="2"  <?php if((int)$_POST["parts"]==2){?>selected="selected" <?php }?>>最新消息</option>
<option value="3"  <?php if((int)$_POST["parts"]==3){?>selected="selected" <?php }?>>影片</option>
</select>
</form>
<center>
<?php 

if(!isset($_GET["page"])){
$page=1; //設定起始頁
//isset 在此是判斷後方參數是否存在            
} else {
$page = intval($_GET["page"]); //確認頁數只能夠是數值資料                 

}
$items=$i; //取得總項數,以便算出分頁須幾頁    
$per = 10; //設定每頁顯示項目數量
$pages = ceil($items/$per); //計算總頁數
$start = ($page-1)*$per; //每頁起始資料序號,以便分次藉由sql語法去取得資料      
?>
<table width="700dpi" height=""  border="1" cellpadding="0" cellspacing="1">
<td width="40%" bgcolor="#E0FFFF"  align="center">圖片</td>
<td width="20%" bgcolor="#E0FFFF"  align="center">標題</td>
<td width="20%" bgcolor="#E0FFFF"  align="center">分類</td>
<td width="10%" bgcolor="#E0FFFF"  align="center"><center>修改</center></td>
<td width="10%" bgcolor="#E0FFFF"  align="center"><center>刪除</center></td>

<?php
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM news WHERE 1 "; 
if($_POST["kind"]!="")
$sql.=" and kind = '".$_POST["kind"]."'";
if($_POST["parts"]!="")
$sql.=" and parts = '".$_POST["parts"]."'";

if($_POST["parts"]!="" and $_POST["parts"]==0)
$sql.=" and parts = '".$_POST["parts"]."'";
							  
$sql.= " and del = 0 ";
$conn=mysql_query($sql); 	
?>	   

<?php
while($rs=mysql_fetch_array($conn)){	
$s=$s+1;
if($rs["parts"]==0)
$parts="媒體報導";
else if($rs["parts"]==1)
$parts = "活動公告";
else if($rs["parts"]==2)
$parts="最新消息";
else if($rs["parts"]==3)
$parts="影片";

?>
<tr align="left" >
<td><img src="../../news/<?=$rs["photo"]?>" width="198" height="156"></td>
<td><?=$rs["title"]?></td>
<td><?=$parts?></td>
<td  align="center"><center><a href="news_mod.php?id=<?=$rs["id"];?>"><input type="button" value="修改"></a></center></td>
<td  align="center"><center><a href="news_mod_cl.php?id=<?=$rs["id"];?>&delete=1" onclick="return confirm('要刪除?');"><input type="button" value="刪除"></a></center></td>
<? } ?>
 </table>

<?php
mysql_close();
exit;
?>
</center>

</body>
</html>