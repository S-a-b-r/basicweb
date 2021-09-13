<?php
require_once("User.php");
require_once("Feedback.php");

class Application
{
    public function __construct()
    {
        $this->user = new User();
        $this->feedback = new Feedback();
    }

    public function registrationUser($email, $password)
    {
        if (strlen($email) >= 5 && strlen($password) >= 8) {
            return $this->user->registrationUser($email,$password);
        }
        return "Пароль должен иметь больше 8 символов <a href='../templates/registration.html'>Вернуться к регистрации</a>";
    }

    public function loginUser($email, $password)
    {
        if(isset($email) && isset($password)) {
            return $this->user->loginUser($email,$password);
        }
        return "Введите, пожалуйста email и пароль <a href='../templates/auth.html'>Вернуться к авторизации</a>";
    }

}