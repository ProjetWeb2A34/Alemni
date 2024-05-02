<?php
include_once 'C:\xampp\htdocs\projetweb2\controlleur\ReservationC.php';
include_once 'C:\xampp\htdocs\projetweb2\config.php';
include 'C:\xampp\htdocs\projetweb2\controlleur\eventC.php';
include_once 'C:\xampp\htdocs\projetweb2\model\event.php';
$eventC = new eventC();
$events = $eventC->getAllEventIDsAndNames();
$reservation = null;

$reservationC = new ReservationC();
if (
    isset($_POST["nom_client"]) &&
    isset($_POST["id_event"]) &&
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
    <!-- Fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Soft UI Dashboard CSS -->
    <link href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
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
            background-color: #556B2F;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #405623;
        }

        #error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tables</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Tables</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div>
                    </div>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

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
                    <input type="submit" class="btn" value="Save">
                    <input type="reset" class="btn" value="Reset">
                    <button onclick="goBack()" class="btn">Go Back</button>
                </div>
            </form>
        </div>
        <!-- End Reservation Form -->
    </div>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>

    <script>
        function validateForm() {
            var nom_client = document.forms["myForm"]["nom_client"].value;
            var id_event = document.forms["myForm"]["id_event"].value;
            var montant_a_payer = document.forms["myForm"]["montant_a_payer"].value;
            var statut_reservation = document.forms["myForm"]["statut_reservation"].value;
            var error = "";

            if (nom_client == "") {
                error += "Le nom du client est requis.\n";
            }
            if (id_event == "") {
                error += "L'ID de l'événement est requis.\n";
            }
            if (montant_a_payer == "") {
                error += "Le montant à payer est requis.\n";
            }
            if (statut_reservation == "") {
                error += "Le statut de la réservation est requis.\n";
            }

            if (error != "") {
                alert(error);
                return false;
            }
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
