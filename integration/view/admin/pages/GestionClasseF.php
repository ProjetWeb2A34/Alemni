<?php
include 'HeaderF.php';
include '../../../controller/ClassesC.php';

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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Class Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Number of Students</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Courses</th>
                                <!--<th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Calendar</th>--> <!-- Added column for calendar -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $class): ?>
                            <tr>
                                <td><?= $class['NomClasse']; ?></td>
                                <td><?= $class['nb_etudiant']; ?></td>
                                <td>
                                    <?php
                                    $courses = $classC->listCoursesForClass($class['id_classe']);
                                    foreach ($courses as $course) {
                                        echo '<a href="PDFGenerator.php?course_name=' . urlencode($course['NomCours']) . '">' . $course['NomCours'] . '</a><br>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <!-- Calendar icon linking to Calendar.php with id_classe parameter -->
                                    <a href="Calendar.php?id_classe=<?= $class['id_classe']; ?>">📅</a>
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
