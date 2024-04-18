<?php
	 require_once  __DIR__.'/../config.php';
	include_once __DIR__.'/../Model/reclamation.php';
	class reclamationC {

		public function chercherreclamation($sujet)
		{
			$query = "SELECT * FROM reclamation WHERE sujet LIKE '%$sujet%'";
			$conn = config::getConnexion();
			try {
				$result = $conn->query($query);
				return $result->fetchAll();
			} catch (PDOException $e) {
				echo "Erreur: " . $e->getMessage();
			}}  
		function afficherreclamations(){
			$sql="SELECT * FROM reclamation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function afficherreclamationsorder(){
			$sql="SELECT * FROM reclamation ORDER BY dater DESC";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerreclamation($IDR){
			$sql="DELETE FROM reclamation WHERE IDR=:IDR";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':IDR', $IDR);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());

			}
		}
		function ajouterreclamation($reclamation){
			$sql="INSERT INTO reclamation (IDR, typer, dater, sujet, dess) 
			VALUES (:IDR, :typer, :dater, :sujet, :dess)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'IDR' => $reclamation->getIDR(),
					'typer' => $reclamation->gettyper(),
					'dater' => $reclamation->getdater(),
					'sujet' => $reclamation->getsujet(),
					'dess' => $reclamation->getdess()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererreclamation($IDR){
			$sql="SELECT * from reclamation where IDR=$IDR";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reclamation=$query->fetch();
				return $reclamation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierreclamation($reclamation, $IDR){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reclamation SET 
						typer= :typer, 
						dater= :dater, 
						sujet= :sujet,  
						dess= :dess
						
					WHERE IDR= :IDR'
				);
				$query->execute([
					'typer' => $reclamation->gettyper(),
					'dater' => $reclamation->getdater(),
					'sujet' => $reclamation->getsujet(),
					'dess' => $reclamation->getdess(),
					'IDR' => $IDR
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>