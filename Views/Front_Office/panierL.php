<?php
include_once '../../Model/panier.php';
include_once '../../Controller/panierC.php';
$panierC = new panierC();
$listepanier = $panierC->Afficherpanier();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>panier</title>
    <link href="css/style.css" rel="stylesheet" />
</head>

<body class="panier">
    <a href="indexPANIER1.html" class="link55">boutique</a>
    <a href="addpaiement.php" class="link55">paiement</a>
    
    <section>
        <table>
            <tr>
                <th>ID produit</th>
                <th>Nom cour</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>update</th>
                <th>action</th>
                
            </tr>
            <?php foreach ($listepanier as $panier) { ?>
                <tr>
                    <td><?php echo $panier['id_p']; ?></td>
                    <td><?php echo $panier['nom_p']; ?></td>
                    <td><?php echo $panier['prix']; ?>$</td>
                    <td><?php echo $panier['qunatite']; ?></td>
                    <td>
                        <form method="POST" action="updatepaner.php">
                            <input type="submit" class="link55" name="Modifier" value="Modifier">
                            <input type="hidden" value=<?PHP echo $panier['id_p']; ?> name="id_p">
                        </form>
                    </td>
                    <td><a href="deletepanier.php?id_p=<?php echo $panier['id_p']; ?>"><img src="images/d55.png" alt=""></a></td>

                </tr>


                <tr class="total">
                    <th>total:$</th>
                </tr>
            <?php } ?>
        </table>
    </section>

</body>

</html>