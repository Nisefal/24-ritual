
<html>
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" >
        <title><?= $title ?> - Похоронное бюро "24-Ритуал"</title>

        <meta name="keywords" content="<?= $keywords ?>" >
        <meta name="description" content="<?= $description ?>" >
        <meta name="robots" content="<?= $robots ?>" >
        <meta name="viewport" content="width=device-width, initial-scale=1" >
        <meta name="copyright" lang="ru" content="24-ritual.ru" >
        <meta name="author" content="24-ritual.ru" >
        <meta name="reply-to" content="info@24-ritual.ru" >
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
                    <?= $content ?> <!--сам текст -->
                    <?= $body_content ?> <!--сами модули -->


                </div>

            </main>
        </div>





        <!-- footer -->
        <div class="wrapper row5">
            <footer id="footer" class="clear">

                <?= $footer_content ?>

                <!-- ################################################################################################ -->
                <div class="one_quarter first">

                    <h6 class="title">Ритуальная служба</h6>
                    <address class="btmspace-15">
                        ООО "БЮРО РИТУАЛЬНЫХ УСЛУГ"<br>
                        город Москва, улица Декабристов, дом 1<br>
                        Индекс 127562<br>

                    </address>
                    <ul class="nospace">
                        <li class="btmspace-10"><span class="fa fa-phone"></span>
                            <a href="<?= $tell_code ?>"><?= $tell_visual ?></a>
                        </li>

                        <li><span class="fa fa-envelope-o"></span> info@24-ritual.ru</li>
                    </ul>
                </div>
                <div class="one_quarter">
                    <h6 class="title">Информация</h6>
                    <ul class="nospace linklist">
                        <li><a href="/nashi-kontakty/">Контакты</a></li>
                        <li><a href="/pohoroni/stoiomost-pohoron/">Стоимость похорон</a></li>
                        <li><a href="/informaciya/pogrebenie/">Обряды</a></li>
                        <li><a href="/ritualnyy-usluga/dokumenty-dlya-pohoron/">Сбор документов-инструкция</a></li>

                    </ul>
                </div>

                <div class="one_quarter">
                    <h6 class="title">Принадлежности</h6>
                    <ul class="nospace linklist">
                        <li><a href="/ritualnyy-magazin/">Каталог товаров</a></li>
                        <li><a href="/ritualnyy-magazin/krest-na-mogilu/">Кресты</a></li>
                        <li><a href="/ritualnyy-magazin/groby/">Гробы</a></li>
                        <li><a href="/ritualnyy-magazin/ritualnye-venki/">Венки</a></li>
                    </ul>
                </div>


                <div class="one_quarter">
                    <h6 class="title">Оставьте заявку</h6>
                    <form method="post" action="#">
                        <fieldset>
                            <legend>Newsletter:</legend>
                            <input class="btmspace-15" id="ScbName" type="text" value="" placeholder="Введите имя">
                            <input class="btmspace-15" id="ScbNumber" type="text" value="" placeholder="Введите номер">
                            <button type="submit" id="ScbSubmit" value="submit">Отправить</button>
                        </fieldset>
                    </form>
                </div>
            </footer>
        </div>

        <div class="wrapper row6">
            <div id="copyright" class="clear">
                <p class="fl_left"> &copy; 2016-2018  Разработано для - <a href="https://24-ritual.ru/">24-ritual.ru</a></p>
            </div>
        </div>

        <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

        <!-- JAVASCRIPTS -->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/jquery.backtotop.js"></script>
        <script src="/js/jquery.mobilemenu.js"></script>


    </body>


</html>