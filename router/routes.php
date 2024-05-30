<?php 

return [

    '/' => function () {
        require 'home.php';
    },
    '/home' => function () {
        require 'home.php';
    },
    '/login' => function () {
        require 'login.php';
    },
    '/register' => function () {
        require 'register.php';
    }

];
