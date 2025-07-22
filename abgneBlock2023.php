
<script>
$(document).ready(function() {
	$('#abgneBlock').slick({
		dots: true,
		infinite: true,
		autoplay:true,
  		autoplaySpeed:3000,
		slidesToShow: 1,
		adaptiveHeight: false,
		responsive: [{
        breakpoint: 880,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      	}]
	});
});
</script>
<div id="abgneBlock" class="slick-slider">
<?php
include("2014_admin/config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

$sql = "select * from abgneblock where yuko= 0 order by upload_time desc limit 6 ";
$conn=mysql_query($sql); 	
while($row=mysql_fetch_array($conn))
{
if($row["link"]!="" ){
	echo '<div><a href="'.$row["link"].'" target="_blank"><img src="http://www.colmax.com.tw/abgneblock/'.$row["pic_name"].'" ></a></div>';
}
else{
	echo '<div><img src="http://www.colmax.com.tw/abgneblock/'.$row["pic_name"].'"></div>';
}

}
?>
</div>