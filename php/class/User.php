<?php

class User
{
    public $session;
    
    public function __construct ($session)
    {
        $this->session = $session;
    }
    
    public function register ($db, $lastname, $firstname, $password, $email)
    {
        $token = App::random(60);
        $db->query('INSERT INTO users(lastname, firstname, password, email, confirmation_token) VALUES (:lname, :fname, :password, :email, :token)',
            [':lname' => htmlspecialchars($lastname), ':fname' => htmlspecialchars($firstname),
                ':password' => password_hash(htmlspecialchars($password), PASSWORD_BCRYPT),
                ':email' => htmlspecialchars($email),
                ':token' => $token]);
        $user_id = $db->lastInsertId();
        $msg = 'Pour valider votre compte, <a target="_blank" href="BE-GUIDED/confirm.php?id=' . $user_id . '&token=' . $token . '">cliquez-ici.</a>';
        mail($email, 'Validation Compte BE-GUIDED', $msg);
    }
    
    public function restrict ()
    {
        if (!$this->session->read('connected')) {
            $this->session->setFlash('danger', "Vous n'avez pas le droit d'accéder à cette page");
            App::redirect('connexion.php');
        }
    }
    
    public function restrictGuide ()
    {
        if (!$this->session->read('guide')) {
            $this->session->setFlash('danger', "Vous n'avez pas le droit d'accéder à cette page");
            App::redirect('account.php');
        }
    }
    
    public function login ($db, $email, $password)
    {
        $user = $db->query('SELECT * FROM `users` WHERE email = :email', [':email' => htmlspecialchars($email)])->fetch();
        if (!empty($user)) {
            if (password_verify($password, $user['password'])) {
                $guide = $db->query('SELECT * FROM users INNER JOIN guide ON users.id_user = guide.id_user WHERE users.id_user = :id',
                    [':id' => $user['id_user']])->fetch();
                $this->connect($user);
                if (!empty($guide)) {
                    $this->isGuide($guide);
                }
                
                return true;
            }
        } else {
            return false;
        }
    }
    
    public function connect ($user)
    {
        $this->session->write('connected', $user);
    }
    
    public function isGuide ($guide)
    {
        $this->session->write('guide', $guide);
    }
    
    public function guide ($db, $city, $cp, $add, $mobile, $hobbies, $language, $other_inf)
    {
        $db->query('INSERT INTO guide(id_user, city, postal_code, address, languages, hobbies, num_mobile, other_info)
              VALUES (:id, :city, :ptc, :add, :lang, :hobbies, :mobil, :inf)',
            [':id' => htmlspecialchars(Session::getInstance()->doubleRead('connected', 'id_user')), ':city' => htmlspecialchars($city),
                ':ptc' => htmlspecialchars($cp), ':add' => htmlspecialchars($add),
                ':lang' => htmlspecialchars($language), ':hobbies' => htmlspecialchars($hobbies),
                ':mobil' => htmlspecialchars($mobile), ':inf' => htmlspecialchars($other_inf)]);
        $guide = $db->query('SELECT * FROM users INNER JOIN guide ON users.id_user = guide.id_user WHERE users.id_user = :id',
            [':id' => Session::getInstance()->doubleRead('connected', 'id_user')])->fetch();
        Session::getInstance()->write('guide', $guide);
        App::redirect('account.php');
    }
    
    public function deconnexion ()
    {
        $this->session->delete('connected');
        $this->session->delete('guide');
    }
    
    public function view_profile ($db)
    {
        $v = null;
        if ($this->isLog()) {
            $v = $db->query('SELECT * FROM users left join guide on users.id_user = guide.id_user where users.id_user = :id;', [':id' => $_SESSION['connected']['id_user']])->fetch();
        }
        
        return $v;
    }
    
    public function isLog ()
    {
        if (!$this->session->read('connected')) {
            return false;
        }
        
        return $this->session->read('connected');
    }
    
    public function update_profile ($db, $field, $name_field)
    {
        if (!empty($_POST[$name_field])) {
            $db->query('UPDATE `users` SET ' . $field . ' = :val WHERE `id_user` = :id',
                [':val' => htmlspecialchars($_POST[$name_field]),
                    ':id' => $_SESSION['connected']['id_user']]);
            App::redirect('account.php');
        }
    }
    
    public function update_pass ($db, $pass)
    {
        if (!empty($_POST['password'])) {
            $db->query('UPDATE `users` SET `password`= :password WHERE `id_user` = :id',
                [':password' => password_hash($pass, PASSWORD_BCRYPT),
                    ':id' => $_SESSION['connected']['id_user']]);
            App::redirect('account.php');
        }
    }
    
    public function update_date ($db, $field, $name_field)
    {
        if (!empty($_POST[$name_field])) {
            $db->query('UPDATE `users` SET ' . $field . ' = STR_TO_DATE(:bd, "%Y-%m-%d") WHERE `id_user` = :id',
                [':bd' => $_POST[$name_field], ':id' => $_SESSION['connected']['id_user']]);
            App::redirect('account.php');
        }
    }
    
    public function confirm ($db, $id_user, $token)
    {
        $user = $db->query('SELECT * FROM users WHERE id_user = :id', [':id' => $id_user])->fetch();
        if ($user && $user['confirmation_token'] == $token) {
            $db->query('UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id_user = :id', [':id' => $id_user]);
            $this->session->write('connected', $user);
            
            return true;
        }
        
        return false;
    }
    
    public function reset_password ($db, $email)
    {
        $user = $db->query('SELECT * FROM users WHERE email = :email', [':email' => $email])->fetch();
        if ($user) {
            $reset_token = App::random(60);
            $user_id = $user['id_user'];
            $db->query('UPDATE users set reset_token = :reset, reset_at = NOW() WHERE id_user = :id',
                [':reset' => $reset_token, ':id' => $user_id]);
            mail($email, 'Réinitialisation de votre mot de passe', 'Afin de réinitialiser votre mot de passe <a target="_blank" href="BE-GUIDED/reset.php?id=' . $user_id . '&token=' . $reset_token . '">cliquez-ici.</a>');
            
            return $user;
        }
        
        return false;
    }
    
    public function checkReset ($db, $user_id, $token)
    {
        return $db->query('SELECT * FROM users WHERE id_user = :id AND reset_token = :token AND reset_at < DATE_SUB(NOW(), INTERVAL 30 MINUTE )',
            [':id' => $user_id, ':token' => $token])->fetch();
    }
}
