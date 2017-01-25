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
<?php include 'php/nav.php';
$of->create_offer();
?>
<header class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="brand-heading">Bienvenue</h1>
                    <p class="intro-text">« Guide ME ! » est une plateforme (site web) dédiée au tourisme. Elle permet
                        de mettre à disposition de ses utilisateurs des guides touristiques qui leur donnent la
                        possibilité de visiter des lieux incontournables et ceci dans toute la France.
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <form method="post" action="#" enctype="multipart/form-data">
        <div class="form-group col-md-offset-1 col-md-10">
            <label for="title">Nom</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nom de votre offre">
        </div>
        <div class="form-group col-md-offset-1 col-md-10">
            <label for="desc">Description</label>
            <input type="text" class="form-control" id="desc" name="desc" placeholder="Décrivez votre offre">
        </div>
        <div class="form-group col-md-offset-1 col-md-2">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" id="ville" name="city" placeholder="Ville">
        </div>
        <div class="form-group col-md-6">
            <label for="adresse">Lieux de rencontre</label>
            <input type="text" class="form-control" id="adresse" name="adr" placeholder="Lieux de rencontre">
        </div>
        <div class="form-group col-md-2">
            <label for="price">Prix</label>
            <input type="number" step="0.01" min="0" class="form-control" id="price" name="price" placeholder="Prix">
        </div>
        <div class="form-group col-md-offset-1 col-md-10">
            <label for="dsp">Disponibilité de l'offre</label>
            <input type="text" class="form-control" id="dsp" name="dsp" placeholder="Vos Disponibilités">
        </div>
        <div class="form-group col-md-offset-1 col-md-10">
            <label for="img">Image de description</label>
            <input type="file" id="img" name="img">
        </div>

        <button type="submit" class="btn btn-default col-md-offset-5 col-md-2">Créer votre offre</button>
    </form>
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
</div>
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
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

<!-- Theme JavaScript -->
<script src="js/project.min.js"></script>
</body>