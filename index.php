<?php

//echo password_hash("1234", PASSWORD_DEFAULT)
// echo password_verify("12345", '$2y$10$J5yAkb8BW4919ExqfnCiq.JTojOAD4fwiKBi83y.xIx');
// die;

include_once("connexion.php");
    
    if(isset($_POST['connexion'])){
        if (!empty($_POST['email']) && !empty($_POST['pass'])) 
        {
            //$salt = bin2hex(random_bytes(16));
            $email = $_POST['email'];
            $pass = $_POST['pass'];
           // $passHashed = password_hash($pass, PASSWORD_DEFAULT);

           
            
            $sql = "SELECT * FROM utilisateur WHERE email = '$email' ";
            
            $result = mysqli_query($connex, $sql);
            

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                
                if (password_verify($pass, $row['mot_de_passe'])) {

                    //echo($row['mot_de_passe']. "-----------".$row['id_user']);

                    session_start();

                    // recuperation de lid user dans la bd
                    $userID = $row['id_user'];
                    $username =  $row['nom'];
                    
                    // on stocke la variable de l id de user dans une session
                    $_SESSION['id_user'] = $userID;
                    $_SESSION['nom'] = $username;

                    //echo($_SESSION['nom'] );
                    

                    header("Location: home.php");
                    exit();

                    // demarrage de la session
                    
                     

                    // verification de la variable de ssession

                    

                    // var_dump ($userID);
                    // die;

                }else{
                    header("Location: index.php");
                    exit();
                    echo "echouée1";
                }         
            }else{
                header("Location: index.php");
                exit();
                echo "echouée2";
            }
        }
    }
    
           
               
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>e-learning</title>
        <link rel="stylesheet" href="stylelog.css">
        <link rel="stylesheet" href="/lib/tailwind.css">
        <link rel="stylesheet" href="/lib/animate.css">
        <link rel="stylesheet" href="/assets/fontawesome/css/all.css">
    </head>
    
    <body>

            <div class="cont-login">
                <form class="Form" action="index.php" method="POST">
                    <h1 class="bg-red-500">Se Connecter a son compte</h1>
                    <div class="name">
                        <input  type="email" name="email" placeholder="email@gmail.com" required>
                        
                    </div>
                    <div class="pwd">
                        <input type="password" for="pass" name="pass" placeholder="mot de passe"  required>
                        
                    </div>
                    
                    <a href="#" class="pass">Mot de Passe Oublié ?</a>

                    <button class="btnCnx" type="submit" name="connexion">Connexion</button> 
                   

                    <label style="font-size: 17px; margin-left: 8px;">  Vous N'avez pas de Compte ?</label> <a href="inscription.php" class="cmpt"> Creer un Compte</a>

                </form>
    </body>
</html>