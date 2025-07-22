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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
<link rel="stylesheet" href="css/style.css?v=1.2" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
$(document).ready(function() {
// 監聽視窗滾動事件
    window.addEventListener('scroll', function() {
    var targetElement = document.getElementById('vendor_block');

    // 獲取視窗的滾動位置
    var scrollY = window.scrollY || window.pageYOffset;

    // 如果滾動位置超過特定值（例如 200），則隱藏元素；否則顯示元素
    if (scrollY > 100) {
        targetElement.style.display = 'none'; // 隱藏元素
    } else {
        targetElement.style.display = 'block'; // 顯示元素
    }
    });
});
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div class="page-container">
    <div id="headerbk">
          <div class="nav_box">
                <img src="2023images/colmax2023_1_01.png" width="217" height="130" alt="">
                <ul>
                    <li><a href="http://www.colmax.com.tw/colmax.php?kind=10" class="title">
                            最新消息
                        </a>
                    </li>
                    <li> 
                        <a href="#" class="title">
                        代理品牌
                        </a>
                            <?php include "vendor2023.php";?>
                        </li>
                    <li>
                    <a href="http://www.colmax.com.tw/colmax.php?kind=14" class="title" >
                        目錄下載
                    </a>
                    </li>
                    <li>
                    <a href="http://www.colmax.com.tw/colmax.php?kind=16" class="title">經銷據點
                    </a>
                    </li>
                    <li>
                    <a href="http://www.colmax.com.tw/colmax.php?kind=11" class="title">
                        <!-- <img src="2023images/colmax2023_1_07.png" width="122" height="55" alt=""> -->
                        原廠連結
                    </a>
                    </li>
                    <li>
                    <a href="http://www.colmax.com.tw/colmax.php?kind=13" class="title">
                        <!-- <img src="2023images/colmax2023_1_08.png" width="124" height="55" alt=""> -->
                        聯絡我們
                        </a>
                    </li>
                    <li>
                    <a href="http://www.colmax.com.tw/member/index.php" target="_blank" class="title">
                        <!-- <img src="2023images/colmax2023_1_09.png" width="123" height="55" alt=""> -->
                        店家專區
                    </a>
                    </li>
                </ul>
            </div>
        </div>
        <?php include('carousel2023.php') ?>

    <div class="centered">
        <div id="news">
            <img src="2023images/colmax2023_1_14.png" width="201" height="56" alt="" style="margin-left:0px">
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
        <div id="info">
            <?php
                $sql = "SELECT * FROM info WHERE 1  and del = 0 and id != 1 order by sort_num desc limit 4"; 
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

			<?php
			$sql = "SELECT name FROM info WHERE id=1"; 
			$conn=mysql_query($sql); 	
			$row=mysql_fetch_array($conn);
			?>
			<p class="info"><?=$row['name']?></p>
            <table width="1250">
                <tr>
                    <?php for($i=0;$i<=3;$i++){ ?> 
                    <td>
                    <?php
                        if(isset($photo[$i])){
                            echo '<img src="info/'.$photo[$i].'" width="280" height="185" alt="">';
                        }
                        ?>
                    </td>
                    <?php } ?>
                <tr>
                <tr class="top-aligned">
                    <?php for($i=0;$i<=3;$i++){ ?> 
                    <td class="summary">
                    <?php
                        if(isset($name[$i])){
                            echo '<h2>'.$name[$i].'</h2>';
                        }
                    ?>
                    <?php
                        if(isset($summary[$i])){
                            echo $summary[$i];
                        }
                    ?>
                    <?php
                        if(isset($url[$i]) && $url[$i]!=null && $url[$i] != ''){
                            echo '...<a href="'.$url[$i].'" style=" color: black;font-style:italic; ">繼續閱讀</a>';
                        }
                    ?>	
                    </td>
                    <?php } ?>
                <tr>
            </table>
        </div>
    </div>
    
    <div id="footerbk">
            <table width="1200" class="footer_table">
                <tr>
                    <td>
                    <img src="2023images/colmax2023_1_36.png" width="92" height="34" alt=""><br>
                    <a href="http://www.colmax.com.tw/colmax.php?kind=14" style=" color: black;font-size:26px; ">目錄下載</a>
                    <br>
                    <a href="http://www.colmax.com.tw/colmax.php?kind=9" style=" color: black;font-size:26px; ">關於我們</a>
                    <br>
                    <a href="http://www.colmax.com.cn/" target="_blank" style=" color: black; font-size:26px;">
                    歌美斯(青島)/COLMAX(QD)	
                    </a>
                    </td>
                    <td>
                    <a href="https://www.facebook.com/ColmaxBike/" target="_blank" style="margin-left:10px;text-decoration: none;">
                     <img src="2023images/colmax2023_1_40.png" width="46" height="46" alt="">
                    </a>
                    <a href="https://www.youtube.com/channel/UCmeA1zQLN9Ho-BmeWsZcbIQ" target="_blank" style="margin-left:10px;text-decoration: none;">
				        <img src="2023images/colmax2023_1_42.png" width="44" height="43" alt="">
                    </a>
                    <a href="http://www.colmax.com.tw/colmax.php?kind=13" target="_blank" style="margin-left:10px;text-decoration: none;">
                        <img src="2023images/colmax2023_1_44.png" width="69" height="46" alt="">
                    </a>
                    </td>
                    <td>
                    <span style=" color: black; font-size:24px;">歌美斯有限公司</span><br>
                    <span style=" color: black; font-size:24px;">電話：06-205-5300</span></br>
                    <span style=" color: black; font-size:24px;">傳真：06-205-6901</span><br>
                    <span style=" color: black; font-size:24px;">E-mai：sales@colmax.com.tw</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                    <span class="copyright">欲轉載、引用任何本網站全部或部份之訊息，請事先取得歌美斯書面之同意，違者依法追究相關法律責任。</span><br/>
			        <span class="copyright">Copyright©2023 COLMAX BICYCLE TAIWAN LIMITEC ALL Rights Reserved.</span>
                </td>
                </tr>
            </table>
    </div>
</div>
</body>

</html>


  <!-- Bootstrap JS (requires jQuery) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
