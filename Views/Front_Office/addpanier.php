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
<form method="post" class="form" action="#">
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
        <input type="submit" name="ajout" value="Save">
      </td>
      <td>
        <input type="annuler" value="Annuler" onclick="window.location.href='index.html';">
      </td>
    </tr>
  </table>




</form>


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