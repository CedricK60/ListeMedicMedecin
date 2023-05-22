<?php
$numed = $_POST["numed"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$specialite = $_POST["specialite"];
$service = $_POST["service"];
$id = mysqli_connect("localhost","root","root","hopital");
$req = "update medecins set nom = '$nom',
                            prenom = '$prenom'
                            specialite = '$specialite'
                            service ='$service'
        where numed = '$numed'";
mysqli_query($id, $req);
header("location:listeMedecin.php");
?>