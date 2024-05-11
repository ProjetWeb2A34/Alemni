<?php

class paiement
{
    private  $idpai, $num_cart, $mot_cart, $email, $prix_p;

    // Constructor
    public function __construct($idpai,  $num_cart,  $mot_cart,  $email , $prix_p)
    {
        $this->idpai = $idpai;    
        $this->num_cart = $num_cart;
        $this->mot_cart = $mot_cart;
        $this->email = $email;
        $this->prix_p = $prix_p;
    }

    // Getters
    public function get_idpai()
    {
        return $this->idpai;
    }

    public function get_num_cart()
    {
        return $this->num_cart;
    }

    public function get_mot_cart()
    {
        return $this->mot_cart;
    }

    public function get_email()
    {
        return $this->email;
    }
    public function get_prix_p()
    {
        return $this->prix_p;
    }

    // Setters
    public function set_num_cart(string $num_cart)
    {
        $this->num_cart = $num_cart;
    }

    public function set_prix(string $mot_cart)
    {
        $this->mot_cart = $mot_cart;
    }

    public function set_email(string $email)
    {
        $this->email = $email;
    }
    public function set_prix_p(string $prix_p)
    {
        $this->prix_p = $prix_p;
    }
}