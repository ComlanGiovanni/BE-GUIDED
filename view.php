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
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation -->
<a href="javascript:document.location.href='#myModal'"></a>
<?php include 'php/nav.php'; ?>
<?php $info = $of->view_offer(); ?>
<div style="height: 100px; background: #000;">
</div>
<div class="container-fluid">
    <div class="row">
        <h1> <?php echo $info[0]['name_offer']; ?></h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo '<img src="users/user_' . $_SESSION['id_user'] . '/' . $info[0]['img_offer'] . '" alt="no img">'; ?>
        </div>
        <div class="col-md-4 col-md-offset-8">
            <h5>Prix :</h5>
            <br> <?php echo $info[0]['price']; ?>
            <br>
            <button>Ajouter au Panier</button>
        </div>
    </div>
    <div class="row">
        <div>
            <p><?php echo $info[0]['description']; ?></p>
        </div>
        <div>
            <p><?php echo $info[0]['place_offer'] . ' ' . $info[0]['city']; ?></p>
            <br>
            <p><?php echo $info[0]['dispo_offer']; ?></p>
        </div>
    </div>
</div>
<?php include 'php/footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/public/js/bootstrap/3.3.5/bootstrap.min.js"></script>
<script src="/public/js/min/sugarsync-helpers.js"></script>
<link rel="gettext" type="application/json" href="/public/js/LC_MESSAGES/sstranslate-fr.json">
<script language="javascript" src="/public/js/min/gettext.js"></script>

<script src="/public/js/min/sugarsync-pricing.js?1479818852"></script>
<script src="/public/js/min/jquery.scrollTo.min.js"></script>
<script src="/public/js/min/new-home.js?1479818852"></script>
<script src="/public/js/min/urlEncode.js"></script>
<script src="/public/js/min/sugarsync-signup.js?1479818852"></script>

<script type="text/javascript">
    var gt = new Gettext({"domain": "sstranslate"});
    function _(msgid) {
        return gt.gettext(msgid);
    }


    $("#language").change(function () {
        var langs = ["en", "jp", "fr", "de", "es"];
        var languageSelected = this.value;
        var url = window.location;
        var pieces = url.toString().split("/");
        if (langs.indexOf(pieces[3]) != -1) {
            pieces[3] = languageSelected;
        }
        else {
            pieces.unshift("dummy");
            pieces[0] = pieces[1];
            pieces[1] = pieces[2];
            pieces[2] = pieces[3];
            pieces[3] = languageSelected;
        }
        window.location.href = pieces.join('/');
    });

    $('body :not(script) :not(iframe)').contents().filter(function () {
        return this.nodeType === 3;
    }).replaceWith(function () {
        return this.nodeValue.replace(/[<sup>™</sup><sup>®</sup>]/g, '<sup>$&amp;</sup>');
    });


    $('#try-sugarsync-free').click(function () {
        if ($('#signUp').length) {
            $(window).scrollTo($('#signUp'), 800, {offset: -100});
        }
        else {
            window.location.href = $(this).data("href");
        }
    });

    function setActiveStyleSheet(title) {
        var i, a, main;
        for (i = 0; (a = document.getElementsByTagName("link")[i]); i++) {
            if (a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
                a.disabled = true;
                if (a.getAttribute("title") == title) a.disabled = false;
            }
        }
    }
</script>

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
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

<!-- Theme JavaScript -->
<script src="js/project.min.js"></script>
</body>
</html>
