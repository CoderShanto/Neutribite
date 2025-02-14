
<?php 
include('../includes/connect.php'); 
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <style>
    /* General Body Styles */
body {
    margin: 0;
    padding: 0;
    height: 100vh;
    display: flex;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #1f1f1f;
    justify-content: center;
    align-items: center;
    color: #f2f2f2;
    transition: background-color 0.5s ease;
}

/* Main Container for Login */
.login-container {
    width: 100%;
    height: 100vh;
    display: flex;
}

/* Left Panel with Background */
.left-panel {
    width: 50%;
    height: 100%;
    background: url('../images/login1.jpg') no-repeat center center/cover;
    background-size: cover;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: relative;
}

/* Overlay on Left Panel */
.left-panel:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.1);
}

/* Title and Text on Left Panel */
.left-panel h1 {
    color: #ffffff;
    font-size: 50px;
    font-weight: 700;
    margin-bottom: 10px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
}

.left-panel p {
    color: #d1d1d1;
    font-size: 18px;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
}

/* Right Panel - Form Area */
.right-panel {
    width: 50%;
    background-color:rgb(255, 255, 255);
    padding: 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border-radius: 15px;
    box-shadow: 0 12px 30px rgba(3, 253, 74, 0.3);
    animation: slideInRight 0.8s ease-out forwards;
}

/* Slide-in Animation for Right Panel */
@keyframes slideInRight {
    from {
        transform: translateX(100%);
    }
    to {
        transform: translateX(0);
    }
}

/* Login Form Styles */
.login-form {
    width: 100%;
    max-width: 380px;
    background-color: #333;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 8px 30px rgba(43, 255, 0, 0.84);
    transition: transform 0.5s ease;
}

/* Hover Effect for Login Form */
.login-form:hover {
    transform: scale(1.02);
}

/* Form Heading */
.login-form h2 {
    color: #ffffff;
    text-align: center;
    margin-bottom: 30px;
    font-size: 24px;
}

/* Form Labels */
.login-form label {
    color: #b0b0b0;
    font-size: 14px;
}

/* Form Control - Input Fields */
.form-control {
    background-color:rgb(234, 230, 230);
    color: #ffffff;
    border: 1px solid #444;
    border-radius: 10px;
    padding: 12px;
    font-size: 16px;
    margin-bottom: 20px;
    transition: all 0.3s ease;
}

/* Focus State for Input Fields */
.form-control:focus {
    border-color: #61dafb;
    box-shadow: 0 0 8px rgba(238, 238, 239, 0.5);
}

/* Submit Button Style */
.btn-primary {
    background-color: #61dafb;
    color: #ffffff;
    border: none;
    border-radius: 8px;
    padding: 12px;
    font-size: 18px;
    width: 100%;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

/* Hover Effect for Submit Button */
.btn-primary:hover {
    background-color: #4fa3d1;
    transform: translateY(-4px);
}

/* Text Centered Links */
.text-center a {
    color: #00bcd4;
    text-decoration: none;
    font-size: 14px;
    transition: color 0.3s ease;
}

/* Hover Effect for Links */
.text-center a:hover {
    text-decoration: underline;
    color: #4fa3d1;
}

/* Subtle Footer Text */
.text-center.mt-3 {
    color: #888;
    font-size: 12px;
    margin-top: 20px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .login-container {
        flex-direction: column;
    }

    .left-panel, .right-panel {
        width: 100%;
        padding: 20px;
    }

    .login-form {
        max-width: 100%;
        padding: 30px;
    }
}

</style>

</head>
<body>

<div class="container login-container">
    <div class="left-panel">
    </div>
    <div class="right-panel">
        <div class="login-form">
            <h2>User Login</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="user_username">Username</label>
                    <input type="text" id="user_username" class="form-control" name="user_username" placeholder="Enter your username" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="user_password">Password</label>
                    <input type="password" id="user_password" class="form-control" name="user_password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="user_login">Login</button>
                <p class="text-center mt-3">Don't have an account?  <a href="user_registration.php">Register</a></p>
            </form>
        </div>
    </div>
</div>

</body>
</html>

<?php

if(isset($_POST['user_login'])){
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM user_table WHERE username = '$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if($row_count > 0 && password_verify($user_password, $row_data['user_password'])) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('Login successful')</script>";
        if($row_count == 1 && !isset($_SESSION['cart_initialized'])) {
            echo "<script>window.open('profile.php', '_self')</script>";
        } else {
            echo "<script>window.open('payment.php', '_self')</script>";
        }
    } else {
        echo "<script>alert('Invalid Login')</script>";
    }
}

?>