<?php
session_start();
ob_start();
//ini_set('SMTP','msa.hinet.net');
//ini_set('sendmail_from','sales@colmax.com.tw');

if($_SESSION["name"]=="" or !isset($_SESSION["name"]) or $_SESSION["name"]==NULL)
{
echo ("<script type='text/javascript'> alert('閒置過久,請重新登入')</script>");	
echo '<script>location.href="logout.php"</script>'; 
}
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<link rel="stylesheet" href="js/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="js/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script>
$(document).ready(function() {
	$(".fancybox-button").fancybox({
		prevEffect		: 'none',
		nextEffect		: 'none',
		closeBtn		: true,
		arrows    : false,
        nextClick : false,
     
		helpers		: {
			title	: { type : 'inside' },
			buttons	: {}
		}
	});
});
</script>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML product 1.2//EN" "http://www.openproductalliance.org/tech/DTD/xhtml-product12.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<script>  
function checkit(){
   var cbxs = document.getElementsByName('file_root[]');
    var s = 0;
    for (var i = 0; i < cbxs.length; i++) {
        if (cbxs[i].checked)
        { s += 1; }
    }
    if (s < 1) {
        alert("請選擇加購商品");
        flag = false;
    }
	else flag=true;
    return flag;
}

</script> 
<?php
include ("config.php");
$storage = $_POST["storage"];
$remark = $_POST["remark"];
$product_num = $_POST["product_num"];
$product_name = addslashes($_POST["product_name"]);
$spec=addslashes($_POST["spec"]);
$product_id = $_POST["product_id"];
$kind = $_POST["kind"];
$buy_num = $_POST["buy_num"];
$price = $_POST["price"];
$cust_name =$_SESSION["name"];
$user_name = $_POST["user_name"];
$mail =$_POST["mail"];
$id = $_POST["id"];
$cust_num=$_SESSION["cust_num"];
$time=$_POST["time"];
$time_else=$_POST["time_else"];
date_default_timezone_set("Asia/Taipei");
$buy_date=date("Y-m-d H:i:s");
$flag=0;

$spec=str_replace("停產","",$spec);
$spec=str_replace("舊款","",$spec);
$spec=str_replace("'","",$spec);
$spec=str_replace('"',"",$spec);

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;



//分解陣列 
$product_num_array = explode("@",$product_num);
$storage = explode("@",$storage);
$product_name_array = explode("@",$product_name);
$product_id_array = explode(",",$product_id);
$buy_num_array = explode(",",$buy_num);
$price_array = explode("@",$price);
$kind_array = explode("@",$kind);
$id_array = explode(",",$id);
$spec_array=explode("@",$spec);

$message_1 = '<p align="left">'.$cust_name.'店家您好：<br>
感謝您的下單，明細如下，<br>
請記得確認喔！業務將與您連繫。<br></p><br>';
$message_1.= '<center><table border="1" width="100%">';
$message_1 .= '<td width= "25%" bgcolor="#E0FFFF" align="center">購買商品</td>
<td width= "15%" bgcolor="#E0FFFF" align="center">規格</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">訂購數量<br>(<font size="+2" color="red">*=數量不足</font>)</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">批價</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">價錢</td>'; 

$message_1_1 = '<center><table border="1" width="100%"><td width= "25%" bgcolor="#E0FFFF" align="center">購買商品</td>
<td width= "15%" bgcolor="#E0FFFF" align="center">規格</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">品號</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">訂購數量</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">庫存</td>
<td width="10%" bgcolor="#E0FFFF"  align="center">價錢</td>'; 

$mes="<h1>以下為預留商品</h1>";
$mes.= '<center><table border="1" width="100%">';
$mes .= '<td width= "25%" bgcolor="#EE799F" align="center">預購商品</td>
<td width= "15%" bgcolor="#EE799F" align="center">規格</td>
<td width="10%" bgcolor="#EE799F"  align="center">訂購數量</td>
<td width="10%" bgcolor="#EE799F"  align="center">批價</td>
<td width="10%" bgcolor="#EE799F"  align="center">價錢</td>'; 

