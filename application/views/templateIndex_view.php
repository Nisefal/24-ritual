<?php
/*
 * $title
 * $keywords
 * $description
 * $robots
 * $json_ld = '1';
$gtm = '1';
$googleAnalitics = '1';
$metrica = '1';
$top100 =1;
$h1 = '1';
$content = '1';
$catalog = '1';
$tell_number = '1';
$tell_number_visual = '1';
*/


/*
for($i=0; $i <200; $i++){

    $img = file_get_contents('https://thispersondoesnotexist.com/image');
    file_put_contents('image'.$i.'.png', $img);


}*/?>
<!DOCTYPE html>
<html>
    <head>
        <script>
            console.log(
                '// перенести шаблон - ок' + '\n' +
                '// перенсти шаблон для внутренних странц' + '\n' +
                '// создать отдельную базку - ок' + '\n' +
                '// прописать туда все страницы - in progress' + '\n' +
                '// прописать туда метатеги - in progress' + '\n' +
                '// сделать вывод картинок' + '\n' +
                '// сделать вывод карт и список заведений' + '\n' +
                '// сделать открытие изображений' + '\n' +
                '// политика кофиденциальности' + '\n' +
                '// ввести json разметку' + '\n' +
                '// ввести турбо страницы для товаров' + '\n' +
                '// ввести страницы для новостей rss' + '\n' +
                '');
        </script>
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


        <link href="/css/layout.css" rel="stylesheet" type="text/css" media="all">


        <script><?= $gtm ?></script>
        <script><?= $googleAnalitics ?></script>
        <script><?= $metrica ?></script>
        <script><?= $top100 ?></script>


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
                <section id="pageintro" class="clear">
                    <!-- ################################################################################################ -->
                    <div class="center btmspace-80">
                        <h1 class="heading xxl uppercase btmspace-30">Организация похорон в Москве</h1>
                    </div>
                    <ul class="nospace group services">
                        <li class="one_third first">
                            <article class="overlay"><a href="/pohoroni/ritualnye-uslugi/"><i class="fa fa-legal"></i></a>
                                <h6 class="heading">Организация похорон</h6>
                                <p>Организация похорон, сбор документов, заказ транспорта, отпевание</p>
                                <footer><a href="/pohoroni/ritualnye-uslugi/">Подробнее »</a></footer>
                            </article>
                        </li>
                        <li class="one_third">
                            <article class="overlay"><a href="/ritualnyy-magazin/"><i class="fa fa-line-chart"></i></a>
                                <h6 class="heading">Ритуальные принадлежности</h6>
                                <p>Гробы, надгробные кресты, венки, одежда для усопших</p>
                                <footer><a href="/ritualnyy-magazin/">Подробнее »</a></footer>
                            </article>
                        </li>
                        <li class="one_third">
                            <article class="overlay"><a href="/ritualnyy-usluga/dokumenty-dlya-pohoron"><i class="fa fa-archive"></i></a>
                                <h6 class="heading">Сбор и подготовка документов</h6>
                                <p>Сбор и оформление документов в моргах, МФЦ для проведения похорон</p>
                                <footer><a href="/ritualnyy-usluga/dokumenty-dlya-pohoron">Подробнее »</a></footer>
                            </article>
                        </li>
                    </ul>
                    <!-- ################################################################################################ -->
                </section>
            </div>
        </div>
        <!-- ################################################################################################ -->

        <div class="wrapper row3">
            <main class="container clear">
                <!-- main body -->
                <!-- ################################################################################################ -->
                <div class="group">
                    <div class="one_third first"><img src="images/rutual-24_1.jpg" alt=""></div>
                    <div class="two_third">
                        <h2 class="heading">Если случилось непоправимое...</h2>
                        <p>
                            Потеря близкого человека-это стрессовая ситуация для любого человека.
                            Дополнительно, она осложняется тем что в предельно сжатые сроки необходимо проделать массу работы и
                            учесть множество нюансов при организации похорон. Лучшее решение- это доверить процесс человеку,
                            знающему все тонкости и подводные камни в этом не лёгком деле. Для которого организация похорон-это профессия.
                        </p>
                        <p class="btmspace-80">
                            Поручив организацию похорон нам, вам останется лишь предупредить родственников о месте и дате прощания.
                            Все необходимые мероприятия- сбор документов,
                            заказ кремации либо копки могилы, доставка ритуальных принадлежностей, отпевание будет сделано нами.
                        </p>
                        <ul class="nospace group">
                            <li class="one_third first">
                                <h6 class="nospace btmspace-10"><a href="/ritualnyy-usluga/ritualnyy-agent"><i class="fa fa-location-arrow"></i> Выезд</a></h6>
                                <p class="nospace">Сотрудник бюро бесплатно выезжает к заказчику для проведения консультации и оформления заказа.
                                    Берет на себя обязанности по сбору и подготовке всей необходимой документации для проведения обряда похорон.</p>
                            </li>
                            <li class="one_third">
                                <h6 class="nospace btmspace-10"><a href="/ritualnyy-usluga/ritualnyy-agent"><i class="fa fa-lock"></i> Защита </a></h6>
                                <p class="nospace">Юридическая образованность и опыт работы позволяют нашим сотрудниткам защитить Вас от коррумпированности
                                    органов и обеспечить законность всех процедур</p>
                            </li>
                            <li class="one_third last">
                                <h6 class="nospace btmspace-10"><a href="/ritualnyy-usluga/ritualnyy-agent"><i class="fa fa-map-marker"></i> Сопровождение</a></h6>
                                <p class="nospace">Сопровождаем Вас от заполнения бланков, до похорон</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- ################################################################################################ -->
                <!-- / main body -->
                <div class="clear"></div>
            </main>
        </div>
                <!-- ################################################################################################ -->
        <div class="wrapper row2 bgded">
            <div class="overlay">
                <section id="pageintro" class="clear">
                    <!-- ################################################################################################ -->
                    <div class="center btmspace-80">
                        <p class="xl nospace capitalise">Стоимость организации похорон</p>
                    </div>
                    <ul class="nospace group services">
                        <li class="one_third first">
                            <article class="overlay"><a href="/pohoroni/byudzhetnyy-variant-pohoron"><i class="fa fa-legal"></i></a>
                                <h6 class="heading">Бюджетные похороны</h6>
                                <p>27 700 Рублей</p>
                                <footer><a href="/byudzhetnyy-variant-pohoron">Включает в себя &raquo;</a></footer>
                            </article>
                        </li>
                        <li class="one_third">
                            <article class="overlay"><a href="/pohoroni/dostoynye-pohorony"><i class="fa fa-line-chart"></i></a>
                                <h6 class="heading">Достойные похороны</h6>
                                <p>38 100 Рублей</p>
                                <footer><a href="/pohoroni/dostoynye-pohorony">Включает в себя &raquo;</a></footer>
                            </article>
                        </li>
                        <li class="one_third">
                            <article class="overlay"><a href="/pohoroni/bogatye-pohorony"><i class="fa fa-archive"></i></a>
                                <h6 class="heading">Богатые похороны</h6>
                                <p>50 300 Рублей</p>
                                <footer><a href="/pohoroni/bogatye-pohorony">Включает в себя &raquo;</a></footer>
                            </article>
                        </li>
                    </ul>
                    <!-- ################################################################################################ -->
                </section>
            </div>
        </div>
        <!-- ################################################################################################ -->
        <div class="wrapper row7">
            <section id="info2" class="clear">
                <!-- ################################################################################################ -->
                <div id="positionCentr">
                    <div class="one_half_2 first"><img src="/images/msk.png" alt="" id="img_msk"></div>
                    <div class="center btmspace-80 mskPosition">
                        <p class="lrspace">
                            Московское бюро ритуальных услуг работает на основании законов:
                            Федеральный закон № 8 ФЗ от 12 января 1996 года «О погребении и похоронном деле»,
                            Закон города Москвы № 11 от 4 июня 1997 года «О погребении и похоронном деле в городе Москве».

                            Работа организации соответствуют Государственному стандарту Р 54611—2011 (Услуги по организации и проведению похорон).
                            <br/>
                            Горячая линиия call-центра работает 24 часа. По номеру телефону организована неотложная помощь и консультация.
                        </p>
                    </div>
                </div>
        </div>

        <div class="wrapper row4">
            <section id="info" class="clear">
                <!-- ################################################################################################ -->
                <div class="center btmspace-80">
                    <h2 class="heading uppercase btmspace-30" id="callMe">Горячая линия работает 24 часа, бесплатная консультация<br><br>
                        <div name="addForNumber" id="addForNumber">
                            <a style="color: white" href= <?= '\"'.$tell_code.'\"' ?> ><?= $tell_visual ?></a>
                        </div>
                    </h2>

                    <p class="lrspace">
                        Московское похоронное бюро ритуальных услуг выполняет соц.обязательства.
                        Если безвременно ушедший человек защищал нашу Родину в локальных или мировых конфликтах, не важно- на передовой или в тылу.
                        Или же являлся ветераном труда. Вам будут предоставлены все полагающиеся скидки, предусмотренные законом.
                    </p>

                    <div align="right">
                        <p class=""> <a href="http://kremlin.ru/acts/bank/8741">Федеральный закон от 12.01.1996 г. № 8-ФЗ</a></p>
                    </div>

                    <br>

                    <h2 class="heading uppercase btmspace-30" id="nameForTellMe">
                        Бюро ритуальных услуг гарантирует:
                    </h2>



                    <div class="group">
                        <div class="one_half first"><img src="/images/ritual-24_2.jpg" alt="" id="img_2"></div>
                        <div class="one_half">
                            <ul class="nospace group services">
                                <li>
                                    <article><a href="/ritualnyy-usluga/ritualnyy-agent"><i class="fa fa-asterisk"></i></a>
                                        <h6 class="heading">Выполнение социальных обязательства</h6>
                                        <p>Мы обеспечиваем исполнение действующего законодательства, соблюдение всех норм похоронной процессии </p>
                                        <!--  <footer><a href="#">Read More &raquo;</a></footer> --><br>
                                    </article>
                                </li>
                                <li>
                                    <article><a href="/ritualnyy-usluga/ritualnyy-agent"><i class="fa fa-bar-chart"></i></a>
                                        <h6 class="heading">Юридическое сопровождение</h6>
                                        <p>Защищаем он непредвиденных трат, а тажек проводим проверку сопроводительной документации</p>
                                        <!-- <footer><a href="#">Read More &raquo;</a></footer>--><br>
                                    </article>
                                </li>
                                <li>
                                    <article><a href="/ritualnyy-usluga/ritualnyy-age"><i class="fa fa-paper-plane-o"></i></a>
                                        <h6 class="heading">Консультацию</h6>
                                        <p>Всегда на связи во время и после проведения похорон</p>
                                        <!-- <footer><a href="#">Read More &raquo;</a></footer>--><br>
                                    </article>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- ################################################################################################ -->
                    <div class="clear"></div>
            </section>
        </div>


        <!-- footer -->
        <div class="wrapper row5">
            <footer id="footer" class="clear">
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
                <p class="fl_left"> &copy; 2016-2018  Информационный портал - <a href="https://24-ritual.ru/">24-ritual.ru</a></p>
            </div>
        </div>

        <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

        <!-- JAVASCRIPTS -->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/jquery.backtotop.js"></script>
        <script src="/js/jquery.mobilemenu.js"></script>


    <style>
        .container {
            padding: 40px 0 !important;
        }
    </style>

    </body>
</html>