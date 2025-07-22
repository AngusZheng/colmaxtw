<?php
ob_start();

ini_set('SMTP','msa.hinet.net');
ini_set('sendmail_from','sales@colmax.com.tw');

?>


<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML product 1.2//EN" "http://www.openproductalliance.org/tech/DTD/xhtml-product12.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title></title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<title></title>
</head>
<body>
</body>
</head>

<?php
include ("config.php");
$storage = $_POST["storage"];
$product_num = $_POST["product_num"];
$product_name = $_POST["product_name"];
$product_id = $_POST["product_id"];
$buy_num = $_POST["buy_num"];
$price = $_POST["price"];
$cust_name = $_POST["cust_name"];
$user_name = $_POST["user_name"];
$id = $_POST["id"];

date_default_timezone_set("Asia/Taipei");
$buy_date=date("Y-m-d H:i:s");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;



//分解陣列 
$product_num_array = explode(",",$product_num);
$storage = explode(",",$storage);
$product_name_array = explode(",",$product_name);
$buy_num_array = explode(",",$buy_num);
$price_array = explode(",",$price);
$id_array = explode(",",$id);

$message_1= '<center><table border="1" width="100%">';
$message_1 .= '<td width= "25%" bgcolor="#E0FFFF" align="center">購買商品</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">購買數量</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">價錢</td>'; 

$message_1_1 = '<center><table border="1" width="100%"><td width= "25%" bgcolor="#E0FFFF" align="center">購買商品</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">品號</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">購買數量</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">庫存</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">價錢</td>'; 

for($i=0;$i<count($id_array);$i++)
{
$sql_del = "update buylist_tmp set del = 1 where id = '".$id_array[$i]."' ";
$message_2 .=  '<tr align="center"><td>'.$product_name_array[$i].'</td><td>'.$buy_num_array[$i].'</td><td>＄'.$price_array[$i]*$buy_num_array[$i].'</td></tr>';
$message_2_2 .=  '<tr align="center"><td>'.$product_name_array[$i].'</td><td>'.$product_num_array[$i].'</td><td>'.$buy_num_array[$i].'</td><td>'.$storage[$i].'</td><td>＄'.$price_array[$i]*$buy_num_array[$i].'</td></tr>';
$total_price += $price_array[$i]*$buy_num_array[$i];
mysql_query($sql_del);
}
$message_3 = '<td colspan="3" align="center">'.$cust_name.',共購買'.$i.'筆商品,總價：$'.$total_price.'</td></center>';
$message_3_3 = '<td colspan="5" align="center">'.$cust_name.',共購買'.$i.'筆商品,總價：$'.$total_price.'</td></center>';

$message = $message_1.$message_2.$message_3;

$message_order = $message_1_1.$message_2_2.$message_3_3;

$subject = "歌美斯購物清單";


$sql = "insert into orderlist (product_id,product_name,buy_num,buy_date,cust_name,user_name,price) values('$product_id','$product_name','$buy_num','$buy_date','$cust_name','$user_name','$total_price')";


$result_sql = mysql_query($sql);

if($result_sql)
{
$cc_to_cust = 'c80172000@seety.com.tw';

$message=stripslashes($message);
$headers="BCC: $cc_to_cust\r\n";
$headers.="MIME-Version:1.0\r\n";
$headers.="Content-type:text/html;charset=utf-8\r\n";
$headers.="From:sales@colmax.com.tw \r\n";
mb_internal_encoding("UTF-8");//設定編碼方式  
$result=@mb_send_mail($to, $subject, $message ,$headers);

if($result)
{
$cc_to_order = 'c80172000@seety.com.tw';
$message_order=stripslashes($message_order);
$headers="BCC: $cc_to_order\r\n";
$headers.="MIME-Version:1.0\r\n";
$headers.="Content-type:text/html;charset=utf-8\r\n";
$headers.="From:sales@colmax.com.tw \r\n";
mb_internal_encoding("UTF-8");//設定編碼方式  
$result=@mb_send_mail($to, $subject, $message_order ,$headers);
	
if($result){	
echo ("<script type='text/javascript'> alert('訂單成立')</script>");	
echo ("<script type='text/javascript'> window.opener.top.a.location.reload();</script>");
echo ("<script type='text/javascript'>  window.close();</script>");
}

}
}

?>
