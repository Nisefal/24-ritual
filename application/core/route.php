<?php
include_once 'application/models/model_content.php';
include_once 'application/models/model_module.php';
include_once 'application/models/model_login.php';



/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Route
{

	static function start()
	{


        $GLOBALS['debug_mode'] = 'false';
        if(stristr($_SERVER['REQUEST_URI'], '?debug') !== FALSE) {
            $GLOBALS['debug_mode'] = 'true';
        }
        echo($GLOBALS['debug_mode'] == 'true' ? '<script>console.log("Режим дебага включен")</script>': '');


		$controller_name = 'main';


        $_SERVER['REDIRECT_URL'] =='' ? $action_name = 'index' : $action_name=$_SERVER['REDIRECT_URL'];
        echo($GLOBALS['debug_mode'] == 'true' ? '<script>console.log("Запрашиваем  Action-name = '.$action_name.'")</script>': '');



        //из базы получаем нужный там action и template и содержимое модулей
        $Model_content = new Model_Content();
        $Model_module =  new Model_Module();


        //из базы получаем пути модулей для страницы и контент
        list ($model_content) = $Model_content->get_data($action_name/*он же url*/, $_GET);


        //получаем сам контент для страниц(модули)
        list ($headerNavigation_content, $header_content, $left_content, $menu_content,  $body_content, $footer_content) = $Model_module->get_data($model_content["page_content_id"]);



        // добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;


        //include "application/modules/form_and_page.php";

		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}


		// в идеале тут надо делать запрос из бд и получать контент страницы а не искать по названию страницу во вьюхах




		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
            echo($GLOBALS['debug_mode'] == 'true' ? '<script>console.log("нужный controller не существвует")</script>': '');
            Route::ErrorPage404();
		}

		// создаем контроллер, передаем все что взяли из базки в консутруктор страницы
		$controller = new $controller_name;
		$controller->content = $model_content;


		$action = 'action_index';

		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера

			$controller->$action($headerNavigation_content, $header_content, $menu_content, $left_content, $body_content, $footer_content);


		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
            echo($GLOBALS['debug_mode'] == 'true' ? '<script>console.log("нужный controller, или metod не существуют")</script>': '');

            Route::ErrorPage404();
		}

	}

    static function ErrorPage404()
    {
        /*Не работает, где то что-то раньше выводится, надо пофиксит ьи вернуться к такому варианту
         * $host = 'https://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');*/


        echo($GLOBALS['debug_mode'] == 'true' ? '<script>console.log("Вызван редирект на 404")</script>': '<script type="text/javascript">window.location.href="/404"</script>');


    }


    
}


