<?php
include "Connexion.php";
$codeInscription = $_GET["codeInscription"];

if (isset($_POST["submit"])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $datNaissance = $_POST['datNaissance'];
    $classe = $_POST['classe'];
    $sexe = $_POST['sexe'];
    $fraisInscription = $_POST['fraisInscription'];
    $dateInscription = $_POST['dateInscription'];

  $requete = "UPDATE `inscription` SET `nom`='$nom',`prenom`='$prenom',`datNaissance`='$datNaissance',`classe`='$classe',`sexe`='$sexe',`fraisInscription`='$fraisInscription',`dateInscription`='$dateInscription' WHERE codeInscription = $codeInscription";

  $result = mysqli_query($conn, $requete);

  if ($result) {
    header("Location: Liste_Inscriptions.php?msg=Modification effectuer avec succės");
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
         <h3>Modification d'Inscription <i class="fa-solid fa-pen-to-square fs-5 me-3"></i></h3>
      </div>

      <?php
      $requete = "SELECT * FROM `inscription` WHERE codeInscription = $codeInscription LIMIT 1";
      $result = mysqli_query($conn, $requete);
      $row = mysqli_fetch_assoc($result);
      ?>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">

            <div class="text-center mb-4">
                  <p class="text-muted"><i class="fa-solid fa-user-large"></i> Information personnel </p>
            </div>

            
            
            <div class="row">
               <div class="col-auto">
                     <h5><i class="fa fa-link"></i>Code d'Inscription</h5>
               </div>
              <div class="col-auto" style="width: 200px; margin-top:-27px; margin-left:-30px;" >
                  <div class="card-body" >
                     <input  class="form-control" id="urlInput" style="background-color: #fff;" value="<?php echo $row['codeInscription'] ?>" readonly>
                  </div>
              </div>
              <div class="text-center mb-4">
                  <p class="text-muted"><i class="far fa-star"></i> Code Inscription non modifiable</p>
               </div>
          </div>

            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Nom</label>
                  <input type="text" class="form-control" name="nom" value="<?php echo $row['nom'] ?>" required>
               </div>

               <div class="col">
                  <label class="form-label">Prenom</label>
                  <input type="text" class="form-control" name="prenom" value="<?php echo $row['prenom'] ?>" required>
               </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Date de Naissance</label>
                    <input type="date" class="form-control" name="datNaissance" value="<?php echo $row['datNaissance'] ?>" required>
                </div>

               <div class="col">
                  <label class="form-label">Classe</label>
                  <input type="text" class="form-control" name="classe" value="<?php echo $row['classe'] ?>" required>
               </div>
            </div>

            <div class="col">
                  <label class="form-label">Sexe de l'etudiant <i class="fa-solid fa-venus-mars"></i></label>
                  <input type="text" class="form-control" name="sexe" value="<?php echo $row['sexe'] ?>" required>
            </div>


            <div class="text-center mb-4" style="margin-top:20px">
                <p class="text-muted"><i class="fa-solid fa-dollar-sign"></i> Information de paiement</p>
            </div>

            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Frais d'inscription</label required>
                  <input type="text" class="form-control" name="fraisInscription" value="<?php echo $row['fraisInscription'] ?>" required>
               </div>

               <div class="col">
                  <label class="form-label">Date d'inscription</label>
                  <input type="date" class="form-control" name="dateInscription" value="<?php echo $row['dateInscription'] ?>" required>
               </div>
            </div>

            <div class="text-center mb-4" style="margin-top:20px;">
               <button href="Liste_Inscriptions.php" class="btn btn-dark" name="submit">Enregistrer <i class="fa-regular fa-paper-plane"></i></button>
               <a href="Liste_Inscriptions.php" class="btn btn-danger">Annuler <i class="fa-solid fa-xmark"></i></a>
            </div>
         </form>
      </div>
<!--  -->
  </div>

</body>

</html>