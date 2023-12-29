<?php
  session_start();

  if(isset($_SESSION['mail'])) {
    header('Location: http://localhost/Code/doctolib/Connexion/connexion.php');
  }

  include '../../functions.php';
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
        <link href="seconnecter.css" rel="stylesheet">
        <link href="../../header.css" rel="stylesheet">
    </head>
    <body>

        <header>

          <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="../../Accueil/accueil.php">Accueil</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../../RDV/rdv.php">Mes RDV</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../Connexion/connexion.php">Connexion</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

        </header>

        <main>
            <div id="formulaire">   
              <form method="post" align="center">
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="inlineRadioOptions"
                    id="inlineRadio1"
                    value="option1"
                  />
                  <label class="form-check-label" for="inlineRadio1">Patient</label>
                </div>

                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="inlineRadioOptions"
                    id="inlineRadio2"
                    value="option2"
                  />
                  <label class="form-check-label" for="inlineRadio2">Praticien</label>
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Adresse mail</label>
                    <input name='mail' type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete='off'>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                    <input name='mdp' type="password" class="form-control" id="exampleInputPassword1" autocomplete='off'>
                </div>
                <button type="submit" class="btn btn-primary" name='envoie'>Se connecter</button>
                <div id="error">
                  <?php
                      if(isset($_POST['envoie'])){
                          // Vérifications que tous les champs soient remplis
                          if(!empty($_POST['inlineRadioOptions']) AND !empty($_POST['mail']) AND !empty($_POST['mdp'])){
                            // Récupération des valeurs des champs
                            $type = $_POST['inlineRadioOptions'];
                            $mail = $_POST['mail'];
                            $mdp_post = $_POST['mdp']; // Ne pas hasher le mot de passe ici

                            // Préparation de la requête 
                            $recupUser = $conn->prepare("SELECT nom, prenom, mdp FROM patient WHERE mail = ?");
                            $recupUser->execute(array($mail));

                            // Vérifier si l'utilisateur existe
                            if($recupUser->rowCount() > 0){
                              // Récupérer les données dans la BDD
                              $userData = $recupUser->fetch(PDO::FETCH_ASSOC);

                              // Vérifier le mot de passe
                              if(password_verify($mdp_post, $userData['mdp'])){
                                // Mot de passe correct, définir les variables de session
                                $_SESSION['nom'] = $userData['nom'];
                                $_SESSION['prenom'] = $userData['prenom'];
                                $_SESSION['mail'] = $mail;

                                // Rediriger vers la page d'accueil
                                header('Location: ../../Accueil/accueil.php');
                              } else {
                                echo "Votre mot de passe est incorrect";
                              }
                            } else {
                              echo "Adresse e-mail incorrecte";
                            }
                          } else {
                            echo "Veuillez compléter tous les champs";
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