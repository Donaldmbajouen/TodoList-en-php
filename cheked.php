<?php 
include_once("connexion.php");
session_start();
// suppression dans la bd
// var_dump($userID);
// die();

$id = $_GET['id'];
$sql = "SELECT  `id_user` FROM `tache` WHERE id_tache = '$id' ";
$result = mysqli_query($connex, $sql);
$row = mysqli_fetch_assoc($result);

if($_SESSION['id_user'] === $row['id_user']){
    // var_dump($row['id_user']);
    // die();
    
    if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = " UPDATE `tache` SET `statut`='Tache Complete' WHERE `tache`.`id_tache`= $id ";
            $result = mysqli_query($connex, $sql);
            if($result){
            header("Location: home.php");
            exit();
            }else{
                echo "c'est la merde";
            }
    
        }else{
            header("Location: home.php");
            exit();
        }
    

}else{
    header("Location: home.php");
    exit();
}
