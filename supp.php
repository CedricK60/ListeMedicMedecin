<?php
$numed = $_GET["numed"];
$id = mysqli_connect("localhost","root","root","hopital");

$req = "delete from medecins where numed=$numed";
//echo $req;
mysqli_query($id, $req);
//echo mysqli_error($id);

    // redirection immédiate
header("location:listeMedecin.php");

    //redirection temporisé avec message
//echo "Le medecin numéro $numed a été supprimé de la base hopital ...";
//echo "<br><br> Vous allez être redirigé...";

//header("refresh:3; url=listeMedecin.php"); // <---- redirection temporisé

?>