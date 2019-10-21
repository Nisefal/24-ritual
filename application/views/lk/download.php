<?php

include_once 'model_catalog.php';

/*print_r($_FILES);*/

if(isset($_FILES) && !empty($_FILES)){
    $destiation_dir = dirname(__FILE__) .'/images/'.$_FILES['userfile']['name'];
    move_uploaded_file($_FILES['userfile']['tmp_name'], $destiation_dir );
    /*echo 'File Uploaded';
    echo $destiation_dir;*/
    echo('Файл ');
}
else{
    /*echo 'Что-то отвалилось, звоним Саше)'; // Send message to user that no file uploaded*/
}


$model_venki = new Model_catalog();
$data = $model_venki->returnCatalog(1);

?>



<?php

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>Загрузка изображений</title>
    <!--[if lte IE 8]>
    <script src="/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="/css/main.css" />
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/css/ie9.css"/><![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="/css/ie8.css"/><![endif]-->
    <link rel="stylesheet" href="/css/my.css" />
    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter47816026 = new Ya.Metrika({ id:47816026, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/47816026" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

    <script src="/js/base.js"></script>

</head>
<body>

<div class="header inner-header">

    <div class="header-top-wrap">
        <div class="header-top-wrap-all">

        </div>
    </div>
    <div class="phone-number-top"><a class="inner-call roistat-phone" href="tel:+74951816691">8 (495) 181-66-91</a></div>
</div>
<!-- Wrapper -->
<div id="wrapper">


    <!-- Main -->
    <div id="main">
        <div class="inner">

            <h1>Загрузка изображений на сайт</h1>
            <form method="post" action="download.php" enctype="multipart/form-data">
                <p><input type="text" placeholder="Название товара"></p>
                <p><input type="text" placeholder="Стоимость товара(только цифры)"></p>
                <p>
                    <select>
                        <option disabled>Выберите тип товара</option>
                        <option value="1">Крест</option>
                        <option value="2">Гроб</option>
                        <option value="3">Венок</option>
                        <option value="4">Гирлянда</option>
                    </select>
                </p>
                <p><input type="file" id="userfile" name="userfile"></p>
                <p><input type="submit" value="Загрузить"></p>
            </form>

        </div>
    </div>

    <div id="content_block">
        <div class="posts">
            <?=$data ?>
        </div>
    </div>

    <!-- Sidebar -->


</div>



<!-- Scripts -->
<script src="/js/jquery.min.js"></script>
<script src="/js/skel.min.js"></script>
<script src="/js/util.js"></script>
<!--[if lte IE 8]>
<script src="/js/ie/respond.min.js"></script><![endif]-->
<script src="/js/main.js"></script>

</body>
</html>

