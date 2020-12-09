<?php
include_once '../Controller/UtilisateurC.php';
include_once '../Model/Utilisateur.php';

$id = $_GET['id'];

$utilisateurC = new UtilisateurC();
$pdo = config::getConnexion();
$query = $pdo->prepare("select * from utilisateur where id='$id'");
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
  $utilisateurC->modifierutilisateur($CIN, $nom, $prenom, $telephone, $email, $login, $password, $role, $adresse, $id);
  header("location:../Back/examples/tables.php");
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



<body class="login-img3-body">
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
            <li class="nav-item"><a class="nav-link" href="../Views/signup.php">Sign Up</a></li>
            <li class="nav-item"><a class="nav-link" href="../Views/signin.php">Sign In</a></li>
            <li class="nav-item"><a class="nav-link" href="../Views/index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="../Views/menu.php">Menu</a></li>
            <li class="nav-item"><a class="nav-link" href="../Views/about.php">About</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Pages</a>
              <div class="dropdown-menu" aria-labelledby="dropdown-a">
                <a class="dropdown-item" href="../Views/reservation.php">Reservation</a>
                <a class="dropdown-item" href="../Views/stuff.php">Stuff</a> </div>
            </li>

            <li class="nav-item"><a class="nav-link" href="../Views/contact.php">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- End header -->





  <h3>Modifier cet utilisateur</h3>

  <div class="container">
    <form method="POST">
      <div class="login-form">
        <div class="login-wrap">

          <?php foreach ($result as $rows) { ?>


            CIN:
            <div class="input-group">
              <input type="number" name="CIN" value="<?php echo $rows['CIN'] ?>" placeholder="Enter your CIN" Required>
            </div>

            Nom:
            <div class="input-group">
              <input type="text" name="Nom" value="<?php echo $rows['nom'] ?>" placeholder="Enter name" Required>
            </div>

            Prenom:
            <div class="input-group">
              <input type="text" name="Prenom" value="<?php echo $rows['prenom'] ?>" placeholder="Enter prenom" Required>
            </div>

            Telephone:
            <div class="input-group">
              <input type="number" name="telephone" value="<?php echo $rows['telephone'] ?>" placeholder="Enter your phone number" Required>
            </div>

            Email:
            <div class="input-group">
              <input type="email" name="Email" value="<?php echo $rows['email'] ?>" pattern=".+@gmail.com|.+@esprit.tn" placeholder="Enter mail" Required>
            </div>

            Adresse:
            <div class="input-group">
              <input type="text" name="Adresse" value="<?php echo $rows['adresse'] ?>" placeholder="Votre adresse" Required>
            </div>

            Type de compte:
            <div class="input-group">

              <select name="Role" value="<?php echo $rows['role'] ?>" Required>
                <option value="select">select</option>
                <option value="client">Client</option>
                <option value="resteurateur">Restaurateur</option>
                <option value="livreur">Livreur</option>

              </select>
            </div>





            Login:
            <div class="input-group">
              <input type="text" name="Login" value="<?php echo $rows['login'] ?>" placeholder="Enter LOGIN" Required>
            </div>

            Mot de passe:
            <div class="input-group">
              <input type="password" name="Password" value="<?php echo $rows['password'] ?>" placeholder="Enter PASSWORD" Required>
            </div>
            <input class="btn btn-primary btn-lg btn-block" type="submit" name="update" value="Modifier">

          <?php } ?>
        </div>
      </div>
    </form>
  </div>

</body>

</html>