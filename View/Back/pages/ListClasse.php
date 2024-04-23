<?php
include 'C:\xampp\htdocs\Alemni/Controller/ClassesC.php';
$classC = new ClassesC();
$list = $classC->listClasses();
?>

<html>

<?php
include ('Header.php');
?>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h1>List of classes</h1>
                <h2>
                    <a href="AddClasse.php">Add Class</a>
                </h2>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <!--<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>-->
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Class Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Number of Students</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Courses</th>
                                <!--<th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Actions</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $class): ?>
                            <tr>
                                <!--<td><?= $class['id_classe']; ?></td>-->
                                <td><?= $class['NomClasse']; ?></td>
                                <td><?= $class['nb_etudiant']; ?></td>
                                <td>
                                    <?php
                                    // Get the list of courses for the current class
                                    $courses = $classC->listCoursesForClass($class['id_classe']);
                                    foreach ($courses as $course) {
                                        echo "<li>" . $course['NomCours'] . "</li>";
                                    }
                                    ?>
                                </td>
                                <td class="align-middle" align="center">
                                    <form method="POST" action="UpdateClasse.php">
                                        <input type="submit" name="Update" value="Update" class="btn btn-primary">
                                        <input type="hidden" value="<?= $class['id_classe']; ?>" name="id">
                                    </form>
                                    <a href="deleteClasse.php?id=<?= $class['id_classe']; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="text-align: center; ">
    <button onclick="window.location.href = 'GestionClasse.php';">Go Back to GestionClasse</button>
</div>

<?php 
    include ('Footer.php');
?>
</body>

</html>



<?php
include 'C:\xampp\htdocs\Alemni/Controller/ClassesC.php';
$classC = new ClassesC();
$list = $classC->listClasses();
?>


<html>

<?php
include ('Header.php');
?>



    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h1>List of classes</h1>
                    <h2>
                        <a href="AddClasse.php">Add Class</a>
                    </h2>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id Class</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tutor Id</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Number of Students</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Course Id</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Update</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list as $class): ?>
                                <tr>
                                    <td><?= $class['IdClasse']; ?></td>
                                    <td><?= $class['IdTuteur']; ?></td>
                                    <td><?= $class['nb_etudiant']; ?></td>
                                    <td><?= $class['IdCours']; ?></td>
                                    <td class="align-middle" align="center">
                                        <form method="POST" action="UpdateClasse.php">
                                            <input type="submit" name="update" value="Update" class="btn btn-primary">
                                            <input type="hidden" value="<?= $class['IdClasse']; ?>" name="id">
                                        </form>
                                    </td>
                                    <td class="align-middle" align="center">
                                        <a href="deleteClasse.php?id=<?= $class['IdClasse']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="text-align: center; ">
        <button onclick="window.location.href = 'GestionClasse.php';">Go Back to GestionClasse</button>
    </div>


    <?php 
        include ('Footer.php');
    ?>
</body>

</html>