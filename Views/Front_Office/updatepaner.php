<?php
include_once '../../Model/panier.php';
include_once '../../Controller/panierC.php';
	

    $panierC = new panierC();
    $listepanier=$panierC->Afficherpanier(); 
    $error = "";

    $panier = null;

    // $panier = new panierC();


    if (isset($_POST['Modifier'])) {
      if (
          isset($_POST['nom_p']) &&     
          isset($_POST['prix']) &&
          isset($_POST['qunatite'])
      ) {
          if (
              !empty($_POST['nom_p']) &&   
              !empty($_POST['prix']) &&
              !empty($_POST['qunatite']) 
          ) {
              $panier = new panier(
                  null,
                  $_POST['nom_p'],    
                  $_POST['prix'],
                  $_POST['qunatite']
              );
  
              $panierC->Modifierpanier($panier,$_POST['id_p']);
              header('Location:panierL.php'); // Ensure this redirects correctly and the file specified exists
          }
          else{
              $error = "Missing information";
          }
      }        
  }
    ?>
    <!DOCTYPE html>
<html lang="en">

<head>
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
</head>

<body class="sub_page">
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
                <li class="nav-item ">
                  <a class="nav-link" href="index.html">
                    Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html"> About </a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="program.html"> Programs </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html"> Contact us</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- offer section -->
  <!-- uppanier-->
  <button><a href="panierL.php">Retour à la liste des panier</a></button>
  <div id="error">
    <?php echo $error; ?>
  </div>

  <?php
   if (isset($_POST['id_p'])) {
    $panier = $panierC->recupererpanier($_POST['id_p']);

  ?>

    <form name="myForm" action="" onsubmit="return validateForm()" method="POST">
      <style>
        table {
          background-color: white;
          margin: 0 auto;
          /* Centers the table horizontally */
          width: 80%;
          /* Sets the width of the table */
          max-width: 800px;
          /* Sets the maximum width of the table */
          border-collapse: collapse;
          /* Collapses the borders between table cells */
        }

        td {

          padding: 10px;
          /* Adds padding around the table cells */
          text-align: left;
          /* Aligns the text to the left */
        }

        label {
          color: black;
          font-weight: bold;
          /* Makes the label text bold */
        }
      </style>
      <table border="1" align="center">
        <tr style="display: none;">
          <td>
            <label for="id_p">Id :
            </label>
          </td>
          <td><input type="text" name="id_p" id="IDR" value="<?php echo $panier['id_p']; ?>"></td>
        </tr>
        <tr>
          <td>
            <label for="nom_p">nom de cour:
            </label>
          </td>
          <td><input type="text" name="nom_p" id="typer" value="<?php echo $panier['nom_p']; ?>"></td>
        </tr>
        <tr>
          <td>
            <label for="prix">prix:
            </label>
          </td>
          <td><input type="text" name="prix" id="dater" value="<?php echo $panier['prix']; ?>"></td>
        </tr>
        <tr>
          <td>
            <label for="qunatite">qunatite:
            </label>
          </td>
          <td>
            <input type="text" name="qunatite" value="<?php echo $panier['qunatite']; ?>" id="sujet">
          </td>
        </tr>
    
            <input type="submit" value="Modifier" name="Modifier">
          </td>
          <td>
            <input type="reset" value="Annuler">
          </td>
        </tr>
      </table>
    </form>
    <?php
  }
  ?>

  <!---upFpanier-->
  <!-- info section -->
  <section class="info_section layout_padding">
    <div class="container">
      <div class="info_form">

        <div class="row">
          <div class="offset-lg-3 col-lg-3">
            <h5 class="form_heading">
              Newsletter
            </h5>
          </div>
          <div class="col-md-6">
            <form action="#">
              <input type="text" placeholder="Enter Your email">
              <button>
                subscribe
              </button>
            </form>
          </div>
        </div>

      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_logo">
            <div>
              <a href="">
                <img src="images/logo.png" alt="" />
                <span>
                  Brighton
                </span>
              </a>
            </div>
            <p>
              There are many variations of passages of Lorem Ipsum available,
              but the majority have suffered alteration
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_links ">
            <h5>
              Contact Us
            </h5>
            <p class="pr-0 pr-md-4 pr-lg-5">
              Donec odio. Quisque volutpat mattis eros.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec
              odio. Quisque volutpat mattis eros
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_insta">
            <h5>
              INFORMATION
            </h5>
            <p class="pr-0 pr-md-4 pr-md-5">
              Donec odio. Quisque volutpat mattis eros.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec
              odio. Quisque volutpat mattis eros
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="pl-0 pl-lg-5 pl-md-4">
            <h5>
              MY ACCOUNT

            </h5>
            <p>
              Donec odio. Quisque volutpat mattis eros.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec
              odio. Quisque volutpat mattis eros
            </p>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; 2019 All Rights Reserved By
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
      var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 11,
        center: {
          lat: 40.645037,
          lng: -73.880224
        }
      });

      var image = "images/maps-and-flags.png";
      var beachMarker = new google.maps.Marker({
        position: {
          lat: 40.645037,
          lng: -73.880224
        },
        map: map,
        icon: image
      });
    }
  </script>
  <!-- google map js -->

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
  </script>
  <!-- end google map js -->

  <script>
    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
  </script>
</body>

</html>
