<?
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>連絡我們</title>
</head>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<style type="text/css">
body
{
background-color: #FFFEF1;
font-family: Arial, Sans-Serif;
font-size: 13px;
}
#inputArea
{
font-family: Arial, Sans-Serif;
font-size: 13px;
background-color: #d6e5f4;
padding: 10px;
width:310px;
}
#inputArea input, #inputArea textarea
{
font-family: Arial, Sans-Serif;
font-size: 13px;
margin-bottom: 5px;
display: block;
padding: 4px;
width: 300px;
}

.activeField
{
background-image: none;
background-color: #ffffff;
border: solid 1px #33677F;
}
.idle
{
border: solid 1px #85b1de;
background-image: url( 'blue_bg.png' );
background-repeat: repeat-x;
background-position: top;
}
</style>
<script src="jquery-1.2.6.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$("input, textarea").addClass("idle");
$("input, textarea").focus(function(){
$(this).addClass("activeField").removeClass("idle");
}).blur(function(){
$(this).removeClass("activeField").addClass("idle");
});
});
</script>

</head>
<body>
<center>
<div id="inputArea"  align="left">
<form name="form1" action="contact_send.php" method="post">
<label for="txtName">
姓名</label>
<input id="Text16" type="text"  name="cust_name"  value="<?=$_SESSION["name"]?>" readonly="readonly"/>
<label for="txtEmail">
Email</label>
<input id="Text17" type="text"  name="mail" value="<?=$_SESSION["mail"]?>"/>
<label for="txtWebsite">
電話</label>
<input id="Text18" type="text"  name="tel"/>
<label for="txtComment">
連絡事項</label>
<textarea id="Textarea6" rows="4" cols="30" name="things"></textarea>
<input type="submit" value="送出">
</form>
</center>
</div>
</body>
</html>