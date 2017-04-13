<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

class Offer
{
    private $session;
    
    public function __construct ($session)
    {
        $this->session = $session;
    }
    
    public function view_offer ($db)
    {
        $v = $db->query('SELECT * FROM offers WHERE id_offer = :id', [':id' => $_GET['id']])->fetch();
        
        return $v;
    }
    
    public function list_comment ($db)
    {
        $q = $db->query('SELECT * FROM offers INNER JOIN comment ON offers.id_offer = comment.id_offer INNER JOIN users 
ON users.id_user = comment.id_user WHERE offers.id_offer = :id', [':id' => $_GET['id']])->fetchAll();
        
        if (!empty($q)) {
            foreach ($q as $com) {
                echo '<p>Ecrit le ' . $com['date_comment'] . ' par ' . $com['firstname'] . ' ' . $com['lastname'];
                if ($com['date_modif_comment'] != NULL) {
                    echo ' modifié le ' . $com['date_modif_comment'] . '</p>';
                } else {
                    echo '</p>';
                }
            }
            echo '<br><p>' . $com['msg_comment'] . '</p>';
        } else {
            echo 'Aucun commentaire';
        }
    }
    
    public function list_offer ($db)
    {
        $i = $db->query('SELECT * FROM offers INNER JOIN guide ON offers.id_guide = guide.id_guide INNER JOIN users
 ON users.id_user = guide.id_user ORDER BY offers.date_publication DESC')->fetchAll();
        $nb_page = ceil(count($i) / 10);
        $data = [];
        for ($j = 0; $j < $nb_page; $j++) {
            $offset = $j * 10;
            $data[$j] = $db->query("SELECT * FROM offers INNER JOIN guide ON offers.id_guide = guide.id_guide INNER JOIN users
 ON users.id_user = guide.id_user ORDER BY offers.date_publication DESC LIMIT 10 OFFSET $offset")->fetchAll();
        }
        if (empty($_GET['page'])) {
            $_GET['page'] = 1;
        }
        if (isset($data[$_GET['page'] - 1])) {
            foreach ($data[$_GET['page'] - 1] as $article) {
                echo '<tr>
                <td><img src="guides/guide_' . $article[10] . '/' . $article['img_offer'] . '" height="200px" width="200px" alt=""></td>
                <td>' . $article['city_offer'] . '</td>
                <td>' . $article['lastname'] . ' ' . $article['firstname'] . '</td>
                <td><h4>' . $article['name_offer'] . '</h4><br><p>' . $article['description'] . '</p></td>
                <td> ' . $article['price_offer'] . ' €</td>
                <td><button type="button" class="btn btn-primary"><a href="view.php?id=' . $article['id_offer'] . '">Voir Plus</a></button></td>
                </tr>';
            }
            echo '<td><a style="color: #000;" href="offres.php?page=1">&lt;&lt;</a></td>';
            for ($l = 0; $l < $nb_page; $l++) {
                echo '<td><a style="color: black;" href="offres.php?page=' . ($l + 1) . '">' . ($l + 1) . '</a></td>';
            }
            echo '<td><a style="color: #000;" href="offres.php?page=' . $nb_page . '">&gt;&gt;</a></td>';
        } else {
            echo '<td>Cette page n\'existe pas !</td>';
        }
        
        
    }
    
    public function view_private ($db)
    {
        $v = $db->query('SELECT * FROM offers WHERE `id_guide` = :id', [':id' => $this->session->doubleRead('guide', 'id_guide')])->fetchAll();
        $nb_page = ceil(count($v) / 10);
        $data = [];
        for ($j = 0; $j < $nb_page; $j++) {
            $offset = $j * 10;
            $data[$j] = $db->query("SELECT * FROM offers WHERE `id_guide` = :id ORDER BY date_publication DESC LIMIT $offset,10", [':id' => $this->session->doubleRead('guide', 'id_guide')])->fetchAll();
        }
        if (empty($_GET['page'])) {
            $_GET['page'] = 1;
        }
        if (isset($data[$_GET['page'] - 1])) {
            foreach ($data[$_GET['page'] - 1] as $inf) {
                echo '<tr>
                <td><img src="guides/guide_' . $inf['id_guide'] . '/' . $inf['img_offer'] . '" height="200px" width="200px" alt=""></td>
                <td>' . $inf['city_offer'] . '</td>
                <td><h4>' . $inf['name_offer'] . '</h4><br><p>' . $inf['description'] . '</p></td>
                <td>' . $inf['price_offer'] . ' €</td>
                <td>' . $inf['date_publication'] . '</td>
                <td><button type="button" class="btn btn-primary"><a href="modif.php?id=' . $inf['id_offer'] . '">Modifier</a></button></td>
                </tr>';
            }
            echo '<td><a style="color: #000;" href="offres.php?page=1">&lt;&lt;</a></td>';
            for ($l = 0; $l < $nb_page; $l++) {
                echo '<td><a style="color: black;" href="offres.php?page=' . ($l + 1) . '">' . ($l + 1) . '</a></td>';
            }
            echo '<td><a style="color: #000;" href="offres.php?page=' . $nb_page . '">&gt;&gt;</a></td>';
        } else {
            echo '<td>Cette page n\'existe pas !</td>';
        }
    }
    
    public function create_offer ($db, $name, $city, $cp, $place, $price, $desc, $img)
    {
        if (!empty($_POST)) {
            $db->query('INSERT INTO offers(name_offer,city_offer,postal_code_offer,place_offer,price_offer,id_guide,description,date_publication,date_modification,img_offer) 
              VALUES (:name, :city,:cd, :place, :price, :id_g, :desc, NOW(), NOW(), :img)',
                [':name' => htmlspecialchars($name), ':city' => htmlspecialchars($city), ':cd' => htmlspecialchars($cp),
                    ':place' => htmlspecialchars($place), ':price' => htmlspecialchars($price),
                    ':id_g' => $this->session->doubleRead('guide', 'id_guide'), ':desc' => htmlspecialchars($desc), ':img' => htmlspecialchars($_FILES[$img]['name'])]);
            $this->upload($img);
        }
    }
    
    public function upload ($image)
    {
        if (isset($_FILES) and !empty($_FILES[$image])) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE); // Vérifie le type MIME du fichier
            $mime = finfo_file($finfo, $_FILES[$image]['tmp_name']); // Regarde dans ce fichier le type MIME
            finfo_close($finfo); // Fermeture de la lecture
            $filename = explode('.', $_FILES[$image]['name']); // Explosion du nom sur le point
            $extension = $filename[count($filename) - 1]; // L'extension du fichier
            $extension_valide = ['png', 'jpeg', 'gif', 'jpg'];
            $mime_valide = ['image/png', 'image/jpeg', 'image/gif', 'image/jpg'];
            if ((in_array($extension, $extension_valide) and in_array($mime, $mime_valide))) {
                if ($_FILES[$image]['size'] < 20971520) {
                    $dossier = 'guides/guide_' . $this->session->doubleRead('guide', 'id_guide');
                    if (!is_dir($dossier)) {
                        mkdir($dossier, 0777, true);
                    }
                    move_uploaded_file($_FILES[$image]['tmp_name'], $dossier . '/' . $_FILES[$image]['name']);
                }
            }
        }
    }
    
    public function modif_offer ($db)
    {
        $v = $db->query('SELECT * FROM offers WHERE `id_offer` = :id',
            [':id' => $_GET['id']])->fetch();
        if (!empty($_POST)) {
            $db->query('UPDATE offers SET name_offer= :nam, city_offer= :city, `postal_code_offer`= :cd, place_offer = :place, price_offer = :price,
                  description = :desc WHERE `id_offer` = :id',
                [':nam' => $_POST['title'], ':city' => $_POST['city'], ':cd' => $_POST['dsp'], ':place' => $_POST['adr'], ':price' => $_POST['price'],
                    ':desc' => $_POST['desc'], ':id' => $_GET['id']]);
            App::redirect('my_offer.php');
        }
        
        return $v;
    }
    
    public function last_offer ($db)
    {
        $last = $db->query('SELECT * FROM offers INNER JOIN guide on guide.id_guide = offers.id_guide ORDER BY offers.id_offer DESC LIMIT 4')->fetchAll();
        
        return $last;
    }
}
