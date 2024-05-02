<?php

include '../controlleur/eventC.php';
include '../model/event.php';

// create event
$event = null;
// create an instance of the controller
$produitC = new produitC();


if (
    isset($_POST["nom"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["remise"]) &&
    isset($_POST["quantite"])
    ) {
        if (
        !empty($_POST['nom']) &&
        !empty($_POST["prix"]) &&
        !empty($_POST["remise"]) &&
        !empty($_POST["qunatite"])
    ) {
        /* foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        } */
        $produit = new produit(
            null,
            $_POST['nom'],
            $_POST['prix'],
            $_POST['remise'],
            $_POST['qunatite']
        );
        var_dump($produit);
        
        $produitC->updateproduit($produit, $_GET['id_produit']);

        header('Location:listproduit.php');
    }
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listproduit.php">Back to list</a></button>
    <hr>

    <?php
    if (isset($_GET['id_produit'])) {
        $oldproduit = $produitC->showproduit($_GET['id_produit']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">id_produit :</label></td>
                    <td>
                        <input type="text" id="idproduit" name="idproduit" value="<?php echo $_GET['id_produit'] ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $oldproduit['nom'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="prix">prix:</label></td>
                    <td>
                        <input type="text" id="prix" name="prix" value="<?php echo $oldproduit['prix'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="remise">remise :</label></td>
                    <td>
                        <input type="text" id="remise" name="remise" value="<?php echo $oldproduit['remise'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="quantite">quantite :</label></td>
                    <td>
                        <input type="text" id="quantite" name="quantite" value="<?php echo $oldproduit['produit'] ?>" />
                    </td>
                </tr>


                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>