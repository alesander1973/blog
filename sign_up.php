<?php
require_once('function/functions.php');
$err = '';

if (isset($_POST['button'])) {
    header('location: index.php');
}

if (isset($_POST['submit'])) {
    if (empty($_POST['fname'])) {
        $err = "You must enter Fname!";
    } elseif (empty($_POST['lname'])) {
        $err = "You must enter Lname!";
    } elseif (empty($_POST['email'])) {
        $err = "You must enter Email!";
    } elseif (empty($_POST['pwd'])) {
        $err = "You must enter Password!";
    } else {
        $fname = strtolower(trim(filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING)));
        $lname = strtolower(trim($_POST['lname']));
        $email = strtolower(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)));
        $pwd = trim(filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING));
//        echo $pwd,"<hr>";
//        die;

        if ($link = db_connect()) {
            $sql = "SELECT * FROM sign_user WHERE email = '$email'";
            $result = mysqli_query($link, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                $err = "This email already exists";
            } else {
                $pwd = password_hash($pwd, PASSWORD_BCRYPT);

                $sql = "INSERT INTO sign_user VALUES ('','$fname','$lname','$email','$pwd',0,2)";
                $result = mysqli_query($link, $sql);
                if ($result && mysqli_affected_rows($link) > 0) {

                    session_start();
                    $fname = ucfirst($fname);
                    $_SESSION['ms'] = "Welcome  $fname . '' . $lname you will be abale to log in when agmin";
                    header('location: sign_in.php');
                }
            }
        } else {
            $err = 'Error conect to DB';
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link  href="style/sign_up.css" rel="stylesheet" type="text/css" >
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src = "//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>


        <!------ Include the above in your HEAD tag ---------->
        <title>Registr</title>

    </head>
    <body>
        <form method="POST">
            <div class="container">
                <!---heading---->
                <header class="heading"> Registration-Form</header><hr></hr>
                <!---Form starting----> 
                <div class="row ">
                    <!--- For Name---->
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-xs-4">
                                <label class="firstname">First Name :</label> </div>
                            <div class="col-xs-8">
                                <input type="text" name="fname" id="fname" placeholder="Enter your First Name" class="form-control ">
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-xs-4">
                                <label class="lastname">Last Name :</label></div>
                            <div class ="col-xs-8">	 
                                <input type="text" name="lname" id="lname" placeholder="Enter your Last Name" class="form-control last">
                            </div>
                        </div>
                    </div>
                    <!-----For email---->
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-xs-4">
                                <label class="mail" >Email :</label></div>
                            <div class="col-xs-8"	>	 
                                <input type="email" name="email"  id="email"placeholder="Enter your email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-----For Password and confirm password---->
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-xs-4">
                                <label class="pass">Password :</label></div>
                            <div class="col-xs-8">
                                <input type="password" name="pwd" id="password" placeholder="Enter your Password" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-----------For Phone number-------->
                    <div class="col-sm-12">
                        <!--                        <div class ="row">
                                                    <div class="col-xs-4 ">
                                                        <label class="gender">Gender:</label>
                                                    </div>
                        
                                                    <div class="col-xs-4 male">	 
                                                        <input type="radio" name="gender"  id="gender" value="boy">Male</input>
                                                    </div>
                        
                                                    <div class="col-xs-4 female">
                                                        <input type="radio"  name="gender" id="gender" value="girl" >Female</input>
                                                    </div>
                        
                                                </div>-->
                        <div class="col-sm-12">
                            <div class="btn btn-warning">
                                <input type="submit" name="submit" value="Submit"> 
                            </div>
                            <div class="btn btn-warning">
                                <input type="submit" name="button" value="Home" >
                            </div>
                        </div>
                        <span style="color: black;"><?= $err ?></span>
                    </div>
                </div>	 


            </div>
        </form>
    </body>
</html>
