<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<style type="text/css">

	#abgne_float_ad {
		display: none;
		position: absolute;
	}
	
	
	#abgne_float_ad .abgne_close_ad {
		display: block;
		text-align: right;
		cursor: pointer;
		font-size: 12px;
	}
	
	#abgne_float_ad_left {
		display: none;
		position: absolute;
	}
	#abgne_float_ad_left .abgne_close_ad_left {
		display: block;
		text-align: right;
		cursor: pointer;
		font-size: 12px;
	}
	
	#abgne_float_ad a img {
		border: none;
	}
	#abgne_float_ad_left a img {
		border: none;
	}

</style>

<script type="text/javascript">
	// 當網頁載入完
$(window).load(function(){
var $win = $(window),
$ad = $('#abgne_float_ad').css('opacity', 0).show(),	
$ad_left= $('#abgne_float_ad_left').css('opacity', 0).show(),	// 讓廣告區塊變透明且顯示出來
_width = $ad.width(),
_height = $ad.height(),
_diffY = 20, _diffX = 20,	// 距離右及上方邊距
_moveSpeed = 0;	// 移動的速度

// 先把 #abgne_float_ad 移動到定點
$ad.css({
top: _diffY,	// 往上
left: $win.width() - _width - _diffX,
opacity: 1
});
$ad_left.css({
top: _diffY,	// 往上
left:  _diffX,	// 往左
opacity: 1
});
		
// 幫網頁加上 scroll 及 resize 事件
$win.bind('scroll resize', function(){
var $this = $(this);

// 控制 #abgne_float_ad 的移動
$ad.stop().animate({
top: $this.scrollTop() + _diffY,	// 往上
left: $this.scrollLeft() + $this.width() - _width - _diffX
}, _moveSpeed);

$ad_left.stop().animate({
top: $this.scrollTop() + _diffY,	// 往上
left: $this.scrollLeft() + _diffX	// 往左
}, _moveSpeed);
}).scroll();	// 觸發一次 scroll()
		

	
// 關閉廣告
$('#abgne_float_ad .abgne_close_ad').click(function(){
$ad.hide();
});

$('#abgne_float_ad_left .abgne_close_ad_left').click(function(){
$ad_left.hide();
});
	});
</script>

<?
include("2014_admin/config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;
$sql = "select * from abgne where is_right = 1 order by upload_time desc limit 1  "; 
$conn=mysql_query($sql);
$row=mysql_fetch_array($conn);

$sql_left = "select * from abgne where is_right = 0 order by upload_time desc limit 1  ";
$left=mysql_query($sql_left);
$row_left=mysql_fetch_array($left);

?>

<div id="abgne_float_ad"  style="z-index:999">
<a href="<?=$row["link"]?>" target="_blank">
<img src="abgne/<?=$row["pic_name"]?>" width="99" height="266" alt="">
</a>
<span class="abgne_close_ad">關閉廣告 [X]</span>
</div>
    
<div id="abgne_float_ad_left"  style="z-index:999">
<a href="<?=$row_left["link"]?>" target="_blank">
<img src="abgne/<?=$row_left["pic_name"]?>" width="99" height="266" alt="">
</a>
<span class="abgne_close_ad_left">關閉廣告 [X]</span>
</div>