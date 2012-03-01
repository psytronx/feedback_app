<?php

$app->get("/", function() use ($app) {
    $app->render('web/home.php');
});