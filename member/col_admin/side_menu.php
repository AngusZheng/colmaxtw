<link rel="stylesheet" type="text/css" href="menu/css/style.css">
<link rel="stylesheet" type="text/css" href="menu/css/menu.css">
<head>
<base target="main">
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body class="panel" topmargin="0" leftmargin="0"> 
<div id="body"> 
系統管理員
<hr>
<a id="expand_link" href="javascript:menu_expand();"><u><span id="expand_text">展開</span></u></a>
<ul id="menu">
<li class="L1"><a href="javascript:c(m03);" id="m03"><nobr><img src="images/ico/2.gif" align="absMiddle"/>內部管理</nobr></a></li>
<ul id="m03d" style="display:;"class="U1">
<li class="L22"><a href="authorization.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/>  會員資料管理 </nobr></a></li>
<li class="L22"><a href="news/news_list.php" ><nobr><img src="images/ico/2.gif" align="absMiddle"/>  文章上傳 </nobr></a></li>
<li class="L22"><a href="carousel/carousel_list.php"  ><nobr><img src="images/ico/2.gif" align="absMiddle"/>  右側圖片上傳 </nobr></a></li>
<li class="L22"><a href="message.php"  ><nobr><img src="images/ico/2.gif" align="absMiddle"/>  到貨通知 </nobr></a></li>
<li class="L22"><a href="notice.php"  ><nobr><img src="images/ico/2.gif" align="absMiddle"/>  到貨通知下方 </nobr></a></li>
<li class="L22"><a href="extra.php"  ><nobr><img src="images/ico/2.gif" align="absMiddle"/>  加購商品 </nobr></a></li>
<li class="L22"><a href="bonus/bonus_list.php" ><nobr><img src="images/ico/2.gif" align="absMiddle"/>  即時優惠 </nobr></a></li>
<li class="L22"><a href="mail.php"  ><nobr><img src="images/ico/2.gif" align="absMiddle"/>  電子報發送 </nobr></a></li>
<li class="L22"><a href="log_info.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/>  登入資訊 </nobr></a></li>
</ul>
<li class="L1"><a href="javascript:c(m05);" id="m05"><nobr><img src="images/ico/2.gif" align="absMiddle"/>商品管理</nobr></a></li>
<ul id="m05d" style="display:;"class="U1">
<li class="L22"><a href="vendor.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/>  品牌管理</nobr></a></li>
<li class="L22"><a href="kind.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/>  新增商品分類 </nobr></a></li>
<li class="L22"><a href="product_new.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/>  新增商品 </nobr></a></li>
<li class="L21"><a href="javascript:c(f1106);" id="f1106"><span> 商品資料管理</span></a></li>
<ul id="f1106d" style="display:;">
<?php
include ("config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "SELECT  *  FROM vendor order by kind asc"; 
$conn=mysql_query($sql); 	
while($rs=mysql_fetch_array($conn)){	
echo '<li class="L3"><a href="product_list.php?kind='.$rs["kind"].'"><span><img src="images/ico/2.gif" align="absMiddle"/>'.$rs["kind"].'</span> </a></li>';
}
?>
</ul>
</ul>
<li class="L1"><a href="javascript:c(m06);" id="m06"><nobr><img src="images/ico/2.gif" align="absMiddle"/>商品庫存管理</nobr></a></li>
<ul id="m06d" style="display:;"class="U1">
<li class="L22"><a href="storage/upload.php"><nobr><img src="images/ico/2.gif" align="absMiddle"/> Excel上傳 </nobr></a></li>
<?php
$sql = "SELECT  *  FROM vendor order by kind asc"; 
$conn=mysql_query($sql); 	
while($rs=mysql_fetch_array($conn)){	
echo '<li class="L22"><a href="product.php?kind='.$rs["kind"].'"><nobr><img src="images/ico/2.gif" align="absMiddle"/>'.$rs["kind"].'</nobr> </a></li>';
}
?>
</ul>
<li class="L1"><a href="javascript:c(m09);" id="m09"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 帳號管理</nobr></a></li>
<ul id="m09d" style="display:;"class="U1">
<li class="L22"><a href="logout.php" target="_parent"><nobr><img src="images/ico/2.gif" align="absMiddle"/> 登出</nobr></a></li>
</ul>

</ul>
</div>
<script language="JavaScript">
 	var cur_id="";
 	var flag=0,sflag=0;
 	 
 	//-------- 菜单点击事件 -------
 	function c(srcelement)
 	{
 	var targetid,srcelement,targetelement;
 	var strbuf;
 	 
 	//-------- 如果点击了展开或收缩按钮---------
 	targetid=srcelement.id+"d";
 	targetelement=document.getElementById(targetid);
 	 
 	if (targetelement.style.display=="none")
 	{
 	srcelement.className="active";
 	targetelement.style.display='';
 	 
 	menu_flag=0;
 	expand_text.innerHTML="收缩";
 	}
 	else
 	{
 	srcelement.className="";
 	targetelement.style.display="none";
 	 
 	menu_flag=1;
 	expand_text.innerHTML="展开";
 	var links=document.getElementsByTagName("A");
 	for (i=0; i<links.length; i++)
 	{
 	srcelement=links[i];
 	if(srcelement.parentNode.className.toUpperCase()=="L1" && srcelement.className=="active" && srcelement.id.substr(0,1)=="m")
 	{
 	menu_flag=0;
 	expand_text.innerHTML="收缩";
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
 	//-------- 打开网址 -------
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
 	//-------- 菜单全部展开/收缩 -------
 	var menu_flag=1;
 	function menu_expand()
 	{
 	if(menu_flag==1)
 	expand_text.innerHTML="收缩";
 	else
 	expand_text.innerHTML="展开";
 	 
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
 	//-------- 打开windows程序 -------
 	function winexe(NAME,PROG)
 	{
 	URL="/general/winexe?PROG="+PROG+"&NAME="+NAME;
 	window.open(URL,"winexe","height=100,width=350,status=0,toolbar=no,menubar=no,location=no,scrollbars=yes,top=0,left=0,resizable=no");
 	}
 	</script>
</body>
</html>