<?php
    include_once '../Model/User.php';
    include '../Controleur/UserC.php';

    $error = "";

    $User = null;

    $IdUser ,int $CIN , string $NomUser , string $PrenomUser,int $Phone ,string $RoleUser , string $Email ,string $Mdp)

    $UserC = new UserC();
    if (
        isset($_POST["IdUser"]) &&
		isset($_POST["CIN"]) &&		
        isset($_POST["NomUser"]) &&
		isset($_POST["PrenomUser"]) && 
        isset($_POST["Phone"]) &&	
        isset($_POST["RoleUser"]) &&
		isset($_POST["Email"]) &&
        isset($_POST["Mdp"]) &&
		isset($_POST["ConfirmMdp"]) &&		
        isset($_POST["Sexe"]) &&
		isset($_POST["DateDeNaissance"]) &&
        isset($_POST["DescriptionU"]) &&
        isset($_POST["Adresse"])  
    ) {
        if (
           
            !empty($_POST["IdUser"]) &&
            !empty($_POST["CIN"]) &&		
            !empty($_POST["NomUser"]) &&
            !empty($_POST["PrenomUser"]) && 
            !empty($_POST["Phone"]) &&		
            !empty($_POST["RoleUser"]) &&
            !empty($_POST["Email"]) &&
            !empty($_POST["Mdp"]) &&
            !empty($_POST["ConfirmMdp"]) &&		
            !empty($_POST["Sexe"]) &&
            !empty($_POST["DateDeNaissance"]) &&
            !empty($_POST["DescriptionU"]) &&
            !empty($_POST["Adresse"]) 
        ) {
            $User = new User(
                $_POST['IdUser'],
				$_POST['CIN'],
                $_POST['NomUser'], 
				$_POST['PrenomUser'],
                $_POST['Phone']
                $_POST['RoleUser'],
				$_POST['Email'],
                $_POST['Mdp'], 
				$_POST['ConfirmMdp'],
                $_POST['Sexe']
                $_POST['DateDeNaissance'], 
				$_POST['DescriptionU'],
                $_POST['Adresse']
            );
            $UserC->addUser($User);
            header('Location:showUser.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title> 
</head>
    <body>
        <script> 
        function validateEmail(email){
            const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            return re.test(String(email));
        }
       
        </script>


        <button><a href="showUser.php"> afficher la liste des utilisateurs </a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="IdUser">id de l'utilisateur:
                        </label>
                    </td>
                    <td><input type="number" name="id" id="id" ></td>
                </tr>

                <tr>
                    <td>
                        <label for="CIN">CIN de l'utilisateur:
                        </label>
                    </td>
                    <td><input type="number" name="CIN" id="CIN" ></td>
                </tr>

				<tr>
                    <td>
                        <label for="NomUser">Nom de l'utilisateur:
                        </label>
                    </td>
                    <td><input type="text" name="NomUser" id="NomUser" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="PrenomUser">Prenom de l'utilisateur:
                        </label>
                    </td>
                    <td><input type="text" name="PrenomUser" id="PrenomUser" ></td>
                </tr>

                <tr>
                    <td>
                        <label for="Phone">num de tel de l'utilisateur:
                        </label>
                    </td>
                    <td><input type="number" name="Phone" id="Phone" ></td>
                </tr>

                <tr>
                    <td>
                        <label for="RoleUser">Role (********):
                        </label>
                    </td>
                    <td>
                        <input type="text" name="RoleUser" id="RoleUser" >
                    </td>
                </tr>  
                <tr>
                    <td>
                        <label for="Email">Adresse mail:
                        </label>
                    </td>
                    <td>
                        <input type="email" name="Email" id="Email">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="Mdp">Mot de Passe:
                        </label>
                    </td>
                    <td>
                        <input type="password" name="Mdp" id="Mdp">
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="se connecter"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>