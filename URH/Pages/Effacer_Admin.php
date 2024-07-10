<?php
include "Connexion.php";
$codeAdmin = $_GET["codeAdmin"];
$requete = "DELETE FROM `admin` WHERE codeAdmin = $codeAdmin";
$result = mysqli_query($conn, $requete);

if ($result) {
  header("Location: Gestion_Admin.php?msg=Enregistrement effacer avec succės");
} else {
  echo "Failed: " . mysqli_error($conn);
}
