<?PHP
include_once "../../config.php";
class RestoC{

    function ajouterResto($resto){
        $sql="INSERT INTO restos (nom_resto, pdp, detail, image1, image2 , image3, menu , specialite) VALUES (:nom_resto, :pdp, :detail, :image1, :image2, :image3, :menu , :specialite)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $nom_resto=$resto->getNom_resto();
            $pdp=$resto->getPdp();
            $detail=$resto->getDetail();
            $image1=$resto->getImage1(); 
            $image2=$resto->getImage2();
            $image3=$resto->getImage3(); 
            $menu=$resto->getMenu();
            $specialite=$resto->getSpecialite();
            $req->bindValue(':nom_resto',$nom_resto);
            $req->bindValue(':pdp',$pdp); 
            $req->bindValue(':detail',$detail);
            $req->bindValue(':image1',$image1); 
            $req->bindValue(':image2',$image2);
            $req->bindValue(':image3',$image3); 
            $req->bindValue(':menu',$menu);
            $req->bindValue(':specialite',$specialite);
            
            $req->execute();
        }catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    
    }  
    function afficherResto(){
        $sql="SELECT * From restos";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    } 
    function supprimerResto($id){
        $sql="DELETE FROM restos where id=:id";
        $db=config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        try{
            $req->execute();
        }catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        } 

    }  

    function modifierResto($resto,$id){
        $sql="UPDATE restos SET nom_resto=:nom_resto, pdp=:pdp, image1=:image1, image2=:image2, image3=:image3 , menu=:menu, detail=:detail ,specialite=:specialite  WHERE id=:id";
        $db = config::getConnexion();

        try{
            $req=$db->prepare($sql);
            $nom_resto=$resto->getNom_resto();
            $pdp=$resto->getPdp();
            $detail=$resto->getDetail();
            $image1=$resto->getImage1(); 
            $image2=$resto->getImage2();
            $image3=$resto->getImage3(); 
            $menu=$resto->getMenu();
            $specialite=$resto->getSpecialite();
            $datas = array(':id'=>$id,':nom_resto'=>$nom_resto , ':pdp'=>$pdp, ':detail'=>$detail, ':image1'=>$image1,':image2'=>$image2,':image3'=>$image3,':specialite'=>$specialite, ':menu'=>$menu);

            $req->bindValue(':nom_resto',$nom_resto);
            $req->bindValue(':pdp',$pdp); 
            $req->bindValue(':detail',$detail);
            $req->bindValue(':image1',$image1); 
            $req->bindValue(':image2',$image2);
            $req->bindValue(':image3',$image3); 
            $req->bindValue(':menu',$menu);
            $req->bindValue(':specialite',$specialite);
            
            $s=$req->execute();
        }catch(Exception $e){
            echo "Erreur : ".$e->getMessage(); 
            echo "Les Datas : " ;
            print_r($datas);
            
            die;
        }
    } 
    function recupererResto($id){
		$sql="SELECT * from restos where id='".$id."' ";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die(    'Erreur: '.$e->getMessage());
        }
    }

   
   
} 

?> 