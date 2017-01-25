<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

class SQL_Offer
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

    public function view_offer()
    {
        $v = $this->query('SELECT * FROM users LEFT JOIN offers ON users.id_user = offers.id_user WHERE `id_offer` = :id',
            [':id' => $_GET['id']])->fetchAll();
        return $v;
    }

    public function list_offer()
    {
        $i = $this->query('SELECT * FROM users LEFT JOIN offers ON users.id_user = offers.id_user ORDER BY users.id_user DESC')->fetchAll();
        foreach ($i as $inf) {
            echo '<tr>
                <td><img src="' . $inf['img_offer'] . '" height="200px" width="200px" alt=""></td>
                <td>' . $inf['city'] . '</td>
                <td>' . $inf['lastname'] . ' ' . $inf['firstname'] . '</td>
                <td><h4>' . $inf['name_offer'] .'</h4><br><p>' . $inf['description'] .'</p></td>
                <td> <button type="button" class="btn btn-primary">' . $inf['price'] . '</button> €</td>
                <td><button type="button" class="btn btn-primary"><a href="viewoffres.php?id="' . $inf['id_offer'].'></a></button></td>
                </tr>';
        }
    }
}
