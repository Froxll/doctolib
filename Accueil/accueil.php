<?php

session_start();

include '../functions.php';

$conn = dbConnect();

function ajoutRdvInfo($SearchMailPracticien){

  $conn = dbConnect();

  $BDDRDV = $conn->prepare("SELECT horaire,date FROM RDV WHERE mail_1 LIKE :SearchMailPracticien");

  $BDDRDV->bindParam(':SearchMailPracticien', $SearchMailPracticien, PDO::PARAM_STR);
  $BDDRDV->setFetchMode(PDO::FETCH_ASSOC); 
  $BDDRDV->execute();

  $PracticienRdvInfo = $BDDRDV->fetchAll();

  return $PracticienRdvInfo;
}

$idRDV = 128;

/*
$html = '<div class="row">';    //On stock le html que l'on veut ajouter dans cette variable


if (isset($_POST["submit"])) {
  $str = $_POST["search"];
  $statement_name = $conn->prepare("SELECT nom,prenom,telephone,specialite,mail FROM PRACTICIEN WHERE nom LIKE :search OR specialite LIKE :search");
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

      $info = ajoutRdvInfo($result_name[$i]['mail']);
      
      $html .= "<form method='post'>";
      $html .= "<input type='submit' value='Prendre un RDV' name='submitCalendar'></input>";
      //$html .= "<span type='submit' class='material-symbols-outlined' name='submitCalendar'>calendar_month</span>";
      $html .= "</form>";
      
      $html .= '</div>';
  }
  // Ajoutez la fermeture de la classe "row"
  $html .= '</div>';
}
*/


/*
  $id_rdv = 60;
  $date = '01/01/2024';
  $mail_practicien = 'nathan@gadbin.com';
  // 9h/12h puis 14h/18h
  $plagesHoraires = array(
    array("debut" => 10, "fin" => 11),
    array("debut" => 14, "fin" => 18)
  );

  foreach ($plagesHoraires as $plage) {
    $debut = $plage["debut"];
    $fin = $plage["fin"];

    for ($heure = $debut; $heure < $fin; $heure++) {
        for ($minute = 0; $minute < 60; $minute += 30) {
            
            $heureFormattee = str_pad($heure, 2, "0", STR_PAD_LEFT);
            $minuteFormattee = str_pad($minute, 2, "0", STR_PAD_LEFT);

            
            $horaire = "$heureFormattee:$minuteFormattee";

            $res = $conn->query("INSERT INTO RDV values ('$id_rdv','$date','$horaire','$mail_practicien','nathan@gadbin.com')");
            $id_rdv+=1;

            
          }
        }
      }

*/

//$res = $conn->query("DELETE FROM RDV WHERE date = '03/01/2024'");

