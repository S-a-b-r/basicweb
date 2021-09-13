<?php
require_once("DataBase.php");
require_once("Cookie.php");

class User
{
    public function __construct()
    {
        $this->db = new DataBase();
        $this->cookie = new Cookie();
        $this->secretCode = "123qwe123";
    }

    public function registrationUser($email, $password)
    {
        $userId = $this->db->userIdentification($email);
        if (isset($userId)) {
            return "<h2>Пользователь с такой почтой уже существует</h2> <a href='../templates/registration.html'>
                Вернуться к регистрации</a>";
        }
        $password = $this->generatePassword($email, $password);
        $token = $this->generateToken($password);
        $this->cookie->updateTokenInCookie($token);
        $this->db->userRegistration($email, $password, $token);
        header("Location: ../templates/feedback.html");
    }

    public function loginUser($email, $password)
    {
        $userId = $this->db->userIdentification($email);
        $password = $this->generatePassword($email, $password);
        if (isset($userId)) {
            if($this->db->userCheckPassword($userId, $password)) {
                $token = $this->generateToken($password);
                $this->db->userUpdToken($userId, $token);
                $this->cookie->updateTokenInCookie($token);
                header("Location: ../templates/feedback.html");
            }
            return "<h2>Неправильно введен пароль</h2>
            <a href='../templates/auth.html'> На страницу авторизации</a>
            ";
        }
        return "<h2>Пользователя с такой почтой не существует, попробуйте еще раз, или зарегистрируйтесь</h2>
            <a href='../templates/registration.html'> Зарегистрироваться</a>
            <a href='../templates/auth.html'> На страницу авторизации</a>
            ";
    }

    private function generateToken($password)
    {
        return md5($password . random_int(0, 1000));
    }

    private function generatePassword($email, $password)
    {
        return md5($email . $password . $this->secretCode);
    }
}