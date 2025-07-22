<?PHP
session_start();
$arr=$_SESSION['vendor'];
 if($_SESSION["if_price1"]==1 or $_SESSION["if_info"]==1){
echo '<script> history.go(-1)</script>'; 
 }
 else
 {
include "bonus.php";	 
 }
?>