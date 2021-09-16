<?php
require_once("Application.php");

$app = new Application();

if (isset($_POST['signin'])) {
    echo($app->loginUser($_POST['email'], $_POST['password']));
} elseif (isset($_POST['signup'])) {
    echo($app->registrationUser($_POST['email'], $_POST['password']));
} elseif (isset($_POST['feedback'])) {
    echo($app->addFeedback($_POST));
} elseif(isset($_POST['logout'])) {
    echo($app->logOutUser());
}
else {
    echo 404;
}
