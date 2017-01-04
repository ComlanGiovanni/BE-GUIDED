<?php
if (!empty($_POST)) {
    require 'DB_LINK.php';
    $stmt = $dbh->prepare('INSERT INTO `user`(`lastname`, `firstname`, `email`, `password`) VALUES (:lastname, :firstname, :email, :password)');
    $stmt->execute([':lastname' => $_POST['lastname'],':firstname'=> $_POST['firstname'], ':password' => $_POST['pass'], ':email' => $_POST['email']]);
    header('Location: ../index.html');
}

