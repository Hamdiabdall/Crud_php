<?php 
include("connexion.php");
$sql="select * from etudiant";
$res=mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des etudiants</title> 
    <link rel="stylesheet" href="home.css">
    <script type="text/javascript">
      function cocher(etat)
      {
         var inputs= document.getElementById('formu').getElementsByTagName('input');
         for (var i =0;i<inputs.length;i++) {
            if(inputs[i].type=='checkbox') {
               inputs[i].checked=etat;
            } 

         }
      }
    </script>
    
</head>
<body>
   <h1 align="center">Liste des etudiants</h1>
   <form id="formu" action="suppmult.php" method="post">
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
        <th>Action</th>
        <th>Suppression multiple</th>
     </tr> 
     <?php while($ligne=mysqli_fetch_assoc($res))
     { ?>
     <tr>
        <td><img src="<?php echo $ligne["photo"]?>" width="100" height="100"></td>
        <td><?php echo $ligne["matricule"]?></td>
        <td><?php echo $ligne["nom"]?></td>
        <td><?php echo $ligne["prenom"]?></td>
        <td><?php echo $ligne["adresse"]?></td>
        <td><?php echo $ligne["naissance"]?></td>
        <td class="nowrap"><?php echo $ligne["filiere"]?></td>
        <td><?php echo $ligne["stage_id"]?></td>
        <td><?php echo $ligne["email"]?></td>
        <td><?php echo $ligne["password"]?></td>
        <td><a href="suppinter.php?id=<?php echo $ligne["id"]?>&mat=<?php echo $ligne["matricule"]?>&nom=<?php echo $ligne["nom"]?>"><button type="button">Supprimer</button></a>
           <a href="modif.php?id=<?php echo $ligne['id']?>"> <button type="button">Modifier</button></a>
        </td>
        <td>
            
                <input type="checkbox"  name="supp[]" value="<?php echo $ligne["id"]?>">
        </td>
     </tr>
     <?php } ?>
     <tr>
        <td colspan="11"></td>
        <td>Tout coucher<input type="checkbox" onclick="cocher(this.checked)" name="toutsupp"><input type="submit" value="supprimer"></td>
      
     </tr>
    </table>
    </form>
</body>
</html>
