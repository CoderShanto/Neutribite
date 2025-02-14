<?php
session_start();
if(isset($_SESSION['admin_username'])) {
    echo "Welcome " . $_SESSION['admin_username'] . "<br>";
    echo "Your password is: " . $_SESSION['admin_password'] . "<br>";
    echo "Your email is: " . $_SESSION['admin_email'] . "<br>";
} else {
    echo "Please login again to continue";
}
?>
