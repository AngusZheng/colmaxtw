<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>map</title>
</head>
<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.2.js'></script>   
<script src="http://maps.google.com/maps/api/js?sensor=false&language=zh_TW" type="text/javascript"></script>
      <script src="js/aj-address.js" type="text/javascript"></script>
    <script type="text/javascript"> 
        $(function () {
            $('.address-zone').ajaddress();
        });
    </script>
</head>
    <div class="address-zone">
    <form method="post" action="map_new.php">
        <select name="city" class="city">
			<option value="">請選擇</option>
		</select>
          <input type="submit"  value="搜尋"/>
        </form>
    </div> 
 <style>
 .addr{
	 border:1px double;
	 width:350px;
	 
 }
 </style>
<?php  
include "2014_admin/config.php"

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

 //預設每頁筆數(依需求修改)
 $pageRow_records = 8;
 //預設頁數
 $num_pages = 1;
 //若已經有翻頁，將頁數更新
 if (isset($_GET['page'])) {
   $num_pages = $_GET['page'];
 }
 //本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
 $startRow_records = ($num_pages -1) * $pageRow_records;
 //未加限制顯示筆數的SQL敘述句
 $sql_query = "SELECT * FROM map where 1";
 if($_REQUEST["city"]<>"")
{
$sql1= " and address like '%".$_REQUEST["city"]."%'";
/*if($_POST["county"]<>"")
$sql1= " and address like '%".$_POST["city"].$_POST["county"]."%'";*/
}
$sql_query=$sql_query.$sql1; 
 
 //加上限制顯示筆數的SQL敘述句，由本頁開始記錄筆數開始，每頁顯示預設筆數
 $sql_query_limit = $sql_query." LIMIT ".$startRow_records.", ".$pageRow_records;
 //以加上限制顯示筆數的SQL敘述句查詢資料到 $result 中
 $result = mysql_query($sql_query_limit);
 //以未加上限制顯示筆數的SQL敘述句查詢資料到 $all_result 中
 $all_result = mysql_query($sql_query);
 //計算總筆數
 $total_records = mysql_num_rows($all_result);
 //計算總頁數=(總筆數/每頁筆數)後無條件進位。
 $total_pages = ceil($total_records/$pageRow_records);
 $link='';
?>

<body>
<div style="float:left;" width="350px">
<?php
$i=0;
$rs=mysql_fetch_array($result);
echo '<div class="addr">';
echo $rs["custname"]."<br>".$rs["tel"]."<br>";
echo '<a href="mapframe.php?lat='.$rs["lat"].'&lng='.$rs["lng"].'&custname='.$rs["custname"].'&tel='.$rs["tel"].'&address='.$rs["address"].' " target="mapframe">';
echo $rs["address"];
echo "</a>";
echo '</div>';
while($row=mysql_fetch_array($result))
{
echo '<div class="addr">';
echo $row["custname"]."<br>".$row["tel"]."<br>";
echo '<a href="mapframe.php?lat='.$row["lat"].'&lng='.$row["lng"].'&custname='.$row["custname"].'&tel='.$row["tel"].'&address='.$row["address"].' " target="mapframe">';
echo $row["address"];
echo "</a>";
echo '</div>';
}

?>
</div>
<iframe src="mapframe.php?lat=<?=$rs["lat"]?>&lng=<?=$rs["lng"]?>&custname=<?=$rs["custname"]?>&tel=<?=$rs["tel"]?>&address=<?=$rs["address"]?>" width="1024px" height="768px" style="float:right;" id="mapframe" name="mapframe"></iframe>
<table border="0" align="center">
<tr><td>                        
<?php
// 顯示的頁數範圍
$range = 3;
  
// 若果正在顯示第一頁，無需顯示「前一頁」連結
if ($num_pages > 1) {
    // 使用 << 連結回到第一頁
    echo " <a href={$_SERVER['PHP_SELF']}?page=1><<</a> ";
    // 前一頁的頁數
    $prevpage = $num_pages - 1;
    // 使用 < 連結回到前一頁
    echo " <a href={$_SERVER['PHP_SELF']}?page=".$prevpage."&city=".$_REQUEST["city"]."><</a> ";
} // end if
  
// 顯示當前分頁鄰近的分頁頁數
for ($x = (($num_pages - $range) - 1); $x < (($num_pages + $range) + 1); $x++) {
    // 如果這是一個正確的頁數...
    if (($x > 0) && ($x <= $total_pages)) {
        // 如果這一頁等於當前頁數...
        if ($x == $num_pages) {
            // 不使用連結, 但用高亮度顯示
            echo " [<b>".$x."</b>] ";
            // 如果這一頁不是當前頁數...
        } else {
            // 顯示連結
            echo " <a href=map_new.php?page=".$x."&city=".$_REQUEST["city"].">".$x."</a> ";
        } // end else
    } // end if
} // end for
  
// 如果不是最後一頁, 顯示跳往下一頁及最後一頁的連結
if ($num_pages != $total_pages) {
    // 下一頁的頁數
    $nextpage = $num_pages + 1;
    // 顯示跳往下一頁的連結
    echo " <a href={$_SERVER['PHP_SELF']}?page=".$nextpage."&city=".$_REQUEST["city"].">></a> ";
    // 顯示跳往最後一頁的連結
    echo " <a href={$_SERVER['PHP_SELF']}?page=".$total_pages."&city=".$_REQUEST["city"].">>></a> ";
} // end if
?>
</td></tr>
</table>
</body>
</html>