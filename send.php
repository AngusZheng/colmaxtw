<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?
ob_start();
//ini_set('SMTP','msa.hinet.net');
//ini_set('sendmail_from','sales@colmax.com.tw');

if($_POST["name"]=="")
{
echo ("<script type='text/javascript'> alert('請填寫姓名');history.go(-1);</script>");
exit();
}
if($_POST["mail"]=="")
{
echo ("<script type='text/javascript'> alert('請填寫信箱');history.go(-1);</script>");
exit();
}
if($_POST["things"]=="")
{
echo ("<script type='text/javascript'> alert('請填寫聯絡事項');history.go(-1);</script>");
exit();
}

$message = '姓名:'.$_POST["name"].'<br>Email:'.$_POST['mail'].'<br>聯絡事項:'.$_POST['things'];

//$cc_to = 'it@rollingwheel.com.tw';
$to= 'sales@colmax.com.tw';
$subject = "歌美斯聯絡事項";

$message=stripslashes($message);
$headers="BCC: $cc_to\r\n";
$headers.="MIME-Version:1.0\r\n";
$headers.="Content-type:text/html;charset=utf-8\r\n";
$headers.="From:".$_POST["mail"]."\r\n";
mb_internal_encoding("UTF-8");//設定編碼方式  
$result=@mb_send_mail($to, $subject, $message ,$headers);


if($result)
{
echo ("<script type='text/javascript'> alert('發送成功!!')</script>");	
echo ("<script type='text/javascript'>  location.href='index.php';</script>");

}
?>
</html>