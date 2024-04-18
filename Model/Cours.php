<?php

<?php

class Cours {
    
    private $id_cours;
    private $nom_cours;
    private $nb_tuteur;
    private $niveau;
    private $db;

    public function __construct($id_cours, $nom_cours, $nb_tuteur, $niveau, $db) {
        $this->id_cours = $id_cours;
        $this->nom_cours = $nom_cours;
        $this->nb_tuteur = $nb_tuteur;
        $this->niveau = $niveau;
        $this->db = $db;
    }
    public function createCourse($nom_cours, $nb_tuteur, $niveau) {
        $query = "INSERT INTO Cours (nom_cours, nb_tuteur, niveau) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sii", $nom_cours, $nb_tuteur, $niveau);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllCourses() {
        $query = "SELECT * FROM Cours";
        $result = $this->db->query($query);
        $courses = [];
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }
        return $courses;
    }

    public function getCourseById($id_cours) {
        $query = "SELECT * FROM Cours WHERE id_cours = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id_cours);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateCourse($id_cours, $nom_cours, $nb_tuteur, $niveau) {
        $query = "UPDATE Cours SET nom_cours = ?, nb_tuteur = ?, niveau = ? WHERE id_cours = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("siii", $nom_cours, $nb_tuteur, $niveau, $id_cours);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCourse($id_cours) {
        $query = "DELETE FROM Cours WHERE id_cours = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id_cours);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

?>





















?>