<?php
include 'C:\xampp\htdocs\projetweb2\config.php';
include 'C:\xampp\htdocs\projetweb2\model\event.php';

class eventC
{

    public function getAllEventIDsAndNames() {
        $sql = 'SELECT id_event, nom_event FROM event'; // Adjust these column names if necessary
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            throw new Exception('Error getting event IDs and names: ' . $e->getMessage());
        }
    }
    public function listEvents()
    {
        $sql = 'SELECT * FROM event';
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            throw new Exception('Error listing events: ' . $e->getMessage());
        }
    }

    public function getEventById($id_event)
    {
        $sql = "SELECT * FROM event WHERE id_event = :id_event";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_event', $id_event);
            $query->execute();
            return $query->fetch(); // fetch single row
        } catch (Exception $e) {
            throw new Exception('Error fetching event: ' . $e->getMessage());
        }
    }

    public function deleteEvent($id_event)
    {
        $sql = "DELETE FROM event WHERE id_event = :id_event";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id_event', $id_event);
            $req->execute();
            return $req->rowCount(); // returns number of rows affected
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addEvent($event)
    {
        $sql = "INSERT INTO event (nom_event, lieux_event, prix_event, date_event, nb_personne) VALUES (:nom_event, :lieux_event, :prix_event, :date_event, :nb_personne)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_event' => $event->getnom_event(),
                'lieux_event' => $event->getlieux_event(),
                'prix_event' => $event->getprix_event(),
                'date_event' => $event->getdate_event(),
                'nb_personne' => $event->getnb_personne(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateEvent($event)
    {
        $sql = "UPDATE event SET nom_event = :nom_event, lieux_event = :lieux_event, prix_event = :prix_event, date_event = :date_event, nb_personne = :nb_personne WHERE id_event = :id_event";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_event' => $event->getnom_event(),
                'lieux_event' => $event->getlieux_event(),
                'prix_event' => $event->getprix_event(),
                'date_event' => $event->getdate_event(),
                'nb_personne' => $event->getnb_personne(),
                'id_event' => $event->getid_event()
            ]);
        } catch (PDOException $e) {
            throw new Exception('Error updating event: ' . $e->getMessage());
        }
    }
}
?>
    