<?php
  include '../functions.php';

  $conn = dbConnect();


 ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <title> Connexion </title>
        <link href="connexion.css" rel="stylesheet">
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
                    <a class="nav-link" href="../Connexion/connexion.php">Se connecter</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

        </header>

        <main>
            <div id="formulaire">   
                <select class="form-select" aria-label="Default select example">
                    <option selected="">Vous êtes ?</option>
                    <option value="Patient">Patient</option>
                    <option value="Praticien">Praticien</option>
                </select>
                <br>
                <form action="recuperation.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input name='mail' type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name='mdp' type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
                </form>
                <div id="inscription">
                    <a>Créez un compte :</a>
                    <a class="type" href="/InscriptionPatient/inscriptionpatient.css">Patient</a>
                    <a> / </a>
                    <a class="type" href="/InscriptionPracticien/inscriptionpracticien.css">Praticien</a>
                </div>    
            </div>
        </main>

        <footer>

        </footer>

    </body>
</html>