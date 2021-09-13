<?php

if($_COOKIE['token']) {
    header("Location: templates/feedback.html");
}else {
    header("Location: templates/auth.html");
}
