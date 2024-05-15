<?php
include '../../../controller/ClassesC.php';

$classC = new ClassesC();
$classC->deleteClass($_GET["id"]);
header('Location:ListClasse.php');
?>
