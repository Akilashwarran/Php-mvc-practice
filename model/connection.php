<?php
// connection.php
$config = require('../config.php');

try {
    $dsn = "mysql:host=" . $config["host"] . ";dbname=" . $config["database"];
    $username = $config["root"];
    $password = $config["password"];
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
