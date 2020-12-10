<?php
include_once '../Model/Utilisateur.php';
include_once '../Controller/UtilisateurC.php';

session_start();
$message = "";
$userC = new UtilisateurC();
if (
    isset($_POST["login"]) &&
    isset($_POST["pass"])
) {
    if (
        !empty($_POST["login"]) &&
        !empty($_POST["pass"])
    ) {
        $message = $userC->connexionUser($_POST["login"], $_POST["pass"]);
        $_SESSION['e'] = $_POST["login"]; // on stocke dans le tableau une colonne ayant comme nom "e",
        //  avec l'email à l'intérieur
        if ($message != 'le login ou le mot de passe est incorrect') {



            header('Location:../Views/index.php');
        } else {
            $message = 'le login ou le mot de passe est incorrect';
        }
    } else
        $message = "Missing information";
    echo ('<script> alert("Vos données sont incorrectes, Veuillez réessayer"); </script>');
}

?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Dar Mima Connexion</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../Views/css/bootstrap-theme.css" rel="stylesheet">
    <!-- Custom2 styles -->
    <link href="../Views/css/style2.css" rel="stylesheet">
    <!-- Site2 Icons -->
    <link rel="shortcut icon" href="../Views/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="../Views/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Views/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../Views/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../Views/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../Views/css/custom.css">
    <!-- Login CSS -->
    <link rel="stylesheet" href="../Views/css/logintheme.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="login-img2-body">
    <!-- Start header -->
    <!-- <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="../Views/images/logob.png" height="80" width="250">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-rs-food">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="../Views/signup.php">S'inscrire</a></li>
                        <li class="nav-item active"><a class="nav-link" href="../Views/signin.php">Connexion</a></li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    -->
    <!-- End header -->
    <style>
        .button2 {
            background-color: transparent;
        }

        .button3 {
            background-color: #fd7e14;
        }

        .button3:hover {
            background-color: transparent;
            color: white;
        }

        .button2:hover {
            background-color: #03a7dc;
            color: white;
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-light">

        <div class="container">


            <div class="pull-right">

                <a class="btn btn-lg btn-circle btn-outline-new-white button2" href="../Views/signup.php" style>S'inscrire</a>
            </div>
        </div>
    </nav>
    <form action="signin.php" method="POST">
        <div class="login-form">
            <div class="login-wrap">
                <a class="navbar-brand">
                    <img src="../Views/images/logob.png" height="80" width="250">
                </a>
                Login :
                <div class="input-group">
                    <input type="text" name="login" id="login" onfocusout="vide_log()" Required>
                    <label id="elementlog" name="erreur" style="color: red;display: none;">Ce champ est obligatoire</label>

                </div>
                Mot de passe :
                <div class="input-group">
                    <input type="password" id="pass" name="pass" onfocusout="vide_pass()" Required>
                    <label id="elementpass" name="erreur" style="color: red;display: none;">Ce champ est obligatoire</label>
                </div>

                <input class="btn btn-primary btn-block btn-lg btn-circle btn-outline-new-white button3" type="submit" name="submit" value="Se Connecter" onClick="validation()">
            </div>
        </div>
        </div>
    </form>



</body>
<script>
    function vide_log() {
        var ch = document.getElementById("login").value;
        var element = document.getElementById("elementlog");
        if (ch === "") {
            element.style.display = "block";
        } else {
            element.style.display = "none";
        }
    }

    function vide_pass() {
        var ch = document.getElementById("pass").value;
        var element = document.getElementById("elementpass");
        if (ch === "") {
            element.style.display = "block";
        } else {
            element.style.display = "none";
        }
    }

    function validation() {
        vide_log();
        vide_pass();
    }
</script>

</html>