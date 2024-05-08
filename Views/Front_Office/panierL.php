<?php
include_once '../../Model/panier.php';
include_once '../../Controller/panierC.php';
$panierC = new panierC();
$listepanier = $panierC->Afficherpanier();


// Calculate total price
$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Alemni</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="panier" class="sub_page">

    <!--   tabeellllllll loul   -->
    <a href="indexPANIER1.html" class="link55">boutique</a>
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
                    <td><a href="deletepanier.php?id_p=<?php echo $panier['id_p']; ?>"><img src="images/d55.png" alt=""></a></td>
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


    
</body>


</html>
