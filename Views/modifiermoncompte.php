<?php
include_once '../Controller/UtilisateurC.php';
include_once '../Model/Utilisateur.php';
session_start();
$login =$_SESSION['e'];

$utilisateurC = new UtilisateurC();
$pdo = config::getConnexion();
$query = $pdo->prepare("select * from utilisateur where login='$login'");
$query->execute();
$result = $query->fetchAll();

if (isset($_POST['update'])) {
  $CIN = $_POST['CIN'];
  $nom = $_POST['Nom'];
  $prenom = $_POST['Prenom'];
  $telephone = $_POST['telephone'];
  $email = $_POST['Email'];
  $login = $_POST['Login'];
  $password = $_POST['Password'];
  $adresse = $_POST['Adresse'];
  $role = $_POST['Role'];
  $utilisateurC->modifiercompte($CIN, $nom, $prenom, $telephone, $email, $login, $password, $role, $adresse);
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Site Metas -->
  <title>Dar Mima Modifier compte</title>
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

<body class="login-img3-body">

  <div class="about-section-box">
    <div class="container">

        <div class="col-lg-6 col-md-6 col-sm-12 ">
          <div class="inner-column">
            <h1 style="color:   #61e9f4;">
              Modifier mes coordonnées
            </h1>
            <h1 style="color:   #61e9f4;" >Bienvenue fi Dar mimaa</h1>
          </div>
        </div>
    </div>
  </div>

  <div class="container">
    <form method="POST">
      <div class="login-form">
        <div class="login-wrap">

          <?php foreach ($result as $rows) { ?>
            <a class="navbar-brand">
              <img src="../Views/images/logob.png" height="80" width="250">
            </a>

            CIN :
            <div class="input-group">
              <input class="form-control" type="number" name="CIN" value="<?php echo $rows['CIN'] ?>" placeholder="Enter your CIN" Required>
            </div>

            Nom :
            <div class="input-group">
              <input class="form-control" type="text" name="Nom" value="<?php echo $rows['nom'] ?>" placeholder="Enter name" Required>
            </div>

            Prenom :
            <div class="input-group">
              <input class="form-control" type="text" name="Prenom" value="<?php echo $rows['prenom'] ?>" placeholder="Enter prenom" Required>
            </div>

            Telephone :
            <div class="input-group">
              <input class="form-control" type="number" name="telephone" value="<?php echo $rows['telephone'] ?>" placeholder="Enter your phone number" Required>
            </div>

            Email :
            <div class="input-group">
              <input class="form-control" type="email" name="Email" value="<?php echo $rows['email'] ?>" pattern=".+@gmail.com|.+@esprit.tn" placeholder="Enter mail" Required>
            </div>

            Adresse :
            <div class="input-group">
              <input class="form-control" type="text" name="Adresse" value="<?php echo $rows['adresse'] ?>" placeholder="Votre adresse" Required>
            </div>

            Type de compte :
            <div class="input-group">

              <select class="form-control" name="Role" value="<?php echo $rows['role'] ?>" Required>
                <option value="client">Client</option>
                <option value="resteurateur">Restaurateur</option>
                <option value="livreur">Livreur</option>

              </select>
            </div>

            Login :
            <div class="input-group">
              <input class="form-control" type="text" name="Login" value="<?php echo $rows['login'] ?>" placeholder="Enter LOGIN" Required>
            </div>

            Mot de passe :
            <div class="input-group">
              <input class="form-control" type="password" name="Password" value="<?php echo $rows['password'] ?>" placeholder="Enter PASSWORD" Required>
            </div>
            <input class="btn btn-lg btn-circle btn-outline-new-white button3 form-control" type="submit" name="update" value="Modifier">

          <?php } ?>
        </div>
      </div>
    </form>
  </div>

</body>

</html>