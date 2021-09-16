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
        $query = "INSERT INTO `users`(`email`, `password`, `token`) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array($email, $password, $token));
        return $this->db->lastInsertId();
    }

    public function userCheckPassword($id, $password)
    {
        $query = "SELECT id FROM `users` WHERE users.id = ? AND users.password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array($id, $password));
        return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    }

    public function getIdUserByToken($token)
    {
        $query = "SELECT id FROM `users` WHERE users.token = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array($token));
        return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    }
    public function userUpdToken($id, $newToken)
    {
        $query = "UPDATE `users` SET `token` = ? WHERE id= ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array($newToken, $id));
        return true;
    }

    public function userIdentification($email)
    {
        $query = "SELECT users.id FROM `users` WHERE users.email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array($email));
        return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    }

    public function feedbackAdd($idUser, $name, $description, $rate, $cb1, $cb2, $cb3, $cb4, $idData)
    {
        $query = "INSERT INTO `feedbacks`(`id_user`, `name`, `description`, `rate`, `checkbox1`,`checkbox2`, `checkbox3`,
                        `checkbox4`, `id_date_use`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array($idUser, $name, $description, $rate, $cb1, $cb2, $cb3, $cb4, $idData));
        return $this->db->lastInsertId();
    }

    public function getAllFeedbacks()
    {
        $stmt = $this->db->prepare("SELECT * FROM `feedbacks` LEFT JOIN `users` ON feedbacks.id_user = users.id;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}