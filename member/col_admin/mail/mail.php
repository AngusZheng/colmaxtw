<?php
session_start(); //�n??SESSION�A�ݬO���O�޲z?
header("Cache-control:private");
include("config.php"); //�]�t���
?>
<?php
$good_array=explode(".",$_FILES["good"]["name"]);
$ad_array=explode(".",$_FILES["ad"]["name"]);

if(empty($_FILES["good"]["name"]))
$good='chu.jpg';

else
{
if(strcasecmp($good_array[1],'jpg')!=0)
{

echo ("<script type='text/javascript'> alert('�C�P�n�Ƴ����ɮ׿��~ ����jpg');window.history.go(-1);</script>");
exit;
}
$good=time()."_good.jpg";
$path_1=dirname(__FILE__).'/photo/'.$good;
ImageResize($_FILES["good"]["tmp_name"],$path_1,400,167,100);
}


if(empty($_FILES["ad"]["name"]))
$ad='chu.jpg';
else{
if(strcasecmp($ad_array[1],'jpg')!=0)
{

echo ("<script type='text/javascript'> alert('�s�i���ɮ׿��~ ����jpg');window.history.go(-1);</script>");
exit;
}

$ad=time()."_ad.jpg";
$path_2=dirname(__FILE__).'/photo/'.$ad;
ImageResize($_FILES["ad"]["tmp_name"],$path_2,400,167,100);
}

$law1=$_POST["law1"];
$law1_connect=$_POST["law1_connect"];
$law2=$_POST["law2"];
$law2_connect=$_POST["law2_connect"];
$law3=$_POST["law3"];
$law3_connect=$_POST["law3_connect"];

$new_knows=htmlspecialchars($_POST["new_knows"],ENT_QUOTES);
$new_knows_show=$_POST["new_knows"];
date_default_timezone_set("Asia/Taipei");
$mail_date=date("Y-m-d H:i:s");

$hide2=$_POST["hide2"];
$hide9=$_POST["hide9"];
$user=$_POST["user"];
$fgprice=$_POST["fgprice"];

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;
$sql="insert into mail(law1,law1_connect,law2,law2_connect,law3,law3_connect,new_knows,ad,good,mail_date) values('$law1','$law1_connect','$law2','$law2_connect','$law3','$law3_connect','$new_knows_show','$ad','$good','$mail_date')";
$sql=iconv("big5","utf-8",$sql);
mysql_query($sql);

$sql="SELECT count(*) from mail";
$result=mysql_query($sql);
$row = mysql_fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=big5">	
<div data-type="background" class="news-background" align="center" style="background-color: #FFF; width: 100%;">
  <br><br><table border="0" cellpadding="0" cellspacing="0" width="600" style="width:600px;"><tbody><tr>
<td align="left" valign="top">
<div data-type="base" class="news-base" style="background-color:#9BCD9B; color: #1F4858; font-family: �L�n������; font-size: 15px; padding: 10px;">
      <!-- top start here -->
      <div class="top-image" style="border: 2px solid #FFF; line-height: 0;">
       <a href="http://www.chyunn.com.tw/">
	   <img alt="" border="0" caption=""  hspace="0" src="http://www.dokin.tw/mail/logo.gif" vspace="0" width="315" height="52">
	    <img alt="" border="0" caption=""  hspace="0" src="http://www.dokin.tw/mail/phone.gif" vspace="0" width="315" height="52"><br>
<img src="http://www.dokin.tw/mail/log.jpg"  hspace="0" width="830" height="202"  vspace="0"></a>
</div>
      <div data-type="extra1" class="news-extra1" style="background-color: rgb(49, 131, 135); color: rgb(255, 255, 255); font-size: 13px; padding: 0 5px;">
        <strong><span style="">�s�B���O�q�l�� ��<?=$row[0]?>��</span></strong>
      </div>
      <!-- top end here -->
      <!-- content start here -->
      <div data-type="article-odd" class="news-article news-article-odd" style="background: #E5EEEE; margin: 10px 0px; padding: 10px; border: 1px solid #CCC;">
        <h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
        </h3>
        <div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">
        <table width="800" height="167" border=0 cellpadding=2 cellspacing=0>
<td align="center"><img src="http://www.dokin.tw/mail/photo/<?=$good?>"  hspace="0"  alt="�C�P�n�Ƴ���" title="�C�P�n�Ƴ���"  vspace="0"></td>
 </table>
</div>
      </div>


<div data-type="article-odd" class="news-article news-article-odd" style="background: #E5EEEE; margin: 10px 0px; padding: 10px; border: 1px solid #CCC;">
        <h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
          ���O�s�k�W
        </h3>
        <div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">		
</div>
1.<a href="<?=$law1_connect?>"><? echo $law1;?></a><br />
<?php if(!empty($law2)) {?>2.<a href="<?=$law2_connect?>"><? echo $law2; ?> </a><br /><? }?>
<?php if(!empty($law3)) {?>3.<a href="<?=$law3_connect?>"><? echo $law3?></a><? }?>
      </div>

      <div data-type="article-even" class="news-article news-article-even" style="background-color: #E5EEEE; background: #FFF; margin: 10px 0px; padding: 10px;">
        <h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
          ���O�s��
        </h3>
        <div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">
       
