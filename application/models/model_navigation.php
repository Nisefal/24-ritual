<?php
/**
 * Created by PhpStorm.
 * User: homushka
 * Date: 14.10.2018
 * Time: 12:44
 * Отдает по ключу путь - сделать для редактирования чпу из базы, после редактирвоания из базы не придется менять путь в теле сайта
 */
include_once'../../application/config/db.php';



class Model_Navigation{


    function get_url($id){

        $db = new db();
        $mysqli = $db->db_function();


        $resultSet = $mysqli->query("SELECT * FROM `route` WHERE `id` = $id");
        mysqli_close($mysqli);

        $row = $resultSet->fetch_assoc();


        return $row["url"];
    }



}