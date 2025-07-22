<?php
// Expires in the past
header("Expires: Mon, 26 Jul 1990 05:00:00 GMT");
// Always modified
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
// HTTP/1.1
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
// HTTP/1.0
header("Pragma: no-cache");
include("2014_admin/config.php");
?>

<html>
<head>
<title>歌美斯有限公司</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<style>
.centered {
  display: flex;
  justify-content: center;
  width: 1350px;
  margin-left: auto;
  margin-right: auto;
  /*transform: translate(-50%, -50%);*/
}
.blue {
  background-color: #2ea9df;
}
.white {
  background-color: #2ea9df;
}
.info{
	color:white;
	font-size:48px;
	margin-left:15px;
}
#footerbk {
width:100%;
height:276px;
float:none;
margin-top:-240px;
min-width:1350px;
background: #2ea9df;
}
#footerbk2 {
width:100%;
height:45px;
float:none;
min-width:1350px;
background: #2ea9df;
}

#headerbk {
width:100%;
height:130px;
min-width:1350px;
position: absolute;
top: 0;
left: 0;
margin-top:0px;
background: #2ea9df;
z-index: -1;
}
.highlight-table {
	width: 100%;
	max-width: 1200px;
	height:2060px;
	display: inline-block;
}

.highlight-table td:focus,
.highlight-table th:focus {
  outline: none;
}
.copyright{
	font-size:18px;
	padding-left:150px;
	font-family:fantasy;
}
#news{
	font-size:26px;
	padding-left:100px;
	height:352px;
	color:black;
}
#news a {
  color: black;
  text-decoration: none;
}

#news li {
  position: relative;
  line-height:70px;
}

