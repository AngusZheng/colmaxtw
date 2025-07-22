<?
session_start(); //要??SESSION，看是不是管理?
if($_SESSION["admin"]!="colmax"){
echo "<script>location.href='index.php';</script>";
exit;
}
?>

<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<title></title> 
</head>
<frameset rows="8%,*" noresize="noresize"  framespacing="0" frameborder="yes">
<frame   src="top.php" scrolling="No">
<frameset cols="12%,*">
<frame  name="left"  src="side_menu.php">
<frame name="main" src="index_upload.php">
</frameset><noframes></noframes>

</html>