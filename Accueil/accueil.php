<?php
/*
  include '../functions.php';

  $conn = dbConnect();

  $res = $conn->query("INSERT INTO PATIENT values ('nathan@gadbin.com', 'Nathan', 'GADBIN', '0707070708', 'network')");

  if($res) {
    echo "ca marche";
  } else {
    echo 'non';
    echo $conn->error;
  }

  // Mettre if isset tout en haut du document

  echo("test")
*/

// INSERT fonctionne mais vu qu'on ajoute à chaque reload ça bug car la même adresse mail est ajoutée.

 ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <title> Accueil </title>
        <link href="accueil.css" rel="stylesheet">
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
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../RDV/rdv.php">Mes RDV</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../Connexion/connexion.php">Se connectera</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>

        </header>

        <main>

        </main>

        <footer>

        </footer>

    </body>
</html>