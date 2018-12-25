<?php

require_once 'function/functions.php';
my_session_start('my_secure_blog');



$err = '';

$sm = '';

if (isset($_POST['submit1'])) {
    if (empty($_SESSION['titleEdit'])) {
        $err = "you must fill in a title";
    } elseif (empty($_SESSION['articleEdit'])) {
        $err = "you must fill in some text ";
    } else {
        $link = db_connect();
        mysqli_set_charset($link, "utf8");
        $title = trim($_POST['titleEdit']);
        $article = trim($_POST['articleEdit']);
        $title = mysqli_real_escape_string($link, $title);
        $article = mysqli_real_escape_string($link, $article);

        $uid = $_SESSION['uid'];
        $post_id = $_SESSION['id'];


        if (is_numeric($post_id)) {
            $post_id = mysqli_real_escape_string($link, $post_id);

            $sql = "UPDATE posts SET title = '$title', article = '$article' WHERE id = '$post_id' AND uid = '$uid'";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_affected_rows($link) > 0) {

                    $_SESSION['sm'] = 'the post has been updated';
                }
            }
        }
    }
}
//                      
                        header('Location: blog.php');


//if ($link = db_connect()) {
//    $post_id = $_SESSION['uid'];
//
//    if (is_numeric($post_id)) {
//        $post_id = mysqli_real_escape_string($link, $post_id);
//        mysqli_set_charset($link, "utf8");
//        $sql = "SELECT * FROM posts WHERE id ='$post_id' ";
//    echo $sql;
//            header('location :blog.php');
////        $result = mysqli_query($link, $sql);
////
////        if ($result && mysqli_num_rows($result) > 0) {
////
//////            $row = mysqli_fetch_assoc($result);
////
////        }
//    }
//}
?>
