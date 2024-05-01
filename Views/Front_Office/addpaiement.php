<?php

include_once '../../Model/paiement.php';
include_once '../../Controller/paiementCrud.php';

$error = "";
$paiement = null;
$paiementCrud = new paiementCrud();

if (
    isset($_POST['num_cart']) &&
    isset($_POST['mot_cart']) &&
    isset($_POST['email']) &&
    isset($_POST['prix_p'])
) {
   

    $paiement = new paiement(
        null, 
        $_POST['num_cart'],
        $_POST['mot_cart'],
        $_POST['email'],
        $_POST['prix_p']
    );
    

    $paiementCrud->Ajouterpaiement($paiement);
    

    header('Location: panierL.php');
    exit; 
}

include('header.php');

?>

<form method="post" class="form" name="myForm" onsubmit="return validateForm()" action="#">
  <table>
    <tr>
      <td><label for="num_cart">Nom de la Carte:</label></td>
      <td><input type="text" name="num_cart" id="num_cart" maxlength="20"></td>
    </tr>
    <tr>
      <td><label for="mot_cart">Mot de la Carte:</label></td>
      <td><input type="password" name="mot_cart" id="mot_cart" maxlength="20"></td>
    </tr>
    <tr>
      <td><label for="email">Email:</label></td>
      <td><input type="email" name="email" id="email"></td>
    </tr>
    <tr>
      <td><label for="prix_p">ID_prdouit:</label></td>
      <td><input type="text" name="prix_p" id="prix_p"></td>
    </tr>
    <tr align="center">
      <td><input class="link55" type="submit" name="ajout" value="Save"></td>
      <td><input class="link55" type="button" value="Annuler" onclick="window.location.href='index.html';"></td>
    </tr>
  </table>
</form>

<script>
function validateForm() {
    /*var valid = true;
    ['num_cart', 'mot_cart', 'email', 'prix_p'].forEach(field => {
        if (document.forms["myForm"][field].value == "") {
            alert(field + " must be filled out");
            valid = false;
        }
    });
    return valid;*/
    var valid = true;
    ['num_cart', 'mot_cart', 'email', 'prix_p'].forEach(field => {
        if (field === 'mot_cart' && document.forms["myForm"][field].value.length !== 8) {
            alert("Mot de la Carte must be exactly 8 characters long");
            valid = false;
        } else if (document.forms["myForm"][field].value == "") {
            alert(field + " must be filled out");
            valid = false;
        }
    });
    return valid;
}
</script>

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