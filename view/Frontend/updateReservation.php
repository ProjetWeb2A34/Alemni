
<?php
include_once 'C:\xampp\htdocs\projetweb2\controlleur\ReservationC.php';
include_once 'C:\xampp\htdocs\projetweb2\controlleur\eventC.php';

include_once 'C:\xampp\htdocs\projetweb2\config.php';




$eventC = new eventC();
$events = $eventC->getAllEventIDsAndNames();
$reservationC = new ReservationC();

if (isset($_GET["id_reservation"]) && !empty($_GET['id_reservation'])) {
    $oldReservation = $reservationC->getReservationById($_GET['id_reservation']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (
            !empty($_POST['nom_client']) &&
            !empty($_POST['id_event']) &&
            !empty($_POST["montant_a_payer"]) &&
            !empty($_POST["statut_reservation"])
        ) {
            $reservation = new Reservation(
                $_POST['nom_client'],
                $_POST['id_event'],
                $_POST['montant_a_payer'],
                $_POST['statut_reservation'],
                $_GET['id_reservation']
            );

            $updateSuccess = $reservationC->updateReservation($reservation);

            if ($updateSuccess) {
                header('Location: listReservation.php');
                exit();
            } else {
                $errorMessage = "Failed to update reservation.";
            }
        }
    }
} else {
    $errorMessage = "Missing reservation ID.";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Reservation</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- Fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        #container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="submit"],
        input[type="reset"],
        .btn {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"],
        input[type="reset"],
        .btn {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover,
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="navbar-brand" href="index.html">
                        <span>Alemni</span>
                    </a>
                </nav>
            </div>
        </header>

<div id="container">
            <h1>Update Reservation</h1>
            <?php if (isset($errorMessage)): ?>
                <p><?php echo $errorMessage; ?></p>
            <?php endif; ?>

            <?php if (isset($oldReservation)): ?>
                <form id="myForm" action="" method="POST" onsubmit="return validateForm()">
                    <input type="hidden" id="id_reservation" name="id_reservation" value="<?php echo $_GET['id_reservation']; ?>" />
                    <!-- Form fields -->
                    <div>
                        <label for="nom_client">Nom du client :</label>
                        <input type="text" id="nom_client" name="nom_client" value="<?php echo htmlspecialchars($oldReservation['nom_client']); ?>" required />
                    </div>
                    <div>
                    <label for="id_event" class="font-weight-bold">Nom Evenement :</label>
<select id="id_event" name="id_event" class="custom-select" required>
    <option value="">Sélectionnez un événement</option>
    <?php foreach ($events as $event) : ?>
        <option value="<?= htmlspecialchars($event['id_event']); ?>">
            <?= htmlspecialchars($event['id_event']); ?> - <?= htmlspecialchars($event['nom_event']); ?>
        </option>
    <?php endforeach; ?>
</select>
                       
                    </div>
                    <div>
                        <label for="montant_a_payer">Montant à payer :</label>
                        <input type="number" id="montant_a_payer" name="montant_a_payer" value="<?php echo htmlspecialchars($oldReservation['montant_a_payer']); ?>" required />
                    </div>
                    <div>
                        <label for="statut_reservation">Statut de la réservation :</label>
                        <input type="text" id="statut_reservation" name="statut_reservation" value="<?php echo htmlspecialchars($oldReservation['statut_reservation']); ?>" required />
                    </div>
                    <div>
    <input type="submit" value="Save" style="color: #fff; background-color: #556B2F; border-color: #556B2F;">
    <input type="reset" value="Reset" style="color: #fff; background-color: #556B2F; border-color: #556B2F;">
</div>
<a href="listReservation.php" class="btn" style="color: #fff; background-color: #556B2F; border-color: #556B2F; margin-top: 10px;">Back to List</a>
<?php endif; ?>

        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    function goBack() {
      window.history.back();
    }
    </script>
    <script>
    function validateForm() {
        var nom = document.getElementById('nom_client').value;
        var id = document.getElementById('id_event').value;
        var montant = document.getElementById('montant_a_payer').value;
        var statut = document.getElementById('statut_reservation').value;

        // Définir les statuts valides
        var validStatuses = ['confirmé', 'en attente', 'annulé']; // Ajoutez ou modifiez les statuts selon les besoins

        if (nom.length < 3 || nom.length > 50) {
            alert('Le nom du client doit contenir entre 3 et 50 caractères.');
            return false;
        }
        if (id <= 0) {
            alert('L\'ID de l\'événement doit être un nombre positif.');
            return false;
        }
        if (montant <= 0) {
            alert('Le montant à payer doit être un nombre positif.');
            return false;
        }
        if (!statut || !validStatuses.includes(statut.toLowerCase())) {
            alert('Le statut de la réservation doit être un des suivants : ' + validStatuses.join(', ') + '.');
            return false;
        }
        return true;
    }

    function goBack() {
        window.history.back();
    }
</script>

</body>
</html>