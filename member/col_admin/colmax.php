<?
session_start(); //要??SESSION，看是不是管理?
if($_SESSION["admin"]!="colmax"){
echo "<script>location.href='index.php';</script>";
exit;
}
?>
<script language="JavaScript">
//一段時間未執行,則系統登出
var oTimerId;
function Timeout(){
   window.open("logout.php","_parent")
}
function ReCalculate(){
   clearTimeout(oTimerId);
   oTimerId = setTimeout('Timeout()', 1 * 60 * 30000);
}
document.onmousedown = ReCalculate;
document.onmousemove = ReCalculate;
document.onkeydown = ReCalculate;
document.onKeyPress = ReCalculate;
ReCalculate();
//一段時間未執行,則系統登出
</script>


<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<title></title> 
</head>
<frameset rows="8%,*" noresize="noresize">
<frame   src="top.php" scrolling="No" name="a">
<frameset cols="15%,*">
<frame  name="left"  src="side_menu.php">
<frame name="main" src="index_upload.php">
</frameset>
</frameset><noframes></noframes>
</html>