<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta name="Generator" content="EditPlus">
<meta name="Author" content="男丁格爾's 脫殼玩">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="Content-Style-Type" content="text/css">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<title></title>
<style type="text/css">
	#abgne-block-20120804 {
		width: 902px;	/* 圖片寬度 + 縮圖寬度 + 間隔 8px */
		height: 650px;	/* 圖片高度 */
		padding: 6px 10px;
		position: relative;
		border: 1px solid #ccc;
	}
	#abgne-block-20120804 ul, #abgne-block-20120804 li {
		margin: 0;
		padding: 0;
		list-style: none;
	}
	#abgne-block-20120804 img {
		width: 800px;	/* 圖片寬度 */
		height: 650px;	/* 圖片高度 */
		border: none;
	}
	#abgne-block-20120804 .photo {
		width: 800px;	/* 圖片寬度 */
		height: 650px;	/* 圖片高度 */
		position: absolute;
	}
	#abgne-block-20120804 .desc-block {
		position: absolute;
		bottom: 0;
		left: 0;
		width: 800px;	/* 圖片寬度 */
		height: 32px;
	}
	#abgne-block-20120804 .desc-bg, #abgne-block-20120804 .desc-title {
		position: absolute;
		width: 780px;	/* 圖片寬度 - padding * 2 */
		background: #000;
		top: -630px;
		height: 24px;
		padding: 4px 10px;
	}
	#abgne-block-20120804 .desc-title {
		color: #fff;
		background: none;
		line-height: 24px;
	}
	#abgne-block-20120804 #playPause-btn {	/* 播放/暫停鈕 */
		position: absolute;
		display: block;
		right: 5px;
		bottom: 5px;
		width: 21px;
		height: 21px;
		width: 21px;
		height: 21px;
		text-indent: -999px;
	}
	#abgne-block-20120804 .playPause-btn-play {
		background: url(image/sprite.png) no-repeat -21px 0px;
	}
	#abgne-block-20120804 .playPause-btn-pause {
		background: url(image/sprite.png) no-repeat 0px 0px;
	}
	#abgne-block-20120804 .thumbs {
		width: 94px;
		height: 288px;	/* 圖片高度 - padding-top */
		padding-top: 12px;
		right: 10px;
		position: absolute;
	}
	#abgne-block-20120804 .carousel {
		height: 600px;
		position: relative;
		overflow: hidden;
	}
	#abgne-block-20120804 .carousel .nav-bar {
		float: left;
		width: 2px;
		height: 63px;
		margin-right: 2px;
	}
	#abgne-block-20120804 .carousel img {
		float: left;
		width: 90px;
		height: 63px;
	}
	#abgne-block-20120804 .carousel ul {
		position: absolute;
	}
	#abgne-block-20120804 .carousel li {
		width: 94px;
		height: 72px;
	}
	#abgne-block-20120804 .carousel .current .nav-bar {	/* 當被點選時，縮圖左邊的顏色 */
		background: #007acc;
	}
	#abgne-block-20120804 .thumbs .prev, #abgne-block-20120804 .thumbs .next {	/* 縮圖上下的控制鈕 */
		position: absolute;
		left: 43px;
		width: 12px;
		height: 0px;
		padding-top: 6px;
		overflow: hidden;
		display: block;
		cursor: pointer;
		background: url(image/sprite.png) no-repeat 0 0;
	}
	#abgne-block-20120804 .thumbs .prev {
		top: 0px;
		background-position: 0 -21px;
	}
	#abgne-block-20120804 .thumbs .next {
		bottom: -2px;
		background-position: 0 -27px;
	}
