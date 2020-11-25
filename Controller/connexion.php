<?php
  include_once '../Model/Utilisateur.php';
  include_once '../Controller/UtilisateurC.php';
 $error = "";
 $utilisateur = null;
 $utilisateurC = new UtilisateurC();

 if (isset($_POST["CIN"]) &&isset($_POST["nom"])&& isset($_POST["prenom"]) &&isset($_POST["telephone"]) && isset($_POST["dateNais"]) && isset($_POST["email"]) && isset($_POST["adresse"]) && isset($_POST["login"]) && isset($_POST["pass"])) 
 {
     $utilisateur = new Utilisateur(
        $_POST["CIN"],
         $_POST['nom'],
         $_POST['prenom'],
         $_POST["telephone"],
         $_POST['dateNais'], 
         $_POST['email'],
         $_POST['adresse'],
         $_POST['login'],
         $_POST['pass']
         
     );
$utilisateurC->ajouterUtilisateur($utilisateur);

 }



?>
<!DOCTYPE html>

<html>

<head>
    <title>SIGN UP page</title>
</head>
<h2>if you want to sign in click here  </h2>
<a href="../Controller/signin.php"> SIGN IN</a><br>
<body>

       <h2>Sign Up</h2>
    
    <form action="connexion.php" method="POST">
    <table border="1" width="50%">
    <td rowspan="10">Informations personnelles</td>
    <tr>
            
            <td>CIN:</td>
            <td><input type="number" id="CIN" name="CIN" placeholder="CIN" minlength="8" maxlength="8" onfocusout="cinfc()" Required>
            <label id="elementcin" name="erreur" style="color: red;display: none;">Le CIN est erroné</label> </td>

        </tr>
        <tr>
            
            <td>Nom:</td>
            <td><input type="text" id="nom" name="nom" onfocusout="majus_nom()" Required> <label id="element" name="erreur"
                    style="color: red;display: none;">Le nom doit commencer par une majuscule </label></td>

        </tr>

        <tr>

            <td>Prenom:</td>
            <td><input type="text" id="prenom" name="prenom" onfocusout="majus_prenom()" Required> <label id="element1"
                    name="erreur" style="color: red;display: none;">Le prenom doit commencer par une majuscule </label>
            </td>
        </tr>
        <tr>

            <td>Date de naissance:</td>
            <td><input type="date" id="dateNais" name="dateNais" onfocusout="age()" Required> <label id="elementdate" name="erreur"
                    style="color: red;display: none;">Moin de 18 ans </label>
            </td>
        </tr>

      
        <tr>


            <td>Sexe:</td>
            <td>
                <label>
                    <input type="radio" name="genre" value="f" checked>
                    Femme
                </label>
                <label>
                    <input type="radio" name="genre" value="h">
                    Homme
                </label>
            </td>
        </tr>
        <tr>

            <td>Adresse mail:</td>
            <td><input type="email" name="email" id="email" pattern=".+@gmail.com" placeholder="Enter mail"  onfocusout="ad_email()" Required>
            <label id="elementemail" name="erreur" style="color: red;display: none;">L'adresse email est invalide,elle doit se terminer par "@gmail.com"  </label> </td>
        </tr>
        <tr>

            <td>Telephone:</td>
            <td><input type="number" id="telephone" name="telephone" placeholder="24123856" minlength="8" maxlength="8" onfocusout="telephonefc()" Required>
            <label id="element2" name="erreur" style="color: red;display: none;">Le numéro de
                    téléphone est erroné' </label> </td>
        </tr>
        <tr>

            <td>Type de compte:</td>
            <td>
                <div>
                    <select id="profession" onfocusout="prof()" Required>
                        <option value="select">select</option>
                        <option value="client">Client</option>
                        <option value="administrateur">Administrateur</option>
                        <option value="resteurateur">Restaurateur</option>
                        <option value="livreur">Livreur</option>

                    </select>
                </div><label id="elementpr" name="erreur" style="color: red;display: none;">Veuillez choisir un type </label>
            </td>
        </tr>
        <tr>

            <td>Adresse:</td>
            <td><textarea name="adresse" id="adresse" cols="30" rows="10"  Required></textarea></td>
        </tr>
       
        <tr>
            <td rowspan="3">Informations de connexion</td>
            <td>Login:</td>
            <td><input type="text" name="login" id="login" onfocusout="vide_unique_log()"Required> 
            <label id="elementlog" name="erreur" style="color: red;display: none;">Le login est obligatoire et doit etre unique</label> </td>
