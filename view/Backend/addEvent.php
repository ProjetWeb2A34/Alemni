<?php

include '../controlleur/eventC.php';
include '../model/event.php';

// create event
$event = null;

// create an instance of the controller

$eventC = new eventC();
if (
    isset($_POST["nom_event"]) &&
    isset($_POST["lieux_event"]) &&
    isset($_POST["prix_event"]) &&
    isset($_POST["date_event"]) &&
    isset($_POST["nb_personne"])
    ) {
        if (
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
                $eventC->addEvent($event);
                print_r($_POST);
        header('Location:listEvent.php');
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>evenement </title>
</head>

<body>
    <a href="listEvent.php">Back to list </a>
    <hr>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="nom_event">nom_event :</label></td>
                <td>
                    <input type="text" id="nom_event" name="nom_event" />
                </td>
            </tr>
            <tr>
                <td><label for="lieux_event">lieux_event :</label></td>
                <td>
                    <input type="text" id="lieux_event" name="lieux_event" />
                </td>
            </tr>
            <tr>
                <td><label for="prix_event">prix_event:</label></td>
                <td>
                    <input type="number" id="prix_event" name="prix_event" />
                </td>
            </tr>
            <tr>
                <td><label for="date_event">date_event :</label></td>
                <td>
                    <input type="text" id="date_event" name="date_event" />
                </td>
            </tr>
            <tr>
                <td><label for="nb_personne">nb_personne :</label></td>
                <td>
                    <input type="number" id="nb_personne" name="nb_personne" />
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
</body>

</html>