<?php
// Include the necessary files and initialize any required objects or classes
require_once 'C:\xampp\htdocs\projetweb2\controlleur\eventC.php';
$c = new eventC();

// Check if the id_event parameter is set in the URL
if (isset($_GET['id_event'])) {
    $id_event = $_GET['id_event'];
    
    // Call a method to delete the event
    $result = $c->deletEvent($id_event);

    // Redirect back to listEvent.php
    if ($result) {
        // Utilisez header() pour rediriger vers listEvent.php après la suppression réussie
        header("Location: listEvent.php");
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
