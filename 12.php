<html>
<head>
<title>2014歌美斯網頁新版-01</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
</head>
<body bgcolor="#F7F7F7" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (2014歌美斯網頁新版-01.psd) -->
<? include "abgne.php" ;?>
<center>
<table id="___01" width="1134" height="1493" border="0" cellpadding="0" cellspacing="0" >
	<tr>
		<td colspan="6" height="680px">
        <? include "abgneBlock.php";?>            
            </td>
	</tr>
		<td colspan="6" height="306px">
			<? include "carousel.php";?></td>
	</tr>
	<tr>
		<td colspan="6"><img src="images/2014_2_03.jpg" width="1134" height="38" alt=""></td>
	</tr>
	<tr>
		<td rowspan="3">
<div style="width:730px;height:379px; overflow:scroll;" >
<?
include("2014_admin/config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

$sql = "select * from connection where del = 0 order by upload_time desc ";
$conn=mysql_query($sql); 	
while($row=mysql_fetch_array($conn))
{
echo 	'<div style=" width:300px;height:70px; float:left; margin-left:25px;margin-bottom:25px">'.$row["title"].'<br><a href="'.$row["link"].'" target="_blank"><img src="connection/'.$row["pic_name"].'" width="205" height="40" alt=""></a></div>';
}

?>
</div>
			</td>
		<td colspan="5">
			<img src="images/2014_2_05.jpg" width="394" height="316" alt=""></td>
	</tr>
	<tr>
		<td colspan="5">
			<img src="images/2014_2_06.jpg" width="394" height="20" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/2014_2_07.jpg" width="33" height="45" alt=""></td>
		<td>
			<img src="images/2014_2_08.jpg" width="112" height="45" alt=""></td>
		<td>
			<img src="images/2014_2_09.jpg" width="113" height="45" alt=""></td>
		<td>
			<img src="images/2014_2_10.jpg" width="116" height="45" alt=""></td>
		<td>
			<img src="images/2014_2_11.jpg" width="20" height="45" alt=""></td>
	</tr>
	<tr>
		<td colspan="6">
			<img src="images/2014_2_12.jpg" width="1134" height="79" alt=""></td>
	</tr>
</table>
</center>
<!-- End Save for Web Slices -->
</body>
</html>