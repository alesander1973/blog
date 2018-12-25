<?php
require_once 'function/functions.php';
my_session_start('my_secure_blog');

require_once 'template/header.php';
?>
<!-- Page Content -->
<div class="container" id="content">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4">Old cities Jerusalem blog.</h1>

            <!-- Date/Time -->
            <div article_sub_title>
<!--               <span class="article_date"><img src="image/icons_png/clock-black.png"><?= $post['created_at'] ?></span>
                <span class="article-author"> <img src="image/icons_png/user-black.png"><?= $post['fname'] ?></span>-->

<!--            <p>Posted on January 1, 2018 at 12:00 PM</p>-->
            </div>
            <hr>
            <!-- Preview Image -->
            <img class="img-fluid rounded" src="image/ierusalim_1.jpg   " alt="jerusalem">



            <!-- Post Content -->
            <hr>


            <div class="media mb-4">
                <div class="row">
                    <div class="col-2">
                        <img class="d-flex mr-3 rounded-circle" src="image/ierusale_2.jpg" style="width:100px;height: 100px;" alt="">
                    </div>
                    <div class="col-10">
                        <div class="media-body" id="old_city" style="top: 40%;">
                            <h5 class="mt-0">Old city</h5>
                            <p>
                                Lorem ipsum dolor sit amet, dolores conceptam nec cu. Eam natum animal in. Nibh labore cum ei. Id duo nullam regione antiopam, homero alterum delectus ea sed.

                                Cu sonet saepe delicata cum, his an dico atqui. Id maiorum recusabo pericula mei, eu lobortis accusamus eos. Ius eu diam cibo ferri, agam inciderint te quo. At quo ullum utamur accusata, inani maluisset suscipiantur vis ut. Ei usu commodo eligendi conclusionemque, cum mollis feugiat pericula eu. Te solum sonet tation has.

                                Est movet mediocritatem ut, ex has inani utroque volutpat. Te facilisi abhorreant elaboraret est, in epicurei accusamus mei, te modo vocent est. Ad sumo phaedrum ius. Ad omnes antiopam voluptatum eos. Primis commune pericula ne nec.

                                Tempor reformidans ne has. Sea an imperdiet adolescens. Timeam adipiscing has ei. Option vituperata an vim, sit admodum volutpat ut. Ne sint debet sea, pro suavitate prodesset cu, nec doming eruditi sapientem ne.

                                Ius illum alienum recteque ea, his ut consul everti blandit. Nam te eirmod integre, an sea invidunt delicata necessitatibus. Vide veniam partiendo sea no. Dico simul gloriatur eum ei. At cibo vivendum has, his mutat postulant at.
                            </p>
                            <br> <br>

                            <a href="old_city.php"><button type="button" class="btn btn-primary">Read more</button></a>
                        </div> 
                    </div>
                </div>

            </div>
            <hr>
            <div class="media mb-4" id="history">
                <img class="d-flex mr-3 rounded-circle" src="image/ierusale_2.jpg" style="width:50px" alt="">
                <div class="media-body">
                    <h5 class="mt-0">History</h5>
                    <p>
                        Lorem ipsum dolor sit amet, dolores conceptam nec cu. Eam natum animal in. Nibh labore cum ei. Id duo nullam regione antiopam, homero alterum delectus ea sed.

                        Cu sonet saepe delicata cum, his an dico atqui. Id maiorum recusabo pericula mei, eu lobortis accusamus eos. Ius eu diam cibo ferri, agam inciderint te quo. At quo ullum utamur accusata, inani maluisset suscipiantur vis ut. Ei usu commodo eligendi conclusionemque, cum mollis feugiat pericula eu. Te solum sonet tation has.

                        Est movet mediocritatem ut, ex has inani utroque volutpat. Te facilisi abhorreant elaboraret est, in epicurei accusamus mei, te modo vocent est. Ad sumo phaedrum ius. Ad omnes antiopam voluptatum eos. Primis commune pericula ne nec.

                        Tempor reformidans ne has. Sea an imperdiet adolescens. Timeam adipiscing has ei. Option vituperata an vim, sit admodum volutpat ut. Ne sint debet sea, pro suavitate prodesset cu, nec doming eruditi sapientem ne.

                        Ius illum alienum recteque ea, his ut consul everti blandit. Nam te eirmod integre, an sea invidunt delicata necessitatibus. Vide veniam partiendo sea no. Dico simul gloriatur eum ei. At cibo vivendum has, his mutat postulant at.
                        <br><br>
                    </p>
                    <a href="history.php"><button type="button" class="btn btn-primary">Read more</button></a>
                </div>               
            </div>
            <hr>
            <div class="media mb-4" id="archaeology">
                <img class="d-flex mr-3 rounded-circle" src="image/ierusale_2.jpg" style="width:50px" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Archaeology</h5>
                    <p>
                        Lorem ipsum dolor sit amet, dolores conceptam nec cu. Eam natum animal in. Nibh labore cum ei. Id duo nullam regione antiopam, homero alterum delectus ea sed.

                        Cu sonet saepe delicata cum, his an dico atqui. Id maiorum recusabo pericula mei, eu lobortis accusamus eos. Ius eu diam cibo ferri, agam inciderint te quo. At quo ullum utamur accusata, inani maluisset suscipiantur vis ut. Ei usu commodo eligendi conclusionemque, cum mollis feugiat pericula eu. Te solum sonet tation has.

                        Est movet mediocritatem ut, ex has inani utroque volutpat. Te facilisi abhorreant elaboraret est, in epicurei accusamus mei, te modo vocent est. Ad sumo phaedrum ius. Ad omnes antiopam voluptatum eos. Primis commune pericula ne nec.

                        Tempor reformidans ne has. Sea an imperdiet adolescens. Timeam adipiscing has ei. Option vituperata an vim, sit admodum volutpat ut. Ne sint debet sea, pro suavitate prodesset cu, nec doming eruditi sapientem ne.

                        Ius illum alienum recteque ea, his ut consul everti blandit. Nam te eirmod integre, an sea invidunt delicata necessitatibus. Vide veniam partiendo sea no. Dico simul gloriatur eum ei. At cibo vivendum has, his mutat postulant at.
                        <br><br>
                    </p> 
                    <a href="archaeology.php"><button type="button" class="btn btn-primary">Read more</button></a>
                </div>               
            </div>
            <hr>
            <div class="media mb-4" id="city_walls">
                <img class="d-flex mr-3 rounded-circle"src="image/ierusale_2.jpg" style="width:50px" alt="">
                <div class="media-body">
                    <h5 class="mt-0">City walls</h5>
                    <p>
                        Lorem ipsum dolor sit amet, dolores conceptam nec cu. Eam natum animal in. Nibh labore cum ei. Id duo nullam regione antiopam, homero alterum delectus ea sed.

                        Cu sonet saepe delicata cum, his an dico atqui. Id maiorum recusabo pericula mei, eu lobortis accusamus eos. Ius eu diam cibo ferri, agam inciderint te quo. At quo ullum utamur accusata, inani maluisset suscipiantur vis ut. Ei usu commodo eligendi conclusionemque, cum mollis feugiat pericula eu. Te solum sonet tation has.

                        Est movet mediocritatem ut, ex has inani utroque volutpat. Te facilisi abhorreant elaboraret est, in epicurei accusamus mei, te modo vocent est. Ad sumo phaedrum ius. Ad omnes antiopam voluptatum eos. Primis commune pericula ne nec.

                        Tempor reformidans ne has. Sea an imperdiet adolescens. Timeam adipiscing has ei. Option vituperata an vim, sit admodum volutpat ut. Ne sint debet sea, pro suavitate prodesset cu, nec doming eruditi sapientem ne.

                        Ius illum alienum recteque ea, his ut consul everti blandit. Nam te eirmod integre, an sea invidunt delicata necessitatibus. Vide veniam partiendo sea no. Dico simul gloriatur eum ei. At cibo vivendum has, his mutat postulant at.
                        <br> <br>
                    </p>
                    <a href="city_walls.php"><button type="button" class="btn btn-primary">Read more</button></a>
                </div>               
            </div>
            <hr>
            <div class="media mb-4" id="gates">
                <img class="d-flex mr-3 rounded-circle" src="image/ierusale_2.jpg" style="width:50px"   alt="">
                <div class="media-body">
                    <h5 class="mt-0">Gates</h5>
                    <p>
                        Lorem ipsum dolor sit amet, dolores conceptam nec cu. Eam natum animal in. Nibh labore cum ei. Id duo nullam regione antiopam, homero alterum delectus ea sed.

                        Cu sonet saepe delicata cum, his an dico atqui. Id maiorum recusabo pericula mei, eu lobortis accusamus eos. Ius eu diam cibo ferri, agam inciderint te quo. At quo ullum utamur accusata, inani maluisset suscipiantur vis ut. Ei usu commodo eligendi conclusionemque, cum mollis feugiat pericula eu. Te solum sonet tation has.

                        Est movet mediocritatem ut, ex has inani utroque volutpat. Te facilisi abhorreant elaboraret est, in epicurei accusamus mei, te modo vocent est. Ad sumo phaedrum ius. Ad omnes antiopam voluptatum eos. Primis commune pericula ne nec.

                        Tempor reformidans ne has. Sea an imperdiet adolescens. Timeam adipiscing has ei. Option vituperata an vim, sit admodum volutpat ut. Ne sint debet sea, pro suavitate prodesset cu, nec doming eruditi sapientem ne.

                        Ius illum alienum recteque ea, his ut consul everti blandit. Nam te eirmod integre, an sea invidunt delicata necessitatibus. Vide veniam partiendo sea no. Dico simul gloriatur eum ei. At cibo vivendum has, his mutat postulant at.
                        <br> <br>
                    </p>
                    <a href="gates.php"><button type="button" class="btn btn-primary">Read more</button></a>
                </div>               
            </div>
            <hr>
            <div class="media mb-4" id="quarters">

                <img class="d-flex mr-3 rounded-circle" src="image/ierusale_2.jpg" style="width:50px" alt="Descr">

                <div class="media-body">
                    <h5 class="mt-0">Quartes</h5>
                    <p>
                        Lorem ipsum dolor sit amet, dolores conceptam nec cu. Eam natum animal in. Nibh labore cum ei. Id duo nullam regione antiopam, homero alterum delectus ea sed.

                        Cu sonet saepe delicata cum, his an dico atqui. Id maiorum recusabo pericula mei, eu lobortis accusamus eos. Ius eu diam cibo ferri, agam inciderint te quo. At quo ullum utamur accusata, inani maluisset suscipiantur vis ut. Ei usu commodo eligendi conclusionemque, cum mollis feugiat pericula eu. Te solum sonet tation has.

                        Est movet mediocritatem ut, ex has inani utroque volutpat. Te facilisi abhorreant elaboraret est, in epicurei accusamus mei, te modo vocent est. Ad sumo phaedrum ius. Ad omnes antiopam voluptatum eos. Primis commune pericula ne nec.

                        Tempor reformidans ne has. Sea an imperdiet adolescens. Timeam adipiscing has ei. Option vituperata an vim, sit admodum volutpat ut. Ne sint debet sea, pro suavitate prodesset cu, nec doming eruditi sapientem ne.

                        Ius illum alienum recteque ea, his ut consul everti blandit. Nam te eirmod integre, an sea invidunt delicata necessitatibus. Vide veniam partiendo sea no. Dico simul gloriatur eum ei. At cibo vivendum has, his mutat postulant at.
                        <br> <br>
                    </p>
                    <a href="quarters.php"><button type="button" class="btn btn-primary">Read more</button></a>
                </div>               
            </div>
            <hr>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">


            <!-- Categories Widget -->
            <div class="card my-4"  id="menu">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#old_city">Old City</a>
                                </li>
                                <li>
                                    <a href="#history">History</a>
                                </li>
                                <li>
                                    <a href="#archaeology">Archaeology</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#city_walls">City walls</a>
                                </li>
                                <li>
                                    <a href="#gates">Gates</a>
                                </li>
                                <li>
                                    <a href="#quarters">Quarters</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Old City</h5>
                <div class="card-body">
                    The Old City is home to several sites of key religious importance: the Temple Mount and Western Wall for Jews, the Church of the Holy Sepulchre for Christians and the Dome of the Rock and al-Aqsa Mosque for Muslims. It was added to the UNESCO World Heritage Site List in 1981.
                </div>               
            </div>

            <div class="card my-4">
                <h5 class="card-header">History</h5>
                <div class="card-body">
                    According to the Hebrew Bible, before King David's conquest of Jerusalem in the 11th century BCE the city was home to the Jebusites. The Bible describes the city as heavily fortified with a strong city wall, a fact confirmed by archaeology. The Bible names the city ruled by King David as the City of David, in Hebrew Ir David, which was identified southeast of the Old City walls, outside the Dung Gate. In the Bible, David's son, King Solomon, extended the city walls to include the Temple and Temple Mount.
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<?php require_once 'template/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/main.js" type="text/javascript"></script>