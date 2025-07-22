<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
<!-- Favicons --> 
<link rel="shortcut icon" type="image/png" HREF="../img/favicons/favicon.png"/>
<link rel="icon" type="image/png" HREF="../img/favicons/favicon.png"/>
<link rel="apple-touch-icon" HREF="../img/favicons/apple.png" />
<!-- Main Stylesheet --> 
<link rel="stylesheet" href="../css/style.css" type="text/css" />
<!-- Colour Schemes
Default colour scheme is blue. Uncomment prefered stylesheet to use it.
<link rel="stylesheet" href="css/brown.css" type="text/css" media="screen" />  
<link rel="stylesheet" href="css/gray.css" type="text/css" media="screen" />  
<link rel="stylesheet" href="css/green.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/pink.css" type="text/css" media="screen" />  
<link rel="stylesheet" href="css/red.css" type="text/css" media="screen" />
-->
<!-- Your Custom Stylesheet --> 
<link rel="stylesheet" href="../css/custom.css" type="text/css" />

</head>
<body>

<!-- Header -->
<header id="top">
<div class="wrapper-login">
<!-- Title/Logo - can use text instead of image -->
<div id="title"><!--<span>Administry</span> demo--></div>
<!-- Main navigation -->
<nav id="menu">
<ul class="sf-menu">
<li class="current"><a href="#">Login</a></li>

</ul>
</nav>
<!-- End of Main navigation -->
<!-- Aside links -->
<!-- End of Aside links -->
</div>
</header>
<!-- End of Header -->
<!-- Page title -->
<div id="pagetitle">
<div class="wrapper-login"></div>
</div>
<!-- End of Page title -->

<!-- Page content -->
<div id="page">
<!-- Wrapper -->
<div class="wrapper-login">
<!-- Login form -->
<section class="full">					

<h3>歌美斯會員專區後台</h3>
<form method="post" action="admin.php">

<p>
<label class="required" for="username">帳號:</label><br/>
<input type="text" id="username" class="full" value="" name="username"/>
</p>

<p>
<label class="required" for="password">密碼:</label><br/>
<input type="password" id="password" class="full" value="" name="password"/>
</p>


<p>
<input type="submit" class="btn btn-green big" value="Login"/>
</p>
<div class="clear">&nbsp;</div>

</form>

</section>
<!-- End of login form -->

</div>
<!-- End of Wrapper -->
</div>
<!-- End of Page content -->

</body>
</html>