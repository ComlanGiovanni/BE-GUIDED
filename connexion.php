<?php
require_once 'php/load.php';
$use = App::getUser();
$db = App::getDatabase();
if (!empty($_POST) && !empty($_POST['email']) && !empty($_POST['pass'])) {
    $user = $use->login($db, $_POST['email'], $_POST['pass']);
    if ($user) {
        Session::getInstance()->setFlash('success', 'Vous êtes maintenant connecté');
        App::redirect('account.php');
    } else {
        Session::getInstance()->setFlash('danger', 'Vos identifiants sont incorrects ! Veuillez réessayer.');
    }
}
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, target-densitydpi=device-dpi"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Poppins" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <!-- Theme CSS -->
    <link href="css/connexion.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<a href="javascript:document.location.href='#myModal'"></a>
<?php include 'php/nav.php'; ?>
<div class="form">
    <div>
        <div id="signin">
            <h1>Bienvenue ! <br> Accédez à votre compte</h1>

            <form action="" method="post">

                <div class="field-wrap">
                    <label>
                        Adresse e-mail<span class="req">*</span>
                    </label>
                    <input id="mail" name="email" type="email" required/>
                </div>

                <div class="field-wrap">
                    <label>
                        Mot de passe<span class="req">*</span>
                    </label>
                    <input id="pass" name="pass" type="password" required/>
                </div>

                <p class="forgot"><a href="forget.php">Mot de passe oublé?</a></p>

                <button type="submit" class="button button-block"/>
                Connexion</button>

            </form>
            <br>
            <a href="index.php" style="float:right;"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>

        </div>

    </div><!-- tab-content -->

</div> <!-- /form -->

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/connexion.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

<!-- Theme JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/public/js/bootstrap/3.3.5/bootstrap.min.js"></script>


</body>
</html>