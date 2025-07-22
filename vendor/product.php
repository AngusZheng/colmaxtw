<?
include("config.php");
if($_GET["vendor"]=="Tacx")
{
echo '<script>location.href="http://www.colmax.com.tw/"</script>'; 
exit;
}
?>
<html>
<head>
<title>歌美斯有限公司</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/brands.css" />
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (page.psd) -->
<div id="top"></div>
<div id="tab_all">
<style>
navigation a span.one, .navigation a:hover span.two {display: inline;}
.navigation a:hover span.one, .navigation a span.two {display: none;}
</style>	
<table width="1100" height="294" border="0" align="center" cellpadding="0" cellspacing="0" id="___01">
	<tr>
		<td colspan="2">
			<img src="images/page_01.gif" width="1100" height="24" alt=""></td>
	</tr>
	<tr>
		<td width="320">
		<?php
	$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
			mysql_query("SET NAMES 'utf8'",$db);
			mysql_select_db($sqlname,$db);
			echo '<a href=""  target="_parent"><img title="" src="vendor_logo/'.$_GET["vendor"].'.jpg"  width="320" height="115"></a>';
			?></td>
		<td width="780" bgcolor="#FFFFFF">
			<div id="menubak">
                               <!--  <div id="search_bk">
                                   <div id="input01"><input type="text" name="q"   id="q" class="q"   placeholder="搜寻.."  style="border: none; font-size:15px; width:220px; height:20px; background:none; color:#666;  margin-top:0px;" onKeyDown="javascript:(function(){if (event.keyCode ==13) send() })()" ></input></div>
                                   <div id="button01"> <button type="submit"  onClick="send();" style="border: none; width:20px; height:20px ; background: transparent url(images_aa/search_icon.png)  no-repeat ;"></button></div>
        </div>       -->                       
            
            
              <div id="topmenu" class="navigation">
           <?
			$sql = "SELECT * FROM link "; 
			$sql.= " WHERE 1 and del = 0 and vender ='".$_GET["vendor"]."' order by order_num";
			$conn=mysql_query($sql); 	
			while($rs=mysql_fetch_array($conn)){	
			
			if($rs["url"]=="" and trim($rs["name"])!="經銷據點")
			$url="index.php?vendor=".$rs["vender"]."&kind=".$rs["id"];
			elseif(trim($rs["name"])=="經銷據點")
			$url="index.php?vendor=".$rs["vender"]."&kind=".$rs["id"]."&map=1";
			else
			$url=$rs["url"];
			
			if($rs["level"] =='')
			{		
			echo '<a href="'.$url.'"><span class="one">'.$rs["name"].'</span>
<span class="two">'.$rs["name_eng"].'</span></a>';
			}
			}
		  ?>
                     </div> 
            </div>
             </td>	
             </tr>
	<tr>
	  <td colspan="2" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
	<tr>
		<td colspan="2" align="center" bgcolor="#FFFFFF">
			 <div id="main_bak">
             <div id="main_title"><div id="title_name"><span>產品介紹</span><span>/<?=$_GET["kind_name"];?></span><span>/<?=$_GET["kind_name2"];?></span></div></div>
             <div id="main">
             
             <div id="proleftmenu_bak">
             
             <div id="leftmenu_title">產品類別</div>
          <ul id="left_menu">
    		<?
			 $sql = "SELECT * FROM kind "; 
			$sql.= " WHERE 1 and del = 0 and vendor ='".$_GET["vendor"]."' and (top is null or top = '')  order by num desc";
			
			$conn=mysql_query($sql); 	
			while($rs=mysql_fetch_array($conn)){	
			 ?>
             <li><a href="product.php?vendor=<?=$_GET["vendor"]?>&kind=<?=$rs["id"]?>&kind_name=<?=$rs["kind_name"]?>"><?=$rs["kind_name"]?></a>
               <? 
			   $sql="select * from kind where 1 and del=0 and top=".$rs["id"]." order by num desc";
			   $con=mysql_query($sql);
			   echo "<ul>";
			   while($row=mysql_fetch_array($con)){
				   echo  '<li><div id="m_title"><a href="product.php?vendor='.$_GET["vendor"].'&kind='.$rs["id"].'&kind2='.$row["id"].'&kind_name='.$rs["kind_name"].'&kind_name2='.$row["kind_name"].'">'.$row["kind_name"].'</a></div></li>';
				   if($row["notshow"]==0){
				   $sql="select * from product where del=0 and kind2=".$row["id"];
				  $con2=mysql_query($sql);
				  while($row2=mysql_fetch_array($con2)){
					  
					  
						if($row2["notlink"]==1) 
                        $link="#";
						else
						$link='product_page.php?id='.$row2["id"].'&vendor='.$_GET["vendor"].'&kind_name='.$_GET["kind_name"];
			
					  echo '<li><a href="'.$link.'">'.$row2["ch_name"].'</a></li>';
					  
					  }
				   }
				   }
			   echo "</ul>";
			   }
			   ?>
   				</ul>
             </div>
       <form name="product_name" method="get" action="product.php"  style="display:inline; margin:0; float:right;">
	<input type="search"  name="name" placeholder="搜尋"  value="<?=$_REQUEST["name"]?>">
    <input type="hidden" name="vendor" value="<?=$_REQUEST["vendor"]?>">
    </form>
             
             <div id="right_main">
             <?php
			 
				 //預設每頁筆數(依需求修改)
				 $pageRow_records = 12;
				 //預設頁數
				 $num_pages = 1;
				 //若已經有翻頁，將頁數更新
				 if (isset($_GET['page'])) {
				   $num_pages = $_GET['page'];
				 }
				 //本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
				 $startRow_records = ($num_pages -1) * $pageRow_records;
				 //未加限制顯示筆數的SQL敘述句
			 $sql_query = "SELECT * FROM product "; 
			$sql_query.= " WHERE 1 and del = 0 and vendor ='".$_GET["vendor"]."'";
			if($_GET["kind"])
			$sql_query.=" and (kind ='".$_GET["kind"]."'  or kind3 ='".$_GET["kind"]."') ";
			if($_GET["kind2"])
			$sql_query.=" and (kind2 ='".$_GET["kind2"]."'  or kind4 ='".$_GET["kind2"]."') ";
			if($_GET["name"])
			$sql_query.=" and (ch_name like '%".$_GET["name"]."%' or eng_name like '%".$_GET["name"]."%')";
			
			$sql_query.=" order by new_num desc,id asc";
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
	
			while($rs=mysql_fetch_array($result)){	
			?>
             
			  <div id="pro01">
                        <div id="propic">
                        <?php 
						if($rs["notlink"]==1) 
                        $link="#";
						else
						$link='product_page.php?id='.$rs["id"].'&vendor='.$_GET["vendor"].'&kind_name='.$_GET["kind_name"];
						?>
                        <a href="<?=$link;?>"><img src="../vendor1/vendor_pic/<?=$rs["vendor"]?>-<?=$rs["pic1"]?>/<?=$rs["pic2"]?>"></a></div>
                        <div id="protitle"><a href="<?=$link?>"><?=$rs["ch_name"]?><BR><?=$rs["eng_name"]?></a></div>
                   </div>

               <? }?>     
                   
                   
                <div id="right_page">
