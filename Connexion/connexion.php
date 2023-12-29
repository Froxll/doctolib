<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <title> Connexion </title>
        <link href="http://localhost/Code/doctolib/header.css" rel="stylesheet">
        <link href="connexion.css" rel="stylesheet">
    </head>
    <body>

        <header>

            <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
                <div class="container-fluid">
                  <a class="navbar-brand" href="http://localhost/Code/doctolib/Accueil/accueil.php">Accueil</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="ID">
                    <?php
                      if(isset($_SESSION['mail'])){
                        echo strtoupper($_SESSION['prenom']).' '.strtoupper($_SESSION['nom']).' '.'<img src="../bulle.png">';
                      }
                    ?>
                  </div>
                  
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://localhost/Code/doctolib/RDV/rdv.php">Mes RDV</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Code/doctolib/Connexion/connexion.php">Connexion</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>

        </header>

        <main>
            <div id="connexion">
                <form method="POST" align="center">
                    <a href="http://localhost/Code/doctolib/Connexion/SeConnecter/seconnecter.php">Se connecter</a>
                    <a href="http://localhost/Code/doctolib/Connexion/Inscription/inscription.php">S'inscrire</a>
                    <a href="http://localhost/Code/doctolib/Connexion/Deconnexion/deconnexion.php" id="deconnexion">Se déconnecter</a>
                </form>
            </div>
        </main>

        <footer>
        </footer>
    </body>
</html>