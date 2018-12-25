<?php
require_once 'function/functions.php';

my_session_start('my_secure_blog');



if (checkUser()) {
    $user = $_SESSION['name'];
    $userName = ucfirst($user);
} else {
    echo $_SESSION['name'], "<hr>";
    echo $_SESSION['ip_address'], "<hr>";
    echo $_SESSION['HTTP_USER_AGENT'], "<hr>";

    header('location: sign_in.php');
}

$err = "";

$sm = "";
if (isset($_POST['submit'])) {
    if (empty($_POST['title'])) {
        $err = 'you must enter title';
    } elseif (empty($_POST['article'])) {
        $err = 'you must enter article';
    } else {
        $title = trim($_POST['title']);
        $article = trim($_POST['article']);
        if ($link = db_connect()) {
//            mysqli_set_charset($link, utf8);
            $title = mysqli_real_escape_string($link, $title);
            $article = mysqli_real_escape_string($link, $article);
            $uid = $_SESSION['uid'];
            $sql = "INSERT INTO posts (id,uid,title,article,updated_at,created_at) VALUES ('','$uid','$title','$article',CURRENT_TIME(),CURRENT_TIME());";
            $result = mysqli_query($link, $sql);
            if ($result && mysqli_affected_rows($link) > 0) {
                $sm = 'your posted uploaded';
            }
        }
    }
}

if ($link = db_connect()) {
    mysqli_set_charset($link, "utf8");
    $sql = "SELECT posts.*,sign_user.fname FROM posts JOIN sign_user on posts.uid = sign_user.id";
    $result = mysqli_query($link, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {

            $data [] = $row;
        }
    }
}



if (isset($data)) {
    foreach ($data as $post) {
        if ($post['uid'] == $_SESSION['uid']) {
            $update = htmlspecialchars($post['updated_at']);
            $create = htmlspecialchars($post['created_at']);
            $_SESSION['titleEdit'] = htmlspecialchars($post['title']);
            $_SESSION['articleEdit'] = htmlspecialchars($post['article']);
            $_SESSION['id'] = $post['id'];
            $_SESSION['uid'] = $post['uid'];
        }
    }
}
?>



<?php require_once 'template/header.php'; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-8">
            <!-- Title -->
            <h1 class="mt-4">Your Comments</h1>

            <p class="lead">
                <!--by-->
                <!--clock and Author user created post-->
                <span class="article-author"><img src="image/icons_png/user-black.png"></span>
                <b><?= "Welcome {$userName}"; ?></b>
            </p>
            <hr>
            <!-- Date/Time -->
            <!-- Preview Image -->
            <img id="ex8" class="img-fluid rounded" src="image/jerusalem_340.jpg" style="width:100%;border:2px solid #F96; box-shadow: 0 15px 20px rgba(0, 0, 0, 0.5);" alt="jerusalem">
<!--  <a href="#"><img id="ex7" class="img-fluid rounded" src="https://pngicon.ru/file/uploads/dobavit-50x50.png"></a>-->
            <hr>

            <!-- Post Content -->
            <p>If you'd like to live here your comment about our blog, make it below. Thanks</p>

            <hr>
            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form method="post" action="">
                        <!--<label class="sr-only"></label>-->
                        <div class="form-group" id="#ex3">
                            <span class="badge badge-danger"><?= $err ?></span><br>
                            <input name="title" type="text" class="form-control" placeholder="Post title">
                            <textarea class="form-control" rows="2" name="article"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Send</button>
                        <span class="badge badge-success"><?= $sm ?></span>
                    </form>
                </div>
            </div>

            <?php if (isset($data)) : ?>
                <?php foreach ($data as $post) : ?>
                    <!-- Single Comment -->
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="image/icons_svg/user-circle-solid.svg" alt="" style="width:50px;">
                        <div class="media-body">
                            <input type="hidden" class="commentId" value="<?= $post['uid']; ?>" />
                            <div>
                                <span><img src="image/icons_png/clock-black.png" style="margin:5px;"><?= $create ?></span>

                                <pre><h5 class="mt-0">Posted by <?= htmlspecialchars($post['fname']); ?></h5></pre>
                            </div>
                            <div>
                                <p class="commentTitle"><?= htmlspecialchars($post['title']); ?></p><hr>
                            </div>
                            <div>
                                <p class="commentMessage"><?= htmlspecialchars($post['article']) ?></p>
                            </div>
                            <div class="editDelet">
                                <?php if ($post['uid'] == $_SESSION['uid']) : ?>
                                <a class="btn editBtn" href="#exampleModal?post_id<?= $post['id'] ?>"><i class="far fa-edit"></i></a>
                                    <a class="btn deltBtn" href="delete.php?post_id=<?= $post['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!--                    /** page for edit*/-->

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Edit Comment</h4>
                                </div>
                                <form action="edit.php" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" id="recipientId"/>
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">Title:</label>
                                            <input type="text" class="form-control" name="titleEdit"id="recipient-name" value="<?= $post['title'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="control-label">Message:</label>
                                            <textarea class="form-control" id="message-text" name="articleEdit"><?= $post['article'] ?></textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="submit" name="submit1" class="btn btn-primary" value="edit">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>


    </div>
    <!-- /.row -->

</div>

<!--modal window-->
<script>

    $('.editBtn').on('click', function () {

        var title = $(this).closest('.media.mb-4').find('.commentTitle').text();
        var message = $(this).closest('.media.mb-4').find('.commentMessage').text();
        var id = $(this).closest('.media.mb-4').find('.commentId').val();
        $('#recipient-name').val(title);
        $('#message-text').val(message);
        $('#recipientId').val(id);
        $('#exampleModal').modal("show");
    });


</script>

<hr>
<?php require_once 'template/footer.php'; ?>
</div> <!-- /container -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>
</html>