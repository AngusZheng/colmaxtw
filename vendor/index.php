<?
include("../vendor/config.php");
if($_GET["vendor"]=="Tacx")
{
echo '<script>location.href="http://www.colmax.com.tw/"</script>'; 
exit;
}
?>
<html>
<head>
<!--Start:插入jQuery-->
  <script src='http://code.jquery.com/jquery-1.11.2.min.js'/></script>
  <!--End:插入jQuery-->
   <!--Start:插入TOP套件-->
  <script type="text/javascript">
$(function(){
    $("#gotop").click(function(){
        jQuery("html,body").animate({
            scrollTop:0
        },1000);
    });
    $(window).scroll(function() {
        if ( $(this).scrollTop() > 300){
            $('#gotop').fadeIn("fast");
        } else {
            $('#gotop').stop().fadeOut("fast");
        }
    });
});
</script>
   <!--END:插入TOP套件-->
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
#gotop {
    display: none;
    position: fixed;
    right: 40px;
    bottom: 40px;    
    padding: 10px 15px;    
    font-size: 20px;
    background:#999;
    color: white;
    cursor: pointer;
	border-radius: 40px;
}
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
            <!--<div id="search_bk">
                                   <div id="input01"><input type="text" name="q"   id="q" class="q"   placeholder="搜尋.."  style="border: none; font-size:15px; width:220px; height:20px; background:none; color:#666;  margin-top:0px;" onKeyDown="javascript:(function(){if (event.keyCode ==13) send() })()" ></input></div>
                                   <div id="button01"> <button type="submit"  onClick="send();" style="border: none; width:20px; height:20px ; background: transparent url(images_aa/search_icon.png)  no-repeat ;"></button></div>
        </div>-->                              
            
            
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
		<td colspan="2" bgcolor="#FFFFFF">
			 <div id="main_bak">
             <div id="main">
             
             <table width="100%" border="0"  cellpadding="0" cellspacing="0" style="border:0px;">
  <tr>
    <td width="160" valign="top" rowspan="2" >
                       <!--<div id="brand_bak">
                            <div id="brand_title">所有品牌</div>
                            <div id="brand_a">
<?

/*$sql = "select * from carousel where del = 0 order by brand_name asc ";
$conn=mysql_query($sql); 	
while($row=mysql_fetch_array($conn))
{

echo '<a href="'.$row["link"].'"  target="_parent">'.$row["brand_name"].'</a>';

}*/
?>
                            </div>
                      </div>-->
 </td>
    

                <td width="940" align="left" valign="top">
                 
				 <?php  
				 $sql = "SELECT * FROM link "; 
			     $sql.= " WHERE 1 and del = 0  and ifshow=0 and vender ='".$_GET["vendor"]."' and id=".$_GET["kind"];
			     $conn=mysql_query($sql); 	
				 $row=mysql_fetch_array($conn);
				 echo'<div id="main_title"><div id="title_name"><span>'.$row["name"].'</span></div></div>';
				 ?>
                 
                </td>

 </tr>
 <tr>
                <td width="940" align="left" valign="top">
       <?php
         $sql = "select showoff from map_vendor where vendor = '".$_REQUEST["vendor"]."' limit 1";
         $conn=mysql_query($sql);
         $row=mysql_fetch_array($conn);
         $show = $row['showoff'];
			 if($_GET["map"]==1 && $show==1)
			echo '<iframe src="map_new.php?vendor='.$_REQUEST["vendor"].'" width="940" height="800"  scrolling="No" frameborder="0"  id="frameid" name="frameid">
</iframe>';
			else{	 
      $sql = "SELECT * FROM vender_content where vender = '".$_REQUEST["vendor"]."' and del=0 and kind =".$_REQUEST["kind"];
			$cotent=mysql_query($sql);
			$row_cotent=mysql_fetch_array($cotent);
			echo $row_cotent["content"];
			}
			?>
            

                </td>
  </tr>
 
 </table>     
      
             </div>             
             <div id="footer02">
             <div id="brands_footer">
<table width="100%" border="0">
                                         <tr>
                                           <td width="11%">&nbsp;</td>
                                           <td width="10%" align="left"><img src="pic/logo.png" width="94" height="42" align="middle"></td>
                                           <td width="36%" valign="bottom" id="de"><br>
                                             歌美斯有限公司版權所有<br>
                                          COLMAX BICYCLE TAIWAN LIMITED All Rights Reserved..</td>
                                           <td width="21%" id="de">TEL：(886) 062055300<br>
                                         FAX：(886) 062056901<br>
                                           E-mail：sales@colmax.com.tw</td>
                                           <td width="20%" rowspan="2" valign="top" id="de02">其他連結：<br>                                             
                                             <a href="http://www.colmax.com.cn">歌美斯(青島)/COLMAX(QD)</a><br>
                                            <a href="https://www.facebook.com/pages/%E6%AD%8C%E7%BE%8E%E6%96%AF-COLMAX/130821093660986?ref=bookmarks">歌美斯Facebook粉絲團</a></td>
                                           <td width="7%">&nbsp;</td>
                                         </tr>
                                         <tr>
                                           <td height="16">&nbsp;</td>
                                           <td colspan="3" id="de">欲轉載、引用任何本網站全部或部份之訊息，請事先取得歌美斯書面之同意，違者依法追究相關法律責任。</td>
                                           <td>&nbsp;</td>
                                         </tr>
                                       </table>
             
             </div> 
             </div>
                          
          </div>
          
          </td>
	</tr>
</table>
</div>
<div id="footerbk"></div>
<!-- End Save for Web Slices -->
<b:if cond='data:blog.isMobile'> 
 <b:else/>
 <div id='gotop' ><center>↑</center></div> 
 </b:if>
</body>
</html>