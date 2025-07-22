<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML news_list 1.2//EN" "http://www.opennews_listalliance.org/tech/DTD/xhtml-news_list12.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
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

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="photo/js/jquery.loupe.js"></script>
<title>loupe</title>
<style type="text/css">
	a img {
		border: none;
	}
	a.demo {
		text-decoration: none;
	}
	/* 指定 loupe 區塊要套用的樣式 */
	.loupe {
		background-color: #555;
		background: rgba(0, 0, 0, 0.25);
		border: 1px dashed rgba(0, 0, 0, 0);
		border-radius: 300px;
		cursor: url(blank.png), url(blank.cur), none;
	}
</style>
<script type="text/javascript">
	$(function(){
		// 加上 loupe 效果並指定放大鏡的寬高為 100x75
		$('.demo').loupe({
			width: 250,
			  height: 200
		});
	});
</script>

<center>
<?php
include ("config.php");
?>
<?php
$id = $_GET["id"];
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM news "; 
$sql.= " WHERE id='$id' and del = 0";
$conn=mysql_query($sql); 	
$rs=mysql_fetch_array($conn);
?>	   
<h1><?=$rs["title"]?></h1>
<h3><?=$rs["content"]?></h3>
<? if ($rs["photo"]!="") {?>
<img   class="demo" src="news/<?=$rs["photo"]?>" width="80%";height="80%"; alt=""/> 
<? }?>
</center>

</body>
</html>