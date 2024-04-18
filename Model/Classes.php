<?php
class Classes
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
    /*public function __construct(
        $idClasse = null, 
        $idTuteur = null, 
        $nbEtudiant = null, 
        $idCours = null
    ) {
        // If all parameters are null, treat it as a default constructor
        if ($idClasse === null && $idTuteur === null && $nbEtudiant === null && $idCours === null) {
            // Initialize properties with default values if needed
            $this->IdClasse = 0;
            $this->IdTuteur = 0;
            $this->nb_etudiant = 0;
            $this->IdCours = 0;
        } else {
            // Otherwise, assign the provided values to the properties
            $this->IdClasse = $idClasse;
            $this->IdTuteur = $idTuteur;
            $this->nb_etudiant = $nbEtudiant;
            $this->IdCours = $idCours;
        }
    }*/

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
}
?>