</style>
<script type="text/javascript">
	$(function(){
		// 先一一取得相關的元素及高度
		var $block = $('#abgne-block-20120804'), 
			$photo = $block.find('.photo'), 
			$photoA = $photo.find('a'), 
			$photoImg = $photoA.find('img'), 
			$photoDesc = $photoA.find('.desc-title'), 
			$thumbs = $block.find('.thumbs'), 
			$carousel = $block.find('.carousel'), 
			_carouselHeight = $carousel.height(), 
			$playPauseBtn = $photo.append('<a href="#playPause" class="playPause-btn-pause" id="playPause-btn" title="暫停">暫停</a>').find('#playPause-btn'), 
			$ul = $thumbs.find('ul'), 
			$li = $ul.find('li'), 
			_liHeight = $li.height(), 
			_set = Math.ceil(_carouselHeight / _liHeight), 
			_count = Math.ceil($li.length / _set), 
			_height = _set * _liHeight * -1, 
			timer, speed = 3000, _animateSpeed = 400, // 分別設定輪播速度及動畫速度
			_index = 0, _countIndex = 0;
		
		// 先在縮圖前面都插入一個 .nav-bar, 主要是當點選到該縮圖時的效果
		$('<span class="nav-bar"></span>').insertBefore($li.find('img'));
		// 先讓描述區塊的背景有透明度
		$block.find('.desc-bg').css('opacity', 0.7);
		
		// 如果圖片組數超出一次能顯示的數量時, 產生可以切換的上下鈕
		var $controls = null;
		if(_count>1){
			$controls = $thumbs.append('<a href="#prev" class="prev"></a><a href="#next" class="next"></a>').find('.prev, .next'); 
			var $prev = $controls.eq(0).hide(), 
				$next = $controls.eq(1);
			
			// 當點擊上下鈕時
			$controls.click(function(e){
				// 計算要顯示第幾組
				_countIndex = Math.floor((e.target.className == 'prev' ? _countIndex - 1 + _count : _countIndex + 1) % _count);
				
				// 進行動畫
				$ul.stop().animate({
					top: _countIndex * _height
				}, _animateSpeed);
				
				// 判斷上下鈕顯示與否
				$prev.toggle(_countIndex>0);
				$next.toggle(_countIndex!=_count-1);

				return false;
			});
		}
		
		// 如果縮圖 li 被點擊時
		$li.click(function(){
			var $this = $(this), 
				$a = $this.find('a'), 
				$img = $this.find('img');
			
			clearTimeout(timer);
			_index = $this.index();
			// 分別改變左邊顯示區塊的超連結, 圖片, alt 及描述內容
			$photoA.attr('href', $a.attr('href'));
			$photoImg.attr({
				src: $img.attr('src'), 
				alt: $img.attr('alt')
			});
			$photoDesc.html($img.attr('alt'));
			$this.addClass('current').siblings('.current').removeClass('current');
			
			// 如果目前的播放鈕並不是在播放樣式時, 就啟動計時器
			if(!$playPauseBtn.hasClass('playPause-btn-play')) timer = setTimeout(auto, speed + _animateSpeed);

			return false;
		}).eq(_index).click();
		
		// 當播放鈕被點擊時
		$playPauseBtn.click(function(){
			// 進行 .playPause-btn-pause 及 .playPause-btn-play 樣式切換
			var $this = $(this).toggleClass('playPause-btn-pause playPause-btn-play'), 
				_hasPlay = $this.hasClass('playPause-btn-play'), 
				_txt = _hasPlay ? '播放' : '暫停';
			
			// 如果目前的播放鈕並不是在播放樣式時, 就啟動計時器; 反之則停止計時器
			if(_hasPlay) clearTimeout(timer);
			else timer = setTimeout(auto, speed);
			$this.attr('title', _txt).text(_txt);

			return false;
		});
		
		// 自動輪播使用
		function auto(){
			_index = (_index + 1) % $li.length;
			var $tmp = $li.eq(_index).click();

			var _indexCount = Math.floor(_index / _set);
			// 判斷是否要切換縮圖的顯示組數
			if($controls != null && (_index == (_countIndex + 1) * _set || _index == 0) && _countIndex != _indexCount){
				$next.click();
				$tmp.animate({opacity: 1}, _animateSpeed, function(){
					$tmp.addClass('current').siblings('.current').removeClass('current');
				})
			}
		}
	});
</script>
</head>

<body>
<?
include ("config.php");
$parts = $_GET["parts"];
$_SESSION["kind"]=$parts;
if($parts==0)
$title="媒體報導";
if($parts==1)
$title="活動公告";
if($parts==2)
$title="最新消息";
if($parts==3)
$title="品牌相關影片";
$i=0;
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT * FROM news"; 
$sql.= " WHERE parts = '$parts'  and  del = 0 order by id desc ";
$conn1=mysql_query($sql); 	
$rs1=mysql_fetch_array($conn1);	
?>

	<div id="abgne-block-20120804">
		<div class="photo">
			<a href="news_show.php?id=<?=$rs1["id"]?>">
				<img src="news/<?=$rs1["photo"]?>" alt="<?=$rs1["title"]?>(點擊看詳細)">
				<div class="desc-block">
					<div class="desc-bg"></div>
					<div class="desc-title"><?=$rs1["title"]?></div>
				</div>
			</a>
		</div>
		<div class="thumbs">
			<div class="carousel">
				<ul>
<?php
$sql = "SELECT * FROM news"; 
$sql.= " WHERE parts = '$parts'  and  del = 0  order by id desc";
$conn=mysql_query($sql); 	
while($rs=mysql_fetch_array($conn)){	
$s=$s+1;
$c=(intval($_SESSION["authorized"]) & intval($rs["kind"])  );
//if( $c == $rs["kind"] or $rs["kind"]==0)
{
?>
<li><a href="news_show.php?id=<?=$rs["id"]?>"><img src="news/<?=$rs["photo"]?>" alt="<?=$rs["title"]?>(點擊看詳細)"  title="<?=$rs["title"]?>"></a></li>
                    
 <? } }?>                   
				</ul>
			</div>
		</div>
	</div>
    <h1>
<?=$title?>
</caption>
</body>

</html>