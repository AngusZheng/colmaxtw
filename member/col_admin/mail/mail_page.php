<?php
session_start(); //要??SESSION，看是不是管理?
header("Cache-control:private");
if($_SESSION["admin"]!="yd631"){
	echo "<script>location.href='../index.php';</script>";
    exit;
}
if($_SESSION["mail_rule"]==0){
	echo "<script> alert('您無權限進入此頁');history.go(-1);</script>";
    exit;
}

include("config.php"); //包含文件
?>
<center>
<form name="form"  method="post" action="mailpage_out.php" class="style2">
查看 <select name='id' id='id' onChange="submit()">
  <option value="0">請選擇</option>
	  <?php
	   $db=mysql_connect($servername,$sqlservername,$sqlserverpws);
		 mysql_query("SET NAMES 'big5'",$db);
		 mysql_select_db($sqlname,$db);
	   $sql = "SELECT *  FROM mail";
	$tafno=mysql_query($sql);
	while($row=mysql_fetch_array($tafno)){
		 echo '<option value="'.$row["id"].'">'.$row["id"].'</option>';
		}
		?>
		</select> 期電子報

</form>
</center>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<script src="../jquery-validation-1.10.0/lib/jquery-1.7.2.js" type="text/javascript"></script>
<script src="../jquery-validation-1.10.0/dist/jquery.validate.js" type="text/javascript"></script>
<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.validationEngine-zh_TW.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/jQuery.jGlideMenu.067.js"></script>
<script type="text/javascript"  src="xheditor-1.2.1/xheditor-1.2.1.min.js"></script>
<script type="text/javascript"   src="xheditor-1.2.1/xheditor_lang/en.js"></script>

<link rel="stylesheet" media="screen" type="text/css" href="validationEngine.jquery.css" />
<script>
jQuery(document).ready(function(){
	// binds form submission and fields to the validation engine
	jQuery("#form1").validationEngine();
});
</script>
<script type="text/javascript" language="javascript">		
function check(){
var reply = confirm('確認資料皆填寫無誤?');
return reply;
}		
		
</script>
<div data-type="background" class="news-background" align="center" style="background-color: rgb(222, 232, 230);">
<table border="0" cellpadding="0" cellspacing="0" width="760"><tbody><tr>
<td align="left" valign="top">
<div data-type="base" class="news-base" style="background-color: rgb(165, 196, 197); color: #1F4858; font-family: '微軟正黑體'; font-size: 15px; padding: 10px; width:860px;"> 
      <!-- top start here -->
      <div class="top-image" style="border: 2px solid #FFF; line-height: 0;">
       <a href="http://www.chyunn.com.tw/">
<img src="http://www.dokin.tw/mail/logo.gif" width="315" height="52">
<img alt="" border="0" caption=""  hspace="0" src="http://www.dokin.tw/mail/phone.gif" vspace="0" width="315" height="52"><br>
<img src="http://www.dokin.tw/mail/log.jpg" width="860" height="202" alt="專業的事 交給專業" title="專業的事 交給專業"></a>
</div>
      <div data-type="extra1" class="news-extra1" style="background-color: rgb(49, 131, 135); color: rgb(255, 255, 255); font-size: 13px; padding: 0 5px;">
        <strong><span style="">群運環保電子報</span></strong>
      </div>
      <!-- top end here -->
      <!-- content start here -->
      <div data-type="article-odd" class="news-article news-article-odd" style="background: #E5EEEE; margin: 10px 0px; padding: 10px; border: 1px solid #CCC;"> 
        <h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
        </h3>
        <div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">
		<form name="form1" id="form1" method="post" action="mail.php" class="style2" enctype="multipart/form-data"  onsubmit="return check()">
        <table width="800" height="167" border=0 cellpadding=2 cellspacing=0>
		
<td>每周好料報報:<input type="file" id="good" name="good"></td>
 <td>廣告版:<input type="file" id="ad" name="ad"></td></table>
        <div data-type="article-odd" class="news-article news-article-odd" style="background: #E5EEEE; margin: 10px 0px; padding: 10px; border: 1px solid #CCC;">
        <h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
          環保新法規
        </h3>
        <div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">
</div>
1.<input type="text" id="law1" name="law1" size="40">連結:<input type="text" id="law1_connect" name="law1_connect" size="60"><br/>
2.<input type="text" id="law2" name="law2" size="40" >連結:<input type="text" id="law2_connect" name="law2_connect" size="60"><br/>
3.<input type="text" id="law3" name="law3" size="40" >連結:<input type="text" id="law3_connect" name="law3_connect" size="60">
      </div>

      <div data-type="article-even" class="news-article news-article-even" style="background-color: rgb(229, 238, 238); background: #FFF; margin: 10px 0px; padding: 10px;">
        <h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
          環保新知
        </h3>
        <div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">
       
</div>
   <textarea name="new_knows" id="new_knows"  class="xheditor" rows="10" cols="100"></textarea>
      </div>


<div data-type="article-even" class="news-article news-article-even" style="background-color: rgb(229, 238, 238); background: #FFF; margin: 10px 0px; padding: 10px;">
        <h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
          好站連結
        </h3>
        <div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">

</div>
<a href="http://www.epa.gov.tw/">行政院環保署</a> <a href="http://www.seety.com.tw/">新城視雜誌</a>
      </div>
<div align="center">

<input type="submit" name="Submit" value="產生電子報">　　
<input type="reset" name="Submit" value="重置">
<input type="hidden"  name="user" value="<?=$user?>">
<input type="hidden"  name="hide2" value="<?=$hide2?>">
<input type="hidden"  name="hide9" value="<?=$hide9?>">
<input type="hidden"  name="fgprice" value="<?=$fgprice?>">
</form>
</div>
<!-- content end here -->
<div align="center" style="font-size: 10px; padding: 10px 0;">

<p>台南總公司：台南市安南區安明路四段100號　客服專線 06-2575589<br>
嘉義營業所：60858嘉義縣水上鄉國姓村三界埔104之4號　客服專線 05-2307789<br>
高雄分公司：83156高雄市大寮區內坑路136之1號1樓　客服專線 07-7825580　客服專線 07-7963960</p>

</div>

<!-- news-base -->
    </td>
    </tr></tbody></table>
<br><br>

</hml>