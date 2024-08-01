<?php 
include_once("connexion.php");

echo "La version de PHP installée est : " . phpversion();

// suppression dans la bd
// $id = $_GET['id'];
// $sql = "SELECT  `id_user` FROM `tache` WHERE id_tache = '$id' ";
// $result = mysqli_query($connex, $sql);
// $row = mysqli_fetch_assoc($result);

// if($_SESSION['id_user'] === $row['id_user']){
//     if(isset($_GET['id'])){

//         $id = $_GET['id'];

//         $sql = " DELETE FROM `tache` WHERE `tache`.`id_tache`= $id ";
//         $result = mysqli_query($connex, $sql);
//         if($result){
//             header("Location: home.php");
//             exit();
        
//         }else{
//             echo "c'est la merde";
//         }

        
//     }
// }else{
//     header("Location: home.php");
//     exit();
// }
