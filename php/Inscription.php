<?php
<<<<<<< HEAD
if (!empty($_POST)) {
    require 'DB_LINK.php';
    $stmt = $dbh->prepare('INSERT INTO `user`(`lastname`, `firstname`, `email`, `password`) VALUES (:lastname, :firstname, :email, :password)');
    $stmt->execute([':lastname' => $_POST['lastname'],':firstname'=> $_POST['firstname'], ':password' => $_POST['pass'], ':email' => $_POST['email']]);
    header('Location: ../index.html');
}

=======
/**
 * Created by PhpStorm.
 * User: Laurent
 * Date: 04/01/2017
 * Time: 14:01
 */
>>>>>>> 7112b3f7a1eb03627ffafe92ea93c60c5302125b
