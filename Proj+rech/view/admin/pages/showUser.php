<?php
session_start(); // Start the session

include_once "../../../controller/userC.php";
include_once "../../../model/user.php";
include_once "../../../config.php";
include "HeaderF.php";
include "FooterF.php";

$UserC = new UserC();

// Check if a user is logged in
if (isset($_SESSION['user_id'])) {
    $loggedInUserId = $_SESSION['user_id'];

    // Fetch user data based on the logged-in user ID
    $loggedInUser = $UserC->getUserById($loggedInUserId);

    // Check if the user exists and display their information
    if ($loggedInUser) {
        ?>
        <html>
        <head>
            <title>Logged-in User Info</title>
        </head>
        <body>
        <h1>Logged-in User Information</h1>
        <table border="2">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>PHONE</th>
                <th>EMAIL</th>
                <th>ROLE</th>
            </tr>
            <tr>
                <td><?php echo $loggedInUser['id']; ?></td>
                <td><?php echo $loggedInUser['name']; ?></td>
                <td><?php echo $loggedInUser['phone']; ?></td>
                <td><?php echo $loggedInUser['email']; ?></td>
                <td><?php echo $loggedInUser['role']; ?></td>
            </tr>
        </table>
        </body>
        </html>
        <?php
    } else {
        // Handle the case where the user account does not exist
        echo "User account not found.";
    }
} else {
    // Handle the case where no user is logged in (e.g., redirect to login page)
    echo "You are not logged in.";
}
?>
