<?php
<<<<<<< HEAD
/* Connexion à une base ODBC avec l'invocation de pilote */
$dsn = 'mysql:dbname=be-guided;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
=======
/**
 * Created by PhpStorm.
 * User: Laurent
 * Date: 04/01/2017
 * Time: 13:41
 */
>>>>>>> 7112b3f7a1eb03627ffafe92ea93c60c5302125b
