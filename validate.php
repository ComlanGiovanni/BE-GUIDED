<?php
require_once 'php/load.php';

App::getUser()->restrict();
$db = App::getDatabase();
if (isset($_GET['id'])) {
    $info = App::getOffer()->view_offer($db);
} else {
    $info = null;
}
 ?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css">
    
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Poppins" rel="stylesheet">
    
    
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/view.css">
</head>
<body>
<?php require_once 'php/nav.php';?>
<div class="container-fluid">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Récapitulatif de commande</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Référence</td>
            <td>Offre</td>
            <td>Nb de Personne</td>
            <td>Prix Unitaire</td>
            <td>Total</td>
        </tr>
        <tr>
            <td><?php echo $info['id_offer'];?></td>
            <td><?php echo $info['name_offer'];?></td>
            <td><input type="number" name="nb_personne" id=""></td>
            <td><?php echo $info['price_offer'];?></td>
            <td></td>
        </tr>
        <tr>
            <td>Plage Horaire Souhaité</td>
        </tr>
        </tbody>
    </table>
</div>
<?php require_once 'php/footer.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
