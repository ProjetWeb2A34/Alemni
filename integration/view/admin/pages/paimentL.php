<?php
include_once '../../../controller/paiementCruda.php';
// ______________________________
$search_query = ''; // Initialisez la variable de recherche

if (isset($_POST['search_query'])) {
    $search_query = $_POST['search_query'];
}

// Define getPrixFromPanier function
function getPrixFromPanier($prix_p) {
    $sql = "SELECT prix, qunatite FROM panier WHERE id_p = :id_p";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['id_p' => $prix_p]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row; // Return both prix and qunatite
    } catch (PDOException $e) {
        echo 'Erreur: ' . $e->getMessage();
        return null;
    }
}


$paiementCrud = new paiementCrud();
$listepaiement = $paiementCrud->Afficherpaiement(); 
$listepaiement = $paiementCrud->search($search_query);

include 'Header.php';
?>
<div>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
    <input type="text" name="search_query" class="search-input" placeholder="Cherchez par num carte " value="<?php echo isset($search_query) ? htmlspecialchars($search_query) : ''; ?>">
    <button type="submit" class="search-button"><i class="fas fa-search icon"></i></button>
</form>
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
    // Retrieve prix and qunatite from panier based on prix_p from paiement
    $prix_p = $paiement['prix_p'];
    $panierInfo = getPrixFromPanier($prix_p);
    $prix = $panierInfo['prix'];
    $quantite = $panierInfo['qunatite'];
    $totalPrixProduit = $prix * $quantite;
    echo $totalPrixProduit;
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
<div>
<a href="indexxx.php">pour envoyer mail</a>
<p>



</p>
<button class="btn btn-primary"
                onclick="window.location.href='generatee_pdf.php'">PDF
                Export</button>


</div>
<?php include 'Footer.php'; ?>
</body>
</html>