//$res = $conn->query("INSERT INTO RDV values ('4','02/01/2024','16:30','natalie@gadbin.com','nathan@gadbin.com')")


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
                  <a class="navbar-brand" href="accueil.php">Accueil</a>
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
                      if(isset($_SESSION['mail_p'])){
                        echo strtoupper($_SESSION['prenom']).' '.strtoupper($_SESSION['nom']).' '.'<img id="med" src="../med.png">';
                      }
                    ?>
                  </div>

                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../RDV/rdv.php">Mes RDV</a>
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
          
          <div class="global-container">
            <div class="container text-center">
              <div class="row">


                <?php
                if (isset($_POST["submit"])) {
                  
                    $str = $_POST["search"];
                    $statement_name = $conn->prepare("SELECT nom, prenom, telephone, specialite, mail FROM PRACTICIEN WHERE nom LIKE :search OR specialite LIKE :search");
                    $searchValue = '%' . $str . '%';

                    $statement_name->bindParam(':search', $searchValue, PDO::PARAM_STR);
                    $statement_name->setFetchMode(PDO::FETCH_OBJ);
                    $statement_name->execute();
                    $result_name = $statement_name->fetchAll(PDO::FETCH_ASSOC);

                    $nombreColonnes = count($result_name);

                    for ($i = 0; $i < $nombreColonnes; $i++) {
                        $practitioner = $result_name[$i];
                        ?>
                        <div class="col">
                            <div class="col-part"><?= $practitioner['nom'] ?></div>
                            <div class="col-part"><?= $practitioner['prenom'] ?></div>
                            <div class="col-part"><?= $practitioner['telephone'] ?></div>
                            <div class="col-part"><?= $practitioner['specialite'] ?></div>

                            <form method='post'>
                                <input type='hidden' name='selectedEmail' value='<?= $practitioner['mail'] ?>'>
                                <input type='submit' value='Prendre un RDV' name='submitCalendar'></input>
                                <!-- <span type='submit' class='material-symbols-outlined' name='submitCalendar'>calendar_month</span> -->
                            </form>
                        </div>
                        <?php
                    }   
                }


                if(isset($_POST["submitCalendar"])){

                  
                  $arrayHoraireFixe = array('09:00','09:30','10:00','10:30','11:00','11:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30');

                  $selectedEmail = $_POST["selectedEmail"];
                  $info = json_encode(ajoutRdvInfo($selectedEmail));

                  $horairesArray = json_decode($info, true);
                  $today = new DateTime();

                  //print_r($horairesArray);          //while $i < count($horairesArray);
                                                      //echo count($horairesArray);

                  $present = true;                    //true si l'horaire affichée est présente dans la bdd (hoarire prise) RDV false sinon (disponible)

                  $tabArray = array();
                  $MAX = count($horairesArray)-1;
                  
                  if(count($horairesArray) != 0){
                   
                    for($i=0; $i<7; $i++){

                      if($i*14 < $MAX){
                        $varIndexDate = $i*14;
                      }
                      else{
                        $varIndexDate = $MAX;
                      }
                      array_push($tabArray, $horairesArray[$varIndexDate]['date']);
                      $tabArray = array_unique($tabArray);
                      //$tabArray contient les dates à laquelle des rendez-vous sont pris (seulement la date du jour)
                      
                      ?>

                      <div id="globalHoraire">

                      <?php
                      
                      
                      $todayGoodFormat = $today->format('d/m/Y');
                      echo $todayGoodFormat;

                      for($j=0; $j<14; $j++){


                        $horaireActuel = $arrayHoraireFixe[$j];
                        $present = false;

                        // Format de la date et de l'heure actuelles
                        $dateHeureActuelles = $today->format('d/m/Y') . ' ' . $horaireActuel;

                        // Vérifier si la date et l'heure actuelles sont prises
                        foreach ($horairesArray as $rdv) {
                            if ($rdv['date'] == $today->format('d/m/Y') && $rdv['horaire'] == $horaireActuel) {
                                $present = true;
                                break;
                            }
                        }


                        
                        if($present == true){
                          ?>
                            <form method='post'>
                              <input type='submit' value='<?= $arrayHoraireFixe[$j] ?>' name='submitHoraire' id='CSSHorairePrise'></input>
                              <input type="hidden" value='<?= $todayGoodFormat ?>' name="submitDate" >
                              <input type="hidden" value='<?=  $selectedEmail ?>' name="submitMail" >
                            </form>
                          <?php
                        }
                        else{
                          ?>
                            <form method='post'>
                              <input type='submit' value='<?= $arrayHoraireFixe[$j] ?>' name='submitHoraire' id='CSSHoraireLibre'></input>
                              <input type="hidden" value='<?= $todayGoodFormat ?>' name="submitDate">
                              <input type="hidden" value='<?=  $selectedEmail ?>' name="submitMail" >
                            </form>
                          <?php
                        }

                      }

                      $today->add(new DateInterval('P1D'));
                      

                      ?>

                      </div>

                    <?php

                    echo '<br>';

                    }

                  }
                  else{

                    for($i=0; $i<7; $i++){
                      
                      ?>

                      <div id="globalHoraire">

                      <?php
                      
                      
                      $todayGoodFormat = $today->format('d/m/Y');
                      echo $todayGoodFormat;

                      for($j=0; $j<14; $j++){


                        $horaireActuel = $arrayHoraireFixe[$j];
                        

                        // Format de la date et de l'heure actuelles
                        $dateHeureActuelles = $today->format('d/m/Y') . ' ' . $horaireActuel;
                        
                        
                        ?>
                          <form method='post'>
                            <input type='submit' value='<?= $arrayHoraireFixe[$j] ?>' name='submitHoraire' id='CSSHoraireLibre'></input>
                            <input type="hidden" value='<?= $todayGoodFormat ?>' name="submitDate">
                            <input type="hidden" value='<?=  $selectedEmail ?>' name="submitMail" >
                          </form>
                        <?php
                      

                      }

                      $today->add(new DateInterval('P1D'));
                      

                      ?>

                      </div>

                    <?php

                    echo '<br>';

                    }

                  }

                }

                if(isset($_POST["submitHoraire"])){

                  $res = $conn->query("SELECT MAX(id) FROM RDV");
                  $res->setFetchMode(PDO::FETCH_ASSOC); 
                  $res->execute();

                  $maxID = 1;

                  if ($res) {
                    $maxID = $res->fetchColumn() + 1;
                }
                echo $maxID;

                  $selectedHour = $_POST["submitHoraire"];
                  $selectedMail = $_POST["submitMail"];
                  $selectedDate = $_POST["submitDate"];
                  $res = $conn->query("INSERT INTO RDV values ('$maxID','$selectedDate','$selectedHour','$selectedMail','nathan@gadbin.com')");
                  //il faut juste changer 'nathan@gadbin.com' avec l'email du mec qui est connecté (session jsp quoi)
                }

                ?>
          
              </div>
            </div>
          </div>

          

        </main>

        <footer>

        </footer>

    </body>
</html>

