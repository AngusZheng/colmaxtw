
<ul id="vendor_block">
<?php
include("2014_admin/config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;
$sql = "select * from carousel where del = 0 and remarks !='hide' order by sort_num desc";
$conn=mysql_query($sql); 	
while($row=mysql_fetch_array($conn))
{
 echo '<li><a href="'.$row["link"].'"  target="_parent" ><img title="'.$row["remarks"].'" src="images/'.$row["id"].'.png" width="150" height="60"  data-action="zoom" ></a>';
 echo '<div class="leftmenu_title">產品類別</div>';
 $myString = $row["brand_name"];
 $firstSpacePos = strpos($myString, " ");
 if($firstSpacePos !== false){
    $brand_name = substr($myString, 0, $firstSpacePos);
 }else{
    $brand_name = $myString;
  }

 $sql2 = "SELECT * FROM kind "; 
 $sql2.= " WHERE 1 and del = 0 and vendor ='".$brand_name."' and  (top is null or top = '')  order by num desc";
 $conn2=mysql_query($sql2);
 while($rs=mysql_fetch_array($conn2)){

    echo '<div class="left_menu"><a href="vendor/product.php?vendor='.$brand_name.'&kind='.$rs["id"].'&kind_name='.$rs["kind_name"].'">'.$rs["kind_name"].'</a></div>';
 }
 echo '</li>';
}

/*$sql = "select * from carousel where del = 0 and remarks !='hide' and remarks!='' order by sort_num desc";
$conn=mysql_query($sql); 	
while($row=mysql_fetch_array($conn))
{
    if(trim($row["remarks"])!=''){
        echo '<li><a href="'.$row["link"].'"  target="_parent"><img title="'.$row["remarks"].'" src="images/'.$row["id"].'.png" width="195" height="60" data-action="zoom" ></a>';
        echo '<div class="leftmenu_title">產品類別</div>';
        $myString = $row["brand_name"];
        $firstSpacePos = strpos($myString, " ");
        if($firstSpacePos !== false){
            $brand_name = substr($myString, 0, $firstSpacePos);
        }else{
            $brand_name = $myString;
        }
        
        $sql2 = "SELECT * FROM kind "; 
        $sql2.= " WHERE 1 and del = 0 and vendor ='".$brand_name."' and  (top is null or top = '')  order by num desc";
        $conn2=mysql_query($sql2);
        while($rs=mysql_fetch_array($conn2)){
           echo '<div class="left_menu"><a href="product.php?vendor='.$brand_name.'&kind='.$rs["id"].'&kind_name='.$rs["kind_name"].'">'.$rs["kind_name"].'</a></div>';
        }
        echo '</li>';
    }	
}*/
?>
</ul>