<?php
// Include the config.php file to establish a database connection
include "config.php";
// Check if 'id' key is set in the $_GET array
$id = isset($_GET["id"]) ? $_GET["id"] : null;

if ($id !== null) {
    // Your code to fetch data based on the ID
    // This part should be within the condition where $id is not null
} else {
    // Handle the case where 'id' is not provided in the URL
    echo "No ID parameter provided.";
}
?>

<?php
// Check if the database connection is established successfully
if ($conn) {
    // Your HTML code and PHP logic here
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
              integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
              crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <title>PHP CRUD Application</title>
    </head>
    <body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        Alemni Platform
    </nav>
    <div class="container">
        <?php
        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    ' . $msg . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
        ?>
        <a href="add-new.php" class="btn btn-dark mb-3">Add New</a>
        <table class="table table-hover text-center">
            <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Grade</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Check if $conn is defined and not null
            if (isset($conn)) {
                $sql = "SELECT * FROM `crud`";
               // $result = mysqli_query($conn, $sql);
                $result = mysqli_query($conn, "SELECT id, first_name, last_name, subject, grade, email FROM crud");

                while ($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["first_name"] ?></td>
                        <td><?php echo $row["last_name"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["subject"] ?></td>
                        <td><?php echo $row["grade"] ?></td>
                    <td>
    <a href="edit.php?id=<?php echo $row["id"] ?>" >
        <i class="fas fa-edit fs-5 me-3"></i>
    </a>
    <a href="delete.php?id=<?php echo $row["id"] ?>" >
        <i class="fas fa-trash-alt fs-5"></i>
    </a>
</td>

                    </tr>
                    <?php
                }
            } else {
                echo "Failed to connect to the database.";
            }
            ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    </body>
    </html>

    <?php
} else {
    // Display an error message if the database connection fails
    echo "Failed to connect to the database.";
}
?>