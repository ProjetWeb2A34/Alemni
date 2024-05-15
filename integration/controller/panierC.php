<?php
include_once "../../../config.php";
include_once '../../../model/panier.php';
class panierC
{
	function Afficherpanier()
	{
		$sql = "SELECT * FROM panier";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}

	function Ajouterpanier($panier)
	{
		$sql = "INSERT INTO panier (nom_p,prix,qunatite) 
			VALUES (:nom_p,:prix,:qunatite)";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute([
				'nom_p' => $panier->get_nom_p(),
				'prix' => $panier->get_prix(),
				'qunatite' => $panier->get_qunatite(),


			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}
	public function chercherreclamation($qunatite)
        {
            $query = "SELECT * FROM panier WHERE qunatite LIKE '%$qunatite%'";
            $conn = config::getConnexion();
            try {
                $result = $conn->query($query);
                return $result->fetchAll();
            } catch (PDOException $e) {
                echo "Erreur: " . $e->getMessage();
            }}
       



	function Modifierpanier($panier, $id_p)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				"UPDATE panier SET 
						nom_p= :nom_p, 
						prix= :prix, 
						qunatite= :qunatite 
						
					WHERE id_p= :id_p"
			);
			$query->execute([
				'nom_p' => $panier->get_nom_p(),
				'prix' => $panier->get_prix(),
				'qunatite' => $panier->get_qunatite(),


				'id_p' => $id_p
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}

	function Supprimerpanier($id_p)
	{
		$sql = "DELETE FROM panier WHERE id_p=:id_p";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id_p', $id_p);
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function recupererpanier($id_p)
	{
		$sql = "SELECT * FROM panier WHERE id_p=:id_p"; // Use parameterized query
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute(['id_p' => $id_p]); // Binding the ID safely
			$panier = $query->fetch(); // Fetch the first record
			return $panier;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
}
