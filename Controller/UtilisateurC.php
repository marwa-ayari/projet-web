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
                echo "Email";
                echo ("</td>");echo ("<td>");
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
                echo $rows['email'];
                echo ("</td>");echo ("<td>");
                echo $rows['login'];
                echo ("</td>");
                echo ("</td>");echo ("<td>");
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
    $sql="insert into utilisateur(CIN,nom,prenom,telephone,email,login,password) values(:CIN,:nom,:prenom,:telephone,:email, :login, :password)";
    $db=config::getConnexion();
    $query=$db->prepare($sql);
    $query->execute([
                    'CIN' => $Utilisateur->getCIN(),
					'nom' => $Utilisateur->getNom(),
                    'prenom' => $Utilisateur->getPrenom(),
                    'telephone' => $Utilisateur->getTelephone(),
                    'email' => $Utilisateur->getEmail(),
					'login' => $Utilisateur->getLogin(),
                    'password' => $Utilisateur->getPassword()
                    
				]); 
    	}
     
        public function supprimerutilisateur($id) {
    		$sql='delete  from utilisateur where id= :id';
    		$db=config::getConnexion();
    		$query=$db->prepare($sql);
    		$query->execute([
					'id' => $id]);
        }
        public function modifierutilisateur($CIN,$nom,$prenom,$telephone,$email,$login,$password,$id) {
            $sql="update utilisateur SET 
                                CIN = :CIN,
                                nom = :nom, 
                                prenom = :prenom,
                                telephone = :telephone,
                                email = :email,
                                login = :login,
                                password = :password
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
                            'id' => $id
                        ]); 
            }
        
    }