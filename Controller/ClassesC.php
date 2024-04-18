<?php
include 'C:\xampp\htdocs\Alemni/config.php';
include 'C:\xampp\htdocs\Alemni\Model\Classes.php';

class ClassesC
{
    public function listClasses()
    {
        $sql = "SELECT * FROM Classes";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $liste = $query->fetchAll();
            //$liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteClass($id)
    {
        $sql = "DELETE FROM Classes WHERE IdClasse = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addClass($classes)
    {
        $sql = "INSERT INTO classes (`IdClasse`, `IdTuteur`, `nb_etudiant`, `IdCours`)  
        VALUES (:IdClasse, :IdTuteur, :nb_etudiant, :IdCours)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'IdClasse' => $classes->getIdClasse(),
                'IdTuteur' => $classes->getIdTuteur(),
                'nb_etudiant' => $classes->getNbEtudiant(),
                'IdCours' => $classes->getIdCours()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    /*public function addClass()
    {
    $sql = 'INSERT INTO classe (IdClasse, IdTuteur, nb_etudiant, IdCours) 
            VALUES (:IdClasse, :IdTuteur, :nb_etudiant, :IdCours)';

    $db = config::getconnection();

    try {
        if (
            isset(
                $_POST['IdClasse'],
                $_POST['IdTuteur'],
                $_POST['nb_etudiant'],
                $_POST['IdCours']
            )
        ) {
            $IdClasse = $_POST['IdClasse'];
            $IdTuteur = $_POST['IdTuteur'];
            $nb_etudiant = $_POST['nb_etudiant'];
            $IdCours = $_POST['IdCours'];

            $query = $db->prepare($sql);
            $query->execute([
                'IdClasse' => $IdClasse,
                'IdTuteur' => $IdTuteur,
                'nb_etudiant' => $nb_etudiant,
                'IdCours' => $IdCours
            ]);
        } else {
            // Handle case when form data is not complete
            // echo 'Pas d\'ajout';
        }
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
    }
*/

    function updateClass($classes, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Classes SET 
                    IdTuteur = :IdTuteur, 
                    nb_etudiant = :nb_etudiant, 
                    IdCours = :IdCours
                WHERE IdClasse = :id'
            );
            $query->execute([
                'id' => $id,
                'IdTuteur' => $classes->getIdTuteur(),
                'nb_etudiant' => $classes->getNbEtudiant(),
                'IdCours' => $classes->getIdCours()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    /*function showClass($id)
    {
        $sql = "SELECT * from Classes where IdClasse = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $classes = $query->fetch();
            return $classes;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }*/
    function showClass($id) {
        $sql = "SELECT * from Classes where IdClasse = :id"; // Utilisation d'un marqueur nominatif pour le paramètre
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            // Liaison du paramètre ':id' à la variable $id de manière sécurisée
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
    
            $classes = $query->fetch();
            return $classes;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>