<?php

class Feedback
{
    public function __construct()
    {
        $this->db = new DataBase();
        $this->cookie = new Cookie();
    }

    public function addFeedback($params)
    {
        $token = $this->cookie->getToken();
        $userId = $this->db->getIdUserByToken($token);
        $name = $this->defenderXSS($params['reviewName']);
        $description = $this->defenderXSS($params['reviewDescription']);
        $rate = $params['rate'];
        $cb1 = (int)isset($params['checkbox1']);
        $cb2 = (int)isset($params['checkbox2']);
        $cb3 = (int)isset($params['checkbox3']);
        $cb4 = (int)isset($params['checkbox4']);
        $date = $params['dateUse'];
        $feedbackId = $this->db->feedbackAdd($userId, $name, $description, $rate, $cb1, $cb2, $cb3, $cb4, $date);
        if(isset($feedbackId)) {
            return "Ваш отзыв успешно отправлен, спасибо <a href = '/'>Вернуться</a>";
        }
    }

    public function defenderXSS($str)
    {
        $filter = array("<", ">");
        return str_replace ($filter, "|", $str);
    }
}