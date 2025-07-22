<div style="height:700px; overflow:scroll; background:#FFF; border:solid 1px;" id="comment">
<?php
include ("config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$parts=$_GET['parts'];
 if(isset($_GET['target']))
$sql = "SELECT * FROM news where parts='$parts' and del=0 and id=".$_GET["target"];
else
$sql = "SELECT * FROM news where parts='$parts' and del=0 order by id desc";

$new=mysql_query($sql); 	
$row=mysql_fetch_array($new);

echo $row["title"]."<br>";
echo $row["content"]."<br>";
if ($row["photo"]!="") {
echo '<img   class="demo" src="news/'.$row["photo"].'" width="80%";height="80%"; alt=""/>' ;
} ?>
</div>