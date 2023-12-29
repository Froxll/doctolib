<?php
  session_start();

  if(isset($_SESSION['mail'])) {
    header('Location: http://localhost/Code/doctolib/Connexion/connexion.php');
  }

  include '../../../functions.php';
  $conn = dbConnect();
 ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <title> Inscription Practicien </title>
        <link href="../../../header.css" rel="stylesheet">
        <link href="inscriptionpatient.css" rel="stylesheet">
    </head>
    <body>

        <header>

            <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
                <div class="container-fluid">
                  <a class="navbar-brand" href="../../../Accueil/accueil.php">Accueil</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../../RDV/rdv.php">Mes RDV</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../../connexion.php">Connexion</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>

        </header>

        <main>
          <div id="formulaire">
            <form class="row g-3" method="POST" align="center">
              <div class="col-md-6">
                <input name='prenom' type="text" class="form-control" id="inputEmail4"  placeholder="Prénom">
              </div>
              <div class="col-md-6">
                <input  name='nom' type="text" class="form-control" id="inputPassword4"  placeholder="Nom">
              </div>
              <div class="col-12">
                <input  name='numero' type="text" class="form-control" id="inputAddress" placeholder="Numéro de téléphone">
              </div>
              <div class="col-md-6">
                <input name='mail' type="email" class="form-control" id="inputEmail4"  placeholder="Adresse mail">
              </div>
              <div class="col-md-6">
                <input name='mdp' type="password" class="form-control" id="inputPassword4"  placeholder="Mot de passe">
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary" name='envoie'>S'inscrire</button>
              </div>

            <div id="error">

              <?php
                if(isset($_POST['envoie'])){
                  if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['numero']) AND !empty($_POST['mail']) AND !empty($_POST['mdp'])){
                      $prenom = $_POST['prenom'];
                      $nom = $_POST['nom'];
                      $numero = $_POST['numero'];
                      $mail = $_POST['mail'];
                      $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                      //vérif si la personne est déja enregistré
                      $verifUser = $conn->prepare("SELECT nom,prenom FROM patient WHERE mail = ?");
                      $verifUser->execute(array($mail));
                      if($verifUser->rowCount() > 0){
                        echo "Il éxiste déja un mail enregistré";
                      }
                      else{
                      //ajout dans la BDD
                        $insertUser = $conn->prepare("INSERT INTO patient(mail,nom,prenom,telephone,mdp)VALUES(?, ? ,? ,? ,?)");
                        $insertUser->execute(array($mail,$nom,$prenom,$numero,$mdp));
                        header('Location: ../../SeConnecter/seconnecter.php');
                      }
                  }
                  else{
                    echo "Veuillez completer tout les champs";
                  }
                }
              ?>
              
            </div>

            </form>
          </div>
        </main>

        <footer>
        </footer>
    </body>
</html>