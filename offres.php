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
    </head>
    <body>
    <a href="javascript:document.location.href='#myModal'"></a>
        <?php include 'php/nav.php'; ?>
        <div class="container">
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
    </body>
</html>