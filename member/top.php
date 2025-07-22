<?php
session_start(); //要??SESSION，看是不是管理?
$servername="localhost";  //localhost
$sqlservername="colmaxco_member"; //user
$sqlserverpws="colmax123456"; //password
$sqlname="colmaxco_member";// database
?>

<?
$time_stamp = $_SESSION["time_stamp"];
$cust_name = $_SESSION["name"];
$user_name = $_SESSION["user_name"];
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;
$sql = "select count(*) from buylist_tmp where cust_name = '$cust_name' and user_name = '$user_name' and del = 0";
$conn=mysql_query($sql); 	
$rs=mysql_fetch_array($conn);
?>
<link href=http://www.we-shop.net/video/shadowbox/shadowbox.css rel=stylesheet type=text/css /> 
<script type=text/javascript src=http://www.we-shop.net/video/shadowbox/shadowbox.js></script>  
<script type=text/javascript>  
Shadowbox.init({}); 
</script> 


<link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.core.css" rel="stylesheet">  
<link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.default.css" rel="stylesheet">  
<script src="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.min.js"></script>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<title>歌美斯 店家專區</title>
<meta name="Keywords" content="" />
<style type="text/css">
body {
	background-color:#FFFFCD;
	font-size: 12px;
	color:#000;
	text-decoration: none;
	margin-top: -10px;
	
	
}


}

A:link {color: #000}
A:visited {color: #000}
A:active {color: #000}
A:hover {color: #000}


#logo {
	position:absolute;
	width:101px;
	height:65px;
	z-index:1;
	left: 12px;
	top: -10px;
}
</style>
</head>

<body>
<table width="1260" border="0" align="center" div="div" id="apDiv1">
  <tr>
    <th width="26" scope="col"><div id="logo"><a  href="index_upload.php" target="main" title="" onClick="window.open('right.php','right');"><img src="image/colmax-01.png"/></a></div>
    <th width="62" scope="col">&nbsp;</th>
     <th width="62" scope="col">&nbsp;</th>
    <td width=""></th>
      <table border="0" cellpadding="1" cellspacing="1">
      
        <tr>
          <th width="72" height="28" scope="col"><a href="https://mega.co.nz/#!id503CDY!avt5ZFM4AsvuoN1wk_6T833gWfA7Zq1VnguzCsQ-3y4" target="_blank" onClick="window.open('right.php','right');"><img src="image/720.png" alt="" width="50" height="50" /></a></th>
          <th width="70" align="left" scope="col"><a  href="index_upload.php" target="main" title="" onClick="window.open('right.php','right');">
          <img src="image/home.png" alt="" width="35" height="35" /></a></th>
          <td width="70" align="left"><a href="#" title="" id="salescolmax" onClick="javascript:alertify.error('ID=salescolmax');">
          <img src="image/line.png" alt="" width="35" height="35" /></a></td>
          <td width="106" align="left"><a href="https://www.facebook.com/sales.colmax" target="_blank" onClick="window.open('right.php','right');"><img src="image/fb.png" alt="" width="35" height="35" /></a></td>
          <td width="101" align="left"><a  href="buylist.php" target="main" title="" ><img src="image/cart.png" alt="" width="45" height="45"  style="margin-top:5px;" /></a>
          <a  href="buylist.php" target="main" title="" onClick="window.open('right.php','right');">CART /(<? echo $rs[0]?>)</a></td>
              <td width="516" align="left"><p><? echo $_SESSION["name"];?></p>
          <p>台灣獨家授權批發商 SOLE DISTRIBUTOR</p></td>
            <td width="516" align="left"><a href="logout.php" target="_parent"><input type="button" value="登出" style="font-size:25px"></a></td>
        </tr>
      </table>
  </table>
  
  
</body>
</html>

