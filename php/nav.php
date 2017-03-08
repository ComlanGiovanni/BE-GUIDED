<?php
require_once 'load.php';
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
?>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>

                <a class="navbar-brand page-scroll" href="index.php">

                <span><img src="img/lg.png" width="50px" height="40" style="margin: -12px 0px 0px 0px" alt=""><span
                            class="light">Guide </span> <span style="color:red;">ME</span> !</span></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <?php if (!Session::getInstance()->read('connected')) {
                        echo '
                <li class="hidden">
                    <a href="index.php"></a>
                </li>
                <li>
                    <a class="page-scroll" href="inscription.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Inscription</a>
                </li>
                <li>
                    <a class="page-scroll" href="connexion.php"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Connexion</a>
                </li>
                <li>
                    <a class="page-scroll" href="geoloc.html"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Localisation</a>
                </li>';
                    } else {
                        echo '
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="dropdown"> 
                    <a href="#" class="dropdown-toggle" id="drop2" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Mon Compte <span class="caret"></span> </a> 
                    <ul class="dropdown-menu" aria-labelledby="drop2"> 
                        <li><a href="account.php"><i class="fa fa-info-circle" aria-hidden="true"></i> Mon Profil</a></li>';
                        if (!Session::getInstance()->read('guide')) {
                            
                            echo '<li><a href="memberpg.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Devenir Guide</a></li>';
                        } else {
                            echo '<li><a href="create_offer.php"><i class="fa fa-plus" aria-hidden="true"></i> Créer une offre</a></li>
                               <li><a href="my_offer.php"><i class="fa fa-tasks" aria-hidden="true"></i> Gerer mes offres</a></li>';
                        }
                        
                        echo '
                         <li><a href="offres.php"><i class="fa fa-eye" aria-hidden="true"></i> Voir les offres</a></li>
                        <li role="separator" class="divider"></li> 
                        <li><a href="php/deconnexion.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Déconnexion</a></li> 
                    </ul>
                </li>
                <li>
                    <a class="page-scroll" href="geoloc.html"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Localisation</a>
                </li>';
                        
                    }
                    ?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<?php if (Session::getInstance()->hasFlashes()): ?>
    <?php foreach (Session::getInstance()->getFlashes() as $type => $message) : ?>
        <?php foreach ($message as $msg) : ?>
            <div class="alert alert-<?= $type; ?>">
                <li><?= $msg; ?></li>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
<?php endif; ?>