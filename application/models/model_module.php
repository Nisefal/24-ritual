<?php


//страница отдает контент и модули для страницы, если запрашиваемой страницы нет - директнет на 404



include_once'application/config/db.php';




class Model_Module{


	public function get_data($page_content_id){


        $db = new db();

        $page_modules = $db->db_function("
                                         SELECT `modules_type`.url, `modules_type`.position
                                                    FROM  `modules_pages`, `modules_type`
                                                    WHERE `modules_pages`.modules_type_id = `modules_type`.id
                                                    AND `modules_pages`.page_content_id = '$page_content_id';
                                  ");





        echo($GLOBALS['debug_mode'] == 'true' ? '<script>console.log("Model_page в model_module = '.$page_content_id.'")</script>': '');


        $rows = mysqli_num_rows($page_modules); // количество полученных строк


        $headerNavigation_content = '';
        $header_content = '';
        $left_content = '';
        $menu_content = '';
        $body_content   = '';
        $footer_content = '';



        echo($GLOBALS['debug_mode'] == 'true' ? '<script>console.log("'.$rows.'")</script>': '');




        for ($i = 0 ; $i < $rows ; $i++) {


            $row = mysqli_fetch_row($page_modules);


            if($row[1] == 'header'){

                $header_content = $header_content.file_get_contents('application/modules'.$row[0].'model.php');
                echo($GLOBALS['debug_mode'] == 'true' ? '<script>console.log("в header_content положили '.$row[0].'")</script>': '');


            }elseif ($row[1] == 'menu'){

                $menu_content = $menu_content.file_get_contents('application/modules'.$row[0].'model.php');

                echo($GLOBALS['debug_mode'] == 'true' ? '<script>console.log("в menu_content положили '.$row[0].'")</script>': '');


            }elseif ($row[1] == 'left'){

                $left_content = $left_content.file_get_contents('application/modules'.$row[0].'model.php');
                echo($GLOBALS['debug_mode'] == 'true' ? '<script>console.log("в left_content положили '.$row[0].'")</script>': '');



            }elseif ($row[1] == 'body'){

                $body_content = $body_content.file_get_contents('application/modules'.$row[0].'model.php');
                echo($GLOBALS['debug_mode'] == 'true' ? '<script>console.log("в body_content положили '.$row[0].'")</script>': '');


            }elseif ($row[1] == 'headerNavigation'){

                $headerNavigation_content = $headerNavigation_content.file_get_contents('application/modules'.$row[0].'model.php');
                echo($GLOBALS['debug_mode'] == 'true' ? '<script>console.log("в headerNavigation_content положили '.$row[0].'")</script>': '');

            }


            else{

                $footer_content = $footer_content.file_get_contents('application/modules'.$row[0].'model.php');
                echo($GLOBALS['debug_mode'] == 'true' ? '<script>console.log("в footer_content положили '.$row[0].'")</script>': '');

            }



        }








/*
        $body_content = file_get_contents('application/modules/form_and_pages/model.php');
        file_put_contents('body.php',file_get_contents("$body").file_get_contents("$body"));


	    echo $body;*/

        return  array($headerNavigation_content, $header_content, $left_content, $menu_content, $body_content, $footer_content);


    }

}