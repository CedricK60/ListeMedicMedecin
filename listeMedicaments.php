<?php


  //connexion au serveur mysql
  $id = mysqli_connect("localhost","root","root","hopital");


  if(isset($_POST["bout"]))
  {
    //var_dump($_POST);
    $designation = $_POST["designation"];
    $laboratoire = $_POST["laboratoire"];
    $prix = $_POST["prix"];

    if(isset($designation) and isset($laboratoire) and isset($prix))
    {
      $req = "insert into medicaments values (null,'$designation','$laboratoire','$prix')";
      mysqli_query($id,$req);
    }
  }


  // Récupère la recherche
  $recherche1 = isset($_POST['recherche1']) ? strtolower($_POST['recherche1']) : '';
  // la requete mysql
    $desi = $id->query(
      "SELECT designation FROM medicaments
      WHERE lower(designation) LIKE '%$recherche1%'");

  // Récupère la recherche
  $recherche2 = isset($_POST['recherche2']) ? strtolower($_POST['recherche2']) : '';
  // la requete mysql
    $labo = $id->query(
      "SELECT laboratoire FROM medicaments
      WHERE lower(laboratoire) LIKE '%$recherche2%'");

   //affichage du résultat
   //while( $r = mysqli_fetch_array($q))
   //{
   //echo 'Résultat de la recherche: '.$r['designation'].', '.$r['laboratoire'].' <br />';
   //}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styleListeMedicaments.css">
</head>
<body background="http://insiderfinancial.com/wp-content/uploads/2016/03/pills_les_cuncliffe_fotolia_41089054_m.jpg%22%3E">
<body>

  <h1>Liste des médicaments de l'hopital</h1><hr>
  <table>
    <tr>
     <th>Reference</th><th>Désignation</th><th>Laboratoire</th><th>Prix</th>
    </tr>
  <?php

    //Execution d'un requete sur le serveur
    $resultat = mysqli_query($id, "SELECT * FROM medicaments 
   
    
    order by designation");
  

    
    //Recuperation de la 1ere ligne (premier medecin)
    while($ligne = mysqli_fetch_assoc($resultat))
    {

    echo "<tr class='lignes'>
            <td>".$ligne["refmed"]."</td>
            <td>".$ligne["designation"]."</td>
            <td>".$ligne["laboratoire"]."</td>
            <td>".$ligne["prix"]."</td>
          </tr>";
    }
  ?>
  </table>
  <hr>
  
  <h3 class="titre">Ajout médicament</h3>

  <div>
    <form action="" method="post">
      <input class="case" type="text" name="designation" placeholder="Nom du medicament" >
      <input class="case" type="text" name="laboratoire" placeholder="Laboratoire du médicament" >
      <input class="case" type="text" name="prix" placeholder="Prix du médicaments" ><br><br>
      <input class="bouton" type="submit" value="Enregistrer" name="bout" ><br><br>
    </form>
      <hr>
    <form action="" method="post">
      <h3 class="titre">Recherche médicament</h3>
      <label for="mySearch">Rechercher une désignation :</label>
      <input class="case" type="text" name="recherche1" placeholder="recherche1"><br><br>
      <label for="mySearch">Rechercher un produit par son laboratoire :</label>
      <input class="case" type="text" name="recherche2" placeholder="recherche2"><br><br>
      <input class="bouton" type="submit" value="Rechercher" name="recherche"><br><br>
    </form>
  </div>
<body style="background-color:#95b5b8;"></body>

</body>
</html>