<?php


class event{
    private ?int $id_event; // Allow null or int
    private string $nom_event;
    private string $lieux_event;
    private int $prix_event;
    private string $date_event;
    private int $nb_personne;
    
    public function __construct(string $nom_event, string $lieux_event, int $prix_event, string $date_event, int $nb_personne, ?int $id_event = null) {
        $this->id_event = $id_event; // Can be null if not provided
        $this->nom_event = $nom_event;
        $this->lieux_event = $lieux_event;
        $this->prix_event = $prix_event;
        $this->date_event = $date_event;
        $this->nb_personne = $nb_personne;
    }

    public function getid_event(): ?int 
    {
        return $this->id_event;
    }
    

    public  function getnom_event(): string
    {
        return $this->nom_event;
    }

    public function getlieux_event(): string
    {
        return $this->lieux_event;
    }
    public function getprix_event(): int
    {
        return $this->prix_event;
    }
    
   
    public function getdate_event(): string  
    {
        return $this->date_event;
    }

    public function getnb_personne(): int
    {
        return $this->nb_personne;
    }
   
    public function setid_event(int $id_event): void {
        $this->id_event = $id_event;
    }
    
    public function setnom_event(string $nom_event): void {
        $this->nom_event = $nom_event;
    }
    
    public function setlieux_event(string $lieux_event): void {
        $this->lieux_event = $lieux_event;
    }
    
    public function setprix_event(int $prix_event): void {
        $this->prix_event = $prix_event;
    }
    
    public function setdate_event(string $date_event): void {
        $this->date_event = $date_event;
    }
    
    public function setnb_personne(int $nb_personne): void {
        $this->nb_personne = $nb_personne;
    }
    
}
?>