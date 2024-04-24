<?php
include 'HeaderF.php';
include 'C:\xampp\htdocs\Alemni/Controller/ClassesC.php';

$classC = new ClassesC();
$list = $classC->listClasses();
?>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h1>List of classes</h1>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <!--<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>-->
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Class Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Number of Students</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Courses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $class): ?>
                            <tr>
                                <!--<td><?//= $class['id_classe'];?></td>-->
                                <td><?= $class['NomClasse']; ?></td>
                                <td><?= $class['nb_etudiant']; ?></td>
                                <td>
                                    <?php
                                    // Get the list of courses for the current class
                                    $courses = $classC->listCoursesForClass($class['id_classe']);
                                    foreach ($courses as $course) {
                                        echo $course['NomCours'] . "<br>"; // Assuming 'course_name' is the column name for the course name
                                    }
                                    ?>
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

<?php
include 'FooterF.php';
?>

