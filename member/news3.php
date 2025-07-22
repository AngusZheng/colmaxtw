<?
session_start();

$parts = $_GET["parts"];

if($parts==0)
{
$width=467;
$height=567;
$height_img=567;
$left=435;
$top=40;
}
else
{
$width=900;
$height=507;
$height_img=430;
$left=868;
$top=100;
}
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML product 1.2//EN" "http://www.openproductalliance.org/tech/DTD/xhtml-product12.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title></title>
<meta name="description" content="" />
<meta name="keywords" content="" />

<style>
body,div,img,table,tr,td{

margin: 0px;

padding: 0px;

}

body{

background-color: #FEFEF3;

}

.outer{

width:<?=$width;?>px;

height:<?=$height;?>px;

overflow: hidden;

margin: 20px auto;

}

table{
border-collapse: collapse;

}

.outer img{

width: <?=$width-64;?>px;
height:<?=$height_img;?>px;
float: left;
margin-left:32px;

}

.out{

width: <?=$width;?>px;

height: 84px;

overflow: hidden;

margin: 50px auto;

position: relative;

top:-<?=$top?>px;
}

.op{

width: 125px;

height: 84px;

position: absolute;

left: 0;

top: 0;

background-color: black;

opacity: 0.5;

fliter:alpha(opacity=50);

}

.out img{
width: 125px;
height: 84px;
float: left;
}
.right{
width: 32px;
height: 32px;
position:relative;
left: 0px;
top:-<?=$height*0.5?>px;
background-image:url(image/image2.png);
}

.left{
width: 32px;
height: 32px;
position: relative;
left:<?=$left?>px;
top: -<?=$height*0.5+32?>px;
background-image:url(image/image1.png);
}

</style>
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
</head>
<?
ini_set("memory_limit","4096M");  
$servername="localhost";  //localhost
$sqlservername="colmaxco_member"; //user
$sqlserverpws="colmax123456"; //password
$sqlname="colmaxco_member";// database


$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

$sql = "select * from cust  where id =".$_SESSION["user_name"];
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
if ($row["session_id"]!=NULL and strcasecmp($_SESSION["user_sessionid"],$row["session_id"])!=0)
{
echo ("<script type='text/javascript'> alert('帳號已於其他地方登入');</script>");
echo '<script>parent.location.href="logout.php"</script>';
exit;
}

$parts = $_GET["parts"];
$_SESSION["kind"]=$parts;
if($parts==0)
$title="媒體報導";
if($parts==1)
$title="活動公告";
if($parts==2)
$title="最新消息";
if($parts==3)
$title="品牌相關影片";

$i=0;
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM news"; 
$sql.= " WHERE parts = '$parts'  and  del = 0 order by id desc ";
$conn=mysql_query($sql); 		
$conn2=mysql_query($sql); 		
?>
<body>

<h1 align="center"><?=$title?><br><font size="-2">(點擊可放大圖片)</font></h1>

<div class='outer' >

<table cellpadding="0" cellspacing="0" style=" table-layout:fixed;">
<tr>
<?
while($rs=mysql_fetch_array($conn)){	
if($parts==3)
$href='news_show.php?id='.$rs["id"];
else
$href='news/'.$rs["photo"];
?>
<td width="<?=$width-64;?>px" ><a class="fancybox-button" rel="fancybox-button" href="<?=$href?>" title="<?=$rs["title"]?>"><img src="news/<?=$rs["photo"]?>"></a></td>	
<? }?>
<td width="<?=$width-64;?>px"><div style="width:<?=$width-64?>px"> &nbsp;</div></td>
</tr>

</table>
<div class="right"></div>
<div class="left"></div>
</div>

<div class='out'>

<div class="op"></div>

<table cellpadding="0" cellspacing="0" >

<tr>
<?
while($rs2=mysql_fetch_array($conn2)){	

?>
<td><img src="news/<?=$rs2["photo"]?>"></td>
<? } ?>
</tr>
</table>

</div>

<script type='text/javascript'>

var i=0;

var t=null;

$('.out td').click(function()

{
i=$(this).index();
$('.out').animate({scrollLeft:(i-1)*125});
$('.outer').animate({scrollLeft:i*<?=$width-32?>});
$('.right').animate({left:i*<?=$width-32?>});
$('.left').animate({left:i*<?=$width-32?>+<?=$left?>});
$('.op').animate({left:i*125});
});

$('.left').click(function()
{
next();
});
$('.right').click(function()
{
pre();

});
function next() {

i++;

if(i>$('.out td').length-1)

{
i=0;
}

$('.out').animate({scrollLeft:(i-1)*125});
$('.outer').animate({scrollLeft:i*<?=$width-32?>});
$('.right').animate({left:i*<?=$width-32?>});
$('.left').animate({left:i*<?=$width-32?>+<?=$left?>});
$('.op').animate({left:i*125});
}

function pre() {

i--;
if(i>$('.out td').length-1 || i<0)

{
i=0;
}

$('.out').animate({scrollLeft:(i-1)*125});
$('.outer').animate({scrollLeft:i*<?=$width-32?>});
$('.right').animate({left:i*<?=$width-32?>});
$('.left').animate({left:i*<?=$width-32?>+<?=$left?>});
$('.op').animate({left:i*125});

}
setInterval("next()", 8000);


</script>

</body>

</html>
