<?php

$flag = false;

if($_POST["uname"] && $_POST["pass"]) {
        $model_login = new Model_login();
        $result = $model_login->check_admin($_POST['uname'], $_POST['pass']);
        $_SESSION['hash'] = $result[0];
        if($_SESSION['hash'] !== null)
            $flag = true;
}
else {
    if ($_SESSION['hash']) {
        $model_login = new Model_login();
        $result = $model_login->check_admin_by_hash($_SESSION['hash']);
        if($result !== null)
            $flag = true;
        else
            unset($_SESSION['hash']);
    }
}

?>

<html>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" >
        <title><?= $title ?> - Админпанель</title>

        <meta name="keywords" content="<?= $keywords ?>" >
        <meta name="description" content="<?= $description ?>" >
        <meta name="robots" content="<?= $robots ?>" >
        <meta name="viewport" content="width=device-width, initial-scale=1" >
        <meta name="copyright" lang="ru" content="24-ritual.ru" >
        <meta name="author" content="24-ritual.ru" >
        <meta name="reply-to" content="info@24-ritual.ru" >
        <meta name="data-create" >
        <link rel="help" href="mailto:info@24-ritual.ru" >

        <meta http-equiv="content-language" content="ru">

        <link rel="icon" type="/image/png" href="/favicon.png">
        <link rel="manifest" href="/manifest.json">

        <?= $json_ld ?>

        <link href="/css/layout.css" rel="stylesheet" type="text/css" media="all" >


        <script><?= $gtm ?></script>
        <script><?= $googleAnalitics ?></script>
        <script><?= $metrica ?></script>
        <script><?= $top100 ?></script>
        <script>
            function proceed(){
                url = window.location.href;
                window.location.href = url.replace('auth','pages');
            }
        </script>



        <?= $header_content ?>



        </head>


    <body>

    <div id="firstPanel">


        <div class="wrapper row0">
            <div id="topbar" class="clear">
                <div class="fl_left">
                    <ul class="nospace inline tellLine">

                        <li><i class="fa fa-phone"></i><a href="tel:<?= $tell_code ?>"> <?= $tell_visual ?></a></li>
                        <li><i class="fa fa-envelope-o"></i><a href="mailto:info@24-ritual.ru">info@24-ritual.ru</a></li>

                    </ul>
                </div>
            </div>
        </div>

        <!-- ################################################################################################ -->

        <div class="firstNavigation">
            <header id="header" class="clear">
                <div id="logo" class="fl_left">
                    <a href="/" class="startText">БЮРО РИТУАЛЬНЫХ УСЛУГ</a>
                </div>

                <?= $headerNavigation_content ?>

            </header>
        </div>
        <!-- ################################################################################################ -->
        <div class="wrapper row2 bgded" style="background-image:url('/images/startWallpapers.jpg');">
            <div class="overlay">
                <div id="breadcrumb" class="clear">
                </div>
            </div>
        </div>
        <!-- ################################################################################################ -->

        <div class="wrapper row3">
            <main class="container clear">

                <div id="left_navigation">

                    <?= $left_content ?>

                </div>



                <!-- страница -->
                <div class="content three_quarter">

                    <h1><?= $h1 ?></h1>
                    <?php 
                    if($flag === false) echo "<form method=\"POST\">Username: <input type=\"text\" name=\"uname\"><br>Password: <input type=\"password\" name=\"pass\"><br><input type=\"submit\" value=\"Login\"></form>"; 
                    else echo "<h1>Login successful!</h1><br><input type=\"button\" onclick=\"proceed()\" value=\"Proceed to adminpanel\">";
                    ?>
                    

                </div>

            </main>
        </div>


        <!-- footer -->
        <div class="wrapper row5">
            
        </div>

        <div class="wrapper row6">
            <div id="copyright" class="clear">
                <p class="fl_left"> &copy; 2016-2019  Разработано для - <a href="https://24-ritual.ru/">24-ritual.ru</a></p>
            </div>
        </div>

        <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

        <!-- JAVASCRIPTS -->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/jquery.backtotop.js"></script>
        <script src="/js/jquery.mobilemenu.js"></script>


    </body>


</html>