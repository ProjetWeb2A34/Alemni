<?php
include 'C:\xampp\htdocs\projetweb2\controlleur\ReservationC.php';
require_once 'C:\xampp\htdocs\projetweb2\config.php';

// Create an instance of the ReservationC controller
$c = new ReservationC();

// Check if the id_reservation parameter is set in the URL
if (isset($_GET['id_reservation'])) {
    $id_reservation = $_GET['id_reservation'];
    
    // Call a method to delete the reservation
    $result = $c->deleteReservation($id_reservation);

    // Redirect back to listReservation.php
    if ($result) {
        // Use header() to redirect to listReservation.php after successful deletion
        header("Location: listReservation.php");
        exit();
    } else {
        // Handle the case where deletion fails
        echo "Failed to delete reservation.";
    }
} else {
    // Handle the case where id_reservation parameter is not set
    echo "Reservation ID is missing.";
}
?>
