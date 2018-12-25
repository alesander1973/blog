<?php
require_once 'function/functions.php';
my_session_start('my_secure_blog');



if(checkUser()){
    echo "welcome back {$_SESSION['name']} ";
}else{
    header("location: signin.php");
}
$err = '';



$sm = '';

if(isset($_GET['post_id'])){
    if($link = db_connect()){
        $id = $_GET['post_id'];
        if(is_numeric($id)){
        $id = mysqli_real_escape_string($link,$id);
        $uid = $_SESSION['uid'];
        $sql = "DELETE FROM posts where  id = '$id' AND uid = '$uid'";
        $result = mysqli_query($link, $sql);

            if($result && mysqli_affected_rows($link) > 0){

              $_SESSION['sm'] = 'the post has been deleted';
              header('location : blog.php');

            }else{
                $err = "post not deleted";
            }
        }
    }
    
}
?>
<?php require_once 'template/header.php';?>

    <!-- Custom styles for this template -->
    <style>
        html,
body {
  height: 100%;
}


.alert.alert-danger.text-center.d-flex.align-items-center {
margin: 0 auto;
}
.alert.alert-success.text-center.d-flex.align-items-center {
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

  <body class="text-center">
      <?php if(!empty($sm)): ?>
      <div class="container col-md-12 d-flex align-items-center sm_box">
          <div class="row col-md-12 d-flex align-items-center text-center">
              <div class="alert alert-success text-center d-flex align-items-center" role="alert">
                  <?= $sm;?>
              </div>
          </div>
      </div><br><br><br>
      <?php endif;?>
      
      <?php if($err): ?>
      <div class="container col-md-12 d-flex align-items-center">
          <div class="row col-md-12 d-flex align-items-center text-center">
              <div class="alert alert-danger text-center d-flex align-items-center" role="alert">
                  <?= $err;?>
              </div>
          </div>
      </div><br><br><br>
      <?php endif;?>
      <div class="container-fluid col-md-12">
          <div class="row">
              <form class="form-signin" method="post" action="">

                  <h1 class="h3 mb-3 font-weight-normal">are sure you want to delete this post ?</h1>
                  

                  <button class="btn btn-lg btn-danger btn-block" type="submit" name="submit">DELETE</button>
                  <a href="blog.php" class="btn btn-lg btn-primary btn-block" >Cancel</a>

              </form>
          </div>
      </div>
      
     
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
     
    $('.sm_box').delay(2000).slideUp();
    
   
    </script> 
      </body>
</html>