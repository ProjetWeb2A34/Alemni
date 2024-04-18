<?php
    include __DIR__.'/../../../Model/reclamation.php';
    include __DIR__.'/../../../Controller/reclamationC.php';

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
                null,
				$_POST['typer'],
                $_POST['dater'], 
				$_POST['sujet'],
                $_POST['dess']

            );
            $reclamationC->ajouterreclamation($reclamation);
            header('location:afficherListereclamations.php');
        }
        else
            $error = "Missing information";
    }

    
?>


<?php 
include ('header.php');
?>
  <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>Ajouter Une Reclamation</h2>
        

          </div>
        </div>
      </div>
    </div><!-- End Page Header -->
    <body>
        <button><a href="afficherListereclamations.php">Retour à la liste des reclamations</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        <script>
            function validateForm() {
    let x = document.forms["myForm"]["typer"].value;
    if (x == "") {
      alert("type must be filled out");
      return false;
    }
    let Y = document.forms["myForm"]["sujet"].value;
    if (Y=="") {
      alert("sujet must be filled out");
      return false;
    }
    let w = document.forms["myForm"]["dater"].value;
    if (w=="") {
      alert("date must be filled out");
      return false;
    }
    let Z = document.forms["myForm"]["dess"].value;
    if (Z=="") {
      alert("dess of  must be filled out");
      return false;
    }

  }
        </script>
        <style>
table {
background-color: white;
  margin: 0 auto; /* Centers the table horizontally */
  width: 80%; /* Sets the width of the table */
  max-width: 800px; /* Sets the maximum width of the table */
  border-collapse: collapse; /* Collapses the borders between table cells */
}

td {

  padding: 10px; /* Adds padding around the table cells */
  text-align: left; /* Aligns the text to the left */
}

label {
    color: black;
  font-weight: bold; /* Makes the label text bold */
}
</style>
        <form name="myForm" action="" onsubmit="return validateForm()"method="POST">
            <table border="1" align="center">
				<tr>
                    <td>
                        <label for="typer">type de reclamation :
                        </label>
                    </td>
                    <td><input type="text" name="typer" id="typer" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="dater">date de reclamation :
                        </label>
                    </td>
                    <td><input type="date" name="dater" id="dater" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="sujet">sujet de reclamation:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="sujet" id="sujet">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dess">description de reclamation :
                        </label>
                    </td>
                    <td>
                        <input type="text" name="dess" id="dess">
                    </td>
                </tr>            
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>  <?php 
include ('footer.php');
?>

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
  
  
  
  <script>

    </script>

    <body>
    <html lan="en">
     <head> 
        </head>
        </body>
  



        <?php
  /*---------------------------------------------------------------*/
/*
    Titre : Traduire vos pages dans une autre langue                                                                      
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=817
    Auteur           : sheppy1                                                                                            
    Date édition     : 11 Jan 2019                                                                                        
    Date mise à jour : 19 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/

/*---------------------------------------------------------------*/?>
    <!DOCTYPE html> 
    <html lang="fr">
    <body> 
      
      
    <p>Translate this page in your preferred language:</p>
      
    <div id="google_translate_element"></div> 
      
    <script type="text/javascript"> 
    function googleTranslateElementInit() { 
      new google.translate.TranslateElement({pageLanguage: 'en'},
 'google_translate_element'); 
    } 
    </script> 
      
    <script type="text/javascript"
 src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementIni
t"></script> 
      
   
    </body> 
    </html>


                                   
    <?php
/*---------------------------------------------------------------*/
/*
    Titre : Affiche date et heure dynamiquement                                                                           
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=664
    Date édition     : 16 Sept 2012                                                                                       
    Date mise à jour : 16 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/

define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', dirname(__FILE__).DS);
define('BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/');
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>AJAX refresh example</title>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script>
       function updateClock() {
    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth() + 1;
    var day = now.getDate();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var dateString = year + '-' + month + '-' + day;
    var timeString = hours + ':' + minutes + ':' + seconds;
    document.getElementById('date').innerHTML = dateString;
    document.getElementById('time').innerHTML = timeString;
}

setInterval(updateClock, 1000);

    </script>
</head>
<body>
    <div id="ajax-refresh">
        <div id="date"></div>
<div id="time"></div>

</body>
</html>

  