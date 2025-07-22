<html>
<head>
<title>2014網頁</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<body bgcolor="#FFFFFF">
<!-- Save for Web Slices (2014網頁新版-01.jpg) -->
<? include "abgne.php" ;?>
<table id="___01" width="799" height="1077" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td colspan="5" background="images_test/2014_01.png"  width="799" height="522" >
        <div style=" padding-left:740px; padding-bottom:112px">123</div>
          <? include "abgneBlock.php";?>         
            </td>
	</tr>
	<tr>
		<td colspan="5">
				<? include "carousel.php";?></td></td>
	</tr>
	<tr>
		<td colspan="5">
			<img src="images_test/2014_03.png" width="799" height="25" alt=""></td>
	</tr>
	<tr>
		<td rowspan="3">
			<div style="width:495px;height:262px; overflow:scroll;" >
<?
include("2014_admin/config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

$sql = "select * from connection where del = 0 order by upload_time desc ";
$conn=mysql_query($sql); 	
while($row=mysql_fetch_array($conn))
{
echo 	'<div style=" width:200px;height:70px; float:left; margin-left:25px;margin-bottom:25px">'.$row["title"].'<br><a href="'.$row["link"].'" target="_blank"><img src="connection/'.$row["pic_name"].'" width="205" height="40" alt=""></a></div>';
}

?>
</div></td>
		<td colspan="4" width="304" height="211">
<div class="fb-like-box" data-href="https://www.facebook.com/pages/&#x6b4c;&#x7f8e;&#x65af;-COLMAX/130821093660986" data-width="304px" data-height="211px" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="true" data-show-border="true"></div>
			</td>
	</tr>
	<tr>
		<td rowspan="2">
			<img src="images_test/2014_06.png" width="18" height="51" alt=""></td>
		<td colspan="3">
			<img src="images_test/2014_07.png" width="286" height="15" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images_test/2014_08.png" width="96" height="36" alt=""></td>
		<td>
			<img src="images_test/2014_09.png" width="93" height="36" alt=""></td>
		<td>
			<img src="images_test/2014_10.jpg" width="97" height="36" alt=""></td>
	</tr>
	<tr>
		<td colspan="5">
			<img src="images_test/2014_11.png" width="799" height="51" alt=""></td>
	</tr>
</table>
<!-- End Save for Web Slices -->
</body>
</html>