<html>
<head>
<title>歌美斯(青岛)自行车商贸有限公司</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/back.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<script>
function send(){
      document.getElementById('form1').submit();
}
function update(){
  $.ajax({
    url:"map_num.php",
    method:"POST",
    data:{
      map_num:$('#map_num').val()
    },
    success:function(res){
      alert("更新成功");
    },
    error:function (jqXHR){
    } 
    })//end ajax
}
</script>
<!-- Save for Web Slices (page.psd) -->
<?php
include ("../config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql = "select num from map_setting where id=1";
$conn=mysql_query($sql);
$rs=mysql_fetch_array($conn);
$map_num = $rs['num'];
?>
<table width="1100" height="371" border="0" align="center" cellpadding="0" cellspacing="0" id="___01">
	<tr valign="top">
	  <td height="20" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
	<tr>
		<td align="left" bgcolor="#FFFFFF" height="26"><input value="新增" onClick="window.location='map_new.php'" type="button" style="border:1px solid #ccc; font-size:13pt;"> 
    <input type="button" onClick="send();"  value="修改排序" style="border:1px solid #ccc; font-size:13pt;">
   
    </td>
	</tr>
    <tr align="center">
      <td height="84">
      前台顯示數量:
      <input type="text" name="map_num" value="<?=$map_num?>" size="12" id="map_num">
      <input type="button" onClick="update();"  value="更新" style="border:1px solid #ccc; font-size:13pt;">
</td>
    </tr>
    <tr valign="top">
           <td><p>&nbsp;</p>
             <table width="100%" border="0"  cellpadding="7" cellspacing="0"  id="ta01">
             <tr bgcolor="#f0f0f0">
               <td width="5%" align="center">排序</td>
               <td width="15%" align="center">客戶</td>
               <td width="35%" align="center">地址</td>
               <td width="15%" align="center">電話</td>
               <td width="5%" align="center">修改</td>
               <td width="5%" align="center">刪除</td>
             </tr>
        <tr>
        <form action="map_cl.php" method="post" name="form1" id="form1" >            
        <?php
        $sql = "SELECT * FROM map"; 
        $sql.= " WHERE 1 and del = 0";
        $sql.=" order by new_num asc";
        $conn=mysql_query($sql); 	
        while($rs=mysql_fetch_array($conn)){	
        $s=$s+1;
        ?>
        <td><input type="text" name="new_num[]" value="<?=$rs["new_num"]?>"></td>
        <td><?=$rs["custname"]?></td>
        <td><?=$rs["address"]?></td>
        <td><?=$rs["tel"]?></td>
        <td align="center"><a href="map_mod.php?id=<?=$rs["id"]?>">修改</a></td>
        <td align="center"><a href="map_mod_cl.php?id=<?=$rs["id"];?>&delete=1" onClick="return confirm('要刪除?');">刪除</a></td>
        <input type="hidden" name="id[]"  value="<?=$rs["id"]?>">
        </tr>
        <? } ?>
        </table></td>
    </tr>
    
  </form>  
</table>
<?php
mysql_close();
exit;
?>
</center>
<!-- End Save for Web Slices -->
</body>
</html>