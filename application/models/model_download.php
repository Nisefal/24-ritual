<?php


include_once'application/config/db.php';


class Model_Download
{


    // сама загрузка файла
    function download()
    {


        $security = array(
            'image/gif',
            'image/png',
            'image/jpeg',
            'image/jpg',
        );



        if (isset($_FILES) && !empty($_FILES)) {

            if (in_array($_FILES['userfile']['type'], $security)) {


                $destiation_dir = dirname(__DIR__) . '/images/';

                $vowels = array(" ", ".", ",");
                $newName = str_replace($vowels, "", rand(5, 9999999) . '-' . $_FILES['userfile']['name']);
                $newName = $newName . '.png';

                $name = htmlspecialchars($_POST["name"]);
                $price = htmlspecialchars($_POST["price"]);
                $type = htmlspecialchars($_POST["type"]);


                move_uploaded_file($_FILES['userfile']['tmp_name'], $destiation_dir . $newName);

                /*echo 'File Uploaded';
                echo $destiation_dir;*/
                echo('<script>console.log("Файл загружен c именем: ' . $newName . '");</script>');


                $this->setFunction($name, $price, $type, $newName);


            }else{
                die('Ата-та, загружаете плохой файл=)<br><a href="/download"><input type="button" value="Вернуться"></a>');
            }

        }else{
            /*die('Что-то пошло не так(((<br><a href="/download"><input type="button" value="Вернуться"></a>');*/
        }

        /*print_r($_FILES);*/

    }





     //пишет путь до кратинки в бд
    function setFunction($name, $price, $type, $url){

        $create_at = time();

        $db = new db();
        $mysqli = $db->db_function();


        $mysqli->query("INSERT INTO `catalog` 
                      (`status`, `type`, `name`, `count`, `url`, `create_at`)  VALUES
                      ('1', '$type' ,'$name', '$price', '$url', '$create_at');");

        mysqli_close($mysqli);
    }



}




