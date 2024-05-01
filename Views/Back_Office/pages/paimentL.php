<?php
include_once '../../../Controller/paiementCruda.php';

// Define getPrixFromPanier function
function getPrixFromPanier($prix_p) {
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

$paiementCrud = new paiementCrud();
$listepaiement = $paiementCrud->Afficherpaiement(); 

include 'Header.php';
?>
<div>
    <section>
        <table class="table align-items-center justify-content-center mb-0">
            <tr>
                <th>ID paiement</th>
                <th>numero de carte</th>
                <th>mot de passe</th>
                <th>email</th>
                <th>prix de produit</th>
                <th>action</th>
                <th>update</th>
            </tr>
            <?php foreach ($listepaiement as $paiement) { ?>
                <tr>
                    <td><?php echo $paiement['idpai']; ?></td>
                    <td><?php echo $paiement['num_cart']; ?></td>
                    <td><?php echo str_repeat('*', strlen($paiement['mot_cart'])); ?></td>
                    <td><?php echo $paiement['email']; ?></td>
                    <td>
                        <?php
                        // Retrieve prix from panier based on prix_p from paiement
                        $prix_p = $paiement['prix_p'];
                        $prix = getPrixFromPanier($prix_p); // Assuming you have a function to fetch prix from panier by prix_p
                        echo $prix;
                        ?>$
                    </td> 
                    <td><a href="deletepaiement.php?idpai=<?php echo $paiement['idpai']; ?>">supprime</a></td>
                    <td>
                        <form method="POST" action="updatepaiement.php">
                            <input type="submit" class="btn btn-primary" name="Modifier" value="Modifier">
                            <input type="hidden" value="<?php echo $paiement['idpai']; ?>" name="idpai">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </section>
</div>
<?php include 'Footer.php'; ?>
</body>
</html>
