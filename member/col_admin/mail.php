<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>
<body>
<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript"  src="xheditor-1.2.1/xheditor-1.2.1.min.js"></script>
<script type="text/javascript"   src="xheditor-1.2.1/xheditor_lang/zh-tw.js"></script>
<script type="text/javascript">

function selAll(id){
//變數checkItem為checkbox的集合
var checkItem = document.getElementsByName(id);
for(var i=0;i<checkItem.length;i++){
checkItem[i].checked=true; 
}}
function unselAll(id){
//變數checkItem為checkbox的集合
var checkItem = document.getElementsByName(id);
for(var i=0;i<checkItem.length;i++){
checkItem[i].checked=false;
}}

function check(){
var reply = confirm('確認資料皆填寫無誤?');
return reply;
}
</script>
<?php
$a=1; 
$b=2;
$c=4;
$d=8;
$e=16;
$f=32;
$g=64;
$h=128;
$_i=256;
$j=512;
$k=1024;
$l=2048;


include ("config.php");
$authorized=0;
if(isset($_POST['authorized'])) {

    foreach($_POST['authorized'] as $key => $value) {
        $authorized+=$value;
    }
}
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT *  FROM cust  where 1 and tel_no1!='' and taxnum!=''";
$result=mysql_query($sql);
$i=0;
while($row=mysql_fetch_array($result)){

$c=(intval($row["authorized"]) & intval($authorized) );
if($c==$authorized)
{
$i++;
$mail_array[$i]= trim(preg_replace('~[\x{4e00}-\x{9fa5}]+~u','', $row["email"]));
$mail_array[$i]= preg_replace('/[\(\)]/','',$mail_array[$i]);
$mail_array[$i] = str_replace("'r","",$mail_array[$i]);
$mail_array[$i] = str_replace("'s","",$mail_array[$i]);

}
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
<input type="checkbox" name="authorized[]" value="1"  <?php if($authorized&$a=1){?>checked="checked" <?php }?>>Pace
<input type="checkbox" name="authorized[]" value="2"  <?php if($authorized&$b=2){?>checked="checked" <?php }?>>Continental
<input type="checkbox" name="authorized[]" value="4"  <?php if($authorized&$c=4){?>checked="checked" <?php }?>>Deda
<input type="checkbox" name="authorized[]" value="8"  <?php if($authorized&$d=8){?>checked="checked" <?php }?>>Dedaccial
<input type="checkbox" name="authorized[]" value="16"  <?php if($authorized&$e=16){?>checked="checked" <?php }?>>DMT
<input type="checkbox" name="authorized[]" value="32"  <?php if($authorized&$f=32){?>checked="checked" <?php }?>>Finish Line
<input type="checkbox" name="authorized[]" value="64"  <?php if($authorized&$g=64){?>checked="checked" <?php }?>>Kool Stop
<input type="checkbox" name="authorized[]" value="128"  <?php if($authorized&$h=128){?>checked="checked" <?php }?>>Litespeed
<input type="checkbox" name="authorized[]" value="256"  <?php if($authorized&$_i=256){?>checked="checked" <?php }?>>Park
<input type="checkbox" name="authorized[]" value="512"  <?php if($authorized&$j=512){?>checked="checked" <?php }?>>Selle Italia
<input type="checkbox" name="authorized[]" value="1024"  <?php if($authorized&$k=1024){?>checked="checked" <?php }?>>Tacx
<input type="checkbox" name="authorized[]" value="2048"  <?php if($authorized&$l=2048){?>checked="checked" <?php }?>>White Lightning
<input type="submit" name="submit" value="確認"/>
<input type="reset" name="reset" value="取消"/>
</form>

<hr>
<form id="form2" name="form2" method="post" action="mail_send.php">
(<strong>共<span id="tel_num_1"></span>家</strong>)<br>
<textarea name="mail" cols="50" rows="10" class="validate[required]"><? 
for($i=0;$i<count($mail_array);$i++)
{
echo $mail_array[$i].",\n";
}
?>
</textarea>
<hr>
<input type="hidden" value="<?=$i?>" name="count" id="count">

主旨：<input type="text" value="" name="title" id="title" size="45">
<hr>
<textarea name="content" id="content"  class="xheditor" rows="20" cols="150"></textarea>
<br><br><br>
<div align="center">
<input type="submit" name="submit" value="發送"/>
<input type="reset" name="reset" value="取消"/>
</div>
</form>


</body>
</html>
<script>
function Compute_mail(){	
var str = new String(document.form2.mail.value);
var mail = str.split(",\n");
var len=str.split(",").length;
var timer = setTimeout("Compute_mail()", 250);
var re = /^[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[@]{1}[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[.]{1}[A-Za-z]{2,5}$/;
//var re = /[,\n]/;
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