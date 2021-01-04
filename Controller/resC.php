<?PHP
include "config.php";

class resC
{
		function rechercheres($key)
	{
			
		$sql = "SELECT * FROM reservation WHERE nom LIKE '%$key%' OR email LIKE '%$key%'";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function afficherres()
	{
		$sql = "SELECT * FROM reservation";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function supprimerres($id)
	{
		include "../config.php";
		$sql = "DELETE FROM reservation where id= :id";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id', $id);//requete injection
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	
}
