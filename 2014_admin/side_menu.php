<?php
session_start(); //要??SESSION，看是不是管理?

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base target="main">
<link rel="stylesheet" type="text/css" href="menu/css/style.css">
<link rel="stylesheet" type="text/css" href="menu/css/menu.css">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body class="panel" topmargin="0" leftmargin="0">
 
<div id="body"> 

<?php
echo $_SESSION["name"];
?> 
<hr>
<ul id="menu">
<li class="L1"><a href="javascript:c(m03);" id="m03"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 網站管理</nobr></a></li>
<ul id="m03d" style="display:;" class="U1">
<li class="L22"><a href="abgneblock/abgneblock_upload.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 首頁輪播圖片上傳</nobr></a></li>
<li class="L22"><a href="abgne/abgne_upload.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 左右對聯式廣告圖片上傳</nobr></a></li>
<li class="L22"><a href="carousel/carousel_list.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 代理品牌圖片管理</nobr></a></li>
<li class="L22"><a href="connection/connection_list.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 下方連結圖片管理</nobr></a></li>
<li class="L22"><a href="news/news_list.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 網站內容管理</nobr></a></li>
<li class="L22"><a href="vender/new_list.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 品牌連結管理</nobr></a></li>
<li class="L22"><a href="vender/vender_list.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 品牌內容管理</nobr></a></li>
<li class="L22"><a href="product.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 產品管理</nobr></a></li>
<li class="L22"><a href="kind.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 產品分類管理</nobr></a></li>
<li class="L22"><a href="news.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 最新消息</nobr></a></li>
<li class="L22"><a href="info/info_list.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 資訊內容管理</nobr></a></li>
<li class="L22"><a href="colmax_map"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 經銷據點</nobr></a></li>
<li class="L22"><a href="colmax0608"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 品牌經銷據點</nobr></a></li>
<li class="L22"><a href="../index.php" target="_blank"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 查看前台</nobr></a></li>
</ul>


<li class="L1"><a href="javascript:c(m09);" id="m09"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 帳號管理</nobr></a></li>
<ul id="m09d" style="display:;" class="U1">
<li class="L22"><a href="password.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 更改密碼</nobr></a></li>
<li class="L22"><a href="logout.php" target="_parent"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 登出</nobr></a></li>
</ul>

</div>

<div id="bottom"></div>

<script language="JavaScript">
var cur_id="";
var flag=0,sflag=0;

function c(srcelement)
{
  var targetid,srcelement,targetelement;
  var strbuf;

  targetid=srcelement.id+"d";
  targetelement=document.getElementById(targetid);

  if (targetelement.style.display=="none")
  {
     srcelement.className="active";
     targetelement.style.display='';
     menu_flag=0;
     expand_text.innerHTML="收縮";
  }
  else
  {
     srcelement.className="";
     targetelement.style.display="none";

     menu_flag=1;
     expand_text.innerHTML="展開";
     var links=document.getElementsByTagName("A");
     for (i=0; i<links.length; i++)
     {
       srcelement=links[i];
       if(srcelement.parentNode.className.toUpperCase()=="L1" && srcelement.className=="active" && srcelement.id.substr(0,1)=="m")
       {
          menu_flag=0;
          expand_text.innerHTML="收縮";
          break;
       }
     }
  }
}
function set_current(id)
{
   cur_link=document.getElementById("f"+cur_id)
   if(cur_link)
      cur_link.className="";
   cur_link=document.getElementById("f"+id);
   if(cur_link)
      cur_link.className="active";
   cur_id=id;
}

function a(URL,id)
{
   set_current(id);
   if(URL.substr(0,7)!="http://" && URL.substr(0,6)!="ftp://")
      URL = "/general/"+URL;
    parent.openURL(URL,0);
}
function b(URL,id)
{
   set_current(id);
   URL = "/app/"+URL;
    parent.openURL(URL,0);
}
//add by YZQ 2008-03-05 begin
function bindFunc() {
  var args = [];
  for (var i = 0, cnt = arguments.length; i < cnt; i++) {
    args[i] = arguments[i];
  }
  var __method = args.shift();
  var object = args.shift();
  return (
    function(){
      var argsInner = [];
		  for (var i = 0, cnt = arguments.length; i < cnt; i++) {
		    argsInner[i] = arguments[i];
		  }
      return __method.apply(object, args.concat(argsInner));
    });
}
var timerId = null;
var firstTime = true;
//add by YZQ 2008-03-05 end
function d(URL,id)
{
   //add by YZQ 2008-03-05 begin
   var winMgr = parent.parent.table_index.main.winManager;
	 if (!winMgr) {
	   if (firstTime) {
	     parent.openURL("/fis/common/frame.jsp",0);
	     firstTime = false;
	   }
	   timerId = setTimeout(bindFunc(d, window, URL, id), 100);
	   return;
	 }
	 firstTime = true;
	 if (timerId) {
	   clearTimeout(timerId);
	 }
	 if (winMgr) {
	   winMgr.openActionPort("/fis/"+URL, document.getElementById("f" + id).innerText);
	   return;
	 }
   //add by YZQ 2008-03-05 end

   set_current(id);
   URL = "/fis/"+URL;
    parent.openURL(URL,0);
}

var menu_flag=1;
function menu_expand()
{
  if(menu_flag==1)
     expand_text.innerHTML="收縮";
  else
     expand_text.innerHTML="展開";

  menu_flag=1-menu_flag;

  var links=document.getElementsByTagName("A");
  for (i=0; i<links.length; i++)
  {
    srcelement=links[i];
    if(srcelement.parentNode.className.toUpperCase()=="L1" || srcelement.parentNode.className.toUpperCase()=="L21")
    {
      targetelement=document.getElementById(srcelement.id+"d");
      if(menu_flag==0)
      {
        targetelement.style.display='';
        srcelement.className="active";
      }
      else
      {
        targetelement.style.display="none";
        srcelement.className="";
      }
    }
  }
}
</script>
</body>
</html>