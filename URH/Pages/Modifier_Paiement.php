<?php
include "Connexion.php";
$idPaiement = $_GET["idPaiement"];

if (isset($_POST["submit"])) {
    $idPaiement = $_POST['idPaiement'];
    $montant = $_POST['montant'];
    $date = $_POST['date'];

  $requete = "UPDATE `paiement` SET `montant`='$montant',`date`='$date' WHERE idPaiement = $idPaiement ";

  $result = mysqli_query($conn, $requete);

  if ($result) {
    header("Location: Liste_Paiements.php?msg=Modification effectuer avec succės");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Lien bootstrap -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <!-- Lien font-awesome -->
  <link rel="stylesheet" type="text/css" href="../css/all.min.css">

  <title>Modification d'Inscription</title>
</head>

<body>

  <div class="container" style="margin-top:30px">
      <div class="text-center mb-4">
         <h3>Modification de paiement <i class="fa-solid fa-pen-to-square fs-5 me-3"></i></h3>
      </div>

      <?php
      $requete = "SELECT * FROM `paiement` WHERE idPaiement = $idPaiement LIMIT 1";
      $result = mysqli_query($conn, $requete);
      $row = mysqli_fetch_assoc($result);
      ?>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:80vw; min-width:700px;">

         <div class="text-center mb-4">
            <p class="text-muted"><i class="fas fa-list"></i> Information de la fiche </p>
         </div>

         <div class="text-center mb-4">
            <p class="text-muted"><i class="far fa-star"></i> Code du paiement et Code Inscription non modifiable</p>
         </div>
            
            <div class="row">
                <div class="col-auto">
                     <h5><i class="fa fa-link"></i>Code paiement</h5>
               </div>
              <div class="col-auto" style="width: 160px; margin-top:-27px; margin-left:-20px;" >
                  <div class="card-body" >
                     <input  class="form-control" name="idPaiement" style="background-color: #fff;" value="<?php echo $row['idPaiement'] ?>" readonly>
                  </div>
              </div>

               <div class="col-auto">
                     <h5><i class="fa fa-link"></i>Code Inscription</h5>
               </div>
              <div class="col-auto" style="width: 160px; margin-top:-27px; margin-left:-20px;" >
                  <div class="card-body" >
                     <input  class="form-control" name="codeInscription" style="background-color: #fff;" value="<?php echo $row['codeInscription'] ?>" readonly>
                  </div>
              </div>
          </div>

            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">montant</label>
                  <input type="text" class="form-control" name="montant" value="<?php echo $row['montant'] ?>" required>
               </div>

               <div class="col">
                  <label class="form-label">Date </label>
                  <input type="date" class="form-control" name="date" value="<?php echo $row['date'] ?>" required>
               </div>
            </div>

            <div class="text-center mb-4" style="margin-top:20px;">
               <button href="Liste_Paiements.php" class="btn btn-dark" name="submit">Enregistrer <i class="fa-regular fa-paper-plane"></i></button>
               <a href="Liste_Paiements.php" class="btn btn-danger">Annuler <i class="fa-solid fa-xmark"></i></a>
            </div>
         </form>
      </div>

  </div>

 
</body>

</html>