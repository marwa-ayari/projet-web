<?php
  include_once '../Model/Utilisateur.php';
  include_once '../Controller/UtilisateurC.php';
 $error = "";
 $utilisateurC = new UtilisateurC();

 if (isset($_GET["id"])) 
 {
    $utilisateurC->supprimerutilisateur($_GET["id"]);
     

 }
 else{
     $error = "Missing id";
     }

     header("location:../Back/examples/Gestionutilisateur.php"); 
?>