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
    <link href="css/project.css" rel="stylesheet">
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

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation -->
<a href="javascript:document.location.href='#myModal'"></a>
<?php include 'php/nav.php'; ?><?php $v = $of->modif_offer(); ?>
<div style="height: 100px; background: #000;">
</div>

<div class="container">
    <form method="post" action="#" enctype="multipart/form-data">
        <div class="form-group col-md-offset-1 col-md-10">
            <label for="title">Nom</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $v[0]['name_offer']; ?>">
        </div>
        <div class="form-group col-md-offset-1 col-md-10">
            <label for="desc">Description</label>
            <input type="text" class="form-control" id="desc" name="desc" value="<?= $v[0]['description']; ?>">
        </div>
        <div class="form-group col-md-offset-1 col-md-2">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" id="ville" name="city" value="<?= $v[0]['city_offer']; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="adresse">Lieux de rencontre</label>
            <input type="text" class="form-control" id="adresse" name="adr" value="<?= $v[0]['place_offer']; ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="price">Prix</label>
            <input type="number" step="0.01" min="0" class="form-control" id="price" name="price" value="<?= $v[0]['price_offer']; ?>">
        </div>
        <div class="form-group col-md-offset-1 col-md-10">
            <label for="dsp">Disponibilité de l'offre</label>
            <input type="text" class="form-control" id="dsp" name="dsp" value="<?= $v[0]['postal_code_offer']; ?>">
        </div>
        <div class="form-group col-md-offset-1 col-md-10">
            <label for="img">Image de description</label>
            <input type="file" id="img" name="img">
        </div>

        <button type="submit" class="btn btn-default col-md-offset-5 col-md-2">Changer mon offre</button>
    </form>
</div>

<?php include 'php/footer.php'; ?>
<!-- Fin footer -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<a href="#page-top" title="Haut de page" class="scrollup">  <a href="#page-top" title="Haut de page" class="scrollup"><i class="fa fa-angle-up" aria-hidden="true"></i></a></a>
<!-- jQuery -->
<script src="vendor/jquery/jquery.js"></script>
</div>
</div>
<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

<!-- Theme JavaScript -->
<script src="js/project.min.js"></script>
</body>