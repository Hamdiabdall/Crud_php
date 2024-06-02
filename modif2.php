<?php
 $_POST ;
 include("connexion.php");
 $m=$_POST["matricule"];
 
 $n=$_POST["nom"];
 
 $p=$_POST["prenom"];
 
 $a=$_POST["adresse"];
 
 $d=$_POST["naissance"];
 
 $f=$_POST["filiere"];
 
 $is=$_POST["stage_id"];
 
 $e=$_POST["email"];

$pass=$_POST["password"];

 $i=$_POST["id"];

 $pass=$_POST["password"];


$file_name=$_FILES['photo']['name'];
$file_tmp_name=$_FILES['photo']['tmp_name'];
$file_dest = 'photos/'.$file_name;
$file_extension=strrchr($file_name,".");
$extensions_autorisees= array('.jpg' ,'.JPG' , '.png' , '.PNG','.gif','.avif');
move_uploaded_file($file_tmp_name,$file_dest); 

$pho="photos/".$file_name;
$sql2="select * from etudiant where matricule='$m'";
$res2=mysqli_query($connect,$sql2);
if(mysqli_num_rows($res2)==0){
    $sql1="update etudiant set matricule='$m',nom='$n',prenom='$p',adresse='$a',naissance='$d',filiere='$f',stage_id='$is',password='$pass' where id=$i";
    mysqli_query($connect,$sql1);

}
else {
    $sql1="update etudiant set nom='$n',prenom='$p',adresse='$a',naissance='$d',filiere='$f',stage_id='$is',password='$pass' where id=$i";
    mysqli_query($connect,$sql1);
}
$sql3="select * from etudiant where email='$e'";
$res3=mysqli_query($connect,$sql3);
if(mysqli_num_rows($res3)==0){
    $sql1="update etudiant set nom='$n',prenom='$p',adresse='$a',naissance='$d',filiere='$f',stage_id='$is',email='$e',password='$pass' where id=$i";
    mysqli_query($connect,$sql1);

}
else {
    $sql1="update etudiant set nom='$n',prenom='$p',adresse='$a',naissance='$d',filiere='$f',stage_id='$is',password='$pass' where id=$i";
    mysqli_query($connect,$sql1);
}
 //********************** Upload Photo ***********************/
 
if($file_name=="" or !in_array($file_extension,$extensions_autorisees)){

    $sql1="update etudiant set nom='$n',prenom='$p',adresse='$a',naissance='$d',filiere='$f',stage_id='$is',password='$pass' where id=$i";
    mysqli_query($connect,$sql1);
}
else{
    $sql1="update etudiant set nom='$n',prenom='$p',adresse='$a',naissance='$d',filiere='$f',stage_id='$is',password='$pass',photo='$pho' where id=$i";
    mysqli_query($connect,$sql1);
}


 

     header('location:home.php')
 

 
?>
