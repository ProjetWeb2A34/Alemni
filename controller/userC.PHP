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
        $sql = "SELECT * FROM user where name = :name";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':name', $name);
            $query->execute();
            return $query->fetch();
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
        $sql = "INSERT INTO user (id  , name, phone,email,password)
        VALUES (null  , :name, :phone,:email,:password)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'name' => $user->getname(),
                'phone' => $user->getphone(),
                'email' => $user->getemail(),
                'password' => $user->getpassword(),
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
                WHERE id = :id'
            );
            $query->execute([
                'id' => $id,
                'name' => $user->getname(),
                'phone' => $user->getphone(),
                'email' => $user->getemail(),
                'password' => $user->getpassword(),
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>