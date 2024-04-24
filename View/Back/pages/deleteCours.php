<?php
include 'C:\xampp\htdocs\Alemni/Controller/CoursC.php';

$coursC = new CoursC();
$coursC->deleteCourse($_GET["id"]);
header('Location:ListClasse.php');
?>
