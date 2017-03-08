<?php
require_once 'php/load.php';

App::getUser()->restrict();
$db = App::getDatabase();
$user_id = Session::getInstance()->doubleRead('connected', 'id_user');
$email = Session::getInstance()->doubleRead('connected', 'email');
$token = App::random(60);

$db->query('UPDATE users SET confirmation_token = :token WHERE id_user = :id', [':token' => $token, ':id' => $user_id]);
$msg = 'Pour valider votre compte, <a target="_blank" href="BE-GUIDED/confirm.php?id=' . $user_id . '&token=' . $token . '">cliquez-ici.</a>';
mail($email, 'Validation Compte BE-GUIDED', $msg);
App::redirect('account.php');