<?php

include 'C:\xampp\htdocs\projetweb2\model\event.php';

// Database Connection
require("function.php");

// Récupérer les événements depuis la base de données
$query = "SELECT * FROM event";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

$events = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Créer une nouvelle instance de la classe event pour chaque ligne de résultat
        $event = new event($row['nom_event'], $row['lieux_event'], $row['prix_event'], $row['date_event'], $row['nb_personne'], $row['id_event']);
        $events[] = $event;
    }
}

// Définir les en-têtes pour le fichier CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=events.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Nom', 'Lieux', 'Prix', 'Date', 'Nombre de personnes'));

// Si des événements ont été récupérés, les écrire dans le fichier CSV
if (count($events) > 0) {
    foreach ($events as $event) {
        // Utiliser les méthodes getters pour obtenir les données de l'événement
        fputcsv($output, array($event->getid_event(), $event->getnom_event(), $event->getlieux_event(), $event->getprix_event(), $event->getdate_event(), $event->getnb_personne()));
    }
}

fclose($output);

?>
