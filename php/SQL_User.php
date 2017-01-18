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
            $req->execute($params);
        } else {
            $req = $this->dbh->query($query);
        }
        return $req;
    }


    public function inscription()
    {
        if (!empty($_POST)) {
            $ae = [];
            $an = [];
            $all_name = $this->query('SELECT user_name, email FROM `user`')->fetchAll();
            foreach ($all_name as $a) {
                array_push($an, $a['user_name']);
                array_push($ae, $a['email']);
            }
            if (in_array(htmlspecialchars($_POST['username']), $an) or in_array(htmlspecialchars($_POST['email']), $ae)) {
                echo '<div class="alert">Votre Nom d\'utilisateur et/ou email est déjà utilisé ! Veuillez changer.</div>';
            } else {
                $this->query('INSERT INTO `user`(`user_name`, `password`, `email`) VALUES (:name, :password, :email)',
                    [':name' => htmlspecialchars($_POST['username']), ':password' => crypt(htmlspecialchars($_POST['pass']), '$5$rounds=2000$usesomesillystringforsalt$'), ':email' => htmlspecialchars($_POST['email'])]);
                header('Location: connexion.php');
            }
        }
    }

    public function connexion()
    {
        if (!empty($_POST)) {

            $a = $this->query('SELECT * FROM `user` WHERE (`user_name` = :login OR email = :email )AND `password` = :pass',
                [':login' => htmlspecialchars($_POST['login']), ':email' => htmlspecialchars($_POST['login']), ':pass' => crypt(htmlspecialchars($_POST['pass']), '$5$rounds=2000$usesomesillystringforsalt$')])->fetchAll();
            if (count($a) > 0) {
                $_SESSION['connected'] = true;
                $_SESSION['id_user'] = $a[0]['id_user'];
                if ($a[0]['user_name'] === 'admin') {
                    $_SESSION['admin'] = true;
                } else {
                    $_SESSION['admin'] = false;
                }
                header('Location: profile.php');
            } else {
                echo '<div class="alert">Vos identifiants sont incorrects !</div>';
            }
        }
    }

    public function deconnexion()
    {
        session_unset();
        session_destroy();
        header('Location: index.php');
    }

    public function view_profile()
    {
        if (!$_SESSION['connected']) {
            header('Location: connexion.php');
        } else {
            $v = $this->query('SELECT * FROM `user` WHERE `id_user` = :id',
                [':id' => $_SESSION['id_user']])->fetchAll();
            if (!empty($_POST)) {
                $this->query('UPDATE `user` SET `user_name`= :name,`password`= :password,`email`= :email WHERE `id_user` = :id',
                    [':name' => htmlspecialchars($_POST['name']), ':password' => crypt(htmlspecialchars($_POST['password']), '$5$rounds=2000$usesomesillystringforsalt$'), ':email' => htmlspecialchars($_POST['email']), ':id' => $_SESSION['id_user']]);
                header('Location: profile.php');
            }
        }
        return $v;
    }
}