</div>
<? echo stripslashes($new_knows_show);?>
      </div>


<div data-type="article-even" class="news-article news-article-even" style="background-color: #E5EEEE; background: #FFF; margin: 10px 0px; padding: 10px;">
        <h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
          �n���s��
        </h3>
        <div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">

</div>
<a href="http://www.epa.gov.tw/">��F�|���O�p</a> <a href="http://www.seety.com.tw/">�s�������x</a>
      </div>


      <!-- content end here -->
      <div align="center" style="font-size: 10px; padding: 10px 0;">
      
      <p>�x�n�`���q�G�x�n���w�n�Ϧw�����|�q100���@�ȪA�M�u 06-2575589<br>
        �Ÿq��~�ҡG60858�Ÿq�����W�m��m���T�ɮH104��4���@�ȪA�M�u 05-2307789<br>
        ���������q�G83156�������j�d�Ϥ��|��136��1��1�ӡ@�ȪA�M�u 07-7825580�@�ȪA�M�u 07-7963960</p>
   
      </div>
    </div>
<!-- news-base -->
    </td>
    </tr></tbody></table>
<input type="button" onClick="window.location='mail_page.php??hide2=<?=$hide2?>&hide9=<?=$hide9?>&user=<?=$user?>&fgprice=<?=$fgprice?>'" value="�^�q�l��">

</div>
</html>
<?php
/**
 The MIT License

 Copyright (c) 2007 <Tsung-Hao>

 Permission is hereby granted, free of charge, to any person obtaining a copy
 of this software and associated documentation files (the "Software"), to deal
 in the Software without restriction, including without limitation the rights
 to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 copies of the Software, and to permit persons to whom the Software is
 furnished to do so, subject to the following conditions:

 The above copyright notice and this permission notice shall be included in
 all copies or substantial portions of the Software.

 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 THE SOFTWARE.
 *
 * ����n�Y�Ϫ����, �U�z�u�B�z jpeg
 * $from_filename : �ӷ����|, �ɦW, ex: /tmp/xxx.jpg
 * $save_filename : �Y�ϧ��n�s�����|, �ɦW, ex: /tmp/ooo.jpg
 * $in_width : �Y�Ϲw�w�e��
 * $in_height: �Y�Ϲw�w����
 * $quality  : �Y�ϫ~��(1~100)
 *
 * Usage:
 *   ImageResize('ram/xxx.jpg', 'ram/ooo.jpg');
 */
function ImageResize($from_filename, $save_filename, $in_width=400, $in_height=300, $quality=100)
{
    $allow_format = array('jpeg', 'png', 'gif');
    $sub_name = $t = '';

    // Get new dimensions
    $img_info = getimagesize($from_filename);
    $width    = $img_info['0'];
    $height   = $img_info['1'];
    $imgtype  = $img_info['2'];
    $imgtag   = $img_info['3'];
    $bits     = $img_info['bits'];
    $channels = $img_info['channels'];
    $mime     = $img_info['mime'];

    list($t, $sub_name) = split('/', $mime);
    if ($sub_name == 'jpg') {
        $sub_name = 'jpeg';
    }

    if (!in_array($sub_name, $allow_format)) {
        return false;
    }

    // ���o�Y�b���d�򤺪����
    $percent = getResizePercent($width, $height, $in_width, $in_height);
    $new_width  = $width * $percent;
    $new_height = $height * $percent;

    // Resample
    $image_new = imagecreatetruecolor($new_width, $new_height);

    // $function_name: set function name
    //   => imagecreatefromjpeg, imagecreatefrompng, imagecreatefromgif
    /*
    // $sub_name = jpeg, png, gif
    $function_name = 'imagecreatefrom' . $sub_name;

    if ($sub_name=='png')
        return $function_name($image_new, $save_filename, intval($quality / 10 - 1));

    $image = $function_name($filename); //$image = imagecreatefromjpeg($filename);
    */
    $image = imagecreatefromjpeg($from_filename);

    imagecopyresampled($image_new, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    return imagejpeg($image_new, $save_filename, $quality);
}

/**
 * ����n�Y�Ϫ����
 * $source_w : �ӷ��Ϥ��e��
 * $source_h : �ӷ��Ϥ�����
 * $inside_w : �Y�Ϲw�w�e��
 * $inside_h : �Y�Ϲw�w����
 *
 * Test:
 *   $v = (getResizePercent(1024, 768, 400, 300));
 *   echo 1024 * $v . "\n";
 *   echo  768 * $v . "\n";
 */
function getResizePercent($source_w, $source_h, $inside_w, $inside_h)
{
    if ($source_w < $inside_w && $source_h < $inside_h) {
        return 1; // Percent = 1, �p�G����w�p�Y�Ϫ��p�N�����Y
    }

    $w_percent = $inside_w / $source_w;
    $h_percent = $inside_h / $source_h;

    return ($w_percent > $h_percent) ? $h_percent : $w_percent;
}
?>