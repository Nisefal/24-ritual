<?php


//страница отдает контент и модули для страницы, если запрашиваемой страницы нет - директнет на 404

include_once'application/config/db.php';
include_once'application/models/model_rss.php';



class Model_Content{



	public function get_data($url, $get_params){

        $db  = new db();

        $result = $db->db_function("
                                        SELECT *
                                                FROM  `route`, `page_content`, `tell`
                                                WHERE `route`.page_content_id = `page_content`.id
                                                AND `route`.url = '$url';
                                  ");

        $page_content = $result->fetch_assoc();



        //тут мы проверяем гет параметры, если есть параметр отвечающий за одну из страниц - мы заново пересобираем страницу
        //page content


        if(isset($get_params['tovar'])){

            $tovar_id = $get_params['tovar'];
            $new_content = $db->db_function("
                                        SELECT *
                                                FROM  `catalog`
                                                WHERE `catalog`.id = '$tovar_id';
                                  ");
            $new_content = $new_content->fetch_assoc();

            $page_content["title"] = $new_content["name"];
            $page_content["h1"] = $new_content["name"];

        }

        if(isset($get_params['obekt'])){

            $object_id = $get_params['obekt'];

            $new_content = $db->db_function("
                                        SELECT *
                                                FROM  `objects`
                                                WHERE `objects`.id = '$object_id';
                                  ");

            $new_content = $new_content->fetch_assoc();
            $page_content["title"] = $new_content["name"];
            $page_content["h1"] = $new_content["name"];
            $page_content["keywords"] = $new_content["keywords"];


        }



        //закончили пересобирать ниже пример того что и куда кидается

       /* echo('<pre>');
        print_r($page_content);
        echo('</pre>');


        echo('<pre>');
        print_r($new_content);
        echo('</pre>');*/




        if ($page_content == ''){
            echo($GLOBALS['debug_mode'] == 'true' ? '<script>console.log("Model_content пустая")</script>': '');
            Route::ErrorPage404();
        }

        echo($GLOBALS['debug_mode'] == 'true' ? '<script>console.log("Model_content заполнена")</script>': '');

        return array($page_content);

    }



    public function get_multiple($url){


        $db  = new db();

//в массив кладу все id модлей что подклбсены к сранице

        $stack = array();



        $result = $db->db_function("
                                        SELECT `id`, `name`
                                                FROM  `modules_type`;
                                  ");

        $HTML_pages = '<select name="modules_id" multiple>';


        $result2 = $db->db_function("
                                        select modules_type_id
                                                            from modules_pages, modules_type
                                                                 where modules_pages.modules_type_id =
                                                                       modules_type.id
                                                            and page_content_id = 

                                                                    (	
                                                                        select page_content_id from route, page_content
                                                                            where route.url='$url'
                                                                            and route.page_content_id = page_content.id
                                                                
                                                                    )
                                                          
                                  ");



        while (($row = $result2->fetch_assoc()) != false) {

            array_push($stack, $row["modules_type_id"]);

        }



        if (in_array("Irix", $stack)) {
            echo "Нашел Irix";
        }


        while (($row = $result->fetch_assoc()) != false) {



            if (in_array($row["id"], $stack)) {

                $HTML_pages = $HTML_pages . '
                                            <option selected="selected" value="'.$row["id"].'">'.$row["name"].'</option>
                                        ';

            }else{

                $HTML_pages = $HTML_pages . '
                                            <option value="'.$row["id"].'">'.$row["name"].'</option>
                                        ';

            }



        }








        $HTML_pages = $HTML_pages . '</select>';

        return $HTML_pages;


    }





    //возвращает список статей для модуля форм энд пейджс
    public function get_pages(){

        $db  = new db();

        $result = $db->db_function("SELECT page_content.title, /*page_content.content,*/ route.url
                                                            FROM  route, page_content
                                                            WHERE route.page_content_id = page_content.id
                                                            ORDER BY route.url
                                ");



        $HTML_pages = '    
                       <div class="hide-on-mobile"><div class="sidebar one_quarter first"><nav class="sdb_holder"><ul>
                       <input value="Новая статья" onclick="new_content()" type="button" style="color: green;">
                       ';


        while (($row = $result->fetch_assoc()) != false) {

            $HTML_pages = $HTML_pages . '
            <li><input value="'.$row["title"].'" onclick="add_content(\''.$row["url"].'\')" type="button"></li>
            ';

        }

        $HTML_pages = $HTML_pages . '</ul></nav></div></div>';

        return $HTML_pages;

    }


    public function deletePage($page_content_id){

        $db_data = array(

            'host' => '31.31.196.36',
            'database' => 'u0305396_24-ritual',
            'username' => 'u0305396_24-ritu',
            'password' => '2W5w3G7d',
            'charset' => 'utf8',

        );

        $mysqli = mysqli_connect($db_data['host'], $db_data['username'], $db_data['password'], $db_data['database'])
        or die("Ошибка " . mysqli_error($mysqli));
        $mysqli->query("SET NAMES 'utf8'");


        $mysqli->query("DELETE FROM `modules_pages`
                                      WHERE page_content_id = '$page_content_id'");
        $mysqli->close();

    }





    //днная функция вызывается из saveContent - получает id модуля и записывает его
    public function addModule($page_content_id, $modules_id){


        $db  = new db();


            $db->db_function("INSERT INTO modules_pages (
                                                modules_type_id, page_content_id
                                            )
                                          VALUES(
                                          '$modules_id', '$page_content_id'
                                                );

                            ");


    }


        //сохранить контент
    public function saveContent($json_arr){


        $db  = new db();


        // если мы поменяем место page_content_id при сериализации - у нас перестанут сохрянстся модули
        $page_content_id = $json_arr[0]['value'];
        $template = 'template';
        $time = time();


        //чистим старые модули для данной страницы
        if($page_content_id !=''){
            $this->deletePage($page_content_id);

/*            var_dump($page_content_id);*/
        }




        for($i=0; $i<count($json_arr); $i++){

            $name = "{$json_arr[$i]['name']}";
            $$name = $json_arr[$i]['value'];



            //если есть в цикле modules_type_id = мы сразу его пишем в нашу таблу
            // и да, модули будут обновляться раньше самой страницы
            if(($json_arr[$i]["name"]) == 'modules_id'){

                $this->addModule($page_content_id, $modules_id);
            }


        }





        //короче при добавление модулей - порядковый номер всегда сбивается
        //решение стало генерация и запись модлулей на ходу после поулчения массивов,
        //проблема в том была, что в массиве они называются одинаково
        //да - все красное - переменные выше создаются на лету
/*
        $page_content_id = $json[0]['page_content_id'];
        $title = $json[1]['title'];
        $url = $json[2]['url'];
        $description = $json[3]['description'];
        $keywords = $json[4]['keywords'];
        $robots = $json[5]['robots'];
        $json_ld = $json[0]['json_ld'];
        $h1 = $json[0]['h1'];
        $preview = $json[0]['preview'];
        $content = $json[0]['content'];*/




        if($page_content_id !=''){


            $db->db_function("UPDATE `page_content`
                                                    SET 
                                                        title = '$title', 
                                                        keywords = '$keywords',
                                                        description = '$description',
                                                        robots = '$robots',
                                                        json_ld = '$json_ld',
                                                        h1 = '$h1',
                                                        content = '$content',
                                                        date_create = '$time',
                                                        preview = '$preview'
                                                    WHERE `id` = '$page_content_id'
                                ");





            $db->db_function("UPDATE `route`
                                                    SET 
                                                        url = '$url'
                                                    WHERE `page_content_id` = '$page_content_id'
                                ");

/*            var_dump($url);*/



        }else{



            //а тут инсертим новую запись
            $db->db_function("INSERT INTO page_content (
												    title, keywords, description, robots, json_ld, h1, content, date_create, preview
												)
                                              VALUES(
                                              '$title', '$keywords', '$description', '$robots', '$json_ld', '$h1','$content', '$time', '$preview'
                                                    );

                                ");

            $db->db_function("INSERT INTO route (
									                url, template, page_content_id
									            )
	                                          VALUES (
                                                    '$url', '$template', (SELECT MAX(`id`) FROM `page_content`)
                                                     )
                                ");



            //добавляет в базку модули
            for ($i = 0; $i < count($json_arr); $i++) {

                if(($json_arr[$i]["name"]) == 'modules_id'){

                    $modules_type_id = $json_arr[$i]["value"];

                    $db->db_function("INSERT INTO modules_pages (
												    modules_type_id, page_content_id
												)
                                              VALUES(
                                              '$modules_type_id', (SELECT MAX(`id`) FROM `page_content`)
                                                    );

                                ");
                }

            }






        }

        return $json_arr;
    }











}

