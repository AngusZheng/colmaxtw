<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<?php
$user = $_POST["username"];
$password = $_POST["password"];

if($user <>"" or $password<>"")
{
if($user=="admin" and $password=="93095"){
$_SESSION["admin"]="colmax";	
echo ("<script type='text/javascript'> alert('歡迎你系統管理員');</script>");
echo '<script>location.href="colmax.php"</script>'; 
}
else{
echo ("<script type='text/javascript'> alert('帳號或密碼錯誤');</script>");
echo '<script>location.href="index.php"</script>'; 
}
}

else{
echo ("<script type='text/javascript'> alert('帳號或密碼不得為空');</script>");
echo '<script>location.href="index.php"</script>'; 
}
?>
</body>
</html>
