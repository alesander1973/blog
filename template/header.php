
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <!--        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="">
                <meta name="author" content="">-->

        <title>Blog Post</title>

        <link  href="style/blog_post.css" rel="stylesheet" type="text/css" >
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!--link font Awesome SVG -->
        <script defer src="https://use.fontawesome.com/releases/v5.6.1/js/all.js" integrity="sha384-R5JkiUweZpJjELPWqttAYmYM1P3SNEJRM6ecTQF05pFFtxmCO+Y1CiUhvuDzgSVZ" crossorigin="anonymous"></script>
        <!-- Custom styles for this template -->

    </head>

    <body style="background: url('image/bg_wall1.jpg')">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#">
                <img src="image/sion.jpg" height="30" class="d-inline-block align-top"
                     alt="">
            </a>
            <div class="container">
                <!--<a class="navbar-brand" href="#">Blog Post</a>-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--User login-->
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <?php if(empty($_SESSION['uid'])): ?>
                            <a class="nav-link" href="index.php">Home
                                <span class="sr-only">(current)</span>
                            </a>           
                            <?php else: ?>
                            <a class="nav-link" href="index.php?back_blog=<?= $_SESSION['uid'] ?>">Home
                                <span class="sr-only">(current)</span>
                            </a>           
                            <?php endif; ?>
                        </li>
                        <?php if (isset($_GET['back_blog'])) : ?>
                            <li class="nav-item active">
                                <a class="nav-link" href="blog.php">Back to blog
                                    <span class="sr-only">(current)</span>
                                </a>                               
                            </li>
                        <?php endif; ?>

                        <?php if (!isset($_SESSION['uid'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="sign_in.php"><span>Log in</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary" href="sign_up.php">Register</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Log out</a>
                            </li>
                            <li class="nav-item">

                            </li>
                        <?php endif; ?>
                    </ul>
                    <!--<a class="nav-link" href="#">Log in</a>-->

                    <!--link dropdown form sign in-->

                    <!--                    <div class="clearfix">
                                        <a href="admin.php" class="nav-link" data-toggle="dropdown" >Sign Up</a>
                                            <div class="dropdown-menu shadow p-4 mb-4 bg-white float-right">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <label for="exampleDropdownFormEmail1">Email address</label>
                                                        <input type="email" name="email"class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleDropdownFormPassword1">Password</label>
                                                        <input type="password" name="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                                        <label class="form-check-label" for="dropdownCheck">
                                                            Remember me
                                                        </label>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
                                                </form>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="template/sign_up.php">New around here? Sign up</a>
                                                <a class="dropdown-item" href="template/sign_in.php">Sign in</a>
                                            </div>
                                        </div>-->

                </div>
            </div>
        </nav>
        <script>
            $(.btn btn - primary).button('toggle');
        </script>