for($i=0;$i<count($id_array);$i++)
{
$sql_del = "update buylist_tmp set del = 1 where id = '".$id_array[$i]."' ";
$spec=str_replace("停產","",$spec_array[$i]);

if($kind_array[$i]=="Bell")
$kind1=3;
elseif($kind_array[$i]=="Giro")
$kind1=3;
elseif($kind_array[$i]=="Continental")
$kind1=11;
else
$kind1=5;


if(($storage[$i]-$buy_num_array[$i])>=0 and $price_array[$i]!=0)
{
$update_storage=$storage[$i]-$buy_num_array[$i];
$mark="";
}
else
{
$update_storage=0;
$mark="<font size='+2' color='red'>*</font>";
$flag=1;
}

if($storage[$i]<$kind1)
{$mark="<font size='+2' color='red'>*</font>"; $flag=1;}
$sql_storage = "update  product set storage = ".$update_storage." where id ='".$product_id_array[$i]."' ";

if($storage[$i]==0)
{
$mes .=  '<tr align="center"><td>'.$product_name_array[$i].'</td><td>'.$spec.'</td><td>'.$mark.$buy_num_array[$i].'</td><td>＄'.$price_array[$i].'</td><td>＄'.$price_array[$i]*$buy_num_array[$i].'</td></tr>';
$s++;
}
else
{
$message_2 .=  '<tr align="center"><td>'.$product_name_array[$i].'</td><td>'.$spec.'</td><td>'.$mark.$buy_num_array[$i].'</td><td>＄'.$price_array[$i].'</td><td>＄'.$price_array[$i]*$buy_num_array[$i].'</td></tr>';
$total_price2 += $price_array[$i]*$buy_num_array[$i];
if($flag==0){
$total_price += $price_array[$i]*$buy_num_array[$i];
}
else
$total_price ="<font color='red'>訂單未完成(業務確認後，會立即與您聯繫)</font>";
}
$message_2_2 .=  '<tr align="center"><td>'.$product_name_array[$i].'</td><td>'.$spec.'</td><td>'.$product_num_array[$i].'</td><td>'.$mark.$buy_num_array[$i].'</td><td>'.$storage[$i].'</td><td>＄'.$price_array[$i]*$buy_num_array[$i].'</td></tr>';

$storage_array.=$storage[$i].",";

mysql_query($sql_del);
mysql_query($sql_storage);
}
if($flag==0 and $total_price<5000)
$total_price="<font color='red'>總額未滿5000，需酌收運費。(業務確認後，會立即與您聯繫)</font>";

$number=$i-$s;
$message_3 = '<tr><td colspan="5">備註：'.$remark.'</td></tr><td colspan="5" align="center">'.$cust_name.',共購買'.$number.'筆商品,總價：$'.$total_price.'</td></center></table>';
$message_3_3 = '<tr><td colspan="6">備註：'.$remark.'</td><tr><tr><td colspan="6">可聯絡時間:'.$time."點/".$time_else.'</td></tr><td colspan="6" align="center">'.$cust_num."/".$cust_name.',共購買'.$i.'筆商品,總價：$'.$total_price.'</td></center></table>';


//最後表格

$message = $message_1.$message_2.$message_3.$mes.
'</table>';

$message_order = $message_1_1.$message_2_2.$message_3_3;




$subject = "歌美斯購物清單(".$cust_name.")";
$subject2 = date("Y-m-d ",strtotime($buy_date))."歌美斯購物清單(".$cust_name.")";
$message=stripslashes($message);

$sql = "insert into orderlist (product_id,product_name,buy_num,buy_date,cust_name,user_name,price,spec,remark,storage) values('$product_id','$product_name','$buy_num','$buy_date','$cust_name','$user_name','$total_price2','$spec','$remark','$storage_array')";


$result_sql = mysql_query($sql);

if($result_sql)
{
$cc_to_cust = $mail.",colmax.line@colmax.com.tw";
$headers="BCC: $cc_to_cust\r\n";
$headers.="MIME-Version:1.0\r\n";
$headers.="Content-type:text/html;charset=utf-8\r\n";
$headers.="From:歌美斯有限公司<colmax.line@colmax.com.tw> \r\n";
mb_internal_encoding("UTF-8");//設定編碼方式  
$result=@mb_send_mail($to, $subject, $message ,$headers);

if($result)
{
$cc_to_order = 'colmax.line@colmax.com.tw';
$message_order=stripslashes($message_order);
$headers="BCC: $cc_to_order\r\n";
$headers.="MIME-Version:1.0\r\n";
$headers.="Content-type:text/html;charset=utf-8\r\n";
$headers.="From:colmax.line@colmax.com.tw \r\n";
mb_internal_encoding("UTF-8");//設定編碼方式  
$result=@mb_send_mail($to, $subject2, $message_order ,$headers);
	
if($result){	

echo ("<script type='text/javascript'> alert('訂單成立')</script>");	
echo ("<script type='text/javascript'> top.a.location.reload();</script>");

}

}
}

?>
<style type="text/css">
        .changecolor0{color:#f00;}
        .changecolor1{color:#0f0;}
        .changecolor2{color:#00f;}
        .changecolor3{color:#f0f;}
        .changecolor4{color:#0ff;}
        .changecolor5{color:#000;}
</style>
<script type="text/javascript">
        var i=0;
        function blink(){
                document.getElementById("remaincolor").className="changecolor"+i%6;
                i++;
        }
        setInterval(blink, 500);
</script>
<h3 id="remaincolor">特惠加購商品(點擊看大圖)</h3>
<div style="font-size:14px;">
<form action="extra_cl.php" method="post" name="form2" id="form2" class="style2" enctype="multipart/form-data" onSubmit="return checkit()">
<?php
$message1 = glob("extra/{*.gif,*.jpg,*.png}", GLOB_BRACE);
for($i=0;$i<count($message1);$i++)
{
echo '<input type="checkbox" name="file_root[]" value="'.str_replace('extra/','',$message1[$i]).'"><a href="'.$message1[$i].'" class="fancybox-button" rel="fancybox-button"  title="'.str_replace('extra/','',$message1[$i]).'"><img src="'.$message1[$i].'" width="84" height="100"></a>';
}
?>
<input type="hidden" name="cust_name" value="<?=$cust_name?>">
<input type="hidden" name="mail" value="<?=$mail?>">
<input type="submit" value="加購">
 </form>
 </div>
 <br>
 <hr>
 <?php echo $message;?>
 </html>