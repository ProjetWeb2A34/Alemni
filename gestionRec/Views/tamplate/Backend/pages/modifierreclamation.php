<?php
include __DIR__ . '/../../../../Model/reclamation.php';
include __DIR__ . '/../../../../Controller/reclamationC.php';


$error = "";

// create reclamation
$reclamation = null;

// create an instance of the controller
$reclamationC = new reclamationC();
if (
  isset($_POST["typer"]) &&
  isset($_POST["dater"]) &&
  isset($_POST["sujet"]) &&
  isset($_POST["dess"])
) {
  if (
    !empty($_POST['typer']) &&
    !empty($_POST["dater"]) &&
    !empty($_POST["sujet"]) &&
    !empty($_POST["dess"])
  ) {
    $reclamation = new reclamation(
      $_POST['IDR'],
      $_POST['typer'],
      $_POST['dater'],
      $_POST['sujet'],
      $_POST['dess']
    );
    $reclamationC->modifierreclamation($reclamation, $_POST["IDR"]);
    header('location:afficherListereclamations.php');
  } else
    $error = "Missing information";
}
?>


<!DOCTYPE html>
<html lang="en">

<body>
  <button><a href="afficherListereclamations.php">Retour à la liste des reclamations</a></button>
  <hr>
  <script>
    function validateForm() {
      let x = document.forms["myForm"]["typer"].value;
      if (x == "") {
        alert("type must be filled out");
        return false;
      }
      let Y = document.forms["myForm"]["sujet"].value;
      if (Y == "") {
        alert("sujet must be filled out");
        return false;
      }
      let w = document.forms["myForm"]["dater"].value;
      if (w == "") {
        alert("date must be filled out");
        return false;
      }
      let Z = document.forms["myForm"]["dess"].value;
      if (Z == "") {
        alert("dess of  must be filled out");
        return false;
      }

    }
  </script>
  <div id="error">
    <?php echo $error; ?>
  </div>

  <?php
  if (isset($_POST['IDR'])) {
    $reclamation = $reclamationC->recupererreclamation($_POST['IDR']);

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
            <label for="IDR">Id reclamation:
            </label>
          </td>
          <td><input type="text" name="IDR" id="IDR" value="<?php echo $reclamation['IDR']; ?>"></td>
        </tr>
        <tr>
          <td>
            <label for="typer">type de reclamation:
            </label>
          </td>
          <td><input type="text" name="typer" id="typer" value="<?php echo $reclamation['typer']; ?>"></td>
        </tr>
        <tr>
          <td>
            <label for="dater">date de reclamation:
            </label>
          </td>
          <td><input type="date" name="dater" id="dater" value="<?php echo $reclamation['dater']; ?>"></td>
        </tr>
        <tr>
          <td>
            <label for="sujet">sujet de reclamation:
            </label>
          </td>
          <td>
            <input type="text" name="sujet" value="<?php echo $reclamation['sujet']; ?>" id="sujet">
          </td>
        </tr>
        <tr>
          <td>
            <label for="dess">description de reclamation:
            </label>
          </td>
          <td>
            <input type="dess" name="dess" id="dess" value="<?php echo $reclamation['dess']; ?>">
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" value="Modifier">
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
</body>

</html>

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