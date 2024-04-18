<?php

include 'C:\xampp\htdocs\Alemni/Controller/ClassesC.php';

$error = "";

// create class
$class = null;

// create an instance of the controller
$classC = new ClassesC();
if (
    isset($_POST["IdClasse"]) &&
    isset($_POST["IdTuteur"]) &&
    isset($_POST["nb_etudiant"]) &&
    isset($_POST["IdCours"])
) {
    echo "<script>";
    echo "function validateForm() {";
    echo "var idClasse = document.getElementById('IdClasse').value;";
    echo "var nbEtudiant = document.getElementById('nb_etudiant').value;";
    echo "var idTuteur = document.getElementById('IdTuteur').value;";
    echo "if (idClasse.length !== 8) {";
    echo "alert('Classe ID must be 8 digits');";
    echo "return false;";
    echo "}";
    echo "if (nbEtudiant < 1 || nbEtudiant > 30) {";
    echo "alert('Number of Students must be between 1 and 30');";
    echo "return false;";
    echo "}";
    echo "if (idTuteur == 0) {";
    echo "alert('Tuteur ID cannot be 0');";
    echo "return false;";
    echo "}";
    echo "}";
    echo "</script>";
    if (
        !empty($_POST['IdClasse']) &&
        !empty($_POST['IdTuteur']) &&
        !empty($_POST["nb_etudiant"]) &&
        !empty($_POST["IdCours"])
    ) {
        $class = new Classes(
            $_POST['IdClasse'],
            $_POST['IdTuteur'],
            $_POST['nb_etudiant'],
            $_POST['IdCours']
        );
        $classC->addClass($class);
        header('Location:ListClasse.php');
    } else
        $error = "wrong values";
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

    <form action="" method="POST" class="Classes">
        <!--form action="http://localhost/Alemni/View/Back/pages/ListClasse.php" method="POST" class="Classes"-->
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="IdClasse">Classe ID:
                    </label>
                </td>
                <td><input type="text" name="IdClasse" id="IdClasse"></td>
            </tr>
            <tr>
                <td>
                    <label for="IdTuteur">Tuteur ID:
                    </label>
                </td>
                <td><input type="text" name="IdTuteur" id="IdTuteur"></td>
            </tr>
            <tr>
                <td>
                    <label for="nb_etudiant">Number of Students:
                    </label>
                </td>
                <td><input type="text" name="nb_etudiant" id="nb_etudiant"></td>
            </tr>
            <tr>
                <td>
                    <label for="IdCours">Course ID:
                    </label>
                </td>
                <td>
                    <input type="text" name="IdCours" id="IdCours">
                </td>
            </tr>
            <tr align="center">
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
