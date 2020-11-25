<?php
    include_once '../Controller/UtilisateurC.php';
    include_once '../Model/Utilisateur.php';
    
    $id = $_GET['id']; 

    $utilisateurC = new UtilisateurC();
        $pdo=config::getConnexion();
        $query= $pdo ->prepare("select * from utilisateur where id='$id'");
        $query->execute();
        $result = $query->fetchAll();

if(isset($_POST['update'])) 
{
    $CIN = $_POST['CIN'];
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $telephone = $_POST['telephone'];
    $email =$_POST['Email'];
    $login =$_POST['Login'];
    $password = $_POST['Password'];
    $utilisateurC->modifierutilisateur($CIN,$nom,$prenom,$telephone,$email,$login,$password,$id);
  	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h3>Modifier un utilisateur</h3>

<form method="POST">
<?php foreach($result as $rows) {?>
    <table border="1">
        <tr>
            <td>CIN</td>
            <td>Nom</td>
            <td>Prenom</td>          
            <td>Telephone</td>
            <td>Email</td>
            <td>Login</td>
            <td>Password</td>
        </tr>
        <tr>
        <td >
  <input type="number" name="CIN" value="<?php echo $rows['CIN'] ?>" placeholder="Enter your CIN" Required></td>
  
        <td >
  <input type="text" name="Nom" value="<?php echo $rows['nom'] ?>" placeholder="Enter name" Required></td>
  <td>
  <input type="text" name="Prenom" value="<?php echo $rows['prenom'] ?>" placeholder="Enter prenom" Required></td>
  <td >
  <input type="number" name="telephone" value="<?php echo $rows['telephone'] ?>" placeholder="Enter your phone number" Required></td>
  <td>
  <input type="email" name="Email"  value="<?php echo $rows['email'] ?>" pattern=".+@gmail.com|.+@esprit.tn" placeholder="Enter mail" Required></td>
  <td>
  <input type="text" name="Login" value="<?php echo $rows['login'] ?>" placeholder="Enter LOGIN" Required></td>
  <td>
  <input type="password" name="Password" value="<?php echo $rows['password'] ?>" placeholder="Enter PASSWORD" Required></td>
  <td>
  <input type="submit" name="update" value="Modifier"></td></tr>
<?php } ?>
</table>
</form>
<a href="../Views/afficher.php"> afficher ma base de donnees</a><br>
<a href="../Controller/connexion.php"> retourner à la page d'acceuil</a><br>

</body>
</html>
