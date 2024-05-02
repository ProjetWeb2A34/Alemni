<<?php
include 'C:\xampp\htdocs\projetweb2\controlleur\eventC.php';
$event = null;
$eventC = new eventC();

// Vérifier si le paramètre 'id_event' est présent et non vide dans l'URL
if (isset($_GET["id_event"]) && !empty($_GET['id_event'])) {
    $oldEvent = $eventC->listEvents($_GET['id_event']);

    // Vérifier si l'événement existe
    if ($oldEvent) {
        if (
            isset($_POST["id_event"]) &&
            isset($_POST["nom_event"]) &&
            isset($_POST["lieux_event"]) &&
            isset($_POST["prix_event"]) &&
            isset($_POST["date_event"]) &&
            isset($_POST["nb_personne"])
        ) {
            if (
                !empty($_POST['id_event']) &&
                !empty($_POST['nom_event']) &&
                !empty($_POST['lieux_event']) &&
                !empty($_POST["prix_event"]) &&
                !empty($_POST["date_event"]) &&
                !empty($_POST["nb_personne"])
            ) {
                $event = new event(
                    $_POST['id_event'],
                    $_POST['nom_event'],
                    $_POST['lieux_event'],
                    $_POST['prix_event'],
                    $_POST['date_event'],
                    $_POST['nb_personne']
                );

                $eventC->updateEvent($event, $_POST['id_event']);

                header('Location: listEvent.php');
                exit();
            }
        }
    } else {
        echo "Event not found."; // Afficher un message d'erreur si l'événement n'est pas trouvé
    }
} else {
    echo "Missing event ID."; // Afficher un message d'erreur si l'ID de l'événement est manquant
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <hr>

    <?php
    if (isset($oldEvent)) {
    ?>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="id_event">ID de l'événement :</label></td>
                <td>
                    <input type="text" id="id_event" name="id_event" value="<?php echo $_GET['id_event'] ?>" readonly />
                </td>
            </tr>
            <tr>
                <td><label for="nom_event">Nom de l'événement :</label></td>
                <td>
                    <input type="text" id="nom_event" name="nom_event" value="<?php echo $oldEvent['nom_event'] ?>" />
                </td>
            </tr>
            <tr>
                <td><label for="lieux_event">Lieu de l'événement :</label></td>
                <td>
                    <input type="text" id="lieux_event" name="lieux_event" value="<?php echo $oldEvent['lieux_event'] ?>" />
                </td>
            </tr>
            <tr>
                <td><label for="prix_event">Prix de l'événement :</label></td>
                <td>
                    <input type="text" id="prix_event" name="prix_event" value="<?php echo $oldEvent['prix_event'] ?>" />
                </td>
            </tr>
            <tr>
                <td><label for="date_event">Date de l'événement :</label></td>
                <td>
                    <input type="text" id="date_event" name="date_event" value="<?php echo $oldEvent['date_event'] ?>" />
                </td>
            </tr>
            <tr>
                <td><label for="nb_personne">Nombre de personnes :</label></td>
                <td>
                    <input type="text" id="nb_personne" name="nb_personne" value="<?php echo $oldEvent['nb_personne'] ?>" />
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>

    <?php
    }
    ?>
</body>

</html>