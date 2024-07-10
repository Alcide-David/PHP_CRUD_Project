<?php
include "Connexion.php";

if (isset($_POST["submit"])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $datNaissance = $_POST['datNaissance'];
    $sexe = $_POST['sexe'];
    $classe = $_POST['classe'];
    $fraisInscription = $_POST['fraisInscription'];
    $dateInscription = $_POST['dateInscription'];
 
    $requete = "INSERT INTO `inscription`(`nom`, `prenom`, `datNaissance`, `classe`,`sexe`, `fraisInscription`, `dateInscription`) VALUES ('$nom','$prenom','$datNaissance','$classe','$sexe','$fraisInscription','$dateInscription')";
    
    $result = mysqli_query($conn, $requete);

    if ($result) {
      header("Location: Liste_Inscriptions.php?msg=Insertion effectuer avec suucces");
    } else {
      echo "Echoue : " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
      <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
   <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="../css/all.min.css">

   <title>Formulaire d'Inscription</title>
   
</head>

<body>

   <div class="container" style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); width:700px  ">

      <div class="text-center mb-4" style="margin-top:30px">
         <h3>Formulaire d'Inscription <i class="fa-solid fa-pen-to-square fs-5 me-3"></i></h3>
      </div>

      <div class="text-center mb-4">
         <p class="text-muted"><i class="fa-solid fa-user-large"></i> Information Personnel</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Nom</label>
                  <input type="text" class="form-control" name="nom" placeholder="Inserer votre nom" required>
               </div>

               <div class="col">
                  <label class="form-label">Prenom</label>
                  <input type="text" class="form-control" name="prenom" placeholder="Inserer votre prenom" required>
               </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Date de Naissance</label>
                    <input type="date" class="form-control" name="datNaissance" placeholder="Entrer votre date de naissance" required>
                </div>

               <div class="col">
                  <label class="form-label">Classe</label>
                  <input type="text" class="form-control" name="classe" placeholder="Inserer sa classe" required>
               </div>
            </div>

            <div class="col">
                  <label class="form-label">Veuiller preciser le sexe de l'etudiant <i class="fa-solid fa-venus-mars"></i></label>
                  <input type="text" class="form-control" name="sexe" placeholder="Homme / Femme /Autres" required>
            </div>

            <div class="text-center mb-4" style="margin-top:20px">
                <p class="text-muted"><i class="fa-solid fa-dollar-sign"></i> Information de paiement</p>
            </div>

            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Frais d'inscription</label>
                  <input type="text" class="form-control" name="fraisInscription" placeholder="Inserer les frais d'inscriptions" required>
               </div>

               <div class="col">
                  <label class="form-label">Date d'inscription</label>
                  <input type="date" class="form-control" name="dateInscription" placeholder="Inserer la date de l'inscription" required>
               </div>
            </div>

            <div class="text-center mb-4" style="margin-top:30px;">
               <button type="submit" class="btn btn-dark" name="submit">Enregistrer <i class="fa-regular fa-paper-plane"></i></button>
               <a href="Liste_Inscriptions.php" class="btn btn-danger">Annuler <i class="fa-solid fa-xmark"></i></a>
            </div>
         </form>
      </div>
   </div>


</body>

</html>