<?php

class panier
{
    private  $id_p, $nom_p, $prix, $qunatite;

    // Constructor
    public function __construct($id_p,  $nom_p,  $prix,  $qunatite)
    {
        $this->id_p = $id_p;    
        $this->nom_p = $nom_p;
        $this->prix = $prix;
        $this->qunatite = $qunatite;
    }

    // Getters
    public function get_id_p()
    {
        return $this->id_p;
    }

    public function get_nom_p()
    {
        return $this->nom_p;
    }

    public function get_prix()
    {
        return $this->prix;
    }

    public function get_qunatite()
    {
        return $this->qunatite;
    }

    // Setters
    public function set_nom_p(string $nom_p)
    {
        $this->nom_p = $nom_p;
    }

    public function set_prix(string $prix)
    {
        $this->prix = $prix;
    }

    public function set_qunatite(string $qunatite)
    {
        $this->qunatite = $qunatite;
    }
}
