<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Css/Login.css" />
    <title>Formulaire de Connexion</title>
  </head>
  <body>
    <div class="container">
        <div class="image">
            <img src="image/user.png"  width="80"/> 
        </div>
        
        <form action="Pages/Login_Validation.php" method="post">
            
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="Inserer votre email" required />

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" placeholder="Inserer votre mot de passe" required />

            <button type="submit" name="submit">Se connecter</button>
        </form>

         <!-- Affichage d'erreur de connexion  -->
          <?php
            if(isset($_GET['error'])){
              if($_GET['error'] == "Email/Password incorrect"){
                echo '<div id="error-message" style="color:red; font-size: 14px; margin: 5px 10px 0px;">
                        ERREUR || Email/Password incorrect !
                    </div>';
              }
            }    
          ?>

        <!-- Scrip permettant d'afficher lw message d'erreur pendant 5 secondes -->
        <script>
          // Fonction pour masquer le message d'erreur après 5 secondes
          setTimeout(function(){
            document.getElementById("error-message").style.display = "none";
          }, 5000);
        </script>
    </div>
  </body>
</html>
