<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="UTF-8">

       <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=0.5, maximum-scale=2.0">
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
        <link href="css/memberpg.css" rel="stylesheet">

    </head>
    <body>
        <?php include 'php/nav.php'; ?>
        <div class="intro">
            <?php $req->guide();?>
            <form action="#" method="post">
                <div class="form-group col-sm-6">
                    <h4 class="titre"><i class="fa fa-info-circle" aria-hidden="true"></i> Renseigements</h4>
                    <div class="form-group col-md-12">
                        <div class="form-group col-sm-6">
                            <input type="tel" pattern="[0-9]{10}" title="Exemple: 0701020304" class="form-control" id="numTel" name="numTel" placeholder="Mobile">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" name="city" id="city" class="form-control" placeholder="Ville">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="form-group col-sm-6">
                            <input type="text" pattern="[0-9]{5}" name="cdp" id="cdp" class="form-control" title="Exemple: 75000" placeholder="Code Postal">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" name="address" class="form-control" id="address" placeholder="Adresse">
                        </div>
                    </div>
                </div>
                
                <div class="form-group col-sm-6 details">
                    <h4 class="titre"><i class="fa fa-question-circle" aria-hidden="true"></i> Détails</h4>
                    <div class="form-group col-md-12">
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control"  placeholder="Expérience">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" placeholder="Langue(s) parlée(s)">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" placeholder="Centres d'intérêts">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control"  placeholder="Age">
                        </div>
                    </div>
                </div>
                <div >
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