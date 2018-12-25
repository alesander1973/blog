<?php
require_once 'function/functions.php';
my_session_start('my_secure_blog');
//session_start();
session_destroy();
header("location:index.php");
die;
?>