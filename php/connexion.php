<?php
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