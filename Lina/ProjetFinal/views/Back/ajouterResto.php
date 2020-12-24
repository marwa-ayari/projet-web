<?PHP
include_once "../../entites/resto.php";
include_once "../../core/restoC.php";
if(isset($_POST['ajouter']))
	 {
        if (isset($_POST['nom_resto']) and isset($_POST['pdp']) and isset($_POST['detail']) and isset($_POST['image1']) and isset($_POST['image2']) and isset($_POST['image3'])and isset($_POST['menu'])and isset($_POST['specialite'])){
        $restoTmp=new Resto($_POST['nom_resto'],$_POST['pdp'],$_POST['detail'],$_POST['image1'],$_POST['image2'],$_POST['image3'],$_POST['menu'],$_POST['specialite']);

        $restoTmpC=new RestoC();
        $restoTmpC->ajouterResto($restoTmp);
        header('Location: events_list.php');
            
        }else{
            echo "vérifier les champs";
        }
     }
?>