<?php 
$id=$_GET['id'];
include("connexion.php");
$sql="select * from etudiant where id=$id";
$res=mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des etudiants</title> 
    <link rel="stylesheet" href="home.css">

    
</head>
<body>
   <h1 align="center">Modifier un Etudiant</h1>
   <form action="modif2.php" method="post" enctype="multipart/form-data">
    <table>
     <tr>
        <th>Photo</th>
        <th>Matricule</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Adresse</th>
        <th>Date de naissance</th>
        <th>Filiere</th>
        <th>Identifiant de stage</th>
        <th>Email</th>
        <th>Password</th>
        
     </tr> 
     <?php while($ligne=mysqli_fetch_assoc($res))
     { ?>
     <tr>
        <td><img src="<?php echo $ligne["photo"]?>" width="100" height="100">
    <input type="file" name="photo">
    </td>
        <td><input type="text" name="matricule" value="<?php echo $ligne["matricule"]?>"></td>
        <td><input type="text" name="nom" value="<?php echo $ligne["nom"]?>"></td>
        <td><input type="text" name="prenom" value="<?php echo $ligne["prenom"]?>"></td>
        <td><input type="text" name="adresse" value="<?php echo $ligne["adresse"]?>"></td>
        <td><input type="date" name="naissance" value="<?php echo $ligne["naissance"]?>"></td>
        <td class="nowrap">
            <select name="filiere">
            <?php 
                            $sql1 = "SELECT * FROM filiere";
                            $res1 = mysqli_query($connect, $sql1);
                            while($ligne1 = mysqli_fetch_assoc($res1)) {
                                if($ligne["filiere"]==$ligne1["filiere"]){
                                    
                    
                        ?>
                <option value="<?php echo $ligne1['filiere']; ?>" selected><?php echo $ligne1['filiere']; ?></option>
                <?php }
                else {
                ?>
                <option value="<?php echo $ligne1['filiere']; ?>"><?php echo $ligne1['filiere']; ?></option>
                <?php } ?>
                
                        <?php } ?>

        </select></td>
        <td> <select name="stage_id">
                        <?php 
                    
                            $sql2 = "SELECT * FROM stage";
                            $res2 = mysqli_query($connect, $sql2);
                            while($ligne2 = mysqli_fetch_assoc($res2)) {
                                if($ligne["stage_id"]==$ligne2["id_stage"]){
                        ?>
                        <option value="<?php echo $ligne2['id_stage']; ?>" selected><?php echo $ligne2['societe']; ?></option>
                        <?php }
                else {
                ?>
                   <option value="<?php echo $ligne2['id_stage']; ?>" ><?php echo $ligne2['societe']; ?></option>
                   <?php } ?>


                        <?php } ?>
                    </select></td>
        <td><input type="email" name="email" value="<?php echo $ligne["email"]?>"></td>
        <td><input type="password" name="password" value="<?php echo $ligne["password"]?>">
            <input type="hidden" name="id"  value="<?php echo $ligne["id"]?>" >
        </td>
    
        
     </tr>
     <?php } ?>
     <tr align="center">
        <td colspan="10">
            <input type="submit" value="Modifier">
            <a href="home.php"><button type="button">Annuler</button></a>
        </td>
     </tr>
     
    </table>
    </form>
</body>
</html>
