<?php
include "Connexion.php";
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

  <title>Liste d'inscriptions</title>
</head>

<body>

  <div class="container" style="margin-top:40px;">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div id="successMessage" class="alert alert-warning alert-dismissible fade show" role="alert">
              ' . $msg . '
            </div>';
    }
    ?>

    <div class="col-auto">
        <h5><i class="fa fa-link"></i>  Liste des inscriptions</h5>
    </div>

    <div class="table-responsive" style="margin-top:20px">
      <table class="table table-hover table-sm text-center">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID Inscription</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Date Naissance</th>
            <th scope="col">Sexe</th>
            <th scope="col">Classe</th>
            <th scope="col">Frais Inscription</th>
            <th scope="col">Date Inscription</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM `inscription`";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?php echo $row["codeInscription"] ?></td>
              <td><?php echo $row["nom"] ?></td>
              <td><?php echo $row["prenom"] ?></td>
              <td><?php echo $row["datNaissance"] ?></td>
              <td><?php echo $row["sexe"] ?></td>
              <td><?php echo $row["classe"] ?></td>
              <td><?php echo $row["fraisInscription"] ?></td>
              <td><?php echo $row["dateInscription"] ?></td>
              <td>
                <a href="Modifier_Inscription.php?codeInscription=<?php echo $row["codeInscription"] ?>" class="btn btn-dark" name="submit"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i> Modifier</a>
                <a href="Effacer_Inscription.php?codeInscription=<?php echo $row["codeInscription"] ?>" class="btn btn-danger"><i class="fa-solid fa-trash fs-5"></i></a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    // Fonction pour masquer le message d'erreur après 5 secondes
    function masquerMessageSuccess() {
      setTimeout(function () {
        document.getElementById("successMessage").style.display = "none";
      }, 5000); 
    }

    // Appel de la fonction lors du chargement de la page
    window.onload = function () {
      masquerMessageSuccess();
    };
  </script>
</body>

</html>