<div class="grayr">
<?php
// 顯示的頁數範圍
$range = 3;
  
// 若果正在顯示第一頁，無需顯示「前一頁」連結
if ($num_pages > 1) {
    // 使用 << 連結回到第一頁
    echo " <a href={$_SERVER['PHP_SELF']}?page=1&vendor=".$_REQUEST["vendor"]."&kind=".$_REQUEST["kind"]."&kind2=".$_REQUEST["kind2"]."&kind_name=".$_REQUEST["kind_name"]."&kind_name2=".$_REQUEST["kind_name2"]."&name=".$_REQUEST["name"]."><<</a> ";
    // 前一頁的頁數
    $prevpage = $num_pages - 1;
    // 使用 < 連結回到前一頁
    echo " <a href={$_SERVER['PHP_SELF']}?page=".$prevpage."&vendor=".$_REQUEST["vendor"]."&kind=".$_REQUEST["kind"]."&kind2=".$_REQUEST["kind2"]."&kind_name=".$_REQUEST["kind_name"]."&kind_name2=".$_REQUEST["kind_name2"]."&name=".$_REQUEST["name"]."><</a> ";
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
            echo " <a href={$_SERVER['PHP_SELF']}?page=".$x."&vendor=".$_REQUEST["vendor"]."&kind=".$_REQUEST["kind"]."&kind2=".$_REQUEST["kind2"]."&kind_name=".$_REQUEST["kind_name"]."&kind_name2=".$_REQUEST["kind_name2"]."&name=".$_REQUEST["name"].">".$x."</a> ";
        } // end else
    } // end if
} // end for
  
