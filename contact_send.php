<?
ob_start();
//ini_set('SMTP','msa.hinet.net');
//ini_set('sendmail_from','sales@colmax.com.tw');



$message = '
<table border="1" width="100%">
<tr>
<td align="left">姓名:</td><td>'.$_POST["cust_name"].'</td></tr>
<tr><td align="left">Email:</td><td >'.$_POST["mail"].'</td></tr>
<tr><td align="left">連絡事項:</td><td>
<textarea rows="4" cols="30" >'.$_POST["things"].'</textarea></td></tr>';

$cc_to = 'sales@colmax.com.tw';
$to='';
$subject = $_POST["cust_name"]."連絡事項";

$message=stripslashes($message);
$headers="BCC: $cc_to\r\n";
$headers.="MIME-Version:1.0\r\n";
$headers.="Content-type:text/html;charset=utf-8\r\n";
$headers.="From:歌美斯國際股份有限公司<sales@colmax.com.tw> \r\n";
mb_internal_encoding("UTF-8");//設定編碼方式  
$result=@mb_send_mail($to, $subject, $message ,$headers);


if($result)
{
echo ("<script type='text/javascript'> alert('Success!!')</script>");	
echo ("<script type='text/javascript'>  top.a.location.reload();</script>");
echo ("<script type='text/javascript'>  location.href='contact_us.php';</script>");

}


?>
