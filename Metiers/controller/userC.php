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
        $sql = "SELECT * FROM user WHERE name = :name";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->execute(['name' => $user->getname()]);
        $existingUser = $query->fetch();

        if ($existingUser) {
            throw new Exception('User with this name already exists');
        }

        $sql = "INSERT INTO user (name, phone,email,password , role)
    VALUES (:name, :phone,:email,:password , :role)";
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
            throw new Exception('Error: ' . $e->getMessage());
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

    public function getUserById($UserName) {
        // Get the database connection from config.php
        $db = config::getConnexion();
    
        // Préparation de la requête SQL
        $query = $db->prepare("SELECT * FROM user WHERE name = :name");
        $query->bindParam(":name", $UserName);
        
        // Exécution de la requête
        $query->execute();
        
        // Récupération des données de l'utilisateur
        $user = $query->fetch(PDO::FETCH_ASSOC);
        
        // Retourne les données de l'utilisateur
        return $user;
    }

    public function getUserByEmail($email) {
        $sql = "SELECT * FROM user WHERE email = :email";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->execute(['email' => $email]);
        return $query->fetch();
    }

    public function resetPassword($email, $password) {
        $sql = "UPDATE user SET password = :password WHERE email = :email";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->execute(['email' => $email, 'password' => $password]);
    }
      
}
?>