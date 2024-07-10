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

  <title>Recherche d'Inscription</title>
</head>

<body>
    <div class="row">
        <div style="">
            <form method="post" action="" style="margin-top:250px; margin-left:70px">
                <div class="search-container">
                     <p><i class="far fa-star" style="color:red"></i> NB : Inserer d'abord le code d'inscription</p>
                    <input type="text" name="codeInscription" placeholder="Rechercher..." required>
                    <button class="btn btn-dark" type="submit" name="submit">Rechercher <i class="fa-solid fa-magnifying-glass"></i></button>
                </div> 
            </form>
        </div> 

            <div class="container" style=" width:500px;">
            <div class="text-center mb-4">
                <h3>Recherche d'Inscription <i class="fa-solid fa-magnifying-glass"></i></h3>
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
                                        <form action="" method="post" style="">
                                            <div class="text-center mb-4">
                                                <p class="text-muted"><i class="fa-solid fa-user-large"></i> Information personnel </p>
                                            </div>

                                            <div class="row">
                                            <div class="col-auto">
                                                    <h5><i class="fa fa-link"></i>  Code de l'etudiant</h5>
                                            </div>
                                            <div class="col-auto" style="width: 200px; margin-top:-27px; margin-left:-30px;" >
                                                <div class="card-body" >
                                                    <input  class="form-control" id="urlInput" style="background-color: #fff;" value="<?php echo $row['codeInscription'] ?>" readonly>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Nom</label>
                                                <input type="text" class="form-control" name="nom" value="<?php echo $row['nom'] ?>" readonly>
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Prenom</label>
                                                <input type="text" class="form-control" name="prenom" value="<?php echo $row['prenom'] ?>" readonly>
                                            </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label class="form-label">Date de Naissance</label>
                                                    <input type="date" class="form-control" name="datNaissance" value="<?php echo $row['datNaissance'] ?>" readonly>
                                                </div>

                                            <div class="col">
                                                <label class="form-label">Classe</label>
                                                <input type="text" class="form-control" name="classe" value="<?php echo $row['classe'] ?>" readonly>
                                            </div>
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Sexe de l'etudiant <i class="fa-solid fa-venus-mars"></i></label>
                                                <input type="text" class="form-control" name="sexe" value="<?php echo $row['sexe'] ?>" readonly>
                                            </div>


                                            <div class="text-center mb-4" style="margin-top:20px">
                                                <p class="text-muted"><i class="fa-solid fa-dollar-sign"></i> Information de paiement</p>
                                            </div>

                                            <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Frais d'inscription</label required>
                                                <input type="text" class="form-control" name="fraisInscription" value="<?php echo $row['fraisInscription'] ?>" readonly>
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Date d'inscription</label>
                                                <input type="date" class="form-control" name="dateInscription" value="<?php echo $row['dateInscription'] ?>" readonly>
                                            </div>
                                            </div>

                                            <div class="row mb-3" style="margin-left:-485px; margin-top:-100px;">
                                            <div>
                                                <h6>Cliquez pour modifier cette fiche  <i class="fa-solid fa-arrow-right"></i></h6>
                                            </div>

                                            <div class="col" style="margin-top:-10px">
                                                <a  href="Modifier_Inscription.php?codeInscription=<?php echo $row["codeInscription"] ?>" class="btn btn-dark" name="submit"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i> Modifier</a>
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