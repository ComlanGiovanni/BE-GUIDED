<?php
require_once 'php/load.php';
App::getUser()->restrict();
$db = App::getDatabase();
$user = App::getUser();

if ($user->confirm($db, $_GET['id'], $_GET['token'])) {
    Session::getInstance()->setFlash('succes', 'Votre compte a bien été validé');
    App::redirect('account.php');
} else {
    Session::getInstance()->setFlash('danger','Ce token n\'est plus valide');
    App::redirect('connexion.php');
}