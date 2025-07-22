<?php
ob_start();

include("../config_mb.php"); //包含文件

//$email=$_POST["mail"];
$email =  str_replace(PHP_EOL, '',$_POST["mail"]);
$id=$_POST["id"];
$count = $_POST["count"];
date_default_timezone_set("Asia/Taipei");
$mail_date=date("Y-m-d H:i:s");

//儲存發送數
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

$sql_count="update mail set mail_count = '$count' , mail_date = '$mail_date' where id = '$id'";

mysql_query($sql_count);



$sql="SELECT * from mail where id='$id'";
$sql=iconv("big5","utf-8",$sql);
$result=mysql_query($sql);
$row = mysql_fetch_array($result);

$law1=$row["law1"];
$law1_connect=$row["law1_connect"];
$law2=$row["law2"];
$law2_connect=$row["law2_connect"];
$law3=$row["law3"];
$law3_connect=$row["law3_connect"];
$ad=$row["ad"];
$good=$row["good"];
$new_knows =  $row["new_knows"];


?>
<?php
ini_set('SMTP','msa.hinet.net');
ini_set('sendmail_from','c80172000@seety.com.tw');
$to='';
$cc_to=$email;

$subject="群運環保電子報 第".$id."期";

$message='<a href="http://www.dokin.tw/mail/mailpage_out.php?id='.$id.'">若看不到內容按這</a>
<div data-type="background" class="news-background" align="center" style="background-color: #FFF; width: 100%;">
  <br><br><table border="0" cellpadding="0" cellspacing="0" width="600" style="width:600px;"><tbody><tr>
<td align="left" valign="top">
<div data-type="base" class="news-base" style="background-color:#9BCD9B; color: #1F4858; font-family: 微軟正黑體; font-size: 15px; padding: 10px;">
      <!-- top start here -->
      <div class="top-image" style="border: 2px solid #FFF; line-height: 0;">
       <a href="http://www.chyunn.com.tw/">
	   <img alt="" border="0" caption=""  hspace="0" src="http://www.dokin.tw/mail/logo.gif" vspace="0" width="315" height="52">
	   <img alt="" border="0" caption=""  hspace="0" src="http://www.dokin.tw/mail/phone.gif" vspace="0" width="315" height="52">
	   <br>
<img src="http://www.dokin.tw/mail/log.jpg"  hspace="0" width="825" height="202"  vspace="0"></a>
</div>
      <div data-type="extra1" class="news-extra1" style="background-color: rgb(49, 131, 135); color: rgb(255, 255, 255); font-size: 13px; padding: 0 5px;">
        <strong><span style="">群運環保電子報 第'.$id.'期</span></strong>
      </div>
      <!-- top end here -->
      <!-- content start here -->
      <div data-type="article-odd" class="news-article news-article-odd" style="background: #E5EEEE; margin: 10px 0px; padding: 10px; border: 1px solid #CCC;">
        <h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
        </h3>
        <div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">
        <table width="800" height="167" border=0 cellpadding=2 cellspacing=0>
<td  align="center"><img src="http://www.dokin.tw/mail/photo/'.$good.'"  hspace="0"  alt="每周好料報報" title="每周好料報報"  vspace="0"></td>
</table>
</div>
      </div>


<div data-type="article-odd" class="news-article news-article-odd" style="background: #E5EEEE; margin: 10px 0px; padding: 10px; border: 1px solid #CCC;">
        <h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
          環保新法規
        </h3>
        <div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">		
</div>
1.<a href="'.$law1_connect.'">'.$law1.'</a><br />
2.<a href="'.$law2_connect.'">'.$law2.'</a><br />
3.<a href="'.$law3_connect.'">'.$law3.'</a>
      </div>

      <div data-type="article-even" class="news-article news-article-even" style="background-color: #E5EEEE; background: #FFF; margin: 10px 0px; padding: 10px;">
        <h3 class="news-title" style="font-size: 16px; margin: 0.5em 0;">
          環保新知
        </h3>
        <div class="news-content" style="line-height: 25px; text-align: justify; text-justify: inter-ideograph; word-break: break-all; word-wrap: break-word;">
       
</div>
'.$new_knows.'
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
';

$message=stripslashes($message);

$headers="BCC: $cc_to\r\n";
$headers.="MIME-Version:1.0\r\n";
$headers.="Content-type:text/html;charset=utf-8\r\n";
$headers.="From:c80172000@seety.com.tw \r\n";
mb_internal_encoding("UTF-8");//設定編碼方式  
$result=@mb_send_mail($to, $subject, $message ,$headers);

if($result){
echo ("<script type='text/javascript'> alert('Success');</script>");
header("Refresh: 0;url=mail_page.php?hide2=$hide2&hide9=$hide9&fgprice=$fgprice&user=$user");
ob_end_flush();
}

?>
