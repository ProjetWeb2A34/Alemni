<?php
include_once 'C:\xampp\htdocs\projetweb2\controlleur\ReservationC.php';
include_once 'C:\xampp\htdocs\projetweb2\controlleur\eventC.php';

include_once 'C:\xampp\htdocs\projetweb2\config.php';




$eventC = new eventC();
$events = $eventC->getAllEventIDsAndNames();
$reservation = null;

// create an instance of the controller
$reservationC = new ReservationC();
if (
    isset($_POST["nom_client"]) &&
    isset($_POST["id_event"]) && // Assurez-vous que cet id_event existe dans votre table 'event'
    isset($_POST["montant_a_payer"]) &&
    isset($_POST["statut_reservation"])
) {
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
            $_POST['statut_reservation']
        );
        $reservationC->addReservation($reservation);
        header('Location:listReservation.php');
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Reservation</title>
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
        input[type="email"],
        input[type="password"],
        input[type="submit"],
        input[type="reset"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"],
        input[type="reset"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #0056b3;
        }
        #error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <center>
        <div class="hero_area">
            <header class="header_section">
                <div class="container">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <a class="navbar-brand" href="index.html">
                            <img src="images/logo.png" alt="" />
                            <span>Alemni</span>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>


                        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">
                    Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html"> About </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="program.html"> Programs </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html"> Contact us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../Backend/pages/sign-in.php"> sign-in</a>
                </li>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                                <ul class="navbar-nav  ">
                                    <!-- Add additional links as needed -->
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>

            <!-- Reservation Form -->
            <div id="container">
                <h1>Add Reservation</h1>
                <form id="myForm" action="" method="POST" onsubmit="return validateForm()">
                    <div>
                        <label for="nom_client">Nom client :</label>
                        <input type="text" id="nom_client" name="nom_client" required />
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
                        <input type="number" id="montant_a_payer" name="montant_a_payer" required />
                    </div>
                    <div>
                        <label for="statut_reservation">Statut réservation :</label>
                        <input type="text" id="statut_reservation" name="statut_reservation" required />
                    </div>
                    <div>
    <input type="submit" class="btn" style="color: #fff; background-color: #556B2F; border-color: #556B2F;" value="Save">
    <input type="reset" class="btn" style="color: #fff; background-color: #556B2F; border-color: #556B2F;" value="Reset">
    <button onclick="goBack()" class="btn" style="color: #fff; background-color: #556B2F; border-color: #556B2F; margin-top: 10px;">Go Back</button>
</div>




                
                </form>
            </div>
        </div>
    </center>
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
