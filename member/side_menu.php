<?php
session_start(); //要??SESSION，看是不是管理?
$a=1; 
$b=2;
$c=4;
$d=8;
$e=16;
$f=32;
$g=64;
$h=128;
$i=256;
$j=512;
$k=1024;
$l=2048;
$m=4096;
$n=8192;
$o=16384;
$p=32768;
$num=0;
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>colmax 歌美斯店家專區</title>
<style>
body {
	background-color: #FEFEF3;

}
</style>

<style type="text/css">
/* 整體設置*/ 
.navigation {
	margin:0; 
	padding:0;
	width:150px;
	list-style-type:none; 
	font:12px Arial; 
	}
 
.navigation li {
	float:inherit;
	padding:0; 
	margin:0 10px 0 0; 
	_margin:0 2px 0 0; 
	width:150px;
	}
 
/* 設置選單區塊*/
.navigation li dl { 
	width:150px;/*ie6*/
    margin:0; 
	padding:0;
	background-color:#fff;
	border:solid 1px #FFF; 
	}
 
.navigation li dt a , .navigation li dd a{ display:block;}
 
 
/* 設置主選單dt */
.navigation li dt {
	height:20px;
     margin:0;
	padding: 5px;
	text-align:center;
	background-color:#fe8900;	
	font-size: 13px;
	font-weight: bold;
   overflow:hidden;
	}
/* 滑鼠滑入顯示子選單 */
.navigation li:hover dd, .navigation li a:hover dd { display:block;}
.navigation li dt a ,.navigation  li dt a:visited {
	display:block; 
    color:#fff;
    text-decoration:none;
	}

/* 設置子選單dd */
.navigation li dd { 
	margin:0; 
    padding:0; 
	color: #333; 
	background-color:#FFd5a7;
	border-bottom:dotted 1px #666;
	margin:0px auto;
	display:none;
	}
 
.navigation li dd.last {
	border-bottom:0;
	}	
 
.navigation li dd a, .navigation  li dd a:visited {
	display:block; 
	color:#333; 
    text-decoration:none; 
	padding:4px 5px 4px 20px;

    }
 

/*ie6 hack*/
.navigation li:hover,.navigation li a:hover { border:0;}
.navigation table { border-collapse:collapse; 
    padding:0; 		
	text-align:left;
	}
 
#apDiv1 {
	position:absolute;
	width:151px;
	z-index:1;
	left: 38px;
}
</style>
</head>

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
<body>
<div id="apDiv1">
<ul class="navigation">
  <li></dd>
  
   <li>
    <!--[if lte IE 6]><a href="#"><table><tr><td><![endif]-->  
        <dl>
	<dt><a href="#">資訊公告</a></dt>
<dd style="display:block;" ><a href="news3.php?parts=0"  target="main"   onclick="window.open('right1.php','right');" ><nobr>媒體報導</nobr></a></dd>
<dd style="display:block;"><a href="news3.php?parts=1"  target="main"   onclick="window.open('right1.php','right');" ><nobr>活動公告</nobr></a></dd>
<dd style="display:block;"><a href="news3.php?parts=2"  target="main"   onclick="window.open('right1.php','right');" ><nobr>最新消息</nobr></a></dd>	
<dd style="display:block;"><a href="news3.php?parts=3"  target="main"   onclick="window.open('right1.php','right');" ><nobr>品牌相關影片</nobr></a></dd>	
<dd style="display:block;"><a href="bonus_new.php?kind=4"  target="main"  onclick="window.open('right1.php','right');" ><nobr ><span id='remaincolor' ><font size="+1">即時優惠</font></span></nobr></a></dd>	
		</dl>
  </dd>
     <!--[if lte IE 6]></td></tr></table></a><![endif]--> 
     </li>
	<li>  
	  <!--[if lte IE 6]><a href="#"><table><tr><td><![endif]-->  
	  <dl>
<dt><a href="#">商品庫存分類</a></dt>
<?php if($_SESSION["authorized"]&$b=2){?>
<dd><a href="product.php?kind=Continental"  target="main" onclick="window.open('right1.php','right');"><nobr>  Continental </nobr></a></dd>
<? }
else {
	$arr[$num]='Continental';
	$num++;
	}
?>
<?php if($_SESSION["authorized"]&$m=4096){?>
<dd><a href="product.php?kind=Campagnolo"  target="main" onclick="window.open('right1.php','right');"><nobr> Campagnolo</nobr></a></dd>
<? }
else {
	$arr[$num]='Campagnolo';
	$num++;
	}
?>
<?php if($_SESSION["authorized"]&$e=16){?>
<dd><a href="product.php?kind=DMT"  target="main" onclick="window.open('right1.php','right');"><nobr>  DMT </nobr></a></dd>
<? } 
else {
	$arr[$num]='DMT';
	$num++;
	}
