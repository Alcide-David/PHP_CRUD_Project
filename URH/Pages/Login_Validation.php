<?php
        //On verifie si le formulaire a ete soumis
        if(isset($_POST['submit'])){
            //On inclus la page de connexion
          include 'Connexion.php';
          //Recuperation des informations de connexion
          $email = $_POST['email'];
          $password = $_POST['password'];

          //Requete pour selectionner tout les utilisateurs se trouvant dans la table
            $requete = "SELECT * FROM admin WHERE email = ? AND password = ?";
            // Préparation de la requête SQL
            $statment = $conn->prepare($requete);
            // Liaison des paramètres de la requête avec les valeurs
            $statment->bind_param("ss", $email, $password);
            // Exécution de la requête SQL
            $statment->execute();
            // Récupération du résultat de la requête sous forme d'association d'array
            $result = $statment->get_result()->fetch_assoc();

          if($result['email'] == $email && $result['password'] == $password){
            header("location:URH_Dashboard.php");
            }
            //Condition qui verifie si l'email et/ou le password est/sont vide et/ou incorect
            else {
              header("location:../login.php?error=Email/Password incorrect");
          }
      }
?>