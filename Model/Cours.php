<?php

class Cours
{
    private ?int $IdCours;
    private ?string $NomCours;
    private ?string $NomTuteur;
    private ?int $id_classe;
    private ?string $seance; // New attribute for session date and time

    public function __construct($IdCours, $NomCours, $NomTuteur, $id_classe, $seance = null) // Add $seance with default value null
    {
        $this->IdCours = $IdCours;
        $this->NomCours = $NomCours;
        $this->NomTuteur = $NomTuteur;
        $this->id_classe = $id_classe;
        $this->seance = $seance; // Initialize seance attribute
    }

    // Add getter and setter for seance attribute
    public function getSeance()
    {
        return $this->seance;
    }

    public function setSeance($seance)
    {
        $this->seance = $seance;
    }

    public function getIdCours()
    {
        return $this->IdCours;
    }

    public function setIdCours($IdCours)
    {
        $this->IdCours = $IdCours;
    }

    public function getNomCours()
    {
        return $this->NomCours;
    }

    public function setNomCours($NomCours)
    {
        $this->NomCours = $NomCours;
    }

    public function getNomTuteur()
    {
        return $this->NomTuteur;
    }

    public function setNomTuteur($NomTuteur)
    {
        $this->NomTuteur = $NomTuteur;
    }

    public function getIdClasse()
    {
        return $this->id_classe;
    }

    public function setIdClasse($id_classe)
    {
        $this->id_classe = $id_classe;
    }

    /*public function getSeance()
    {
        return $this->seance;
    }

    public function setSeance($seance)
    {
        $this->seance= $seance;
    }*/
}


/*
class Cours
{
    private ?int $IdCours;
    private ?string $NomCours;
    private ?string $NomTuteur;
    private ?int $id_classe;

    public function __construct($IdCours, $NomCours, $NomTuteur, $id_classe)
    {
        $this->IdCours = $IdCours;
        $this->NomCours = $NomCours;
        $this->NomTuteur = $NomTuteur;
        $this->id_classe = $id_classe;
    }

    public function getIdCours()
    {
        return $this->IdCours;
    }

    public function setIdCours($IdCours)
    {
        $this->IdCours = $IdCours;
    }

    public function getNomCours()
    {
        return $this->NomCours;
    }

    public function setNomCours($NomCours)
    {
        $this->NomCours = $NomCours;
    }

    public function getNomTuteur()
    {
        return $this->NomTuteur;
    }

    public function setNomTuteur($NomTuteur)
    {
        $this->NomTuteur = $NomTuteur;
    }

    public function getIdClasse()
    {
        return $this->id_classe;
    }

    public function setIdClasse($id_classe)
    {
        $this->id_classe = $id_classe;
    }
}*/
?>