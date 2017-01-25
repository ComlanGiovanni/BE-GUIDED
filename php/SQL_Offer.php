<?php
session_start();
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
        $v = $this->query('SELECT * FROM `offers` WHERE `id_offer` = :id',
            [':id' => $_GET['id']])->fetchAll();
        return $v;
    }

    public function list_offer()
    {
        $i = $this->query('SELECT id_offer,name_offer,price,description,city,img_offer,id_user FROM offers ORDER BY id_offer DESC')->fetchAll();
        foreach ($i as $img) {
            echo '<tr>
                <td><img src="' . $img['img_offer'] . '" height="200px" width="200px" alt=""></td>
                <td>' . $img['city'] . '</td>
                <td><h4>' . $img['name_offer'] .'</h4><br><br><p>' . $img['description'] .'</p></td>
                <td> ' . $img['price'] . ' €</td>
                </tr>';
        }
    }
}
