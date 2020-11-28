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




?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->


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

<body class="login-img3-body">
	<!-- Start header -->
    
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<img src="../Views/images/logob.png"  height="80" width="250">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a class="nav-link" href="../Views/signup.php">Sign Up</a></li>
					<li class="nav-item active"><a class="nav-link" href="../Views/signin.php">Sign In</a></li>
                      <li class="nav-item"><a class="nav-link" href="../Views/index.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="../Views/menu.php">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="../Views/about.php">About</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Pages</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="../Views/reservation.php">Reservation</a>
								<a class="dropdown-item" href="../Views/stuff.php">Stuff</a>							</div>
						</li>
						
						<li class="nav-item"><a class="nav-link" href="../Views/contact.php">Contact</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	<div class="container">

    <form action="signin.php" method="POST">
    
    
    <div class="login-form">
			<div class="login-wrap">
            Login:
            <div class="input-group">
            <input type="text" name="login" id="login" onfocusout="vide_log()" Required>
            <label id="elementlog" name="erreur" style="color: red;display: none;">Ce champ est obligatoire</label> 

    </div>
     mot de passe:
    <div class="input-group">
    <input type="password" id="pass" name="pass"  onfocusout="vide_pass()"Required>
    <label id="elementpass" name="erreur" style="color: red;display: none;">Ce champ est obligatoire</label> 
    </div>
    
     <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Se Connecter" onClick="validation()">
     </div>
    </div>

</form>
</div>
<div id="error">
            
            <a href="../Views/afficher.php"> afficher ma base de donnees</a><br>
           
    <?php echo $error; ?>
            </div>
         <!--   <form action="supprimerutilisateur.php" method="POST">
            <table border="1" align="center"bordercolor="black" bgcolor="white">
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
            <table border="1" align="center"bordercolor="black" bgcolor="white">
            <tr>
                <td><label for="Modifier">Modifier selon id:
                            </label></td>
                            <td><input type="text" name="id" id="id" ></td>
                            <td>
                            <input type="submit" value="Modifier" > 
                        </td>
        </tr>
            </table>
                </form> -->
            

  
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
    }
    </script>

</html>