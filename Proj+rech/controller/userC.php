<?php

class UserC
{
    function list() //affichage de produit
    {
        $sql = "SELECT * FROM user";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $service = $query->fetch();
            $res = [];
            for ($x = 0; $service; $x++) {
                $res[$x] = $service;
                $service = $query->fetch();
            }
            return $res;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function researcherParName($name) //affichage de produit
    {
        echo $name; // This is just for debugging purposes, remove it if not needed
    
        $sql = "SELECT * FROM user WHERE name = :name"; // Corrected SQL query
        $db = config::getConnexion(); // Assuming config::getConnexion() returns a database connection object
    
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':name', $name);
            $query->execute();
    
            // Fetching results
            $res = [];
            while ($service = $query->fetch(PDO::FETCH_ASSOC)) {
                $res[] = $service; // Append fetched row to the result array
            }
    
            return $res;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    function checkloginExist($email,$password){
        $sql = "SELECT * FROM user where email = :email AND password = :password";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':email', $email);
            $query->bindValue(':password', $password);
            $query->execute();
            return $query->fetch();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function delete($name)
    {
        $sql = "DELETE FROM user WHERE name = :name";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':name', $name);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function adduser($user)
    {
        $sql = "INSERT INTO user (id  , name, phone,email,password , role)
        VALUES (null  , :name, :phone,:email,:password , :role)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'name' => $user->getname(),
                'phone' => $user->getphone(),
                'email' => $user->getemail(),
                'password' => $user->getpassword(),
                'role' => $user->getrole(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function update($user, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET    
                  name = :name,              
                  phone = :phone,
                  email = :email,
                  password = :password
                  role = :role
                WHERE id = :id'
            );
            $query->execute([
                'id' => $id,
                'name' => $user->getname(),
                'phone' => $user->getphone(),
                'email' => $user->getemail(),
                'password' => $user->getpassword(),
                'role' => $user->getrole(),
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function isAdmin($userId) {
        // Implement your logic to check if user with $userId is an admin
        $sql = "SELECT role FROM user WHERE id = :id"; // Use :id consistently
        $db = config::getConnexion();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $userId); // Bind :id with $userId
        $stmt->execute();
    
        $userData = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch data as associative array
    
        // Check if user data exists and role is 'Admin' (case-sensitive)
        return ($userData && $userData['role'] === 'Admin');
    }

    public function getUserById($userId) {
        // Connexion à la base de données (utilisation de PDO ou autre)
        $db = new PDO("mysql:host=localhost;dbname=votre_base_de_donnees", "votre_utilisateur", "votre_mot_de_passe");
        
        // Préparation de la requête SQL
        $query = $db->prepare("SELECT * FROM users WHERE id = :userId");
        $query->bindParam(":userId", $userId);
        
        // Exécution de la requête
        $query->execute();
        
        // Récupération des données de l'utilisateur
        $user = $query->fetch(PDO::FETCH_ASSOC);
        
        // Retourne les données de l'utilisateur
        return $user;
    }

      
}
?>