<?php
  include_once '../Model/Utilisateur.php';
  include_once '../Controller/UtilisateurC.php';
 $error = "";
 if (isset($_POST["login"]) && isset($_POST["pass"])) 
 {
    $login=$_POST["login"];
    $password=$_POST["pass"];
    $utiC=new UtilisateurC();
    $pdo=config::getConnexion();
        $query= $pdo ->prepare("select * from utilisateur where login= '$login' and password= '$password'");
        $query->execute(['login' => $login]);
         $result = $query->fetchAll();
         echo("<table border='1' align='center'><tr>");
         // output data of each row
     foreach($result as $rows)
     {
         echo ("<td>");
         echo $rows['CIN'];
         echo ("</td>");
         echo ("<td>");
         echo $rows['nom'];
         echo ("</td>");
         echo ("<td>");
         echo $rows['prenom'];
         echo ("</td>");


     echo("</tr>");
 }
echo("</table>");}
else
{echo("Ce login n'existe pas");}

 



?>
<!DOCTYPE html>

<html>

<head>
    <title>SIGN IN page</title>
</head>
<h2>if you want to sign up click here  </h2>
<a href="../Controller/connexion.php"> SIGN UP</a><br>
<body>

       <h2>Sign In</h2>
    
    <form action="signin.php" method="POST">
    <table border="1" width="30%">
    
    
        <tr>
            <td>Login:</td>
            <td><input type="text" name="login" id="login" onfocusout="vide_log()" Required>
            <label id="elementlog" name="erreur" style="color: red;display: none;">Ce champ est obligatoire</label> </td>

        </tr>
        <tr>
            <td>mot de passe:</td>
            <td><input type="password" id="pass" name="pass"  onfocusout="vide_pass()"Required>
            <label id="elementpass" name="erreur" style="color: red;display: none;">Ce champ est obligatoire</label> </td>

        </tr>

        <tr>
        <td></td>
            <td><input type="submit" name="submit" value="Se Connecter" onClick="validation()"></td>
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
            

    </form>
</body>
<script>
        function vide_log() {
            var ch = document.getElementById("login").value;
            var element = document.getElementById("elementlog");
            if (ch === "") { element.style.display = "block"; } else { element.style.display = "none"; }
        }        
        function vide_pass() {
            var ch = document.getElementById("pass").value;
            var element = document.getElementById("elementpass");
            if (ch === "") { element.style.display = "block"; } else { element.style.display = "none"; }
        }
    function validation(){
        vide_log();
        vide_pass();
        var error1 = document.getElementById("elementlog");
        var error2 = document.getElementById("elementpass");
        if ((error2.style.display == "none") &&(error1.style.display == "none")) {alert("Vous etes connecté");}
        else{alert("votre compte n'existe pas,veuillez corriger votre login et mot de passe");}
    }
    </script>

</html>