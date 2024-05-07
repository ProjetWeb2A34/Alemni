<?php

include '../../Model/panier.php';
include '../../Controller/panierC.php';
//////
$error = "";
$panier = null;

$panierC = new panierC();

if (
  isset($_POST['nom_p']) &&
  isset($_POST['prix']) &&
  isset($_POST['qunatite'])
) { {

    $panier = new panier(
      null,
      $_POST['nom_p'],
      $_POST['prix'],
      $_POST['qunatite']
    );

    $panierC->Ajouterpanier($panier);
    header('Location:panierL.php');
  }
}
include('header.php')
?>


<!-- offer section -->
<!-- adddpanier-->
<form method="post" class="form" name="myForm" onsubmit="return validateForm()" action="#">
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
  <table>

    <tr>
      <td>
        <label for="nom_p">nom cour:
        </label>
      </td>
      <td><input type="text" name="nom_p" id="nom_p" maxlength="20"></td>
    </tr>
    <tr>
      <td>
        <label for="prix">Prix:
        </label>
      </td>
      <td><input type="text" name="prix" id="prix" maxlength="20"></td>
    </tr>
    <tr>
      <td>
        <label for="qunatite">qunatite:
        </label>
      </td>
      <td>
        <input type="qunatite" name="qunatite" id="qunatite">
      </td>
    </tr>

    <tr align="center">
      <td>
        <input class="link55" type="submit" name="ajout" value="Save">
      </td>
      <td>
        <input class="link55" type="annuler" value="Annuler" onclick="window.location.href='indexPANIER1.html';">
      </td>
    </tr>
  </table>




</form>
<script>
  function validateForm() {
    let x = document.forms["myForm"]["nom_p"].value;
    if (x !== "math" && x !== "physique" && x !== "prog") {
        alert("Name cour must be 'math', 'physique', or 'prog'");
        return false;
    }

    let Y = document.forms["myForm"]["prix"].value;
    if (Y !== "14") {
        alert("Prix must be 14$");
        return false;
    }

    let w = document.forms["myForm"]["qunatite"].value;
    if (w < 1 || w > 7) {
        alert("Quantite must be between 1 and 7");
        return false;
    }

    /*let x = document.forms["myForm"]["nom_p"].value;
            if (x == "") {
                alert("name cour must be filled out");
                return false;
            }
            let Y = document.forms["myForm"]["prix"].value;
            if (Y == "") {
                alert("Prix must be filled out");
                return false;
            }
            let w = document.forms["myForm"]["qunatite"].value;
            if (w == "") {
                alert(" must be filled out");
                return false;
            }*/
  }


</script>


<!---addFpanier-->
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
<?php
include('footer.php')
?>