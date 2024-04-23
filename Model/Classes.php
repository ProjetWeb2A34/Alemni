<?php
class Classes
{
    private ?int $id_classe;
    private ?string $nom_classe; // Adjusted property
    private ?int $nb_etudiant;

    public function __construct($id_classe, $nom_classe, $nb_etudiant) // Adjusted constructor
    {
        $this->id_classe = $id_classe;
        $this->nom_classe = $nom_classe; // Adjusted assignment
        $this->nb_etudiant = $nb_etudiant;
    }

    public function getIdClasse()
    {
        return $this->id_classe;
    }

    public function setIdClasse($id_classe)
    {
        $this->id_classe = $id_classe;
    }

    public function getNomClasse() // Getter for NomClasse
    {
        return $this->nom_classe;
    }

    public function setNomClasse($nom_classe) // Setter for NomClasse
    {
        $this->nom_classe = $nom_classe;
    }

    public function getNbEtudiant()
    {
        return $this->nb_etudiant;
    }

    public function setNbEtudiant($nb_etudiant)
    {
        $this->nb_etudiant = $nb_etudiant;
    }
}
?>


<?php
/*class Classes
{
    private ?int $IdClasse;
    private ?int $IdTuteur ;
    private ?int $nb_etudiant ;
    private ?int $IdCours;

    
    public function __construct($idClasse , $idTuteur, $nbEtudiant, $idCours)
    {
        $this->IdClasse = $idClasse;
        $this->IdTuteur = $idTuteur;
        $this->nb_etudiant = $nbEtudiant;
        $this->IdCours = $idCours;
    }
    

    public function getIdClasse()
    {
        return $this->IdClasse;
    }

    public function setIdClasse($IdClasse)
    {
        $this->IdClasse = $IdClasse;

        return $this;
    }

    public function getIdTuteur()
    {
        return $this->IdTuteur;
    }

    public function setIdTuteur($IdTuteur)
    {
        $this->IdTuteur = $IdTuteur;

        return $this;
    }

    public function getNbEtudiant()
    {
        return $this->nb_etudiant;
    }

    public function setNbEtudiant($nbEtudiant)
    {
        $this->nb_etudiant = $nbEtudiant;

        return $this;
    }

    public function getIdCours()
    {
        return $this->IdCours;
    }

    public function setIdCours($IdCours)
    {
        $this->IdCours = $IdCours;

        return $this;
    }
}*/
?>
