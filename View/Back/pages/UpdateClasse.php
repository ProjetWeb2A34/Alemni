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
        isset($_POST["IdClasse"]) &&
        isset($_POST["IdTuteur"]) &&
        isset($_POST["nb_etudiant"]) &&
        isset($_POST["IdCours"]) &&
        !empty($_POST["IdClasse"]) &&
        !empty($_POST["IdTuteur"]) &&
        !empty($_POST["nb_etudiant"]) &&
        !empty($_POST["IdCours"])
    ) {
        // Create a new class object
        $class = new Classes(
            $_POST['IdClasse'],
            $_POST['IdTuteur'],
            $_POST['nb_etudiant'],
            $_POST['IdCours']
        );
        // Call the updateClass method to update the class information
        $classC->updateClass($class, $_POST["IdClasse"]);
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
    if (isset($_POST['update']) && isset($_POST['id'])) {
        // Get the class details by ID
        $class = $classC->showClass($_POST['id']);
    ?>

        <form action="" method="POST" class="Classes">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="IdClasse">Id Class:
                        </label>
                    </td>
                    <td><input type="text" name="IdClasse" id="IdClasse" value="<?php echo $class['IdClasse']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="IdTuteur">Tutor Id:
                        </label>
                    </td>
                    <td><input type="text" name="IdTuteur" id="IdTuteur" value="<?php echo $class['IdTuteur']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nb_etudiant">Number of Students:
                        </label>
                    </td>
                    <td><input type="text" name="nb_etudiant" id="nb_etudiant" value="<?php echo $class['nb_etudiant']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="IdCours">Course Id:
                        </label>
                    </td>
                    <td><input type="text" name="IdCours" id="IdCours" value="<?php echo $class['IdCours']; ?>" maxlength="20"></td>
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

