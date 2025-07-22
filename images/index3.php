<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>歌美斯國際股份有限公司</title>
<link rel="stylesheet" type="text/css" href="css/brands.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
function SetCwinHeight()
{
var iframeid=document.getElementById("frameid"); //iframe id
  if (document.getElementById)
  {   
   if (iframeid && !window.opera)
   {   
    if (iframeid.contentDocument && iframeid.contentDocument.body.offsetHeight)
     {   
	 iframeid.height=0; // 加了就解決了
       iframeid.height = iframeid.contentDocument.body.offsetHeight;   
     }else if(iframeid.Document && iframeid.Document.body.scrollHeight)
     {   
       iframeid.height = iframeid.Document.body.scrollHeight;   
      }   
    }
   }
}
</script>

</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (page.psd) -->
<style type="text/css">
#pmenu, #pmenu ul {padding:0; margin:0; list-style-type: none;padding-left:60px; }
#pmenu li {float:left;position:relative;}
#pmenu a, #pmenu a:visited {display:block;padding-right:30px; width:1000px; font-size:18px; color:#06c; height:66px; line-height:66px; text-decoration:none; white-space:nowrap; font-weight:bold;}
#pmenu li:hover > a{color:#06c;}
#pmenu li ul {display: none;}
#pmenu li:hover > ul {display:block; position:absolute; top:0; left:80px;}
#pmenu > li:hover > ul {left:0; top:0px;} 
.menu a span.one, .menu a:hover span.two {display: inline;}
.menu a:hover span.one, .menu a span.two {display: none;}

#main1{
margin:0;
padding:0;
background: #000 url(images/1.jpg) center center fixed no-repeat;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
width:expression(document.body.clientWidth <= 1080? "1080px": "auto");
min-width:1080px;
}

#mainBox{
width:100%;
margin-left:16px;
}
#mainBox a{
margin-right:12px;
margin-bottom:20px;
padding:0px;
display:inline-block;
width:195px;
height:60px;
writing-mode: lr-tb;
}
#news
{
background-image:url(images/NEWS.png);
width:475px;
height:325px;
}
#news dt
{
width:450px;	
padding-bottom:45px;
padding-left:25px;
}
#news a, #news a:visited 
{
	font-size:18px;
	color:#000;
	font-weight:bold;
	display:block;
	word-wrap:break-word;
}
</style>
<div id="main1">
<table width="1100" height="294" border="0" align="center" cellpadding="0" cellspacing="0" id="___01">
    <tbody align="center">
	  <tr>
	    <td>&nbsp;</td>
	    <td><a href="http://www.colmax.com.cn"  target="_blank"><img src="images/colmax_03.png" width="213" height="26"></a></td>
      </tr>
	  <tr>
		<td width="810"><table width="100%" border="0">
		  <tr>
		    <td width="55%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/colmax_11.png" width="242" height="113" /></td>
		    <td width="45%">&nbsp;</td>
		    </tr>
	    </table>
       <ul id="pmenu" class="menu">
	      <?
