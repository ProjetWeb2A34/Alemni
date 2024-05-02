<?php
    include '../Controleur/UserC.php';
    $UserC = new UserC();
    $showUser = $UserC->showUser();
?>

<html>
<head>
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>CIN</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Email</th>
            <th>Password</th>
           

        </tr>
        <?php foreach ($showUser as $user) { ?>
            <tr>
                <td><?php echo $user['IdUser']; ?></td>
                <td><?php echo $user['CIN']; ?></td>
                <td><?php echo $user['NomUser'] . ' ' . $user['PrenomUser']; ?></td>
                <td><?php echo $user['Phone']; ?></td>
                <td><?php echo $user['RoleUser']; ?></td>
                <td><?php echo $user['Email']; ?></td>
                <td><?php echo $user['Mdp']; ?></td>

            </tr>
        <?php } ?>
    </table>
</body>
</html>
