<?php
session_start();
$adminEmail = "admin@example.com"; // Replace with the specific admin email
$userEmail = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';
?>