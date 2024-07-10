<?php
include "Connexion.php";
$idPaiement = $_GET["idPaiement"];
$requete = "DELETE FROM `paiement` WHERE idPaiement = $idPaiement";
$result = mysqli_query($conn, $requete);

if ($result) {
  header("Location: Liste_Paiements.php?msg=Enregistrement effacer avec succės");
} else {
  echo "Failed: " . mysqli_error($conn);
}
