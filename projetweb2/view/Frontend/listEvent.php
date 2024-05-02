<?php
require_once 'C:\xampp\htdocs\projetweb2\controlleur\eventC.php';
$c = new eventC();
$tab = $c->listEvents();

// Vérifiez que $tab est bien un tableau avant de continuer
if (!is_array($tab)) {
    die('Erreur : La variable $tab n\'est pas un tableau');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des événements</title>
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
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
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
            <h1>Liste des événements</h1>
           
            <table class="table">
                <thead class="thead-light">
                     <tr>
        <th>id_event</th>
        <th>nom_event</th>
        <th>lieux_event</th>
        <th>prix_event</th>
        <th>date_event</th>
        <th>nb_personne</th>
    
    </tr>

</thead>
<tbody>
  <?php foreach ($tab as $event): ?>
    <tr>
      <td><?= htmlspecialchars($event['id_event']); ?></td>
      <td><?= htmlspecialchars($event['nom_event']); ?></td>
      <td><?= htmlspecialchars($event['lieux_event']); ?></td>
      <td><?= htmlspecialchars($event['prix_event']); ?></td>
      <td><?= htmlspecialchars($event['date_event']); ?></td>
      <td><?= htmlspecialchars($event['nb_personne']); ?></td>
    
    </tr>
  <?php endforeach; ?>
</tbody>
            </table>
        </div>
        <button onclick="goBack()" class="btn" style="color: #fff; background-color: #556B2F; border-color: #556B2F; margin-top: 10px;">Go Back</button>

    </div>

 <script>
    function goBack() {
        window.history.back();
    }
    </script>
    </div>

</body>
</html>
