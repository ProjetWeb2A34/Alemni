<?php
include_once '../Model/paiement.php';
include_once '../../../Controller/paiementCruda.php';
	

    $paiementCrud = new paiementCrud();
    $listepaiement=$paiementCrud->Afficherpaiement(); 
    $error = "";

    $paiement = null;

    // $paiement = new paiementC();


    if (isset($_POST['Modifier'])) {
      if (
        isset($_POST['num_cart']) &&
        isset($_POST['mot_cart']) &&
        isset($_POST['email']) 
    ) {
          if (
              !empty($_POST['num_cart']) &&   
              !empty($_POST['mot_cart']) &&
              !empty($_POST['email']) 
          )  {
            $paiement = new paiement_2(null, $_POST['num_cart'], $_POST['mot_cart'], $_POST['email'], null);
            $paiementCrud->Modifierpaiement($paiement, $_POST['idpai']);
              header('Location:paimentL.php'); // Ensure this redirects correctly and the file specified exists
          }
          else{
              $error = "Missing information";
          }
      }        
  }
    ?>
<?php
include ('Header.php');
?>
  <div> 
  <button ><a href="paimentL.php" >Retour à la liste des paiement</a></button>
  <div id="error">
    <?php echo $error; ?>
  </div>

  <?php
   if (isset($_POST['idpai'])) {
    $paiement = $paiementCrud->recupererpaiement($_POST['idpai']);

  ?>

    <form name="myForm" action="" onsubmit="return validateForm()" method="POST">
      <style>
        table {
          

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
          <td><input type="hidden" name="idpai" value="<?php echo $paiement['idpai']; ?>"></td>
        </tr>
        <tr>
          <td>
            <label for="num_cart">numnumero de carte:
            </label>
          </td>
          <td><input type="text" name="num_cart" id="num_cart" value="<?php echo $paiement['num_cart']; ?>"></td>
        </tr>
        <tr>
          <td>
            <label for="mot_cart">mot_cart:
            </label>
          </td>
          <td><input type="text" name="mot_cart" id="mot_cart" value="<?php echo $paiement['mot_cart']; ?>"></td>
        </tr>
        <tr>
          <td>
            <label for="email">email:
            </label>
          </td>
          <td>
            <input type="text" name="email" value="<?php echo $paiement['email']; ?>" id="email">
          </td>
        </tr>
        <td>
    
            <input type="submit" class="btn btn-primary"  value="Modifier" name="Modifier">
          </td>
          <td>
            <input type="reset" class="btn btn-primary" value="Annuler">
          </td>
        </tr>
      </table>
    </form>
    <?php
  }
  ?>
  </div>
  <?php
include ('Footer.php');
?>
</body>
</html>