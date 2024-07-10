<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Sidebar Menu</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="../css/all.min.css">
  <!-- Fichier CSS pour le dashboard -->
  <link rel="stylesheet" type="text/css" href="../css/URH_Dashboard.css">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-3.5 col-lg-2 d-md-block sidebar">
        <div class="image text-center" style="margin-top:10px;">
          <img src="../Image/admin.png" width="80" alt="Admin Image">
        </div>
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <!-- ... (votre code existant) ... -->
            <li class="nav-item">
              <a class="nav-link active" href="Home.php" target="myFrame">
                <i class="fas fa-home"></i> Dashboard
              </a>
            </li>

            <!-- Partie Inscription -->
            <li class="nav-item nav-item-has-submenu">
              <a class="nav-link" href="#">
                <i class="fas fa-users" style="margin-top:10px"></i> Inscriptions
              </a>
              <ul class="nav flex-column submenu">
                <li class="nav-item">
                  <a class="nav-link" href="Inscription_Form.php" target="myFrame" style="margin-left:35px"><i class="fas fa-user-plus"></i> Ajouter</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Recherche_Inscription" target="myFrame"  style="margin-left:35px"><i class="fas fa-search"></i> Rechercher</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Liste_Inscriptions" target="myFrame"  style="margin-left:35px" ><i class="fas fa-list"></i> Liste des Inscrits</a>
                </li>
              </ul>
            </li>

            <!-- Partie Paiement -->
            <li class="nav-item nav-item-has-submenu">
              <a class="nav-link" href="#">
                <i class="fas fa-credit-card" style="margin-top:10px"></i> Paiements
              </a>
              <ul class="nav flex-column submenu">
                <li class="nav-item">
                  <a class="nav-link" href="Formulaire_Paiement" target="myFrame"  style="margin-left:35px"><i class="fas fa-plus"></i> Ajouter</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Recherche_Paiement" target="myFrame"  style="margin-left:35px"><i class="fas fa-search"></i> Rechercher</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Liste_Paiements.php" target="myFrame"  style="margin-left:35px"><i class="fas fa-list"></i> Liste des Paiements</a>
                </li>
              </ul>
            </li>

            <!-- Partie Admin  -->
            <li class="nav-item nav-item-has-submenu">
              <a class="nav-link" href="#">
                <i class="fas fa-users" style="margin-top:10px"></i> Partie ADMIN
              </a>
              <ul class="nav flex-column submenu">
                <li class="nav-item">
                  <a class="nav-link" href="Gestion_Admin.php" target="myFrame"  style="margin-left:35px"><i class="fas fa-cogs"></i> Gérer un ADMIN</a>
                </li>
              </ul>
            </li>
          </ul>

          <!-- Boutton de connexion -->
          <div class="text-center mt-3">
            <button class="btn btn-danger" onclick="logout()">
              <i class="fas fa-sign-out-alt"></i> Se déconnecter
            </button>
          </div>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="m-3" style="height:450px;">
          <iframe name="myFrame" style="height:550px; width:100%; border: none;" src="Home.php" target="myFrame"></iframe>
        </div>
      </main>
    </div>
  </div>

  <script>
    function logout() {
      var confirmLogout = confirm("Souhaitez-vous vraiment vous déconnecter ?");

      if (confirmLogout) {
        window.location.href = "../index.php";
      }
    }
  </script>
</body>

</html>
