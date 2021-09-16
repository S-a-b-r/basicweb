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
            return $this->user->registrationUser($email, $password);
        }
        return "Пароль должен иметь больше 8 символов <a href='../templates/registration.html'>Вернуться к регистрации</a>";
    }

    public function logOutUser()
    {
        return $this->user->logOutUser();
    }

    public function loginUser($email, $password)
    {
        if (isset($email) && isset($password)) {
            return $this->user->loginUser($email, $password);
        }
        return "Введите, пожалуйста email и пароль <a href='../templates/auth.html'>Вернуться к авторизации</a>";
    }

    public function addFeedback($params)
    {
        if (mb_strlen($params['reviewName'])  > 50) {
            return "Название отзыва должно быть меньше 50 символов <a href='/'>Вернуться</a>";
        } elseif (mb_strlen($params['reviewDescription'])  > 500) {
            return "Отзыв должен быть короче 500 символов <a href='/'>Вернуться</a>";
        }
        return $this->feedback->addFeedback($params);
    }

}