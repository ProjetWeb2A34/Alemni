<?php
include 'C:\xampp\htdocs\projetweb2\config.php';
include 'C:\xampp\htdocs\projetweb2\model\event.php';
require_once 'C:\xampp\htdocs\projetweb2\Model\HistoriqueDAO.php';


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
            // Prepare the delete query
            $req = $db->prepare($sql);
            $req->bindValue(':id_event', $id_event);
    
            // Execute the delete query
            $req->execute();
    
            // Add historical entry for the event deletion
            HistoriqueDAO::addHistorique('suppression', 'event', $id_event);
    
            // Return the number of rows affected
            return $req->rowCount();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    public function searchevenement($search_text)
    {
        $sql = "SELECT * FROM event WHERE nom_event LIKE :search_text";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':search_text', '%' . $search_text . '%', PDO::PARAM_STR); // Utilisation du joker % pour les recherches partielles
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            throw new Exception('Error searching events: ' . $e->getMessage());
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
    
            // Get the ID of the last inserted event
            $eventId = $db->lastInsertId();
    
            // Add historical entry for the event addition
            HistoriqueDAO::addHistorique('ajout', 'event', $eventId);
    
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

            HistoriqueDAO::addHistorique("Modification", "Événement", $event->getid_event());
        } catch (PDOException $e) {
            throw new Exception('Error updating event: ' . $e->getMessage());
        }
    }


    public function trievent()
{
    $sql = "SELECT * FROM event INNER JOIN sponsor ON event.id_event = sponsor.id_event ORDER BY event.nom_event";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Erreur:' . $e->getMessage());
    }
}

public function countEventsByPriceRange()
{
    $db = config::getConnexion();
    try {
        // Compter les événements dans différentes tranches de prix
        $sql = "SELECT 
                    SUM(CASE WHEN prix_event BETWEEN 0 AND 50 THEN 1 ELSE 0 END) AS price_range_0_50,
                    SUM(CASE WHEN prix_event BETWEEN 51 AND 100 THEN 1 ELSE 0 END) AS price_range_51_100,
                    SUM(CASE WHEN prix_event > 100 THEN 1 ELSE 0 END) AS price_range_above_100
                FROM event";
        
        $query = $db->query($sql);
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        throw new Exception('Erreur lors du comptage des événements par tranche de prix : ' . $e->getMessage());
    }
}



}
?>
    