<?php
require_once 'function/functions.php';
my_session_start('my_secure_blog');
$sm = '';
if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] == 'admin') {
        $sm = "Welcome Admin!";
    } else {
        header('location: sign_in.php');
    }
}



if (isset($_GET['opp'])) {
    if ($link = db_connect()) {
        if ($_GET['opp'] == 'approved') {
            $opp = 1;
        } else {
            $opp = 0;
        }
        $sql = "UPDATE sign_user SET status = '$opp' WHERE  id = {$_GET['uid']}";

        $result = mysqli_query($link, $sql);

        if ($result && mysqli_affected_rows($link) > 0) {
            echo 'Row updated';
        } else {
            $err = 'Error conect to DB';
        }
    }
}




if ($link = db_connect()) {
    $sql = "SELECT * FROM sign_user";
    $result = mysqli_query($link, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
//        echo '<pre>';
//        print_r($data);
    } else {
        $err = 'Error connecting to DB';
    }
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <script src = "//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            /*body { padding-top: 70px; }*/
        </style>
        <!------ Include the above in your HEAD tag ---------->
    </head>
    <body>
        <!--        <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <ul style="background-color: gainsboro; height: 60px; padding: 10px;">
                    <li><button type="button" class="btn btn-primary">Go to Home page</button></li>
                    <li style="text-align: center;"> <span style="font-family: Times New Roman; color: blue;"><?= $sm ?></span></li>           
                </ul>
                    </nav>
                    </div>-->
        <!-- Image and text -->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <img alt="" src="">
                        <i class="fas fa-home"></i>
                    </a>
                </div>
                <div class="navbar-header">
                    <span class="badge"><?= $sm ?></span>
                </div>
            </div>
        </nav>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <?php foreach ($data as $user) : ?>
                <tbody>
                    <tr>
                        <th scope="row"><?= $user['fname'] . " " . $user['lname'] ?></th>
                        <td>
                            <?php if ($user['status'] == 0) : ?> 
                                Not Approved
                            <?php else : ?>
                                Approved
                            <?php endif; ?>
                        </td>
                     <!--<th scope="row"></th>-->
                        <td><?php if ($user['status'] == 0) : ?>
                                <a href="admin.php?opp=approved&uid=<?= $user['id'] ?>">Approved</a>
                            <?php else : ?>
                                <a href="admin.php?opp=not_approved&uid=<?= $user['id'] ?>">Not Approved</a>

                            <?php endif; ?>
                        </td>

                    </tr><?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>