<?php
include_once '../../../model/panier.php';
include_once '../../../controller/panierC.php';
	

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
      include('HeaderF.php');      
  }
    ?>
    

  <!-- offer section -->
  <!-- uppanier-->
  <button class="link55"><a href="panierL.php" >Retour à la liste des panier</a></button>
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
          <td><input type="text" name="id_p" id="ID" value="<?php echo $panier['id_p']; ?>"></td>
        </tr>
        <tr>
          <td>
            <label for="nom_p">nom de cour:
            </label>
          </td>
          <td><input type="text" name="nom_p" id="nom_p" value="<?php echo $panier['nom_p']; ?>"></td>
        </tr>
        <tr>
          <td>
            <label for="prix">prix:
            </label>
          </td>
          <td><input type="text" name="prix" id="prix" value="<?php echo $panier['prix']; ?>"></td>
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
        <td>
    
            <input type="submit" class="link55" value="Modifier" name="Modifier">
          </td>
          <td>
            <input type="reset" class="link55" value="Annuler" onclick="window.location.href='panierL.php';">
          </td>
        </tr>
      </table>
    </form>
    <?php
  }
  ?>
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

  <!---upFpanier-->
  <?php
include('Footer.php')
?>