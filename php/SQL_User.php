<?php
session_start();
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

class SQL_User
{
    private $dbh;

    public function __construct($login, $password, $database_name, $host = 'localhost')
    {
        try {
            $this->dbh = new PDO("mysql:dbname=$database_name;host=$host", $login, $password);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }

    /**
     * @param $query
     * @param bool|array $params
     * @return PDOStatement
     */
    public function query($query, $params = false)
    {
        if ($params) {
            $req = $this->dbh->prepare($query);
            $req->execute($params) or die ( print_r($req->errorInfo()) );
        } else {
            $req = $this->dbh->query($query);
        }
        return $req;
    }


    public function inscription()
    {
        if (!empty($_POST)) {
            $al = [];
            $af = [];
            $ae = [];
            $all_name = $this->query('SELECT lastname, firstname, email FROM `users`')->fetchAll();
            foreach ($all_name as $a) {
                array_push($al, $a['lastname']);
                array_push($af, $a['firstname']);
                array_push($ae, $a['email']);
            }
            if ((in_array(htmlspecialchars($_POST['lastname']), $al) and in_array(htmlspecialchars($_POST['firstname']), $af)) or in_array(htmlspecialchars($_POST['email']), $ae)) {
                echo '<div class="alert">Votre Nom d\'utilisateur et/ou email est déjà utilisé ! Veuillez changer.</div>';
            } else {
                $this->query('INSERT INTO users(lastname, firstname, password, email) VALUES (:lname, :fname, :password, :email)',
                    [':lname' => htmlspecialchars($_POST['lastname']), ':fname' => htmlspecialchars($_POST['firstname']), ':password' => crypt(htmlspecialchars($_POST['pass']), '$5$rounds=2000$salt$'), ':email' => htmlspecialchars($_POST['email'])]);
                header('Location: connexion.php');
            }
        }
    }

    public function connexion()
    {
        if (!empty($_POST)) {

            $a = $this->query('SELECT id_user, lastname FROM `users` WHERE email = :email AND `password` = :pass',
                [':email' => htmlspecialchars($_POST['email']), ':pass' => crypt(htmlspecialchars($_POST['pass']), '$5$rounds=2000$salt$')])->fetchAll();
            if (count($a) > 0) {
                $_SESSION['connected'] = true;
                $_SESSION['id_user'] = $a[0]['id_user'];
                if ($a[0]['lastname'] === 'admin') {
                    $_SESSION['admin'] = true;
                } else {
                    $_SESSION['admin'] = false;
                }
                header('Location: index.php');
            } else {
                echo '<div class="alert">Vos identifiants sont incorrects !</div>';
            }
        }
    }

    public function deconnexion()
    {
        session_unset();
        session_destroy();
        header('Location: ../index.php');
    }

    public function view_profile()
    {
        if (!$_SESSION['connected']) {
            header('Location: connexion.php');
        } else {
            $v = $this->query('SELECT * FROM `users` WHERE `id_user` = :id',
                [':id' => $_SESSION['id_user']])->fetchAll();
            if (!empty($_POST)) {
                $this->query('UPDATE `users` SET `lastname`= :lname, firstname= :fname, `password`= :password,`email`= :email WHERE `id_user` = :id',
                    [':lname' => htmlspecialchars($_POST['name']), ':fname' => htmlspecialchars($_POST['firstname']), ':password' => crypt(htmlspecialchars($_POST['password']), '$5$rounds=2000$salt$'), ':email' => htmlspecialchars($_POST['email']), ':id' => $_SESSION['id_user']]);
                header('Location: account.php');
            }
        }
        return $v;
    }
}
