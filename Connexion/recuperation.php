<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "mail : ".$POST['mail']."<br>"."mdp : ".$POST['mdp'];
}
?>