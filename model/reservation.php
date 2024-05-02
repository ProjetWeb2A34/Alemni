<?php

class Reservation {
    private ?int $id_reservation; // Peut être null ou un int
    private string $nom_client;
    private int $id_event; // Clé étrangère référençant id_event de la table 'event'
    private int $montant_a_payer;
    private string $statut_reservation;
    
    public function __construct(string $nom_client, int $id_event, int $montant_a_payer, string $statut_reservation, ?int $id_reservation = null) {
        $this->id_reservation = $id_reservation; // Peut être null si non fourni
        $this->nom_client = $nom_client;
        $this->id_event = $id_event; // Assurez-vous que cela correspond à un id_event valide de la table 'event'
        $this->montant_a_payer = $montant_a_payer;
        $this->statut_reservation = $statut_reservation;
    }

    // Getters
    public function getIdReservation(): ?int {
        return $this->id_reservation;
    }
    
    public function getNomClient(): string {
        return $this->nom_client;
    }

    public function getIdEvent(): int {
        return $this->id_event;
    }

    public function getMontantAPayer(): int {
        return $this->montant_a_payer;
    }
    
    public function getStatutReservation(): string {
        return $this->statut_reservation;
    }
    
    // Setters
    public function setIdReservation(int $id_reservation): void {
        $this->id_reservation = $id_reservation;
    }

    public function setNomClient(string $nom_client): void {
        $this->nom_client = $nom_client;
    }

    public function setIdEvent(int $id_event): void {
        $this->id_event = $id_event;
    }

    public function setMontantAPayer(int $montant_a_payer): void {
        $this->montant_a_payer = $montant_a_payer;
    }
    
    public function setStatutReservation(string $statut_reservation): void {
        $this->statut_reservation = $statut_reservation;
    }
    
    // Vous pouvez ajouter ici des méthodes pour interagir avec la base de données comme insérer, mettre à jour, supprimer, etc.
}

?>
