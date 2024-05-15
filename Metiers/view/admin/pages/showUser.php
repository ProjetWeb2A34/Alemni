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

                  <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active " href="?logout=1"  role="tab" >
                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(603.000000, 0.000000)">
                              <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                              </path>
                              <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                              <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <span class="ms-1">Log Out</span>
    </br>
                   
                    </a>
                  </li>

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
