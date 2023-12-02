<?php
  include '../functions.php';

  $conn = dbConnect();

  $res = $conn->query("INSERT INTO PATIENT values ('alexis@gadbin.com', 'Alexis', 'Gadbin', '0707070707', 'network')");

  if($res) {
    echo "ca marche";
  } else {
    echo 'non';
    echo $conn->error;
  }

  // Mettre if isset tout en haut du document

  echo("test")
 ?>