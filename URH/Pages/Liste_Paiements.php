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

  <title>Liste de Paiements</title>
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
        <h5><i class="fa fa-link"></i>  Liste des paiements</h5>
    </div>

    <div class="table-responsive" style="margin-top:30px">
      <table class="table table-hover text-center">
        <thead class="table-dark">
          <tr>
            <th scope="col">idPaiement</th>
            <th scope="col">CodeInscription</th>
            <th scope="col">Montant</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM `paiement`";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?php echo $row["idPaiement"] ?></td>
              <td><?php echo $row["codeInscription"] ?></td>
              <td><?php echo $row["montant"] ?></td>
              <td><?php echo $row["date"] ?></td>
              <td>
                <a href="Modifier_Paiement.php?idPaiement=<?php echo $row["idPaiement"] ?>" class="btn btn-dark" name="submit"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i> Modifier</a>
                <a href="Effacer_Paiement.php?idPaiement=<?php echo $row["idPaiement"] ?>" class="btn btn-danger"><i class="fa-solid fa-trash fs-5"></i></a>
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
