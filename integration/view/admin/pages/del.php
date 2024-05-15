<?php

include_once '..panier.php';
include_once '../../../controller/panierB.php';
	
$panierC = new panierC();


$panierC->Supprimerpanier($_GET['id_p']);

	header('Location:lpanier.php');
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>aalmni</h1>
</body>
</html>