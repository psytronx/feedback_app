<?php

$app->get("/mobile/", function() use ($app) {
    $app->render('mobile/index.html');
});