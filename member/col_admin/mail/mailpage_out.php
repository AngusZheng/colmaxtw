<?php
session_start(); //要??SESSION，看是不是管理?
ob_start();
header("Cache-control:private");
if($_SESSION["admin"]=="yd631"){
?>
<p><font size="2"><a href="javascript:window.history.back(-1)">上一頁</a></font></p>
<input type="button" onClick="window.location='sendout.php??hide2=<?=$hide2?>&hide9=<?=$hide9?>&user=<?=$user?>&fgprice=<?=$fgprice?>&id=<?=$id?>'" value="發送此期">

<?
}
if($id==0)
{
echo ("<script type='text/javascript'>window.history.go(-1);</script>");
exit;
}
include("../config_mb.php"); //包含文件
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

$sql="SELECT * from mail where id = $id";
$result=mysql_query($sql);
$row = mysql_fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
<div data-type="background" class="news-background" align="center" style="background-color: #FFF; width: 100%;">
<br><br><table border="0" cellpadding="0" cellspacing="0" width="600" style="width:600px;"><tbody><tr>
<td align="left" valign="top">
<div data-type="base" class="news-base" style="background-color:#9BCD9B; color: #1F4858; font-family: 微軟正黑體; font-size: 15px; padding: 10px;">
<!-- top start here -->
<div class="top-image" style="border: 2px solid #FFF; line-height: 0;">
<a href="http://www.chyunn.com.tw/">
<img alt="" border="0" caption=""  hspace="0" src="http://www.dokin.tw/mail/logo.gif" vspace="0" width="315" height="52">
<img alt="" border="0" caption=""  hspace="0" src="http://www.dokin.tw/mail/phone.gif" vspace="0" width="315" height="52"><br>
<img src="http://www.dokin.tw/mail/log.jpg"  hspace="0" width="830" height="202"  vspace="0"></a>
</div>
<div data-type="extra1" class="news-extra1" style="background-color: rgb(49, 131, 135); color: rgb(255, 255, 255); font-size: 13px; padding: 0 5px;">
<strong><span style="">群運環保電子報 第<?=$row["id"]?>期</span></strong>
</div>
<!-- top end here -->
<!-- content start here -->
<div data-type="article-odd" class="news-article news-article-odd" style="background: #E5EEEE; margin: 10px 0px; padding: 10px; border: 1px solid #CCC;">
<h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
</h3>
<div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">
<table width="800" height="167" border=0 cellpadding=2 cellspacing=0>
<td align="center"><img src="http://www.dokin.tw/mail/photo/<?=$row["good"]?>"  hspace="0" alt="每周好料報報" title="每周好料報報"  vspace="0">
</td></table>
</div>
</div>


<div data-type="article-odd" class="news-article news-article-odd" style="background: #E5EEEE; margin: 10px 0px; padding: 10px; border: 1px solid #CCC;">
<h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
環保新法規
</h3>
<div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">		
</div>
1.<a href="<?=$row["law1_connect"]?>"><? echo $row["law1"];?></a><br />
<?php if(!empty($row["law2"])) {?>2.<a href="<?=$row["law2_connect"]?>"><? echo $row["law2"]; ?> </a><br /><? }?>
<?php if(!empty($row["law3"])) {?>3.<a href="<?=$row["law3_connect"]?>"><? echo $row["law3"];?></a><? }?>
</div>

<div data-type="article-even" class="news-article news-article-even" style="background-color: #E5EEEE; background: #FFF; margin: 10px 0px; padding: 10px;">
<h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
環保新知
</h3>
<div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">

</div>
<? echo stripslashes($row["new_knows"]);?>
</div>


<div data-type="article-even" class="news-article news-article-even" style="background-color: #E5EEEE; background: #FFF; margin: 10px 0px; padding: 10px;">
<h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
好站連結
</h3>
<div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">

</div>
<a href="http://www.epa.gov.tw/">行政院環保署</a> <a href="http://www.seety.com.tw/">新城視雜誌</a>
</div>


<!-- content end here -->
<div align="center" style="font-size: 10px; padding: 10px 0;">

<p>台南總公司：台南市安南區安明路四段100號　客服專線 06-2575589<br>
嘉義營業所：60858嘉義縣水上鄉國姓村三界埔104之4號　客服專線 05-2307789<br>
高雄分公司：83156高雄市大寮區內坑路136之1號1樓　客服專線 07-7825580　客服專線 07-7963960</p>

</div>
</div>
<!-- news-base -->
</td>
</tr></tbody></table>
<br><br>
</div>

</hml>
<? ob_end_flush(); ?>