include("../2014_admin/config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

$sql = "select * from connection where del = 0  order by upload_time asc ";
$conn=mysql_query($sql); 	
while($row=mysql_fetch_array($conn))
{
echo 	'<li><a href="colmax.php?kind='.$row["id"].'" target="frameid"><span class="one">'.$row["title"].'</span>
<span class="two">'.$row["title_eng"].'</span></a></li>';
}

?>
        </ul></td>
		<td width="290"><table width="100%" border="0">
		    <tr>
		      <td height="20"><a href="index3.php"><img src="images/colmax_06.png" width="51" height="55" /></a></td>
		      <td><a href="https://www.facebook.com/pages/%E6%AD%8C%E7%BE%8E%E6%96%AF-COLMAX/130821093660986" target="_blank"><img src="images/colmax_07.png" width="55" height="55" /></a></td>
		      <td><a href="https://www.youtube.com/channel/UCmeA1zQLN9Ho-BmeWsZcbIQ"  target="_blank"><img src="images/colmax_08.png" width="55" height="55" /></a></td>
		      <td><a href="http://www.colmax.com.tw/member/index.php"  target="_blank"><img src="images/colmax_09.png" width="52" height="55" /></a></td>
		      <td>&nbsp;</td>
	        </tr>
		    <tr>
		    <td width="20%" height="17"><p>&nbsp;</p>
		      <p>&nbsp;</p>
		      <p>&nbsp;</p></td>
		    <td width="20%">&nbsp;</td>
		    <td width="20%">&nbsp;</td>
		    <td width="20%">&nbsp;</td>
		    <td width="20%">&nbsp;</td>
		    </tr>
	    </table></td>
	</tr>

	  <tr></tr>
	  <tr>
		<td colspan="2">
        
        <table width="90%" border="0">
		    <tr>
		      <td width="45%"> 
              <div id="mainBox" > 
<?
$sql = "select * from carousel where del = 0 and remarks !='hide' order by brand_name asc";
$conn=mysql_query($sql); 	
while($row=mysql_fetch_array($conn))
{
if(trim($row["remarks"])=='')	
echo '<a href="'.$row["link"].'"  target="_parent" ><img title="'.$row["remarks"].'" src="images/'.$row["id"].'.png" width="195" height="60"  data-action="zoom" ></a>';
}

$sql = "select * from carousel where del = 0 and remarks !='hide' and remarks!='' order by brand_name asc";
$conn=mysql_query($sql); 	

while($row=mysql_fetch_array($conn))
{
if(trim($row["remarks"])!='')	
echo '<a href="'.$row["link"].'"  target="_parent"><img title="'.$row["remarks"].'" src="images/'.$row["id"].'.png" width="195" height="60" data-action="zoom" ></a>';
}
?>
</div></td>
			     <td width="1%" height="771">&nbsp;</td>
			     <td width="54%"><table width="92%" border="0">
		           <tr>
			           <td height="391">
                       <? include "abgneBlock.php";?>
                       </td>
	               </tr>
			         <tr>
			           <td height="361">
    <div id="news" align="left"> 
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <dt><a href="#">－ Selle ITALIA 2016 環義賽限量坐墊，請洽各經銷據點 </a></dt>
    <dt><a href="http://www.colmax.com.tw">－ TACX 2016冬季訓練聖物！專題報導</a>    </dt>
<dt><a href="#">－ 2016台北自行車展（3/2~3/5)，歡迎車友們至南港展覽館4F參觀(歌美斯攤位Ｍ0501)</a></dt>    
    </div> 
 
            </td>
		             </tr>
              </table></td>
	        </tr>
	      </table>
			 <div id="main_bak">
             <div id="footer02">
             <div id="brands_footer">
<table width="100%" height= border="0">
                                         <tbody><tr>
                                           <td width="11%">&nbsp;</td>
                                           <td width="10%" align="left"><img src="http://www.colmax.com.tw/vendor/pic/logo.png" width="94" height="42" align="middle"></td>
                                           <td width="31%" valign="bottom" id="de"><br>
                                             歌美斯國際股份有限公司版權所有<br>
                                          2016 COLMAX Taiwan Inc .All Rights Reserved.</td>
                                           <td width="21%" id="de">TEL：(886) 2055300<br>
                                         FAX：(886) 2056901<br>
                                           E-mail：sales@colmax.com.tw</td>
                                           <td width="20%" rowspan="2" valign="top" id="de02">其他連結：<br>                                             
                                             <a href="http://www.colmax.com.cn/">歌美斯(青島)/COLMAX(QD)</a><br>
                                            <a href="https://www.facebook.com/pages/%E6%AD%8C%E7%BE%8E%E6%96%AF-COLMAX/130821093660986?ref=bookmarks">歌美斯Facebook粉絲團</a></td>
                                           <td width="7%">&nbsp;</td>
                                         </tr>
                                         <tr>
                                           <td height="16">&nbsp;</td>
                                           <td colspan="3" id="de">欲轉載、引用任何本網站全部或部份之訊息，請事先取得歌美斯書面之同意，違者依法追究相關法律責任。</td>
                                           <td>&nbsp;</td>
                                         </tr>
                                       </tbody></table>
             
             </div> 
             </div>
                          
          </div>
          
        </td>
	</tr>
</tbody></table>
</div>
<div id="footerbk"></div>
<!-- End Save for Web Slices -->
</div>
</body></html>