<?php
session_start(); //�n??SESSION�A�ݬO���O�޲z?
header("Cache-control:private");
if($_SESSION["admin"]!="yd631"){
	echo "<script>location.href='../index.php';</script>";
    exit;
}
if($_SESSION["mail_rule"]==0){
	echo "<script> alert('�z�L�v���i�J����');history.go(-1);</script>";
    exit;
}

include("config.php"); //�]�t���
?>
<center>
<form name="form"  method="post" action="mailpage_out.php" class="style2">
�d�� <select name='id' id='id' onChange="submit()">
  <option value="0">�п��</option>
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
		</select> ���q�l��

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
var reply = confirm('�T�{��ƬҶ�g�L�~?');
return reply;
}		
		
</script>
<div data-type="background" class="news-background" align="center" style="background-color: rgb(222, 232, 230);">
<table border="0" cellpadding="0" cellspacing="0" width="760"><tbody><tr>
<td align="left" valign="top">
<div data-type="base" class="news-base" style="background-color: rgb(165, 196, 197); color: #1F4858; font-family: '�L�n������'; font-size: 15px; padding: 10px; width:860px;"> 
      <!-- top start here -->
      <div class="top-image" style="border: 2px solid #FFF; line-height: 0;">
       <a href="http://www.chyunn.com.tw/">
<img src="http://www.dokin.tw/mail/logo.gif" width="315" height="52">
<img alt="" border="0" caption=""  hspace="0" src="http://www.dokin.tw/mail/phone.gif" vspace="0" width="315" height="52"><br>
<img src="http://www.dokin.tw/mail/log.jpg" width="860" height="202" alt="�M�~���� �浹�M�~" title="�M�~���� �浹�M�~"></a>
</div>
      <div data-type="extra1" class="news-extra1" style="background-color: rgb(49, 131, 135); color: rgb(255, 255, 255); font-size: 13px; padding: 0 5px;">
        <strong><span style="">�s�B���O�q�l��</span></strong>
      </div>
      <!-- top end here -->
      <!-- content start here -->
      <div data-type="article-odd" class="news-article news-article-odd" style="background: #E5EEEE; margin: 10px 0px; padding: 10px; border: 1px solid #CCC;"> 
        <h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
        </h3>
        <div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">
		<form name="form1" id="form1" method="post" action="mail.php" class="style2" enctype="multipart/form-data"  onsubmit="return check()">
        <table width="800" height="167" border=0 cellpadding=2 cellspacing=0>
		
<td>�C�P�n�Ƴ���:<input type="file" id="good" name="good"></td>
 <td>�s�i��:<input type="file" id="ad" name="ad"></td></table>
        <div data-type="article-odd" class="news-article news-article-odd" style="background: #E5EEEE; margin: 10px 0px; padding: 10px; border: 1px solid #CCC;">
        <h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
          ���O�s�k�W
        </h3>
        <div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">
</div>
1.<input type="text" id="law1" name="law1" size="40">�s��:<input type="text" id="law1_connect" name="law1_connect" size="60"><br/>
2.<input type="text" id="law2" name="law2" size="40" >�s��:<input type="text" id="law2_connect" name="law2_connect" size="60"><br/>
3.<input type="text" id="law3" name="law3" size="40" >�s��:<input type="text" id="law3_connect" name="law3_connect" size="60">
      </div>

      <div data-type="article-even" class="news-article news-article-even" style="background-color: rgb(229, 238, 238); background: #FFF; margin: 10px 0px; padding: 10px;">
        <h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
          ���O�s��
        </h3>
        <div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">
       
</div>
   <textarea name="new_knows" id="new_knows"  class="xheditor" rows="10" cols="100"></textarea>
      </div>


<div data-type="article-even" class="news-article news-article-even" style="background-color: rgb(229, 238, 238); background: #FFF; margin: 10px 0px; padding: 10px;">
        <h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
          �n���s��
        </h3>
        <div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">

</div>
<a href="http://www.epa.gov.tw/">��F�|���O�p</a> <a href="http://www.seety.com.tw/">�s�������x</a>
      </div>
<div align="center">

<input type="submit" name="Submit" value="���͹q�l��">�@�@
<input type="reset" name="Submit" value="���m">
<input type="hidden"  name="user" value="<?=$user?>">
<input type="hidden"  name="hide2" value="<?=$hide2?>">
<input type="hidden"  name="hide9" value="<?=$hide9?>">
<input type="hidden"  name="fgprice" value="<?=$fgprice?>">
</form>
</div>
<!-- content end here -->
<div align="center" style="font-size: 10px; padding: 10px 0;">

<p>�x�n�`���q�G�x�n���w�n�Ϧw�����|�q100���@�ȪA�M�u 06-2575589<br>
�Ÿq��~�ҡG60858�Ÿq�����W�m��m���T�ɮH104��4���@�ȪA�M�u 05-2307789<br>
���������q�G83156�������j�d�Ϥ��|��136��1��1�ӡ@�ȪA�M�u 07-7825580�@�ȪA�M�u 07-7963960</p>

</div>

<!-- news-base -->
    </td>
    </tr></tbody></table>
<br><br>

</hml>