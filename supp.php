<?php
include("connexion.php") ;
$identifiant=$_GET['id'];
echo $identifiant;
$sql="delete from etudiant where id=$identifiant";
if (mysqli_query($connect,$sql))
   header('location:home.php');
?>