<?
session_start(); //要??SESSION，看是不是管理?

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<? require_once "menu_bar.php";?>
	
	<style  type="text/css">
		body { font-family: verdana, arial, sans-serif;font-size: 14px;  background: #f3f8f0; }
                #launch
                { font-family: tahoma,sans-serif; }
                a#launch
                { text-decoration: none; }
                a#launch:HOVER
                { text-decoration: underline; color: #f90; }
		.ifM_header
		{ cursor: Move; }
		#overview a { color: darkgreen; text-decoration: none; }
		#overview a:HOVER { color: #f90; }
		#jGlide_001 { top: 100px; left: 10px; display: none; /* Hide Menu Until Ready(Optional) */ }
	</style>
	<link rel="stylesheet" type="text/css" href="css/jGlideMenu.css" />
	<!-- Current Release of jQuery - at time of build -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<!-- Remove the following line to disabled dragging-dropping / Also Edit CSS to Remove cursor:move from .jGM_header -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jQuery.jGlideMenu.067.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			// Initialize Menu
			$('#jGlide_001').jGlideMenu({
				tileSource	: '.jGlide_001_tiles' , 
				demoMode	: false
			}).show();

			// Connect "Toggle" Link	
			$('#switch').click(function(){$(this).jGlideMenuToggle();});
		});
	</script>
</head>
<body onload="$(this).jGlideMenuToggle();">

<!-- Menu Holder -->
<div class="jGM_box" id="jGlide_001">
		<!-- Tiles for Menu -->
		<ul id="tile_001" class="jGlide_001_tiles" title="菜單" alt="按右上角關閉可關閉菜單">
			<li class="first"><a href="../main.php?hide2=<?=$hide2?>&hide9=<?=$hide9?>&user=<?=$user?>&fgprice=<?=$fgprice?>">客戶資料管理</a></li>
			<li><a href="../sp.php?hide2=<?=$hide2?>&hide9=<?=$hide9?>&user=<?=$user?>&fgprice=<?=$fgprice?>">臨時案件維護</a></li>
			<li><a href="../event/event.php?hide2=<?=$hide2?>&hide9=<?=$hide9?>&user=<?=$user?>&fgprice=<?=$fgprice?>">事件反應追蹤</a></li>
			<li><a href="../map/google_map.php?hide2=<?=$hide2?>&hide9=<?=$hide9?>&user=<?=$user?>&fgprice=<?=$fgprice?>">群運客戶地圖</a></li>
			<li><a href="../car/car.php?hide2=<?=$hide2?>&hide9=<?=$hide9?>&user=<?=$user?>&fgprice=<?=$fgprice?>">機具設備履歷表</a></li>
			<li><a href="../map/enemy_google_map.php?hide2=<?=$hide2?>&hide9=<?=$hide9?>&user=<?=$user?>&fgprice=<?=$fgprice?>">同業客戶地圖</a></li>
			<li><a href="../empolyee.php?hide2=<?=$hide2?>&hide9=<?=$hide9?>&user=<?=$user?>&fgprice=<?=$fgprice?>">人員履歷表</a></li>
			<li><a href="../sop.php?hide2=<?=$hide2?>&hide9=<?=$hide9?>&user=<?=$user?>&fgprice=<?=$fgprice?>">標準作業流程</a></li>
			<li><a href="../car/car_work.php?hide2=<?=$hide2?>&hide9=<?=$hide9?>&user=<?=$user?>&fgprice=<?=$fgprice?>">車輛派遣工作</a></li>
			<li><a href="../mail/mail_page.php?hide2=<?=$hide2?>&hide9=<?=$hide9?>&user=<?=$user?>&fgprice=<?=$fgprice?>">電子報發送</a></li>
			<li rel="tile_002">部門權責</li>
		<? if($_SESSION["root"]=='root') {?>	<li><a href="../car/authorization.php?hide2=<?=$hide2?>&hide9=<?=$hide9?>&user=<?=$user?>&fgprice=<?=$fgprice?>">權限設定</a></li><? }?>
		<li><a href="../video/video.php?hide2=<?=$hide2?>&hide9=<?=$hide9?>&user=<?=$user?>&fgprice=<?=$fgprice?>">教育訓練</a></li>
		<li><a href="../mobile/mobile.php?hide2=<?=$hide2?>&hide9=<?=$hide9?>&user=<?=$user?>&fgprice=<?=$fgprice?>">業務拜訪紀錄</a></li>
			<li><a href="../password.php">更改密碼</a></li>
			<li class="last"><a href="../login_out.php">退出</a></li>
                </ul>	
			<ul id="tile_002" class="jGlide_001_tiles" title="部門權責" alt="按右上角關閉可關閉菜單">
			<li><a href="../dep_power/managing.php?hide2=<?=$hide2?>&hide9=<?=$hide9?>&user=<?=$user?>&fgprice=<?=$fgprice?>">營運紀錄</a></li>
			<li><a href="">三聯單</a></li>
			<li><a href="">再利用申報</a></li>
			<li><a href="">GPS</a></li>
			<li><a href="">車輛新增維護</a></li>
			
		</ul>
		
		<!-- Tiles for Menu -->
</div>
<!-- Menu Holder -->
</body>
<script type="text/javascript" src="/resources/js/plugins/google/analytics/gatag.js"></script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-7365212-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</html>
