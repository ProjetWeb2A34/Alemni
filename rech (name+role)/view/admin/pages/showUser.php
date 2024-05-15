<?php


include_once "../../../controller/userC.php";
include_once "../../../model/user.php";
include_once '../../../config.php';

session_start(); 
var_dump($_SESSION);
$UserC = new UserC();
$loggedInUserName= null;

if (isset($_SESSION['name'])) {
    $loggedInUserName = $_SESSION['name'];

    // Fetch user data based on the logged-in user ID
    $loggedInUser = $UserC->getUserById($loggedInUserName);

    // Check if the user exists and display their information
    if ($loggedInUserName) {
        ?>
        <html>
        <head>
            <title>Logged-in User Info</title>
            <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Soft UI Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  
    <!-- Custom styles for this template -->
    <link href="../../css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="../../css/responsive.css" rel="stylesheet" />
        </head>
        <body>

        <div class="hero_area">
      <!-- header section strats -->
      <header class="header_section">
        <div class="container">
          <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="index.html">
              <img src="C:\xampp1\htdocs\ProjetWeb\view\images\logo.png" alt="" />
              <span> Brighton </span>
            </a>
           


            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div
                class="d-flex ml-auto flex-column flex-lg-row align-items-center"
              >
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="index.html">
                      Home <span class="sr-only">(current)</span></a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../about.html"> About </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../program.html"> Programs </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../contact.html"> Contact us</a>
                  </li>
                  <li class="nav-item">

                  

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
         
                </ul>
              </div>
            </div>
            <li class="nav-item d-flex align-items-center ml-auto">
</li>
          </nav>
        </div>

<center>

        <h1>Logged-in User Information</h1>
    </br></br></br>

    <div class="container-fluid">
    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>PHONE</th>
                        <th>EMAIL</th>
                        <th>ROLE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $loggedInUser['id']; ?></td>
                        <td><?php echo $loggedInUser['name']; ?></td>
                        <td><?php echo $loggedInUser['phone']; ?></td>
                        <td><?php echo $loggedInUser['email']; ?></td>
                        <td><?php echo $loggedInUser['role']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


    </center>
        </body>
        </html>
        <?php
    } else {
        // Handle the case where the user account does not exist
        echo "User account not found.";
    }
} else {
    // Handle the case where no user is logged in (e.g., redirect to login page)
    echo "You are not logged in.";
}
?>
