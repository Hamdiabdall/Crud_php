<?php $_POST ;
include("connexion.php");
$m=$_POST["matricule"];

$n=$_POST["nom"];

$p=$_POST["prenom"];

$a=$_POST["adresse"];

$d=$_POST["naissance"];

$f=$_POST["filiere"];

$i=$_POST["stage_id"];

$e=$_POST["email"];


$pass=$_POST["password"];
//if (isset$file_name)
$file_name=$_FILES['photo']['name'];
$file_tmp_name=$_FILES['photo']['tmp_name'];
$file_dest = 'photos/'.$file_name;
$file_extension=strrchr($file_name,".");
$extensions_autorisees= array('.jpg' ,'.JPG' , '.png' , '.PNG','.gif');

$pho="photos/".$file_name;// to5ou vide

$sql3="select * from etudiant where matricule='$m'";
$res3=mysqli_query($connect,$sql3);
$sql4="select * from etudiant where email='$e'";
$res4=mysqli_query($connect,$sql4);
if(mysqli_num_rows($res3)== 1)
echo"matricule exisatant";
else if(mysqli_num_rows($res4)== 1) 
echo"email exisatant";
else if(!in_array($file_extension,$extensions_autorisees))
echo  "Extension non autorisee";
else{
move_uploaded_file($file_tmp_name,$file_dest);   
$sql="insert into etudiant (matricule,nom,prenom,adresse,filiere,naissance,stage_id,email,photo,password) values ('$m','$n','$p','$a','$f','$d',$i,'$e','$pho','$pass')";
if(mysqli_query($connect,$sql))
   header('location:home.php');
}?>