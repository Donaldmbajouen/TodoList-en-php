<?php 
include_once("connexion.php");
session_start();
$username = $_SESSION['nom'];


if(isset($_POST['ADD'])){
    $nom_tache = $_POST["nom_tache"];
    $userID = $_SESSION['id_user'];
    $username = $_SESSION['nom'];
    
    
    //$userID = $row['id_user'];
   
    $statut = 0;// true pour tache compete et false pour tache non complete
    if ($statut == 0) {
        $statut="tache Incomplete";
    }else {
        $statut="tache Complete";
    }
    //echo "tyubh .$statut";
    if(!empty($nom_tache)){
        $sql = "INSERT INTO `tache`(`nom_tache`, `statut`, `id_user`) VALUES ('$nom_tache', '$statut', '$userID')";
        // var_dump($sql);
        // die();
        $result = mysqli_query($connex, $sql);
        if($result){
            //echo "donnees enregistrées avec succes";

        ?>
           
        <?php
        }else{
            echo "c'est la merde";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <link rel="stylesheet" href="lib/animate.css">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/fontawesome-free-6.5.1-web/css/all.css">
    <script src="lib/jquery.js"></script>
    <script src="script.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="big-container animated bounceInUp">
        <h2>Bienvenue <?php echo ($username); ?></h2>
            <h1 class="animated bounceInDown">To Do List En PHP</h1>
            <div class="add-tache animated bounceIn">
            <form  action="home.php" method="POST" class="add-tache animated bounceIn">
                <input type="text" class="text" id="text" name="nom_tache" placeholder="Ajouter une Tache ici" for="tache">
                <button class="add" name="ADD"><i class="fas fa-add "></i></button>
            </form>  
            </div>
            <!-- <div class="notcomp"> -->
            <table class="table table-hover text-center ">
                <thead class="table-dark">
                    <tr >
                        <th scope="col">ID</th>
                        <th scope="col">NomTache</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                            

                            $userID = $_SESSION['id_user'] ;
                            //l'dentifiant de la tache dans la session de l'utilisateur
                            //$_SESSION['id_tache'] = $taskID;
                            
                            if (!isset($_SESSION['id_user'])) {
                                // La variable de session n'existe pas
                                header("Location: index.php");
                                exit();
                            }
                            //echo($userID);
                            if($_SESSION['id_user'] == $userID){
                                $sql="SELECT * FROM `tache` WHERE id_user = '$userID' ";                                
                                //echo ($userID);                           
                                $result = mysqli_query($connex, $sql);
                                if (!$result) {
                                    die('Erreur de requête : ' . mysqli_error($connex));
                                }
                                while($row = mysqli_fetch_assoc($result)){
                                
                                    ?>
                                        <tr>
                                            <th><?php echo $row['id_tache'] ?></th>
                                            <th><?php echo $row['nom_tache'] ?></th>
                                            <th><?php echo $row['statut'] ?></th>
                                            
                                            <td>
                                                <!-- <a href="modifier.php?id=<?php echo $row['id_tache'] ?>" class="link-dark hover"style=" bacground-color: red;"><i class="fa-solid fas fa-pen fs-5 me-3" style=" bacground-color: red;" > </i></a>  -->
                                                <a href="cheked.php?id=<?php echo $row['id_tache'] ?>" class="link-dark"><i class="fa-solid fas fa-check fs-5 me-3"> </i></a> 
                                                <a href="delete.php?id=<?php echo $row['id_tache'] ?>" class="link-dark"><i class="fa-solid fas fa-trash-alt  fs-5 me-3"> </i></a> 
                                            </td>
                                        </tr>
                                 <?php 
                                }
                            }
                    ?>
                    
                 </tbody>
            </table>
            </table>
        <a href="decon.php" class=" btn btn-dark text-light ">Deconnexion</a>
    </div>    
</body>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</html>