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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation -->
<a href="javascript:document.location.href='#myModal'"></a>
<?php include 'php/nav.php';
$v = $req->view_profile();?>
<div style="height: 100px; background: #000;">
</div>
<div>
    <p>
    <h3 style=" font-size: 20px;margin-top:  30px; margin-bottom:-30px; color:white; text-transform:uppercase; font-weight:bold;"
        id="text1">Modification d'informations utilisateur</h3></p>
    <br>
    <br>
    <div class="form">

        <form method="POST" action="#">
            <label for="name">Nom</label>
            <div>
                <input type="text" name="name" id="name" value="<?= $v[0]['lastname']; ?>"<br>
            </div>
            <label for="name">Prénom</label>
            <div>
                <input type="text" name="firstname" id="firstname" value="<?= $v[0]['firstname']; ?>">
            </div>
            <label for="email">Email</label>
            <div>
                <input type="text" name="email" id="email" value="<?= $v[0]['email']; ?>"><br>
            </div>
            <label for="password">Password</label>
            <div>
                <input type="password" name="password" id="password" value="<?= $v[0]['password']; ?>">
            </div>
            <br>
            <button type="submit">Modifier</button>
        </form>

    </div>
</div>
<?php include 'php/footer.php' ?>

<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script> <!--Resource jQuery-->
<script src="js/bootstrap.min.js"></script>
<!-- Fin footer -->
<a href="#page-top" title="Haut de page" class="scrollup"><i class="fa fa-arrow-up"></i></a>
<!-- jQuery -->
<script src="vendor/jquery/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

<!-- Theme JavaScript -->
<script src="js/project.min.js"></script>
</body>
</html>
