<?PHP
include_once "../../entities/resto.php";
include_once "../../core/restoC.php";
if ($_POST['modifier']){
    $resto= new Resto($_POST['nom_resto'],$_POST['pdp'],$_POST['detail'],$_POST['image1'],$_POST['image2'],$_POST['image3'],$_POST['menu'],$_POST['specialite']);
    $restoC= new RestoC();
    $restoC->modifierResto($resto,$_POST['id_ini']);
    header('Location: affichageResto.php');
}	
?>