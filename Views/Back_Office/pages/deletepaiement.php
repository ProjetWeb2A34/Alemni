<?php

include_once '..paiement.php';
include_once '../../../Controller/paiementCruda.php';
	
$paiementCrud = new paiementCrud();


$paiementCrud->Supprimerppaiement($_GET['idpai']);

	header('Location:paimentL.php');
	
?>