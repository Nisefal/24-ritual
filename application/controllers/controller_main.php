<?php

include_once'application/models/model_catalog.php';
include_once'application/models/model_randomContent.php';
include_once'application/models/model_download.php';



class Controller_Main extends Controller
{

    public $content;

    private  $metrica = '(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter42907799 = new Ya.Metrika({ id:42907799, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");';
    private  $gtm = "function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-WQ26WGR');(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','https://www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-42977043-3', 'auto'); ga('send', 'pageview');";
    private  $googleAnalitics = '';
    private  $top100  = '(function (w, d, c) { (w[c] = w[c] || []).push(function() { var options = { project: 5752904, }; try { w.top100Counter = new top100(options); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//st.top100.ru/top100/top100.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(window, document, "_top100q");';




    function action_index($headerNavigation_content, $header_content, $menu_content, $left_content, $body_content, $footer_content)
	{



	    //на этом месте

        $catalog = '';
        $content = $this->content;

        $content_type = $content["content_type"];


        if($content_type !== NULL){
            $model_catalog = new Model_catalog();
            $catalog = $model_catalog->returnCatalog(999);
        }



        $data = array(
            "title" => $content["title"],
            "keywords" => $content["keywords"],
            "description" => $content["description"],
            "robots" => $content["robots"],
            "json_ld" => $content["json_ld"],

            "metrica" => $this->metrica,
            "gtm" => $this->gtm,
            "googleAnalitics" => $this->googleAnalitics,
            "top100" => $this->top100,


            "h1" => $content["h1"],
            "content" => $content["content"],
            "catalog" => $content["catalog"],
            "tell_code" => $content["tell_code"],
            "tell_visual" => $content["tell_visual"],

            //сборка моделей
            "headerNavigation_content" =>$headerNavigation_content,
            "header_content" => $header_content,
            "menu_content" => $menu_content,
            "left_content" => $left_content,
            "body_content" => $body_content,
            "footer_content" => $footer_content

        );



        $this->view->generate($content["template"].'_view.php',$data, '');
	}


  /*  function action_download(){
        $title = 'Загрузка изображений';

        $model_catalog = new Model_catalog();

        $model_dowmload = new Model_Download();
        $php = $model_dowmload->download();

        $data = $model_catalog->returnCatalog(999);
        $this->view->generate('download_view.php', 'templateLk_view.php', $data, $title, $php);
    }*/


}
