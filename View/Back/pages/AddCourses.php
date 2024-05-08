<?php

include 'C:\xampp\htdocs\Alemni/Controller/CoursC.php';

$error = "";

// Create course
$course = null;

// Create an instance of the controller
$coursC = new CoursC();

if(isset($_POST["ADD"])) {
    if (
        isset($_POST["NomCours"]) &&
        isset($_POST["NomTuteur"]) &&
        isset($_POST["id_classe"]) && // Ensure id_classe is set
        !empty($_POST["NomCours"]) &&
        !empty($_POST["NomTuteur"]) &&
        !empty($_POST["id_classe"])   // Ensure id_classe is not empty
    ) {
        $course = new Cours(
            null, // id_cours will be auto-incremented
            $_POST["NomCours"],
            $_POST["NomTuteur"],
            $_POST["id_classe"],
            null
        );
        $coursC->addCourse($course);
        header('Location:ListClasse.php');
    } else {
        $error = "Please fill in all the fields.";
    }
}

?>

<?php
include ('Header.php');
?>
    <a href="ListClasse.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" class="Courses" onsubmit="return validateForm()">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="NomCours">Course Name:
                    </label>
                </td>
                <td><input type="text" name="NomCours" id="NomCours"></td>
            </tr>
            <tr>
                <td>
                    <label for="NomTuteur">Tutor Name:
                    </label>
                </td>
                <td><input type="text" name="NomTuteur" id="NomTuteur"></td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id_classe" value="<?php echo $_POST["id_classe"]; ?>">
                </td>
                <td>
                    <input type="submit" value="Save" name="ADD">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
    <br>
        <br>
        <br>
        <br>
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
        var nomCours = document.getElementById("NomCours").value;
        var nomTuteur = document.getElementById("NomTuteur").value;

        /*if (idClasse.length !== 8) {
            alert("Id Class must be 8 digits long.");
            return false;
        }*/

        if (nomCours.length < 3 || nomCours.length > 50) {
            alert("Course Name must be between 3 and 50 characters.");
            return false;
        }

        if (nomTuteur.length < 3 || nomTuteur.length > 50) {
            alert("Tutor Name must be between 3 and 50 characters.");
            return false;
        }

        return true;
    }
</script>
