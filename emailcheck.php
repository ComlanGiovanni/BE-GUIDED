
<?php

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Theme CSS -->
    <link href="css/project.css" rel="stylesheet">

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation -->
<a href="javascript:document.location.href='#myModal'"></a>
<?php include 'php/nav.php'; ?>
<?php
 if (!isset($_GET['id'])) {
     echo '
     <div style="color: #0c1a1e;">
    <br><br><br><br><br><br><br><br><br><br>
    <p>Certifié votre compte en validant votre email.</p>
    <br>
    <p>Un mail de confirmation vient d\'etre envoyer à l\'email renseigné.</p>
</div>';
}
else {
     $req->send_check();

     echo ' <div style="color: #0c1a1e;">
    <br><br><br><br><br><br><br><br><br><br>
    <p>Votre compte est maintenant certifié !</p>';
}

?>
<?php include 'php/footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/public/js/bootstrap/3.3.5/bootstrap.min.js"></script>
<script src="/public/js/min/sugarsync-pricing.js?1479818852"></script>
<script src="/public/js/min/jquery.scrollTo.min.js"></script>
<script src="/public/js/min/new-home.js?1479818852"></script>
<script src="/public/js/min/urlEncode.js"></script>
<script src="/public/js/min/sugarsync-signup.js?1479818852"></script>


<script src="js/bootstrap.min.js"></script>
<!-- Fin footer -->
<a href="#page-top" title="Haut de page" class="scrollup"><i class="fa fa-arrow-up"></i></a>
<!-- jQuery -->
<script src="vendor/jquery/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Fin footer -->
<a href="#page-top" title="Haut de page" class="scrollup"><i class="fa fa-arrow-up"></i></a>
<!-- jQuery -->
<script src="vendor/jquery/jquery.js"></script>
</div>
</div>
<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

<!-- Theme JavaScript -->

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- Theme JavaScript -->
<script src="js/project.min.js"></script>

</body>
</html>
