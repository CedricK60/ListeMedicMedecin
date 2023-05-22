<?php
    $numed = $_GET["numed"];

    $id = mysqli_connect("localhost","root","root","hopital");
    $req = "select * from medecins where numed = $numed";
    $res = mysqli_query($id, $req);
    $ligne = mysqli_fetch_assoc($res);
?>

<!--
<input type="text" name="" value="toto">  remplir une valeur dans un input
<input type="text" name="" value="<?php //echo $numed;?>">
<input type="text" name="" value="<?//=$numed;?>"> lecture en php d'une seul value -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Modification des infos du medecin numéro <?=$numed?> : </h1>

<from action="modif2.php" method="post">

    <input type="hidden" name="numed" value="<?=$ligne["numed"];?>">
    <input type="text" name="nom" value="<?=$ligne["nom"];?>">
    <input type="text" name="prenom" value="<?=$ligne["prenom"];?>">
    <input type="text" name="specialite" value="<?=$ligne["specialite"];?>">
    <input type="text" name="service" value="<?=$ligne["service"];?>">
    <br><br>
    <input type="submit" value="Modifier" >
</form>

</body>
</html>

