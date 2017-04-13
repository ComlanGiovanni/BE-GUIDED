<?php
require_once 'php/load.php';
$db = App::getDatabase();
$val = App::getOffer()->last_offer($db);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, target-densitydpi=device-dpi"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Poppins" rel="stylesheet">


    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Theme CSS -->
    <link href="css/project.css" rel="stylesheet">
    <link rel="stylesheet" href="css/flash.css">

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation -->
<a href="javascript:document.location.href='#myModal'"></a>
<?php include 'php/nav.php'; ?>
<!-- Intro Header -->
<header class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div>
                    <img src="img/lg.png" alt="" class=" wow fadeInDown"> <br>
                    <h1 class="brand-heading  wow fadeInDown">
                        Guide <span style="color:red;">ME</span> ! </h1>
                    <p class="intro-text">
                    </p>
                    <hr class=" wow fadeIn">
                    <br>
                    <h2 class=" wow fadeInLeft">On vous fait voir la France autrement...</h2><br>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Fin Intro Header -->
<!-- Separateur -->


<!-- Fin_Separateur -->
<!-- Carousel_Presentation -->
<div class="carousel fade-carousel slide carousel-fade" data-ride="carousel" data-interval="4000" id="bs-carousel">
    <!-- Overlay -->

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#bs-carousel" data-slide-to="1"></li>
        <li data-target="#bs-carousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner  " id="moreinfo">
        <div class="item slides active">
            <div class="slide-1">
                <div class="overlay"></div>
            </div>
            <div class="hero">
                <hgroup>
                    <h1><i class="fa fa-globe" aria-hidden="true"></i> Découverte</h1>
                    <h3>Des centaines d'activités partout en France <br> et dans des lieux parfois insolites et
                        surprenants ! </h3>
                </hgroup>
                <button class="btn btn-hero btn-lg" role="button">Plus de détails</button>
            </div>
        </div>
        <div class="item slides">
            <div class="slide-2">
                <div class="overlay"></div>
            </div>
            <div class="hero">
                <hgroup>
                    <h1><i class="fa fa-comments-o" aria-hidden="true"></i> Rencontres</h1>
                    <h3>Des personnes passionnantes et passionnées qui s'attacheront à vous faire voir la France
                        autrement.</h3>
                </hgroup>
                <button class="btn btn-hero btn-lg" role="button">Plus de détails</button>
            </div>
        </div>
        <div class="item slides">
            <div class="slide-3">
                <div class="overlay"></div>
            </div>
            <div class="hero">
                <hgroup>
                    <h1><i class="fa fa-check" aria-hidden="true"></i> Qualité</h1>
                    <h3>Nous assurons la qualité de toutes les activités proposées.</h3>
                </hgroup>
                <button class="btn btn-hero btn-lg" role="button">Plus de détails</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin_Carousel-->
<!-- Separateur -->
<div style="background-color: #d5d5d5; padding: 5px; width: 100%; margin-left: auto; margin-right: auto; "><p
            class="offer" style="text-align:center;">Les offres à la une</p>
    <!-- Fin_Separateur -->
    <!-- Carousel_Offres -->
    <div class="container-fluid">
        <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php for ($i = 0; $i < 4; $i++) : ?>
                    <div class="item <?php if ($i == 0) {
                        echo 'active';
                    } ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3"><img src="guides/guide_<?php echo $val[$i]['id_guide'].'/'.$val[$i]['img_offer']; ?>" height="200px"
                                                           width="250px" class="img-responsive"
                                                           alt="http://placehold.it/250x350"></div>
                                <div class="col-md-9">
                                    <h2 class="carousel"><?php echo $val[$i]['name_offer']; ?></h2>
                                    <p><?php echo $val[$i]['description'] ?> <br> <a
                                                href="view.php?id=<?php echo $val[$i]['id_offer'] ?>"
                                                class="link_offer">Détails <i
                                                    class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
            <!-- End Item -->
        </div>
        <!-- End Carousel Inner -->
        <div class="controls">
            <ul class="nav">
                <?php for ($i = 0; $i < 4; $i++) : ?>
                    <li data-target="#custom_carousel" data-slide-to="<?php echo $i; ?>" class="controls <?php if ($i == 0) {
                        echo 'active';
                    } ?>"><a href="#"><img
                                    src="<?php echo $val[$i]['img_offer']; ?>" alt="no img">
                            <small><?php echo $val[$i]['name_offer']; ?></small>
                        </a>
                    </li>
                <?php endfor; ?>
                <br><br>
                <div class="lienoffres"><a href="offres.php" class="seloffer">Plus d'offres</a></div>
            </ul>
        </div>
    </div>
    <!-- End Carousel -->
</div>
<!-- Fin -->
<?php include 'php/footer.php'; ?>
<!-- Fin footer -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Fin footer -->
<a href="#page-top" title="Haut de page" class="scrollup"><i class="fa fa-angle-up"></i></a>
<!-- jQuery -->
<script src="vendor/jquery/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

<!-- Theme JavaScript -->

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<!-- Theme JavaScript -->
<script src="js/project.min.js"></script>
<script src="vendor/animate.css/animate.min.css"></script>
<script src="vendor/wow/wow.min.js"></script>

</body>
</html>
