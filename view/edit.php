<?php
include "config.php";

$id = $_GET["id"];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);

    $sql = "UPDATE `crud` SET `first_name`='$first_name', `last_name`='$last_name', `email`='$email', `subject`='$subject', `grade`='$grade' WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Redirect to index page with success message
        header("Location: index.php?msg=Data updated successfully");
        exit();
    } else {
        // Display error message
        echo "Failed to update data: " . mysqli_error($conn);
    }
}

// Fetch record based on the provided ID
$sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content here -->
</head>
<body>
    <div class="container">
        <h2>Edit Record</h2>
        <form action="edit.php?id=<?php echo $id ?>" method="post">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>"><br><br>
            <!-- Repeat similar fields for other attributes -->
            <button type="submit" name="submit">Update</button>
        </form>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
