<?php
session_start();
ob_start();
include("config.php");
$id=$_POST["id"];
$cust_num=$_POST["cust_num"];
$cust_name1=$_POST["cust_name1"];
$cust_name2=$_POST["cust_name2"];
$ceo=$_POST["ceo"];
$contact=$_POST["contact"];
$tel_no1=$_POST["tel_no1"];
$tel_no2=$_POST["tel_no2"];
$email=$_POST["email"];
$taxnum=$_POST["taxnum"];
$addr1=$_POST["addr1"];
$addr2=$_POST["addr2"];
$sales=$_POST["sales"];
$zip_code=$_POST["zip_code"];
$user_name=$_POST["user_name"];
$password=$_POST["password"];
$authorized=0;
//品牌權限
if(isset($_POST['authorized'])) {

    foreach($_POST['authorized'] as $key => $value) {
        $authorized+=$value;
    }
}


$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;
$sql="insert into  cust (cust_num,cust_name1,cust_name2,ceo,contact,tel_no1,tel_no2,email,sales,taxnum,addr1,addr2,authorized,user_name,password) values('$cust_num','$cust_name1','$cust_name2','$ceo','$contact','$tel_no1','$tel_no2','$email','$sales','$taxnum','$addr1','$addr2','$authorized','$user_name','$password') ";
$result=mysql_query($sql);
if($result){
echo '<script>alert("新增成功")</script>'; 
//header("Refresh: 0;url=authorization.php?hide2=$hide2&hide9=$hide9&fgprice=$fgprice&user=$user");
echo '<script>location.href="authorization.php"</script>'; 
ob_end_flush();
}
?>