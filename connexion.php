<?php
$utilasateur="root";
$password ="";
$server ="localhost";
$nombd = "todolist";

$connex = mysqli_connect($server, $utilasateur, $password, $nombd);

if(!$connex){
    die("connexion a la Bd echouée " .mysqli_connect_error());

}else{
    //echo("connexion reussie ");
}

?>