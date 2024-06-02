<?php
$id=$_GET['id'];
$matricule=$_GET['mat'];
$nom=$_GET['nom'];
include('home.php');
echo ' <center>Voulez vous vraiment supprimer ? : '.$nom." : ".$matricule;

?>
<br>
<a href="supp.php?id=<?php echo $id?>"><button type="button">Oui</button></a>
<a href="home.php"><button type="button">Non</button></a>