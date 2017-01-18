<?php
require 'SQL_User.php';
$req = new SQL_User('root', '', 'be');
?>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>

            <a class="navbar-brand page-scroll" href="#page-top">
                <span><img src="img/lg.png" width="50px" height="40" style="margin: -12px 0px 0px 0px" alt=""><span
                            class="light">Guide </span> <span style="color:red;">ME</span> !</span>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <?php if (!isset($_SESSION['connected'])) {
                    echo '
                <li class="hidden">
                    <a href="#page-top"></a>
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
                    <a href="#" class="dropdown-toggle" id="drop2" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Mon profil <span class="caret"></span> </a> 
                    <ul class="dropdown-menu" aria-labelledby="drop2"> 
                        <li><a href="account.php">Mon compte</a></li> 
                        <li><a href="#">Devenir Guide</a></li> 
                        <li><a href="#"></a></li> 
                        <li role="separator" class="divider"></li> 
                        <li><a href="php/deconnexion.php">Déconnexion</a></li> 
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