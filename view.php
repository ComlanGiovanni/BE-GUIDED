<?php
require_once 'php/load.php';
$db = App::getDatabase();
$info = App::getOffer()->view_offer($db);
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

    <link rel="stylesheet" href="page.css">
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Poppins" rel="stylesheet">
    <!-- Theme CSS -->
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
    <link rel="stylesheet" href="css/view.css">

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation -->
<a href="javascript:document.location.href='#myModal'"></a>
<?php include 'php/nav.php'; ?>
<div class="container-fluid">
    <div class="row">
        <h1> <?php echo $info['name_offer']; ?></h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo '<img src="guides/guide_' . $info['id_guide'] . '/' . $info['img_offer'] . '" alt="no img">'; ?>
        </div>
        <div class="col-md-4 col-md-offset-8">
            <h5>Prix :</h5>
            <br> <?php echo $info['price_offer']; ?>
            <br>
            <button class="btn btn-primary">Ajouter au Panier</button>
        </div>
    </div>
    <div class="row">
        <div>
            <p><?php echo $info['description']; ?></p>
        </div>
        <div>
            <p><?php echo $info['place_offer'] . ' ' . $info['city_offer']; ?></p>
            <br>
            <p></p>
        </div>
    </div>
    <div class="row comments">
        <h4>Commentaires</h4>
        <br>
        <?php App::getOffer()->list_comment($db); ?>
    </div>
</div>
<?php include 'php/footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Fin footer -->
<a href="#page-top" title="Haut de page" class="scrollup"> <a href="#page-top" title="Haut de page" class="scrollup"><i
                class="fa fa-angle-up" aria-hidden="true"></i></a></a>
<!-- jQuery -->
<script src="vendor/jquery/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/jskey=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>


<!-- Theme JavaScript -->
<script src="js/project.min.js"></script>
</body>
</html>
