<!DOCTYPE html>
<html lang="">
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
<body>
<?php include 'php/nav.php'; ?>
<div style="height: 100px; background: #000;">
</div>
<div class="container-fluid">
    <?php $req->guide();?>
    <form action="#" method="post">
        <div class="form-group col-md-4">
            <input type="number" class="form-control" id="numTel" name="numTel" placeholder="Numero de votre Mobile">
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-4">
                <input type="text" name="city" id="city" class="form-control" placeholder="Ville">
            </div>
            <div class="col-md-4 col-md-offset-2">
                <input type="number" name="cdp" id="cdp" class="form-control" placeholder="Code Postal">
            </div>
        </div>
        <div class="form-group col-md-12">
            <input type="text" name="address" class="form-control" id="address" placeholder="Adresse">
        </div>
        <div class="form-group col-md-12">
            <label class="col-sm-2 control-label">Langue parlée :</label>
            <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox1" name="langue1" value="français"> Français
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox2" name="langue2" value="anglais"> Anglais
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox3" name="langue3" value="espagnol">Espagnol
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox4" name="langue4" value="allemand">Allemand
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox5" name="langue5" value="arabe">Arabe
            </label>
            <label class="checkbox-inline">
                <input type="text" id="inlineCheckbox6" name="langue6" placeholder="Autre">
            </label>
        </div>
        <div class="form-group col-md-12">
            <label class="col-sm-2 control-label">Centre d'intérêt :</label>
            <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox1" name="inter1" value="art">Art
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox2" name="inter2" value="sport"> Sport
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox3" name="inter3" value="literature">Litérature
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox4" name="inter4" value="exemple">exemple
            </label>
            <label class="checkbox-inline">
                <input type="text" id="inlineCheckbox6" name="inter5" placeholder="Autre">
            </label>
        </div>
        <div class="col-md-2 col-md-offset-5">
            <button type="submit" class="btn btn-default">Valider</button>
        </div>

    </form>
</div>

<?php include 'php/footer.php'; ?>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/inscon.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

<!-- Theme JavaScript -->
<script src="js/project.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- Theme JavaScript -->
<script src="js/project.min.js"></script>
</body>
</html>