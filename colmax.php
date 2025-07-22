<?php include("2014_admin/config.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>歌美斯有限公司</title>
    <link rel="stylesheet" href="css/brands.css" />
    <link rel="stylesheet" href="css/loginDialog.css" />
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/aj-address.js"></script>
    <script>
        $(function () {
            $('.address-zone').ajaddress();
        });
    </script>
    <style>
        .navigation a span.one,
        .navigation a:hover span.two { display: inline; }
        .navigation a:hover span.one,
        .navigation a span.two { display: none; }
    </style>
</head>
<body style="margin: 0;">
    <div id="top"></div>
    <div id="tab_all">
        <table width="1100" height="294" align="center" cellpadding="0" cellspacing="0" border="0" id="___01">
            <tr>
                <td colspan="2"><img src="images/page_01.gif" width="1100" height="24" alt=""></td>
            </tr>
            <tr>
                <td width="320">
                    <a href="" target="_parent"><img src="images/logo111.jpg" width="320" height="115" alt="Logo"></a>
                </td>
                <td width="780" bgcolor="#FFFFFF">
                    <div id="menubak">
                        <div id="topmenu" class="navigation">
                            <?php
                            $db = mysql_connect($servername, $sqlservername, $sqlserverpws);
                            mysql_query("SET NAMES 'utf8'", $db);
                            mysql_select_db($sqlname, $db);
                            $sql = "SELECT * FROM connection WHERE del = 0 ORDER BY upload_time ASC";
                            $conn = mysql_query($sql);
                            while ($row = mysql_fetch_array($conn)) {
                                $href = $row["link"] == "" ? 'colmax.php?kind=' . $row["id"] : $row["link"];
                                echo '<a href="' . $href . '" target="frameid"><span class="one">' . $row["title"] . '</span><span class="two">' . $row["title_eng"] . '</span></a>';
                            }
                            ?>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" bgcolor="#FFFFFF">
                    <div id="main_bak">
                        <div id="main">
                            <table width="100%" cellpadding="0" cellspacing="0" style="border:0;">
                                <tr>
                                    <td width="160" valign="top" rowspan="2">
                                        <!-- 品牌區塊暫時註解 -->
                                    </td>
                                    <td width="940" align="left" valign="top">
                                        <?php
                                        $sql = "SELECT * FROM link WHERE del = 0 AND ifshow = 0 AND vender = '" . $_GET["vendor"] . "' AND id = " . $_GET["kind"];
                                        $conn = mysql_query($sql);
                                        $row = mysql_fetch_array($conn);
                                        echo '<div id="main_title"><div id="title_name"><span>' . $row["name"] . '</span></div></div>';
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="940" align="left" valign="top">
                                        <?php
                                        if (!empty($_GET["kind"])) {
                                            $kind = $_GET["kind"];
                                            $sql = "SELECT * FROM content WHERE kind = '$kind' AND del = 0";
                                            $conn = mysql_query($sql);
                                            $rs = mysql_fetch_array($conn);
                                            echo $rs["content"];
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div id="footer02">
                            <div id="brands_footer">
                                <table width="100%" border="0">
                                    <tr>
                                        <td width="11%"></td>
                                        <td width="10%" align="left"><img src="http://www.colmax.com.tw/vendor/pic/logo.png" width="94" height="42" alt=""></td>
                                        <td width="31%" valign="bottom" id="de">
                                            <br>歌美斯有限公司版權所有<br>
                                            2015 COLMAX Taiwan Inc .All Rights Reserved.
                                        </td>
                                        <td width="21%" id="de">
                                            TEL：(886) 2055300<br>
                                            FAX：(886) 2056901<br>
                                            E-mail：sales@colmax.com.tw
                                        </td>
                                        <td width="20%" rowspan="2" valign="top" id="de02">
                                            其他連結：<br>
                                            <a href="http://www.colmax.com.cn">歌美斯(青島)/COLMAX(QD)</a><br>
                                            <a href="https://www.facebook.com/pages/%E6%AD%8C%E7%BE%8E%E6%96%AF-COLMAX/130821093660986?ref=bookmarks">歌美斯Facebook粉絲團</a>
                                        </td>
                                        <td width="7%"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="3" id="de">
                                            欲轉載、引用任何本網站全部或部份之訊息，請事先取得歌美斯書面之同意，違者依法追究相關法律責任。
                                        </td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div id="footerbk"></div>

    <!-- 聯絡我們區塊 -->
    <div id="LoginBox">
        <div class="row1">聯絡我們
            <a href="javascript:void(0)" title="關閉" class="close_btn" id="closeBtn">×</a>
        </div>
        <form name="form1" id="form1" action="send.php" method="post">
            <div class="row">姓名:
                <input type="text" placeholder="姓名" name="name" size="25" required />
            </div>
            <div class="row">信箱:
                <input type="email" placeholder="信箱" name="mail" size="25" required />
            </div>
            <div class="row">連絡事項:
                <textarea id="txt" rows="8" cols="85" name="things" style="resize:none" required></textarea>
                <input type="submit" id="loginbtn" value="送出">
            </div>
        </form>
    </div>

    <!-- 彈窗 JS -->
    <script>
        $(function () {
            $("#example").hover(function () {
                $(this).stop().animate({ opacity: '1' }, 600);
            }, function () {
                $(this).stop().animate({ opacity: '0.6' }, 1000);
            }).on('click', function () {
                $("body").append("<div id='mask'></div>");
                $("#mask").addClass("mask").fadeIn("slow");
                $("#LoginBox").fadeIn("slow");
            });

            $("#loginbtn").hover(function () {
                $(this).stop().animate({ opacity: '1' }, 600);
            }, function () {
                $(this).stop().animate({ opacity: '0.8' }, 1000);
            });

            $(".close_btn").hover(function () {
                $(this).css({ color: 'black' });
            }, function () {
                $(this).css({ color: '#999' });
            }).on('click', function () {
                $("#LoginBox").fadeOut("fast");
                $("#mask").css({ display: 'none' });
            });
        });
    </script>
</body>
</html>
