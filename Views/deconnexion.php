<?php
session_start();
session_destroy();
echo 'Vous êtes déconnecté. <a href="signin.php">Se connecter ?</a>';
