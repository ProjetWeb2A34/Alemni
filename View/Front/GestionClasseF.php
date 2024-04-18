<?php
include 'HeaderF.php';
?>



<?php
include 'C:\xampp\htdocs\Alemni/Controller/ClassesC.php';
$classC = new ClassesC();
$list = $classC->listClasses();
?>




    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h1>List of classes</h1>
                    <!--<h2>
                        <a href="AddClasse.php">Add Class</a>
                    </h2>-->
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
                                    </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list as $class): ?>
                                <tr>
                                    <td><?= $class['IdClasse']; ?></td>
                                    <td><?= $class['IdTuteur']; ?></td>
                                    <td><?= $class['nb_etudiant']; ?></td>
                                    <td><?= $class['IdCours']; ?></td>
                                    
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