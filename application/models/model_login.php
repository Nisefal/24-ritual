<?php
/**
 * Created by PhpStorm.
 * User: homushka
 * Date: 2019-04-29
 * Time: 17:52
 */


include_once 'application/config/db.php';


class Model_login{


    public function check_admin($login, $password){
        $db  = new db();

        $pass = md5(md5($password));

        $result = $db->db_function("
                                        SELECT hash, date_expires
                                                FROM  `users`
                                                WHERE `users`.username = '$login' 
                                                AND `users`.pass = '$pass';
                                  ");

        $row = $result->fetch_row();

        if($row == null)
            return null;

        if(time() > strtotime($row[1])) {
            $hash_n = md5(time());
            $ntime = time()+86400;
            $datetime = date("Y-m-d H:i:s", $ntime);
            $result = $db->db_function("
                                        UPDATE users SET hash = '$hash_n', date_expires = '$datetime'
                                                WHERE `users`.username = '$login';
                                  ");

            $result = $db->db_function("
                                        SELECT hash, date_expires
                                                FROM  `users`
                                                WHERE `users`.username = '$login';
                                    ");


            $row = $result->fetch_row();

            return $row;
        }

        return $row;
    }

    public function check_admin_by_hash($hash){
        $db  = new db();

        $result = $db->db_function("
                                        SELECT hash, date_expires
                                                FROM  `users`
                                                WHERE `users`.hash = '$hash';
                                  ");

        $row = $result->fetch_row();

        if(time() > strtotime($row[1])) {
            return null;
        }

        return $row;
    }

}