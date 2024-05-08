<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta viewport="width=device-width, initial-scale=1.0">
    <title>Liste des réservations</title>
    <!-- Bootstrap core CSS -->
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
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size:40px; /* Taille de la police */
            color:#90953b; /* Couleur du texte */
            text-align: center; /* Centrer le texte */
            margin-top: 20px; /* Espacement en haut */
            margin-bottom: 20px; /* Espacement en bas */
            text-transform: uppercase; /* Convertir le texte en majuscules */
            font-weight: bold; /* Gras */
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3); /* Ombre portée */
        }

         h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 500%;
            margin-top: 20px;
            border-collapse: collapse;
            color: #333;

        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color:  #78853f; /* Couleur de fond gris clair pour les en-têtes de colonne */
            color: #fff;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    
    <div class="hero_area">
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.html">
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
                </div>
                    </div>             

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                            <ul class="navbar-nav  ">
                                <li class="nav-item">
                                    <a class="nav-link" href="addReservation.php">Ajouter une réservation</a>
                                </li>
                            </ul>
                            <ul class="navbar-nav  ">
                                <li class="nav-item">
                                    <a class="nav-link" href="listEvent.php">liste des évenements</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </nav>
            </div>
        </header>

        <div id="container">
            <h1>Liste des réservations</h1>
            <table class=table>
                <thead>
                    <tr>
                        <th>ID Réservation</th>
                        <th>Nom Client</th>
                        <th>ID Événement</th>
                        <th>Montant à Payer</th>
                        <th>Statut Réservation</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'C:\xampp\htdocs\projetweb2\controlleur\ReservationC.php';
                    $c = new ReservationC();
                    $tab = $c->listReservations();
                    foreach ($tab as $reservation) {
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($reservation['id_reservation']); ?></td>
                        <td><?= htmlspecialchars($reservation['nom_client']); ?></td>
                        <td><?= htmlspecialchars($reservation['id_event']); ?></td>
                        <td><?= htmlspecialchars($reservation['montant_a_payer']); ?></td>
                        <td><?= htmlspecialchars($reservation['statut_reservation']); ?></td>
                        <td>
    <a href="updateReservation.php?id_reservation=<?= urlencode($reservation['id_reservation']); ?>" style="color: #556B2F;">Update</a>
</td>
<td>
    <a href="deleteReservation.php?id_reservation=<?= urlencode($reservation['id_reservation']); ?>" style="color: #556B2F;">Delete</a>
</td>

                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
     
        <button onclick="goBack()" class="btn" style="color: #fff; background-color: #556B2F; border-color: #556B2F; margin-top: 10px;">Go Back</button>
</div>
    </div>

    <script>
    function goBack() {
        window.history.back();
    }
    </script>
    </div>

</body>
</html>
