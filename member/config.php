<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/table.css">
<script>

document.oncontextmenu = function(){
window.event.returnValue=false; //將滑鼠右鍵事件取消
}

</script>

<?php 
session_start();
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


if($_SESSION["user_name"]=='')
{
echo ("<script type='text/javascript'> alert('閒置太久 請重新登入');</script>");
echo '<script>parent.location.href="logout.php"</script>';
exit;
}



?>
<body onload="ReCalculate();">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>


<script language="JavaScript">
//一段時間未執行,則系統登出
var oTimerId;
function Timeout(){
   waiting(15);
}
function ReCalculate(){
   clearTimeout(oTimerId);
   oTimerId = setTimeout('Timeout()', 5*60*1000);
}
document.onmousedown = ReCalculate;
document.onmousemove = ReCalculate;
document.onkeydown = ReCalculate;
document.onKeyPress = ReCalculate;
ReCalculate();
//一段時間未執行,則系統登出
</script>

<script language="javascript">
//偵測瀏覽器版本
var browser=navigator.appName;
if(browser=="Netscape"){    //如果瀏覽器為Netscape或者Firefox
    //開始監聽鍵盤事件
    document.captureEvents(Event.KEYDOWN)
    document.onkeydown=function(event){
		ReCalculate();
       
        }
    
}
else{    //假設瀏覽器不為Nescape則猜測為ie
    //開始監聽鍵盤事件
    document.onkeydown = function(){
      ReCalculate();
        
    }
}

function MouseWheel (e) {
  e = e || window.event;
  ReCalculate();
}

// hook event listener on window object
if ('onmousewheel' in window) {
  window.onmousewheel = MouseWheel;
} else if ('onmousewheel' in document) {
  document.onmousewheel = MouseWheel;
} else if ('addEventListener' in window) {
  window.addEventListener("mousewheel", MouseWheel, false);
  window.addEventListener("DOMMouseScroll", MouseWheel, false);
}
</script>





<script>    

function open_div() {
    $( "#dialog" ).dialog( "open" );
    return false;
  }
  
var currentsecond;
function waiting( countdownfrom)
{
 currentsecond=countdownfrom+1;
setTimeout("countredirect()",1000)  ;  
return ;
}
 

function countredirect(){    
if (currentsecond!=1){           
currentsecond-=1  ;
open_div();
document.getElementById("butt").innerHTML =currentsecond+"秒後登出"; 
}           
else{           
  window.open("logout.php","_parent");   
return  ;         
}           
t=setTimeout("countredirect()",1000)  ;  
} 


function stopCount()
 {
 clearTimeout(t)
 }
</script>        
     <div id="dialog">
   <p id="butt" style="color:#F00">
   </p>
</div>

<script>
$(function() {
  $( "#dialog" ).dialog({
    autoOpen: false,
    height:250,
    width:200,
	 modal:true,
	 position:"top",
	 buttons: { "取消登出": function() {  ReCalculate(); stopCount(); $( this ).dialog( "close" );} }  ,
	
  });
});
</script>
</body>
</html>