<html>
<head>
<title>歌美斯(青岛)自行车商贸有限公司</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/back.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (page.psd) -->
<?php
include ("../config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$show = 0;
$color = '#1AFD9C';
if($_REQUEST["vendor"]){
  $vendor = $_REQUEST["vendor"];
  $sql = "select showoff from map_vendor where vendor = '".$_REQUEST["vendor"]."' limit 1";
  $conn=mysql_query($sql);
  $row=mysql_fetch_array($conn);
  $show = $row['showoff'];
  if($show==1){
    $txt = '關閉顯示';
    $color = '#FF0000';
  }else{
    $txt = '開啟顯示';
    $color = '#1AFD9C';
  }
}
?>
<script>
function send(){
      document.getElementById('form1').submit();
}
function show(){

  $.ajax({
    url:"showoff.php",
    method:"POST",
    data:{
      showoff:<?=$show?>,
      vendor:$('#select1').val()
    },
    success:function(res){
      alert("修改成功");
      window.parent.frames["main"].location.reload();
    },
    error:function (jqXHR){
    } 
    })//end ajax
}
</script>
<table width="1100" height="371" border="0" align="center" cellpadding="0" cellspacing="0" id="___01">
	<tr valign="top">
	  <td height="20" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
	<tr>
		<td align="left" bgcolor="#FFFFFF" height="26">
    <input value="新增" onClick="window.location='map_new.php'" type="button" style="border:1px solid #ccc; font-size:13pt;"> 
    <input type="button" onClick="send();"  value="修改排序" style="border:1px solid #ccc; font-size:13pt;">
    <?php if($_REQUEST["vendor"]){ ?>
    <input type="button" onClick="show();"  value="<?=$txt?>" style="border:1px solid #ccc; font-size:13pt;;background-color:<?=$color?>">
    <?php } ?>
    </td>
	</tr>
    
    <tr align="center">
      <td height="84">

<form name="form1" method="post">
<select name="vendor" id="select1" onChange="submit();" >
<option value="">請選擇</option>
<?php
$sql = "SELECT distinct vendor FROM map_vendor "; 
$sql.= " WHERE 1 and del=0 and vendor!=''";
$conn=mysql_query($sql); 	
while($row=mysql_fetch_array($conn)){	
if($row["vendor"]==$_REQUEST["vendor"])
$selected="selected";
else
$selected="";	
echo '<option value="'.$row["vendor"].'"'.$selected.'>'.$row["vendor"].'</option>';
}
?>
</select> 
</form>
</td>
    </tr>
    <tr valign="top">
           <td><p>&nbsp;</p>
             <table width="100%" border="0"  cellpadding="7" cellspacing="0"  id="ta01">
             <tr bgcolor="#f0f0f0">
               <td width="5%" align="center">排序</td>
               <td width="15%" align="center">客戶</td>
               <td width="35%" align="center">地址</td>
               <td width="14%" align="center">縣市</td>
               <td width="15%" align="center">電話</td>
               <td width="5%" align="center">修改</td>
               <td width="5%" align="center">刪除</td>
             </tr>
             <tr>
 <form action="map_cl.php" method="post" name="form1" id="form1" >            
<?php
if($_REQUEST["vendor"]){
$sql = "SELECT * FROM map_vendor "; 
$sql.= " WHERE 1 and del = 0";
$sql.=" and vendor ='".$_REQUEST["vendor"]."'";
$sql.=" order by new_num asc";
$conn=mysql_query($sql); 	
}
while($rs=mysql_fetch_array($conn)){	
$s=$s+1;
?>
               <td><input type="text" name="new_num[]" value="<?=$rs["new_num"]?>"></td>
                <td><?=$rs["custname"]?></td>
               <td><?=$rs["address"]?></td>
               <td align="center"><?=$rs["county"]?></td>
               <td><?=$rs["tel"]?></td>
               <td align="center"><a href="map_mod.php?id=<?=$rs["id"]?>">修改</a></td>
               <td align="center"><a href="map_mod_cl.php?id=<?=$rs["id"];?>&delete=1" onClick="return confirm('要刪除?');">刪除</a></td>
             </tr>
			<input type="hidden" name="id[]"  value="<?=$rs["id"]?>">
            <input type="hidden" name="vendor"  value="<?=$_REQUEST["vendor"]?>">
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