<?php

if (!function_exists('db_connect')) {

    function db_connect() {
        require_once('config/database.php');
       
        if (!$link = @mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB)) {

            die('Error connecting to mysql server!');
        }

        return $link;
    }

}

if (!function_exists('my_session_start')) {

    function my_session_start($name) {
        session_set_cookie_params(60 * 60 * 24 * 7);
        session_name($name);
        session_start();
        session_regenerate_id();
    }

}

if (!function_exists('checkUser')) {

    function checkUser() {
        $valid = false;

        if (isset($_SESSION['name']) && $_SERVER['REMOTE_ADDR'] == $_SESSION['ip_address']) {
            if ($_SERVER['HTTP_USER_AGENT'] == $_SESSION['HTTP_USER_AGENT']) {

                $valid = true;
            }
        }
        return $valid;
    }

}
?>