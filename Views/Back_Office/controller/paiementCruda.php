<?php
include '../../../config.php';
include '../../../Model/paiement.php';
class paiementCrud
{
	/*function Afficherpaiement()
	{
		$sql = "SELECT * FROM paiement";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function Afficherpaiement_2() {
		$sql = "SELECT paiement.*, panier.prix FROM paiement JOIN panier ON paiement.idpai = panier.idpai";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}*/
	function Afficherpaiement() {
		$sql = "SELECT paiement.*, panier.prix FROM paiement JOIN panier ON paiement.idpai = panier.idpai";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function Ajouterpaiement($paiement) {
        $db = config::getConnexion();
        $prix_p = $paiement->get_prix_p(); 
    
        $checkSql = "SELECT * FROM panier WHERE id_p = :id_p";
        $checkStmt = $db->prepare($checkSql);
        $checkStmt->execute(['id_p' => $prix_p]);
        if ($checkStmt->rowCount() == 0) {
            die('Error: No matching id_p found in panier for the provided id_paner.');
        }
    
        $sql = "INSERT INTO paiement (num_cart, mot_cart, email, prix_p) VALUES (:num_cart, :mot_cart, :email, :prix_p)";
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'num_cart' => $paiement->get_num_cart(),
                'mot_cart' => $paiement->get_mot_cart(),
                'email' => $paiement->get_email(),
                'prix_p' => $prix_p
            ]);
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }



	function Modifierpaiement($paiement, $idpai)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				"UPDATE paiement SET 
    num_cart= :num_cart, 
    mot_cart= :mot_cart, 
    email= :email
 WHERE idpai= :idpai"
			);
			$query->execute([
				'num_cart' => $paiement->get_num_cart(),
				'mot_cart' => $paiement->get_mot_cart(),
				'email' => $paiement->get_email(),
                
				'idpai' => $idpai
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
	function getPrixFromPanier($prix_p)
    {
        $sql = "SELECT prix FROM panier WHERE id_p = :id_p";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id_p' => $prix_p]);
            $row = $query->fetch(PDO::FETCH_ASSOC);
            return $row['prix'];
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
            return null;
        }
    }
	public function search($search_query = '') {
        $sql = 'SELECT * FROM evenement';
    
        if (!empty($search_query)) {
            $sql .= " WHERE num_cart LIKE ? OR email LIKE ?";
        }
    
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            if (!empty($search_query)) {
                $search_param = "%$search_query%";
                $query->bindParam(1, $search_param, PDO::PARAM_STR);
                $query->bindParam(2, $search_param, PDO::PARAM_STR);
            }
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

	function Supprimerppaiement($idpai)
	{
		$sql = "DELETE FROM paiement WHERE idpai=:idpai";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':idpai', $idpai);
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function recupererpaiement($idpai)
	{
		$sql = "SELECT * FROM paiement WHERE idpai=:idpai"; // Use parameterized query
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute(['idpai' => $idpai]); // Binding the ID safely
			$panier = $query->fetch(); // Fetch the first record
			return $panier;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
}