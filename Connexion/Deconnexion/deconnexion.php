<?php
    session_start();
    if(!$_SESSION['mail']){
        header('Location: http://localhost/Code/doctolib/Connexion/connexion.php');
    }
    else{
        $_SESSION = array();
        session_destroy();
        header('Location: http://localhost/Code/doctolib/Accueil/accueil.php');
    }

?>