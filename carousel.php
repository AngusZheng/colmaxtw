<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<style type="text/css">
	.abgne-yahoo-carousel {
	width: 814px;
	height: 215px;
	padding: 8px;
	position: relative;
}
.abgne-yahoo-carousel * {
	margin: 0;
	padding: 0;
}
.abgne-yahoo-carousel ul, .abgne-yahoo-carousel li {
	list-style: none;
}
.abgne-yahoo-carousel a img {
	border: none;
	width: 266px;
	height:100%;
}
.abgne-yahoo-carousel h3 {
	font-size: 14px;
	color:#FFF;
	height: 30px;
}
.abgne-yahoo-carousel .page {
	position: absolute;
	top: 12px;
	right: 80px;
}
.abgne-yahoo-carousel .btn {
	position: absolute;
	top: 10px;
	right: 5px;
	height: 20px;
}
.abgne-yahoo-carousel .btn a {
	width: 31px;
	height: 24px;
	float: left;
	text-indent: -9999px;
}
.abgne-yahoo-carousel .btn a.prev {
	background: url(images/btn.gif) no-repeat 0 -42px;
}
.abgne-yahoo-carousel .btn a.next {
	background: url(images/btn.gif) no-repeat 0 0;
}
.abgne-yahoo-carousel .frame {
	position: relative;
	overflow: hidden;
	width: 814px;	/* (li 的寬度 + li 的邊框寬度 * 2 ) * 一次要顯示的數量 + li 的右邊界 * (一次要顯示的數量 - 1) */
	height: 200px;
}
.abgne-yahoo-carousel ul {
	width: 99999px;
	position: absolute;
}
.abgne-yahoo-carousel li {
	float: left;
	width: 266px;
	height: 200px;
	margin-right:5px;
	position: relative;
	border: 1px solid #333;
}
.abgne-yahoo-carousel li .thumb, .abgne-yahoo-carousel li .ovrly, .abgne-yahoo-carousel li h3 {
	position: absolute;
}
.abgne-yahoo-carousel li .ovrly, .abgne-yahoo-carousel li h3 {
	width: 100%;
	height: 40px;
	line-height:20px;
	text-align: center;
	bottom: 0;
}
.abgne-yahoo-carousel li .ovrly {
	background: #000;
}
.abgne-yahoo-carousel li h3 a {
	color: #fff;
}
.abgne-yahoo-carousel li h3 a:hover {
	color: #f90;
}

</style>
<script type="text/javascript">
	$(function(){
		$('.abgne-yahoo-carousel').each(function(){
			// 先取得相關的元素及寬度等資料
			var $this = $(this), 
				$page = $this.find('.page'), 
				$btn = $this.find('.btn'), 
				_frameWidth = $this.find('.frame').width(), 
				$carousel = $this.find('ul'), 
				$items = $carousel.find('li'), 
				_itemLength = $items.length, 
				_set = Math.ceil(_frameWidth / $items.outerWidth(true)), 
				_count = Math.ceil(_itemLength / _set), 
				_width = _set * $items.outerWidth(true) * -1, 
				_speed = 400, _opacity = 0.75, _index = 0;
			
			// 用來顯示目前已顯示及總資料筆數資訊
			$page.html('1 - ' + (_set < _itemLength ? _set : _itemLength) + ' / ' + _itemLength);

			// 幫每一個 li 加上標題及遮罩
			$items.each(function(){
				var $this = $(this), 
					_href = $this.find('a').attr('href'), 
					_title = $this.find('img').attr('title');
				
				$this.append('<div class="ovrly"></div>' +
					'<h3>' + 
						'' + _title + '' + 
					'</h3>').find('.ovrly').css('opacity', _opacity);
			});

			// 當按了上下頁的按鈕時
			$btn.find('.prev, .next').click(function(e){
				// 計算要顯示第幾組
				_index = Math.floor((e.target.className == 'prev' ? _index - 1 + _count : _index + 1) % _count);
				var _lastNum = _set * (_index + 1);
				$page.html((_set * _index + 1) + ' - ' + (_lastNum < _itemLength ? _lastNum : _itemLength) + ' / ' + _itemLength);
				
				// 進行動畫
				$carousel.stop().animate({
					left: _index * _width
				}, _speed);

				e.preventDefault();
			}).focus(function(){
				this.blur();
			});
		})
	});
</script>

<div class="abgne-yahoo-carousel" >
<h2>代理品牌 Brands <a href="colmax.php?kind=11" >更多..</a></h2>
<span class="page"></span>
<div class="btn">
<a href="#" class="prev">Prev</a>
<a href="#" class="next">Next</a>
</div>
<div class="frame">
<ul>
<?
include("2014_admin/config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

$sql = "select * from carousel where del = 0 order by brand_name asc ";
$conn=mysql_query($sql); 	
while($row=mysql_fetch_array($conn))
{

echo '<a href="'.$row["link"].'"  class="thumb" ><li><img title="'.$row["remarks"].'" src="carousel/'.$row["pic_name"].'" ></li></a>';

}
?>

</ul>
</div>
</div>