</td>
        </tr>
        <tr>
            <td>mot de passe:</td>
            <td><input type="password" id="pass1" name="pass" onfocusout="passf()" Required> </td>
        </tr>
        <tr>
            <td>confirmer mot de passe:</td>
            <td><input type="password" id="pass2" onfocusout="passf()" Required> <label id="elementpass" name="erreur"
                    style="color: red;display: none;">Veuillez verifier votre mot de passe </label></td>
        </tr>
        <tr>
            <td></td>


            <td><input type="submit" name="submit" value="S'inscrire" onClick="validation()"></td>
        </tr>
    </table>
</form>
<div id="error">
            
            <a href="../Views/afficher.php"> afficher ma base de donnees</a><br>
           
    <?php echo $error; ?>
            </div>
            <form action="supprimerutilisateur.php" method="POST">
            <table border="1" align="center">
            <tr>
                <td><label for="Supprimer">Supprimer selon id:
                            </label></td>
                            <td><input type="text" name="id" id="id" ></td>
                            <td>
                            <input type="submit" value="Supprimer" > 
                        </td>
        </tr>
            </table>
                </form>
                <form action="modifierutilisateur.php" method="GET">
            <table border="1" align="center">
            <tr>
                <td><label for="Modifier">Modifier selon id:
                            </label></td>
                            <td><input type="text" name="id" id="id" ></td>
                            <td>
                            <input type="submit" value="Modifier" > 
                        </td>
        </tr>
            </table>
                </form>
            
    <script>
        function majus_nom() {
            var ch = document.getElementById("nom").value;
            var element = document.getElementById("element");
            if ((ch === "") || (ch.charCodeAt(0) < 65) || (ch.charCodeAt(0) > 91)) { element.style.display = "block"; } else { element.style.display = "none"; }
        }
        function majus_prenom() {
            var ch = document.getElementById("prenom").value;
            var element = document.getElementById("element1");
            if ((ch === "") || (ch.charCodeAt(0) < 65) || (ch.charCodeAt(0) > 91)) { element.style.display = "block"; } else { element.style.display = "none"; }
        }
        function ad_email() {
            var ch = document.getElementById("email").value;
            var element = document.getElementById("elementemail");
            if ((ch === "") || (ch.slice(ch.length-10,10)=!"@gmail.com")) { element.style.display = "block"; } else { element.style.display = "none"; }
        }
        function age() {
            var today = new Date();
            var element = document.getElementById("elementdate");
            var dateNais = document.querySelector("#dateNais").value;
            dateNais = new Date(dateNais);
            if ((today.getFullYear() - dateNais.getFullYear()) < 18) { element.style.display = "block"; } else { element.style.display = "none"; }
        }
        function telephonefc() {
            var element = document.getElementById("element2");
            if ( Number(document.getElementById("telephone").value) < 10000000) { element.style.display = "block"; } else { element.style.display = "none"; }
        }
        function cinfc() {
            var element = document.getElementById("elementcin");
            if ( Number(document.getElementById("CIN").value) < 10000000) { element.style.display = "block"; } else { element.style.display = "none"; }
        }
        function prof() {
            var pr = document.getElementById("profession").value;
            var element = document.getElementById("elementpr");
            if (pr === "select") { element.style.display = "block"; } else { element.style.display = "none"; }
        }
        
        function passf() {
            var ch1 = document.getElementById("pass1").value;
            var ch2 = document.getElementById("pass2").value;
            var element = document.getElementById("elementpass");
            if ((ch1 != "") && (ch2 != "") && (ch1 == ch2)) { element.style.display = "none"; } else { element.style.display = "block"; }
        }
        function vide_unique_log() {
            var ch = document.getElementById("login").value;
            var element = document.getElementById("elementlog");
            if (ch === "") { element.style.display = "block"; } else { element.style.display = "none"; }
            <?php /*
             $ch =echo(ch);
               $utiC=new UtilisateurC();
               $pdo=config::getConnexion();
                   $query= $pdo ->prepare("select * from utilisateur where login= '$ch' ");
                   $query->execute(['login' => $ch]);
                    $result = $query->fetchAll();
                    foreach($result as $rows)
                    {
                    if($rows['login'] == ch) {element.style.display = "block";} else { element.style.display = "none"; }
                    } 
                */
                ?>
        } 
        function validation() {
            majus_nom();majus_prenom();ad_email();age();telephonefc();cinfc();prof();passf();vide_unique_log();
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

            if ((error0.style.display == "none") &&(error1.style.display == "none") && (error2.style.display == "none") && (error4.style.display == "none") && (error3.style.display == "none") && (error5.style.display == "none")  && (error6.style.display == "none")&& (error7.style.display == "none")&& (error8.style.display == "none"))
                alert("Bienvenue" + ch + ch1);else alert("Votre formulaire est mal rempli");
        }
    </script>
    </form>
</body>


</html>