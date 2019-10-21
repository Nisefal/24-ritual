<?php
/**
 * Created by PhpStorm.
 * User: homushka
 * Date: 14.05.2018
 * Time: 15:53
 */


class db{

     function db_function($sql){

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


        $result = $mysqli->query("$sql");
        $mysqli->close();

        return $result;
    }

}
