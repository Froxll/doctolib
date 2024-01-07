<?php

    function annulerdv(){
        if(isset($_POST["annulerRDV"])){
            $selectedID = $_POST["submitID"];
        
            $conn = dbConnect();
            
            $res = $conn->query("DELETE FROM RDV WHERE id = '$selectedID'");
        
          }
    }

    function affichagerdv_encours(){
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
    }

    function affichagerdv_passés(){
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
    }
?>