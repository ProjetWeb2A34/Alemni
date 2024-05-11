<?php

include '../../../controller/ClassesC.php';

$error = "";

// create class
$class = null;

// create an instance of the controller
$classC = new ClassesC();
if(isset($_POST["ADD"])){
if (
    isset($_POST["NomClasse"]) &&
    isset($_POST["nb_etudiant"])
) {
    
    if (
        !empty($_POST['NomClasse']) &&
        !empty($_POST["nb_etudiant"])
    ) {
        $class = new Classes(
            null, // id_classe will be auto-incremented
            $_POST['NomClasse'],
            $_POST['nb_etudiant']
        );
        $classC->addClass($class);
        header('Location:ListClasse.php');
        //echo 'oy u entered';
    } else
        {$error = "Please fill in all the fields.";}
    
}
else{$error = "didn't enter";}}

?>
<?php
include ('Header.php');
?>
    <a href="ListClasse.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" class="Classes" onsubmit="return validateForm()">
        <!--form action="http://localhost/Alemni/View/Back/pages/ListClasse.php" method="POST" class="Classes"-->
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="NomClasse">Class Name:
                    </label>
                </td>
                <td><input type="text" name="NomClasse" id="NomClasse"></td>
            </tr>
            <tr>
                <td>
                    <label for="nb_etudiant">Number of Students:
                    </label>
                </td>
                <td><input type="text" name="nb_etudiant" id="nb_etudiant"></td>
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
<script>
    function validateForm() {
        var nbEtudiant = document.getElementById("nb_etudiant").value;
        var NomClasse= document.getElementById("NomClasse").value;

        if (NomClasse.length < 3 || NomClasse.length > 50) {
            alert("Class name must be between 3 and 50 characters.");
            return false;
        }
        if (isNaN(nbEtudiant) || nbEtudiant < 1 || nbEtudiant > 35) {
            alert("Number of Students must be a numeric value between 1 and 35.");
            return false;
        }

        return true;
    }
</script>