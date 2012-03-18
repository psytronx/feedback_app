<?php
require_once('../lib/UserAgent.php');

$app->get("/", function() use ($app) {
    if(UserAgent::isMobile()) {
        $app->redirect("/mobile");
        return;
    }
    $app->render('web/home.php');
});

$app->get("/search", function() use ($app) {
    
});

