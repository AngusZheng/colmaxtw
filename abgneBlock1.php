<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<style type="text/css">
	#abgneBlock {
		width: 434px;
		height:364px;
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
		width: 434px;
		height: 364px;
	}
	#abgneBlock .list img{
		width: 100%;
		height: 100%;
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
		background: url(../images/rect_ctrl.png) no-repeat 0 0;
	}
	#abgneBlock ul.playerControl li.current { 
		background-position: -23px 0;
	}
</style>

<link rel="stylesheet" href="../js/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="../js/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script>
$(document).ready(function() {
	$(".fancybox-button").fancybox({
		prevEffect		: 'none',
		nextEffect		: 'none',
		closeBtn		: true,
		helpers		: {
			title	: { type : 'inside' },
			buttons	: {}
		}
	});
});
</script>


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
<div id="abgneBlock">
<ul class="list">

<?
include("2014_admin/config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

/*$sql = "select * from abgneblock where yuko= 1 order by upload_time desc limit 1 ";
$conn1=mysql_query($sql); 	
$row1=mysql_fetch_array($conn1);
if($row1)
echo '<a  class="fancybox-button" data-fancybox-type="iframe"  href="'.$row1["link"].'" target="_blank"><li><img src="abgneblock/'.$row1["pic_name"].'" ></li></a>';*/


$sql = "select * from abgneblock where yuko= 0 order by upload_time desc limit 6 ";
$conn=mysql_query($sql); 	
while($row=mysql_fetch_array($conn))
{
if($row["link"]!="" )
echo '<a href="'.$row["link"].'" target="_blank"><li><img src="../abgneblock/'.$row["pic_name"].'" ></li></a>';
else
echo '<li><img src="../abgneblock/'.$row["pic_name"].'"></li>';
}
?>

</ul>
</div>