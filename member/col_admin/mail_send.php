<?php
ob_start();
$email=$_POST["mail"];
$email =  str_replace(PHP_EOL, '',$_POST["mail"]);
date_default_timezone_set("Asia/Taipei");
$mail_date=date("Y-m-d H:i:s");
$mail_array = explode(",",$email);
$num=count($mail_array);
ini_set('SMTP','msa.hinet.net');
ini_set('sendmail_from','sales@colmax.com.tw');
?>
<?php
for($i=0;$i<$num;$i++){

$to='';
$cc_to=$mail_array[$i];

$subject=$_POST["title"];;
$message=stripslashes($_POST["content"]);

$headers="BCC: $cc_to\r\n";
$headers.="MIME-Version:1.0\r\n";
$headers.="Content-type:text/html;charset=utf-8\r\n";
$headers.="From:歌美斯國際股份有限公司<sales@colmax.com.tw> \r\n";
mb_internal_encoding("UTF-8");//設定編碼方式  
$result=@mb_send_mail($to, $subject, $message ,$headers);*/
}

echo ("<script type='text/javascript'> alert('Send Success');</script>");
header("Refresh: 0;url=mail.php");
ob_end_flush();
?>
