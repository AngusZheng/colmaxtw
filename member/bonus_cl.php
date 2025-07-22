<?
session_start();
include ("config.php");

//post
$buy_num = $_POST["num"];
$product_name=$_POST["title"];
$price = $_POST["price"];
$price2 =$_POST["price2"];
$id=$_POST["id"];
//session
$time_stamp =$_SESSION["time_stamp"];
$product_name = $_POST["product_name"];
$cust_name = $_SESSION["name"];
$user_name = $_SESSION["user_name"];


$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;


for($i=0;$i<=count($buy_num);$i++){
$id_=$id[$i]+55555;		
if($buy_num[$i]>0 and $buy_num[$i]<=999)
{
$sql_search = "select * from buylist_tmp where time_stamp = '$time_stamp' and cust_name = '$cust_name' and user_name = '$user_name' and product_id = '".$id_."' and del = 0";
$search_result =mysql_query($sql_search);
if($row=mysql_fetch_array($search_result))
{
$sql = "update buylist_tmp set buy_num = buy_num + '".$buy_num[$i]."'   where time_stamp = '$time_stamp' and cust_name = '$cust_name' and user_name = '$user_name'  and product_id = '".$id_."' and del = 0";
}
else
{
$sql = "insert into buylist_tmp (product_id,product_name,buy_num,time_stamp,cust_name,user_name,price,spec,price2)
values('".$id_."','".$product_name[$i]."','".$buy_num[$i]."','$time_stamp','$cust_name','$user_name','".$price[$i]."','".$spec[$i]."','".$price2[$i]."')";
}
$result=mysql_query($sql);
}

}


if($result){
echo ("<script type='text/javascript'> alert('加入購物車成功');</script>");
echo ("<script type='text/javascript'> top.a.location.reload();</script>");
echo '<script>location.href="bonus_new.php"</script>'; 
}

else
{
echo ("<script type='text/javascript'> top.a.location.reload();</script>");
echo '<script>location.href="bonus_new.php"</script>'; 
}
?>