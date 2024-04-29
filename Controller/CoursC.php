<?php
include 'C:\xampp\htdocs\Alemni/config.php';
include 'C:\xampp\htdocs\Alemni\Model\Cours.php';

class CoursC
{
    public function listCourses()
    {
        $sql = "SELECT * FROM cours";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $courses = $query->fetchAll();
            return $courses;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCourse($id)
    {
        $sql = "DELETE FROM cours WHERE IdCours = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addCourse($cours)
    {
        $sql = "INSERT INTO cours (NomCours, NomTuteur, id_classe)  
        VALUES (:NomCours, :NomTuteur, :id_classe)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'NomCours' => $cours->getNomCours(),
                'NomTuteur' => $cours->getNomTuteur(),
                'id_classe' => $cours->getIdClasse()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateCourse($cours, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE cours SET 
                    NomCours = :NomCours, 
                    NomTuteur = :NomTuteur,
                    id_classe = :id_classe
                WHERE IdCours = :id'
            );
            $query->execute([
                'id' => $id,
                'NomCours' => $cours->getNomCours(),
                'NomTuteur' => $cours->getNomTuteur(),
                'id_classe' => $cours->getIdClasse()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function getCoursesForClass($id_classe)
    {
        $sql = "SELECT * FROM Cours WHERE id_classe = :id_classe";
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

    function showCourse($id)
    {
        $sql = "SELECT * from cours where IdCours = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();

            $course = $query->fetch();
            return $course;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
