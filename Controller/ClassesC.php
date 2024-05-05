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
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deleteClass($id)
    {
        $db = config::getConnexion();
    
        // Delete all courses associated with the class
        $sqlDeleteCourses = "DELETE FROM Cours WHERE id_classe = :id_classe";
        $stmtDeleteCourses = $db->prepare($sqlDeleteCourses);
        $stmtDeleteCourses->bindValue(':id_classe', $id);
    
        try {
            $stmtDeleteCourses->execute();
        } catch (Exception $e) {
            die('Error deleting courses:' . $e->getMessage());
        }
    
        // Now, delete the class itself
        $sqlDeleteClass = "DELETE FROM Classes WHERE id_classe = :id";
        $stmtDeleteClass = $db->prepare($sqlDeleteClass);
        $stmtDeleteClass->bindValue(':id', $id);
    
        try {
            $stmtDeleteClass->execute();
        } catch (Exception $e) {
            die('Error deleting class:' . $e->getMessage());
        }
    }

    /*function deleteClass($id)
    {
        $sql = "DELETE FROM Classes WHERE id_classe = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }*/

    function addClass($classes)
    {
        $sql = "INSERT INTO Classes (NomClasse, nb_etudiant)  
        VALUES (:nom_classe, :nb_etudiant)"; // Adjusted to include nom_classe
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_classe' => $classes->getNomClasse(), // Adjusted to include nom_classe
                'nb_etudiant' => $classes->getNbEtudiant()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateClass($classes, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Classes SET 
                    NomClasse = :nom_classe, 
                    nb_etudiant = :nb_etudiant
                WHERE id_classe = :id'
            );
            $query->execute([
                'id' => $id,
                'nom_classe' => $classes->getNomClasse(), // Adjusted to include nom_classe
                'nb_etudiant' => $classes->getNbEtudiant()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function listCoursesForClass($id_classe)
    {
        $sql = "SELECT * FROM cours WHERE id_classe = :id_classe";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_classe', $id_classe, PDO::PARAM_INT);
            $query->execute();
            $courses = $query->fetchAll();
            return $courses;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    /**
     * Get the list of courses for a given class ID.
     *
     * @param int $id_classe The ID of the class
     * @return array The list of courses for the class
     */
    function showClass($id) {
        $sql = "SELECT * from Classes where id_classe = :id"; // Using a named placeholder for the parameter
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            // Binding the ':id' parameter to the $id variable in a secure way
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


<?php
/*include 'C:\xampp\htdocs\Alemni/config.php';
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

    /*function updateClass($classes, $id)
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
    /*function showClass($id) {
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
}*/
?>