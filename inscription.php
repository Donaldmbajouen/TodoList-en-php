<?php 
include_once("connexion.php");

session_start();

 if(isset($_POST['connexion'])){
    $nom = $_POST['Nom'];
    $pass = $_POST["pass"];
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
    $email = $_POST["email"];
    
    $sql = "INSERT INTO `utilisateur`(`nom`, `mot_de_passe`, `email`) VALUES ('$nom', '$hashed_password', '$email')";
    // var_dump($sql);
    // die("");
    
    // if($nom->empty)
    $result = mysqli_query($connex, $sql);
    
    if($result){
        ?>

        <script>
            
            alert("compte enregistré avec succes");
            
        </script>

        <?php
        header("Location: index.php");
        exit();
    }else{
        echo ("non enregistré  " .mysqli_error($connex));
        
    }
 }

//$userID = $connexion->insert_id; pour recuperer l'id automatiquement generé

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>e-learning</title>
        <link rel="stylesheet" href="stylelog.css">
        <link rel="stylesheet" href="../lib/tailwind.css">
        <link rel="stylesheet" href="../lib/animate.css">
        <link rel="stylesheet" href="../assets/fontawesome-free-6.5.1-web/css/all.min.css">
    </head>
    
    <body>

            <div class="cont-login">
                <form class="FormI" action="inscription.php" method="POST">
                        <h1 class="animated fadeIn">Inscrivez-vous en seul Clic </h1>
                    
                        <input type="text" for="name" name="Nom" placeholder="Nom utilisateur" required>
                    
                    
                        <input type="password" for="pass" name="pass" placeholder="Mot de Passe" required>
                    
                    
                        <input type="email" for="email" name="email" placeholder="Adresse E-mail" required>
                        
                    
                    


                        <button class="btnCnx" type="submit" name="connexion">Creer Compte</button> 
                    
                   

                        <label style="font-size: 17px; margin-left: 8px;">  Vous avez deja un Compte ?</label> <a href="index.php" class="cmpt"> connectez-vous</a>

                </form>
    </body>
</html>