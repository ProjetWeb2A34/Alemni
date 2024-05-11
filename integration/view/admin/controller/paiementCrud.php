<?php
include_once '../../config.php';
include_once '../../Model/paiement.php';


class paiementCrud
{
    function Afficherpaiement()
    {
        $sql = "SELECT * FROM paiement";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function getPrixFromPanier($prix_p)
    {
        $sql = "SELECT prix FROM panier WHERE id_p = :id_p";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id_p' => $prix_p]);
            $row = $query->fetch(PDO::FETCH_ASSOC);
            return $row['prix'];
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
            return null;
        }
    }

    function Ajouterpaiement($paiement)
    {
        $db = config::getConnexion();
        $prix_p = $paiement->get_prix_p();

        $checkSql = "SELECT * FROM panier WHERE id_p = :id_p";
        $checkStmt = $db->prepare($checkSql);
        $checkStmt->execute(['id_p' => $prix_p]);
        if ($checkStmt->rowCount() == 0) {
            die('Error: No matching id_p found in panier for the provided prix_p.');
        }

        $sql = "INSERT INTO paiement (num_cart, mot_cart, email, prix_p) VALUES (:num_cart, :mot_cart, :email, :prix_p)";
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'num_cart' => $paiement->get_num_cart(),
                'mot_cart' => $paiement->get_mot_cart(),
                'email' => $paiement->get_email(),
                'prix_p' => $prix_p
            ]);
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    function Modifierpaiement($paiement, $idpai)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare("UPDATE paiement SET num_cart=:num_cart, mot_cart=:mot_cart, email=:email  WHERE idpai=:idpai");
            $query->execute([
                'num_cart' => $paiement->get_num_cart(),
                'mot_cart' => $paiement->get_mot_cart(),
                'email' => $paiement->get_email(),
                'idpai' => $idpai
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function Supprimerpaiement($idpai)
    {
        $sql = "DELETE FROM paiement WHERE idpai=:idpai";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':idpai', $idpai);
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererpaiement($idpai)
    {
        $sql = "SELECT * FROM paiement WHERE idpai=:idpai";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['idpai' => $idpai]);
            $paiement = $query->fetch();
            return $paiement;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
