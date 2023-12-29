<?php
    session_start();
    if(!$_SESSION['mail']){
        header('Location: ../connexion.php');
    }
    else{
        $_SESSION = array();
        session_destroy();
        header('Location: ../../Accueil/accueil.php');
    }

?>