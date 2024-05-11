<?php
include_once '../../../model/panier.php';
include_once '../../../controller/panierC.php';;

$panierC = new panierC();
$listepanier = $panierC->Afficherpanier();


// Calculate total price
$totalPrice = 0;

include('HeaderF.php');
?>



    <!--   tabeellllllll loul   -->
    <div class="panier">
    <a href="indexPANIER1.php" class="link55">boutique</a>
    <a href="addpaiement.php" class="link55">paiement</a>
    <!--<input type="text" id="searchTerm" placeholder="search">-->
    
    <section>
        <table>
            <tr>
                <th>ID produit</th>
                <th>Nom cour</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Prix total</th> <!-- Nouvelle colonne -->
                <th>update</th>
                <th>action</th>
            </tr>
            <?php foreach ($listepanier as $panier) { ?>
                <tr>
                    <td><?php echo $panier['id_p']; ?></td>
                    <td><?php echo $panier['nom_p']; ?></td>
                    <td><?php echo $panier['prix']; ?>$</td>
                    <td><?php echo $panier['qunatite']; ?></td>
                    <td><?php echo $panier['prix'] * $panier['qunatite']; ?>$</td> <!-- Calcul du prix total -->
                    
                    <td>
                        <form method="POST" action="updatepaner.php">
                            <input type="submit" class="link55" name="Modifier" value="Modifier">
                            <input type="hidden" value=<?PHP echo $panier['id_p']; ?> name="id_p">
                        </form>
                    </td>
                    <td><a href="deletepanier.php?id_p=<?php echo $panier['id_p']; ?>">supp</a></td>
                </tr>
                <?php 
                // Increment total price
                $totalPrice += $panier['prix'] * $panier['qunatite']; 
                ?>
            <?php } ?>
        </table>
        
        <table>
            <tr class="total">
                <th>Total Price: <?php echo $totalPrice; ?>$</th>
            </tr>
        </table>
    </section>  
    </div>

<!-- info section -->
<?php
include('Footer.php')
?>