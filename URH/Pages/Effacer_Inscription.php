<?php
include "Connexion.php";
$codeInscription = $_GET["codeInscription"];
$requete = "DELETE FROM `inscription` WHERE codeInscription = $codeInscription";
$result = mysqli_query($conn, $requete);

if ($result) {
  header("Location: Liste_Inscriptions.php?msg=Enregistrement effacer avec succės");
} else {
  echo "Failed: " . mysqli_error($conn);
}
