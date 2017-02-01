<?php 


?>



<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, target-densitydpi=device-dpi"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto|Poppins" rel="stylesheet">
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="css/offres.css">
        <title>Offres | Guide ME !</title>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    </head>
    <body>
        <a href="javascript:document.location.href='#myModal'"></a>
        <?php include 'php/nav.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div id="imaginary_container"> 
                        <div class="input-group stylish-input-group">
                            <input type="text" class="form-control"  placeholder="Rechercher" >
                            <span class="input-group-addon"><button type="submit"><span class="glyphicon glyphicon-search"></span></button> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div><!-- Offres -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>Lieu</th>
                        <th>Proposé par :</th>
                        <th>Offre</th>
                        <th>Prix</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $of->list_offer(); ?>
                </tbody>
            </table>
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
<script src="js/project.min.js"></script>
</body>
</html>