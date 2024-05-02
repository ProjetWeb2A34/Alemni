<?php
include '../controlleur/eventC.php';
$c = new eventC();
$tab = $c->listEvents();

?>

<center>
    <h1>Liste des evenements</h1>
    <h2>
        <a href="addEvent.php">add un evenement</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>id_event</th>
        <th>nom_event</th>
        <th>lieux_event</th>
        <th>prix_event</th>
        <th>date_event</th>
        <th>nb_personne</th>
        <th>Update</th>
        <th>Delete</th>
       
    </tr>


    <?php
    foreach ($tab as $event) {
    ?>
        <tr>
            <td><?= $event['id_event']; ?></td>
            <td><?= $event['nom_event']; ?></td>
            <td><?= $event['lieux_event']; ?></td>
            <td><?= $event['prix_event']; ?></td>
            <td><?= $event['date_event']; ?></td>
            <td><?= $event['nb_personne']; ?></td>
            <td>
                <a href="updatEvent.php?id_event=<?php echo $event['id_event']; ?>">Update1</a>
            </td>
            <td align="center">
                <form method="POST" action="updatEvent.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $event['id_event']; ?> name="id_event">
                </form>
            </td>
            <td>
                <a href="deletEvent.php?id_event=<?php echo $event['id_event']; ?>">Delete</a>
            </td>
           
        </tr>
    <?php
    }
    ?>
</table>