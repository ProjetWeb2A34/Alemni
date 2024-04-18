<?php
include __DIR__ . '/../../../../Controller/reclamationC.php';

$reclamationC = new reclamationC();
$listereclamations = $reclamationC->afficherreclamations();
?>

<html>
  <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>

  <body>
    <center>
      <h1>Liste des reclamations</h1>
    </center>
    <button><a href="profile.php">Ajouter un reclamation</a></button>
<br>
    <table class="my-table" border="1" align="center" id="reclamation-table">
      <tr>
        <th>IDR</th>
        <th>Type</th>
        <th>Date</th>
        <th>Sujet</th>
        <th>Description</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
      <?php foreach ($listereclamations as $reclamation) { ?>
        <tr>
          <td><?php echo $reclamation['IDR']; ?></td>
          <td><?php echo $reclamation['typer']; ?></td>
          <td><?php echo $reclamation['dater']; ?></td>
          <td><?php echo $reclamation['sujet']; ?></td>
          <td><?php echo $reclamation['dess']; ?></td>

          <td>
            <form method="POST" action="modifierreclamation.php">
              <input type="submit" name="Modifier" value="Modifier">
              <input type="hidden" value=<?PHP echo $reclamation['IDR']; ?> name="IDR">
            </form>
          </td>
          <td>
            <a href="supprimerreclamation.php?IDR=<?php echo $reclamation['IDR']; ?>">Supprimer</a>
          </td>
        </tr>
      <?php } ?>
    </table>

    
    <style>
      .my-table {
        background-color: white;
        border-collapse: collapse;
        width: 100%;
        font-size: 1em;
        font-family: Arial, sans-serif;
        color: #333;
      }

      .my-table th,
      .my-table td {
        padding: 0.5em;
        border: 1px solid #ccc;
      }

      .my-table th {
        background-color: #f7f7f7;
        text-align: left;
        font-weight: bold;
      }

      .my-table td {
        text-align: left;
      }

      .my-table td form {
        display: inline-block;
      }

      .my-table td a {
        display: inline-block;
        padding: 0.5em;
        background-color: #f44336;
        color: #fff;
        text-decoration: none;
        border-radius: 2px;
      }

      .my-table td a:hover {
        background-color: #d32f2f;
      }
    </style>



    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader">
      <div class="line"></div>
    </div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>










  </body>

</html>