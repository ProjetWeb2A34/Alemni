<?php
    include_once '../../Model/panier.php';
    include_once '../../Controller/panierC.php';

    if (isset($_POST['searchTerm'])) {
        $panierC = new panierC();
        $results = $panierC ->chercherreclamation($_POST['searchTerm']);
        echo json_encode($results);
    }
?>