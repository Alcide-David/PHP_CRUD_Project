<?php
include "Connexion.php";

if (isset($_POST["submit"])) {
    $codeInscription = $_POST['codeInscription'];
    $montant = $_POST['montant'];
    $date = $_POST['date'];
 
    $requete = "INSERT INTO `paiement`(`codeInscription`, `montant`, `date`) VALUES ('$codeInscription','$montant','$date')";
    
    $result = mysqli_query($conn, $requete);

    if ($result) {
      header("Location: Liste_Paiements.php?msg=Insertion effectuer avec suucces");
    } else {
      echo "Echoue : " . mysqli_error($conn);
    }
}

?>