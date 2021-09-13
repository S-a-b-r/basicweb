<?php
require_once("Application.php");

$app = new Application();

if (isset($_POST['signin'])) {
    echo($app->loginUser($_POST['email'], $_POST['password']));
} elseif (isset($_POST['signup'])) {
    echo($app->registrationUser($_POST['email'], $_POST['password']));
} elseif (isset($_POST['feedback'])) {
    //feedback
}
else {
    echo 404;
}
//print_r($_POST);