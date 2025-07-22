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
           $('.address-zone').ajaddress({ city: "<?=$_REQUEST["city"]?>",county: "<?=$_REQUEST["county"]?>"});
        });
    </script>
</head>

<style type="text/css">
*{font-family:Tahoma, Arial, Helvetica, Sans-serif;}
table{
width:700px;
margin:0px auto;
font:Georgia 11px;
font-size:14px;
color:#333333;
text-align:center;
border-collapse:collapse;/*细线表格*/
}
table td{
border:1px solid #999;/*细线条颜色*/
height:22px;
}
caption{text-align:left;font-size:12px;font-weight:bold;margin:0 auto;}
tr.t1 td {background-color:#fff;}/* 交替行第一行的背景色 */
tr.t2 td {background-color:#eee;}/* 交替行第二行的背景色 */
tr.t3 td {background-color:#ccc;}/* 鼠标经过时的背景色 */
th,tfoot tr td{font-weight:bold;text-align:center;background:#c5c5c5;}
th{line-height:30px;height:30px;}
tfoot tr td{background:#fff;line-height:26px;height:26px;}
thead{border:1px solid #999;}
thead tr td{text-align:center;}
#page{text-align:center;float:right;}
#page a,#page a:visited{width:60px;height:22px;line-height:22px;border:1px black solid;display:block;float:left;margin:0 3px;background:#c9c9c9;
text-decoration:none;}
#page a:hover{background:#c1c1c1;text-decoration:none;}
.grayr {padding:2px;font-size:11px;background:#fff;float:right;}
.grayr a {padding:2px 5px;margin:2px;color:#000;text-decoration:none;;border:1px #c0c0c0 solid;}
.grayr a:hover {color:#000;border:1px orange solid;}
.grayr a:active {color:#000;background: #99ffff}
.grayr span.current {padding:2px 5px;font-weight:bold; margin:2px; color: #303030;background:#fff;border:1px orange solid;}
.grayr span.disabled {padding:2px 5px;margin:2px;color:#797979;background: #c1c1c1;border:1px #c1c1c1 solid;}
</style>
<?php  
include "2014_admin/config.php";

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;
$sql = "select num from map_setting where id=1";
$conn=mysql_query($sql);
$rs=mysql_fetch_array($conn);
$map_num = $rs['num'];

 //預設每頁筆數(依需求修改)
 $pageRow_records = $map_num;
 //預設頁數
 $num_pages = 1;
 //若已經有翻頁，將頁數更新
 if (isset($_GET['page'])) {
   $num_pages = $_GET['page'];
 }
 //本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
 $startRow_records = ($num_pages -1) * $pageRow_records;
 //未加限制顯示筆數的SQL敘述句
 $sql_query = "SELECT * FROM map where del=0";
 if($_REQUEST["city"]<>"")
{
$sql1= " and address like '%".$_REQUEST["city"]."%'";
if($_REQUEST["county"]<>""){
$str = $_REQUEST["city"].$_REQUEST["county"];
$str = delhtmltags($str);
$sql1= " and address like '%".$str."%'";
}
}
$sql_query=$sql_query.$sql1." order by new_num"; 
 
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

 <table>
 <caption>
 <h1>經銷據點</h1>
    <div class="address-zone">
    <form method="post" action="map_new.php" id="form1" name="form1">
        <select name="city" class="city">
			<option value="">請選擇</option>
		</select>
         <select class="county" name="county">
			<option value="">請選擇</option>
            </select>
          <input type="submit"  value="搜尋"/>
        </form>
    </div></caption>
 <thead>
 <th>店家</th>
<th>電話</th>
<th>地址</th>
</thead>
<tbody id="tab">
<?php
$i=0;
$rs=mysql_fetch_array($result);
if($rs){
echo '<tr>';
echo "<td>".$rs["custname"]."</td>";
echo "<td>".$rs["tel"]."</td>";
echo "<td>";
echo $rs["address"];
echo '</td></tr>';
while($row=mysql_fetch_array($result))
{
echo '<tr>';
echo "<td>".$row["custname"]."</td>";
echo "<td>".$row["tel"]."</td>";
echo '<td>';
echo $row["address"];
echo '</td></tr>';
}
}
else
echo '<h1 style="color:#F00;" align="center">經銷據點更新中</h1>';
?>
</tbody>
<td colspan="3">
<div class="grayr">                      
  <?php
// 顯示的頁數範圍
$range = 3;
  
// 若果正在顯示第一頁，無需顯示「前一頁」連結
if ($num_pages > 1) {
    // 使用 << 連結回到第一頁
    echo " <a href={$_SERVER['PHP_SELF']}?page=1&city=".$_REQUEST["city"]."&county=".$_REQUEST["county"]."><<</a> ";
    // 前一頁的頁數
    $prevpage = $num_pages - 1;
    // 使用 < 連結回到前一頁
    echo " <a href={$_SERVER['PHP_SELF']}?page=".$prevpage."&city=".$_REQUEST["city"]."&county=".$_REQUEST["county"]."><</a> ";
} // end if
  
// 顯示當前分頁鄰近的分頁頁數
for ($x = (($num_pages - $range) - 1); $x < (($num_pages + $range) + 1); $x++) {
    // 如果這是一個正確的頁數...
    if (($x > 0) && ($x <= $total_pages)) {
        // 如果這一頁等於當前頁數...
        if ($x == $num_pages) {
            // 不使用連結, 但用高亮度顯示
            echo " <span class='current'>".$x."</span> ";
            // 如果這一頁不是當前頁數...
        } else {
            // 顯示連結
            echo " <a href=map_new.php?page=".$x."&city=".$_REQUEST["city"]."&county=".$_REQUEST["county"].">".$x."</a> ";
        } // end else
    } // end if
} // end for
  
// 如果不是最後一頁, 顯示跳往下一頁及最後一頁的連結
if ($num_pages != $total_pages) {
    // 下一頁的頁數
    $nextpage = $num_pages + 1;
    // 顯示跳往下一頁的連結
    echo " <a href={$_SERVER['PHP_SELF']}?page=".$nextpage."&city=".$_REQUEST["city"]."&county=".$_REQUEST["county"].">></a> ";
    // 顯示跳往最後一頁的連結
    echo " <a href={$_SERVER['PHP_SELF']}?page=".$total_pages."&city=".$_REQUEST["city"]."&county=".$_REQUEST["county"].">>></a> ";
} // end if
?>
</div>       
</table>

<br />
</body>
</html>
<?php
function delhtmltags($string){
	$string = preg_replace("'([\r\n])[\s]+'", "", $string);               //去掉空白字符
        $string = preg_replace("'&(quot|#34);'i", "", $string);               //替换HTML实体
        $string = preg_replace("'&(amp|#38);'i", "", $string);
        $string = preg_replace("'&(lt|#60);'i", "<", $string);
        $string = preg_replace("'&(gt|#62);'i", ">", $string);
        $string = preg_replace("'&(nbsp|#160);'i", "", $string);
        $string = preg_replace("'<script[^>]*?>.*?</script>'si", "", $string);//去掉javascript
        $string = preg_replace("'<[\/\!]*?[^<>]*?>'si", "", $string);         //去掉HTML标记
        $string = preg_replace ('/ |　/is', '', $string);                     //去掉多余空格

return $string;
    }
?>
<script type="text/javascript">
/*<!--
var Ptr=document.getElementById("tab").getElementsByTagName("tr");
function $a() {
    for (i=1;i<Ptr.length+1;i++) { 
    Ptr[i-1].className = (i%2>0)?"t1":"t2"; 
    }
}
window.onload=$a;
for(var i=0;i<Ptr.length;i++) {
    Ptr[i].onmouseover=function(){
    this.tmpClass=this.className;
    this.className = "t3";
    
    };
    Ptr[i].onmouseout=function(){
    this.className=this.tmpClass;
    };
}
//-->*/
</script>
