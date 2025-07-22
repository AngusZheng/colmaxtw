<?php
ob_start();
ini_set('SMTP','msa.hinet.net');
date_default_timezone_set("Asia/Taipei");
$cust_name=$_POST['cust_name'];
$mail=$_POST['mail'];
$subject=$cust_name."加購商品";


$file=$_POST["file_root"];

for($i=0;$i<count($file);$i++)
{
$name=	str_replace('extra/','',$file[$i]);
$name=str_replace('.jpg','',$name);
$message.=$name.'<p><img src="http://www.colmax.com.tw/member/extra/'.htmlentities(rawurlencode($file[$i])).'" alt="" /></p>';
}

$to=$mail;
$cc_to = 'order@colmax.com.tw';

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
echo ("<script type='text/javascript'>  location.href='index_upload.php';</script>");
ob_end_flush();
}

?>