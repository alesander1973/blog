<?php
require_once 'function/functions.php';

my_session_start('my_secure_blog');
//session_start();
//echo '<pre>';
//print_r($_SESSION);die;

if ($link = db_connect()) {
    mysqli_set_charset($link, "utf8");
    $sql = "SELECT posts.*,sign_user.fname FROM posts JOIN sign_user on posts.uid = sign_user.id";
    $result = mysqli_query($link, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data [] = $row;
        }
//        echo '<pre>';
//        print_r($data[]);die;
    }
}
if (isset($data)) {
    foreach ($data as $post) {
        $update = htmlspecialchars($post['updated_at']);
        $create = htmlspecialchars($post['created_at']);
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
            <h1 class="mt-4" style="font-family: ariel;">Quartes Jerusalem</h1>

            <!-- Author -->
            <p class="lead">
                <!--                by-->
                <!--clock and name user created post-->
                <span class="article-author"><img src="image/icons_png/user-black.png"></span>
                <?php
                if (isset($_SESSION['name'])) {
                    echo"<p>Welcome {$_SESSION['name']}</p>";
                } else {
                    echo '<strong>Welcome dear!</strong>';
                }
                ?>
            </p>

            <hr>

            <!-- Date/Time -->
            <!--<p>Posted on January 1, 2018 at 12:00 PM</p>-->



            <!-- Preview Image -->
            <img id="ex8" class="img-fluid rounded" src="image/quarter.jpg" style="width: 900px; height: 300px;" alt="wall">
            <hr>

            <!-- Post Content -->
            <p>Article from index</p>
            <!--<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>-->

                                            <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>-->

                                            <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>-->


            <blockquote class="blockquote">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer class="blockquote-footer">Someone famous in
                    <cite title="Source Title">Source Title</cite>
                </footer>
            </blockquote>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

            <hr>

            <!-- Comments Form -->
            <div class="card my-4">
                <div class="card-header"> <h5>For Leave a Comment you need </h5>
                <a href="sign_in.php"><button type="button" class="btn btn-info btn-rounded">Signin</button></a>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <!--<label class="sr-only"></label>-->
                        <div class="form-group" id="#ex3">
                            <input name="title" type="text" class="form-control" placeholder="Post title">
                            <textarea class="form-control" rows="2" name="article"></textarea>
                        </div>
                    </form>
                </div>
            </div>
            <?php if (isset($data)) : ?>
                <?php foreach ($data as $post) : ?>
                    <!-- Single Comment -->
                    <div class="media mb-4">

                        <img class="d-flex mr-3 rounded-circle" src="image/icons_svg/user-circle-solid.svg" alt="" style="width:50px;">
                        <div class="media-body">
                            <div>
                                <span><img src="image/icons_png/clock-black.png" style="margin:5px;"><?= $create ?></span>

                                <pre><h5 class="mt-0">Posted by <?= htmlspecialchars($post['fname']); ?></h5></pre>
                            </div>
                            <div>
                                <p><?= htmlspecialchars($post['title']); ?></p><hr>
                            </div>
                            <div><?= htmlspecialchars($post['article']) ?></div>
                        </div>

                    </div>

                    <!-- Comment with nested comments -->
                    <!--            <div class="media mb-4">
                                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                    <div class="media-body">
                                        <h5 class="mt-0">Commenter Name</h5>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    
                                        <div class="media mt-4">
                                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                            <div class="media-body">
                                                <h5 class="mt-0">Commenter Name</h5>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </div>
                                        </div>
                    
                                        <div class="media mt-4">
                                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                            <div class="media-body">
                                                <h5 class="mt-0">Commenter Name</h5>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </div>
                                        </div>
                    
                                    </div>
                                </div>-->
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <!-- /.row -->

</div>



<?php require_once 'template/footer.php'; ?>
<!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Footer -->

<script>
    $(document).ready(function () {
//$("#ex7").mouseleave( function(){
//$(this).css("background","red");
//});
        $('#ex7').click(function () {
            $('#ex8').fadeToggle();
        });

        $("#ex3").mouseenter(function () {
            $(this).css("background", "black");
        });
    });
</script>
</body>
</html>
