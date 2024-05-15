<?php
include '../../../controller/CoursC.php';

$coursC = new CoursC();
$coursC->deleteCourse($_GET["id"]);
header('Location:ListClasse.php');
?>
