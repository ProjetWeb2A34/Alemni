<?php

include 'C:\xampp\htdocs\Alemni/Controller/CoursC.php';

$error = "";

// create course
$course = null;

// create an instance of the controller
$coursC = new CoursC();
// Check if the form is submitted for updating
if(isset($_POST["update"])) {
    
    if (
        isset($_POST["id_cours"]) &&
        isset($_POST["NomCours"]) &&
        isset($_POST["NomTuteur"]) &&
        isset($_POST["id_classe"]) && 
        !empty($_POST["id_cours"]) &&
        !empty($_POST["NomCours"]) &&
        !empty($_POST["NomTuteur"]) &&
        !empty($_POST["id_classe"])   
    ) {
        // Create a new course object
        $course = new Cours(
            $_POST['id_cours'],
            $_POST['NomCours'],
            $_POST['NomTuteur'],
            $_POST["id_classe"],
            // Convert session datetime to string
            date('Y-m-d H:i:s', strtotime($_POST['seance']))
        );
        
        $coursC->updateCourse($course, $_POST["id_cours"]);
        header("Location: ListClasse.php");
        exit; 
    } else {
        
        //$error = "Missing information";
    }
}

?>

<?php
include ('Header.php');
?>
<!--<button><a href="ListCours.php">Back to list</a></button>-->
<hr>

<div id="error">
    <?php echo $error; ?>
</div>

<?php
// Check if the update button is clicked and a course ID is provided
if (isset($_POST['Update']) && isset($_POST['id'])) {
    
    $course = $coursC->showCourse($_POST['id']);
    //echo "here is :" . $course->['IdCours'] ;
?>

    <form action="" method="POST" class="Courses" onsubmit="return validateForm()">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="id_cours">Course ID:
                    </label>
                </td>
                <td><input type="text" name="id_cours" id="id_cours" value="<?php echo $course['IdCours']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="NomCours">Course Name:
                    </label>
                </td>
                <td><input type="text" name="NomCours" id="NomCours" value="<?php echo $course['NomCours']; ?>" maxlength="50"></td>
            </tr>
            <tr>
                <td>
                    <label for="NomTuteur">Tutor Name:
                    </label>
                </td>
                <td><input type="text" name="NomTuteur" id="NomTuteur" value="<?php echo $course['NomTuteur']; ?>" maxlength="50"></td>
            </tr>
            <tr>
                <td>
                    <label for="seance">Session:
                    </label>
                </td>
                <td><input type="datetime-local" name="seance" id="seance" value="<?php echo date('Y-m-d\TH:i', strtotime($course['seance'])); ?>"></td>
            </tr>
            <input type="hidden" name="id_classe" value="<?php echo $course["id_classe"]; ?>">

            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Update" name="update">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
    
<?php
} else {
    $error = "No course selected for update";
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


