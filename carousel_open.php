<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<style type="text/css">
#mainBox{
width:463px;
height:900px;
}
#mainBox a{
margin-right:12px;
margin-bottom:17px;
padding:0px;
display:inline-block;
width:217px;
height:67px;
writing-mode: lr-tb;
}
</style>
<div id="mainBox" > 
<?
include("2014_admin/config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

$sql = "select * from carousel where del = 0 and remarks !='hide' order by brand_name asc";
$conn=mysql_query($sql); 	
while($row=mysql_fetch_array($conn))
{
if(trim($row["remarks"])=='')	
echo '<a href="'.$row["link"].'"  target="_parent"><img title="'.$row["remarks"].'" src="../carousel/'.$row["pic_name"].'" ></a>';
}

$sql = "select * from carousel where del = 0 and remarks !='hide' and remarks!='' order by brand_name asc";
$conn=mysql_query($sql); 	

while($row=mysql_fetch_array($conn))
{
if(trim($row["remarks"])!='')	
echo '<a href="'.$row["link"].'"  target="_parent"><img title="'.$row["remarks"].'" src="../carousel/'.$row["pic_name"].'" ></a>';
}
?>
</div>