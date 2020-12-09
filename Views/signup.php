<?php
include_once '../Model/Utilisateur.php';
include_once '../Controller/UtilisateurC.php';
$error = "";
$utilisateur = null;
$utilisateurC = new UtilisateurC();

if (isset($_POST["CIN"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["telephone"]) && isset($_POST["dateNais"]) && isset($_POST["email"]) && isset($_POST["adresse"]) && isset($_POST["login"]) && isset($_POST["pass"]) && isset($_POST["role"])) {
    if ($utilisateurC->unique_log($_POST["login"]) == false) {
        $utilisateur = new Utilisateur(
            $_POST["CIN"],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST["telephone"],
            $_POST['dateNais'],
            $_POST['email'],
            $_POST['adresse'],
            $_POST['login'],
            $_POST['pass'],
            $_POST['role']

        );
        $utilisateurC->ajouterUtilisateur($utilisateur);
        //envoi d'un mail d'inscription valide
        

       /* function sanitize_my_email($field) {
            $field = filter_var($field, FILTER_SANITIZE_EMAIL);
            if (filter_var($field, FILTER_VALIDATE_EMAIL )) {
                return true;
            } else {
                return false;
            }
        }

        $to_email =$_POST['email'];
        $subject = 'Testing PHP Mail';
        $message = 'This mail is sent using the PHP mail Inscription valide';
        $headers = ' ';
        //check if the email address is invalid $secure_check
        $secure_check = sanitize_my_email($to_email);
        if ($secure_check == false) {
            echo "adresse email invalide";
        } else { //send email 
            mail($to_email, $subject, $message, $headers);
            echo ('<script> alert("Nous vous avons envoyer un mail"); </script>');
        }

*/

        header('Location:../Views/signin.php');
    } else {
        echo ('<script> alert("Ce compte login existe deja"); </script>');
    }
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
    <title>Dar Mima Inscription</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../Views/css/bootstrap-theme.css" rel="stylesheet">
    <!-- Custom2 styles -->
    <link href="../Views/css/style2.css" rel="stylesheet">
    <!-- Site Icons -->
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

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="login-img3-body">
    <!-- Start header -->

    <header class="top-navbar">
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
                        <li class="nav-item active"><a class="nav-link" href="../Views/signup.php">S'inscrire</a></li>
                        <li class="nav-item"><a class="nav-link" href="../Views/signin.php">Connexion</a></li>


                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->


    <div class="container">
        <form action="signup.php" method="POST">
            <div class="login-form">
                <div class="login-wrap">
                    CIN:
                    <div class="input-group">
                        <input type="number" id="CIN" name="CIN" placeholder="CIN" minlength="8" maxlength="8" onfocusout="cinfc()" Required>
                        <label id="elementcin" name="erreur" style="color: red;display: none;">Le CIN est invalide</label>
                    </div>


                    Nom:
                    <div class="input-group">
                        <input type="text" id="nom" name="nom" placeholder="nom" onfocusout="majus_nom()" Required>
                        <label id="element" name="erreur" style="color: red;display: none;">Le nom doit commencer par une majuscule </label>
                    </div>

                    Prenom:
                    <div class="input-group">
                        <input type="text" id="prenom" name="prenom" placeholder="prenom" onfocusout="majus_prenom()" Required>
                        <label id="element1" name="erreur" style="color: red;display: none;">Le prenom doit commencer par une majuscule </label>
                    </div>

                    Date de naissance:
                    <div class="input-group">
                        <input type="date" id="dateNais" name="dateNais" onfocusout="age()" Required>
                        <label id="elementdate" name="erreur" style="color: red;display: none;">Cette date n'existe pas encore </label>
                    </div>

                    Adresse mail:
                    <div class="input-group">
                        <input type="email" name="email" id="email"  placeholder="Enter mail" onfocusout="ad_email()" Required>
                        <label id="elementemail" name="erreur" style="color: red;display: none;">L'adresse email est invalide </label>
                    </div>

                    Telephone:
                    <div class="input-group">
                        <input type="number" id="telephone" name="telephone" placeholder="24123856" minlength="8" maxlength="8" onfocusout="telephonefc()" Required>
                        <label id="element2" name="erreur" style="color: red;display: none;">Le numéro de
                            téléphone est erroné </label>
                    </div>

                    Type de compte:
                    <div class="input-group">
                        <div>
                            <select id="role" name="role" onfocusout="prof()" Required>
                                <option value="select">select</option>
                                <option value="client">Client</option>
                                <option value="resteurateur">Restaurateur</option>
                                <option value="livreur">Livreur</option>

                            </select>
                        </div><label id="elementpr" name="erreur" style="color: red;display: none;">Veuillez choisir un type de compte </label>
                    </div>

                    Adresse:
                    <div class="input-group">
                        <textarea name="adresse" id="adresse" cols="30" rows="2" Required></textarea>
                    </div>

                    Login:
                    <div class="input-group">
                        <input type="text" name="login" id="login" placeholder="suzanne12" onfocusout="vide_unique_log()" Required>
                        <label id="elementlog" name="erreur" style="color: red;display: none;">Le login est obligatoire et doit etre unique</label>
                    </div>

                    mot de passe:
                    <div class="input-group">
                        <input type="password" id="pass1" name="pass" placeholder="*****" onfocusout="passf()" Required>
                    </div>

                    confirmer mot de passe:
                    <div class="input-group">
                        <input type="password" id="pass2" placeholder="*****" onfocusout="passf()" Required> <label id="elementpass" name="erreur" style="color: red;display: none;">Veuillez verifier votre mot de passe </label>
                    </div>


                    <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="S'inscrire" onClick="validation()">
                </div>
            </div>


        </form>
    </div>

    <script>
        function majus_nom() {
            var ch = document.getElementById("nom").value;
            var element = document.getElementById("element");
            if ((ch === "") || (ch.charCodeAt(0) < 65) || (ch.charCodeAt(0) > 91)) {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }

        function majus_prenom() {
            var ch = document.getElementById("prenom").value;
            var element = document.getElementById("element1");
            if ((ch === "") || (ch.charCodeAt(0) < 65) || (ch.charCodeAt(0) > 91)) {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }

        function ad_email() {
            var expressionReguliere = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
            var element = document.getElementById("elementemail");
            if (expressionReguliere.test(document.getElementById("email").value)) {
                element.style.display = "none";
            } else {
                element.style.display = "block";
            }
        }

        function age() {
            var today = new Date();
            var element = document.getElementById("elementdate");
            var dateNais = document.querySelector("#dateNais").value;
            dateNais = new Date(dateNais);
            if ((today.getFullYear() - dateNais.getFullYear()) < 0) {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }

        function telephonefc() {
            var element = document.getElementById("element2");
            if (Number(document.getElementById("telephone").value) < 10000000) {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }

        function cinfc() {
            var element = document.getElementById("elementcin");
            if (Number(document.getElementById("CIN").value) < 10000000) {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }

        function prof() {
            var pr = document.getElementById("role").value;
            var element = document.getElementById("elementpr");
            if (pr === "select") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }

        function passf() {
            var ch1 = document.getElementById("pass1").value;
            var ch2 = document.getElementById("pass2").value;
            var element = document.getElementById("elementpass");
            if ((ch1 != "") && (ch2 != "") && (ch1 == ch2)) {
                element.style.display = "none";
            } else {
                element.style.display = "block";
            }
        }

        function vide_unique_log() {
            var ch = document.getElementById("login").value;
            var element = document.getElementById("elementlog");
            if (ch === "") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }

        }

        function validation() {
            majus_nom();
            majus_prenom();
            ad_email();
            age();
            telephonefc();
            cinfc();
            prof();
            passf();
            vide_unique_log();
            var error1 = document.getElementById("element");
            var error2 = document.getElementById("element1");
            var error3 = document.getElementById("element2");
            var error4 = document.getElementById("elementdate");
            var error5 = document.getElementById("elementpr");
            var error6 = document.getElementById("elementemail");
            var error7 = document.getElementById("elementpass");
            var error8 = document.getElementById("elementlog");
            var error0 = document.getElementById("elementcin");
            var ch = document.getElementById("nom").value;
            var ch1 = document.getElementById("prenom").value;

            if ((error0.style.display == "none") && (error1.style.display == "none") && (error2.style.display == "none") && (error4.style.display == "none") && (error3.style.display == "none") && (error5.style.display == "none") && (error6.style.display == "none") && (error7.style.display == "none") && (error8.style.display == "none"))
                alert("Formulaire bien rempli");
            else alert("Votre formulaire est mal rempli");
        }
    </script>
    </form>
</body>


</html>