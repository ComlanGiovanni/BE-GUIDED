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
            $req->execute($params) or die (print_r($req->errorInfo()));
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
                if ($_POST['pass'] == $_POST['pass2']) {
                    $this->query('INSERT INTO users(lastname, firstname, password, email) VALUES (:lname, :fname, :password, :email)',
                        [':lname' => htmlspecialchars($_POST['lastname']), ':fname' => htmlspecialchars($_POST['firstname']), ':password' => crypt(htmlspecialchars($_POST['pass']), '$5$rounds=2000$salt$'), ':email' => htmlspecialchars($_POST['email'])]);
                    header('Location: connexion.php');
                } else {
                    echo '<div class="alert">Les mots de passe ne correspondent pas ! Veuillez réessayer.</div>';
                }
            }
        }
    }

    public function connexion()
    {
        if (!empty($_POST)) {

            $a = $this->query('SELECT id_user, lastname FROM `users` WHERE email = :email AND `password` = :pass',
                [':email' => htmlspecialchars($_POST['email']), ':pass' => crypt(htmlspecialchars($_POST['pass']), '$5$rounds=2000$salt$')])->fetchAll();
            if (count($a) > 0) {
                $b = $this->query('SELECT * FROM users INNER JOIN guide ON users.id_user = guide.id_user WHERE users.id_user = :id',[':id' => $a[0]['id_user']])->fetchAll();
                $_SESSION['connected'] = true;
                $_SESSION['id_user'] = $a[0]['id_user'];
                if (count($b) > 0) {
                    $_SESSION['guide'] = true;
                }
                header('Location: index.php');
            } else {
                echo '<span id="pass" class="help-block">Vos identifiants sont incorrects !</span>';
            }
        }
    }

    public function guide()
    {
        if (!empty($_POST)) {
            for ($i = 1; $i <= 6; $i++)
            {
                $l = 'langue' . $i;
                if (empty($_POST[$l]))
                {
                    $_POST[$l] = " ";
                }

            }
            for ($ia = 1; $ia <= 5; $ia++)
            {
                $in = 'inter' . $ia;
                if (empty($_POST[$in]))
                {
                    $_POST[$in] = " ";
                }

            }

            $lang = $_POST['langue1'] . " " . $_POST['langue2'] . " " . $_POST['langue3'] . " " . $_POST['langue4'] . " " .
                $_POST['langue5'] . " " . $_POST['langue6'];
            $hobbies = $_POST['inter1'] . " " . $_POST['inter2'] . " " . $_POST['inter3'] . " " . $_POST['inter4'] . " " .
                $_POST['inter5'];
            $this->query('INSERT INTO guide(id_user, city, postal_code, address, language, hobbies, num_mobile)
              VALUES (:id, :city, :ptc, :add, :lang, :hobbies, :mobil)',
                [':id' => htmlspecialchars($_SESSION['id_user']), ':city' => $_POST['city'],
                    ':ptc' => htmlspecialchars($_POST['cdp']), ':add' => htmlspecialchars($_POST['address']),
                    ':lang' => htmlspecialchars($lang), ':hobbies' => htmlspecialchars($hobbies), ':mobil' => htmlspecialchars($_POST['numTel'])]);
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
        if (!isset($_SESSION['connected'])) {
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