?>
<?php if($_SESSION["authorized"]&$c=4){?>
<dd><a href="product.php?kind=Deda"  target="main" onclick="window.open('right1.php','right');"><nobr>  Deda </nobr></a></dd>
<? } 
else {
	$arr[$num]='Deda';
	$num++;
	}
?>
<?php if($_SESSION["authorized"]&$d=8){?>
<dd><a href="product.php?kind=Dedacciai"  target="main" onclick="window.open('right1.php','right');"><nobr>  Dedacciai </nobr></a></dd>
<? }
else {
	$arr[$num]='Dedacciai';
	$num++;
	}
?>
<?php if($_SESSION["authorized"]&$f=32){?>
<dd><a href="product.php?kind=Finish Line"  target="main" onclick="window.open('right1.php','right');"><nobr>  Finish Line </nobr></a></dd>
<? } 
else {
	$arr[$num]='Finish Line';
	$num++;
	}
?>

<?php if($_SESSION["authorized"]&$n=8192){?>
<dd><a href="product.php?kind=Hydrapak"  target="main" onclick="window.open('right1.php','right');"><nobr> Hydrapak</nobr></a></dd>
<? }
else {
	$arr[$num]='Hydrapak';
	$num++;
	}
?>
<?php if($_SESSION["authorized"]&$g=64){?>
<dd><a href="product.php?kind=Kool Stop"  target="main" onclick="window.open('right1.php','right');"><nobr>Kool Stop</nobr></a></dd>
<? } 
else {
	$arr[$num]='Kool Stop';
	$num++;
	}
?>
<?php if($_SESSION["authorized"]&$p=32768){?>
<dd><a href="product.php?kind=KITBRIX"  target="main" onclick="window.open('right1.php','right');"><nobr>Kitbrix</nobr></a></dd>
<? }
else {
	$arr[$num]='KITBRIX';
	$num++;
	}
?>
<?php if($_SESSION["authorized"]&$h=128){?>
<dd><a href="product.php?kind=Litespeed"  target="main" onclick="window.open('right1.php','right');" ><nobr>  Litespeed</nobr></a></dd>
<? }
else {
	$arr[$num]='Litespeed';
	$num++;
	}
?>

<?php if($_SESSION["authorized"]&$a=1){?>
<dd><a href="product.php?kind=pace" target="main" onclick="window.open('right1.php','right');"><nobr>  Pace </nobr></a>
<? }
else {
	$arr[$num]='pace';
	$num++;
	}
?>
<?php if($_SESSION["authorized"]&$i=256){?>
<dd><a href="product.php?kind=ParkTool"  target="main" onclick="window.open('right1.php','right');"><nobr>  ParkTool</nobr></a></dd>
<? } 
else {
	$arr[$num]='ParkTool';
	$num++;
	}
?>
<?php if($_SESSION["authorized"]&$j=512){?>
<dd><a href="product.php?kind=Selle Italia"  target="main" onclick="window.open('right1.php','right');"><nobr>  Selle Italia</nobr></a></dd>
<? } 
else {
	$arr[$num]='Selle Italia';
	$num++;
	}
?>
<?php if($_SESSION["authorized"]&$o=16384){?>
<dd><a href="product.php?kind=Sportourer"  target="main" onclick="window.open('right1.php','right');"><nobr>  Sportourer</nobr></a></dd>
<? }
else {
	$arr[$num]='Sportourer';
	$num++;
	}
?>
<?php if($_SESSION["authorized"]&$k=1024){?>
<dd><a href="product.php?kind=Tacx"  target="main" onclick="window.open('right1.php','right');"><nobr>  Tacx</nobr></a></dd>
<? } 
else {
	$arr[$num]='Tacx';
	$num++;
	}
?>
<?php if($_SESSION["authorized"]&$l=2048){?>
<dd><a href="product.php?kind=White Lightning"  target="main" onclick="window.open('right1.php','right');"><nobr>  White Lightning</nobr></a></dd>
<? } 
else {
	$arr[$num]='White Lightning';
	$num++;
	}

$_SESSION['vendor']=$arr;
?>
</dl>
	  <!--[if lte IE 6]></td></tr></table></a><![endif]-->    
  </dd> 
  </li> 
     <!--[if lte IE 6]><a href="#"><table><tr><td><![endif]-->  
     <li>
        <dl>
<dt><a href="orderlist.php"  target="main" onclick="window.open('right.php','right');">購買紀錄</nobr></a></dt>
		</dl>
          </li> 
            <li> 
              <dl>
 <dt><a href="contact_us.php"  target="main" onclick="window.open('right.php','right');">連絡我們</nobr></a></dt>
		</dl> 
          </li> 
    <!--[if lte IE 6]></td></tr></table></a><![endif]-->     			
    </dd>
</ul></div>
</body>
</html>