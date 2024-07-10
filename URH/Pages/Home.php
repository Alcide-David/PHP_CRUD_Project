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

  <title>Menu Principal</title>
</head>

<body>
  <div style="margin-left: 50px; margin-top: 70px">
    <h4>Menu Principal</h4>
    <h6><i class="far fa-star" style="color:red; margin-top:20px"></i> Informations sur la base de donnees :</h6>
  </div>

  <?php
  include "Connexion.php";
  $requete = $conn->query("SELECT count(*) as total FROM inscription");
  $resultat = $requete->fetch_assoc();
  $nbr_inscriptions = $resultat['total'];
  ?>

  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card mb-3" style="width: 15rem;"> 
          <i class="fas fa-list-alt" style="font-size:90px; color:#000; margin-left:60px; margin-top:30px"></i>
          <!-- <i class="fas fa-users" style="font-size:100px;"></i> -->
          <div class="card-body">
            <hr>
            <p class="card-text">Inscriptions totale : <span style="color:red"><?php echo $nbr_inscriptions; ?></span></p>
          </div>
        </div>
      </div>

      <?php
      include "Connexion.php";
      $requete_adm = $conn->query("SELECT count(*) as total FROM admin");
      $resultat_adm = $requete_adm->fetch_assoc();
      $nbr_admin = $resultat_adm['total'];
      ?>

      <div class="col-md-4">
        <div class="card mb-3" style="width: 15rem;">
          <i class="fas fa-users" style="font-size:100px; color:#000; margin-left:50px; margin-top:20px"></i>
          <div class="card-body">
            <hr>
            <p class="card-text">Admin totale : <span style="color:red"><?php echo $nbr_admin; ?></span></p>
          </div>
        </div>
      </div>

      <?php
      include "Connexion.php";
      $requete_paie = $conn->query("SELECT count(*) as total FROM paiement");
      $resultat_paie = $requete_paie->fetch_assoc();
      $nbr_paiement = $resultat_paie['total'];
      ?>

      <div class="col-md-4">
        <div class="card mb-3" style="width: 15rem;">
          <i class="fa-solid fa-dollar-sign" style="font-size:100px; color:#000; margin-left:80px; margin-top:20px"></i>
          <div class="card-body">
            <hr>
            <p class="card-text">Paiment totale : <span style="color:red"><?php echo $nbr_paiement; ?></span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
