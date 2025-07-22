<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">

<title></title>
<p><font size="2"><a href="javascript:window.history.back(-1)">上一頁</a></font></p>
<h1>電子報發送系統,請先選擇發送條件:</h1>

<style>
.font{font-size:16px}
</style>
<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.validationEngine-zh_TW.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<link rel="stylesheet" media="screen" type="text/css" href="validationEngine.jquery.css" />
 	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#form2").validationEngine();
		});
		
</script>
<?php
$authorized=0;
if(isset($_POST['authorized'])) {

    foreach($_POST['authorized'] as $key => $value) {
        $authorized+=$value;
    }
}


$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT *  FROM cust  where 1";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
echo $c=(intval($row["authorized"]) & intval($authorized) );
$i++;
$mail_array[$i]= trim(preg_replace('/^[\x{4e00}-\x{9fa5}]+$/u','', $row["email"]));
$mail_array[$i]= preg_replace('[\d]','',$mail_array[$i]);
}
if($i>0){
$mail_array=array_filter($mail_array);
//$mail_array=implode(',',$mail_array);
 sort ($mail_array);
}
?>
<form id="form1" name="form1" method="post" action="">
發送條件：
<input type="button" value="全選" onClick="selAll('authorized[]');"  style="width:50px;height:20px">
<input type="button" value="全取消" onClick="unselAll('authorized[]');"  style="width:50px;height:20px">
<input type="checkbox" name="authorized[]" value="1"  <?php if($row["authorized"]&$a=1){?>checked="checked" <?php }?>>Pace
<input type="checkbox" name="authorized[]" value="2"  <?php if($row["authorized"]&$b=2){?>checked="checked" <?php }?>>Continental
<input type="checkbox" name="authorized[]" value="4"  <?php if($row["authorized"]&$c=4){?>checked="checked" <?php }?>>Deda
<input type="checkbox" name="authorized[]" value="8"  <?php if($row["authorized"]&$d=8){?>checked="checked" <?php }?>>Dedaccial
<input type="checkbox" name="authorized[]" value="16"  <?php if($row["authorized"]&$e=16){?>checked="checked" <?php }?>>DMT
<input type="checkbox" name="authorized[]" value="32"  <?php if($row["authorized"]&$f=32){?>checked="checked" <?php }?>>Finish Line
<input type="checkbox" name="authorized[]" value="64"  <?php if($row["authorized"]&$g=64){?>checked="checked" <?php }?>>Kool Stop
<input type="checkbox" name="authorized[]" value="128"  <?php if($row["authorized"]&$h=128){?>checked="checked" <?php }?>>Litespeed
<input type="checkbox" name="authorized[]" value="256"  <?php if($row["authorized"]&$i=256){?>checked="checked" <?php }?>>Park
<input type="checkbox" name="authorized[]" value="512"  <?php if($row["authorized"]&$j=512){?>checked="checked" <?php }?>>Selle Italia
<input type="checkbox" name="authorized[]" value="1024"  <?php if($row["authorized"]&$k=1024){?>checked="checked" <?php }?>>Tacx
<input type="checkbox" name="authorized[]" value="2048"  <?php if($row["authorized"]&$l=2048){?>checked="checked" <?php }?>>White Lightning
<input type="submit" name="submit" value="確認"/>
<input type="reset" name="reset" value="取消"/>
</form>


<form id="form2" name="form2" method="post" action="send.php">
(<strong>共<span id="tel_num_1"></span>家</strong>)<br>
<textarea name="mail" cols="8" rows="5" class="validate[required]"><? 
for($i=0;$i<count($mail_array);$i++)
{
echo $mail_array[$i].",\n";
}
?>
</textarea>
<input type="hidden" value="<?=$id?>" name="id">

<input type="hidden" value="<?=$i?>" name="count" id="count">
<br>
<input type="submit" name="submit" value="確認"/>
<input type="reset" name="reset" value="取消"/>
</form>

<script>
function Compute_mail(){	
var str = new String(document.form2.mail.value);
var mail = str.split(",\n");
var len=str.split(",").length;
var timer = setTimeout("Compute_mail()", 250);
var re = /^[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[@]{1}[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[.]{1}[A-Za-z]{2,5}$/;
var num=0;

for(var i=0; i<=len;i++)
{
if(re.test(mail[i]))
 num++;
}

tel_num_1.innerHTML=num;
document.form2.count.value=num;
}
Compute_mail();
</script>