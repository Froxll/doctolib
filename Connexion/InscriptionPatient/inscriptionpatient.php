<?php
  include '../../functions.php';

  $conn = dbConnect();


 ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <title> Inscription Patient </title>
        <link href="../../header.css" rel="stylesheet">
        <link href="Connexion/InscriptionPatient/inscriptionpatient.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
      </head>
    <body>

        <header>

            <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">Accueil</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Mes RDV</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Se connecter</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>

        </header>

        <main>
        <form class="row g-3">
      <div class="col-md-6">
        <input type="text" class="form-control" id="inputEmail4"  placeholder="Prénom">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" id="inputPassword4"  placeholder="Nom">
      </div>
      <div class="col-12">
        <input type="text" class="form-control" id="inputAddress" placeholder="Numéro de téléphone">
      </div>
      <div class="col-md-6">
        <input type="email" class="form-control" id="inputEmail4"  placeholder="Adresse mail">
      </div>
      <div class="col-md-6">
        <input type="password" class="form-control" id="inputPassword4"  placeholder="Mot de passe">
      </div>

    
      <div class="col-12">
        <button type="submit" class="btn btn-primary">S'inscrire</button>
      </div>
    </form>
        </main>


        <footer>

        </footer>

    </body>
</html>