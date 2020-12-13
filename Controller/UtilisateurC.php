<?php
include_once "config.php" ;

    class UtilisateurC{
        public function afficherUtilisateurs() {
           
            try{
                $pdo=config::getConnexion();
                $query= $pdo ->prepare(
                    'SELECT * FROM utilisateur'
                );
                $query->execute();
                $result = $query->fetchAll();
            }
            catch(PDOException $e){
                $e->getMessage();
            }
            echo("<table border='1' align='center'><tr>");
            echo ("<td>");
            echo "ID";
            echo ("</td>");
            echo ("<td>");
            echo "CIN";
            echo ("</td>");
                echo ("<td>");
                echo "Nom";
                echo ("</td>");
                echo ("<td>");
                echo "Prenom";
                echo ("</td>");
                echo ("<td>");
                echo "Telephone";
                echo ("</td>");
                echo ("<td>");
                echo "Adresse";
                echo ("</td>");
                echo ("<td>");
                echo "Email";
                echo ("</td>");
                echo ("<td>");
                echo "Role";
                echo ("</td>");
                echo ("<td>");
                echo "LOGIN";
                echo ("</td>");
                echo ("</td>");echo ("<td>");
                echo "Password";
                echo ("</td>");
                echo ("<td>");
                echo "MODIFIER";
                echo ("</td>");
                echo ("<td>");
                echo "SUPPRIMER";
                echo ("</td>");
                echo "</tr>";

            foreach($result as $rows)
            {
            echo ("<tr><td>");
            echo $rows['id'];
            echo ("</td>");
            echo ("<td>");
            echo $rows['CIN'];
            echo ("</td>");
                echo ("<td>");
                echo $rows['nom'];
                echo ("</td>");
                echo ("<td>");
                echo $rows['prenom'];
                echo ("</td>");
                echo ("<td>");
                echo $rows['telephone'];
                echo ("</td>");
                echo ("<td>");
                echo $rows['adresse'];
                echo ("</td>");
                echo ("<td>");
                echo $rows['email'];
                echo ("</td>");
                echo ("<td>");
                echo $rows['role'];
                echo ("</td>");
                echo ("<td>");
                echo $rows['login'];
                echo ("</td>");
                echo ("</td>");
                echo ("<td>");
                echo $rows['password'];
                echo ("</td>");
                echo ("<td>");
                echo("<a href=../Controller/modifierutilisateur.php?id=".$rows['id']." >Modifier</a>");
                echo ("</td>");
                echo ("<td>");
                echo("<a href=../Controller/supprimerutilisateur.php?id=".$rows['id']." >Supprimer</a>");
                echo ("</td>");
            echo("</tr>");
        }
    echo("</table> ");
        }

        public  function unique_log($ch) {
               $utiC=new UtilisateurC();
               $pdo=config::getConnexion();
                   $query= $pdo ->prepare("select * from utilisateur where login= '$ch' ");
                   $query->execute(['login' => $ch]);
                    $result = $query->fetchAll();
                    foreach($result as $rows)
                    {
                    if($rows['login'] == $ch) {
                        return true;
                    }
                     else { return false; }
                    } 
                
            
        } 

        public function ajouterUtilisateur($Utilisateur) {
    $sql="insert into utilisateur(CIN,nom,prenom,telephone,email,login,password,role,adresse) values(:CIN,:nom,:prenom,:telephone,:email, :login, :password, :role, :adresse)";
    $db=config::getConnexion();
    $query=$db->prepare($sql);
    $query->execute([
                    'CIN' => $Utilisateur->getCIN(),
					'nom' => $Utilisateur->getNom(),
                    'prenom' => $Utilisateur->getPrenom(),
                    'telephone' => $Utilisateur->getTelephone(),
                    'email' => $Utilisateur->getEmail(),
					'login' => $Utilisateur->getLogin(),
                    'password' => $Utilisateur->getPassword(),
                    'role' => $Utilisateur->getRole(),
					'adresse' => $Utilisateur->getAdresse()
                    
				]); 
    	}
     
        public function supprimerutilisateur($id) {
    		$sql='delete  from utilisateur where id= :id';
    		$db=config::getConnexion();
    		$query=$db->prepare($sql);
    		$query->execute([
					'id' => $id]);
        }
        public function modifierutilisateur($CIN,$nom,$prenom,$telephone,$email,$login,$password,$role,$adresse,$id) {
            $sql="update utilisateur SET 
                                CIN = :CIN,
                                nom = :nom, 
                                prenom = :prenom,
                                telephone = :telephone,
                                email = :email,
                                login = :login,
                                password = :password,
                                role = :role,
                                adresse = :adresse
                                WHERE id = :id";
            $db=config::getConnexion(); 
            $query=$db->prepare($sql);
            $query->execute([
                            'CIN' => $CIN,
                            'nom' => $nom,
                            'prenom' => $prenom,
                            'telephone' => $telephone,
                            'email' => $email,
                            'login' => $login,
                            'password' => $password,
                            'role' => $role,
                            'adresse' => $adresse,
                            'id' => $id
                        ]); 
            }
            public function modifiercompte($CIN,$nom,$prenom,$telephone,$email,$login,$password,$role,$adresse) {
                $sql="update utilisateur SET 
                                    CIN = :CIN,
                                    nom = :nom, 
                                    prenom = :prenom,
                                    telephone = :telephone,
                                    email = :email,
                                    password = :password,
                                    role = :role,
                                    adresse = :adresse
                                    WHERE login = :login";
                $db=config::getConnexion(); 
                $query=$db->prepare($sql);
                $query->execute([
                                'CIN' => $CIN,
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'telephone' => $telephone,
                                'email' => $email,
                                'login' => $login,
                                'password' => $password,
                                'role' => $role,
                                'adresse' => $adresse                            ]); 
                }

            function connexionUser($login,$password){
                $sql="SELECT * FROM utilisateur WHERE login='" . $login . "' and password = '". $password."'";
                $db = config::getConnexion();
                try{
                    $query=$db->prepare($sql);
                    $query->execute();
                    $count=$query->rowCount();
                    if($count==0) {
                        $message = "le login ou le mot de passe est incorrect";
                    } else {
                        $x=$query->fetch();
                        $message = $x['role'];
                    }
                }
                catch (Exception $e){
                        $message= " ".$e->getMessage();
                }
              return $message;
            }
        
    }