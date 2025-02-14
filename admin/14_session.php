<?php

session_start();
// Initialize admin session variables
$_SESSION['admin_username'] = "admin";
$_SESSION['admin_password'] = "admin123";
$_SESSION['admin_email'] = "admin123@gmail.com";

echo "Session data is saved";




?>