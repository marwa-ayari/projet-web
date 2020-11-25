<?php
  include_once '../Model/Utilisateur.php';
  include_once '../Controller/UtilisateurC.php';
 $error = "";
 $utilisateurC = new UtilisateurC();

 if (isset($_POST["id"])) 
 {
    $utilisateurC->supprimerutilisateur($_POST["id"]);
     

 }
 else{
     $error = "Missing id";
     }

     header("location:../Views/afficher.php"); 
?>