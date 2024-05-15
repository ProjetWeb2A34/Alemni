<?php
include "config.php";

// Check if id parameter is set in the URL
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    // Prepare the SQL statement
    $sql = "DELETE FROM `crud` WHERE id = $id";

    // Execute the SQL statement
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        header("Location: index.php?msg=Data deleted successfully");
        exit(); // Terminate script after redirection
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
} else {
    // Redirect to index.php if id parameter is not set
    header("Location: index.php");
    exit(); // Terminate script after redirection
}