// 如果不是最後一頁, 顯示跳往下一頁及最後一頁的連結
if ($num_pages != $total_pages) {
    // 下一頁的頁數
    $nextpage = $num_pages + 1;
    // 顯示跳往下一頁的連結
    echo " <a href={$_SERVER['PHP_SELF']}?page=".$nextpage."&vendor=".$_REQUEST["vendor"]."&kind=".$_REQUEST["kind"]."&kind2=".$_REQUEST["kind2"]."&kind_name=".$_REQUEST["kind_name"]."&kind_name2=".$_REQUEST["kind_name2"]."&name=".$_REQUEST["name"].">></a> ";
    // 顯示跳往最後一頁的連結
    echo " <a href={$_SERVER['PHP_SELF']}?page=".$total_pages."&vendor=".$_REQUEST["vendor"]."&kind=".$_REQUEST["kind"]."&kind2=".$_REQUEST["kind2"]."&kind_name=".$_REQUEST["kind_name"]."&kind_name2=".$_REQUEST["kind_name2"]."&name=".$_REQUEST["name"].">>></a> ";
} // end if
?>
</div>
                </div><!-- right_page-->       
             
             </div><!-- right_main-->
             
                      
                           <div id="footer02">
                           <div id="brands_footer">
                                         <table width="100%" border="0">
                                         <tr>
                                           <td width="12%">&nbsp;</td>
                                           <td width="9%" align="left"><img src="pic/logo.png" width="94" height="42" align="middle"></td>
                                           <td width="33%" valign="bottom" id="de"><br>
                                             歌美斯有限公司版權所有<br>
                                          2015 COLMAX Taiwan Inc .All Rights Reserved.</td>
                                           <td width="21%" id="de">TEL：(886) 2055300<br>
                                         FAX：(886) 2056901<br>
                                           E-mail：sales@colmax.com.tw</td>
                                           <td width="18%" rowspan="2" valign="top" id="de02">其他連結：<br>                                             
                                               <a href="http://www.colmax.com.cn">歌美斯(青島)/COLMAX(QD)</a><br>
                                            <a href="https://www.facebook.com/pages/%E6%AD%8C%E7%BE%8E%E6%96%AF-COLMAX/130821093660986?ref=bookmarks">歌美斯Facebook粉絲團</a></td>
                                           <td width="7%">&nbsp;</td>
                                         </tr>
                                         <tr>
                                           <td>&nbsp;</td>
                                           <td colspan="3" id="de">欲轉載、引用任何本網站全部或部份之訊息，請事先取得歌美斯書面之同意，違者依法追究相關法律責任。</td>
                                           <td>&nbsp;</td>
                                         </tr>
                                       </table>
             
                           </div> 
                           </div>
                           
                      
             </div><!-- main-->
             

             
             
            </div>
            </td>
	</tr>
</table>
</div>
<div id="footerbk"></div>
<!-- End Save for Web Slices -->
</body>
</html>