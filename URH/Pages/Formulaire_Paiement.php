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

   <title>Formulaire de Paiement</title>
   
</head>

<body>
<div class="row">
        <div style="">
            <form method="post" action="" style="margin-top:250px; margin-left:70px">
                <div class="search-container">
                    <p><i class="far fa-star" style="color:red"></i> NB : Inserer d'abord le code d'inscription en question</p>
                    <input type="text" name="codeInscription" placeholder="Rechercher..." required>
                    <button class="btn btn-dark" type="submit" name="submit">Rechercher <i class="fa-solid fa-magnifying-glass"></i></button>
                </div> 
            </form>
        </div> 

            <div class="container" style="width:500px; margin-top:20px;">
            <div class="text-center mb-4">
                <h3>Formulaire de paiement <i class="fa-solid fa-dollar-sign"></i></h3>
            </div>

                <?php
                    include "Connexion.php";

                    if (isset($_POST["submit"])) {
                        $codeInscription = $_POST["codeInscription"];
                        $requete = "SELECT * FROM `inscription` WHERE codeInscription = $codeInscription";
                        $result = mysqli_query($conn, $requete);

                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                                    <div class="container d-flex justify-content-center">
                                        <form action="Enregistrer_Paiements.php" method="post" style="">

                                        <div class="text-center mb-4">
                                            <p class="text-muted"><i class="fas fa-list"></i> Information de la fiche </p>
                                        </div>
                                        
                                            <div class="row">
                                            <div class="col-auto">
                                                    <h5><i class="fa fa-link"></i>  Code d'inscription</h5>
                                            </div>
                                            <div class="col-auto" style="width: 200px; margin-top:-27px; margin-left:-30px;" >
                                                <div class="card-body" >
                                                    <input  class="form-control" style="background-color: #fff;" name="codeInscription" value="<?php echo $row['codeInscription'] ?>" readonly>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Montant</label>
                                                <input type="text" class="form-control" name="montant" placeholder="Inserer le montant" required>
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Date</label>
                                                <input type="date" class="form-control" name="date" placeholder="Inserer la date" required>
                                            </div>
                                            </div>

                                            <!-- <input type="hidden" name="codeInscription" value="<?php echo $row['codeInscription']; ?>"> -->

                                            <div class="text-center mb-4" style="margin-top:30px;">
                                                <button type="submit" class="btn btn-dark" name="submit">Enregistrer <i class="fa-regular fa-paper-plane"></i></button>
                                                <a href="Liste_Inscriptions.php" class="btn btn-danger">Annuler <i class="fa-solid fa-xmark"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                            }
                            } else {
                                // Si le code n'existe pas
                                    ?>
                                <div class="container text-center mt-3" id="errorMessage">
                                    <div class="alert alert-danger" role="alert">
                                        Le code d'inscription "<?php echo $codeInscription; ?>" n'existe pas.
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                                 ?>
                            <div class="container text-center mt-3">
                                <div class="alert alert-danger" role="alert">
                                    Une erreur s'est produite lors de la recherche du code d'inscription.
                                </div>
                            </div>
                            <?php
                        }
                    }
                            ?>
            </div>
    </div>

    <!-- Ajoutez ce script à la fin de votre fichier HTML -->
    <script>
        // Fonction pour masquer le message d'erreur après 5 secondes
        function masquerMessageErreur() {
            setTimeout(function () {
                document.getElementById("errorMessage").style.display = "none";
            }, 5000); // 5000 millisecondes = 5 secondes
        }

        // Appelez la fonction lors du chargement de la page
        window.onload = function () {
            masquerMessageErreur();
        };
    </script>
</body>

</html>