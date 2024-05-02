<?php
include 'C:\xampp\htdocs\projetweb2\controlleur\eventC.php';
require_once 'C:\xampp\htdocs\projetweb2\config.php';
include_once 'C:\xampp\htdocs\projetweb2\model\event.php';


$c = new eventC();

// Check if the id_event parameter is set in the URL
if (isset($_GET['id_event'])) {
    $id_event = $_GET['id_event'];
    
    // Call a method to delete the event
    $result = $c->deleteEvent($id_event);

    // Redirect back to listEvent.php
    if ($result) {
        // Utilisez header() pour rediriger vers listEvent.php après la suppression réussie
        header("Location: tables.php");
        exit();
    } else {
        // Handle the case where deletion fails
        echo "Failed to delete event.";
    }
} else {
    // Handle the case where id_event parameter is not set
    echo "Event ID is missing.";
}
?>
