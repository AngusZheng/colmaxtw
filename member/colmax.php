<?
session_start(); //要??SESSION，看是不是管理?
if($_SESSION["admin"]!="colmax"){
echo "<script>location.href='index.php';</script>";
exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>colmax 歌美斯店家專區</title>
</head>
<frameset rows="75,*" cols="1024*" framespacing="0" frameborder="no" border="0">
  <frame src="top.php"   name="a" scrolling="No" noresize="noresize" id="a" title="topFrame"/>
  <frameset rows="*" cols="179,179*" framespacing="0" frameborder="no" border="0">
		<frame src="sidemenu.php" name="left" id="left" title="leftFrame" />
		<frameset rows="*" cols="*,235" framespacing="0" frameborder="no" border="0">
		<frame src="index_upload.php" name="main" id="main" title="mainFrame"  scrolling="no"/>
		<frame src="right.php" cols="*,235" name="right" id="right" title="rightFrame" />
	</frameset>
	</frameset>
</frameset>
<noframes><body onload="initial();"> 
</body></noframes>
</html>
