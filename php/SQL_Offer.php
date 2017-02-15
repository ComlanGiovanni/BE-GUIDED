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
        $v = $this->query('SELECT * FROM offers WHERE id_offer = :id',
            [':id' => $_GET['id']])->fetchAll();
        return $v;
    }

    public function list_comment()
    {
        $q = $this->query('SELECT * FROM offers, comment, users WHERE comment.id_offer = offers.id_offer
AND comment.id_user = users.id_user AND offers.id_offer = :id', [':id' => $_GET['id']])->fetchAll();
        if (count($q) > 0) {
            foreach ($q as $com) {
                echo '<p>Ecrit le ' . $com['date_comment'] . ' par ' . $com['firstname'] . ' ' . $com['lastname'];
                if ($com['date_modif_comment'] != NULL) {
                    echo ' modifié le ' . $com['date_modif_comment'] . '</p>';
                }
                else {
                    echo '</p>';
                }
            }
            echo '<br><p>' . $com['msg_comment'] . '</p>';
        } else {
            echo 'Aucun commentaire';
        }
    }

    public
    function list_offer()
    {
        $i = $this->query('SELECT * FROM users,guide,offers WHERE guide.id_user = users.id_user AND offers.id_guide = guide.id_guide ORDER BY offers.date_publication DESC')->fetchAll();
        foreach ($i as $inf) {
            echo '<tr>
                <td><img src="guides/guide_' . $inf['id_guide'] . '/' . $inf['img_offer'] . '" height="200px" width="200px" alt=""></td>
                <td>' . $inf['city_offer'] . '</td>
                <td>' . $inf['lastname'] . ' ' . $inf['firstname'] . '</td>
                <td><h4>' . $inf['name_offer'] . '</h4><br><p>' . $inf['description'] . '</p></td>
                <td> <button type="button" class="btn btn-primary">' . $inf['price_offer'] . '</button> €</td>
                <td><button type="button" class="btn btn-primary"><a href="view.php?id=' . $inf['id_offer'] . '">Voir Plus</a></button></td>
                </tr>';
        }
    }


    public
    function view_private()
    {
        $v = $this->query('SELECT * FROM offers WHERE `id_guide` = :id', [':id' => $_SESSION['id_guide']])->fetchAll();
        foreach ($v as $inf) {
            echo '<tr>
                <td><img src="guides/guide_' . $inf['id_guide'] . '/' . $inf['img_offer'] . '" height="200px" width="200px" alt=""></td>
                <td>' . $inf['city_offer'] . '</td>
                <td><h4>' . $inf['name_offer'] . '</h4><br><p>' . $inf['description'] . '</p></td>
                <td>' . $inf['price_offer'] . ' €</td>
                <td>' . $inf['date_publication'] . '</td>
                <td><button type="button" class="btn btn-primary"><a href="modif.php?id=' . $inf['id_offer'] . '">Modifier</a></button></td>
                </tr>';
        }
    }

    public
    function create_offer()
    {
        if (!isset($_FILES)) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE); // Vérifie le type MIME du fichier
            $mime = finfo_file($finfo, $_FILES['img']['tmp_name']); // Regarde dans ce fichier le type MIME
            finfo_close($finfo); // Fermeture de la lecture
            $filename = explode('.', $_FILES['img']['name']); // Explosion du nom sur le point
            $extension = $filename[count($filename) - 1]; // L'extension du fichier
            $extension_valide = ['png', 'jpeg', 'gif', 'jpg'];
            $mime_valide = ['image/png', 'image/jpeg', 'image/gif', 'image/jpg'];
            if ((in_array($extension, $extension_valide) && in_array($mime, $mime_valide))) {
                if ($_FILES['img']['size'] < 20971520) {
                    $dossier = 'guides/guide_' . $_SESSION['id_user'];
                    if (!is_dir($dossier)) {
                        mkdir($dossier);
                    }
                    move_uploaded_file($_FILES['img']['tmp_name'],
                        'guides/guide_' . $_SESSION['id_guide'] . '/' . $_FILES['img']['name']);
                }
            }
            $img = $_FILES['img']['name'];
        } else {
            $img = NULL;
        }
        if (!empty($_POST)) {
            $this->query('INSERT INTO offers(name_offer,city_offer,postal_code_offer,place_offer,price_offer,id_guide,description,date_publication,date_modification,img_offer) 
              VALUES (:name, :city,:cd, :place, :price, :id_g, :desc, NOW(), NOW(), :img)',
                [':name' => $_POST['title'], ':city' => $_POST['city'], ':cd' => $_POST['dsp'], ':place' => $_POST['adr'], ':price' => $_POST['price'],
                    ':id_g' => $_SESSION['id_guide'], ':desc' => $_POST['desc'], ':img' => $img]);
            header('Location: my_offer.php');
        }
    }

    public
    function modif_offer()
    {
        if (!isset($_SESSION['guide'])) {
            header('Location: memberpg.php');
        } else {
            $v = $this->query('SELECT * FROM offers WHERE `id_offer` = :id',
                [':id' => $_GET['id']])->fetchAll();
            if (!empty($_POST)) {
                $this->query('UPDATE offers SET name_offer= :name, city_offer= :city, `postal_code_offer`= :cd, place_offer = :place, price_offer = :price,
                  description = :desc WHERE `id_offer` = :id',
                    [':name' => $_POST['title'], ':city' => $_POST['city'], ':cd' => $_POST['dsp'], ':place' => $_POST['adr'], ':price' => $_POST['price'],
                        ':desc' => $_POST['desc'], ':id' => $_GET['id']]);
                header('Location: my_offer.php');
            }
        }
        return $v;
    }

    public
    function upload()
    {
        if (!$_SESSION['connected']) {
            header('Location: connexion.php');
        } else {
            if (isset($_FILES['file'])) {
                $finfo = finfo_open(FILEINFO_MIME_TYPE); // Vérifie le type MIME du fichier
                $mime = finfo_file($finfo, $_FILES['file']['tmp_name']); // Regarde dans ce fichier le type MIME
                finfo_close($finfo); // Fermeture de la lecture
                $filename = explode('.', $_FILES['file']['name']); // Explosion du nom sur le point
                $extension = $filename[count($filename) - 1]; // L'extension du fichier
                $extension_valide = ['png', 'jpeg', 'gif', 'jpg'];
                $mime_valide = ['image/png', 'image/jpeg', 'image/gif', 'image/jpg'];
                if ((in_array($extension, $extension_valide) && in_array($mime, $mime_valide))) {
                    if ($_FILES['file']['size'] < 20971520) {
                        $dossier = 'upload/' . $_SESSION['id_user'];
                        if (!is_dir($dossier)) {
                            mkdir($dossier);
                        }
                        move_uploaded_file($_FILES['file']['tmp_name'],
                            'upload/' . $_SESSION['id_user'] . '/' . $_FILES['file']['name']);
                        $this->query('INSERT INTO `image`(`name_image`, `date`, `ip_address`, `id_user`) VALUES (:name, NOW(), :ip, :id)',
                            [':name' => $_FILES['file']['name'], ':ip' => $_SERVER['REMOTE_ADDR'], ':id' => $_SESSION['id_user']]);
                        echo '<div class="alert success"><strong>Upload réussi !</strong> Votre image a bien été envoyé.</div>';
                    } else {
                        echo '<div class="alert"><strong>Echec ! </strong>Fichier trop volumineux !</div>';
                    }

                } else {
                    echo '<div class="alert"><strong>Echec ! </strong>Format incorrect !</div>';
                }
            }
        }
    }

}
