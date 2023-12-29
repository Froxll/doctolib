<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <title> index </title>
        <link href="rdv.css" rel="stylesheet">
        <link href="../header.css" rel="stylesheet">
    </head>
    <body>

        <header>

            <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
                <div class="container-fluid">
                  <a class="navbar-brand" href="../Accueil/accueil.php">Accueil</a>
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
                        <a class="nav-link active" aria-current="page" href="#">Mes RDV</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../Connexion/connexion.php">Connexion</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>

        </header>

        <main>

          <div id="section1">
            <br>
            <h2>Rendez-vous en cours</h2>
          </div>
          
          <div class="vr"></div>

          <div id="section2">
            <br>
            <h2>Rendez vous passés</h2>
          </div>

        </main>

        <footer>

        </footer>

    </body>
</html>