<?php 
include("connexion.php");
$id=$_POST['supp'];
foreach($id as $key => $value){
    $sql="delete from etudiant where id=$value";
    if (mysqli_query($connect,$sql))
   header('location:home.php');
}    
?>