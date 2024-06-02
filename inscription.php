<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
    <link rel="stylesheet" href="inscription.css">
</head>
<body>
<?php
    // Inclure le fichier de connexion à la base de données
    include("connexion.php");
?>

<fieldset>
    <legend>Inscription</legend>
    <form action="inscription2.php" method="post"  enctype="multipart/form-data">
        <table>
            <tr>
                <th>Matricule</th>
                <td><input type="text" name="matricule" placeholder="Taper votre matricule" required></td>
            </tr>
            <tr>
                <th>Nom</th>
                <td><input type="text" name="nom" placeholder="Taper votre nom"></td>
            </tr>
            <tr>
                <th>Prénom</th>
                <td><input type="text" name="prenom" placeholder="Taper votre prénom"></td>
            </tr>
            <tr>
                <th>Adresse</th>
                <td><input type="text" name="adresse" placeholder="Taper votre adresse"></td>
            </tr>
            <tr>
                <th>Date de naissance</th>
                <td><input type="date" name="naissance" placeholder="Taper votre date de naissance"></td>
            </tr>
            <tr>
                <th>Filière</th>
                <td>
                    <label for="filiere">Choisir une filière:</label>
                    <select name="filiere">
                        <?php 
                            // Récupérer les filières depuis la base de données
                            $sql1 = "SELECT * FROM filiere";
                            $res1 = mysqli_query($connect, $sql1);
                            while($ligne1 = mysqli_fetch_assoc($res1)) {
                        ?>
                        <option value="<?php echo $ligne1['filiere']; ?>"><?php echo $ligne1['filiere']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Stage</th>
                <td>
                    <label for="stage_id">Choisir un stage:</label>
                    <select name="stage_id">
                        <?php 
                            // Récupérer les stages depuis la base de données
                            $sql2 = "SELECT * FROM stage";
                            $res2 = mysqli_query($connect, $sql2);
                            while($ligne2 = mysqli_fetch_assoc($res2)) {
                        ?>
                        <option value="<?php echo $ligne2['id_stage']; ?>"><?php echo $ligne2['societe']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" name="email" placeholder="Taper votre email"></td>
            </tr>
            <tr>
                <th>Photo</th>
                <td><input type="file" name="photo" placeholder="photo"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="password" name="password" placeholder="Taper votre mot de passe"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Valider"></td>
                <td><input type="reset" value="Annuler"></td>
            </tr>
        </table>
    </form> 
</fieldset>

</body>
</html>