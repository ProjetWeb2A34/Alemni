<?php
include_once '../../../Controller/panierB.php';
$panierC = new panierC();
$listepanier=$panierC->Afficherpanier(); 

?>
<?php
include ('Header.php');
?>
<div>
<section>
        <table class="table align-items-center justify-content-center mb-0">
            <tr>
                <th>ID produit</th>
                <th>Nom cour</th>
                <th>Prix</th>
                <th>Quantité</th>
               
            </tr>
            <?php foreach ($listepanier as $panier) { ?>
            <tr>
                <td><?php echo $panier['id_p']; ?></td>
                <td><?php echo $panier['nom_p']; ?></td>
                <td><?php echo $panier['prix']; ?>$</td>
                <td><?php echo $panier['qunatite']; ?></td>
                
                
            </tr>
            <?php } ?>
           
   

</div>
<?php
include ('Footer.php');
?>
</body>
</html>