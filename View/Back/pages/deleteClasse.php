<?php
include 'C:\xampp\htdocs\Alemni/Controller/ClassesC.php';

$classC = new ClassesC();
$classC->deleteClass($_GET["id"]);
header('Location:ListClasse.php');
?>
