<?php
include '../controlleur/eventC.php';
$eventC = new eventC();
$eventC->deletEvent($_GET["id_event"]);
header('Location:listEvent.php');