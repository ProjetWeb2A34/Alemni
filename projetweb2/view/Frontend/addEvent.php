<?php

include 'C:\xampp\htdocs\projetweb2\controlleur\eventC.php';
//include 'C:\xampp\htdocs\projetweb2\model\event.php';

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
<Center>
    <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Alemni</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Display</title> 
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
    </center>
</head>

<body>
<center>
<form id="myForm" action="" method="POST">

        <div class="hero_area"> 
          <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="" />
            <span>
              Alemni
            </span>
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
                  <a class="nav-link" href="addUser.php"> ajouter </a>
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
                <!-- dropdown -->
								<li class="dropdown header__nav-item">
									<a class="dropdown-toggle header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-more"></i></a>

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
										<li><a href="CLASSE.html">Gestion Classes </a></li>
										<li><a href="EVALUATION.html">Gestion Evaluations </a></li>
										<li><a href="EVENT.html">Gestion Evenements </a></li>
										<li><a href="RECLAMATION.html">Gestion Reclamations </a></li>
                    <li><a href="PANIER.html">Gestion Panier </a></li>
									</ul>
								</li>
								<!-- end dropdown -->

              </ul>


      


            </div>
          </div>
        </nav>
      </div>
    <hr>

    <form action="" method="POST">
        <table>
        <tr>
                <td><label for="id_event">id_event :</label></td>
                <td>
                    <input type="text" id="id_event" name="id_event" />
                </td>
            </tr>
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
    </center>
</body>

</html>