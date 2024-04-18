<?php
	include '../config.php';
	include_once '../Model/reponse.php';
	class reponseC {
		
function countReponsesBySubject($listereponses) {
	$countSubjects = array();
  
	// Loop through the responses and count the number of responses for each subject
	foreach ($listereponses as $reponse) {
	  $subject = $reponse['sujet'];
	  if (!isset($countSubjects[$subject])) {
		$countSubjects[$subject] = 0;
	  }
	  $countSubjects[$subject]++;
	}
  
	return $countSubjects;
  }
  

		public function chercherreponse($sujet)
		{
			$query = "SELECT * FROM reponse WHERE sujet LIKE '%$sujet%'";
			$conn = config::getConnexion();
			try {
				$result = $conn->query($query);
				return $result->fetchAll();
			} catch (PDOException $e) {
				echo "Erreur: " . $e->getMessage();
			}}

		function afficherreponses(){
			$sql="SELECT * FROM reponse";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function afficherreponsesorder(){
			$sql="SELECT * FROM reponse ORDER BY dater DESC";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerreponse($idrep){
			$sql="DELETE FROM reponse WHERE idrep=:idrep";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idrep', $idrep);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterreponse($reponse){
			$sql="INSERT INTO reponse (idrep, IDR, dater, sujet, dess) 
			VALUES (:idrep, :IDR, :dater, :sujet, :dess)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'idrep' => $reponse->getidrep(),
					'IDR' => $reponse->getIDR(),
					'dater' => $reponse->getdater(),
					'sujet' => $reponse->getsujet(),
					'dess' => $reponse->getdess()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererreponse($idrep){
			$sql="SELECT * from reponse where idrep=$idrep";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reponse=$query->fetch();
				return $reponse;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierreponse($reponse){
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE reponse SET
                IDR=:IDR ,
                dater=:dater ,
                sujet=:sujet ,
                dess=:dess 
                where idrep=:idrep
                ');
                $querry->execute([
                    'idrep'=>$reponse->getidrep(),
                    'IDR'=>$reponse->getIDR(),
                    'dater'=>$reponse->getdater(),
                    'sujet'=>$reponse->getsujet(),
                    'dess'=>$reponse->getdess(),

                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }

	}
}
?>