<?php
	include __DIR__.'/../../../../Controller/reclamationC.php';
	$reclamationC=new reclamationC();
	$reclamationC->supprimerreclamation($_GET["IDR"]);
	header('location:afficherListereclamations.php');
?>