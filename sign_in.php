<?php
require_once 'function/functions.php';
my_session_start('my_secure_blog');
//echo '<pre>';
//print_r($_SERVER);die;
if (isset($_SESSION['ms'])) {
    $err = $_SESSION['ms'];
} else {
    $err = '';
}

if (isset($_POST['submit'])) {
    if ($_POST['csrf_token'] == $_SESSION['csrf_token']) {
        if (empty($_POST['email'])) {
            $err = 'You must enter email';
        } elseif (empty($_POST['pwd'])) {
            $err = 'You must enter password';
        } else {
            $email = strtolower(trim($_POST['email']));
            $pwd = trim($_POST['pwd']);

            if ($link = db_connect()) {
                // for sql injection

                $email = mysqli_real_escape_string($link, $email);
                $pwd = mysqli_real_escape_string($link, $pwd);
                $sql = "SELECT * FROM sign_user WHERE email='$email'";

                $result = mysqli_query($link, $sql);
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);

                    if (password_verify($pwd, $row['password'])) {

                        if ($row['role'] == 1) {
                            $_SESSION['admin'] = "admin";
                            header("location: admin.php");
                        } else {
                            
                            if ($row['status'] == 1 && $row['role'] == 2) {
                                $_SESSION['name'] = $row['fname'];
                                $_SESSION['uid'] = $row['id'];
                                $_SESSION['ip_address'] = $_SERVER['REMOTE_ADDR'];
                                $_SESSION['HTTP_USER_AGENT'] = $_SERVER['HTTP_USER_AGENT'];

                                header('Location: blog.php');
                            } else {
                                $err = 'You must wait for permission admin';
                            }
                        }
                    }
                } else {
                    $err = 'password or email not valid';
                }
            } else {
                $err = 'error conectind to DB';
            }
        }
    }
}

$token = sha1(rand(10000000, 50000000) . time());
$_SESSION['csrf_token'] = $token;
?>
<!--require_once 'template/header.php';-->
<?php require_once('template/header.php'); ?>

<style>
    html,
    body {
        height: 100%;
    }


    .alert.alert-danger.text-center.d-flex.align-items-center {
        margin: 0 auto;
    }
    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }
    .form-signin .checkbox {
        font-weight: 400;
    }
    .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }
    .form-signin .form-control:focus {
        z-index: 2;
    }
    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>

</head>

<body>

    <?php if ($err): ?>
        <div class="container col-md-12 d-flex align-items-center sm_box">
          <div class="row col-md-12 d-flex align-items-center text-center">
              <div class="alert alert-danger text-center d-flex align-items-center" role="alert">
                  <?= $err;?>
              </div>
          </div>
      </div><br><br><br>


    <?php endif; ?>


    <form action="" method="POST">
        <div class="container">
            <!---heading---->
            <header class="heading"> Signin-Form</header><hr></hr>
            <!---Form starting----> 
            <div class="container ">
                <!--For cequrity-->
                <input name="csrf_token" type="hidden" value="<?= $token ?>">
                <!-----For email---->
                <div class="col-sm-12">
                    <div class="container">
                        <div class="col-xs-4">
                            <label class="mail" >Email :</label></div>
                        <div class="col-xs-8"	>	 
                            <input type="email" name="email"placeholder="Enter your email" class="form-control">
                        </div>
                    </div>
                </div>
                <!-----For Password and confirm password---->
                <div class="col-sm-12">
                    <div class="container">
                        <div class="col-xs-4">
                            <label class="pass">Password :</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="password" name="pwd" placeholder="Enter your Password" class="form-control">
                        </div>
                    </div>
                </div>

                <!-----------For Submit-------->
                <div class="col-sm-12">

                    <div class="col-sm-12">
                        <div class="btn btn-warning">
                            <input type="submit" name="submit" value="Submit"> 
                        </div>
                    </div>
                    <!--<span style="color: black;"><?= $err ?></span>-->
                </div>
            </div>	 


        </div>
    </form>

    <br><br><br><p style="text-align: center;">&copy; <?= date('Y') ?></p>


     <script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

     <script>
     
     $('.sm_box').delay(2000).slideUp();
    
   
    </script> 
</body>
</html>
