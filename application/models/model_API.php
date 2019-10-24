<?php
/**
 * Created by PhpStorm.
 * User: homushka
 * Date: 2019-04-29
 * Time: 17:52
 */


include_once 'application/config/db.php';


class Model_API{

    public function check_key($key){
        $db  = new db();

        $result = $db->db_function("
                                        SELECT key
                                                FROM  `API_keys`
                                                WHERE `API_keys`.key = '$key'
                                  ");

        $row = $result->fetch_row();

        if($row == null)
            return false;
        else
            return true
        
    }

}