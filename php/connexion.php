<?php
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
if (!empty($_POST)) {
    require 'DB_LINK.php';
    $stmt = $dbh->prepare('SELECT * FROM `user` WHERE `email` = :email AND `password` = :pass');
    $stmt->execute([':email' => $_POST['email3'],':pass' => $_POST['pass3']]);
    $a = $stmt->fetch(PDO::FETCH_ASSOC);
    if (count($a) > 0) {
        session_start();
        $log = true;
        echo 'CONNECTE';
        $_SESSION = $a;
        var_dump($_SESSION);
        $_SESSION['connected'] = true;
        header('Location: ../index.html');
    }
    else {
        echo('Identifiant incorrect');
    }
}
=======
=======
>>>>>>> 7112b3f7a1eb03627ffafe92ea93c60c5302125b
=======
>>>>>>> 7112b3f7a1eb03627ffafe92ea93c60c5302125b
/**
 * Created by PhpStorm.
 * User: Laurent
 * Date: 04/01/2017
 * Time: 14:02
<<<<<<< HEAD
<<<<<<< HEAD
 */
>>>>>>> 7112b3f7a1eb03627ffafe92ea93c60c5302125b
=======
 */
>>>>>>> 7112b3f7a1eb03627ffafe92ea93c60c5302125b
=======
 */
>>>>>>> 7112b3f7a1eb03627ffafe92ea93c60c5302125b
