<?php

function ajoutRdvInfo(){
  $htmlReturned = "";
  $htmlReturned .= "Ceci est un test ";
  


  return $htmlReturned;
}

$html = '<div class="row">';    //On stock le html que l'on veut ajouter dans cette variable

  include '../functions.php';

  $conn = dbConnect();

  if (isset($_POST["submit"])) {
    $str = $_POST["search"];
    $statement_name = $conn->prepare("SELECT nom,prenom,telephone,specialite FROM PRACTICIEN WHERE nom LIKE :search OR specialite LIKE :search");
    $searchValue = '%' . $str . '%';

    $statement_name->bindParam(':search', $searchValue, PDO::PARAM_STR);
    $statement_name->setFetchMode(PDO:: FETCH_OBJ);
    $statement_name -> execute();
    $result_name = $statement_name->fetchAll(PDO::FETCH_ASSOC);

    
    $nombreColonnes = count($result_name);
  
  // Boucle pour générer les colonnes
  for ($i = 0; $i < $nombreColonnes; $i++) {
      $html .= '<div class="col">';
      
      // Boucle pour générer les parties de chaque colonne
      $html .= '<div class="col-part">'.$result_name[$i]['nom'].'</div>';

      $html .= '<div class="col-part">'.$result_name[$i]['prenom'].'</div>';
      $html .= '<div class="col-part">'.$result_name[$i]['telephone'].'</div>';
      $html .= '<div class="col-part">'.$result_name[$i]['specialite'].'</div>';
      $html .= '<span class="material-symbols-outlined" onclick="openModal()">calendar_month</span>';
      $html .= '<div id="modal">';
      $html .= '<div id="modal-content">';

      $html .= ajoutRdvInfo();

      $html .= '<div id="close" onclick="closeModal()">&times;</div>'; 
      $html .= '</div>';
      $html .= '</div>';
      $html .= '</div>';
  }

  
  // Ajoutez la fermeture de la classe "row"
  $html .= '</div>';

}

/*
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $result;

  $res = $conn->query("INSERT INTO PATIENT values ('nathan@gadbin.com', 'Nathan', 'GADBIN', '0707070708', 'network')");

  $res = $conn->query("DELETE FROM PRACTICIEN WHERE nom = 'Nathan'");
  $res = $conn->query("DELETE FROM PRACTICIEN WHERE nom = 'Hermann'");
  $res = $conn->query("DELETE FROM PRACTICIEN WHERE nom = 'Natalie'");
  $res = $conn->query("DELETE FROM PRACTICIEN WHERE nom = 'Nathaniel'");

  $res = $conn->query("INSERT INTO PRACTICIEN values ('nathan@gadbin.com', 'Nathan', 'GADBIN', '0707070708', 'SMDD', 'Generaliste', 'network')");
  $res = $conn->query("INSERT INTO PRACTICIEN values ('hermann@gadbin.com', 'Hermann', 'GADBIN', '0707070708', 'SMDD', 'Podologue', 'network')");
  $res = $conn->query("INSERT INTO PRACTICIEN values ('natalie@gadbin.com', 'Natalie', 'GADBIN', '0707070708', 'SMDD', 'Dermatologue', 'network')");
  $res = $conn->query("INSERT INTO PRACTICIEN values ('nathaniel@gadbin.com', 'Nathaniel', 'GADBIN', '0707070708', 'SMDD', 'Psychologue', 'network')");

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
        <script src="accueil.js" defer></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
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

                  <form method="post" id="form">
                    <input type="text" name="search" class="textInput">
                    <input type="submit" name="submit" class="textSubmit">
                  </form>

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

          <div class="global-container">
            <div class="container text-center">
              <div class="row">

                <?php
                  echo $html;
                ?>

                
          
              </div>
            </div>
          </div>

          

        </main>

        <footer>

        </footer>

    </body>
</html>

