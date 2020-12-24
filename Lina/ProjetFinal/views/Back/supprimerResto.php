<?PHP

include_once "../../core/restoC.php";
$restoC=new RestoC();
if (isset($_POST["id"])){
	$restoC->supprimerResto($_POST["id"]);
	header('Location: affichageResto.php');
}

?>