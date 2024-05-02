<?php
include 'C:\xampp\htdocs\projetweb2\config.php';
include 'C:\xampp\htdocs\projetweb2\model\reservation.php';

class ReservationC
{
    public function listReservations()
    {
        $sql = 'SELECT * FROM reservation';
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            throw new Exception('Error listing reservations: ' . $e->getMessage());
        }
    }

    public function getReservationById($id_reservation)
    {
        $sql = "SELECT * FROM reservation WHERE id_reservation = :id_reservation";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_reservation', $id_reservation);
            $query->execute();
            return $query->fetch(); // fetch single row
        } catch (Exception $e) {
            throw new Exception('Error fetching reservation: ' . $e->getMessage());
        }
    }

    public function addReservation($reservation)
    {
        $sql = "INSERT INTO reservation (nom_client, id_event, montant_a_payer, statut_reservation) VALUES (:nom_client, :id_event, :montant_a_payer, :statut_reservation)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_client' => $reservation->getNomClient(),
                'id_event' => $reservation->getIdEvent(),
                'montant_a_payer' => $reservation->getMontantAPayer(),
                'statut_reservation' => $reservation->getStatutReservation(),
            ]);
            return $db->lastInsertId(); // returns last inserted ID
        } catch (Exception $e) {
            throw new Exception('Error adding reservation: ' . $e->getMessage());
        }
    }

    public function updateReservation($reservation)
    {
        $sql = "UPDATE reservation SET nom_client = :nom_client, id_event = :id_event, montant_a_payer = :montant_a_payer, statut_reservation = :statut_reservation WHERE id_reservation = :id_reservation";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_client' => $reservation->getNomClient(),
                'id_event' => $reservation->getIdEvent(),
                'montant_a_payer' => $reservation->getMontantAPayer(),
                'statut_reservation' => $reservation->getStatutReservation(),
                'id_reservation' => $reservation->getIdReservation(),
            ]);
            return $query->rowCount(); // returns number of rows affected
        } catch (Exception $e) {
            throw new Exception('Error updating reservation: ' . $e->getMessage());
        }
    }

    public function deleteReservation($id_reservation)
    {
        $sql = "DELETE FROM reservation WHERE id_reservation = :id_reservation";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id_reservation', $id_reservation);
            $req->execute();
            return $req->rowCount(); // returns number of rows affected
        } catch (Exception $e) {
            throw new Exception('Error deleting reservation: ' . $e->getMessage());
        }
    }
}
?>
