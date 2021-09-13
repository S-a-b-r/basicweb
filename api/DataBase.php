<?php

class DataBase
{
    function __construct()
    {
        $host = "localhost";
        $user = "root";
        $pass = "root";
        $name = "basic_web";
        try {
            $this->db = new PDO('mysql:host=' . $host . ';dbname=' . $name, $user, $pass);
        } catch (PDOException $e) {
            print "Ошибка!: " . $e->getMessage();
            die();
        }
    }

    function __destruct()
    {
        $this->db = null;
    }

    public function userRegistration($email, $password, $token)
    {
        $stmt = $this->db->prepare("INSERT INTO `users`(`email`, `password`, `token`) VALUES ('$email','$password','$token')");
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function userCheckPassword($id, $password)
    {
        $stmt = $this->db->prepare("SELECT id FROM `users` WHERE users.id='$id' AND users.password='$password'");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    }

    public function userUpdToken($id, $newToken)
    {
        $stmt = $this->db->prepare("UPDATE `users` SET `token`='$newToken' WHERE id='$id'");
        $stmt->execute();
        return true;
    }

    public function userIdentification($email)
    {
        $stmt = $this->db->prepare("SELECT users.id FROM `users` WHERE users.email='$email'");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    }
}