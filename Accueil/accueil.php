<?php
  session_start();

  include '../functions.php';
  $conn = dbConnect();

  if (isset($_POST["submit"])) {
    $str = $_POST["search"];
    $statement = $conn->prepare("SELECT nom,prenom,telephone,specialite FROM PRACTICIEN WHERE nom LIKE :search");
    $searchValue = '%' . $str . '%';

    $statement->bindParam(':search', $searchValue, PDO::PARAM_STR);
    $statement->setFetchMode(PDO:: FETCH_OBJ);
    $statement -> execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

  $nombreColonnes = count($result);
  // Initialisez une variable pour stocker le HTML généré
  $html = '<div class="row">';
  
  // Boucle pour générer les colonnes
  for ($i = 0; $i < $nombreColonnes; $i++) {
      $html .= '<div class="col">';
      
      // Boucle pour générer les parties de chaque colonne
      $html .= '<div class="col-part">'.$result[$i]['nom'].'</div>';

      $html .= '<div class="col-part">'.$result[$i]['prenom'].'</div>';
      $html .= '<div class="col-part">'.$result[$i]['telephone'].'</div>';
      $html .= '<div class="col-part">'.$result[$i]['specialite'].'</div>';
  
      $html .= '</div>';
  }

  
  // Ajoutez la fermeture de la classe "row"
  $html .= '</div>';

}

  /*
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $result;

    //PISTE POUR AJOUTER LES PRACTICIENS AVEC LE BON AFFICHAGE
    $add_nom = '<div class="col-part nom">';
      $add_nom .= $result[$i]['nom'];
      $add_nom .= '</div>';


  
    $statement->setFetchMode(PDO:: FETCH_OBJ);
    $statement -> execute();

    echo print_r($sth->fetch());
  
 
  $res = $conn->query("INSERT INTO PATIENT values ('nathan@gadbin.com', 'Nathan', 'GADBIN', '0707070708', 'network')");

  $res = $conn->query("INSERT INTO PRACTICIEN values ('nathan@gadbin.com', 'Nathan', 'GADBIN', '0707070708', 'SMDD', 'Generaliste', 'network')");
  $res = $conn->query("INSERT INTO PRACTICIEN values ('hermann@gadbin.com', 'Hermann', 'GADBIN', '0707070708', 'SMDD', 'Generaliste', 'network')");
  $res = $conn->query("INSERT INTO PRACTICIEN values ('natalie@gadbin.com', 'Natalie', 'GADBIN', '0707070708', 'SMDD', 'Generaliste', 'network')");
  $res = $conn->query("INSERT INTO PRACTICIEN values ('nathaniel@gadbin.com', 'Nathaniel', 'GADBIN', '0707070708', 'SMDD', 'Generaliste', 'network')");

  if($res) {
    echo "ca marche";
  } else {
    echo 'non';
    echo $conn->error;
  }

  // Mettre if isset tout en haut du document



// INSERT fonctionne mais vu qu'on ajoute à chaque reload ça bug car la même adresse mail est ajoutée.
 */
 ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
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
                  <a class="navbar-brand" href="http://localhost/Code/doctolib/Accueil/accueil.php">Accueil</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <form method="post" id="form">
                    <input type="text" name="search" class="textInput">
                    <input type="submit" name="submit" class="textSubmit">
                  </form>

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

          <div class="global-container">
            <div class="container text-center">
              <div class="row">
          
              </div>
            </div>
          </div>

        </main>

        <footer>

        </footer>

    </body>
</html>