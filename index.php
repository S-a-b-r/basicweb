<?php

if($_COOKIE['token']) {
    header("Location: /feedback.html");
}else {
    header("Location: /auth.html");
}
