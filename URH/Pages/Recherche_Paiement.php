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

  <title>Recherche de Paiement</title>
</head>

<body>
    <div class="row" style="width:100%">
        <div style="">
            <form method="post" action="" style="margin-top:250px; margin-left:70px">
                <div class="search-container">
                    <p><i class="far fa-star" style="color:red"></i> NB : Inserer d'abord le code du paiement</p>
                    <input type="text" name="idPaiement" placeholder="Rechercher..." required>
                    <button class="btn btn-dark" type="submit" name="submit">Rechercher <i class="fa-solid fa-magnifying-glass"></i></button>
                </div> 
            </form>
        </div> 

            <div class="container" style=" width:500px;">
            <div class="text-center mb-4">
                <h3>Recherche de Paiement <i class="fa-solid fa-magnifying-glass"></i></h3>
            </div>

                <?php
                    include "Connexion.php";

                    if (isset($_POST["submit"])) {
                        $idPaiement = $_POST["idPaiement"];
                        $requete = "SELECT * FROM `paiement` WHERE idPaiement = $idPaiement";
                        $result = mysqli_query($conn, $requete);

                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                                    <div class="container d-flex justify-content-center">
                                        <form action="" method="post" style="">
                                        <div class="text-center mb-4">
                                            <p class="text-muted"><i class="fas fa-list"></i> Information de la fiche </p>
                                        </div>

                                            <div class="row">
                                                <div class="col-auto">
                                                    <h5><i class="fa fa-link"></i>Code paiement</h5>
                                            </div>
                                            <div class="col-auto" style="width: 160px; margin-top:-27px; margin-left:-30px;" >
                                                <div class="card-body" >
                                                    <input  class="form-control" name="idPaiement" style="background-color: #fff;" value="<?php echo $row['idPaiement'] ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-auto">
                                                    <h5><i class="fa fa-link"></i>Code d'Inscription</h5>
                                            </div>
                                            <div class="col-auto" style="width: 160px; margin-top:-27px; margin-left:-30px;" >
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

                                            <div class="row mb-3" style="margin-left:10px; margin-top:60px;">
                                            <div>
                                                <h6>Cliquez pour modifier cette fiche  <i class="fa-solid fa-arrow-right"></i></h6>
                                            </div>

                                            <div class="col" style="margin-top:50px">
                                                <a  href="Modifier_Paiement.php?idPaiement=<?php echo $row["idPaiement"] ?>" class="btn btn-dark" name="submit"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i> Modifier</a>
                                            </div>
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
                                        Le code de paiement "<?php echo $idPaiement; ?>" n'existe pas.
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                                 ?>
                            <div class="container text-center mt-3">
                                <div class="alert alert-danger" role="alert">
                                    Une erreur s'est produite lors de la recherche du code de paiement.
                                </div>
                            </div>
                            <?php
                        }
                    }
                            ?>
            </div>
    </div>

    <script>
        // Fonction pour masquer le message d'erreur après 5 secondes
        function masquerMessageErreur() {
            setTimeout(function () {
                document.getElementById("errorMessage").style.display = "none";
            }, 5000); 
        }

        // Appel de la fonction lors du chargement de la page
        window.onload = function () {
            masquerMessageErreur();
        };
    </script>
</body>

</html>