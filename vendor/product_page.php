<?
include("../vendor/config.php");
?>
<html>
<head>
<title>歌美斯有限公司</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/brands.css" />

</head>
<link href=http://www.we-shop.net/video/shadowbox/shadowbox.css rel=stylesheet type=text/css /> 
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<link rel="stylesheet" href="js/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="js/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script>
$(document).ready(function() {
	$(".fancybox-button").fancybox({
		prevEffect		: 'none',
		nextEffect		: 'none',
		closeBtn		: true,
		arrows    : false,
        nextClick : false,
     
		helpers		: {
			title	: { type : 'inside' },
			buttons	: {}
		}
	});
});
</script>
<script type="text/javascript">
	$(function(){
		// 用來顯示大圖片用
		var $showImage = $('#show-image');
		
		
		// 當滑鼠移到 .abgne-block-20120106 中的某一個超連結時
		$('.abgne-block a').mouseover(function(){
			var $this = $(this), 
				_src = $this.attr('href');
			// 如果現在大圖跟目前要顯示的圖不是同一張時
			if($showImage.attr('src') != _src){
				$showImage.hide().attr('src', _src).stop(false, true).fadeTo(400, 1);
				document.getElementById('imgsrc').href=_src;
				document.getElementById('tt').innerHTML=$this.attr('title');
			}
		}).click(function(){
			// 如果超連結被點擊時, 取消連結動作
			return false;
		});
	});
</script>
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
                                  <!--<div id="search_bk">
                                   <div id="input01"><input type="text" name="q"   id="q" class="q"   placeholder="搜寻.."  style="border: none; font-size:15px; width:220px; height:20px; background:none; color:#666;  margin-top:0px;" onKeyDown="javascript:(function(){if (event.keyCode ==13) send() })()" ></input></div>
                                   <div id="button01"> <button type="submit"  onClick="send();" style="border: none; width:20px; height:20px ; background: transparent url(images_aa/search_icon.png)  no-repeat ;"></button></div>
        </div>           -->                   
            
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
	  <td colspan="2" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
	<tr>
		<td colspan="2" valign="top" bgcolor="#FFFFFF">
			 <div id="main_bak">
             <div id="main_title"> <div id="title_name"><span>產品介紹</span><span>/</span><span><?=$_GET["kind_name"];?></span></div></div>
             <div id="main">
             
             <div id="proleftmenu_bak">
             
             <div id="leftmenu_title">產品類別</div>
          	<ul id="left_menu">
    		<?php
			$sql = "SELECT * FROM kind "; 
			$sql.= " WHERE 1 and del = 0 and vendor ='".$_GET["vendor"]."' and  (top is null or top = '')  order by num desc";
			$conn=mysql_query($sql); 	
			while($rs=mysql_fetch_array($conn)){	
			 ?>
             <li><a href="product.php?vendor=<?=$_GET["vendor"]?>&kind=<?=$rs["id"]?>&kind_name=<?=$rs["kind_name"]?>"><?=$rs["kind_name"]?></a>
               <? 
			   $sql="select * from kind where 1 and del=0 and top=".$rs["id"]." order by num desc";
			   $con=mysql_query($sql);
			   echo "<ul>";
			   while($row=mysql_fetch_array($con)){
				   echo  '<li><div id="m_title"><a href="product.php?vendor='.$_GET["vendor"].'&kind='.$rs["id"].'&kind2='.$row["id"].'&kind_name='.$rs["kind_name"].'">'.$row["kind_name"].'</a></div></li>';
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
             <div id="right_main">
                       <div id='return_bak'>
                             
                       </div>
            
              <?php
             $sql = "SELECT * FROM product "; 
			$sql.= " WHERE 1 and del = 0 and id ='".$_GET["id"]."'";
			$conn=mysql_query($sql); 	
			$row=mysql_fetch_array($conn);
			?>
            
            <div id="pro_detail_bak">
                    
           <div id="showbak">
                <div id="showpic">

                <?php
				$message = glob("../vendor1/vendor_pic/".$row["vendor"]."-".$row["pic1"]."/{*.gif,*.jpg,*.png}", GLOB_BRACE);
				$first=0;
					for($i=0;$i<count($message);$i++)
					{
					$a=str_replace("../vendor1/vendor_pic/".$row["vendor"]."-".$row["pic1"]."/",'',$message[$i]);
					if($a=="first.png")
					$first=1;
					}
					if($first==1)
					$img="../vendor1/vendor_pic/".$row["vendor"]."-".$row["pic1"]."/first.png";
					else
					$img="../vendor1/vendor_pic/".$row["vendor"]."-".$row["pic1"]."/".$row["pic2"];
					
					$sql="select  * from product_remarks where path='".$row["vendor"]."-".$row["pic1"]."' and photo ='".$row["pic2"]."'";	
				    $conn=mysql_query($sql); 	
				    $rs=mysql_fetch_array($conn);	
                ?>
                <a class="fancybox-button" rel="fancybox-button" href="<?=$img?>"   id="imgsrc"><img src="<?=$img?>" id="show-image" ></a></div>
                 <span id="tt" style=" float:right; padding-right:50px;"><?=$rs["remark"]?></span>
                <div id="smallpic_bak">
                <?php
					$message = glob("../vendor1/vendor_pic/".$row["vendor"]."-".$row["pic1"]."/{*.gif,*.jpg,*.png}", GLOB_BRACE);
					$ano="../vendor1/vendor_pic/".$row["vendor"]."-".$row["pic1"]."/ano.jpg";
				for($i=0;$i<count($message);$i++)
				{
				$photo=str_replace("../vendor1/vendor_pic/".$row["vendor"]."-".$row["pic1"]."/",'',$message[$i]);		
				$sql="select  * from product_remarks where path='".$row["vendor"]."-".$row["pic1"]."' and photo ='".$photo."'";	
				$conn=mysql_query($sql); 	
				$rs=mysql_fetch_array($conn);	
					
				if ($message[$i]!=$ano)
				echo '<div id="smallpic"   class="abgne-block"><a href="'.$message[$i].'" title="'.$rs["remark"].'" ><img src="'.$message[$i].'"  width="65" height="65" alt=""/></a></div>';
				
				if ($message[$i]==$ano)
				$cano=1;
				}
				?>
                </div><!-- samllpic_bak-->
                <br> <br> <br> <br> <br> <br>  
                <?php
				if ($cano==1)
				echo '<img src="'.$ano.'" >'; 
               ?>  
            </div>  <!-- showbak--> 
            
            
            
                             <div id="pro_detail_a">
                                   <div id="detail_name" style=" font-size:24px;"><?=$row["ch_name"]?></div><BR>
                                   <div id="detail_en"  style=" font-size:24px;"><?=$row["eng_name"]?></div>
                                   <div id="detail01"><?=$row["content"]?></div><BR>
                             </div>

            </div><!-- pro_detail_bak-->
       
       <div id="pro_detail02_bak">
       <div id="pro_detail02">
     <?=$row["content2"]?>
       </div>
       </div>
            
            
            

            
             </div>
             <!-- right_main-->
             
                      
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