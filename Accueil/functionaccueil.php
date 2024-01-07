<?php
    function ajoutRdvInfo($SearchMailPracticien){

        $conn = dbConnect();
      
        $BDDRDV = $conn->prepare("SELECT horaire,date FROM RDV WHERE mail_1 LIKE :SearchMailPracticien");
      
        $BDDRDV->bindParam(':SearchMailPracticien', $SearchMailPracticien, PDO::PARAM_STR);
        $BDDRDV->setFetchMode(PDO::FETCH_ASSOC); 
        $BDDRDV->execute();
      
        $PracticienRdvInfo = $BDDRDV->fetchAll();
      
        return $PracticienRdvInfo;
      }
?>