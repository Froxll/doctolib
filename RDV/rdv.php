<?php
  session_start();

  include '../functions.php';

  if(isset($_POST["annulerRDV"])){
    $selectedID = $_POST["submitID"];

    $conn = dbConnect();
    
    $res = $conn->query("DELETE FROM RDV WHERE id = '$selectedID'");

  }

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

          <?php 
          if(isset($_SESSION['mail'])){
          ?>
            <div id="section1">
              <br>
              <h2>Rendez-vous en cours</h2>

              <?php
                $conn = dbConnect();

                $userMail = $_SESSION['mail'];

                $showRDV = $conn->prepare("SELECT horaire,date,mail_1,id FROM RDV WHERE mail_2 LIKE '$userMail'");
              
                $showRDV->setFetchMode(PDO::FETCH_ASSOC); 
                $showRDV->execute();
                
                //récuperer ici les rdv du patient connecté puis les afficher
                $patientRdvInfo = $showRDV->fetchAll();

                date_default_timezone_set('Europe/Paris');
                $today = new DateTime();
                $todayDateFormat = $today->format('d/m/Y');
                $todayHoraireFormat = $today->format('H:i');


                $j=0;
                for($i=0; $i<count($patientRdvInfo); $i++){
                  if(strtotime($patientRdvInfo[$i]['date']) < strtotime($todayDateFormat) && $patientRdvInfo[$i]['horaire'] > $todayHoraireFormat){
                    $j=$j;
                  }
                  else{
                    $j+=1;
                    echo "<h5>Rendez vous n°".$j." :</h5> Le ".$patientRdvInfo[$i]['date']." à ".$patientRdvInfo[$i]['horaire']." avec le docteur présentant l'adresse mail suivante : ".$patientRdvInfo[$i]['mail_1'].'<br>';
                    ?>
                      <form method='post'>
                        <input type='submit' value="Annuler rendez-vous" name='annulerRDV'></input>
                        <input type="hidden" value='<?= $patientRdvInfo[$i]['id'] ?>' name="submitID">
                      </form>
                    <?php
                  }
                }

              ?>
            </div>
            
            <div class="vr"></div>

            <div id="section2">
              <br>
              <h2>Rendez vous passés</h2>

              <?php
                $conn = dbConnect();

                $userMail = $_SESSION['mail'];

                $showRDV = $conn->prepare("SELECT horaire,date,mail_1 FROM RDV WHERE mail_2 LIKE '$userMail'");
              
                $showRDV->setFetchMode(PDO::FETCH_ASSOC); 
                $showRDV->execute();
                
                //récuperer ici les rdv du patient connecté puis les afficher
                $patientRdvInfo = $showRDV->fetchAll();

                date_default_timezone_set('Europe/Paris');
                $today = new DateTime();
                $todayDateFormat = $today->format('d/m/Y');
                $todayHoraireFormat = $today->format('H:i');


                $j=0;
                for($i=0; $i<count($patientRdvInfo); $i++){
                  if(strtotime($patientRdvInfo[$i]['date']) < strtotime($todayDateFormat) && $patientRdvInfo[$i]['horaire'] > $todayHoraireFormat){
                    $j+=1;
                    echo "<h5>Rendez vous n°".$j." :</h5> Le ".$patientRdvInfo[$i]['date']." à ".$patientRdvInfo[$i]['horaire']." avec le docteur présentant l'adresse mail suivante : ".$patientRdvInfo[$i]['mail_1'].'<br>';
                  }
                  else{
                    $j=$j;
                  }
                }
                
              ?>

            </div>
            
            <?php
          }
          else{
            //Il faut faire en sorte que le practicien puisse voir ses RDV (démarrer une session lors de la connexion practicien et vérifier dans la BDD si la session en cours est un patient ou un practicien)
            echo '<h2>Veuillez vous connecter à votre compte pour voir vos rendez-vous.</h2>';
          }
            
          ?>
        </main>

        <footer>

        </footer>

    </body>
</html>