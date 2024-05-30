<?php

include './router/function.php';

$routes = include './router/routes.php';

deploy($_SERVER['REQUEST_URI'], $routes);