<?php
//include 'C:\xampp\htdocs\Alemni/Controller/CoursC.php'; 

include_once '../../../Controller/CoursC.php'; 

$coursC = new CoursC();
// Initialize $coursesList as an empty array
$coursesList = [];

// Check if id_classe is set and not empty
if(isset($_POST["CoursModif"]) ) {
    
    if(isset($_POST['id_classe']) && !empty($_POST["id_classe"])) {
        $id_classe = $_POST['id_classe'];
        // Get the list of courses for the given class
        
        $coursesList = $coursC->getCoursesForClass($id_classe);
    } else {
        // Redirect or handle the case where id_classe is not provided
        // For example, redirect to an error page or go back to the previous page
        header("Location: ListClasse.php");
        exit; // Make sure to exit after redirecting
    }
}
?>

<?php
include ('Header.php');
?>
    <!-- Your HTML content goes here -->
    <h1>List of Courses for Class</h1>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center justify-content-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Course Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tutor Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($coursesList)): ?>
                <?php foreach ($coursesList as $course): ?>
                    <tr>
                        <td><?= $course['NomCours']; ?></td>
                        <td><?= $course['NomTuteur']; ?></td>
                        <td>
                        <form method="POST" action="UpdateCourse.php">
                                <input type="submit" name="Update" value="Update" class="btn btn-primary">
                                <input type="hidden" value="<?= $course['IdCours']; ?>" name="id">
                        </form>
                        <a href="deleteCours.php?id=<?= $course['IdCours']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="3">No courses found for this class.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="text-center mt-3">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="POST" action="AddCourses.php">
                <input type="hidden" name="id_classe" value="<?= $id_classe ?>">
                <button type="submit" class="btn btn-success btn-block">Add Course</button>
            </form>
        </div>
    </div>
</div>




<br>
<br>
<br>
<br>
<br>
<br>
<br>


<br>
<?php
include 'Footer.php';
?>
</body>
</html>

