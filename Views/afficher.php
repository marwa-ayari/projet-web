<?php
    include_once '../Model/Utilisateur.php';
    include_once '../Controller/UtilisateurC.php';
    $utilisateurC = new UtilisateurC();
    $utilisateurC->afficherUtilisateurs();
?>
