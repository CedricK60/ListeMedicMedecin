<?php


  //connexion au serveur mysql
  $id = mysqli_connect("localhost","root","root","hopital");


  if(isset($_POST["bout"]))
  {
    //var_dump($_POST);
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $specialite = $_POST["specialite"];
    $service = $_POST["service"];

    $req = "insert into medecins values (null,'$nom','$prenom','$specialite','$service')";
    mysqli_query($id,$req);
    
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styleListeMedecins.css">
</head>
<body>

  <h1>Liste des medecins de l'hopital</h1><hr>
  <table>
    <tr>
      <th>Numéro</th><th>Nom</th><th>Prénom</th><th>Spécialité</th><th>Service</th>
      <th>Modif</th><th>Supp</th>
    </tr>
  <?php

    //Execution d'un requete sur le serveur
    $resultat = mysqli_query($id, "select * from medecins order by nom");

    
    //Recuperation de la 1ere ligne (premier medecin)
    while($ligne = mysqli_fetch_assoc($resultat))
    {

    echo "<tr class='lignes'>
            <td>".$ligne["numed"]."</td>
            <td>".$ligne["nom"]."</td>
            <td>".$ligne["prenom"]."</td>
            <td>".$ligne["specialite"]."</td>
            <td>".$ligne["service"]."</td>
            <td><a href='modif.php?numed=".$ligne["numed"]."'><img src='cray.png' width='20'></a></td>
            <td><a href='supp.php?numed=".$ligne["numed"]."'><img src='poub.png'width='20'></a></td>
            </tr>";
    }
  ?>
  </table>
  <hr>
  
  <h3>Ajout medecin</h3>
  <form action="" method="post">
    <input class="case" type="text" name="nom" placeholder="Nom du medecin" required>
    <input class="case" type="text" name="prenom" placeholder="Prénom du medecin" required>
    <input class="case" type="text" name="specialite" placeholder="Specialité du medecin" required>
    <input class="case" type="text" name="service" placeholder="Service du medecin" required><br><br>
    <input class="bouton" type="submit" value="Enregistrer" name="recherche" required><br><br>
  </form>

</body>
</html>

