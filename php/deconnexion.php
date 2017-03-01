<?php
require 'load.php';
App::getUser()->deconnexion();
Session::getInstance()->setFlash('success', 'Vous êtes maintenant déconnecté');
App::redirect('../connexion.php');