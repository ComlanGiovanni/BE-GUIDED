<?php
require_once 'php/load.php';
$db = App::getDatabase();
$user = App::getUser();
$user->restrict();
$v = $user->view_profile($db);
if (!empty($_FILES)) {
    $user->update_img($db, "img_profil", "profil");
}
if (!empty($_POST)) {
    $user->update_profile($db, "lastname", "lastname");
    $user->update_profile($db, "firstname", "firstname");
    $user->update_profile($db, "email", "email");
    $user->update_date($db, "birthday_date", "bd");
    $user->update_profile_guide($db, "num_mobile", "mobile");
    $user->update_profile_guide($db, "city", "city");
    $user->update_profile_guide($db, "postal_code", "postal_code");
    $user->update_profile_guide($db, "address", "address");
    $user->update_profile_guide($db, "languages", "languages");
    $user->update_profile_guide($db, "hobbies", "hobbies");
    $user->update_profile_guide($db, "other_info", "other_info");
    $user->update_pass($db, "password");
    App::redirect('account.php');
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=0.5, maximum-scale=2.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css">
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Poppins" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/flash.css">
    <link href="css/account.css" rel="stylesheet">

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation -->
<a href="javascript:document.location.href='#myModal'"></a>
<?php include 'php/nav.php'; ?>
<div class="container cont">
    <h1 class="hprofil"><i class="fa fa-info-circle" aria-hidden="true"></i> Mon Profil</h1>
    <hr>
    <br>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <?php
                echo '<img src="users/user_' . Session::getInstance()->doubleRead('connected', 'id_user') . '/' . Session::getInstance()->doubleRead('connected', 'img_profil') . '" width="100px" height="100px" class="avatar img-circle" alt="avatar">';
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <input name="profil" type="file" class="form-control">
                    <button type="submit">envoyer</button>
                </form>
            </div>
            <?php if ($v['confirmed_at'] != null) : ?>
                <div>
                    <p style="color: #12b118;">Votre compte est validé.</p>
                </div>
            <?php else: ?>
                <div>
                    <p style="color: #ac2925">Votre compte n'est pas validé</p>
                    <a href="resend_confirm.php">Me renvoyer un email de confimation.</a>
                </div>
            <?php endif; ?>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3>Informations personnelles</h3>

            <form action="" method="post" class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nom:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="lastname" type="text" value="<?= $v['lastname']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Prénom:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="firstname" type="text" value="<?= $v['firstname']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="email" type="text" value="<?= $v['email']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Date de naissance:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="date" name="bd" value="<?= $v['birthday_date']; ?>">
                    </div>
                </div>
                <?php if (Session::getInstance()->read('guide')) : ?>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Mobile:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="mobile" type="text" value="<?= $v['num_mobile']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Ville:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="city" type="text" value="<?= $v['city']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Code postal:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="cdp" type="text" value="<?= $v['postal_code']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Adresse:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="address" type="text" value="<?= $v['address']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Langue:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="languages" type="text" value="<?= $v['languages']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Centres d'intérêts:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="hobbies" type="text" value="<?= $v['hobbies']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Experience:</label>
                        <div class="col-lg-8">
                            <textarea name="other_info" class="form-control" cols="30"
                                      rows="3"><?= $v['other_info']; ?></textarea>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Mot de passe:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="password" name="password" placeholder="Nouveau Mot de Passe">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Confirmation:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="password" name="password_confirm"
                               placeholder="Confirmation Nouveau Mot de Passe">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label"></label>
                    <div class="col-lg-8">
                        <input type="submit" class="btn btn-primary" value="Sauvegarder">
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Annuler">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php include 'php/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/public/js/bootstrap/3.3.5/bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Fin footer -->
<!-- jQuery -->
<script src="vendor/jquery/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Fin footer -->
<a href="#page-top" title="Haut de page" class="scrollup"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
<!-- jQuery -->
<script src="vendor/jquery/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

<!-- Theme JavaScript -->

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<!-- Theme JavaScript -->
<script src="js/project.min.js"></script>

</body>
</html>