#news li::before {
  content: "";
  position: absolute;
  bottom: 0px; /* 调整底线位置 */
  left: -50;
  width: 100%;
  height: 2px; 
  background-color: black; 
}
.top-aligned {
  vertical-align: top;
  width:280px;
  height:382px;
  overflow: hidden;
  font-size:26px;
}
.title{
  color: white;
  text-decoration: none;
  font-size:26px;
  line-height:10px;
  font-weight:bold;
}
</style>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="css/style.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
$(document).ready(function() {
	$('#fan').fancybox({
		//settings
			'type' : 'iframe',
			maxHeight: 400,
			minHeight: 100,
			width:690,
			fitToView: true,
			autoSize: false,
			modal: false,
			autoScale: true,
		 }
	);
});
</script>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div id="headerbk"></div>
<div class="centered">
<table id="___01" class="highlight-table" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td rowspan="2" class="blue" style="max-width:217px;">
			<img src="2023images/colmax2023_1_01.png" width="217" height="130" alt="">
		</td>
	</tr>
	<tr style="max-width:966px;">
		<td width="122" height="55" style="min-width:138px;">
			<a href="http://www.colmax.com.tw/colmax.php?kind=10" class="title">
				最新消息
				<!-- <img src="2023images/colmax2023_1_03.png" width="122" height="55" alt=""> -->
			</a>
		</td>
		<td width="123" height="55" style="min-width:138px;">
		    <div class="nav_box">
			<ul>
				<li style="width:138px;height:30px;margin-bottom:-20px"> 
				<a href="#" class="title">
				<!-- <img src="2023images/colmax2023_1_04.png" width="123" height="55" alt=""> -->
				代理品牌
				</a>
				  <?php include "vendor2023.php";?>
			    </li>
			</ul>
			</div>
		</td>
		<td style="min-width:138px;">
			<a href="http://www.colmax.com.tw/colmax.php?kind=14" class="title" >
			 <!-- <img src="2023images/colmax2023_1_05.png" width="124" height="55" alt=""> -->
			目錄下載
			</a>
		</td>
		<td width="125" height="55" style="min-width:138px;">
			<a href="http://www.colmax.com.tw/colmax.php?kind=16" class="title">
			  <!-- <img src="2023images/colmax2023_1_06.png" width="121" height="55" alt=""> -->
			  經銷據點
			</a>
		</td>
		<td  width="125" height="55" style="min-width:138px;">
			<a href="http://www.colmax.com.tw/colmax.php?kind=11" class="title">
			 <!-- <img src="2023images/colmax2023_1_07.png" width="122" height="55" alt=""> -->
			 原廠連結
			</a>
		</td>
		<td width="124" height="55" style="min-width:138px;"> 
			<a href="http://www.colmax.com.tw/colmax.php?kind=13" class="title">
			<!-- <img src="2023images/colmax2023_1_08.png" width="124" height="55" alt=""> -->
			聯絡我們
			</a>
		</td>
		<td width="123" height="55" style="min-width:138px;">
			<a href="http://www.colmax.com.tw/member/index.php" target="_blank" class="title">
				<!-- <img src="2023images/colmax2023_1_09.png" width="123" height="55" alt=""> -->
				店家專區
			</a>
		</td>
	</tr>
	<tr>
		<td>
			<!--輪播-->
			<!-- <img src="2023images/colmax2023_1_11.png" width="1100" height="594" alt=""> -->
			<?php include "abgneBlock2023.php";?>
		</td>
		<td>
			<img src="2023images/&#x9593;&#x8ddd;.gif" width="1" height="594" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="2023images/&#x9593;&#x8ddd;.gif" width="1" height="32" alt="">
		</td>
	</tr>
	<tr>
		<td  width="201" height="56">
			<img src="2023images/colmax2023_1_14.png" width="201" height="56" alt="" style="margin-left:0px">
		</td>
	</tr>
	<tr>
		<td width="1100" height="352" style="min-width:1100px;">
			<!-- <img src="2023images/colmax2023_1_16.png" width="1100" height="352" alt=""> -->
				<div id="news" align="left">
				 	<ul> 
					<?php
					$sql = "SELECT * FROM news "; 
					$sql.= " WHERE 1 and del = 0 limit 4";
					$conn=mysql_query($sql); 	
					while($rs=mysql_fetch_array($conn)){	
					?>
					<li><a href="<?=$rs["link"]?>"><?=$rs["title"]?></a></li>
                  <?php } ?>
				  </ul>
                </div> 
		</td>
		<td>
			<img src="2023images/&#x9593;&#x8ddd;.gif" width="1" height="352" alt=""></td>
	</tr>
	<tr  style="max-width:1200px;">
		<td  width="265" height="62" style="background-image: url('2023images/colmax2023_1_18.png');background-repeat: no-repeat;">
			<!-- <img src="2023images/colmax2023_1_18.png" width="265" height="62" alt=""> -->
			<?php
			$sql = "SELECT name FROM info WHERE id=1"; 
			$conn=mysql_query($sql); 	
			$row=mysql_fetch_array($conn);
			?>
			<span class="info"><?=$row['name']?></span>
		</td>
	</tr>
	<tr style="max-width:1200px;">
		<td>
			<img src="2023images/&#x9593;&#x8ddd;.gif" width="1" height="31" alt=""></td>
		</tr>
		<?php
		$sql = "SELECT * FROM info WHERE 1  and del = 0 and id != 1 order by sort_num desc"; 
		$conn=mysql_query($sql);
		$photo = [];
		$name = [];
		$summary = [];
		$url = [];
		while($row=mysql_fetch_array($conn)){
			$photo[] = $row['photo'];
			$name[] = $row['name'];
			$summary[] = $row['summary'];
			$url[] = $row['url'];
		}
		?>
		<tr style="max-width:1200px;">
		<td>
			<?php
				if(isset($photo[0])){
					echo '<img src="info/'.$photo[0].'" width="280" height="185" alt="">';
				}
			?>
			<!-- <img src="2023images/colmax2023_1_21.png" width="217" height="144" alt=""> -->
		</td>
		<td>
			<?php
				if(isset($photo[1])){
					echo '<img src="info/'.$photo[1].'" width="280" height="185" alt="">';
				}
			?>	
		</td>
		<td>
			<!-- <img src="2023images/colmax2023_1_25.png" width="218" height="144" alt="">-->
			<?php
				if(isset($photo[2])){
					echo '<img src="info/'.$photo[2].'" width="280" height="185" alt="">';
				}
			?>	
		</td>
		<td>
		     <?php
				if(isset($photo[3])){
					echo '<img src="info/'.$photo[3].'" width="280" height="185" alt="">';
				}
			?>	
		</td>
	</tr>
	<tr style="max-width:1200px;">
		<td class="top-aligned">
		    <?php
				$key = 0;
				if(isset($name[$key])){
					echo '<h2>'.$name[$key].'</h2>';
				}
			?>	
			<?php
				if(isset($summary[$key])){
					echo substr_text($summary[$key],0,70);
				}
			?>
			<?php
				if(isset($url[$key]) && $url[$key]!=null && $url[$key] != ''){
					echo '...<a href="'.$url[$key].'" style=" color: black;font-style:italic; ">繼續閱讀</a>';
				}
			?>	
		</td>
		<td class="top-aligned">
		   <?php
		   		$key = 1;
				if(isset($name[$key])){
					echo '<h2>'.$name[$key].'</h2>';
				}
			?>	
			<?php
				if(isset($summary[$key])){
					echo substr_text($summary[$key],0,70);
				}
			?>
			<?php
				if(isset($url[$key]) && $url[$key]!=null && $url[$key] != ''){
					echo '...<a href="'.$url[$key].'" style=" color: black;font-style:italic; ">繼續閱讀</a>';
				}
			?>		
		</td>
		<td class="top-aligned">
			<?php
				$key = 2;
				if(isset($name[$key])){
					echo '<h2>'.$name[$key].'</h2>';
				}
			?>	
			<?php
				if(isset($summary[$key])){
					echo substr_text($summary[$key],0,70);
				}
			?>
			<?php
				if(isset($url[$key]) && $url[$key]!=null && $url[$key] != ''){
					echo '...<a href="'.$url[$key].'" style=" color: black;font-style:italic; ">繼續閱讀</a>';
				}
			?>	
		</td>
		<td class="top-aligned">
			<?php
				$key = 3;
				if(isset($name[$key])){
					echo '<h2>'.$name[$key].'</h2>';
				}
			?>	
			<?php
				if(isset($summary[$key])){
					echo substr_text($summary[$key],0,70);
				}
			?>
			<?php
				if(isset($url[$key]) && $url[$key]!=null && $url[$key] != ''){
					echo '...<a href="'.$url[$key].'" style=" color: black;font-style:italic; ">繼續閱讀</a>';
				}
			?>	
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="2023images/colmax2023_1_36.png" width="92" height="34" alt="">
		</td>
	</tr>
	<tr>
		<td >
			<img src="2023images/colmax2023_1_39.png" width="238" height="8" alt=""></td>
		<td>
		    <a href="https://www.facebook.com/ColmaxBike/" target="_blank" style="margin-left:10px;">
			<img src="2023images/colmax2023_1_40.png" width="46" height="46" alt="">
			</a>
		</td>
		<td>
		 <!-- <img src="2023images/colmax2023_1_41.png" width="16" height="92" alt=""> -->
		</td>
		<td>
			<a href="https://www.youtube.com/channel/UCmeA1zQLN9Ho-BmeWsZcbIQ" target="_blank" style="margin-left:0px;">
				<img src="2023images/colmax2023_1_42.png" width="44" height="43" alt="">
			</a>
		</td>
		<td>
			<!-- <img src="2023images/colmax2023_1_43.png" width="11" height="92" alt=""> -->
		</td>
		<td>
			<a href="http://www.colmax.com.tw/colmax.php?kind=13" target="_blank" style="margin-left:-15px;">
				<img src="2023images/colmax2023_1_44.png" width="69" height="46" alt="">
			</a>
		</td>
		<td>
			<!-- <img src="2023images/colmax2023_1_46.png" width="311" height="92" alt=""> -->
			<span style=" color: black; font-size:24px;">歌美斯有限公司</span><br>
			<span style=" color: black; font-size:24px;">電話：06-205-5300</span></br>
			<span style=" color: black; font-size:24px;">傳真：06-205-6901</span><br>
			<span style=" color: black; font-size:24px;">E-mai：sales@colmax.com.tw</span>
		</td>
	</tr>
	<tr>
		<td  class="blue">
			<a href="http://www.colmax.com.tw/colmax.php?kind=14" style=" color: black;font-size:26px; ">目錄下載</a>
            <br>
            <a href="http://www.colmax.com.tw/colmax.php?kind=9" style=" color: black;font-size:26px; ">關於我們</a>
            <br>
            <a href="http://www.colmax.com.cn/" target="_blank" style=" color: black; font-size:26px;">
				歌美斯(青島)/COLMAX(QD)	
			</a>
		</td>
		<td>
			<img src="2023images/colmax2023_1_49.png" width="38" height="84" alt="">
		</td>
	</tr>
	<tr>
		<td>
			<span class="copyright">欲轉載、引用任何本網站全部或部份之訊息，請事先取得歌美斯書面之同意，違者依法追究相關法律責任。</span><br/>
			<span class="copyright">Copyright©2023 COLMAX BICYCLE TAIWAN LIMITEC ALL Rights Reserved.</span>
			<!-- <img src="2023images/colmax2023_1_53.png" width="1098" height="122" alt=""> -->
		</td>
	</tr>
</table>
<!-- End Save for Web Slices -->
</div>
<div id="footerbk"></div>
</body>

</html>

<?php
function substr_text($str, $start=0, $length, $suffix="")
{
$charset="utf-8";
	if(function_exists("mb_substr")){
			return mb_substr($str, $start, $length, $charset).$suffix;
	}
	elseif(function_exists('iconv_substr')){
	return iconv_substr($str,$start,$length,$charset).$suffix;
	}
}
?>