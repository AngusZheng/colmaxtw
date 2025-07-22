<?php
session_start(); //要??SESSION，看是不是管理?
unset($_SESSION['kind']);
echo ("<script type='text/javascript'> top.right.location.reload();</script>");
if($_SESSION["if_info"]==1)
echo '<script>location.href="blank.php"</script>'; 
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML news_list 1.2//EN" "http://www.opennews_listalliance.org/tech/DTD/xhtml-news_list12.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title></title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<title></title>
<head>
<body>
</body>
</head>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<style type="text/css">
	#abgneBlock {
		width: 800px;
		height:300px;
		position:relative;
		overflow: hidden;
		
	}
	#abgneBlock ul.list {
		padding: 0;
		margin: 0;
		list-style: none;
		position: absolute;
		width: 9999px;
		height: 100%;
	}
	#abgneBlock ul.list li {
		float: left;
		width: 800px;
		height: 300px;
	}
	#abgneBlock .list img{
		width: 800px;
		height: 300px;
		border: 0;
	}
	#abgneBlock ul.playerControl {
		margin: 0;
		padding: 0;
		list-style: none;
		position: absolute;
		bottom: 5px;
		right: 5px;
		height: 14px;
	}
	#abgneBlock ul.playerControl li {
		float: left;
		width: 23px;
		height: 14px;
		cursor: pointer;
		margin: 0px 2px;
		background: url(image/rect_ctrl.png) no-repeat 0 0;
	}
	#abgneBlock ul.playerControl li.current { 
		background-position: -23px 0;
	}
</style>
<script type="text/javascript">
	$(function(){
	// 先取得必要的元素並用 jQuery 包裝
	// 再來取得 $block 的高度及設定動畫時間
	var $block = $('#abgneBlock'),
		$slides = $('ul.list', $block),
		_width = $block.width(),
		$li = $('li', $slides),
		_animateSpeed = 600, 
		// 加入計時器, 輪播時間及控制開關
		timer, _showSpeed = 2000, _stop = false;
 
	// 產生 li 選項
	var _str = '';
	for(var i=0, j=$li.length;i<j;i++){
		// 每一個 li 都有自己的 className = playerControl_號碼
		_str += '<li class="playerControl_' + (i+1) + '"></li>';
	}
 
	// 產生 ul 並把 li 選項加到其中
	var $playerControl = $('<ul class="playerControl"></ul>').html(_str).appendTo($slides.parent()).css('left', function(){
		// 把 .playerControl 移到置中的位置
		return (_width - $(this).width()) / 2;
	});
 
	// 幫 li 加上 click 事件
	var $playerControlLi = $playerControl.find('li').click(function(){
		var $this = $(this);
		$this.addClass('current').siblings('.current').removeClass('current');
 
		clearTimeout(timer);
		// 移動位置到相對應的號碼
		$slides.stop().animate({
			left: _width * $this.index() * -1
		}, _animateSpeed, function(){
			// 當廣告移動到正確位置後, 依判斷來啟動計時器
			if(!_stop) timer = setTimeout(move, _showSpeed);
		});
 
		return false;
	}).eq(0).click().end();
 
	// 如果滑鼠移入 $block 時
	$block.hover(function(){
		// 關閉開關及計時器
		_stop = true;
		clearTimeout(timer);
	}, function(){
		// 如果滑鼠移出 $block 時
		// 開啟開關及計時器
		_stop = false;
		timer = setTimeout(move, _showSpeed);
	});
 
	// 計時器使用
	function move(){
		var _index = $('.current').index();
		$playerControlLi.eq((_index + 1) % $playerControlLi.length).click();
	}
});
</script>
<?php
include ("config.php");

$images = glob("notice/{*.gif,*.jpg,*.png}", GLOB_BRACE);
$message = glob("message/{*.gif,*.jpg,*.png}", GLOB_BRACE);

?><center>
<h2>到貨通知</h2>
<div id="abgneBlock" style="z-index:2;">
<ul class="list">
<?php
for($i=0;$i<count($message);$i++)
{
echo '<li><img src="'.$message[$i].'" alt=""/></li>';
}


?>
</ul>
</div>
</center>
<hr>
 <div style="background:#FEFEF3; height:500px; overflow:scroll;" id="comment">
<center><img  class="demo" src="<?=$images[(int)(((time()/(86400*3))%sizeof($images)))]?>"/> </center>
</div>
 

</body>
</html>