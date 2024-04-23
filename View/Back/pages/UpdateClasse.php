<?php

include 'C:\xampp\htdocs\Alemni/Controller/ClassesC.php';

$error = "";

// create class
$class = null;

// create an instance of the controller
$classC = new ClassesC();

// Check if the form is submitted for updating
if(isset($_POST["Update"])) {
    // Check if all required fields are set and not empty
    if (
        isset($_POST["id_classe"]) &&
        isset($_POST["NomClasse"]) &&
        isset($_POST["nb_etudiant"]) &&
        !empty($_POST["id_classe"]) &&
        !empty($_POST["NomClasse"]) &&
        !empty($_POST["nb_etudiant"])
    ) {
        // Create a new class object
        $class = new Classes(
            $_POST['id_classe'],
            $_POST['NomClasse'],
            $_POST['nb_etudiant']
        );
        // Call the updateClass method to update the class information
        $classC->updateClass($class, $_POST["id_classe"]);
        // Redirect to the class list page after updating
        header('Location:ListClasse.php');
        exit; // Exit to prevent further execution
    } else {
        // If any required field is missing, set an error message
        $error = "Missing information";
    }
}

?>
<?php
include ('Header.php');
?>
    <!--<button><a href="ListClasse.php">Back to list</a></button>-->
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    // Check if the update button is clicked and a class ID is provided
    if (isset($_POST['Update']) && isset($_POST['id'])) {
        // Get the class details by ID
        $class = $classC->showClass($_POST['id']);
    ?>

        <form action="" method="POST" class="Classes" onsubmit="return validateForm()">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id_classe">Id Class:
                        </label>
                    </td>
                    <td><input type="text" name="id_classe" id="id_classe" value="<?php echo $class['id_classe']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="NomClasse">Class Name:
                        </label>
                    </td>
                    <td><input type="text" name="NomClasse" id="NomClasse" value="<?php echo $class['NomClasse']; ?>" maxlength="50"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nb_etudiant">Number of Students:
                        </label>
                    </td>
                    <td><input type="text" name="nb_etudiant" id="nb_etudiant" value="<?php echo $class['nb_etudiant']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update" name="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
        
    <?php
    } else {
        // If update button is not clicked or class ID is not provided, show an error message
        $error = "No class selected for update";
        echo $error;
    }
    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<?php
include ('Footer.php');
?>
</body>

</html>
<script>
    function validateForm() {
        //var idClasse = document.getElementById("id_classe").value;
        var nomClasse = document.getElementById("NomClasse").value;
        var nbEtudiant = document.getElementById("nb_etudiant").value;

        /*if (idClasse.length !== 8) {
            alert("Id Class must be 8 digits long.");
            return false;
        }*/

        if (nomClasse.length < 3 || nomClasse.length > 50) {
            alert("Class Name must be between 3 and 50 characters.");
            return false;
        }

        if (isNaN(nbEtudiant) || nbEtudiant < 1 || nbEtudiant > 30) {
            alert("Number of Students must be a numeric value between 1 and 30.");
            return false;
        }

        return true;
    }
</script>







