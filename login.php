<?php
session_start();

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

function invalidpw($name) {
  $message = 'Le mot de passe de l\'utilisateur '.$name.' est invalide.';
  echo $message;
}

function invalidlogin($name) {
  $message = 'L\'utilisateur '.$name.' n\'existe pas.';
  echo $message;
}

function emptypw() {
  $message = 'Aucun utilisateur soumis';
  echo $message;
}

$userinfo = array(
                'user1'=>'password1',
                'user2'=>'password2'
                );

if(isset($_GET['logout'])) {
    $_SESSION['username'] = '';
    header('Location:  ' . $_SERVER['PHP_SELF']);
}

foreach ($userinfo as $key => $val)
{
        if ((isset($_POST['username'])) && ($_POST['username'] == $key && $_POST['password'] == $val))
        {
                echo "you are ". $_POST['username'];
                $_SESSION['username'] = $_POST['username'];
        }
}

//if(array_key_exists($_POST['username'],$userinfo)) {
//      invalidpw($_POST['username']);
//}else {
//Invalid Login
//      invalidlogin($_POST['username']);
//      }
//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Login</title>
    </head>
    <body>
        <?php if($_SESSION['username']): ?>
            <p>Vous etes connecte en tant que <?=$_SESSION['username']?></p>
            <button onclick="window.location.href = '?logout=1';">Deconnexion</button>
        <?php endif; ?>
        <?php if(!$_SESSION['username']): ?>
        <form name="login" action="" method="post">
            Nom d'utilisateur:  <input type="text" name="username" value="" /><br />
            Mot de passe:  <input type="password" name="password" value="" /><br />
            <input type="submit" name="submit" value="Connexion" />
        </form>
        <?php endif; ?>
    </body>
</html>
