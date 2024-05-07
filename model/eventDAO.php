<?php
require_once 'config.php';

class EventDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = config::getConnexion();
    }

    public function getEventsFromDatabase() {
        $stmt = $this->pdo->query('SELECT * FROM events');
        return $stmt->fetchAll();
    }

    // Other methods for interacting with the database
}
?>
