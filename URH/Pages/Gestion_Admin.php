<?php
include "Connexion.php";

if (isset($_POST["submit"])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    $requete = "INSERT INTO `admin`(`nom`, `prenom`, `email`, `password`) VALUES ('$nom','$prenom','$email','$password')";
    
    $result = mysqli_query($conn, $requete);

    if ($result) {
      header("Location: Gestion_Admin.php?msg=Insertion effectuer avec suucces");
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

  <title>Partie Admin</title>
</head>

<body>

    <div class="d-flex" style="margin-top:50px; width:100%;">
        <div class="container" style="width:600px;">
            <div class="text-center mb-4" style="margin-top:30px">
            <h3>Formulaire d'Inscription <i class="fa-solid fa-pen-to-square fs-5 me-3"></i></h3>
            </div>

            <div class="text-center mb-4">
                <p class="text-muted"><i class="fa-solid fa-user-large"></i> Information de l'Admin</p>
            </div>

            <div class="container d-flex justify-content-center">
                <form action="" method="post" style="">
                    <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom" placeholder="Inserer le nom" required>
                    </div>

                    <div class="col">
                        <label class="form-label">Prenom</label>
                        <input type="text" class="form-control" name="prenom" placeholder="Inserer le prenom" required>
                    </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Email </label>
                            <input type="email" class="form-control" name="email" placeholder="Entrer votre email" required>
                        </div>

                    <div class="col">
                        <label class="form-label">Password </label>
                        <input type="password" class="form-control" name="password" placeholder="Inserer le mot de passe" required>
                    </div>
                    </div>

                    <div class="text-center mb-4" style="margin-top:30px;">
                    <button type="submit" class="btn btn-dark" name="submit">Enregistrer <i class="fa-regular fa-paper-plane"></i></button>
                    <!-- <a href="Liste_Inscriptions.php" class="btn btn-danger">Annuler <i class="fa-solid fa-xmark"></i></a> -->
                    </div>
                </form>
            </div>
        </div>

        
        <div class="container" style="margin-left:px; margin-top:30px">
            <?php
                if (isset($_GET["msg"])) {
                $msg = $_GET["msg"];
                
                echo '<div id="successMessage" class="alert alert-warning alert-dismissible fade show" role="alert">
                        ' . $msg . '
                        </div>';
                }
            ?>
           
            <div class="table-responsive">
            <table class="table table-hover table-sm text-center">
            <thead class="table-dark">
                <tr>
                <th scope="col">ID Admin</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `admin`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row["codeAdmin"] ?></td>
                    <td><?php echo $row["nom"] ?></td>
                    <td><?php echo $row["prenom"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["password"] ?></td>
                    <td>
                    <!-- <a  href="Modifier_Admin.php?idAdmin=<?php echo $row["odeAdmin"] ?>" class="btn btn-dark" name="submit"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i> Modifier</a> -->
                    <a href="Effacer_Admin.php?codeAdmin=<?php echo $row["codeAdmin"] ?>" class="btn btn-danger"><i class="fa-solid fa-trash fs-5"></i></a> 
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
            </table>
            </div>
        </div>
    </div>

  <script>
      // Fonction pour masquer le message d'erreur après 5 secondes
      function masquerMessageSuccess() {
          setTimeout(function () {
              document.getElementById("successMessage").style.display = "none";
          }, 5000); // 5000 millisecondes = 5 secondes
      }

      // Appelez la fonction lors du chargement de la page
      window.onload = function () {
          masquerMessageSuccess();
      };
  </script>
</body>

</html>